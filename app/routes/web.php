<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DisplayController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\RegistrationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//Route::get('/', [DisplayController::class, 'index']);
Route::get('/user/signup',[RegistrationController::class, 'userSignup'])->name('user.signup');
Route::post('/user/signup', [RegistrationController::class, 'userRegister'])->name('user.register');
Route::get('/company/signup', [RegistrationController::class, 'companySignup'])->name('company.signup');
Route::post('/company/signup', [RegistrationController::class, 'companyRegister'])->name('company.register');
