<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegistrationController extends Controller
{
    public function userSignup(){
        return view('auth.user_signup');
    }
    public function userRegister(Request $request){
        $user = new User;

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->role = 0;

        $user->save();

        return redirect('/');
    }

    public function companySignup(){
        return view('company_signup');
    }

    public function companyRegister(Request $request){
        $user = new User;

        $user->company_name = $request->company_name;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->role = 1;

        $user->save();

        return redirect('/');
    }
}
