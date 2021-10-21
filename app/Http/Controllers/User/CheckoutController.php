<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\User;

class CheckoutController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

    }

   public function index(){
       $cart_products = Cart::all()->where('user_id',Auth::id());
       $user = User::find(Auth::id());
       $subtotal = Cart::all()->where('user_id', Auth::id())->sum(function($sum){
        return $sum->price*$sum->quantity;
     } );
       return view('pages.checkout',[
            'cart_products'=>$cart_products,
            'subtotal'=> $subtotal,
            'user'=> $user
       ]);

   }
}
