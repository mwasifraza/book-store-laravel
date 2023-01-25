<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateProfileRequest;
use App\Http\Requests\UpdateAccountRequest;
use App\Http\Requests\UpdatePasswordRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    //settings
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


    // avatar
    public function upload(){
        return view('update-avatar');
    }


    public function upload_avatar(Request $request){
        $old_avatar = Auth::user()->avatar;
        $request->validate([
            'avatar' => 'required|max:2048|mimes:jpg,png,jpeg,gif',
        ]);

        $filename = time().'.'.$request->file('avatar')->extension();
        if($path = $request->file('avatar')->storeAs('public/', $filename)){
            $user = User::find(Auth::id())->update(['avatar' => "storage/{$filename}"]);

            if ($old_avatar !== "storage/user.png") {
                unlink($old_avatar);
            }

            return redirect()->route('dashboard', ['msg' => 'uploaded successfully!']);
        }
    }


    public function remove_avatar(){
        $old_avatar = Auth::user()->avatar;
        $user = User::find(Auth::id())->update(['avatar' => "storage/user.png"]);
        if ($old_avatar !== "storage/user.png") {
            unlink($old_avatar);
        }
        return redirect()->route('dashboard', ['msg' => 'profile has been removed']);
    }


    // logout
    public function logout(Request $request){
        Auth::logout();
 
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('/');
    }
}
