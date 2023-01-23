<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\SignupRequest;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index(){
        return view('register');
    }

    public function register(SignupRequest $request){
        $request->merge(['phone' => $request->countrycode.$request->phone]);
        $request->merge(['password' => Hash::make($request->password)]);
        $user = User::create($request->all());
        return redirect()->route('register.view', ['msg' => 'inserted successfully']);
    }
}
