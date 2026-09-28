@extends('layouts.app')

@section('content')

<div class="container">
    <div class="card mt-4">
        <div class="card-body p-4">
            <div class="text-center mb-4">              

                <a href="{{ route('company.edit') }}" class="btn btn-link">
                    <i class="bi bi-building"></i>企業情報編集
                </a>

                <div class="bg-light rounded-3 p-3 mb-4 text-center">
                     <div class="fw-bold fs-4">{{ $company->company_name }}</div>
                     <div class="text-muted">
                        {{ $company->name }}｜{{ $company->email }}
                     </div>
                </div>
                
            </div>
            <div class="text-center mb-4">
                <a href="{{ route('job.create') }}" class="btn btn-primary">
                   <i class="bi bi-plus-circle"></i>　{{ __('新規求人投稿') }}　　
                </a>
            </div>
            <div class="d-flex align-items-center mb-3">
                 <h6 class="fw-bold mb-0">
                    <i class="bi bi-briefcase-fill"></i>　掲載中の求人一覧
                 </h6>
                 <hr class="flex-grow-1 ms-3">
            </div>
        @foreach($jobs as $job)
            <div class="card mb-4 shadow-sm text-center">
                    <div class="card-body">

                        <div class="row align-items-center ">
                           <div class="profile-picture col-md-3 ">
                              <img class="img-fluid cursor_pointer object-fit-cover border rounded" src="{{ $job['image'] }}" alt="Profile Picture">
                           </div>

                           <div class ="col-md-6">
                              <p class="text-muted mb-1 bg-primary-subtle rounded-3 px-3 py-1 d-inline-block">{{ $company->company_name }}</p>
                              <h2 class="fw-bold">{{ $job -> title}}</h2>
                              <p class="text-muted"><i class="bi bi-geo-alt"></i>{{ Config::get('workplace_type')[$job->location]}}｜<i class="bi bi-person-fill"></i>{{ Config::get('employment_type')[$job->employment_type] }}｜<i class="bi bi-currency-yen"></i>{{ Config::get('salary_type')[$job->salary_range] }}</p>

                               <div class="mt-3">       
                                  <a href="{{ route('job.edit',['job'=>$job['id']]) }}" class="me-3">
                                      <i class="bi bi-pencil"></i>編集
                                  </a>

                                  <a href="{{ route('applicant.list',['id' => $job->id]) }}">
                                      <i class="bi bi-people"></i>応募者一覧
                                  </a>
                               </div>
                            </div>   

                    <div class="col-md-2 text-center bg-primary-subtle rounded-2 p-1">
                        <div class="border rounded-1 p-1 ">
                            
                            <div class="fs-7 fw-bold">
                                応募合計：{{ $job->count_company }}</br>
                                通過合計：{{$job->passcount_company}}
                            </div>
                        </div>
                    </div>

                    </div>
                </div>
            </div>
        @endforeach
        </div>
    </div>
    <div class="text-center mt-4">
        <a href="{{ route('withdraw') }}" class="btn btn-outline-primary">
            <i class="bi bi-person-x"></i>退会　　
        </a>
    </div>

</div>

@endsection
