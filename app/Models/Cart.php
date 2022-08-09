<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProductModel;
use App\Models\ProductAttribute;
use Auth;
use Session;

class Cart extends Model
{
    use HasFactory;

    public $table = 'carts';

    public static function addToCart($product,$dealer_id,$status ="incart")
    {
        $model = ProductModel::where(["id"=>$product['model']])->first();
        $attr = '';
        if(!empty($product['color'][0]))
        {
            $attr = $product['color'][0];
        }
        if(!empty($product['variant']))
        {
            foreach($product['variant'] as $key => $value)
            {
                $attr_add = $attr.'_'.$value;
                $data = explode('_',$attr_add);
                $result = Cart::where(["product_id"=>$model->id,"attribute"=>$attr_add,"user_id"=>$dealer_id])->first();
                if(is_null($result))
                {
                    $cart = new Cart;
                    $cart->product_id = $product['model'];
                    $cart->product_name = $model->title.'_'.ProductAttribute::getAttributeList($data);
                    $cart->attribute = $attr.'_'.$value;
                    $cart->attribute_price = ProductAttributeGrouping::getAttributePrice($data,$model->id);
                    $cart->price = $model->price;
                    $cart->dd_price =  getDDPrice($model->price,0);
                    $cart->status = $status;
                    $cart->quantity = $product['qty'][$key] > 0 ? $product['qty'][$key]: 1;
                    $cart->amount = $product['qty'][$key] * (getDDPrice($model->price,0) + ProductAttributeGrouping::getAttributePrice($data,$model->id));
                    $cart->user_id = $dealer_id;
                    $cart->created_by = Auth::user()->id;
                    $cart->save();
                }else{
                    $ddArr = [
                        "attribute_price" => $result->attribute_price + ProductAttributeGrouping::getAttributePrice($data,$model->id),
                        "price" => $result->price + $model->price,
                        "dd_price" => $result->dd_price +  getDDPrice($model->price,0),
                        "quantity" => $result->quantity + $product['qty'][$key],
                        "amount" => $result->amount +  $product['qty'][$key] * (getDDPrice($model->price,0) + ProductAttributeGrouping::getAttributePrice($data,$model->id)),
                    ];
                    Cart::where(["product_id"=>$model->id,"attribute"=>$attr_add,"user_id"=>$dealer_id])->update($ddArr);
                }
            }
        }elseif(!empty($product['color'])){
            foreach($product['color'] as $key => $value)
            {
                $attr_add = $attr.'_'.$value;
                $data = explode('_',$attr_add);

                $cart = new Cart;
                $cart->product_id = $product['model'];
                $cart->product_name = $model->title.'_'.ProductAttribute::getAttributeList($data);
                $cart->attribute = $attr.'_'.$value;
                $cart->attribute_price = ProductAttributeGrouping::getAttributePrice($data,$model->id);
                $cart->price = $model->price;
                $cart->dd_price =  getDDPrice($model->price,0);
                $cart->status = $status;
                $cart->quantity = $product['qty'][$key];
                $cart->amount = $product['qty'][$key] * (getDDPrice($model->price,0) + ProductAttributeGrouping::getAttributePrice($data,$model->id));
                $cart->user_id = $dealer_id;
                $cart->created_by = Auth::user()->id;
                $cart->save();
            }
        }elseif(!empty($product['bodycolor'])){
            foreach($product['color'] as $key => $value)
            {
                $attr_add = $attr.'_'.$value;
                $data = explode('_',$attr_add);

                $cart = new Cart;
                $cart->product_id = $product['model'];
                $cart->product_name = $model->title.'_'.ProductAttribute::getAttributeList($data);
                $cart->attribute = $attr.'_'.$value;
                $cart->attribute_price = ProductAttributeGrouping::getAttributePrice($data,$model->id);
                $cart->price = $model->price;
                $cart->dd_price =  getDDPrice($model->price,0);
                $cart->status = $status;
                $cart->quantity = $product['qty'][$key];
                $cart->amount = $model->price * (getDDPrice($model->price,0) + ProductAttributeGrouping::getAttributePrice($data,$model->id));
                $cart->user_id = $dealer_id;
                $cart->created_by = Auth::user()->id;
                $cart->save();
            }
        }
    }
}
