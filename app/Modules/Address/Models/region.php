<?php

namespace App\Modules\Address\Models;

use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class region extends Model
{
    use HasFactory;

    public static function regions()
    {
        return   Cache::rememberForever('regions', function () {
            return region::get();
        });
    }
}
