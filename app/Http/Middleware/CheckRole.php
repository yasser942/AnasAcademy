<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next, $role)
    {
        // Check if the user is authenticated and has the specified role
        if (Auth::check() && Auth::user()->hasRole($role)) {
            return $next($request);
        }

        // Redirect or abort based on your application's requirements
        return redirect()->back()->with('error', 'ليس لديك صلاحية الوصول لهذه الصفحة');
    }
}
