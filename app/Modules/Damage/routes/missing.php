<?php

use App\Modules\Damage\Http\Controllers\forms\MissingController;
use Illuminate\Support\Facades\Route;

 Route::prefix('/damages/forms/missing/')->middleware('web','auth')->group(function() {

 Route::get('create',[MissingController::class,'create'])->name('damages.missing.create');
 Route::post('store',[MissingController::class,'store'])->name('damages.missing.store');

 });
