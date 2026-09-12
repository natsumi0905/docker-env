<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DisplayController;
use App\Http\Controllers\RegistrationController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Auth::routes();

Route::get('/', [DisplayController::class, 'index']);
//ログイン時の画面移動
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/company_mypage', [DisplayController::class, 'companyMypage'])->name('/company_mypage');

//マイページのプロフィール情報編集、表示と登録
Route::get('/profile_edit', [RegistrationController::class, 'profileEdit'])->name('profile.edit');
Route::post('/profile_edit', [RegistrationController::class, 'profileUpdate'])->name('profile.update');
Route::get('/company_edit', [RegistrationController::class, 'companyEdit'])->name('company.edit');
Route::post('/company_edit', [RegistrationController::class, 'companyUpdate'])->name('company.update');


