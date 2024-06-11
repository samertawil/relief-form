<?php

namespace App\Modules\Status\Http\Controllers\settingcontrollers;

use App\Modules\Status\Models\setting_system;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
 


class SystemnameController extends Controller
{

    public function store(Request $request) {

        $request->validate(setting_system::validate_rules());
        setting_system::create($request->all());
        return redirect()->back()->with('message','تم الحفظ بنجاح')->with('type','success');
    }
    
}