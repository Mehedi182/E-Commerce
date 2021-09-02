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
        
        return view('customer.products.index',[
            'products'=>$product,
            'categories'=>$category
        ]);
    }
}
