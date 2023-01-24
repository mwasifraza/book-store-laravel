<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserLoginController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\VerifyEmailController;

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

Route::controller(UserLoginController::class)->middleware('guest')->group(function(){
    Route::get('/', 'index')->name('home.view');
    Route::post('/', 'login')->name('login.action');
});

Route::controller(RegisterController::class)->middleware('guest')->group(function(){
    Route::get('/register', 'index')->name('register.view');
    Route::post('/register', 'register')->name('register.action');
});

Route::controller(VerifyEmailController::class)->prefix('/email')->name('verification.')->group(function(){
    // show notice and send email for verification
    Route::get('/verify', 'notice')->middleware('auth')->name('notice');
    // verify email
    Route::get('/verify/{id}/{hash}', 'verify')->middleware(['auth','signed'])->name('verify');
    // resend verification email
    Route::post('/verification-notification', 'send')->middleware(['auth','throttle:6,1'])->name('send');
});

Route::controller(UserDashboardController::class)->middleware(['auth', 'verified'])->group(function(){
    // user dashboard
    Route::get('/dashboard', 'index')->name('dashboard');
    // logout
    Route::get('/logout', 'logout')->name('logout')->withoutMiddleware('verified');
});
