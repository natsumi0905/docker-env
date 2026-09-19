@extends('layouts.app')

@section('content')

<div class="container">
    <div class="card mt-4">
        <div class="border p-4">
        @foreach($jobs as $job)
            <div class="text-center">
                    <div class="border p-5 mb-3">
                        <div class="row align-items-center ">
                           <div class="profile-picture col-md-4 ">
                              <img class="img-fluid cursor_pointer" src="{{ $job['image'] }}" alt="Profile Picture">
                           </div>

                           <div class ="col-md-7">
                              <h1>{{ $job -> title}}</h1>
                              <p>{{ $job -> location}}｜{{ Config::get('employment_type')[$job->employment_type] }}｜{{ $job->salary_range }}</p>
                           </div>
                       </div>
                    </div>
            </div>
        @endforeach
        </div>
    </div>

</div>

@endsection
