<?php

namespace App\Http\Controllers\address;

use App\Models\area;
use App\Models\city;
use App\Models\region;
use App\Models\status;
use App\Models\street;
use App\Models\location;
use Illuminate\Http\Request;
use App\Models\neighbourhood;
use App\Http\Controllers\Controller;
use App\Models\address;

class AddressController extends Controller
{
  
    public function index()
    {
        //
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
        $addresses=address::with(['regionname','cityname','areaname','neighbourhoodname','streetname'])->get();
     return view('address.create',compact('regions','cities','areas','neighbourhoods','streets','nearlocs','nearlocnames','addresses'));
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
        //
    }

 
    public function update(Request $request, $id)
    {
        //
    }

 
    public function destroy($id)
    {
        //
    }
}
