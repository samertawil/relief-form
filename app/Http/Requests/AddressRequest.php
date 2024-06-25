<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class AddressRequest extends FormRequest
{
 
    public function authorize()
    {
        return true;
    }

 
    public function rules()
    {
 
        return [

            'region_id' => ['required'],
            'city_id' => ['required'],
            'neighbourhood_id' => ['required'],
            'address_specific' => ['required'],
            'address_type' => [ 
                Rule::unique('addresses')->where(function ($query)  {
                    return $query->where('user_id', Auth::id());
                }),
            ],
          
        ];
    }
}
