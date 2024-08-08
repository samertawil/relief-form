<?php

namespace App\Modules\Address\Models;

use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class city extends Model
{
    use HasFactory;

    public static function cities() {
      return  Cache::rememberForever('cities', function () {
         return city::get();  
        });
    }

}
