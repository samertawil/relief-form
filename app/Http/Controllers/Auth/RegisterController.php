<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\citizen;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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



    public function register(Request $request)
    {


        $citizens = citizen::where('idc',  $request->idc)->first();

        if (!($citizens && $citizens->birthday == $request->birthday)) {

            $validator = Validator::make($request->all(), User::validate_rule(), User::validate_message());

            $validator->errors()->add('birthday', 'تاريخ الميلاد غير صحيح');
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $full_name = ($citizens->first_name . ' ' . $citizens->sec_name . ' ' . $citizens->thr_name . ' ' . $citizens->last_name);


        $user =  User::create([
            'idc' => $request->idc,
            'mobile' => $request->mobile,
            'user_name' => $request->idc,
            'full_name' =>   $full_name,
            'email' => $request->idc,
            'password' => Hash::make($request->password),
        ]);


        Auth::loginUsingId($user->id);

        return redirect('/');
    }


    public function showRegistrationForm()
    {

        return view('layouts.register');
    }
}
