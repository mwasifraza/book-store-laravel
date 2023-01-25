<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index(){
        return view('admin.dashboard', ['user' => Auth::user()]);
    }
}
