<?php

namespace App\Http\Controllers\Customer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
class CartsController extends Controller
{
    public function addToCart(Request $request, $product_id){
        $check = Cart::where('product_id',$product_id)->where('user_ip', request()->ip)->first();
        if($check){
            Cart::where('product_id',$product_id)->increment('quantity');
            return redirect()->back()->with('CartSuccess','Product Added On Cart');        
       
         }
        else{
            Cart::insert([
                'product_id'=> $product_id,
                'quantity'=> 1,
                'price'=> $request->input('price'),
                'user_ip'=> request()->ip(),
            ]);
        }
        
        return redirect()->back()->with('CartSuccess','Product Added On Cart');        
    }

    public function cartPage(){
        $carts = Cart::where('user_ip',request()->ip())->latest()->get();
        return view('pages.cart',[
            'carts'=> $carts
        ]);
    }
}
