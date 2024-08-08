<?php

use App\Modules\Damage\Http\Controllers\forms\MissingController;
use Illuminate\Support\Facades\Route;

 Route::prefix('/damages/forms/missing/')->name('damages.missing.')->middleware('web','auth')->group(function() {

 Route::get('index',[MissingController::class,'index'])->name('index');
 Route::get('create',[MissingController::class,'create'])->name('create');
 Route::post('store',[MissingController::class,'store'])->name('store');
 Route::delete('destroy/{id}',[MissingController::class,'destroy'])->name('destroy');
 Route::get('api/building',[MissingController::class,'building'])->name('building.api');
 });

     

