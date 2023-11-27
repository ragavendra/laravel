<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserHasRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {
        echo "Role is ". $role ."";
        /*
        if ($request->user()->hasRole($role)) {
            redirect(route("/role"));
        }

        redirect(route("/role1"));*/

        return $next($request);
    }

    public function terminate(Request $request, Response $response): Response
    {
        echo "Now running term for midd";

        // return $next($request);
    }
}
