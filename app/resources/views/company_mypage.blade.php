@extends('layouts.app')

@section('content')

<div class="container">
    <div class="card mt-4">
        <div class="border p-4">
            <div class="text-center mb-4">              

                <a href="{{ route('company.edit') }}" class="btn btn-link">
                    企業情報編集
                </a>

                <div class="border p-3">
                    {{ $company->company_name }}｜{{ $company->name }}｜{{ $company->email }}
                </div>
                
            </div>
            <div class="text-center mb-4">
                <button type="submit" class="btn btn-primary">
                  {{ __('新規求人投稿') }}
                </button>
            </div>

            <div class="text-center">
                    <div class="border p-3">
                        <a href="#" class="btn btn-link">
                           編集
                        </a>
                    </div>
            </div>

        </div>

            <div class="text-center mt-4">

                <a href="#" class="btn btn-link">
                    ログアウト
                </a>

                <a href="#" class="btn btn-link">
                    退会
                </a>

            </div>
    </div>

</div>

@endsection
