<?php

namespace App\Http\Middleware;

use Closure, Auth;

class HasNotVote
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
        $logged_user = Auth::user();
        if($logged_user->uservotes->count() > 0 && $logged_user->role_id != 1){
          Auth::logout();
          return redirect('member/login')->withErrors('You have already vote, You can\'t vote twice');
        }
        return $next($request);
    }
}
