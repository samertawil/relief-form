<?php
use Illuminate\Support\Facades\Route;
use App\Modules\Status\Http\Controllers\settingcontrollers\SystemnameController;
use App\Modules\Status\Http\Controllers\status\StatusController;

Route::middleware(['guest', 'web','auth'])->group(function () {

	Route::resource('/status',StatusController::class);
	Route::post('system/store/',[SystemnameController::class,'store'])->name('system.store');


});
 