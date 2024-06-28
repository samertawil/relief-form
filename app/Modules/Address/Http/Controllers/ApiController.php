<?php


namespace App\Modules\Address\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Modules\Address\Models\city;
use App\Modules\Address\Models\location;
use App\Modules\Address\Models\neighbourhood;

class ApiController extends Controller
{
    public function api_test1($value, $model = '' )
    {
      
        if ($model == 'region_id') {

            $cities = city::select('id', 'city_name')->where('region_id', $value)->get();
            return response($cities, 200);
        }

        if ($model == 'city_id') {
      
            $neighbourhoods = neighbourhood::select('id', 'neighbourhood_name')->where('city_id',$value)->get();
          
            return response($neighbourhoods, 200);
        }

        if ($model == 'neighbourhood_id') {
           
            $nearlocnames = location::select('id', 'location_name')->where('neighbourhood_id',$value)->get();
          
            return response($nearlocnames, 200);
        }

       

        
    }
}
