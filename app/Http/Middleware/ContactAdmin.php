<?php

namespace App\Http\Middleware;

use App\Services\ContactAuthService;

class ContactAdmin
{
    public $service = null;

    public function __construct(ContactAuthService $service)
    {
        $this->service = $service;
    }

    public function handle($request, $next)
    {
        if ($this->service->isAdmin()) {
            return $next($request);
        }
        return redirect('/');
    }
}