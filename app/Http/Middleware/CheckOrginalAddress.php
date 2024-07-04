<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Modules\Address\Models\address;

class CheckOrginalAddress
{

    public function handle(Request $request, Closure $next, ...$address_type)
    {
      
        $user = $request->user();
         
        $addresses = address::where('user_id', Auth::id())->get('address_type');

        if (!$user) {
            return redirect()->route('login');
        } else {
            foreach ($address_type as $Type) {

                foreach ($addresses as $add) {
                    
                    if ($add->address_type == $Type) {

                        return $next($request);
                    }
                }
            }
            return redirect()->route('address.create.orginal.address')->with('message','السيد ' .':'.Auth::user()->full_name.' '.'الرجاء ادخال بيانات السكن الاصلي قبل الحرب وارقام التواصل وعنوان النزوح بحال نزوحك من عنوانك الاصلي')->with('type','warning');
        }
    }
}
