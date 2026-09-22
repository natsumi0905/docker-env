@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"></div>

                <div class="card-body">
                    <form method="POST" action="{{ route('job.store') }}" enctype="multipart/form-data" >
                        @csrf

                        <div class="row mb-3">
                            <label for="title" class="col-md-4 col-form-label text-md-end ">{{ __('求人タイトル') }}</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control " name="title" >
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="job_description" class="col-md-4 col-form-label text-md-end">{{ __('業務内容詳細') }}</label>

                            <div class="col-md-6">
                                <input id="job_description" type="text" class="form-control" name="job_description" >
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="location" class="col-md-4 col-form-label text-md-end">{{ __('勤務地') }}</label>
                            <div class="col-md-6">
                                <select name='location' class='form-control' >
                                    <option value="" hidden>選択してください</option>
                                    @foreach (Config::get('workplace_type') as $key => $val)
                                       <option value="{{ $key }}">{{ $val }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                             <label for="employment_type" class="col-md-4 col-form-label text-md-end">雇用形態</label>
                            <div class="col-md-6">
                                <select name='employment_type' class='form-control' >
                                    <option value="" hidden>選択してください</option>
                                    @foreach (Config::get('employment_type') as $key => $val)
                                       <option value="{{ $key }}">{{ $val }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="salary_range" class="col-md-4 col-form-label text-md-end">{{ __('給与レンジ') }}</label>

                            <div class="col-md-6">
                                <select name='salary_range' class='form-control' >
                                    <option value="" hidden>選択してください</option>
                                    @foreach (Config::get('salary_type') as $key => $val)
                                       <option value="{{ $key }}">{{ $val }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="image" class="col-md-4 col-form-label text-md-end">{{ __('イメージ画像') }}</label>

                            <div class="col-md-6">
                                <input id="image" type="file" class="form-control" name="image" >
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('登録') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection