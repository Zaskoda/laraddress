<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\View;
use App\Services\ContactAuthService;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct(ContactAuthService $contactAuthService)
    {
        View::share('appName', config('app.name'));
        View::share('adminName', config('app.admin_name'));
        View::share('adminEmail', config('app.admin_email'));
        View::share('isAuthorized', $contactAuthService->isAuthorized());
        View::share('isAdmin', $contactAuthService->isAdmin());
        if ($contactAuthService->isAuthorized()) {
            View::share('authorizedContact', $contactAuthService->getAuthorizedContact());
        }
    }
}
