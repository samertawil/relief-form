<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\settingcontrollers\SystemnameController;


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', function () {
  return view('main');
})->middleware(["CheckOrginalAddress:7", 'checkContactsInfo', 'checkAddress:8']);   // })->middleware("checkAddress:8,7");


Route::get('/contact-us', function () {
  return view('contact-us');
})->name('contact-us');

//  Route::view('/','index');


require __DIR__.'/AuthRoutes.php';