<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * damos acceso solo al usuario con rol de admin
 */

class EnsureIsAdmin
{
    /**
     * Handle an incoming request.
     * @param  Closure(Request): (Response)  $next
     */

    /**
     * verifica el rol antes de ejecutar la accion
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!$request->user()?->isAdmin()){
            abort(403);
        }
        return $next($request);
    }
}
