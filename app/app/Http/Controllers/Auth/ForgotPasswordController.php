<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Str;
use App\Mail\PasswordResetMail;
use Illuminate\Support\Facades\Mail;

class ForgotPasswordController extends Controller
{
    public function showLinkRequestForm()
    {
        return view('auth.passwords.email');
    }

    public function sendResetLinkEmail(Request $request){

        $user = User::where('email', $request->email)->first();

        if(!$user){
            return back()->withErrors([
                'email'=>'ユーザーが見つかりません'
            ]);
        }

        $user->pass_token = Str::random(100);
        $user->save();

        $resetUrl = url('/password/reset/' . $user->pass_token);
        
        Mail::to($user->email)->send(new PasswordResetMail($resetUrl));

        return back()->with('status', 'メールを送信しました');
    }
}
