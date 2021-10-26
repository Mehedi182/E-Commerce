<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\CartsController;
use App\Http\Controllers\User\CheckoutController;
use App\Http\Controllers\User\OrderController;
use App\Http\Controllers\User\WishlistController;
use App\Http\Controllers\User\ProductsController;
use App\Http\Controllers\User\Auth\LoginController;
use App\Http\Controllers\User\Auth\RegisterController;

Route::group([
    'namespace' => 'Auth',
], function () {

    // Authentication Routes...
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('login_page');
    Route::post('login', [LoginController::class, 'login'])->name('login');
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');

    // Registration Routes...
    Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register_page');
    Route::post('register', [RegisterController::class, 'register'])->name('register');
    Route::get('register/activate/{token}', [RegisterController::class, 'confirm'])->name('email_confirm');

    // Password Reset Routes...
    Route::get('password/reset', [App\Http\Controllers\User\auth\ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
    Route::post('password/email', [App\Http\Controllers\User\auth\ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
    Route::get('password/reset/{token}', [App\Http\Controllers\User\auth\ResetPasswordController::class, 'showResetForm'])->name('password.reset');
    Route::post('password/reset',[App\Http\Controllers\User\auth\ResetPasswordController::class, 'reset']);

});
Route::get('/',[ProductsController::class, 'index']);
Route::get('/products',[ProductsController::class, 'index']);
Route::get('/products/details/{product_id}',[ProductsController::class, 'productDetails']);

Route::post('add/to-cart/{product_id}',[CartsController::class, 'addToCart']);
Route::get('cart',[CartsController::class, 'cartPage']);
Route::get('cart/delete/{cart_id}',[CartsController::class, 'destroy']);
//Route::post('update-to-cart',[CartsController::class, 'updatetocart']);

Route::post('cupon/apply',[CartsController::class, 'cuponApply']);
Route::get('cupon/delete',[CartsController::class, 'cuponDelete']);

//checkout&order page
Route::get('checkout',[CheckoutController::class, 'index']);
Route::get('place-order',[OrderController::class, 'OrderStore']);
Route::get('order/success',[OrderController::class, 'orderSuccess']);


//Wishlist
Route::get('add/to-wishlist/{product_id}',[WishlistController::class, 'addToWishlist']);
Route::get('wishlist/delete/{WishproductId}',[WishlistController::class, 'destroy']);
Route::get('wishlist',[WishlistController::class, 'wishlistPage']);

Route::get('/home', [App\Http\Controllers\User\UserController::class, 'index'])->name('home');