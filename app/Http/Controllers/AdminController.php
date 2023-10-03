<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Color;
use App\Models\Category;
use App\Models\Order;
use App\Models\User;
use App\Models\Product;
use App\Models\Size;

class AdminController extends Controller
{
    public function dashboard(){
        $colors = count(Color::get());
        $categories = count(Category::get());
        $orders = count(Order::get());
        $users = count(User::get());
        $products = count(Product::get());
        $sizes = count(Size::get());
        return view('admin.admin-dashboard',["colors"=>$colors,"categories"=>$categories,"orders"=>$orders
        ,"users"=>$users,"products"=>$products,"sizes"=>$sizes
        ]);
    }
    public function profile(){
        return view('admin.admin-profile');
    }

}
