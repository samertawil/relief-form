<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\status\StatusController;
use App\Http\Controllers\address\AddressController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\settingcontrollers\SystemnameController;

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', function () {
    return view('main');
})->middleware("checkAddress:8,7");

Route::get('/contact-us', function () {
    return view('contact-us');
})->name('contact-us');

Route::get('/change-password/{idc}', [ChangePasswordController::class, 'create'])->name('change.password')->middleware('guest', 'CheckIdc');

Route::post('/change-password-submit', [ChangePasswordController::class, 'store'])->name('change.password.submit')->middleware('guest', 'CheckIdc', 'CheckUserUpdatePassword');

Route::view('/api-test', 'api-test');
