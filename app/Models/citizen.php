<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class citizen extends Model
{
    use HasFactory;

public static function current_user_citizen_id($idc) {

    $currentCitizen = citizen::where('idc',$idc)->first();
    
    return $currentCitizen;
}
   
}
