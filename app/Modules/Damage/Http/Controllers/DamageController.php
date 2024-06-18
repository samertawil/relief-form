<?php
 
namespace App\Modules\Damage\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Modules\Damage\Models\DamageMaster;

class DamageController extends Controller
{
   public function create() {
     
       $damages=DamageMaster::damage_data();
 
     return  view('DamageModule::main-pages.create',['damagesAll'=>$damages['damages']]) ;

   }

 

   public function store(Request $request) {

      $request->validate(DamageMaster::validate_rule());

    $data= DamageMaster::create([
      'user_id'=>Auth::id(),
      'damage_type'=>$request->damage_type,
    ]);

     return redirect()->back()->with('message','تم اضافة نوع الضرر')->with('type','success');

     }

    
}



 