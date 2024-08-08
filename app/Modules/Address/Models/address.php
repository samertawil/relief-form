<?php

namespace App\Modules\Address\Models;

use App\Models\User;
use Illuminate\Http\Request;
use App\Modules\Address\Models\citizenProfile;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use App\Modules\Status\Models\status;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rules\RequiredIf;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class address extends Model
{
    use HasFactory;
   

    protected $fillable = [
        'address_name',    'region_id',    'city_id',    'area_id',    'neighbourhood_id',    
           'address_specific',    'address_type',    'gis',    'active',    'user_id',    'near_loc_id'
    ];



    public static function contacts_data() {
 
        $nearlocs=  status::statuses()->wherein('p_id_sub', [2, 5, 10,]);
    
        $profiles = citizenProfile::where('user_id', Auth::id())->first();

        $mobile = '';

        empty($profiles->mobile1) ? $mobile = Auth::user()->mobile : $profiles;

        return  ['nearlocs'=>$nearlocs,'mobile'=>$mobile,'profiles'=>$profiles];
    }




    public function regionname()
    {
        return $this->hasOne(region::class, 'id', 'region_id');
    }

    public function cityname()
    {
        return $this->hasOne(city::class, 'id', 'city_id');
    }


    public function neighbourhoodname()
    {
        return $this->hasOne(neighbourhood::class, 'id', 'neighbourhood_id');
    }





    public function locname()
    {
        return $this->hasOne(location::class, 'id', 'near_loc_id');
    }



    public function addresstypename()
    {
        return $this->hasOne(status::class, 'id', 'address_type');
    }

    public static function booted()
    {
        static::addGlobalScope('userscope', function ($query) {
            $query->where('user_id', Auth::id());
        });
    }

    public  function getuserinfo()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
 
}