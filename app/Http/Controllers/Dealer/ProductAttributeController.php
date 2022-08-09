<?php

namespace App\Http\Controllers\Dealer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductAttribute;
use Auth;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;
use Gate;
use Session;
use Carbon\Carbon;

class ProductAttributeController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = ProductAttribute::join('users','product_attributes.created_by','=','users.id')->orderBy('id','DESC')
                ->select(sprintf('%s.*', (new ProductAttribute)->table),'users.name as created_name');
            $table = Datatables::of($query);
            $table->editColumn('created_at', function($data){ $formatedDate = Carbon::createFromFormat('Y-m-d H:i:s', $data->created_at)->format('d-m-Y'); return $formatedDate; });
            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'product_attribute_show';
                $editGate      = 'product_attribute_edit';
                $deleteGate    = 'product_attribute_delete';
                $crudRoutePart = 'product-attributes';

                return view('partials.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
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
            $table->addColumn('status', function ($row) {
                return $row->status ? ucwords($row->status) : '';
            });
            $table->addColumn('created_by', function ($row) {
                return $row->name ? $row->name : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'created_by']);

            return $table->make(true);
        }
        return view("dealer.product_attribute.index");
    }

    public function create()
    {
        // $results = getCategoryById();
        return view("dealer.product_attribute.create");
    }

    public function store(Request $request)
    {
        $data= new ProductAttribute();

        $data->parent_id = $request->parent_id;
        $data->name = $request->name;
        $data->status = $request->status;
        $data->price = $request->price;
        $data->created_by = Auth::user()->id;
        $data->save();
        return redirect()->route('admin.product-attributes');
    }

    public function edit(Ticket $ticket)
    {
        $models = ProductModel::where(["status"=>"active"])->get();
        return view('admin.product_attribute.edit', compact('statuses', 'priorities', 'categories', 'assigned_to_users', 'ticket'));
    }

    public function show($id)
    {
        $category = DealerCategory::where(["status"=>"active","id"=>$id])->first();
        return view('dealer.product_attribute.show', compact('category'));
    }

    public function destroy($id)
    {
        $model = DealerCategory::find($id);
        $model->delete();

        return back();
    }
}
