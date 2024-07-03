<?php

namespace App\Http\Middleware;

use App\Http\Controllers\UserService;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class FullProfile
{



    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!UserService::fullProfile()) {
            return redirect(route('client.completeProfile'));
        }

        return $next($request);
    }
}
