<?php

namespace app\Modules\Damage\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MissingPeople extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['created_by', 'strike_date', 'building_name', 'floor', 'building_type', 'address_id', 'active'];

    public static function validate_rules() {

        return [
            'created_by'=>['required'],
            'strike_date'=>['required'],
            'building_name'=>['required'],
            'building_type'=>['required'],
            'floor'=>['required'],
            'address_id'=>['required'],
        ];

    }
}
