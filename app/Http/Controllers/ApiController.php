<?php

namespace App\Http\Controllers;

use App\Models\citizen;
use Illuminate\Http\Request;

class ApiController extends Controller
{


    public function api_idc($idc)
    {
        $currentCitizen = citizen::current_user_citizen_id($idc);
 
             return response($currentCitizen, 200);
    }
}
