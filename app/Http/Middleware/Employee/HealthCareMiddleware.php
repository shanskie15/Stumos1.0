<?php

namespace App\Http\Middleware\Personnels;

use Closure;

class HealthCareMiddleware
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
        if(auth()->user()->personnel_type == 'healthcareprofessional'){
            return $next($request);
        }else{
            return redirect()->route('login')->with('error',"You don't have clearance to access");
        }
        return redirect('login')->with('error',"You don't have clearance to access");
    }
}
