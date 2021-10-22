<?php

use App\Http\Controllers\Admin\OrdersController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;

Route::group([
    'namespace' => 'Auth',
], function () {
    // Authentication Routes...
    Route::get('login', [App\Http\Controllers\Admin\Auth\LoginController::class, 'showLoginForm'])->name('login_page');
    Route::post('login', [App\Http\Controllers\Admin\Auth\LoginController::class, 'login'])->name('login');
    Route::post('logout', [App\Http\Controllers\Admin\Auth\LoginController::class, 'logout'])->name('logout');
});

Route::group([
    'middleware' => [
        'auth:admin',
    ],
], function () {
    Route::get('/', [App\Http\Controllers\Admin\AdminController::class, 'index'])->name('home');
    Route::get('home', [App\Http\Controllers\Admin\AdminController::class, 'index'])->name('home');
    Route::get('dashboard', [App\Http\Controllers\Admin\AdminController::class, 'index'])->name('home');
    //activities
    Route::resource('/products', ProductsController::class);
    Route::resource('/category', CategoriesController::class);
    Route::resource('/users', UsersController::class);
    Route::resource('/brand', BrandsController::class);
    Route::resource('/cupons', CuponsController::class);
    Route::get('/cupons/active/{id}', [App\Http\Controllers\Admin\CuponsController::class, 'Active']);
    Route::get('/cupons/inactive/{id}', [App\Http\Controllers\Admin\CuponsController::class, 'InActive']);
    Route::get('/orders',[OrdersController::class, 'index']);
    Route::get('/orders/{order_id}/details',[OrdersController::class, 'orderDetails']);

});