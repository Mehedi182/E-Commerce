<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function addToWishlist($product_id)
    {
        if (Auth::check()) {
            $check = Wishlist::where('product_id', $product_id)->where('user_id', Auth::id())->first();
            if ($check) return redirect()->back()->with('WishSuccess', 'This Product Already exist in Wishlist. Please Add a new Product');
            else {
                Wishlist::insert([
                    'user_id' => Auth::id(),
                    'product_id' => $product_id
                ]);
                return redirect()->back()->with('WishSuccess', 'Product Added On Wishlist');
            }
        } else
            return redirect()->route('login_page')->with('loginError', 'Please login to your acount');
    }
    public function wishlistPage(){
        $product = Wishlist::where('user_id', Auth::id())->latest()->get();
        return view('pages.wishlist',[
            'Wishlistproducts'=>$product
        ]);
    }
    public function destroy($wishlistProductId){
        Wishlist::where('id', $wishlistProductId)->where('user_id', Auth::id())->delete();
        return redirect()->back()->with('delete', 'Wishlist Product Removed');


    }
}
