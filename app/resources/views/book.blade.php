@extends('layouts.app')

@section('content')

<div class="container">
    <div class="card mt-2">
        <div class="border p-4">
        @foreach($bookmarks as $bookmark)
                <a href="{{route('job.detail',['id'=> $bookmark->job->id])}}" class="card mb-3">
                    <div class="text-center">
                        <div class="card-body">
                            <div class="row align-items-center ">
                           <div class="profile-picture col-md-4 ">
                              <img class="img-fluid cursor_pointer" src="{{  $bookmark->job->image }}" alt="Profile Picture">
                           </div>

                           <div class ="col-md-7">
                              <p>{{ $bookmark->job->user->company_name}}</p>
                              <h1>{{ $bookmark ->job-> title}}</h1>
                              <p>{{ Config::get('workplace_type')[$bookmark->job->location]}}｜{{ Config::get('employment_type')[$bookmark->job->employment_type] }}｜{{  Config::get('salary_type')[$bookmark->job->salary_range]  }}</p>
                           </div>
                       </div>
                        </div>
                    </div>
                </a>
        @endforeach
        </div>
    </div>
    <div class="text-center">
    <a href="{{ route('user_mypage') }}">
       {{ __('マイページに戻る') }}
    </a>
</div>

</div>

@endsection