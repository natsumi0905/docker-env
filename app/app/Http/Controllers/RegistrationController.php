<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;

class RegistrationController extends Controller
{
 
    public function userRegister(Request $request){
        $user = new User;

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->role = 0;

        $user->save();
        Auth::login($user);

        return redirect('user_mypage');
    }


    public function companyRegister(Request $request){
        $user = new User;

        $user->company_name = $request->company_name;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->role = 1;


        $user->save();
        Auth::login($user);

        return redirect('company_mypage');
    }
}
