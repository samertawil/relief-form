<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Modules\Address\Models\citizenProfile;

class DamagedUnitsController extends Controller
{
    public function create()
    {

        $profiles = new citizenProfile();
     
        $people = [];

        return  view('DamageModule::residential-form.damages-units-form', compact('profiles',));
    }

}
