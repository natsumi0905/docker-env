<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DisplayController;
use App\Http\Controllers\RegistrationController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\JobController;
use App\Models\Application;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Auth::routes();

Route::get('/', [DisplayController::class, 'index']);

//求人検索画面
Route::get('/search',[RegistrationController::class,'jobSearch'])->name('job.search');

//求人検索画面→カードクリック詳細
Route::get('/job_detail/{id}',[RegistrationController::class,'jobDetail'])->name('job.detail');

//ブックマーク機能
Route::post('/bookmark/{id}',[RegistrationController::class,'bookmark'])->name('bookmark');


Route::group(['middleware'=>'auth'],function(){

//一般ユーザー
Route::middleware(['role:0'])->group(function(){
    //ログイン時の画面移動
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('user_mypage');
    
    //マイページのプロフィール情報編集、表示と登録
    Route::get('/profile_edit', [RegistrationController::class, 'profileEdit'])->name('profile.edit');
    Route::post('/profile_edit', [RegistrationController::class, 'profileUpdate'])->name('profile.update');
  
    //応募画面
    Route::get('/application_form/{id}',[RegistrationController::class,'applicationForm'])->name('application.form');
    Route::post('/application_store/{id}',[RegistrationController::class,'applicationStore'])->name('application.store');

    //応募済一覧
    Route::get('/application_list',[RegistrationController::class,'applicationList'])->name('application.list');

    //応募内容編集
    Route::get('/application_detail/{id}',[RegistrationController::class,'applicationDetail'])->name('application.detail');
    Route::post('/application_update/{id}',[RegistrationController::class,'applicationUpdate'])->name('application.update');

    //応募削除
    Route::post('/application_delete/{id}',[RegistrationController::class,'applicationDelete'])->name('application.delete');
    //ブックマーク機能、DB保存,解除
    Route::post('/bookmark/cancel/{id}',[RegistrationController::class,'bookmarkCancel'])->name('bookmark.cancel');

    //ブックマーク一覧表示
    Route::get('/bookmark_list',[RegistrationController::class,'bookmarkList'])->name('bookmark.list');
    
});

//企業ユーザー
Route::middleware(['role:1'])->group(function(){
    //ログイン時の画面移動
    Route::get('/company_mypage', [DisplayController::class, 'companyMypage'])->name('company_mypage');

    //マイページのプロフィール情報編集、表示と登録
    Route::get('/company_edit', [RegistrationController::class, 'companyEdit'])->name('company.edit');
    Route::post('/company_edit', [RegistrationController::class, 'companyUpdate'])->name('company.update');

    //企業マイページから新規投稿
    Route::resource('job', JobController::class);

    //求人論理削除
    Route::post('/softdelete_job/{job}',[JobController::class,'softdeleteJob'])->name('softdelete.job');

    //企業側応募者一覧
    Route::get('/applicant_list/{id}',[RegistrationController::class,'applicantList'])->name('applicant.list');

    //応募者ステータス変更画面
    Route::get('/applicant_detail/{id}',[RegistrationController::class,'applicantDetail'])->name('applicant.detail');
    Route::post('/applicant_edit/{id}',[RegistrationController::class,'applicantEdit'])->name('applicant.edit');
});
    
//退会処理
Route::get('/withdraw', [RegistrationController::class, 'withdraw'])->name('withdraw');
Route::post('/softdelete_user',[RegistrationController::class,'softdeleteUser'])->name('softdelete.user');
Route::get('/cancel', [RegistrationController::class, 'withdrawCancel'])->name('withdraw.cancel');

});