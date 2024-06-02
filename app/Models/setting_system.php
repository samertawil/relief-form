<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Expr\FuncCall;

class setting_system extends Model
{
    use HasFactory;

    protected $fillable=['system_name',	'description', 'active', 'status_id', 'date1'];

    // protected static function booted() {

    // }

       
}
