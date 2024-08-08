<?php

namespace App\Modules\Address\Http\Controllers;


use App\Http\Controllers\Controller;
use App\Modules\Address\Models\city;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests\AddressRequest;
use Illuminate\Support\Facades\Cache;
use App\Modules\Address\Models\region;

use App\Modules\Address\Models\address;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Validator;
use App\Modules\Address\Models\neighbourhood;
use App\Modules\Address\Models\citizenProfile;
use App\Modules\Address\Models\location;
use Symfony\Component\HttpKernel\Profiler\Profile;

class AddressController extends Controller
{

    public function index()
    {


        $addresses = address::with(['regionname', 'cityname',  'neighbourhoodname',   'locname', 'addresstypename'])->wherein('address_type', [6, 7, 8])
            ->latest()->get();



        $contactData = address::contacts_data();

        return view('AddressModule::address.index')
            ->with('nearlocs', $contactData['nearlocs'])
            ->with('mobile', $contactData['mobile'])
            ->with('profiles', $contactData['profiles'])
            ->with('addresses', $addresses);
    }



    public function create_orginal_address()
    {


        $contactData = address::contacts_data();
        $regions = region::regions();

        $addresses = address::with(['regionname', 'cityname',  'neighbourhoodname',   'locname', 'addresstypename', 'getuserinfo'])->where('user_id', Auth::id())->latest()->get();


        $address = new address();
        $profiles = new citizenProfile();

        $oldCity = [];
        $oldneighbourhood = [];
        $oldnearlocname=[];

        if (old('city_id')) {
            $oldCity =    city::where('id', old('city_id'))->get();
        }
        if (old('neighbourhood_id')) {
            $oldneighbourhood =    neighbourhood::where('id', old('neighbourhood_id'))->get();
        }

        if (old('near_loc_id')) {
            $oldnearlocname =    location::where('id', old('near_loc_id'))->get();
        }


        return view('AddressModule::address.create-orginal-address')->with('regions', $regions)->with('address', $address)
            ->with('addresses', $addresses)->with('mobile', $contactData['mobile'])->with('profiles', $contactData['profiles'])->with('nearlocs', $contactData['nearlocs'])->with('oldCity', $oldCity)->with('oldneighbourhood', $oldneighbourhood)
            ->with('oldnearlocname',$oldnearlocname);
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

        $oldCity = [];
        $oldneighbourhood = [];
        $oldnearlocname=[];

        $regions = region::regions();
        $addresses = address::with(['regionname', 'cityname',  'neighbourhoodname',   'locname', 'addresstypename', 'getuserinfo'])->where('user_id', Auth::id())->latest()->get();

        $profiles = citizenProfile::where('user_id', Auth::id())->first();

        $mobile = '';

        empty($profiles->mobile1) ? $mobile = Auth::user()->mobile : $profiles;

        $address = new address();


        return view('AddressModule::address.create', compact('regions', 'addresses', 'address', 'profiles', 'mobile', 'oldCity','oldneighbourhood','oldnearlocname'));
    }


    public function store(AddressRequest $request, $address_type)
    {

        $data =  array_merge($request->all(), ['address_name' => Auth::user()->idc, 'user_id' => Auth::id(), 'address_type' => $address_type]);

        $profile = address::contacts_data();

        $validator = Validator::make($data, []);

        if ($address_type == 8 &&  $profile['profiles']['current_address_status'] == 13 &&  (empty($request->home_type))) {

            $validator->errors()->add('home_type', 'الرجاء ادخال الحقل');
            return redirect()->back()->withErrors($validator)->withInput();
        }


        address::create($data);
        return redirect()->route('main.page')->with('message', 'تم حفظ العنوان بنجاح')->with('type', 'success');;
    }



    public function edit($id)
    {
        

        $oldCity = [];
        $oldneighbourhood = [];
        $oldnearlocname=[];

        $address = address::with(['regionname', 'cityname',  'neighbourhoodname',   'locname', 'addresstypename'])->findorFail($id);
        $regions = region::regions();
        $profiles = new citizenProfile();
        $addresses = $address;
        return view('AddressModule::address.edit', compact('address',   'regions',    'profiles', 'addresses', 'oldCity','oldneighbourhood'
    ,'oldnearlocname'));
    }


    public function update(AddressRequest $request, $id)
    {

        $address = address::findorFail($id);
        $address->update($request->except('addree_type'));
        return redirect()->route('address.index')->with('message', 'تم الحفظ بنجاح')->with('type', 'success');
      
    }


    public  function destroy($id)
    {

        $data = address::destroy($id);
        return redirect()->back()->with('message', 'تم حذف العنوان بنجاح')->with('type', 'success');
    }

    public static function forgetCache()
    {

        cache::forget('addressInCache');
    }
}
