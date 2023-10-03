<?php

namespace App\Http\Controllers;
use App\Models\CartItem;
use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\DB;


class OrderController extends Controller
{
    public function orderPage(){
        $cartItems = CartItem::where("userId",auth()->user()->id) ->where('process', '=', 1)->get();
        $subTotal = $cartItems->pluck('total')->sum();
        $count = $cartItems->count();
        //dd($cartItems,$subTotal,$count);
        return view('pages.order',['cartItems' => $cartItems,'subTotal' => $subTotal,'count' => $count]);
    }
    public function storeOrder(Request $request){
        //dd($request->get('cartItems'));
        //update process column to 1
        $updateProcess =  CartItem::whereIn('id',$request->get('cartItems'))->update(['process'=>1]);
        //dd($cartItems);
        return redirect(route('order'));
    }
    public function sendOrder(Request $request){
        //dd($request->get('cartItems')); 
        //update process column to 2
        $updateProcess =  CartItem::whereIn('id',$request->get('cartItems'))->update(['process'=>2]);
        $cartItems=CartItem::whereIn('id',$request->get('cartItems'))->get();
        //dd($cartItems);
        //get order infomation
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'mobile' => 'required',
            'paidBy' => 'required',
            'method' => 'required',
            'subTotal' => 'required',
            'process' => 'required'
        ]);
        //insert it in order table
        $data['name'] =$request->name;
        $data['userId'] =$request->userId;
        $data['address'] =$request->address;
        $data['mobile'] =$request->mobile;
        $data['paidBy'] =$request->paidBy;
        $data['method'] =$request->method;
        $data['subTotal']=$request->subTotal;
        $data['process']=$request->process;
        $order = Order::create($data);
        //dd($request->all());
        //insert it in order_cart_items table
        foreach ($cartItems as $cartItem) {
            $relationOrderCart[]=[
                'order_id' => $order->id,
                'cart_item_id'=>$cartItem->id
            ];
        }
        //dd($relationOrderCart);
        DB::table('order_cart_items')->insert($relationOrderCart);
        return redirect(route('orderConfirmPage'));
    }
    public function orderConfirmPage(){
        $orderDetail = Order::where('userId',auth()->user()->id)->get();
        $cartItems = CartItem::where("userId",auth()->user()->id) ->where('process', '=', 2)->get();
        $subTotal = $cartItems->pluck('total')->sum();
        $count = $cartItems->count();
        //$orderDetail = Order::find(2);
        //dd($orderDetail,$subTotal);
        return view('pages.orderConfirm',['orderDetail'=>$orderDetail,'subTotal'=>$subTotal]);
    }
}
