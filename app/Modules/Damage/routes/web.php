<?php


use Illuminate\Support\Facades\Route;
use App\Modules\Damage\Http\Controllers\DamageController;


  Route::prefix('damages')->middleware('web','auth')->group(function() {
     Route::get('/create',[DamageController::class,'create'])->name('damages.create');
     Route::post('/store',[DamageController::class,'store'])->name('damages.store');
    
  });

 