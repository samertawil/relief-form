<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\citizen;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\ChkIdcRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{


    use RegistersUsers;

    protected $redirectTo = '/';


    public function __construct()
    {
        $this->middleware('guest');
    }



    public function register_create()
    {
        return view('auth-relief-forms.register-create');
    }

    public function showRegistrationForm(ChkIdcRequest $request)
    {

        $citizen = citizen::where('idc', $request->idc)->first();

        return view('auth-relief-forms.register', compact('citizen'));
    }


    public function register_store(RegisterRequest $request, $idc)
    {
        
        $citizen = citizen::where('idc', $idc)->first();

        $validator = Validator::make($request->all(), []);

        $citizen = citizen::where('idc', $idc)->first();
 
        if (!($citizen->CI_BIRTH_DT == $request->birthday)) {

            $validator->errors()->add('birthday', 'تاريخ الميلاد غير صحيح');
            return redirect()->back()->withErrors($validator)->withInput();
        }
        if (!($citizen->answer_q1 == $request->answer_q1 && $citizen->answer_q2 == $request->answer_q2)) {

            $validator->errors()->add('idc', ' خطأ بإجابة الاسئلة ');

            return redirect()->back()->withErrors($validator)->withInput();
        }
        


        $full_name = ($citizen->CI_FIRST_ARB . ' ' . $citizen->CI_FATHER_ARB . ' ' . $citizen->CI_GRAND_FATHER_ARB . ' ' . $citizen->CI_FAMILY_ARB);

        $user =  User::create([
            'idc' => $idc,
            'mobile' => $request->mobile,
            'user_name' => $idc,
            'full_name' =>  $full_name,
            'email' => null,
            'password' => Hash::make($request->password),
        ]);


        Auth::loginUsingId($user->id);

        return redirect('/');
    }


}
