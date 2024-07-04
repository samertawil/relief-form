<?php

namespace App\Modules\Address\Http\Controllers;

use App\Models\citizen;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CitzenRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Modules\Address\Models\citizenProfile;


class citizenController extends Controller
{


    public function store(CitzenRequest $request)
    {

        $citizenIdc = citizen::current_user_citizen_idc($request->user()->idc);


        citizenProfile::upsert([
            [
                'user_id'                   => Auth::id(),
                'current_address_status'    => $request->current_address_status,
                'mobile1'                   => $request->mobile1,
                'mobile2'                   => $request->mobile2,
                'email'                     => $request->email,
                // 'citizen_idc'               => $citizenIdc->idc,
            ]
        ], uniqueBy: ['user_id'], update: ['current_address_status', 'mobile1', 'mobile2', 'email']);
        return redirect()->route('main.page')->with('message', 'تم حفظ البيانات بنجاح')->with('type', 'success');
    }
}
