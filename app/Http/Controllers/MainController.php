<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Modules\Address\Models\address;
use App\Modules\Address\Models\citizenProfile;

class MainController extends Controller
{
    public function main()
    {

       
        $address = address::select('id', 'address_type', 'active', 'home_type')->where('user_id', Auth::id())->
        where('address_type',7)->first();
        $withaddressType8= address::select('id')->where('user_id', Auth::id())->where('address_type',8)->first();
      
       
       
        $citizenProfile = citizenProfile::select('id', 'current_address_status')->where('user_id', Auth::id())->first();
      
        if (!$address) {
      
            return redirect()->route('address.create.orginal.address')->with('message', 'السيد ' . ':' . Auth::user()->full_name . ' ' . 'الرجاء ادخال بيانات السكن الاصلي قبل الحرب وارقام التواصل وعنوان النزوح بحال نزوحك من عنوانك الاصلي')->with('type', 'warning');
        }



        if (!$citizenProfile) {

            return redirect()->route('address.create.contacts.info')->with('message', 'السيد ' . ':' . Auth::user()->full_name . ' ' . 'الرجاء ادخال بيانات الهاتف الخليوي وعنوان اقامتك الحالية')->with('type', 'warning');;
        }

        if (
            $citizenProfile &&  ($citizenProfile->current_address_status == 12 || $citizenProfile->current_address_status == 13)
             &&(! $withaddressType8)
        )
         {
           
                 return  redirect()->route('address.create')->with('message', 'السيد ' . ':' . Auth::user()->full_name . ' ' . 'الرجاء ادخال بيانات سكن النزوح ')->with('type', 'warning');
        }

        return  view('main');
    }
}
