<?php

namespace App\Http\Middleware;

use App\Modules\Address\Models\citizenProfile;
use Closure;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Modules\Address\Models\address;

class CheckAddress
{

    public function handle(Request $request, Closure $next, ...$address_type)
    {

        $citizenProfile=citizenProfile::select('id','current_address_status')->where('user_id',Auth::id())->wherein('current_address_status',[12,13])->first();
       
        if(!$citizenProfile) {
            return $next($request); 
        }

     

        $addresses = address::where('user_id', Auth::id())->get('address_type');

         
            foreach ($address_type as $Type) {

                foreach ($addresses as $add) {
                    
                    if ($add->address_type == $Type) {
                        return $next($request);
                    }
                }
            }
            return redirect()->route('address.create');
        
    }
}
