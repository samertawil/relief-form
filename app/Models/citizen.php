<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class citizen extends Model
{
    use HasFactory;

    protected $table='ssn_login_ques_tb';
    protected $primaryKey = 'idc';

public static function current_user_citizen_idc($idc) {

    $currentCitizen = citizen::where('idc',$idc)->first();
    
    return $currentCitizen;
}

public function getCitizenFullNameAttribute() {
    // dd(Auth::user()->citizendata->citizen_full_name);
    $full_name= citizen::select('CI_FIRST_ARB', 'CI_FATHER_ARB' ,'CI_GRAND_FATHER_ARB','CI_FAMILY_ARB')
    ->where('idc',$this->idc)->first();
    return $full_name['CI_FIRST_ARB'].' '.$full_name['CI_FATHER_ARB'].' '.$full_name['CI_GRAND_FATHER_ARB']
    .' '.$full_name['CI_FAMILY_ARB'];
}
   
}
 