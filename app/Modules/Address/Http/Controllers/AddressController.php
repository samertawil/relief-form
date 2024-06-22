<?php

namespace App\Modules\Address\Http\Controllers;



use Illuminate\Http\Request;

use Illuminate\Validation\Rule;

use App\Http\Controllers\Controller;
use App\Modules\Address\Models\area;
use App\Modules\Address\Models\city;
use Illuminate\Support\Facades\Auth;
use App\Modules\Status\Models\status;
use App\Modules\Address\Models\region;
use App\Modules\Address\Models\street;
use App\Modules\Address\Models\address;
use App\Modules\Address\Models\location;
use Illuminate\Support\Facades\Validator;
use App\Modules\Address\Models\CitzenProfile;
use App\Modules\Address\Models\neighbourhood;
use Symfony\Component\HttpKernel\Profiler\Profile;

class AddressController extends Controller
{

    public function index()
    {

        $addresses = address::with(['regionname', 'cityname', 'areaname', 'neighbourhoodname', 'streetname', 'nearestlocname', 'locname', 'addresstypename'])->latest()->get();

        $contactData = address::contacts_data();

        return view('AddressModule::address.index')
            ->with('nearlocs', $contactData['nearlocs'])
            ->with('mobile', $contactData['mobile'])
            ->with('profiles', $contactData['profiles'])
            ->with('addresses', $addresses);
    }



    public function create_orginal_address()
    {


        $regions = region::get();
        $cities = city::get();
        $areas = area::get();
        $neighbourhoods = neighbourhood::get();
        $streets = street::get();
        $nearlocs = status::select('id', 'status_name', 'p_id_sub')->wherein('p_id_sub', [2, 5, 10,])->get();
        $nearlocnames = location::get();

        $addresses = address::with(['regionname', 'cityname', 'areaname', 'neighbourhoodname', 'streetname', 'nearestlocname', 'locname', 'addresstypename', 'getuserinfo'])->where('user_id', Auth::id())->latest()->get();


        $address = new address();
        $profiles = new CitzenProfile();

        return view('AddressModule::address.create-orginal-address', compact('regions', 'cities', 'areas', 'neighbourhoods', 'streets', 'nearlocs', 'nearlocnames', 'addresses', 'address', 'profiles'));
    }

    public function create_contacts_info()
    {

        $contactData = address::contacts_data();

        return view('AddressModule::address.create-contacts-info')
            ->with('nearlocs', $contactData['nearlocs'])
            ->with('mobile', $contactData['mobile'])
            ->with('profiles', $contactData['profiles']);
    }

    public function create()
    {


        $regions = region::get();
        $cities = city::get();
        $areas = area::get();
        $neighbourhoods = neighbourhood::get();
        $streets = street::get();
        $nearlocs = status::select('id', 'status_name', 'p_id_sub')->wherein('p_id_sub', [2, 5, 10,])->get();
        $nearlocnames = location::get();

        $addresses = address::with(['regionname', 'cityname', 'areaname', 'neighbourhoodname', 'streetname', 'nearestlocname', 'locname', 'addresstypename', 'getuserinfo'])->where('user_id', Auth::id())->latest()->get();



        $profiles = CitzenProfile::where('user_id', Auth::id())->first();

        $mobile = '';

        empty($profiles->mobile1) ? $mobile = Auth::user()->mobile : $profiles;

        $address = new address();


        return view('AddressModule::address.create', compact('regions', 'cities', 'areas', 'neighbourhoods', 'streets', 'nearlocs', 'nearlocnames', 'addresses', 'address', 'profiles', 'mobile'));
    }


    public function store(Request $request, $address_type)
    {
        $data =  array_merge($request->all(), ['address_name' => Auth::user()->idc, 'user_id' => Auth::id(), 'address_type' => $address_type]);

        $profile = address::contacts_data();

        $validator = Validator::make($data , address::validate_rules($data));

        if ($address_type == 8 &&  $profile['profiles']['current_address_status'] == 13 &&  (empty($request->home_type))) {

            $validator->errors()->add('home_type', 'الرجاء ادخال الحقل');
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $validator->validate();

      

        address::create($data);
        return redirect()->back()->with('message', 'تم الحفظ بنجاح')->with('type', 'success');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {

        $address = address::with(['regionname', 'cityname', 'areaname', 'neighbourhoodname', 'streetname', 'nearestlocname', 'locname', 'addresstypename'])->findorFail($id);
        $nearlocs = status::select('id', 'status_name', 'p_id_sub')->wherein('p_id_sub', [2, 5,])->get();
        $regions = region::get();
        $cities = city::get();
        $areas = area::get();
        $neighbourhoods = neighbourhood::get();
        $streets = street::get();
        $nearlocnames = location::get();

        $profiles = new CitzenProfile();
        $addresses = $address;
        return view('AddressModule::address.edit', compact('address', 'nearlocs', 'regions', 'cities', 'areas', 'neighbourhoods', 'streets', 'nearlocnames', 'profiles', 'addresses'));
    }


    public function update(Request $request, $id)
    {
        $address = address::findorFail($id);
        $request->validate(address::validate_rules($request));
        $address->update($request->all());
        return redirect()->back()->with('message', 'تم الحفظ بنجاح')->with('type', 'success');
    }


    public function destroy($id)
    {

        $data = address::destroy($id);
        return redirect()->back()->with('message', 'تم حذف العنوان بنجاح')->with('type', 'success');
    }
}
