<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;


class RegistrationController extends Controller
{
    public function profileEdit(){
        
        $user = Auth::user();
        
        return view('profile_edit',[
            'user' => $user,
        ]);
    }

    public function profileUpdate(Request $request){
        $user = Auth::user();

        $columns = ['name','email','tell','self_pr','career'];

        foreach($columns as $column){
            $user->$column = $request->$column;
        }

        $user->save();

        return redirect('/home');
    }

    public function companyEdit(){
        
        $user = Auth::user();
        
        return view('company_edit',[
            'user' => $user,
        ]);
    }

    public function companyUpdate(Request $request){
        $user = Auth::user();

        $columns = ['company_name','name','email'];

        foreach($columns as $column){
            $user->$column = $request->$column;
        }

        $user->save();

        return redirect('/company_mypage');
    }

}
