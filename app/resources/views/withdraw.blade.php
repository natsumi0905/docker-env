@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"></div>
                 <div class="row mb-0">
                            <div class="text-center">
                               <form action="{{ route('softdelete.user') }}" method="POST">
                                 @csrf
                                   <button type="submit" class="btn btn-primary">
                                      {{ __('退会する') }}
                                   </button>
                                </form>
                            </div>
                  </div>

                  <div class="row mb-0">
                            <div class="text-center">
                                <a href="#"class="btn btn-danger">
                                    {{ __('キャンセル') }}
                                </a>
                            </div>
                  </div>
            </div>
        </div>
    </div>
</div>
@endsection