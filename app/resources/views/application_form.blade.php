@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"></div>

                <div class="card-body">
                    <form method="POST" action="{{ route('application.store',['id'=> $job->id]) }}" enctype="multipart/form-data" >
                        @csrf

                        <div class="row mb-3">
                            <label for="motivation" class="col-md-4 col-form-label text-md-end ">{{ __('志望動機') }}</label>

                            <div class="col-md-6">
                                <textarea id="motivation"  class="form-control " name="motivation" ></textarea>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('メールアドレス') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control" name="email" value="{{$user->email}}">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="tell" class="col-md-4 col-form-label text-md-end">{{ __('電話番号') }}</label>

                            <div class="col-md-6">
                                <input id="tell" type="text" class="form-control"  name="tell" value="{{$user->tell}}">
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