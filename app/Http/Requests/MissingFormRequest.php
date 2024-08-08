<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Unique;

use Illuminate\Foundation\Http\FormRequest;
use App\Modules\Damage\Models\MissingPeople;
use App\Modules\Address\Models\citizenProfile;

class MissingFormRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public  function rules()
    {

        $rules = [
            'created_by'    => ['required', 'exists:citizen_profiles,id'], // الموظف
            'provider'      => ['required', 'exists:citizen_profiles,id'], // صاحب التبليغ
            'idc'           => ['required', 'exists:mysql1.users,id', Rule::unique('missing_people')->where(function ($query) {
                return $query->where('provider', citizenProfile::profile()->id);
            }),],
            'living_type'               => ['required'],
            'building_name'             => ['required'],
            'missing_date'              => ['required', 'date', 'after_or_equal:"07-10-2023"','before_or_equal:now',],
            'building_type'             => ['required'],
            'region_id'                 => ['required'],
            'city_id'                   => ['required'],
            'neighbourhood_id'          => ['required'],
            'address_specific'          => ['required'],
          
        ];

        if ($this->from_building_name) {
            $data = MissingPeople::where('id', $this->from_building_name)->first();
            if ($data) {
                unset($rules['building_name']);
                unset($rules['building_type']);
                unset($rules['region_id']);
                unset($rules['city_id']);
                unset($rules['neighbourhood_id']);
                unset($rules['address_specific']);
            }
        }
        return $rules;
    }

    public function messages()
    {
        return [
            'idc.exists' => 'رقم الهوية المدخل غير صحيح',
            'created_by.exists' => 'الرجاء ادخال باقي البيانات في صفحة بياناتي قبل الاستمرار بالمنوذج الحالي',
            'provider.exists' => 'الرجاء ادخال باقي البيانات في صفحة بياناتي قبل الاستمرار بالمنوذج الحالي',
        ];
    }
}
