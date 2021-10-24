<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\Shipping;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrdersController extends Controller
{
    public function index(Request $request){
        
        $search = $request->input('search');
        if($search=="") $orders = Order::all();
        else{

            $orders = Order::where('invoice_no', "LIKE", "%$search%")->orWhere('email', "LIKE", "%$search%")->get();
        }
        return view('admin.order.orders',[
            'orders'=>$orders,
            'search'=>$search,
            'sl' => 1
        ]);
    }
    public function orderDetails($order_id){
        $order = Order::find($order_id);
        $user_id = $order->user_id;
        $email = DB::table('users')
        ->select('email')
        ->where('id', '=', $user_id)
        ->first();

      
        $email = $email->email;
        $orderItems = OrderItem::all()->where('order_id',$order_id);
        $shipping = Shipping::find($order_id);

        return view('admin.order.order_details',[
            'order'=>$order,
            'order_items'=>$orderItems,
            'shipping'=>$shipping,
            'email'=>$email
        ]);
    }
}
