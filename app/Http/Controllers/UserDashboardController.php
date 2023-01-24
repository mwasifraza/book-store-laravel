<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateProfileRequest;
use App\Http\Requests\UpdateAccountRequest;
use App\Http\Requests\UpdatePasswordRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserDashboardController extends Controller
{
    public function index(){
        return view('dashboard');
    }

    public function settings(){
        return view('settings', ['user' => Auth::user()]);
    }

    public function update_profile(UpdateProfileRequest $request){
        $request->merge(['phone' => $request->countrycode.$request->phone]);
        User::find(Auth::id())->update($request->all());
        return redirect()->route('dashboard', ['msg' => 'profile updated']);
    }

    public function update_account(UpdateAccountRequest $request){
        User::find(Auth::id())->update($request->all());
        return redirect()->route('dashboard', ['msg' => 'account updated']);
    }

    public function update_password(UpdatePasswordRequest $request){
        $user = User::findOrFail(Auth::id());
        if (Hash::check($request->current_password, $user->password)) { 
            $user->fill([
             'password' => Hash::make($request->new_password)
            ])->save();
         
            return redirect()->route('dashboard', ['msg' => 'password updated']);
        }else{
            return redirect()->back()->withErrors(['current_password' => 'Password does not match.']);
        }
    }

    public function logout(Request $request){
        Auth::logout();
 
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('/');
    }
}
