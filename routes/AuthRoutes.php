<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ChangePasswordController;



//  Auth::routes();

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'login'])->name('login.post')->middleware('guest','CheckIdc');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');
Route::get('/register-create', [RegisterController::class, 'register_create'])->name('register.create')->middleware('guest');
Route::get('/registration-form', [RegisterController::class, 'showRegistrationForm'])->name('registration.form')->middleware('guest');
Route::post('/register/{idc}', [RegisterController::class, 'register_store'])->name('register.store')->middleware('guest');


// Route::get('/change-password-form', [ChangePasswordController::class, 'change_password_form'])->name('change.password.form')->middleware('guest');

// Route::get('/change-password}', [ChangePasswordController::class, 'create'])->name('change.password')->middleware('guest');


// Route::post('/change-password-submit/{idc}', [ChangePasswordController::class, 'store'])->name('change.password.submit')->middleware('guest');
