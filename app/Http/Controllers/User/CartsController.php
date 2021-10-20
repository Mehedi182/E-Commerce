<?php
namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Cupon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
class CartsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

    }

    public function addToCart(Request $request, $product_id){
        $check = Cart::where('product_id',$product_id)->where('user_id', Auth::id())->first();
        if($check){
            Cart::where('product_id',$product_id)->increment('quantity');
            return redirect()->back()->with('CartSuccess','Product Added On Cart');        
       
         }
        else{
            Cart::insert([
                'product_id'=> $product_id,
                'quantity'=> 1,
                'price'=> $request->input('price'),
                'user_id'=> Auth::id(),
            ]);
        }
        
        return redirect()->back()->with('CartSuccess','Product Added On Cart');        
    }

    public function cartPage(){
        $carts = Cart::where('user_id',Auth::id())->latest()->get();
        $subtotal = Cart::all()->where('user_id', Auth::id())->sum(function($sum){
            return $sum->price*$sum->quantity;
         } );
        return view('pages.cart',[
            'carts'=> $carts,
            'subtotal'=>$subtotal
    
        ]);
    }

    public function destroy($cart_id){
        Cart::where('id',$cart_id)->where('user_id',Auth::id())->delete();
        return redirect()->back()->with('CartDelete', 'Cart Product Removed');
    }
    /* Cupon */
    public function cuponApply(Request $request){
        $cupon = $request->input('cupon');
        $check = Cupon::where('cupon_code',$cupon)->first();
        if($check){
           
            Session::put('cupons',[
                'cupon_code'=> $check->cupon_code,
                'percent'=> $check->percent
            ]);
            return redirect()->back()->with('cupon', 'Cupon Applied');


        }
        else{
            return redirect()->back()->with('cupon', 'Invalid Cupon');
        }
    }

    public function cuponDelete(){
        session()->forget('cupons');
        return redirect()->back()->with('cupon', 'Cupon Removed');


    }
}
