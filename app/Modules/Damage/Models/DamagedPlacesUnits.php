<?php

namespace App\Modules\Damage\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DamagedPlacesUnits extends Model
{
    use HasFactory;

    protected $table='damaged_places_units';

    public function places1() {
        return $this->hasOne(DamagedResidentialPlace::class,'id','master_places_id');
    }
}
