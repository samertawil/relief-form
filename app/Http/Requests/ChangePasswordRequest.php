<?php

namespace App\Http\Requests;

use App\Models\citizen;
use Illuminate\Foundation\Http\FormRequest;

class ChangePasswordRequest extends FormRequest
{
 
    public function authorize()
    {
        return true;
    }

 
    public function rules()
    {
        $rules= [
            'idc' => [ 'numeric', 'min_digits:9', 'max_digits:9'],
            'birthday'=>['required'],
            // 'mobile' => ['required', 'numeric',   'min_digits:10', 'max_digits:10'],
            'password' => ['required', 'string', 'min:4', 'confirmed'],
            'answer_q1'=>['required'],
            'answer_q2'=>['required'],
        ];
        $data =  citizen::where('idc', $this->idc)->first();
        if (!$data->q1) {
            unset($rules['answer_q1']);
            unset($rules['answer_q2']);
        }
        return $rules;
    }

    public function messages()
    {
        return [
            'idc.exists' => 'رقم الهوية المدخل غير صحيح',
            'idc.unique' => 'يوجد حساب لرقم الهوية المدخل',
            // 'mobile.unique' => 'رقم الهاتف الخليوي مدخل مسبقا',
            'idc.min_digits' => 'عدد ارقم الهوية غير صحيح',
            'idc.max_digits' => 'عدد ارقم الهوية غير صحيح',
            'confirmed' => 'يرجى تاكيد كلمة المرور بشكل صحيح',

        ];

      

    }
}
