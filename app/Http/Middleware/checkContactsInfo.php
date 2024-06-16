<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\CitzenProfile;
use Illuminate\Support\Facades\Auth;

class checkContactsInfo
{

    public function handle(Request $request, Closure $next)
    {
        
        $CitzenProfile = CitzenProfile::select('id')->where('user_id', Auth::id())->first();

        if (!$CitzenProfile) {
          
            return redirect()->route('address.create.contacts.info');
        }

        return $next($request);
    }
}
