<?php
use Illuminate\Support\Facades\Session;
use App\Models\Cart;

function getDDPrice($mrp,$flag)
{
    $percentage = 0;
    $dd_price = 0;
    $price = 0;
    $data = Session::get('id_percentage');
    if(!empty($data) && isset($data))
    {
        $arr = explode('_',$data);
        $percentage = $arr[1];
        $dd_price = ($percentage /100) * $mrp;
    }
    $price = round($mrp - $dd_price);
    if($flag)
    {
        $price = number_format($price) . '   '. $percentage .'% off';
    }
    return $price;
}

function getItemCount($id)
{
    $count = Cart::where(["user_id"=>$id,"status"=>"incart"])->get()->count();
    return $count;
}

// class DD{
//     private $dd_id;
//     private $dd_percentage;
//     private $price;

//     public __construct()
//     {
//         $this->dd_id = "12345";
//     }
// }
