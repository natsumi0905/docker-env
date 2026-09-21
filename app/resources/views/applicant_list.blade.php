@extends('layouts.app')

@section('content')

<div class="container">
    <div class="card mt-2">
        <div class="border p-4">
        @foreach($applications as $application)
                <a href="{{route('applicant.detail',['id'=> $application->id])}}" class="card mb-3">
                    <div class="text-center">
                        <div class="card-body">
                              <p>{{ $application->user->name}} | {{ $application->created_at }}｜{{ Config::get('application_status')[$application->status] }}</p>
                       </div>
                    </div>
                </a>
        @endforeach
        </div>
    </div>
</div>
<div class="text-center">
    <a href="{{ route('company_mypage') }}">
       {{ __('マイページに戻る') }}
    </a>
</div>

@endsection