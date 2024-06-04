<?php

use App\Http\Controllers\address\AddressController;
use App\Http\Controllers\settingcontrollers\SystemnameController;
use App\Http\Controllers\status\StatusController;
use Illuminate\Support\Facades\Route;


// Route::post('system/store/',[SystemnameController::class,'store'])->name('system.store');

// Route::resource('/status',StatusController::class);

Route::prefix('address')->name('address.')->group(function() {

    Route::resource('/',AddressController::class);
  

});

Route::get('address/edit/{id}',[AddressController::class,'edit'])->name('address.edit');
Route::put('address/update/{id}',[AddressController::class,'update'])->name('address.update');