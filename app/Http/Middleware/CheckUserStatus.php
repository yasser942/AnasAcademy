<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Fortify\Http\Responses\LogoutResponse;
use Symfony\Component\HttpFoundation\Response;

class CheckUserStatus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */

    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && Auth::user()->status === 'passive') {
            Auth::guard(config('fortify.guard', 'web'))->logout();  // Use the correct guard
            return $this->redirectToLoginWithMessage('حسابك غير مفعل , يرجى التواصل مع الادارة');
        }

        return $next($request);
    }

    private function redirectToLoginWithMessage($message)
    {
        return redirect()->route('login')->with('error', $message);    }
    }

