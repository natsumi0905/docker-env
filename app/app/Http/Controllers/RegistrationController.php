<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Job;
use App\Models\Application;
use App\Models\Bookmark;


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

        return redirect('company_mypage');
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
    public function jobSearch(Request $request){
        
        $user = Auth::user();

        $keyword = $request->input('keyword');
        $location = $request->input('location');
        $employmentType = $request->input('employment_type');
        $salaryRange = $request->input('salary_range');
        
        $query = Job::where('del_flg', 0);
        
        //検索機能↓
        if(!empty($keyword)) {
            $query->where(function ($query)use($keyword){
                $query->where('title', 'LIKE', "%{$keyword}%")
                ->orWhere('job_description', 'LIKE', "%{$keyword}%")
                ->orWhereHas('user', function ($query) use ($keyword){
                    $query->where('company_name', 'LIKE', "%{$keyword}%");
                });
            });
        }

        if($location !== null && $location !== '') {
            $query->where('location',  $location);
        }

        if($employmentType !== null && $employmentType !== '') {
            $query->where('employment_type',$employmentType);
        }

        if($salaryRange !== null && $salaryRange !== '') {
            $query->where('salary_range',  $salaryRange);
        }

        $job = $query->get();
                
        return view('job_search',[
            'user' => $user,
            'jobs' => $job,
            'keyword' => $keyword,
            'location' => $location,
            'employmentType' => $employmentType,
            'salaryRange' => $salaryRange,
        ]);
    }
    
    //求人検索画面詳細
    public function jobDetail($id){
        
        $job=job::find($id);
        $user = Auth::user();

        $bookmark = null;
        
        if(Auth::check()){
          $bookmark = Bookmark::where('user_id', $user->id)->where('job_id', $job->id)->first();
        }

        return view('job_detail',compact('job','user','bookmark'));
    }
    
    public function applicationForm($id){

        $job = Job::find($id);
        $user = Auth::user();

        return view('application_form',compact('job','user'));
    }

    public function applicationStore(Request $request, $id){
        
        $user = Auth::user();

        $application = new Application();

        $application->job_id = $id;
        $application->motivation = $request->motivation;
        $application->email = $request->email;
        $application->tell = $request->tell;
        $application->status = 0;
        $application->user_id = $user -> id;

        $application ->save();

        return redirect('home');

    }
    
    //求人応募済一覧
    public function applicationList(){

        $applications = Auth::user()->applications()->whereHas('job', function ($query) {
            $query->where('del_flg', 0);
        })->with('job')->get();

        return view('application_list',compact('applications'));
    }

    
    //求人ブックマーク機能
    public function bookmark(Request $request, $id){
        
        $user = Auth::user();

        $bookmark = new Bookmark();

        $bookmark->job_id = $id;
        $bookmark->user_id = $user -> id;

        $bookmark ->save();

        return redirect()->back();

    }
    //ブックマーク済一覧
    public function bookmarkList(){

        $bookmarks = Auth::user()->bookmarks()->with('job')->get();

        return view('book',compact('bookmarks'));
    }

    
       //応募者一覧
    public function applicantList($id){
        $job = Job::find($id);

        $applications = Application::where('job_id',$job->id)->with('user')->get();


        return view('applicant_list',compact('applications'));
    }

    //応募者ステータス変更
    public function  applicantDetail($id){

        $application = Application::with('user', 'job')->find($id);


        return view('applicant_detail',compact('application'));
    }

    public function  applicantEdit(Request $request, $id){

        $application = Application::find($id);

        $application->status = $request -> application_status;

        $application ->save();
        return redirect()->route('applicant.list', ['id' => $application->job_id]);
    }

}
