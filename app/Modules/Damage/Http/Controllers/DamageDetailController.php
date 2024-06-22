<?php

namespace App\Modules\Damage\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modules\Damage\Models\DamageDetail;

class DamageDetailController extends Controller
{

    // public function index() {

    //     $alldata=DamageDetail::get();
    //     dd($alldata);
    //     return view('DamageModule::main-pages.create',compact('alldata'));

    // }

 
    public function store(Request $request, $master_id) {
      

        $request->validate(DamageDetail::validate_rule($master_id));

        DamageDetail::create([
            'master_id'=>$master_id,
            'damage_specific'=>$request->damage_specific,

        ]);

    return redirect()->back()->with('message','تم الاضافة بنجاح')->with('type','success');

    }

}
