<?php

namespace App\Modules\Address\Http\Controllers;

use App\Models\citizen;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Modules\Address\Models\CitzenProfile;


class CitzenController extends Controller
{


    public function store(Request $request)
    {

   

       $citizenIdc=citizen::current_user_citizen_id( $request->user()->idc);

       $validator = Validator::make($request->all(), CitzenProfile::validate_rules($request))->validate();

        CitzenProfile::upsert([
            [
                'user_id' => Auth::id(),
                'current_address_status' => $request->current_address_status,
                'mobile1' => $request->mobile1,
                'mobile2' => $request->mobile2,
                'email' => $request->email,
                  'citizen_id'=>$citizenIdc->id,
            ]
        ], uniqueBy: ['user_id'], update: ['current_address_status', 'mobile1', 'mobile2', 'email']);

        return redirect()->back()->with('message', 'تم الحفظ بنجاح')->with('type', 'success');
    }
}
