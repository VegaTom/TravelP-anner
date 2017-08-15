<?php

namespace TravelPlanner\Http\Middleware;

use Closure;
use JWTAuth;
use TravelPlanner\Models\Route;

class CanUse
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
        if (JWTAuth::parseToken()->toUser()
            ->join('role_user', 'users.id', '=', 'role_user.user_id')
            ->join('role_route_permissions', 'role_user.role_id', '=', 'role_route_permissions.role_id')
            ->join('routes', 'role_route_permissions.route_id', '=', 'routes.id')
            ->where('routes.name', $request->route()->getName())
            ->exists()) {
            return $next($request);
        }

        return response()->json(['error' => 'not_authorized'], 403);
    }
}
