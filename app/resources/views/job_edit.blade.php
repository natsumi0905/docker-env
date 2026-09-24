@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-body">
                    <form method="POST" action="{{ route('job.update',['job' => $job['id']]) }}" enctype="multipart/form-data" >
                        @csrf
                        @method('PUT')

                        <div class="row mb-3">
                            <label for="title" class="col-md-4 col-form-label text-md-end ">{{ __('求人タイトル') }}</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ $job['title'] }}">
                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="job_description" class="col-md-4 col-form-label text-md-end">{{ __('業務内容詳細') }}</label>

                            <div class="col-md-6">
                                <input id="job_description" type="text" class="form-control @error('job_description') is-invalid @enderror" name="job_description" value="{{$job['job_description']}}" >
                                @error('job_description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="location" class="col-md-4 col-form-label text-md-end">{{ __('勤務地') }}</label>

                            <div class="col-md-6">
                                <select name='location' class="form-control @error('location') is-invalid @enderror" >
                                    @foreach (Config::get('workplace_type') as $key => $val)
                                     @if($key == $job['location'])
                                       <option value="{{ $key }}" selected>{{ $val }}</option>
                                     @else
                                     <option value="{{ $key }}">{{ $val }}</option>
                                     @endif
                                    @endforeach
                                </select>
                                @error('location')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                             <label for="employment_type" class="col-md-4 col-form-label text-md-end">雇用形態</label>
                            <div class="col-md-6">
                                <select name='employment_type' class="form-control @error('employment_type') is-invalid @enderror" >
                                    <option value="" hidden>選択してください</option>
                                    @foreach (Config::get('employment_type') as $key => $val)
                                     @if($key == $job['employment_type'])
                                       <option value="{{ $key }}" selected>{{ $val }}</option>
                                     @else
                                     <option value="{{ $key }}">{{ $val }}</option>
                                     @endif
                                    @endforeach
                                </select>
                                @error('employment_type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="salary_range" class="col-md-4 col-form-label text-md-end">{{ __('給与レンジ') }}</label>

                            <div class="col-md-6">
                                <select name='salary_range' class="form-control @error('salary_type') is-invalid @enderror" >
                                    <option value="" hidden>選択してください</option>
                                    @foreach (Config::get('salary_type') as $key => $val)
                                     @if($key == $job['salary_range'])
                                       <option value="{{ $key }}" selected>{{ $val }}</option>
                                     @else
                                     <option value="{{ $key }}">{{ $val }}</option>
                                     @endif
                                    @endforeach
                                </select>
                                @error('salary_range')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="image" class="col-md-4 col-form-label text-md-end">{{ __('イメージ画像') }}</label>

                            <div class="col-md-6">
                                <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image" >
                                @error('image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                        </div>
                    
                        <div class="text-center  d-flex justify-content-center ">
                                <button type="submit" class="btn btn-primary me-4">
                                    {{ __('更新') }}
                                </button>
                           
                    </form>
                                <form action="{{ route('softdelete.job',['job' => $job['id']]) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-danger" onclick='return confirm("本当に削除しますか？")'>
                                        {{ __('削除') }}
                                    </button>
                                </form>
                        </div>
                </div>
            </div>
            <div class="text-center mt-4">
                <a href="{{ route('company_mypage') }}">
                    {{ __('マイページに戻る') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection