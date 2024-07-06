<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TechnicalSupport extends Model
{
    use HasFactory;

    protected $fillable=['created_by_idc','name','mobile','subject','issue_description','email'	];
}
