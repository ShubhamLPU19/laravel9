<?php

namespace App\Http\Controllers\Dealer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductModel;
use App\Models\ProductAttribute;
use App\Models\DealerProfile;
use App\Models\Order;
use Auth;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;
use Gate;
use Session;
use Carbon\Carbon;

class DealerProfileController extends Controller
{
    public function index(Request $request)
    {
        $dealers = DealerProfile::getAllDealers();
        $test = DealerProfile::dealerCategory();
        // dd($test);
        if ($request->ajax()) {
            $query = DealerProfile::join('users','users.id','=','dealer_profiles.created_by')->orderBy('id','DESC')
                ->select(sprintf('%s.*', (new DealerProfile)->table),'users.name as user_name')->get();
                // dd($query);
            $table = Datatables::of($query);
            $table->editColumn('created_at', function($data){ $formatedDate = Carbon::createFromFormat('Y-m-d H:i:s', $data->created_at)->format('d-m-Y'); return $formatedDate; });
            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'dealer_profile_show';
                $editGate      = 'dealer_profile_edit';
                // $deleteGate    = 'product_model_delete';
                $crudRoutePart = 'dealer-profile';

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
            $table->addColumn('created_by', function ($row) {
                return $row->name ? $row->name : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'created_by']);

            return $table->make(true);
        }
        return view("dealer.dealer_profile.index");
    }

    public function ddOrders()
    {
        $id = Auth::user()->id;
        $month = 3;
        $orders = Order::getMyOrders($id,$month);
        return view('dealer.dealer_profile.my_orders', compact('orders'));
    }
}
