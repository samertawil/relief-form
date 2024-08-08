<?php

use Faker\Guesser\Name;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\settingcontrollers\SystemnameController;

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::get('/', function () {
//   return view('main');
// })->Name('main.page')->middleware(["CheckOrginalAddress:7", 'checkContactsInfo', 'checkAddress:8']);   // })->middleware("checkAddress:8,7");

Route::get('/',[MainController::class,'main'])->name('main.page')->middleware('auth');
Route::get('/get-help',[MainController::class,'getHelp'])->name('gethelp');
Route::post('/getHelpstore',[MainController::class,'getHelpstore'])->name('getHelpstore');


Route::get('/contact-us', function () {
  return view('contact-us');
 })->name('contact-us');

 Route::get('/about-us', function () {
  return view('about-us');
 })->name('about-us');


Route::post('api-idc/{idc?}',[ApiController::class,'api_idc'])->name('api.get.idc');

require __DIR__.'/AuthRoutes.php';