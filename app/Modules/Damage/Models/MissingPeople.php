<?php

namespace app\Modules\Damage\Models;

use App\Models\citizen;

use App\Modules\Status\Models\status;
use App\Modules\Address\Models\address;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MissingPeople extends Model
{
    use HasFactory;
 

    protected $fillable = ['created_by','provider','idc', 'living_type', 'missing_date', 'building_name', 'floor', 'building_type', 'address_id', 'active','missing_full_name'];


    public function citizen() {
        return $this->hasOne(citizen::class,'idc','idc');
    }

    public function livingStatusName() {
        return $this->hasOne(status::class,'id','living_type');
    }

    public function address() {
        return $this->hasOne(address::class,'id','address_id');
    }


    
}
