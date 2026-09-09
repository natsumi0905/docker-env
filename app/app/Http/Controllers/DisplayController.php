<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Application;
use App\Models\Bookmark;
use App\Models\Job;


class DisplayController extends Controller
{
    public function index(){

    $application = new Application;
    $applications = $application->all();

    //$application_with_user = $application->with('user')->first()->toArray();
    //var_dump($application_with_user);
    }
}
