<?php

namespace App\Http\Middleware;

use App\Models\User;
use App\Services\StatusCode;
use Closure;
use Illuminate\Http\Request;

class ActivityMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

        if(user() && user()->role == User::ADMIN){

            return $next($request);
        }

        if(user() && user()->role == User::MODERATOR && moderatorRoutes()){

            return $next($request);
        }

        $statusCode = new StatusCode();

        return response()->json([
            "status"     => $statusCode::FALSE,
            "code"       => $statusCode::SUCCESS,
            "message"    => $statusCode::ROUTE_RESTRICTED_MESSAGE,
            "data"       => [],
            "optional"   => []
        ], $statusCode::SUCCESS);
    }
}
