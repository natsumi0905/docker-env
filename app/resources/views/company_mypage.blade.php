@extends('layouts.app')

@section('content')

<div class="container">
    <div class="card mt-4">
        <div class="border p-4">
            <div class="text-center mb-4">              

                <a href="{{ route('company.edit') }}" class="btn btn-link">
                    企業情報編集
                </a>

                <div class="border p-3">
                    {{ $company->company_name }}｜{{ $company->name }}｜{{ $company->email }}
                </div>
                
            </div>
            <div class="text-center mb-4">
                <a href="{{ route('job.create') }}" class="btn btn-primary">
                   {{ __('新規求人投稿') }}
                </a>
            </div>
        @foreach($jobs as $job)
            <div class="text-center">
                    <div class="border p-5">
                        <div class="row align-items-center ">
                           <div class="profile-picture col-md-4 ">
                              <img class="img-fluid cursor_pointer" src="{{ $job['image'] }}" alt="Profile Picture">
                           </div>

                           <div class ="col-md-7">
                              <p>{{ $company->company_name }}</p>
                              <h1>{{ $job -> title}}</h1>
                              <p>{{ $job -> location}}｜{{ Config::get('employment_type')[$job->employment_type] }}｜{{ $job->salary_range }}</p>
                           </div>
                       </div>
                        <a href="{{ route('job.edit',['job'=>$job['id']]) }}" class="btn btn-link">
                           編集
                        </a>

                        <a href="#" class="btn btn-link">
                           応募者一覧
                        </a>
                    </div>
            </div>
        @endforeach
        </div>

            <div class="text-center mt-4">

                <a href="#" class="btn btn-link">
                    退会
                </a>

            </div>
    </div>

</div>

@endsection
