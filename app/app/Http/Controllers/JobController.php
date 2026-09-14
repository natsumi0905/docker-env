<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Job;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('job_post');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $job = new Job;

        $job->title = $request->title;
        $job->job_description = $request->job_description;
        $job->location = $request->location;
        $job->employment_type = $request->employment_type;
        $job->salary_range = $request->salary_range;
        
        if ($request->hasFile('image')) {
            $image = $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public', $image);

            $job->image ='/storage/'.$image;
        }        
        
        Auth::user()->jobs()->save($job);

        return redirect('company_mypage');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $job = Job::find($id);

        return view('job_edit',[
            'job' => $job,
        ]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {   
        $job = Job::find($id);

        $job->title = $request->title;
        $job->job_description = $request->job_description;
        $job->location = $request->location;
        $job->employment_type = $request->employment_type;
        $job->salary_range = $request->salary_range;

        if ($request->hasFile('image')) {
            $image = $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public', $image);

            $job->image ='/storage/'.$image;
        } 

        $job->save();

        return redirect('company_mypage');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    
    public function softdeleteJob(Job $job){

        $job->del_flg=1;
        $job->save();

        return redirect('/company_mypage')->with('successMessage', '削除');;
     }
}
