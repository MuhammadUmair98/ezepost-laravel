<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class CheckBlockedUser
{
    public function handle($request, Closure $next)
    {
        $user = Auth::user();

        if ($user && $user->controlstring[0] === '0') {
            return Redirect::to('/blocked');
        }

        return $next($request);
    }
}