<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Sanctum\HasApiTokens;
use App\Modules\Status\Models\status;
use App\Modules\Address\Models\address;
use App\Modules\Address\Models\CitzenProfile;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Validator;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'idc',
        'user_name',
        'full_name',
        'mobile',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];


    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


public   function citizendata() {
    return $this->hasOne(citizen::class,'id','idc');
}

public static function validate_rule()
{

    return [
        'idc' => ['required', 'numeric', 'unique:users', 'min_digits:9', 'max_digits:9'],
        'mobile' => ['required', 'numeric',  'unique:users', 'min_digits:10', 'max_digits:10'],
        'password' => ['required', 'string', 'min:4', 'confirmed'],
    ];
}

public static function forget_password_validate_rule()
{

    return [
        'idc' => ['required', 'numeric', 'min_digits:9', 'max_digits:9'],
        'mobile' => ['required', 'numeric',   'min_digits:10', 'max_digits:10'],
        'password' => ['required', 'string', 'min:4', 'confirmed'],
    ];
}


public static function validate_message()
{

    return [
          
         'idc.unique' =>'يوجد حساب لرقم الهوية المدخل',
         'mobile.unique' =>'رقم الهاتف الخليوي مدخل مسبقا',
         'idc.min_digits' => 'عدد ارقم الهوية غير صحيح',
         'idc.max_digits' => 'عدد ارقم الهوية غير صحيح',
          'confirmed' =>'يرجى تاكيد كلمة المرور بشكل صحيح',
        
    ];


}


    public function UserAddress() {
        return $this->hasone(address::class,'user_id','id');
    }

public function profile() {
    return $this->hasOne(CitzenProfile::class,'user_id','id');
}
    

}
