<?php

 
namespace App\Modules\Address\Models;

use App\Models\citizen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class citizenProfile extends Model
{
    use HasFactory;

    protected $table = 'citizen_profiles';

    protected $fillable = ['citizen_idc',    'user_id',    'current_address_status',    'mobile1',    'mobile2',    'email'];


    public static function profile() {
        $profile = citizenProfile::where('user_id', Auth::id())->first();
        return  $profile;
    }

    public function citizen() {
        return $this->hasOne(citizen::class,'idc','citizen_idc');
    }
}

