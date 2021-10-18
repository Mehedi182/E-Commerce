<?php


use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::group([
    'namespace' => 'Auth',
], function () {

    // Authentication Routes...
    Route::get('login', [App\Http\Controllers\User\auth\LoginController::class, 'showLoginForm'])->name('login_page');
    Route::post('login', [App\Http\Controllers\User\auth\LoginController::class, 'login'])->name('login');
    Route::post('logout', [App\Http\Controllers\User\auth\LoginController::class, 'logout'])->name('logout');

    // Registration Routes...
    Route::get('register', [App\Http\Controllers\User\auth\RegisterController::class, 'showRegistrationForm'])->name('register_page');
    Route::post('register', [App\Http\Controllers\User\auth\RegisterController::class, 'register'])->name('register');
    Route::get('register/activate/{token}', [App\Http\Controllers\User\auth\RegisterController::class, 'confirm'])->name('email_confirm');

    // Password Reset Routes...
    Route::get('password/reset', [App\Http\Controllers\User\auth\ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
    Route::post('password/email', [App\Http\Controllers\User\auth\ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
    Route::get('password/reset/{token}', [App\Http\Controllers\User\auth\ResetPasswordController::class, 'showResetForm'])->name('password.reset');
    Route::post('password/reset',[App\Http\Controllers\User\auth\ResetPasswordController::class, 'reset']);

});

Route::get('/home', [App\Http\Controllers\User\UserController::class, 'index'])->name('home');