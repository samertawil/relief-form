<?php

namespace App\Modules\Address\Http\Controllers;
 

 
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Modules\Address\Models\area;
use App\Modules\Address\Models\city;
use Illuminate\Support\Facades\Auth;
use App\Modules\Status\Models\status;
use App\Modules\Address\Models\region;
use App\Modules\Address\Models\street;
use App\Modules\Address\Models\address;
use App\Modules\Address\Models\location;
use App\Modules\Address\Models\neighbourhood;

class AddressController extends Controller
{
  
    public function index()
    {
      
        $addresses=address::with
        (['regionname','cityname','areaname','neighbourhoodname','streetname','nearestlocname','locname','addresstypename'])->latest()->get();
        return view('AddressModule::address.index',['addresses'=>$addresses]);
    }

 
    public function create()
    {
    

        $regions=region::get();
        $cities=city::get();
        $areas=area::get();
        $neighbourhoods=neighbourhood::get();
        $streets=street::get();
        $nearlocs= status::select('id','status_name','p_id_sub')->wherein('p_id_sub',[2,5,])->get();
        $nearlocnames=location::get();
        $addresses=address::with
        (['regionname','cityname','areaname','neighbourhoodname','streetname','nearestlocname','locname','addresstypename'])->where('user_id',Auth::id())->latest()->get();
       
        $address = new address();
       
     return view('AddressModule::address.create',compact('regions','cities','areas','neighbourhoods','streets','nearlocs','nearlocnames','addresses','address'));
    }

 
    public function store(Request $request)
    {
       
        $request->validate(address::validate_rules());

      
        $data=  array_merge($request->all(),['address_name'=>Auth::user()->idc,'user_id'=>Auth::id()]);
       
       address::create( $data);
       return redirect()->back()->with('message','تم الحفظ بنجاح')->with('type','success');
    }

 
    public function show($id)
    {
        //
    }

 
    public function edit($id)
    {
       
        $address=address::with
        (['regionname','cityname','areaname','neighbourhoodname','streetname','nearestlocname','locname','addresstypename'])->findorFail($id);
        $nearlocs= status::select('id','status_name','p_id_sub')->wherein('p_id_sub',[2,5,])->get();
        $regions=region::get();
        $cities=city::get();
        $areas=area::get();
        $neighbourhoods=neighbourhood::get();
        $streets=street::get();
        $nearlocnames=location::get();
 
        return view('AddressModule::address.edit',compact('address','nearlocs','regions','cities','areas','neighbourhoods','streets','nearlocnames'));
    }

 
    public function update(Request $request, $id)
    {
        $address=address::findorFail($id);
        $request->validate(address::validate_rules() );
        $address->update($request->all());
        return redirect()->back()->with('message','تم الحفظ بنجاح')->with('type','success');
    }

 
    public function destroy($id)
    {
        
       $data = address::destroy($id);
       return redirect()->back()->with('message','تم حذف العنوان بنجاح')->with('type','success');
    }
}
