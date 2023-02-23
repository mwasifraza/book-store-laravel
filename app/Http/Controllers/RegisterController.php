<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Notifications\NewUserRegistered;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use App\Http\Requests\SignupRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
    public function index(){
        return view('register');
    }

    public function register(SignupRequest $request){
        $request->merge(['phone' => $request->countrycode.$request->phone]);
        $request->merge(['password' => Hash::make($request->password)]);
        $user = User::create($request->all());

        // DB::table('user_notification_settings')->insert([
        //     'user_id' => $user->id,
        //     'muted_notification' => json_encode([]),
        // ]);

        $admin = User::where('role', 'admin')->first();
        $admin->notify(new NewUserRegistered($user));

        Auth::login($user);
        // event(new Registered($user));
        return redirect()->route('user.dashboard', ['msg' => 'created successfully']);
    }
}
