<?php


use Illuminate\Support\Facades\Route;
 
use App\Modules\Damage\Http\Controllers\DamageController;
use App\Modules\Damage\Http\Controllers\DamageDetailController;
 
 


  Route::prefix('damages')->middleware('web','auth')->group(function() {
     Route::get('/create',[DamageController::class,'create'])->name('damages.create');
     Route::post('/store',[DamageController::class,'store'])->name('damages.store');
     Route::post('/detail/store/{master_id}',[DamageDetailController::class,'store'])->name('damages.detail.store');

    
  });

  require __DIR__.'/missing.php';

 
 