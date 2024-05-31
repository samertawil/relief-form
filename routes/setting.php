<?php

use App\Http\Controllers\settingcontrollers\SystemnameController;
use App\Http\Controllers\status\StatusController;
use Illuminate\Support\Facades\Route;

Route::prefix('status')->name('status.')->group(function () {

    route::resource('/',StatusController::class);

});

Route::post('system/post/',[SystemnameController::class,'store'])->name('system.store');