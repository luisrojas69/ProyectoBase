<?php

namespace App\Http\Middleware;

use Closure;

use Illuminate\Support\Facades\Auth;

class CheckStatus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $response = $next($request);

        //If the status is not approved redirect to login 

        if(Auth::check() && Auth::user()->status_id == '2'){

            Auth::logout();

            //$request->session()->flash('error', 'Su cuenta se encuentra inactiva.');

            return redirect('/login')->with('error', 'Su cuenta se encuentra inactiva.');

        }elseif (Auth::check() && Auth::user()->status_id == '3') {
            Auth::logout();
            return redirect('/password/reset')->with('error', 'Contraseña Expirada');
        }

        return $response;

    }
}
