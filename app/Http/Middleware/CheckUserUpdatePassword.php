<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use App\Models\citizen;
use Illuminate\Http\Request;

class CheckUserUpdatePassword
{

    public function handle(Request $request, Closure $next)
    {

        $answers = citizen::select('answer_q1', 'answer_q2')->where('idc', $request->idc)->first();

        if (!($answers->answer_q1 == $request->answer_q1 && $answers->answer_q2 == $request->answer_q2)) {

            return redirect()->back()->with('message', 'خطأ بالبيانات المدخلة')->with('type', 'danger');
        }

        return $next($request);
    }
}
