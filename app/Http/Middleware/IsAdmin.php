<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Role;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  Request  $request
     * @param Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $role = Role::where('uuid', Auth::user()->role_uuid)->first();

        if( $role->admin != 1 ){
            return redirect('dashboard');
        }

        return $next($request);
    }
}
