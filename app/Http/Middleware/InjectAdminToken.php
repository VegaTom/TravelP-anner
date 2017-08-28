<?php

namespace TravelPlanner\Http\Middleware;

use Closure;

/*
 * Middleware InjectAdminToken
 *
 * Allows authentication over every route as admin.
 * Only for apidoc generation.
 */
class InjectAdminToken
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
        # $request->headers->add(['Authorization' => 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiIyMWYzNGEwNS1hZGI0LTRiZTgtOWEzYi1mMjAxNzgzMGVmMjUiLCJpc3MiOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvYXV0aGVudGljYXRlIiwiaWF0IjoxNTAzMTIxOTE3LCJleHAiOjE1MDM2OTc5MTcsIm5iZiI6MTUwMzEyMTkxNywianRpIjoicFdGalBGMmZzc2tYbVluNSJ9.VJSaDliI73u2nqMKc8fpCl8d8cykMTDpqP2P2b47LXU']);
        return $next($request);
    }
}
