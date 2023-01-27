<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use App\Http\Requests\SignupRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function index(){
        return view('register');
    }

    public function register(SignupRequest $request){
        $request->merge(['phone' => $request->countrycode.$request->phone]);
        $request->merge(['password' => Hash::make($request->password)]);
        $user = User::create($request->all());
        Auth::login($user);
        // event(new Registered($user));
        return redirect()->route('user.dashboard', ['msg' => 'inserted successfully']);
    }
}
