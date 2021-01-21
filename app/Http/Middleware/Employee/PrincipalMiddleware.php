<?php

namespace App\Http\Middleware\Employee;

use Closure;

class PrincipalMiddleware
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
        if(auth()->user()->personnel_type == 'principal'){
            return $next($request);
        }else{
            return redirect()->route('login')->with('error',"You don't have clearance to access");
        }
        return redirect('login')->with('error',"You don't have clearance to access");
    }
}
