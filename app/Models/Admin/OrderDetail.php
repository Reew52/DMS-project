<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use DB;

class OrderDetail extends Model
{
    use HasFactory;

    Protected $table = 'order_detail';

    public function getDetailOrders($id){
        //DB::enableQueryLog(); 
        $order_detail = DB::table($this->table)
        ->select('order_detail.*','products.*', 'users.user_name', 'brands.brand_logo', 'colors.color_name')
        ->join('orders', 'order_detail.order_id', '=', 'orders.order_id')
        ->join('users', 'orders.user_id', '=', 'users.user_id')
        ->join('products', 'order_detail.pro_id', '=', 'products.pro_id')
        ->join('brands', 'products.brand_id', '=', 'brands.brand_id')
        ->join('colors', 'products.color_id', '=', 'colors.color_id')
        ->where('order_detail.order_id', '=', $id)
        ->get();
        //$sql = DB::getQueryLog();
        //dd($sql);
        return $order_detail;
    }
}
