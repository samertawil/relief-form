<?php

 
namespace App\Modules\Damage\Http\Controllers\forms;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Modules\Status\Models\status;
use Illuminate\Support\Facades\Storage;
use App\Modules\Damage\Models\TransportDamage;
use App\Http\Requests\DamagedTransportsRequest;

class TransporstController extends Controller
{

  public function index() {
      
    $transports=TransportDamage::with(['citizen','StatusType'])->
    where('created_by',Auth::user()->profile->id)->latest()->get();
    
    return view('DamageModule::transport-form.index',compact('transports'));
}

    public function create() {

     
        $transport_type=status::statuses()->wherein('p_id_sub',[94,100]);

        return view('DamageModule::transport-form.damages-transports-form',compact('transport_type'));
    }
    
 
    public function Store(DamagedTransportsRequest $request) {
 
    
    $attchments_file = uploadsFile($request, 'attachments', 'transports');
 
      TransportDamage::create([
        'transport_category'=>$request->transport_category,
        'transport_type'=>$request->transport_type,
        'transport_no'=>$request->transport_no,
        'regestration_idc'=>$request->regestration_idc,
        'owner_idc'=>$request->owner_idc,
        'owner_name'=>$request->owner_name,
        'damage_date'=>$request->damage_date,
        'transport_damage_size'=>$request->transport_damage_size,
        'damage_description'=>$request->damage_description,
        'attachments'=>  $attchments_file,
        'created_by'=>$request->created_by,
      ]);

      return redirect()->route('damages.transports.index')->with('message', 'تم الاضافة بنجاح')->with('type', 'success');
      
    
  }

  public function destroy($id)
{

  $data=TransportDamage::findOrfail($id);
  $data->destroy($id);
  if($data->attachments) {
    foreach($data->attachments as $file) {
      Storage::disk('transports')->delete($file);
    }
  }

  return redirect()->back()->with('message','تم الحذف بنجاح')->with('type','success');

 
}

}
