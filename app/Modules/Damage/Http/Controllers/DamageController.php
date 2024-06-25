<?php

namespace App\Modules\Damage\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Modules\Damage\Models\DamageDetail;
use App\Modules\Damage\Models\DamageMaster;
use App\Modules\Address\Models\citizenProfile;

class DamageController extends Controller
{
  public function create()
  {

    $damages = DamageMaster::damage_data();

    $alldata=DamageDetail::orderBy('created_at','desc')->with(['damageMaster.statusName','statusName'])->get();
   
    
    return  view('DamageModule::main-pages.create', ['damagesAll' => $damages['damages'],'alldata'=>$alldata]);
  }



  public function store(Request $request)
  {

    $profile = citizenProfile::profile();
 
    $request->validate(DamageMaster::validate_rule());


    $data = DamageMaster::create([
      'profile_id' => $profile->id,
      'damage_type' => $request->damage_type,
    ]);

    return redirect()->back()->with('message', 'تم اضافة نوع الضرر')->with('type', 'success');
  }
}
