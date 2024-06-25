<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\citizen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\ChangePasswordChkIdcRequest;

class ChangePasswordController extends Controller
{

  public function change_password_form() {

    return view('auth-relief-forms.change-password-create');
        
  }

  public function create(ChangePasswordChkIdcRequest $request)
  {
    
    $citizen = citizen::where('idc', $request->idc)->first();

    return view('auth-relief-forms.change-password', compact('citizen'));

  }

  public function store(ChangePasswordRequest $request, $idc)
  {

    $citizen = citizen::where('idc',  $idc)->first();

    $validator = Validator::make($request->all(), []);

    if (!( $citizen->birthday == $request->birthday)) {

      $validator->errors()->add('birthday', 'تاريخ الميلاد غير صحيح');
      return redirect()->back()->withErrors($validator)->withInput();
    }
    if (!($citizen->answer_q1 == $request->answer_q1 && $citizen->answer_q2 == $request->answer_q2)) {
     
      $validator->errors()->add('idc', ' خطأ بإجابة الاسئلة ');
      return redirect()->back()->withErrors($validator)->withInput();
  }

    $user = User::select('id', 'idc', 'full_name')->where('idc',$idc)->first();

    $user->update([
      
      'password' => Hash::make($request->password),
    ]);

    Auth::loginUsingId($user->id);

    return redirect('/');

  }

  public function apiq($idc)
  {
    $questions = citizen::select('q1', 'q2')->where('idc', $idc)->get();

    if ($questions->isEmpty()) {
      return Response::json(array('q1' => 'خطأ برقم الهوية', 'q2' => 'خطأ برقم الهوية'), 200);
    }
  
    return response($questions, 200);
  }




}
