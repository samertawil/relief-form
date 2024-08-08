<?php

namespace App\Modules\Damage\Models;

use Illuminate\Support\Facades\Auth;
use App\Modules\Address\Models\address;
use Illuminate\Database\Eloquent\Model;
use App\Modules\Address\Models\AddressName;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DamagedResidentialPlace extends Model
{
    use HasFactory;

    protected $fillable=['building_name','owner_name','building_type','floor','damage_date','place_damage_size','address_id',	'active','notes','attachments','created_by','creator_type','units_count'];

    public static function damagedPlaces() {

        $damagedPlaces= DamagedResidentialPlace::with(['address','address.cityname'])->get();
        return  $damagedPlaces;
    }

    public function address() {
        return $this->hasOne(address::class,'id','address_id');
    }

    public function addressName() {
        return $this->hasOne(AddressName::class,'id','address_id');
    }
}
 