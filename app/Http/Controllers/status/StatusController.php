<?php

namespace App\Http\Controllers\status;

use App\Models\setting_system;
use App\Models\status;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class statusController extends Controller
{
 
    public function index()
    {
        return view('status.index');
    }
 
    public function create()
    {
        $systems_data =  setting_system::get();
      
        $all_data=status::with(['status_p_id_sub','status_p_id'])->select('status_name','id', 'p_id', 'p_id_sub')->get();
        return view('status.create',compact('systems_data','all_data'));
     
      
    }

  
    public function store(Request $request)
    {
         $request->validate(status::validate_rules(),status::validate_message());
         $data=status::create($request->all());
         return redirect()->back()->with('message','تم الحفظ بنجاح')->with('type','success');
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
