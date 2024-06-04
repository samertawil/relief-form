<?php

namespace App\Http\Controllers\address;

use App\Models\area;
use App\Models\city;
use App\Models\region;

use App\Models\street;
use App\Models\address;
use App\Models\location;
use Illuminate\Http\Request;
use App\Models\neighbourhood;
use App\Http\Controllers\Controller;
use App\Modules\Status\Models\status;

class AddressController extends Controller
{
  
    public function index()
    {
        $addresses=address::with
        (['regionname','cityname','areaname','neighbourhoodname','streetname','nearestlocname','locname','addresstypename'])->latest()->get();
        return view('address.index',['addresses'=>$addresses]);
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
        (['regionname','cityname','areaname','neighbourhoodname','streetname','nearestlocname','locname','addresstypename'])->latest()->take(1)->get();
        $address = new address();
       
     return view('address.create',compact('regions','cities','areas','neighbourhoods','streets','nearlocs','nearlocnames','addresses','address'));
    }

 
    public function store(Request $request)
    {
        $request->validate(address::validate_rules(),address::validate_message());
       address::create($request->all());
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
 
        return view('address.edit',compact('address','nearlocs','regions','cities','areas','neighbourhoods','streets','nearlocnames'));
    }

 
    public function update(Request $request, $id)
    {
        $address=address::findorFail($id);
        $request->validate(address::validate_rules(),address::validate_message());
        $address->update($request->all());
        return redirect()->back()->with('message','تم الحفظ بنجاح')->with('type','success');
    }

 
    public function destroy($id)
    {
        //
    }
}
