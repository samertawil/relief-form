<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AllCitizen extends Model
{
    use HasFactory;

     protected $connection = 'mysql1'; 

     protected $table='users';


     public function getCitizenFullNameAttribute() {
     
        return  $this->f_name.' '.$this->sec_name.' '.$this->third_name.' '.$this->l_name;
    }

  
}
