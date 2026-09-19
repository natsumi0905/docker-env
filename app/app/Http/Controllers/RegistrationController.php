<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Job;


class RegistrationController extends Controller
{ 
    //一般ユーザープロフィール編集画面表示・編集
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
    //企業プロフィール編集画面表示・編集
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

    //ユーザー退会
    public function withdraw(){

        $user = Auth::user();

        return view('withdraw',[
            'user' => $user,
        ]);
    }

    public function softdeleteUser(){

        $user = Auth::user();

        $user->del_flg=1;
        $user->save();
        
        Auth::logout();
        return redirect('/login');
        
     }

    //ユーザー退会キャンセル
    public function withdrawCancel(){

        $user = Auth::user();

        if($user->role==0){
            return redirect('/home');
        }
        if($user->role==1){
            return redirect('/company_mypage');
        }
    }
    
    //求人検索画面
    public function jobSearch(){
        
        $user = Auth::user();
        $job = Job::where('del_flg', 0)->get();
                
        return view('job_search',[
            'user' => $user,
            'jobs' => $job,
        ]);
    }

}
