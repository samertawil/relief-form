<?php

namespace App\Modules\Damage\Models;

use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use App\Modules\Status\Models\status;
use Illuminate\Database\Eloquent\Model;
use App\Modules\Address\Models\citizenProfile;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DamageMaster extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['damage_type', 'profile_id', 'created_by', 'active', 'status_id'];




    public static function damage_data() {

        $damagesAll= DamageMaster::with('statusName')->get();
 
        return ['damages'=>$damagesAll,];
 
       }

       public function statusName() {
        return $this->hasOne(status::class,'id','damage_type');
       }

       public function profile() {
        return $this->hasOne(citizenProfile::class,'id','profile_id');
       }

       public function profile2() {
        return $this->hasOne(citizenProfile::class,'user_id','user_id');
       }

       
     
}
