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
        $jobs = $company->jobs->where('del_flg', 0);

        foreach($jobs as $job){
            $job->count_company =  Application::where('job_id', $job->id)->count();
            $job->passcount_company = Application::where('job_id', $job->id)->whereIn('status',[1,2])->count();
        }

        return view('company_mypage',compact('company','jobs'));

    }

   
}
