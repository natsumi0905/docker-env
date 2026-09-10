<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Application;
use App\Models\Bookmark;
use App\Models\Job;
use Illuminate\Support\Facades\Auth;


class DisplayController extends Controller
{
    public function index(){

    $application = new Application;
    $applications = $application->all();

    //$application_with_user = $application->with('user')->first()->toArray();
    //var_dump($application_with_user);
    }

    public function companySignup(){
        return view('company_signup');
    }

    public function userSignup(){
        return view('auth.user_signup');
    }

    public function companyMypage(){
        $company = Auth::user();

        return view('company_mypage',[
            'company'=>$company,
        ]);
    }

      public function userMypage(){
        $user = Auth::user();

        return view('user_mypage',[
            'user'=>$user,
        ]);
    }
}
