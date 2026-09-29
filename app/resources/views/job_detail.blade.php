@extends('layouts.app')

@section('content')

<div class="card m-4">
    <div class="text-center">
        <div class="card-body">
            <div class="row align-items-center ">
                <div class="profile-picture col-md-4 ">
                    <img class="img-fluid cursor_pointer object-fit-cover border rounded" src="{{ $job['image'] }}" alt="Profile Picture">
                </div>

                <div class ="col-md-6">
                    <p class="card-text text-muted mb-2 bg-primary-subtle rounded-3 px-3 py-1 d-inline-block">{{ $job ->user->company_name }}</p>
                    <h2>{{ $job -> title}}</h2>
                    <p><i class="bi bi-geo-alt"></i>{{ Config::get('workplace_type')[$job->location]}}｜<i class="bi bi-person-fill"></i>{{ Config::get('employment_type')[$job->employment_type] }}｜<i class="bi bi-currency-yen"></i>{{Config::get('salary_type')[$job->salary_range]}}</p>
                </div>
                <div class="col-md-2 ">
                    @if ($bookmark)
                    <button id="btn" onclick="handleCancel()" class="btn btn-primary">
                        ★
                    </button>
                    @else
                    <button id="btn" onclick="handleClick()" class="btn btn-outline-primary">
                      ☆
                    </button >
                     @endif

                    <script>function handleCancel(){
                      const token = document.querySelector('meta[name="csrf-token"]').content;

                      fetch('/bookmark/cancel/{{ $job->id }}',{
                        method: 'POST',
                        headers:{
                            'Content-Type':"application/json; charset=utf-8",
                            'X-CSRF-TOKEN': token,
                        },
                      }).then(res => res.json()).then(json =>{
                        const html = json.message;
                        console.log(json.message);
                        const btn= document.getElementById('btn');
                        btn.textContent = ' ☆';
                        btn.classList.remove('btn-primary');
                        btn.classList.add('btn-outline-primary');
                        btn.setAttribute('onclick', 'handleClick()');
                       })
                    }</script>
                    <script>function handleClick(){
                      const token = document.querySelector('meta[name="csrf-token"]').content;

                      fetch('/bookmark/{{ $job->id }}',{
                        method: 'POST',
                        headers:{
                            'Content-Type':"application/json; charset=utf-8",
                            'X-CSRF-TOKEN': token,
                        },
                      }).then(res => res.json()).then(json =>{

                      if (json.login) {
                            window.location.href = '/login';
                            return;
                        }
                        
                        console.log(json.message);
                        
                        const btn= document.getElementById('btn');
                        btn.textContent = '★';
                        btn.classList.remove('btn-outline-primary');
                        btn.classList.add('btn-primary');
                        btn.setAttribute('onclick', 'handleCancel()');
                       })
                    }</script>
                    
                </div> 

              <div class="mt-3">
                <div class ="text-center">
                    <p class="fw-bold border-bottom pb-2">【　仕事内容　】</p>
                    <p>{{$job -> job_description}}</p>
                </div>
              </div>
            </div>
        </div>
    </div>
</div>
<div class=" d-flex flex-column align-items-center ">
    <div class="mb-3">
            <a href="{{ route('application.form',['id'=> $job->id]) }}"class="btn btn-primary btn-lg">
                {{ __('応募する') }}　　　
            </a>
    </div>
            <a href="{{ route('job.search') }}">
               <i class="bi bi-arrow-left "></i>{{ __('求人一覧に戻る') }}
            </a>
</div>

@endsection