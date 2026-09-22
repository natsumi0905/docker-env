<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class ResetPasswordController extends Controller
{
    public function showResetForm($token){
    $user = User::where('pass_token', $token)->first();

    if (!$user) {
        return redirect()->route('password.request')
            ->withErrors([
                'email' => 'このパスワードリセットトークンは無効です。',
            ]);
    }

    return view('auth.passwords.reset', [
        'token' => $token,
        'email' => $user->email,
    ]);
}

public function reset(Request $request)
{
    $user = User::where('pass_token', $request->token)->first();

    if (!$user) {
        return back()->withErrors([
            'email' => 'このメールアドレスは無効です。',
        ]);
    }

    $request->validate([
        'password' => 'required|confirmed',
    ]);

    $user->password = Hash::make($request->password);
    $user->pass_token = null;
    $user->save();

    return redirect('/login');
}
}
