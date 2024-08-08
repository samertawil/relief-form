<?php
namespace App\Modules\Aid\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Modules\Aid\Models\AidCitizenRegistration;

class AidController extends Controller
{
 
    public function index()
    {
     return  view('AidModule::index');
    }

    public function myInfo()
    {
     $citizen= AidCitizenRegistration::with(['maritalStatus'])->where('idc',Auth::user()->idc)->first(); 
      
     return  view('AidModule::myinfo',compact('citizen'));
    }
 
    public function create()
    {
        //
    }

  
    public function store(Request $request)
    {
        //
    }

  
    public function show($id)
    {
        //
    }

 
    public function edit($id)
    {
        //
    }

 
    public function update(Request $request, $id)
    {
        //
    }

 
    public function destroy($id)
    {
        //
    }
}
