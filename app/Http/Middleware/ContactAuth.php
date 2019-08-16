<?php

namespace App\Http\Middleware;

use Closure;
use App\Services\ContactAuthService;

class ContactAuth
{
    public $service = null;

    public function __construct(ContactAuthService $service)
    {
        $this->service = $service;
    }

    public function handle($request,Closure $next)
    {
        if ($this->service->isAuthorized()) {
            return $next($request);
        }
        return redirect('/');
    }
}