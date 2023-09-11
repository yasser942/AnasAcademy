<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckPlanExpiration
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        // Check if the user is authenticated
        if (auth()->check()) {
            $user = auth()->user();

            // Check if the user has an active membership
            if ($user->isPlanExpired()) {
                // Membership has expired, you can redirect to a membership renewal page or perform other actions
                return redirect()->route('plan.index')->with('error', 'خطأ! لقد انتهت صلاحية الاشتراك الخاص بك. يرجى تجديد الاشتراك للوصول إلى لوحة التحكم');
            }
        }

        return $next($request);
    }
}
