<?php

namespace App\Modules\Damage\Models;

use App\Modules\Address\Models\address;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DamagedResidentialPlace extends Model
{
    use HasFactory;

    protected $fillable=['building_name','owner_name','building_type','floor','damage_date','place_damage_size','address_id',	'active','notes','attachments','created_by','creator_type','units_count'];

    public function address() {
        return $this->hasOne(address::class,'id','address_id');
    }
}
