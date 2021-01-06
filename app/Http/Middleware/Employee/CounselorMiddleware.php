<?php

namespace App\Http\Middleware\Personnels;

use Closure;

class CounselorMiddleware
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
        if(auth()->user()->personnel_type == 'counselor'){
            return $next($request);
        }else{
            return redirect()->route('login')->with('error',"You don't have clearance to access");
        }
        return redirect('login')->with('error',"You don't have clearance to access");
    }
}
