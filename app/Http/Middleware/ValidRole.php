<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class ValidRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

    protected $auth;


    public function handle($request, Closure $next, $roles)
    {   

        if (!Auth::check()) {
            return redirect('login');
        }
        //separo los roles en array
        $roles = explode('.', $roles);
        foreach ($roles as $key => $role) {
            //comparo lo que viene como parametro con el rol del usuario
            if (auth()->user()->hasRole->name == $role) {
                return $next($request);
            }
        }
        return redirect('login');
    }
}
