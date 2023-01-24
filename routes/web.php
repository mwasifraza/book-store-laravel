<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\VerifyEmailController;
use App\Http\Controllers\ResetPasswordController;

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

Route::controller(RegisterController::class)->middleware('guest')->group(function(){
    Route::get('/register', 'index')->name('register.view');
    Route::post('/register', 'register')->name('register.action');

    Route::get('/view', 'view')->name('view');
});


Route::controller(VerifyEmailController::class)->prefix('/email')->name('verification.')->group(function(){
    // show notice and send email for verification
    Route::get('/verify', 'notice')->middleware('auth')->name('notice');
    // verify email
    Route::get('/verify/{id}/{hash}', 'verify')->middleware(['auth','signed'])->name('verify');
    // resend verification email
    Route::post('/verification-notification', 'send')->middleware(['auth','throttle:6,1'])->name('send');
});


Route::controller(LoginController::class)->middleware('guest')->group(function(){
    // user login routes
    Route::get('/', 'index')->name('home.view');
    Route::post('/', 'login')->name('login.action');
    // admin login routes
    Route::get('/admin', 'admin')->name('admin.view');
    Route::post('/admin', 'admin_login')->name('admin.login');
});


Route::controller(UserDashboardController::class)->middleware(['auth', 'verified'])->group(function(){
    // user dashboard
    Route::get('/dashboard', 'index')->name('dashboard');
    //settings
    Route::get('/settings', 'settings')->name('settings');
    Route::post('/settings/profile', 'update_profile')->name('update.profile');
    // logout
    Route::get('/logout', 'logout')->name('logout')->withoutMiddleware('verified');
});


Route::controller(AdminDashboardController::class)->middleware(['auth'])->group(function(){
    // admin dashboard
    Route::get('/admin/dashboard', 'index')->name('admin.dashboard');
});


Route::controller(ResetPasswordController::class)->name('password.')->middleware('guest')->group(function(){
    // send password reset link
    Route::get('/forgot-password', 'request')->name('request');
    Route::post('/forgot-password', 'email')->name('email');
    // reset password
    Route::get('/reset-password/{token}', 'reset')->name('reset');
    Route::post('/reset-password', 'update')->name('update');
});