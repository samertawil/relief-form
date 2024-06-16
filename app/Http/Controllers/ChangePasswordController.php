<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\citizen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

class ChangePasswordController extends Controller
{



  public function create($idc)
  {

    $questions = citizen::select('q1', 'q2')->where('idc', $idc)->first();

    return  view('layouts.change-password', ['questions' => $questions]);
  }

  public function store(Request $request)
  {

    $citizens = citizen::where('idc',  $request->idc)->first();

    if (!($citizens && $citizens->birthday == $request->birthday)) {

      $validator = Validator::make($request->all(), User::forget_password_validate_rule(), User::validate_message());

      $validator->errors()->add('birthday', 'تاريخ الميلاد غير صحيح');
      return redirect()->back()->withErrors($validator)->withInput();
    }


    $user = User::select('id', 'idc', 'full_name')->where('idc', $request->idc)->first();

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
    // return Response::json(array('q1' => $questions[0]['q1'], 'q2' =>$questions[0]['q2']), 200);
    return response($questions, 200);
  }
}
