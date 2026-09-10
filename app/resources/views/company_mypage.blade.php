@extends('layouts.app')

@section('content')

<div class="container">
    <div class="card mt-4">
        <div class="border p-4">
            <div class="row mb-5">
                    <div div class="text-center mb-4">
                        {{  $company ->company_name }}　｜　{{  $company ->name }}｜　{{  $company ->tell }}
                    </div>
            </div>

            <div class="text-center mb-4">
                    <h4>自己PR</h4>

                    <div class="border p-3">
                    </div>
            </div>

            <div class="text-center">
                    <h4>職務経歴</h4>

                    <div class="border p-3">
                    </div>
            </div>

        </div>

            <div class="text-center mt-4">

                <a href="#" class="btn btn-link">
                    プロフィール編集
                </a>

                <a href="#" class="btn btn-link">
                    応募済み求人一覧
                </a>

                <a href="#" class="btn btn-link">
                    ブックマーク一覧
                </a>

            </div>
    </div>

</div>

@endsection
