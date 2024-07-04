<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use PhpParser\Node\Expr\FuncCall;
use Illuminate\Foundation\Http\FormRequest;

class DamagedPlacesRequest extends FormRequest
{
   
    public function authorize()
    {
        return true;
    }
 
    public function rules()
    {
        $rules= [
            'created_by'    => ['required', 'exists:citizen_profiles,id'], 
            'creator_type'  =>['nullable','in:citizen,employee'],
            'building_name' =>['required',Rule::unique('damaged_residential_places','created_by')],
            'damage_date'   =>['required','before_or_equal:now','after_or_equal:"07-10-2023"'],
            'building_type' =>['required'],
            'region_id'                 => ['required'],
            'city_id'                   => ['required'],
            'neighbourhood_id'          => ['required'],
            'address_specific'          => ['required'],
           
        ];
        return $rules;
    }


 public function messages()
 {
    return [

    ];
 }


}
