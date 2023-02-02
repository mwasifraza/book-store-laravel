<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\VerifyEmailController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\ResetPasswordTokenController;

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

Route::controller(DashboardController::class)->prefix('{role}')->middleware(['auth', 'role.param', 'verified'])->group(function(){
    // user settings
    Route::get('/settings', 'settings')->name('settings');
    Route::post('/settings/profile', 'update_profile')->name('update.profile');
    Route::post('/settings/account', 'update_account')->name('update.account');
    Route::post('/settings/password', 'update_password')->name('update.password');
    // read notification
    Route::get('notification/read/{id}', 'markAsRead')->name('markAsRead');
    // update avatar
    Route::get('/upload/avatar', 'upload')->name('upload.avatar');
    Route::post('/upload/avatar', 'upload_avatar')->name('upload.action');
    Route::post('/remove/avatar', 'remove_avatar')->name('remove.action');
    // logout
    Route::get('/logout', 'logout')->name('logout')->withoutMiddleware(['verified']);
});


Route::controller(UserDashboardController::class)->prefix('user')->middleware(['auth.user', 'verified'])->group(function(){
    // user dashboard
    Route::get('/dashboard', 'index')->name('user.dashboard');
});


Route::controller(AdminDashboardController::class)->prefix('admin')->middleware(['auth.admin', 'verified'])->group(function(){
    // admin dashboard
    Route::get('/dashboard', 'index')->name('admin.dashboard');
    Route::get('/dashboard/books', 'all_books')->name('admin.books.page');
    Route::get('/dashboard/books/add', 'add_book')->name('admin.book.add.page');
    Route::post('/dashboard/books/add', 'add_book_action')->name('admin.book.add.action');
    Route::get('/dashboard/books/update/{id}', 'update_book')->name('admin.book.update.page');
    Route::post('/dashboard/books/update/{id}', 'update_book_action')->name('admin.book.update.action');
    Route::get('/dashboard/books/remove/{id}', 'remove_book_action')->name('admin.book.remove.action');

    Route::get('/dashboard/categories', 'all_categories')->name('admin.categories.page');
    Route::get('/dashboard/categories/add', 'add_category')->name('admin.category.add.page');
    Route::post('/dashboard/categories/add', 'add_category_action')->name('admin.category.add.action');
    Route::get('/dashboard/categories/update/{id}', 'update_category')->name('admin.category.update.page');
    Route::post('/dashboard/categories/update/{id}', 'update_category_action')->name('admin.category.update.action');
    Route::get('/dashboard/categories/remove/{id}', 'remove_category_action')->name('admin.category.remove.action');

    Route::get('/dashboard/users', 'users')->name('admin.users.page');
});

// Forget password with 4-digit code, but need some upgradation
// Route::controller(ResetPasswordTokenController::class)->name('password.')->middleware('guest')->group(function(){
//     // send password reset link
//     Route::get('/forgot-password', 'request')->name('request');
//     Route::post('/forgot-password', 'email')->name('email');
//     // code verify
//     Route::get('/forgot-password/recover', 'verify')->name('verify');
//     Route::post('/forgot-password/recover', 'verify_code')->name('verify.code');
//     // reset password
//     Route::get('/reset-password/{token}', 'reset')->name('reset');
//     Route::post('/reset-password', 'update')->name('update');
// });

Route::controller(ResetPasswordController::class)->name('password.')->middleware('guest')->group(function(){
    // send password reset link
    Route::get('/forgot-password', 'request')->name('request');
    Route::post('/forgot-password', 'email')->name('email');
    // reset password
    Route::get('/reset-password/{token}', 'reset')->name('reset');
    Route::post('/reset-password', 'update')->name('update');
});