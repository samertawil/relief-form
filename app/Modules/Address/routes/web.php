<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\CheckAddress;
use Illuminate\Support\Facades\Route;
 
use App\Modules\Address\Http\Controllers\AddressController;
use App\Modules\Address\Http\Controllers\ApiController;
use App\Modules\Address\Http\Controllers\CitizenController;

Route:: middleware(['web','auth'])->group(function() {


  Route::get('/address',[AddressController::class,'index'])->name('address.index');
  Route::get('/address/create-orginal-address',[AddressController::class,'create_orginal_address'])->name('address.create.orginal.address');
  Route::get('/address/create-contacts-info',[AddressController::class,'create_contacts_info'])->name('address.create.contacts.info');
 Route::get('/address/create',[AddressController::class,'create'])->name('address.create');
 Route::post('/address/store/{address_type}',[AddressController::class,'store'])->name('address.store');
 Route::get('/address/edit/{id}',[AddressController::class,'edit'])->name('address.edit');
 Route::put('/address/update/{id}',[AddressController::class,'update'])->name('address.update');
 Route::delete('/address/destroy/{id}',[AddressController::class,'destroy'])->name('address.destroy');
 Route::post('/ctzn-profile/address-status',[CitizenController::class,'store'])->name('citizenProfile.address_status.store');

 Route::get('/api/profile',[ApiController::class,'profile'])->name('api.profile');
});

 Route::get('/api/address/{value?}/{model?}',[ApiController::class,'api_create_address'])->name('api.address');
