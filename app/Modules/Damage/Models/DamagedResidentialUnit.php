<?php

namespace App\Modules\Damage\Models;

use Illuminate\Database\Eloquent\Model;
use App\Modules\Address\Models\citizenProfile;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DamagedResidentialUnit extends Model
{
    use HasFactory;

    protected $fillable=['places_id','damage_size','unit_type','unit_damage_date','citizen_type','undp_number','beneficiary_idc','owner_idc',	'attachments','notes', 'created_by'];

    public static function damagedUnits() {

            $damagedUnits= DamagedResidentialUnit::with(['places.address.cityname','profile','places'])->get();
             return  $damagedUnits;
    }

    public function places() {
        return $this->hasOne(DamagedResidentialPlace::class,'id','places_id');
    }

    public function profile() {
        return $this->hasOne(citizenProfile::class,'id','created_by');
    }
    
}
