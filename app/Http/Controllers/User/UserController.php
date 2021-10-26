<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Shipping;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class UserController extends Controller
{
 
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('home');
    }
    public function profile(){
        $user = User::find(Auth::id());
        $orders = Order::where('user_id', Auth::id())->latest()->get();


        return view('pages.profile.user_profile',[
            'orders'=>$orders,
            'user'=>$user,
            'sl'=>1
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

        return view('pages.profile.order_details',[
            'order'=>$order,
            'order_items'=>$orderItems,
            'shipping'=>$shipping,
            'email'=>$email
        ]);
    }

}