<?php

namespace App\Http\Middleware;
use App\Modules\Address\Models\citizenProfile;
use Closure;
use Illuminate\Http\Request;
 
use Illuminate\Support\Facades\Auth;


class checkContactsInfo
{

    public function handle(Request $request, Closure $next)
    {
        
       
         $citizenProfile =citizenProfile::select('id')->where('user_id', Auth::id())->first();

        if (!$citizenProfile) {
          
            return redirect()->route('address.create.contacts.info');
        }

        return $next($request);
    }
}
