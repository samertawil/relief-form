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
use App\Modules\Damage\Models\DamagedResidentialUnit;
use App\Modules\Damage\Models\DamagedResidentialPlace;

class DamagedPlacesController extends Controller
{
    public function index()
    {

        $DamagedPlaces = DamagedResidentialPlace::damagedPlaces();
        $myDamagedPlaces = $DamagedPlaces->where('created_by', Auth::user()->profile->id)->all();

        $damagedUnits = DamagedResidentialUnit::damagedUnits();
        $myDamagedUnits = $damagedUnits->where('created_by', Auth::user()->profile->id)->all();
      

        $unitCount = DB::table('damaged_places_units')
        ->select('master_places_id','building_name', DB::raw('count(places_id) as total'))
        ->groupBy('master_places_id','building_name')
        ->get();
        // dd( DB::table('damaged_places_units')->get());
   
        return view('DamageModule::residential-form.index', compact('myDamagedPlaces', 'myDamagedUnits','unitCount'));
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
                'building_name' => $request->building_name,
                'floor'         => $request->floor,
                'units_count'   => $request->units_count,
                'building_type' => $request->building_type,
                'damage_date'   => $request->damage_date,
                'address_id'    => $address->id,
                'created_by'    => $request->user()->profile->id,
            ]);

            DB::commit();

            return redirect()->route('damages.places.index')->with('message', 'تم حفظ البيانات الاساسية للمبنى السكني بنجاح')->with('type', 'success');
        } catch (\Exception $e) {
            DB::rollBack();
            return $e;
        }
    }

    public function destroy($id)
    {

        $units = DamagedResidentialUnit::select('id')->where('places_id', $id)->get();

        if (!$units->isEmpty()) {

            return redirect()->route('damages.places.index')->with('message', 'لا يمكن مسح البيانات بسبب وجود وحدات سكنية مدخلة على اسم المبنى , يجب مسح الوحدات السكنية اولا')->with('type', 'danger');
        }

        $data = DamagedResidentialPlace::destroy($id);
        return redirect()->back()->with('message', 'تم مسح البيانات ')->with('type', 'success');
    }
}
