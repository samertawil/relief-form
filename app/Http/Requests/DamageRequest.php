<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use App\Modules\Address\Models\citizenProfile;

class DamageRequest extends FormRequest
{
  
    public function authorize()
    {
        return true;
    }

    
    public function rules()
    {
      
        return [
            'damage_type' => ['required',Rule::unique('damage_masters')->where(function ($query) {
                return $query->where('profile_id',citizenProfile::profile()->id);
            }),
        ],
        ];
    }
}
