<?php

namespace App\Modules\Address\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class location extends Model
{
    use HasFactory;
    use SoftDeletes;

}
