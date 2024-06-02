<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class address extends Model
{
    use HasFactory;

protected $fillable=['address_name',	'region_id',	'city_id',	'area_id',	'neighbourhood_id',	'street_id',
	'nearest_location_type',	'address_specific',	'address_type',	'gis',	'active',	'user_id',	'near_loc_id'];


    public static function validate_rules() {
        return [
            'region_id' =>['required'],
            'city_id' =>['required'],
            'area_id' =>['required'],
            'neighbourhood_id' =>['required'],
            'address_specific' =>['required'],
        ];
    }

    public static function validate_message() {
        return [
            'required'=>'مطلوب ادخال الحقل :attribute'
        ];
    }

    public function nearest_location_status_name()
    {
        return $this->hasOne(status::class, 'id', 'nearest_location_type');
    }

    public function regionname() {
        return $this->hasOne(region::class,'id','region_id');
    }

    public function cityname() {
        return $this->hasOne(city::class,'id','city_id');
    }

    public function areaname() {
        return $this->hasOne(area::class,'id','area_id');
    }

    public function neighbourhoodname() {
        return $this->hasOne(neighbourhood::class,'id','neighbourhood_id');
    }

    public function streetname() {
        return $this->hasOne(street::class,'id','street_id');
    }
}
