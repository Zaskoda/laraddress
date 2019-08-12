<?php

namespace App\Http\Middleware;

use App\Services\ContactAuthService;

class ContactAuth
{
    public function handle($request, $next)
    {
        if (!ContactAuthService::isAdmin()) {
            return redirect('/');
        }
        return $next($request);
    }
}