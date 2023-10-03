<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use  App\Models\CartItem;

class CartController extends Controller
{
    public function cart(){
        $cartItems = CartItem::where("userId",auth()->user()->id) ->where('process', '=', 0)->get();
        $subTotal = $cartItems->pluck('total')->sum();
        $count = $cartItems->count();
        return view('pages.cart',['cartItems' => $cartItems,'subTotal' => $subTotal,'count' => $count]);
    }
    public function addToCart(Request $request){
       
        $request->validate([
            'userId' => 'required',
            'productId' => 'required',
            'size' => 'required',
            'color' => 'required',
            'quantity' => 'required',
    
        ]);
        //dd($request->all());
         $cartItem = new CartItem();
         $cartItem->userId = $request->userId;
         $cartItem->productId = $request->productId;
         $cartItem->sizeId = $request->size;
         $cartItem->colorId = $request->color;
        $cartItem->quantity = $request->quantity;
        $cartItem->total = $request->quantity * $request->price;
        $cartItem->process=0;
        //dd($cartItem);
        $cartItem->save();
        return redirect(route('product',$request->productId))->with("sucMsg","Add successfully");
    }
    public function delete(CartItem $cartItem){
        CartItem::where('id',$cartItem->id)->delete();
        return redirect(route('cart'))->with('sucMsg','Item is deleted .');
    }
}
