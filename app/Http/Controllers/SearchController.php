<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function searchProduct(Request $request){
        $query = $request->search;
        $results = DB::table('products')
            ->where('name', 'LIKE', "%{$query}%")
            ->get();
        //dd($results);
        return view('pages.searchProduct',["products"=>$results]);
    }
}
