<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\LoginController;
use Illuminate\Support\Facades\Auth;


Route::get('/', function () {
    return redirect('/login');
});
Route::prefix('admin')->group(function () {
    Route::resource('/products', ProductsController::class);
    Route::resource('/category', CategoriesController::class);
    Route::resource('/users', UsersController::class);
    Route::get('/home', [App\Http\Controllers\AdminController::class, 'index']);
    Route::get('/', [App\Http\Controllers\Admin\LoginController::class, 'showLoginForm'])->name('admin_login');
    Route::post('/', [App\Http\Controllers\Admin\LoginController::class, 'login']);
});
Route::resource('/products', App\Http\Controllers\Customer\ProductsController::class);

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



