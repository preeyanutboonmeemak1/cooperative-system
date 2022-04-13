<?php

namespace App\Http\Middleware;

use Closure;

class UserAccessControl
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
        if ($request->user()->ref_type === "student") {
            // return redirect()->to('dashboard-test');
        } else if ($request->user()->ref_type === "teacher") {
        } else if ($request->user()->ref_type === "admin") {
        }

        return $next($request);
    }
}