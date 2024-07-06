<?php

 
namespace App\Modules\Damage\Http\Controllers\forms;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\DamagedUnitsRequest;
use App\Modules\Address\Models\citizenProfile;
use App\Modules\Damage\Models\DamagedResidentialUnit;
use App\Modules\Damage\Models\DamagedResidentialPlace;

class DamagedUnitsController extends Controller
{
    public function create()
    {
 
        $DamagedPlaces=DamagedResidentialPlace::damagedPlaces();
        $myDamagedPlaces= $DamagedPlaces->where('created_by', Auth::user()->profile->id)->all();

        $damagedUnits=DamagedResidentialUnit::damagedUnits();
        $myDamagedUnits=$damagedUnits->where('created_by', Auth::user()->profile->id)->all();
               
       

        return  view('DamageModule::residential-form.damages-units-form', compact('myDamagedPlaces','myDamagedUnits'));
    }

    public function store(DamagedUnitsRequest $request) {

        DamagedResidentialUnit::create([
            'places_id'=>$request->places_id,
            'created_by'=>  $request->user()->profile->id,
            'damage_size'=>$request->damage_size,
            'unit_type'=>$request->unit_type,
            'unit_damage_date'=>$request->unit_damage_date,
            'citizen_type'=>$request->citizen_type,
            'undp_number'=>$request->undp_number,
            'beneficiary_idc'=>$request->beneficiary_idc,
            'owner_idc'=>$request->owner_idc,
            'attachments'=>$request->attachments,
            'notes'=>$request->notes,
        ]);
        return redirect()->back()->with('message', 'تم حفظ بيانات الوحدة السكنية بنجاح ويمكنك الاستمرار باضافة وحدات ')->with('type', 'success');

    }

    public function destroy($id) {

       
        $data=DamagedResidentialUnit::destroy($id);
        return redirect()->back()->with('message','تم مسح البيانات ')->with('type','success');


    }

}
