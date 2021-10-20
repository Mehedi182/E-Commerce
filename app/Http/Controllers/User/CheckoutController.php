<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
   public function index(){
       if(Auth::check())
       return view('pages.checkout');
       else      return redirect()->route('login_page')->with('loginError', 'Please login to your acount');

   }
}
