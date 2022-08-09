<?php

namespace App\Http\Controllers\Dealer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductAttribute;
use App\Models\ProductAttributeGrouping;
use App\Models\ProductModel;
use App\Models\Cart;
use App\Models\DealerProfile;
use App\Models\Order;
use App\Models\OrderItem;
use Session;
use Auth;

class OrderController extends Controller
{
    public function index()
    {
        if(auth()->user()->isDealer())
        {
            $id = Auth::user()->id;
            $dealer = DealerProfile::dealerCategory($id);
            // dd($dealer->id);
            if(!Session::get('id_percentage'))
            {
                Session::put("id_percentage",$dealer->user_id.'_'.$dealer->percentage_dealer);
            }
        }
        $attributes = ProductAttribute::getProductAttribute(2);
        $models = ProductModel::getProductModel();
        $modelData = [];
        foreach($models as $key => $value)
        {
            $color = ProductAttributeGrouping::getAttributeMapping($value['id'],2);
            $variant = ProductAttributeGrouping::getAttributeMapping($value['id'],3);
            $modelData[$key] = ['model'=> $value,'color'=>$color,'variant'=>$variant];
        }
        return view('dealer.order.index',compact('modelData'));
    }

    public function store(Request $request)
    {
        $data = Session::get('id_percentage');
        $dd_id = explode('_',$data);
        $id = $dd_id[0];
        Cart::addToCart($request->all(),$id,"incart");
        return redirect()->back();
    }

    public function cart()
    {
        $data = Session::get('id_percentage');
        $dd_id = explode('_',$data);
        $id = $dd_id[0];
        $carts = Cart::where(["user_id"=>$id,"status"=>"incart"])->get();
        return view('dealer.order.cart_list',compact('carts'));
    }

    public function checkout(Request $request)
    {
        $data = Session::get('id_percentage');
        $id_percentage = explode(',',$data);
        $id = $id_percentage[0];
        $percentage = $id_percentage[1];

        $order = new Order;
        $order->user_id = $id;
        $order->status = 1;
        $order->created_by = Auth::user()->id;
        $order->save();

        $carts = Cart::where(['user_id'=>$request->id,"status"=>"incart"])->get();
        $total_amt = 0;
        $quantity = 0;
        foreach($carts as $cart)
        {
            $total_amt += $cart->dd_price;
            $quantity += $cart->quantity;
            $orderItem = new OrderItem;
            $orderItem->order_id = $order->id;
            $orderItem->product_id = $cart->product_id;
            $orderItem->attribute = $cart->attribute;
            $orderItem->dd_id = $cart->user_id;
            $orderItem->price = $cart->price;
            $orderItem->dd_price = $cart->dd_price;
            $orderItem->attr_price = $cart->attr_price;
            $orderItem->quantity = $cart->quantity;
            $orderItem->amount = $cart->amount;
            $orderItem->status = "open";
            $orderItem->save();
        }

        $dataArr = [
            "percentage" => $percentage,
            "subtotal" => $total_amt,
            "total_amount" => $total_amt,
            "quantity" => $quantity,
            "order_expiry" => date("Y-m-d"),
        ];
        Order::where(["user"=>$order->id])->update($dataArr);
        Cart::where(["user_id"=>$id])->delete();
        // return view('dealer.order.order_invoice');
        $itemOrders = OrderItem::select('order_items.*','product_models.title')
            ->join('product_models','order_items.product_id','=','product_models.id')
            ->where(["order_items.dd_id"=>$id])
            ->get();
        $dds = DealerProfile::where(["user_id"=>$id])->first();
        return view('dealer.order.order_invoice',compact('itemOrders','dds'));
    }


    public function destroy(Request $request)
    {
        $cartitem = Cart::find($request->id);
        $cartitem->delete();
        return "Product Removed From Cart.";
    }

    public function test()
    {
        $attr_add = "6_7_8_9";
        $data = explode('_',$attr_add);
        // ProductAttributeGrouping::getAttributePrice($data,4);
        $attr = ProductAttribute::getAttributePrice();

        $itemOrders = OrderItem::select('order_items.*','product_models.title')
            ->join('product_models','order_items.product_id','=','product_models.id')
            ->where(["order_items.dd_id"=>10])
            ->get();
        $dds = DealerProfile::where(["user_id"=>10])->first();
        return view('dealer.order.order_invoice',compact('itemOrders','dds'));
    }

}
