<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DamagedTransportsRequest extends FormRequest
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

  
    public function rules()
    {
        // dd($this->all());
        return [
            'transport_category'=>['required'],
            'transport_type'=>['required'],
            'transport_no'=>['nullable','unique:transport_damages,transport_no'],
            'regestration_idc'    => ['required', 'exists:ssn_login_ques_tb,idc'],   
            'owner_idc'    => ['nullable', 'exists:ssn_login_ques_tb,idc'],   
            'damage_date'  =>['required','before_or_equal:now,after_or_equal:"07-10-2023"'],
            'created_by'    => ['required', 'exists:citizen_profiles,id'],   
            'attachments.*'=> [ 'image','max:2048' ]  ,
        ];
    }


    public function messages()
    {
        return [
           'regestration_idc.exists'=>'رقم الهوية المدخل غير صحيح' ,
        ];
    }


}
