@extends('layouts.app')

@section('content')

<div class="container">
    <div class="card mt-2 mb-3">
        <div class="border p-4">
                    <div class="text-center">
                        <h1>{{ $application->job->title}}</h1>
                        <div class="card-body">
                              <p>{{ $application->user->name}}　|　{{ $application->user->email }}　|　{{ $application->user->tell }}　|　{{ $application->created_at }}</p>

                       <div class="card mb-3 ">
                              <p>【自己PR】</p>
                              <p>{{ $application->user->self_pr}}</p>
                       </div>
                       <div class="card mb-3">
                              <p>【職務経歴】</p>
                              <p>{{ $application->user->career}}</p>
                       </div>
                       <div class="card ">
                              <p>【志望動機】</p>
                              <p>{{ $application->motivation}}</p>
                       </div>
                       </div>
                    </div>
        </div>
    </div>
</div>
<form action="{{ route('applicant.edit',['id' => $application->id]) }}" method="POST">
    @csrf
<div class="row mb-3">
    <label for="application_status" class="col-md-4 col-form-label text-md-end">応募ステータス</label>
        <div class="col-md-6">
               <select name='application_status' class='form-control' id="application_status" >  
                <option value="" hidden>選択してください</option>  
                     @foreach (Config::get('application_status') as $key => $val)
                <option value="{{ $key }}">{{ $val }}</option>
                     @endforeach
               </select>
        </div>
        <div class="text-center mt-2">
                <div class="text-center">
                     <button type="submit" class="btn btn-primary">
                        更新
                     </button>
                </div>
        </div>
    </form>
</div>
<div class="text-center">
    <a href="{{ route('applicant.list',['id' => $application->job_id]) }}">
       {{ __('応募者一覧へ戻る') }}
    </a>
</div>

@endsection