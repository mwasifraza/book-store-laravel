<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index(){
        return view('admin.dashboard', ['user' => Auth::user()]);
    }

    public function books(){
        return view('admin.books', ['user' => Auth::user()]);
    }

    public function categories(){
        return view('admin.categories', ['user' => Auth::user()]);
    }

    public function users(){
        return view('admin.users', ['user' => Auth::user()]);
    }
}
