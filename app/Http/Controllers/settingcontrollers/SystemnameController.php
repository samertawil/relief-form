<?php

namespace App\Http\Controllers\settingcontrollers;

use App\Http\Controllers\Controller;
use App\Models\setting_system;
use Illuminate\Http\Request;
 


class SystemnameController extends Controller
{

    public function store(Request $request) {

        setting_system::create($request->all());
        return redirect()->back()->with('message','تم الحفظ بنجاح')->with('type','success');
    }
    
}