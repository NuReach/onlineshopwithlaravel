<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\CartItem;
use App\Models\Size;
use App\Models\Color;
use App\Models\User;
use App\Models\Category;

use Illuminate\Http\Request;


class PageController extends Controller
{
    public function home(){
        $products = Product::paginate(8);
        return view('pages.home',['products' => $products]);
    }
    public function user(){
        return view('pages.user');
    }
    public function product($productId){
        $product = Product::find($productId);
        $colors = $product->colors->unique('name');
        $sizes = $product->sizes->unique('name');
        $categories = $product->categories->unique('name');
        // $eachProduct = DB::table('product_color_size_category')->where("product_id",$productId)->get();
        // $quantity = $eachProduct->pluck('quantity')->toArray();
        return view('pages.product',["product"=>$product,"colors"=>$colors,"sizes"=>$sizes
        ,"categories"=>$categories]);
    }

    public function products(){
        $categories = Category::get();
        $products = Product::get();
        // $categorySlug=1;
        // $products = Product::whereHas('categories', function ($query) use ($categorySlug) {
        //     $query->where('category_id', $categorySlug);
        // })->get();    

        //dd($products);
        return view("pages.allProducts",["categories"=>$categories,"products"=>$products]);
    }

    
    public function productFilter(Category $category){
        $categories = Category::get();
        $categorySlug=$category->id;
        $products = Product::whereHas('categories', function ($query) use ($categorySlug) {
            $query->where('category_id', $categorySlug);
        })->get();    
        return view("pages.allProducts",["categories"=>$categories,"products"=>$products]);
    }




 
}
