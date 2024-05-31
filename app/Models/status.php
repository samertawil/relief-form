<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class status extends BaseModel
{

    protected $fillable = [
        'status_name', 'p_id',
        'p_id_sub', 'used_in_program_id',
        'route_name', 'page_name',
        'route_system_name', 'description',
    ];


    public static function validate_rules() {
        return [
            'status_name'=>['required',],
            
        ];

    }

    public static function validate_message() {
        return [
            'required'=>'مطلوب ادخال الحقل',
        ];
    }

    public function status_p_id() {
        return $this->hasOne(status::class,'id','p_id');
    }

    public function status_p_id_sub() {
        return $this->hasOne(status::class,'id','p_id_sub');
    }

   

}
