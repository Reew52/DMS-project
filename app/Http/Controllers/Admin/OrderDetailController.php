<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\OrderDetail;

class OrderDetailController extends Controller
{
    //

    public function __construct(){
        $this ->order_detail = new OrderDetail();
    }

    public function index(Request $request,$id = 0){
        $title = 'Order Detail';
        if(!empty($id)){
            $orderDetailList = $this->order_detail ->getDetailOrders($id);
        }else{
            return redirect()->route('admin.order.index')->with('msg', 'Link does not exist!');
        }
        return view('admins.views.orders.orderDetails.list', compact('title', 'orderDetailList'));
    }
}
