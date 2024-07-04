<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class citizen extends Model
{
    use HasFactory;

    protected $table='ssn_login_ques_tb';
    protected $primaryKey = 'idc';

public static function current_user_citizen_idc($idc) {

    $currentCitizen = citizen::where('idc',$idc)->first();
    
    return $currentCitizen;
}
   
}
