<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CheckIdc
{

    public function handle(Request $request, Closure $next)
    {


        $validator = Validator::make($request->all(), [

            // 'idc' => 'required',
        ]);

        $user = User::select('id', 'idc')->where('idc', $request->idc)->first();

        if (!$user) {
            
            $validator->errors()->add('idc', 'لا يوجد حساب لرقم الهوية المدخل');
            return redirect()->back()->withErrors($validator)->withInput();
        }

        return $next($request);
    }
}
