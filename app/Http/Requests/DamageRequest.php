<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use App\Modules\Address\Models\citizenProfile;

class DamageRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
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
