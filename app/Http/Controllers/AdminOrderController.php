<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class AdminOrderController extends Controller
{
    public function inboxPage(){
        $orderDetail = Order::get();
        //dd($orderDetail->userId);
        return view('admin.admin-inbox',["orderDetail"=>$orderDetail]);
    }

    public function confirmOrder(Order $order , Request $request){
        $order = Order::find($order->id);
        $order->process = 1;
        $order->save();
        return redirect(route('admin.inbox'));
    }
}
