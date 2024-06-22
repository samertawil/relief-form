<?php

namespace App\Modules\Damage\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FormList extends Model
{
    use HasFactory;
    use SoftDeletes;
}
