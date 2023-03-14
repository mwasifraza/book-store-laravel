<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        return view('home');
    }

    public function login(LoginRequest $request){
        if (Auth::attempt(['username'=>$request->username, 'password'=>$request->password, 'role' => User::ROLE_USER])) {
            $request->session()->regenerate();
            return redirect()->route('user.dashboard');
        }
        return back()->withErrors([
            'password' => 'Invalid username or password.',
        ])->onlyInput('username');
    }

    public function admin(){
        return view('admin.login');
    }

    public function admin_login(LoginRequest $request){
        if (Auth::attempt(['username'=>$request->username, 'password'=>$request->password, 'role' => User::ROLE_ADMIN])) {
            $request->session()->regenerate();
            return redirect()->route('admin.dashboard');
        }
        return back()->withErrors([
            'password' => 'Invalid username or password.',
        ])->onlyInput('username');
    }
}