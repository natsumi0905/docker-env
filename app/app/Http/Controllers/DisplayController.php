<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Application;
use App\Models\Bookmark;
use App\Models\Job;
use Illuminate\Support\Facades\Auth;


class DisplayController extends Controller
{


    public function index()
{
    return view('welcome');
}

    //$application_with_user = $application->with('user')->first()->toArray();
    //var_dump($application_with_user);
    public function companyMypage(){
        
        $company = Auth::user();

        return view('company_mypage',compact('company'));

    }

   
}
