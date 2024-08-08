<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use TimeHunter\LaravelGoogleReCaptchaV2\Validations\GoogleReCaptchaV2ValidationRule;

class GetHelpRequest extends FormRequest
{
 
    public function authorize()
    {
        return true;
    }

 
    public function rules()
    {
       
        return [
            'created_by_idc'=>['required'],
            'name'=>['required'],
            'mobile'=>['required'],
            'subject'=>['required'],
            'issue_description'=>['required'],
             'captcha'=>['required','captcha'],
            
        ];
    }

    public function messages() {
        return [
            'subject.required'=>'طلب دعم فني بخصوص',
             'name.required'=>'اسم مقدم الطلب',
            'issue_description.required'=>'تفصيل الدعم الفني المطلوب',
            'created_by_idc.required'=>'رقم هوية مقدم الطلب',
            'g-recaptcha-response'=>'الرجاء الضغط على بطاقة التحقق',
            'captcha.captcha'=>'خطأ في كود التحقق ',
        ];
    }
}
