<?php

namespace App\Modules\Damage\Models;

use App\Models\citizen;
 
use App\Modules\Status\Models\status;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TransportDamage extends Model
{
    use HasFactory;

    protected $casts=[
        'attachments'=>'json',
    ];

    protected $fillable=['transport_category','transport_type','transport_no','regestration_idc','owner_idc','owner_name',	'damage_date',	'transport_damage_size',	'damage_description',	'attachments',	'created_by'];


    public function citizen() {
        return $this->hasOne(citizen::class,'idc','regestration_idc');
       
    }

    public function StatusType() {
        return $this->hasOne(status::class,'id','transport_type');
       
    }
}
