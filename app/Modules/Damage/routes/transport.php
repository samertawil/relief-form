<?php

use App\Modules\Damage\Http\Controllers\forms\TransporstController;
use Illuminate\Support\Facades\Route;

 Route::prefix('/damages/forms/transports/')->name('damages.transports.')->middleware('web','auth')->group(function() {

  Route::get('index',[TransporstController::class,'index'])->name('index');
  Route::get('create',[TransporstController::class,'create'])->name('create');
  Route::post('store',[TransporstController::class,'store'])->name('store'); 
  Route::delete('destroy/{id}',[TransporstController::class,'destroy'])->name('destroy'); 

 });

     

