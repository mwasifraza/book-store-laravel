<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserLoginController;
use App\Http\Controllers\UserDashboardController;

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

Route::controller(UserLoginController::class)->group(function(){
    Route::get('/', 'index')->name('home.view');
    Route::post('/', 'login')->name('login.action');

    Route::get('/logout', 'logout')->name('logout');
});

Route::controller(RegisterController::class)->group(function(){
    Route::get('/register', 'index')->name('register.view');
    Route::post('/register', 'register')->name('register.action');
});

Route::controller(UserDashboardController::class)->group(function(){
    Route::get('/dashboard', 'index')->name('dashboard');
});
