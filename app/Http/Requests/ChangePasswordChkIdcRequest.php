<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChangePasswordChkIdcRequest extends FormRequest
{
   
    public function authorize()
    {
        return true;
    }

    
    public function rules()
    {
         return [
         'idc'=>[ 'required','exists:ssn_login_ques_tb,idc','exists:users,idc'],
         
        ];

    }
    public function messages()
    {
      return[
        'idc.exists'=>'رقم الهوية غير صحيح - لا يوجد حساب لهذا الرقم ',
               
      ];  
    } 
}
