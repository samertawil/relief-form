<?php

namespace App\Modules\Damage\Http\Controllers\forms;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Modules\Status\Models\status;
use App\Modules\Address\Models\address;
use Illuminate\Support\Facades\Validator;
use App\Modules\Damage\Models\MissingPeople;

use function Symfony\Component\String\b;

class MissingController extends Controller
{
    public function create() {
        $buildingTypes=status::select('status_name','id','p_id_sub')->where('p_id_sub',49)->get();
        return  view('DamageModule::missing-form._damages-missing-form',compact('buildingTypes'));
    }

    public function store(Request $request) {
    // dd($request->building_type);

  $addressValidator = Validator::make($request->all(), address::validate_rules($request))->validate();
  $MissingPeopleValidator =
   Validator::make($request->only('created_by','strike_date','building_name','building_type','floor','address_id'),
   MissingPeople::validate_rules())->validate();
   
        $address=address::create([
              'region_id'=> $request->region_id ,
            'city_id'=>$request->city_id ,
            'area_id'=>$request->area_id ,
            'neighbourhood_id'=>$request->neighbourhood_id ,
            'street_id'=>$request->street_id ,
            'nearest_location_type'=>$request->nearest_location_type ,
            'near_loc_id'=>$request->near_loc_id ,
            'address_specific'=>$request->address_specific ,
            'address_type'=>54,
            'user_id'=>Auth::id(),
            'address_name'=>'استبانة مبنى مستهدف - '.$request->building_name,

        ]); 
      
        MissingPeople::create([
            'created_by'=>$request->user()->profile->id,
            'strike_date'=>$request->strike_date,
            'building_name'=>$request->building_name,
            'building_type'=>$request->building_type,
            'floor'=>$request->floor,
            'address_id'=>$address->id,

        ]);
        return redirect()->back()->with('message', 'تم الحفظ بنجاح')->with('type', 'success');
    }
}
