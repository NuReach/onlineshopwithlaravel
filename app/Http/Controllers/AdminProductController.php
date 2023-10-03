<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Color;
use App\Models\Size;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class AdminProductController extends Controller
{
    public function products(){
        $products = Product::get();
        return view('admin.admin-products',['products'=>$products]);
    }

    public function createForm(){
        $colors = Color::get();
        $sizes = Size::get();
        $categories = Category::get();
       return view('admin.admin-product-create-form',["colors"=>$colors,"sizes"=>$sizes,"categories"=>$categories]);
    }

    public function createAction(Request $request){
        //dd($request->all());
        //dd($request->colors);
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'image' => 'required'
        ]);
        $data['name'] =$request->name;
        $data['description'] =$request->description;
        $data['price'] =$request->price;
        $data['image'] =$request->image;
        $product = Product::create($data);
        //dd($color->id);
        foreach($request->colors as $color){
            foreach($request->sizes as $size){
                foreach($request->categories as $category){
                    $productRelation []=[
                        'product_id' => $product->id,
                        'color_id' => $color,
                        'size_id'=> $size,
                        'category_id'=> $category,
                        'quantity'=>0
                    ];
                }
            }
        }
        //dd($productRelation);
        DB::table('product_color_size_category')->insert($productRelation);
        return redirect(route('admin.products.table'));
    }

    public function showProductForm(Product $product, Request $request){
        $product = Product::find($product->id);
        //dd($product);
        return view('admin.admin-product-edit-form',["product"=>$product]);
    }

    public function updateProductAction(Product $product, Request $request){
        try {
            $product->name = $request->name;
            $product->description = $request->description;
            $product->price = $request->price;
            $product->image = $request->image;
            $product->save();
            return redirect(route('admin.products.table'))->with("sucMsg","Update sucessfully");
            } catch (\Exception $e){
                return redirect(route('admin.products.table'))->with('error',"This email is already exist");
            }
    }

    public function deleteProductAction(Product $product){
        Product::where('id',$product->id)->delete();
        return redirect(route('admin.products.table'))->with('sucMsg','User is deleted .');
    }

}
