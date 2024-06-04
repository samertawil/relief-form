<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\status\StatusController;
use App\Http\Controllers\address\AddressController;
use App\Http\Controllers\settingcontrollers\SystemnameController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', function () {
    return view('main');
});

// Route::resource('/status', '\Http\Controllers\StatusController')->middleware(['web', 'auth']);
// Route::resource('/status',StatusController::class)->middleware(['web', 'auth']);
// Route::get('status/create',[StatusController::class,'create'])->name('status.create')->middleware(['web', 'auth']);



// Route::get('address/edit/{id}',[AddressController::class,'edit'])->name('address.edit')->middleware('auth');
// Route::put('address/update/{id}',[AddressController::class,'update'])->name('address.update')->middleware('auth');


  require __DIR__.'/setting.php';
 
