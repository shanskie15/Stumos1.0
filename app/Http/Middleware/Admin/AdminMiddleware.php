<?php

namespace App\Http\Middleware\Admin;

use Closure;

class AdminMiddleware
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
        if(auth()->user()->personnel_type == 'admin'){
            return $next($request);
        }else{
            return redirect()->route('login')->with('error',"You don't have clearance to access");
        }
        return redirect('login')->with('error',"You don't have clearance to access");
    }
}
