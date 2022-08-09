<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Order extends Model
{
    use HasFactory;

    public static function getMyOrders($id,$month)
    {
       $orders = Order::where(["user_id"=>$id])->where("created_at",">", Carbon::now()->subMonths($month))->orderBy('id','desc')->get();
       return $orders;
    }

    public static function getOrderDetails($id,$duration)
    {

    }
}
