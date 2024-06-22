<?php

 
namespace App\Modules\Address\Models;

use App\Models\citizen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CitzenProfile extends Model
{
    use HasFactory;

    protected $table = 'citzen_profiles';

    protected $fillable = ['citizen_id',    'user_id',    'current_address_status',    'mobile1',    'mobile2',    'email'];



    public static function validate_rules($request)
    {
        $rules =[

            'mobile1' => ['required', 'numeric',  'unique:citzen_profiles', 'min_digits:9', 'max_digits:10'],
            'mobile2' => ['nullable', 'numeric'],
            'email' => ['nullable', 'email'],
            'current_address_status' => ['required']

        ];

        $profiles = CitzenProfile::where('user_id', Auth::id())->first();
       
        if ($profiles && ($request->mobile1 == $profiles->mobile1)) {
            
            unset($rules['mobile1']);
        }
        return $rules;
    }

    public static function profile() {
        $profile = CitzenProfile::where('user_id', Auth::id())->first();
        return  $profile;
    }

    public function citizen() {
        return $this->hasOne(citizen::class,'id','citizen_id');
    }
}

