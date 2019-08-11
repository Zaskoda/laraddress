<?php

namespace App\Http\Middleware;

class ContactAuth
{
    public function handle($request, $next)
    {
        if (!$request->session()->has('id')) {
            return redirect('/');
        }
        return $next($request);
    }
}