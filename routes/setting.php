<?php

use App\Http\Controllers\address\AddressController;
use App\Http\Controllers\settingcontrollers\SystemnameController;
use App\Http\Controllers\status\StatusController;
use Illuminate\Support\Facades\Route;

Route::prefix('status')->name('status.')->group(function () {

    route::resource('/',StatusController::class);

});

Route::post('system/store/',[SystemnameController::class,'store'])->name('system.store');

Route::prefix('address')->name('address.')->group(function() {

    Route::resource('/',AddressController::class);

});