<?php

namespace TravelPlanner\Http\Middleware;

use Closure;
use LanguageSwitcher;

/*
 * Middleware InjectAdminToken
 *
 * Allows authentication over every route as admin.
 * Only for apidoc generation.
 */
class AjaxLanguageSelector
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
        if ($request->hasHeader('language')) {
            LanguageSwitcher::setLanguage($request->header('language'));
        }
        return $next($request);
    }
}
