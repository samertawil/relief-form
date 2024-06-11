<?php

namespace App\Modules\Status\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Expr\FuncCall;

class setting_system extends Model
{
    use HasFactory;

    protected $fillable=['system_name',	'description', 'active', 'status_id', 'date1'];

    public static function validate_rules() {
       return [
        'system_name' => ['required','unique:setting_systems'],
       ];
    }

    // protected static function booted() {

    // }

       
}
