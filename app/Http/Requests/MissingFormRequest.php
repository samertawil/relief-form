<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Unique;
use Illuminate\Foundation\Http\FormRequest;
use App\Modules\Address\Models\citizenProfile;

class MissingFormRequest extends FormRequest
{
 
    public function authorize()
    {
        return true;
    }

 
    public function rules()
    {
       
        return [
             'created_by'    =>['required', 'exists:citizen_profiles,id'], // الموظف
             'provider'      =>['required', 'exists:citizen_profiles,id'], // صاحب التبليغ
             'idc'           =>['required','exists:citizens,idc',Rule::unique('missing_people')->where(function ($query) {
                                 return $query->where('provider',citizenProfile::profile()->id);
            }),],
             'living_type'   =>['required'],
             'building_name' =>['required'],
             'missing_date'  =>['required','date','before_or_equal:now'],
             'building_type' =>['required'],
                      
           
        ];
    }

    public function messages() {
        return [
            'idc.exists' => 'رقم الهوية المدخل غير صحيح',
            'created_by.exists'=>'الرجاء ادخال باقي البيانات في صفحة بياناتي قبل الاستمرار بالمنوذج الحالي',
            'provider.exists'=>'الرجاء ادخال باقي البيانات في صفحة بياناتي قبل الاستمرار بالمنوذج الحالي',
        ];
    }
}
