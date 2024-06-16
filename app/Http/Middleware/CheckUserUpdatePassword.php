<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use App\Models\citizen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CheckUserUpdatePassword
{

    public function handle(Request $request, Closure $next)
    {
        $validator = Validator::make($request->all(), [
            // 'idc'=>'required',
        ]);

        $answers = citizen::select('answer_q1', 'answer_q2')->where('idc', $request->idc)->first();
        
        if (!empty($answers)) {

            if (!($answers->answer_q1 == $request->answer_q1 && $answers->answer_q2 == $request->answer_q2)) {

                $validator->errors()->add('idc', 'خطأ باجابة الاسئلة ');
                return redirect()->back()->withErrors($validator)->withInput();
            }

            return $next($request);
        }

        $validator->errors()->add('idc', 'خطأ برقم الهوية - الرقم غير موجود بالسجل المدني ');
        return redirect()->back()->withErrors($validator)->withInput();
    }
}
