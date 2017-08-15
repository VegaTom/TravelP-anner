<?php

namespace TravelPlanner\Http\Middleware;

use Closure;

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
        #$request->headers->add(['Authorization' => 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzb3VyY2UiOiJ3ZWIiLCJzdXBwb3J0Ijp0cnVlLCJzdWIiOiIzYWYzMmVkMC0wMWI5LTRjMmQtOGY0Zi00YjdmMjllMDM1MzEiLCJpc3MiOiJodHRwOlwvXC8xMjcuMC4wLjE6ODAwMFwvYXV0aGVudGljYXRlIiwiaWF0IjoxNDk3NjI5MDE0LCJleHAiOjE0OTgyMDUwMTQsIm5iZiI6MTQ5NzYyOTAxNCwianRpIjoiVjZDUDE3SlRyajRwZnNGZyJ9.dY9isv2hWkmou54VbeCC2cI0ZNXF8keQO3gTx57PeQc']);
        return $next($request);
    }
}
