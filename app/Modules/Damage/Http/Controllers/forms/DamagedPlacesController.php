<?php

namespace App\Modules\Damage\Http\Controllers\forms;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Modules\Address\Models\region;

use App\Modules\Address\Models\address;
use App\Http\Requests\DamagedPlacesRequest;
use app\Modules\Damage\Models\MissingPeople;
use App\Modules\Address\Models\citizenProfile;
use App\Modules\Damage\Models\DamagedResidentialPlace;

class DamagedPlacesController extends Controller
{
    public function index()
    {

        $damagedPlaces= DamagedResidentialPlace::with(['address'])->where('created_by', Auth::user()->profile->id)->get();
        
        return view('DamageModule::residential-form.index',compact('damagedPlaces'));
    }


    public function create()
    {

        $profiles = new citizenProfile();
        $address = new address();

        $regions = region::get();
        $people = [];

        return  view('DamageModule::residential-form.damages-places-form', compact('profiles', 'address', 'regions',));
    }


    public function store(DamagedPlacesRequest $request)
    {
        DB::beginTransaction();
        try {
            $address = address::create([
                'region_id'          => $request->region_id,
                'city_id'            => $request->city_id,
                'neighbourhood_id'   => $request->neighbourhood_id,
                'near_loc_id'        => $request->near_loc_id,
                'address_specific'   => $request->address_specific,
                'address_type'       => 77,
                'user_id'            => Auth::id(),
                'address_name'       => $request->building_name,

            ]);

            $data =   DamagedResidentialPlace::create([
                'building_name' =>$request->building_name,
                'floor'         =>$request->floor,
                'units_count'   =>$request->units_count,
                'building_type' =>$request->building_type,
                'damage_date'   =>$request->damage_date,
                'address_id'    =>$address->id,
                'created_by'    => $request->user()->profile->id,
            ]);

            DB::commit();

            return redirect()->back()->with('message', 'تم حفظ البيانات الاساسية للمبنى السكني بنجاح')->with('type', 'success');
        } catch (\Exception $e) {
            DB::rollBack();
            return $e;
        }
    }
}
