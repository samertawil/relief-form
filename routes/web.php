<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\status\StatusController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\address\AddressController;
use App\Http\Controllers\Auth\LoginController;
use App\Modules\Address\Http\Controllers\CitzenController;
use App\Http\Controllers\settingcontrollers\SystemnameController;


Auth::routes();
// Route::get('/login',[LoginController::class,'showLoginForm'])->name('login')->middleware('guest');
// Route::get('/register',[RegisterController::class,'register'])->name('register')->middleware('guest');
Route::post('/register',[RegisterController::class,'register_store'])->name('register.store')->middleware('CheckUserUpdatePassword');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', function () {
    return view('main');
})->middleware(["CheckOrginalAddress:7", 'checkContactsInfo'  ,'checkAddress:8']);   // })->middleware("checkAddress:8,7");


Route::get('/contact-us', function () {
    return view('contact-us');
})->name('contact-us');

Route::get('/change-password/{idc}', [ChangePasswordController::class, 'create'])->name('change.password')->middleware('guest', 'CheckIdc');

Route::post('/change-password-submit', [ChangePasswordController::class, 'store'])->name('change.password.submit')->middleware('guest', 'CheckIdc', 'CheckUserUpdatePassword');


 