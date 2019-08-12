<?php

namespace App\Http\Middleware;

use App\Services\ContactAuthService;

class ContactAuth
{
    public function handle($request, $next, ContactAuthService $service)
    {
        if ($service->isAuthorized()) {
            return redirect('/');
        }
        return $next($request);
    }
}