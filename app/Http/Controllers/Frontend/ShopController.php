<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Brand; 
use App\Models\Product;


class ShopController extends Controller
{
    public function ShopPage(){

        $products = Product::where('status',1)->orderBy('id','DESC')->paginate(3);
        
        $categories = Category::orderBy('category_name_en','ASC')->get();
        return view('frontend.shop.shop_page',compact('products','categories'));

    } // end Method 
}
 