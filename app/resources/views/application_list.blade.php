@extends('layouts.app')

@section('content')

<div class="container">
    <div class="card mt-2">
        <div class="border p-4">
        @foreach($applications as $application)
                <a href="{{route('job.detail',['id'=> $application->job->id])}}" class="card mb-3">
                    <div class="text-center">
                        <div class="card-body">
                            <div class="row align-items-center ">
                           <div class="profile-picture col-md-4 ">
                              <img class="img-fluid cursor_pointer" src="{{ $application->job->image }}" alt="Profile Picture">
                           </div>

                           <div class ="col-md-7">
                              <p>{{ $application->job->company_name}}</p>
                              <h1>{{ $application->job->title}}</h1>
                              <p>{{ $application->created_at }}｜{{ Config::get('application_status')[$application->status] }}</p>
                           </div>
                       </div>
                        </div>
                    </div>
                </a>
        @endforeach
        </div>
    </div>
</div>
<div class="text-center">
    <a href="{{ route('user_mypage') }}">
       {{ __('マイページに戻る') }}
    </a>
</div>

@endsection