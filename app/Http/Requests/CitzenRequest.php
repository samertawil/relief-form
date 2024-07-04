<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;
use App\Modules\Address\Models\citizenProfile;

class CitzenRequest extends FormRequest
{
 
    public function authorize()
    {
        return true;
    }

  
    public function rules()
    {
        $rules =[

            'mobile1' => ['required', 'numeric',  'unique:citizen_profiles', 'min_digits:9', 'max_digits:10'],
            'mobile2' => ['nullable', 'numeric'],
            'email' => ['nullable', 'email'],
            'current_address_status' => ['required'],
            'citizen_idc'=>['nullable','exists:ssn_login_ques_tb,idc'],

        ];

        $profiles = citizenProfile::where('user_id', Auth::id())->first();
       
        if ($profiles && ($this->mobile1 == $profiles->mobile1)) {
            
            unset($rules['mobile1']);
        }
        return $rules;
    }
}
