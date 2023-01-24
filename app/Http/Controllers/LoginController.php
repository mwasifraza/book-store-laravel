<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        return view('home');
    }

    public function login(LoginRequest $request){
        if (Auth::attempt(['username'=>$request->username, 'password'=>$request->password, 'role' => 'user'])) {
            $request->session()->regenerate();
            return redirect()->route('dashboard');
        }
        return back()->withErrors([
            'password' => 'Invalid username or password.',
        ])->onlyInput('username');
    }

    public function admin(){
        return view('admin.login');
    }

    public function admin_login(LoginRequest $request){
        if (Auth::attempt(['username'=>$request->username, 'password'=>$request->password, 'role' => 'admin'])) {
            $request->session()->regenerate();
            return redirect()->route('admin.dashboard');
        }
        return back()->withErrors([
            'password' => 'Invalid username or password.',
        ])->onlyInput('username');
    }
}
