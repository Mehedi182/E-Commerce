<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\Shipping;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function OrderStore(Request $request){
        $discount =0;
        if($request->discount!="") $discount =$request->discount;
        
        $order_id = Order::insertGetId([
            'user_id'=>Auth::id(),
            'email'=>Auth::user()->email,
            'invoice_no'=>mt_rand(100000000, 999999999),
            'payment_type'=>$request->payment_type,
            'subtotal'=> $request->subtotal,
            'total'=> $request->total,
            'cupon_discount'=>$discount,
            'created_at'=> Carbon::now()
        ]);
        $carts = Cart::where('user_id',Auth::id())->latest()->get();

        foreach($carts as $cart){
        OrderItem::insert([
            'order_id'=> $order_id,
            'product_id'=> $cart->product->id,
            'product_name'=> $cart->product->name,
            'product_quantity'=> $cart->quantity,
            'created_at'=> Carbon::now()

        ]);
        }

        Shipping::insert([
            'order_id'=> $order_id,
            'shipping_name'=> $request->name,
            'shipping_email'=> $request->email,
            'shipping_phone'=> $request->phone,
            'address'=> $request->address,
            'city'=> $request->city,
            'post_code'=> $request->post_code,
            'created_at'=> Carbon::now()

        ]);

        if(Session::has('cupons')){
            session()->forget('cupons');
        }
        Cart::where('user_id',Auth::id())->delete();
        return redirect('order/success')->with('orderComplete', 'Your have ordered successfully');

    }
    public function orderSuccess(){
        return view('pages.ordersuccess');
    }

}
