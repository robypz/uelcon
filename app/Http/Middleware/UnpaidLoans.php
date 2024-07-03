<?php

namespace App\Http\Middleware;

use App\Http\Controllers\UserService;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UnpaidLoans
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (UserService::checkIfUserHasUnpaidLoans()) {
            return redirect(route('loan.create'))->with('alert', 'No puedes solicitar prestamos en estos momentos');
        }

        return $next($request);
    }
}
