<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Http\Requests\RegisterRequest;
use Laravel\Sanctum\HasApiTokens;
use App\Modules\Status\Models\status;
use App\Modules\Address\Models\address;
use App\Modules\Address\Models\citizenProfile;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Validator;
use PhpParser\Node\Stmt\ElseIf_;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;


    protected $fillable = [
        'name',
        'idc',
        'user_name',
        'full_name',
        'mobile',
        'email',
        'password',
    ];


    protected $hidden = [
        'password',
        'remember_token',
    ];


    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

 


    public   function citizendata()
    {
        return $this->hasOne(citizen::class, 'id', 'idc');
    }


    // public static function forget_password_validate_rule()
    // {

    //     return [
    //         'idc' => ['required', 'numeric', 'min_digits:9', 'max_digits:9'],
    //         'mobile' => ['required', 'numeric',   'min_digits:10', 'max_digits:10'],
    //         'password' => ['required', 'string', 'min:4', 'confirmed'],
    //     ];
    // }


    public function UserAddress()
    {
        return $this->hasone(address::class, 'user_id', 'id');
    }

    public function profile()
    {
        return $this->hasOne(citizenProfile::class, 'user_id', 'id');
    }
}
