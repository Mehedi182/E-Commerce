<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\BrandsController;
use App\Http\Controllers\Admin\CuponsController;
use App\Http\Controllers\Customer\CartsController;
use App\Http\Controllers\Admin\LoginController;
use Illuminate\Support\Facades\Auth;


Route::get('/', function () {
    return redirect('/products');
});
Route::prefix('admin')->group(function () {
    Route::resource('/products', ProductsController::class);
    Route::resource('/category', CategoriesController::class);
    Route::resource('/users', UsersController::class);
    Route::resource('/brand', BrandsController::class);
    Route::resource('/cupons', CuponsController::class);
    Route::get('/cupons/active/{id}', [App\Http\Controllers\Admin\CuponsController::class, 'Active']);
    Route::get('/cupons/inactive/{id}', [App\Http\Controllers\Admin\CuponsController::class, 'InActive']);
    Route::get('/home', [App\Http\Controllers\Admin\AdminController::class, 'index'])->name('admin_home');
    Route::get('/', [App\Http\Controllers\Admin\LoginController::class, 'showLoginForm'])->name('admin_login');
    //Route::get('/', [App\Http\Controllers\Admin\CuponsController::class, 'index']);
    Route::post('/', [App\Http\Controllers\Admin\LoginController::class, 'login']);
});
Route::resource('/products', App\Http\Controllers\Customer\ProductsController::class);

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
/* Cart */
Route::post('add/to-cart/{product_id}',[CartsController::class, 'addToCart']);
Route::get('cart',[CartsController::class, 'cartPage']);
Route::get('cart/delete/{cart_id}',[CartsController::class, 'destroy']);
Route::post('update-to-cart',[CartsController::class, 'updatetocart']);
Route::post('cupon/apply',[CartsController::class, 'cuponApply']);




