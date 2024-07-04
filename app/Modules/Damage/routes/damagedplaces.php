<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DamagedUnitsController;
use App\Modules\Damage\Http\Controllers\forms\DamagedPlacesController;

Route::prefix('/damages/forms/places/')->name('damages.places.')->middleware('web', 'auth')->group(function () {

    Route::get('index', [DamagedPlacesController::class, 'index'])->name('index');
    Route::get('create', [DamagedPlacesController::class, 'create'])->name('create');
    Route::post('store', [DamagedPlacesController::class, 'store'])->name('store');
    Route::delete('destroy/{id}', [DamagedPlacesController::class, 'destroy'])->name('destroy');
});


Route::prefix('/damages/forms/units/')->name('damages.units.')->middleware('web', 'auth')->group(function () {

    Route::get('create', [DamagedUnitsController::class, 'create'])->name('create');
    Route::post('store', [DamagedUnitsController::class, 'store'])->name('store');
    Route::delete('destroy/{id}', [DamagedUnitsController::class, 'destroy'])->name('destroy');
});
