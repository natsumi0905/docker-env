@extends('layouts.app')

@section('content')
 <div class="search">
        <form action="{{ route('job.search') }}" method="GET">

            <div class="form-group row text-center mb-3">
                <div class="col-3">
                    <div>
                        <label for="">キーワード
                        <input type="text" name="keyword" value="{{ $keyword }}" >
                    </div>
                    </label>
                </div>

                <div class="col-3">
                    <div>
                        <label for="">勤務地
                        <select name='location' >
                            <option value="" hidden>　</option>
                             @foreach (Config::get('workplace_type') as $key => $val)
                            <option value="{{ $key }}">{{ $val }}</option>
                            @endforeach
                        </select>
                    </div>
                    </label>
                </div>

                <div class="col-3">
                    <div>
                        <label for="">雇用形態
                        <select name='employment_type' >
                            <option value="" hidden>　</option>
                            @foreach (Config::get('employment_type') as $key => $val)
                            <option value="{{ $key }}">{{ $val }}</option>
                            @endforeach
                        </select>
                    </div>
                    </label>
                </div>

                <div class="col-3">
                    <div>
                        <label for="">給与レンジ
                        <select name='salary_range' >
                            <option value="" hidden>　</option>
                            @foreach (Config::get('salary_type') as $key => $val)
                            <option value="{{ $key }}">{{ $val }}</option>
                             @endforeach
                        </select>
                    </div>
                    </label>
                </div>
            </div>
            <div class="text-center mb-3" >
                    <input type="submit" class="btn btn-primary" value="検索">
            </div>
        </form>
    </div>
<div class="container">
    <div>
        @foreach($jobs as $job)
                <a href="{{ route('job.detail',['id'=> $job->id]) }}" class="card mb-3">
                    <div class="text-center">
                        <div class="card-body">
                            <div class="row align-items-center ">
                           <div class="profile-picture col-md-4 ">
                              <img class="img-fluid cursor_pointer" src="{{ $job['image'] }}" alt="Profile Picture">
                           </div>

                           <div class ="col-md-7">
                              <h1>{{ $job -> title}}</h1>
                              <p>{{ Config::get('workplace_type')[$job->location] }}｜{{ Config::get('employment_type')[$job->employment_type] }}｜{{ Config::get('salary_type')[$job->salary_range] }}</p>
                           </div>
                       </div>
                        </div>
                    </div>
                </a>
        @endforeach
    </div>

</div>

@endsection
