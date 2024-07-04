<?php

namespace App\Modules\Damage\Http\Controllers\forms;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Modules\Status\Models\status;
use App\Modules\Address\Models\region;
use App\Modules\Address\Models\address;
use function Symfony\Component\String\b;
use App\Http\Requests\MissingFormRequest;
use Illuminate\Support\Facades\Validator;
use App\Modules\Damage\Models\MissingPeople;
use App\Modules\Address\Models\citizenProfile;

class MissingController extends Controller
{

    public function index()
    {

        $people = MissingPeople::where('provider', Auth::user()->profile->id)->get();
        dd($people);
    }



    public function create()
    {

        $profiles = new citizenProfile();
        $address = new address();

        $regions = region::get();
        $people = MissingPeople::with(['citizen', 'livingStatusName', 'address'])->where('provider', Auth::user()->profile->id)->get();

        return  view('DamageModule::missing-form.damages-missing-form', compact('profiles', 'address', 'regions', 'people'));
    }

    public function store(MissingFormRequest $request)
    {

        $data=[];

        if ($request->from_building_name) {
            $data = MissingPeople::select('building_name', 'floor', 'building_type', 'address_id')
                ->where('id', $request->from_building_name)->first();
        }

        DB::beginTransaction();
        try {
            if (!$data) {
                $address = address::create([
                    'region_id'          => $request->region_id,
                    'city_id'            => $request->city_id,
                    'neighbourhood_id'   => $request->neighbourhood_id,
                    'near_loc_id'        => $request->near_loc_id,
                    'address_specific'   => $request->address_specific,
                    'address_type'       => 54,
                    'user_id'            => Auth::id(),
                    'address_name'       => $request->building_name,

                ]);
            } 
            
            else if ($data) {
                $address = new address();
            }

            MissingPeople::create([
                'idc'           => $request->idc,
                'created_by'    => $request->user()->profile->id,
                'provider'      => $request->user()->profile->id,
                'missing_date'  => $request->missing_date,
                'living_type'   => $request->living_type,
                'building_name' => $request->building_name ? $request->building_name : $data->building_name,
                'building_type' => $request->building_type ? $request->building_type : $data->building_type,
                'floor'         => $request->floor ? $request->floor : $data->floor,
                'address_id'    =>  $address->id ? $address->id : $data->address_id,

            ]);

            DB::commit();

            return redirect()->back()->with('message', 'تم الاضافة بنجاح')->with('type', 'success');
        } catch (\Exception $e) {
            DB::rollBack();
            return $e;
            // redirect()->back()->with('message', 'فشلت عملية الحفظ')->with('type', 'danger');
        }
    }

    public function destroy($id, $address_id)
    {

        $destroyMissing =  MissingPeople::findorfail($id);
        $destroyMissing->delete();
        $destroyAddress = address::destroy($address_id);




        return redirect()->back()->with('message', 'تم الحذف بنجاح')->with('type', 'success');
    }

    public function building()
    {

        $people = MissingPeople::with(['address'])->where('provider', Auth::user()->profile->id)->get();

        return response($people, 200);
    }

    public function building_id($id)
    {

        $people = MissingPeople::with(['address'])->where('id', $id)->where('provider', Auth::user()->profile->id)->first();


        return response($people, 200);
    }
}
