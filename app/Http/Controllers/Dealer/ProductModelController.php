<?php

namespace App\Http\Controllers\Dealer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductModel;
use App\Models\ProductAttribute;
use Auth;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;
use Gate;
use Session;
use Carbon\Carbon;
use App\Models\ProductAttributeGrouping;

class ProductModelController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = ProductModel::join('users','users.id','=','product_models.created_by')->orderBy('id','DESC')
                ->filterModels($request)
                ->select(sprintf('%s.*', (new ProductModel)->table),'users.name');
            $table = Datatables::of($query);
            $table->editColumn('created_at', function($data){ $formatedDate = Carbon::createFromFormat('Y-m-d H:i:s', $data->created_at)->format('d-m-Y'); return $formatedDate; });
            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'product_model_show';
                $editGate      = 'product_model_edit';
                $deleteGate    = 'product_model_delete';
                $editAttributeGroupingGate = 'product_model_edit';
                $crudRoutePart = 'product-model';

                return view('partials.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'editAttributeGroupingGate',
                    'crudRoutePart',
                    'row'
                ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : "";
            });
            $table->editColumn('title', function ($row) {
                return $row->title ? $row->title : "";
            });
            $table->editColumn('model_no', function ($row) {
                return $row->model_no ? $row->model_no : "";
            });
            // $table->addColumn('image', function ($row) {
            //     return $row->image ? $row->image : '';
            // });
            $table->addColumn('created_by', function ($row) {
                return $row->name ? $row->name : '';
            });
           $table->editColumn('image', function ($row) {
                $url=asset("dealer/product_model/".$row->image);
                $image = '<img src='.$url.' border="0" width="60" class="img-rounded" align="center" />';
                return $image;
            });

            $table->rawColumns(['actions', 'placeholder', 'created_by','image']);

            return $table->make(true);
        }
        return view("dealer.product_model.index");
    }

    public function create()
    {
        // $colors = ProductAttribute::select('product_attributes.id','product_attributes.name','product_attributes.parent_id')
        //         ->join('product_attributes as q','product_attributes p.parent_id','=','q.id')
        //         ->where(['q.name'=>"Color"])
        //         ->get();
        //         dd($colors);
        $colors = \DB::select('SELECT p.id,p.name,p.parent_id FROM `product_attributes` p JOIN product_attributes q on p.parent_id=q.id WHERE q.name="Color"');
        $bodycolors = \DB::select('SELECT p.id,p.name,p.parent_id FROM `product_attributes` p JOIN product_attributes q on p.parent_id=q.id WHERE q.name="Body Color"');
        $variants = \DB::select('SELECT p.id,p.name,p.parent_id FROM `product_attributes` p JOIN product_attributes q on p.parent_id=q.id WHERE q.name="Variant"');
        return view("dealer.product_model.create",compact('colors','variants','bodycolors'));
    }

    public function store(Request $request)
    {
        $prices = ProductAttribute::getAttributePrice();
        $data= new ProductModel();

        // if($request->file('image')){
        //     $file= $request->file('image');
        //     $filename= date('YmdHi').$file->getClientOriginalName();
        //     $file->move(public_path('dealer/product_model'), $filename);
        //     $data['image']= $filename;
        // }
        $data->title = $request->title;
        $data->model_no = $request->model_no;
        $data->price = $request->price;
        // $data->available_stock = $request->available_stock;
        // $data->total_stock = $request->available_stock;
        $data->status = $request->status;
        $data->created_by = Auth::user()->id;
        $data->save();


        foreach($request->color as $key => $color)
        {
            $col = new ProductAttributeGrouping;
            $col->model_id = $data->id;
            $col->attribute_id = $color;
            $col->parent_id = $request->color_parent;
            $col->save();
        }

        foreach($request->variant as $key => $value)
        {
            $col = new ProductAttributeGrouping;
            $col->model_id = $data->id;
            $col->attribute_id = $value;
            $col->parent_id = $request->variant_parent;
            $col->price = $prices[$value];
            $col->save();
        }

        return redirect()->route('admin.product-model');
    }

    public function edit(ProductModel $model,$id)
    {
        $productModel = ProductModel::where(["id"=>$id,"status"=>"active"])->first();
        $colors = \DB::select('SELECT p.id,p.name,p.parent_id FROM `product_attributes` p JOIN product_attributes q on p.parent_id=q.id WHERE q.name="Color"');
        $variants = \DB::select('SELECT p.id,p.name,p.parent_id FROM `product_attributes` p JOIN product_attributes q on p.parent_id=q.id WHERE q.name="Variant"');

        $groups = ProductAttributeGrouping::where(["model_id"=>$productModel->id])->get();
        // dd($groups)
        return view('dealer.product_model.edit', compact('colors','variants','productModel','groups'));
    }

    public function update(Request $request)
    {
        $prices = ProductAttribute::getAttributePrice();
        $data = [
            "title" => $request->title,
            "model_no" => $request->model_no,
            "price" => $request->price,
            "status" => $request->status,
            "updated_by" => Auth::user()->id,
        ];
        ProductModel::where(["id"=>$request->id])->update($data);

        foreach($request->color as $key => $color)
        {
            $exist = ProductAttributeGrouping::where(["model_id"=>$request->id,"attribute_id"=>$color])->first();
            if(empty($exist))
            {
                $col = new ProductAttributeGrouping;
                $col->model_id = $request->id;
                $col->attribute_id = $color;
                $col->parent_id = $request->color_parent;
                $col->save();
            }
        }

        foreach($request->variant as $key => $value)
        {
            $exist = ProductAttributeGrouping::where(["model_id"=>$request->id,"attribute_id"=>$value])->first();
            if(empty($exist))
            {
                $col = new ProductAttributeGrouping;
                $col->model_id = $request->id;
                $col->attribute_id = $value;
                $col->parent_id = $request->variant_parent;
                $col->price = $prices[$value];
                $col->save();
            }
        }
        return redirect()->route('admin.product-model');
    }

    public function show($id)
    {
        $models = ProductModel::where(["status"=>"active","id"=>$id])->first();
        return view('dealer.product_model.show', compact('models'));
    }

    public function destroy($id)
    {
        $model = ProductModel::find($id);
        $model->delete();

        return back();
    }

    public function editgroup($id)
    {
        $attributeGroups = ProductAttributeGrouping::select('product_attribute_groupings.*','product_models.title','product_attributes.name')
            ->join('product_models','product_models.id','=','product_attribute_groupings.model_id')
            ->join('product_attributes','product_attributes.id','=','product_attribute_groupings.attribute_id')
            ->where(["product_attribute_groupings.model_id"=>$id])->get();
            // dd($attributeGroups);
        return view('dealer.product_model.attribute_group',compact('attributeGroups'));
    }

    // public function massDestroy(MassDestroyTicketRequest $request)
    // {
    //     Ticket::whereIn('id', request('ids'))->delete();

    //     return response(null, Response::HTTP_NO_CONTENT);
    // }
}
