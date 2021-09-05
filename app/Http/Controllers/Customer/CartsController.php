<?php

namespace App\Http\Controllers\Customer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
class CartsController extends Controller
{
    public function addToCart(Request $request, $product_id){
        $check = Cart::where('product_id',$product_id)->first();
        if($check){
            Cart::where('product_id',$product_id)->increment('quantity');        }
        else{
            Cart::insert([
                'product_id'=> $product_id,
                'quantity'=> 1,
                'price'=> $request->input('price'),
                'user_ip'=> request()->ip(),
            ]);
        }
        
        return redirect()->back();        
    }
}
