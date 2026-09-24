@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-body">      
                    <form action="{{ route('application.update',['id'=>$application['id']]) }}" method="POST" >      
                        @csrf          
                        <div class="row mb-3">
                            <label for="motivation" class="col-md-4 col-form-label text-md-end ">{{ __('志望動機') }}</label>

                            <div class="col-md-6">
                                <textarea id="motivation"  class="form-control @error('motivation') is-invalid @enderror"  name="motivation" >{{$application->motivation}}</textarea>
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
                                <input id="email" type="text" class="form-control @error('email') is-invalid @enderror"  name="email" value="{{$application->email}}">
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
                                <input id="tell" type="text" class="form-control @error('tell') is-invalid @enderror"   name="tell" value="{{$application->tell}}">
                                @error('tell')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="text-center d-flex justify-content-center">
                                
                                <button type="submit" class="btn btn-primary me-4">
                                   {{ __('応募内容更新') }}
                                </button>
                 </form>
                              
                            <form action="{{ route('application.delete',['id'=>$application['id']]) }}" method="POST" >
                                @csrf
                                <button type="submit" class="btn btn-danger"  onclick='return confirm("本当に応募を取り消しますか？")'>
                                    {{ __('応募削除') }}
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                        <div class="text-center mt-4">
                           <a href="{{ route('user_mypage') }}">
                             {{ __('マイページに戻る') }}
                           </a>
                        </div>
            </div>
        </div>
    </div>
</div>


@endsection