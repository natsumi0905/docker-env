@extends('layouts.app')

@section('content')

@if (session('status'))
    <svg xmlns="http://www.w3.org/2000/svg" class="d-none">
        <symbol id="check-circle-fill" viewBox="0 0 16 16">
            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
        </symbol>
    </svg>

    <div id="success-alert" class="alert alert-success d-flex align-items-center" role="alert">
     <svg class="bi flex-shrink-0 me-2"  width="16" height="16" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
    <div>
      応募が完了しました！
    </div>
    <button type="button" class="btn-close  ms-auto" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

    <script>
        setTimeout(function () {
            document.getElementById('success-alert').remove();
        }, 3000);
    </script>
    

@endif
 
<div class="container text-end">
<div class="d-inline-flex focus-ring py-1 px-2 text-decoration-none border rounded-2 mb-3 ">   
    <a href="{{ route('user_mypage') }}" class="text-decoration-none">
       <i class="bi bi-person-circle"></i>{{ __('マイページに戻る') }}
    </a>
</div>


 <div class="search">
        <form action="{{ route('job.search') }}" method="GET">

                
        <div class="card shadow-sm border-0 mb-4">
            <div class=" form-group row text-center mb-3">
                <div class="col-3">
                    <div>
                        <i class="bi bi-search"></i>　
                        <input type="text" name="keyword" value="{{ $keyword }}" placeholder="キーワード検索" >
                    </div>
                    </label>
                </div>
              <div class="col-md-3 ">
                    <div>
                        <i class="bi bi-geo-alt"></i>
                        <label  label for=""  class="form-label fw-bold">勤務地
                        <select name='location' >
                            <option value="" >指定なし</option>
                             @foreach (Config::get('workplace_type') as $key => $val)
                            <option value="{{ $key }}"  @if($location !== null && $location == $key) selected @endif>
                                {{ $val }}
                            </option>
                            @endforeach
                        </select>
                        </label>
                    </div>
                </div>

                <div class="col-3">
                    <div>
                        <i class="bi bi-person-fill"></i>
                        <label for="" class="form-label fw-bold">雇用形態
                        <select name='employment_type' >
                            <option value="">指定なし</option>
                            @foreach (Config::get('employment_type') as $key => $val)
                            <option value="{{ $key }}"  
                            @if($employmentType !== null && $employmentType == $key) selected @endif>
                            {{ $val }}
                            </option>
                            @endforeach
                        </select>
                        </label>
                    </div>
                </div>

                <div class="col-3">
                    <div>
                        <i class="bi bi-currency-yen"></i>
                        <label for="" class="form-label fw-bold">給与レンジ
                        <select name='salary_range' >
                            <option value="" >指定なし</option>
                            @foreach (Config::get('salary_type') as $key => $val)
                            <option value="{{ $key }}" @if($salaryRange !== null && $salaryRange == $key) selected @endif>
                                {{ $val }}
                            </option>
                             @endforeach
                        </select>
                        </label>
                    </div>
                </div>
            </div>
            <div class="text-center mb-3 d-grid gap-2 col-6 mx-auto " >
                <button type="submit" class="btn btn-primary"><i class="bi bi-search"></i>　検索</button>
            </div>
        </div>
        </form>
    </div>
</div>
<div class="container">
    <div>
       
        @forelse($jobs as $job)
                <a href="{{ route('job.detail',['id'=> $job->id]) }}" class="card mb-3 text-decoration-none">
                    <div class="text-center">
                        <div class="card-body shadow-sm">
                            <div class="row align-items-center ">
                           <div class="profile-picture col-md-4 ">
                              <img class="img-fluid cursor_pointer object-fit-cover border rounded" src="{{ $job['image'] }}" alt="Profile Picture">
                           </div>

                           <div class ="col-md-7">
                              <p class="card-text text-muted mb-2 bg-primary-subtle rounded-3 px-3 py-1 d-inline-block">{{ $job->user->company_name }}</p>
                              <h2 class="card-title">{{ $job -> title}}</h2>
                              <p class="card-text"><i class="bi bi-geo-alt"></i>{{ Config::get('workplace_type')[$job->location] }}｜<i class="bi bi-person-fill"></i>{{ Config::get('employment_type')[$job->employment_type] }}｜<i class="bi bi-currency-yen"></i>{{ Config::get('salary_type')[$job->salary_range] }}</p>
                              <p class="card-text text-muted">{{ Str::limit($job->job_description, 20) }}</p>
                              <span class="text-primary">詳細を見る →</span>
                           </div>
                       </div>
                        </div>
                    </div>
                </a>
         @empty
        <div class="text-center mt-5">
            <p>条件に一致する求人がありません。</p>
        </div>
     @endforelse
    </div>

</div>

@endsection
