<?php

namespace App\Http\Middleware;

use Closure;

class EmailVerified
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
       
        $user = Auth::user();
        if (!$user->email_verified) {
            return redirect(route('home'));
        }
        return $next($request);
    }
}
