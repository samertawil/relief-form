<?php

namespace App\Modules\Address\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddressName extends Model
{
    use HasFactory;

    protected $table='address_name_vw';
}
