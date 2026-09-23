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
                                <textarea id="motivation"  class="form-control @error('motivation') is-invalid @enderror"  value="{{  old('motivation')}}" name="motivation" ></textarea>
                                @error('motivation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('メールアドレス') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control @error('email') is-invalid @enderror"  name="email" value="{{$user->email}}">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="tell" class="col-md-4 col-form-label text-md-end">{{ __('電話番号') }}</label>

                            <div class="col-md-6">
                                <input id="tell" type="text" class="form-control @error('tell') is-invalid @enderror"   name="tell" value="{{$user->tell}}">
                                @error('tell')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="text-center">
                                @if ($application)
                                <button type="button" class="btn btn-secondary">
                                   {{ __('応募済の求人') }}
                                </button>
                                @else
                                <button type="submit" class="btn btn-primary">
                                    {{ __('応募する') }}
                                </button>
                                 @endif
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection