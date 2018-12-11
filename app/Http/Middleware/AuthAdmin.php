<?php

namespace App\Http\Middleware;

use Closure, Auth;

class AuthAdmin
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
        if(Auth::user()){
          if(Auth::user()->role_id != 1)
            return redirect('admin/login');
        }else{
          return redirect('admin/login');
        }
        return $next($request);
    }
}
