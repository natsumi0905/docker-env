@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="text-center mt-5 mb-3">
                    <h1>退会手続きを実行します</h1>
                    <p>退会すると、登録情報が削除され<br>元に戻せません</p>
                </div>
                 <div class="row mb-3">
                            <div class="text-center">
                               <form action="{{ route('softdelete.user') }}" method="POST">
                                 @csrf
                                   <button type="submit" class="btn btn-primary">
                                      {{ __('退会する') }}
                                   </button>
                                </form>
                            </div>
                  </div>

                  <div class="row mb-5">
                            <div class="text-center">
                                <a href="{{ route('withdraw.cancel') }}"class="btn btn-danger">
                                    {{ __('キャンセル') }}
                                </a>
                            </div>
                  </div>
            </div>
        </div>
    </div>
</div>
@endsection