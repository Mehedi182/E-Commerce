<?php

namespace App\Http\Controllers\Customer;

use App\Models\Product;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index()
    {
        $product = Product::all();
        $category = Category::all();
        $latest_product =  Product::latest()->limit(3)->get();
        return view('customer.products.index',[
            'products'=>$product,
            'categories'=>$category,
            'latest_products'=>$latest_product
        ]);
    }
}
