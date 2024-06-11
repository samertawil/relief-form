<?php

namespace App\Http\Controllers;

use App\Models\User;
 use App\Models\citizen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{
 


    public function create($idc) {
     
        $questions=citizen::select('q1','q2')->where('idc',$idc)->first();
       
        return  view('layouts.change-password',['questions'=>$questions]);
    }

    public function store(Request $request) {
 
      $request->validate(User::forget_password_validate_rule(),User::validate_message());

      $data = User::select('id','idc','full_name')->where('idc',$request->idc)->first();
      $data->update([
        'full_name'=>'2',
        'password'=>Hash::make($request->password),
      ]);
    //    dd($data);
    //  dd('true');
    }

}
