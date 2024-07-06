<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class DamagedUnitsRequest extends FormRequest
{
 
    public function authorize()
    {
        return true;
    }

  
    public function rules()
    {
        $rules= [
           
            'places_id'     => ['required','exists:damaged_residential_places,id'],
            'damage_size' => ['required'],
            'unit_type' => ['required'],
            'unit_damage_date' => ['required','date','after_or_equal:"07-10-2023"','before_or_equal:now'],
            'citizen_type' => ['required'],
            'beneficiary_idc'=>['nullable','exists:ssn_login_ques_tb,idc','required_if:unit_type,66'],
            'owner_idc'=>['required','exists:ssn_login_ques_tb,idc',],

         
        ];
        return $rules;
    }

    public function messages() 
    {
       return[
        'beneficiary_idc.required_if'=>'حقل رقم هوية المستأجر مطلوب'
        ];
         
    }
}
 