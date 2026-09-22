@extends('layouts.app')

@section('content')

<div class="card m-4">
    <div class="text-center">
        <div class="card-body">
            <div class="row align-items-center ">
                <div class="profile-picture col-md-4 ">
                    <img class="img-fluid cursor_pointer" src="{{ $job['image'] }}" alt="Profile Picture">
                </div>

                <div class ="col-md-6">
                    <p>{{ $job ->user->company_name }}</p>
                    <h1>{{ $job -> title}}</h1>
                    <p>{{ Config::get('workplace_type')[$job->location]}}｜{{ Config::get('employment_type')[$job->employment_type] }}｜{{Config::get('salary_type')[$job->salary_range]}}</p>
                </div>
                <div class="col-md-2 ">
                    @if ($bookmark)
                    <button type="button" class="btn btn-primary">
                        ★
                    </button>
                    @else
                    <form method=POST action="{{route('bookmark', ['id' => $job->id])}}">
                    @csrf
                    <button type="submit" class="btn btn-outline-primary">
                      ☆
                    </button >
                    </form>
                    @endif
                </div>

                <div class ="text-center">
                    <p>【業務内容】</p>
                    <p>{{$job -> job_description}}</p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class=" d-flex flex-column align-items-center ">
    <div class="mb-3">
            <a href="{{ route('application.form',['id'=> $job->id]) }}"class="btn btn-primary">
                {{ __('応募する') }}
            </a>
    </div>
            <a href="{{ route('job.search') }}">
               {{ __('求人一覧に戻る') }}
            </a>
</div>

@endsection