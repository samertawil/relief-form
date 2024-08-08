<?php


namespace App\Modules\Address\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Modules\Address\Models\city;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use App\Modules\Address\Models\location;
use App\Modules\Address\Models\neighbourhood;
use App\Modules\Address\Models\citizenProfile;

class ApiController extends Controller
{
    public function api_create_address($value, $model = '')
    {

        if ($model == 'region_id') {

            // $cities =   Cache::rememberForever('cities', function () use ($value) {
            //     return city::select('id', 'city_name')->where('region_id', $value)->get();
            // });
            //   $cities =  city::cities()->where('region_id', $value) ;
            
            $cities =  city::where('region_id', $value)->get() ;
            
          
            return response($cities, 200);
        }

        if ($model == 'city_id') {

            // $neighbourhoods = Cache::rememberForever('neighbourhoods', function () use ($value) {
            //     return   neighbourhood::select('id', 'neighbourhood_name')->where('city_id', $value)->get();
            // });
            $neighbourhoods =    neighbourhood::select('id', 'neighbourhood_name')->where('city_id', $value)->get();
         

            return response($neighbourhoods, 200);
        }

        if ($model == 'neighbourhood_id') {

            // $nearlocnames = Cache::rememberForever('nearlocnames', function () use($value) {
            //     return   location::select('id', 'location_name')->where('neighbourhood_id', $value)->get();
            // });

            $nearlocnames =    location::select('id', 'location_name')->where('neighbourhood_id', $value)->get();
            
          
          
            return response($nearlocnames, 200);
        }
    }

    public function profile()
    {
        $profile = citizenProfile::select('current_address_status')->where('user_id', Auth::id())->first();

        return response($profile, 200);
    }
}
