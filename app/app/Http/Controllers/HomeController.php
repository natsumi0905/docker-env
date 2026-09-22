<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Application;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();

        $count =  Application::where('user_id', Auth::id())->whereHas('job', function ($query){
            $query->where('del_flg', 0);
        })->count();
        
        $passcount = Application::where('user_id', Auth::id())->whereHas('job', function ($query){
            $query->where('del_flg', 0);
        })
        ->whereIn('status',[1,2])->count();

        return view('home', compact('user','count','passcount'));
    }
}
