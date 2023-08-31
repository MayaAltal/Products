<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service\products;
use App\Models\Product;

class ProductController extends Controller
{ public function gett_all_products()
    {
    $products=products::get_all_product();
    return view('welcome',['products'=> $products]);

    }
    public function search_product(Request $request)
    {
       $products= products::searchByName($request);
        return response()->json($products);
       
    }
    
}
