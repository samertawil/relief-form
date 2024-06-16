<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Modules\Address\Models\address;

class CheckOrginalAddress
{

    public function handle(Request $request, Closure $next, ...$address_type)
    {
        $user = $request->user();

        $addresses = address::where('user_id', Auth::id())->get('address_type');

        if (!$user) {
            return redirect()->route('login');
        } else {
            foreach ($address_type as $Type) {

                foreach ($addresses as $add) {
                    
                    if ($add->address_type == $Type) {
                        return $next($request);
                    }
                }
            }
            return redirect()->route('address.create.orginal.address');
        }
    }
}
