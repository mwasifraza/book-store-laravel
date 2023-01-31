<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\{Password, Hash, Mail, DB, Crypt};
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Str;
use App\Models\User;
use Carbon\Carbon;

class ResetPasswordTokenController extends Controller
{
    public function request(){
        return view('auth.forgot-password');
    }

    public function email(Request $request){
        $request->validate(['email' => 'required|email']);

        $user = User::where('email', $request->email)->first();

        if(is_null($user)){
            return back()->withErrors(['email' => "User does not exist!"]);
        }

        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => rand(1001,9999),
            'created_at' => Carbon::now()
        ]);

        $code = DB::table('password_resets')->where('email', $request->email)->first();

        $data = [
            'name' => $user->firstname,
            'email' => $user->email,
            'code' => $code->token,
        ];

        try{
            Mail::send('emails.reset-password', $data, function ($message) use ($data) {
                $message->from("info@onlinebook.com", "Online Book Store");
                $message->to($data['email'])->subject("Password Reset Code");
            });
            session()->put('resetting-user', $user->id);
            return redirect()->route('password.verify');
        }catch (\Exception $exception){
            dd("Exception: ".$exception->getMessage());
        }
    }

    public function verify(Request $request){
        if(!session()->missing('resetting-user')){
            $id = session()->get('resetting-user');
            $user = User::find($id);
            session()->forget('resetting-user');
            return view('auth.reset-code', ['email' => $user->email]);
        }else{
            return redirect()->route('password.request');
        }
    }

    public function verify_code(Request $request){
        $request->validate([
            'code' => "required|numeric"
        ]);

        $reset_attempt = DB::table('password_resets')->where('email', $request->email)->first();
        if(!is_null($reset_attempt)){
            if($reset_attempt->token === $request->code){
                // DB::table('password_resets')->where('email', $request->email)->delete();
                return redirect()->route('password.reset', ['token' => Crypt::encryptString($request->code), 'e' => $request->email]);
            }else{
                return back()->withErrors(['code' => 'Code is invalid.']);
            }
        }else{
            return back()->withErrors(['code' => 'Code is invalid.']);
        }
    }

    public function reset($token){
        return view('auth.reset', ['token' => $token]);
    }

    public function update(Request $request){
        $request->validate([
            'token' => 'required',
            // 'email' => 'required|email',
            'password' => 'required|min:4|confirmed',
        ]);

        $token = Crypt::decryptString($request->token);

        $tokenData = DB::table('password_resets')->where('token', $token)->first();

        if(!$tokenData) return back()->withErrors(['password' => "invalid token id"]);
       
        $user = User::where('email', $tokenData->email)->first();

        if(!$user) return back()->withErrors(['password' => "user not found"]);

        $user->password = Hash::make($request->password);
        $user->update();

        DB::table('password_resets')->where('email', $user->email)->delete();

        return redirect()->route('home.view', ['msg' => 'password has been reset.']);

    }
}
