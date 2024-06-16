<?php

namespace App\Modules\Address\Models;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\CitzenProfile;
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
    use SoftDeletes;

    protected $fillable = [
        'address_name',    'region_id',    'city_id',    'area_id',    'neighbourhood_id',    'street_id',
        'nearest_location_type',    'address_specific',    'address_type',    'gis',    'active',    'user_id',    'near_loc_id'
    ];


    public static function validate_rules()
    {

        return [

            'region_id' => ['required'],
            'city_id' => ['required'],
            'area_id' => ['required'],
            'neighbourhood_id' => ['required'],
            'address_specific' => ['required'],
            'address_type' => [
                Rule::unique('addresses')->where(function ($query) {
                    return $query->where('user_id', Auth::id());
                }),
            ],

        ];
    }

    public static function validate_message()
    {
        return [];
    }



    public static function contacts_data() {

        $nearlocs = status::select('id', 'status_name', 'p_id_sub')->wherein('p_id_sub', [2, 5, 10,])->get();

        $profiles = CitzenProfile::where('user_id', Auth::id())->first();

        $mobile = '';

        empty($profiles->mobile1) ? $mobile = Auth::user()->mobile : $profiles;

        return  ['nearlocs'=>$nearlocs,'mobile'=>$mobile,'profiles'=>$profiles];
    }




    public function nearest_location_status_name()
    {
        return $this->hasOne(status::class, 'id', 'nearest_location_type');
    }

    public function regionname()
    {
        return $this->hasOne(region::class, 'id', 'region_id');
    }

    public function cityname()
    {
        return $this->hasOne(city::class, 'id', 'city_id');
    }

    public function areaname()
    {
        return $this->hasOne(area::class, 'id', 'area_id');
    }

    public function neighbourhoodname()
    {
        return $this->hasOne(neighbourhood::class, 'id', 'neighbourhood_id');
    }

    public function streetname()
    {
        return $this->hasOne(street::class, 'id', 'street_id');
    }



    public function nearestlocname()
    {
        return $this->hasOne(status::class, 'id', 'nearest_location_type');
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

    public function getuserinfo()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
