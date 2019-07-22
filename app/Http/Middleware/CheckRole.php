<?php

namespace App\Http\Middleware;

use Closure;

class CheckRole
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
        $admin = auth()->user()->role;
        //dd($admin);
        if($admin !== 'admin'){
            return redirect()->back();
        }
        return $next($request);
    }
}
