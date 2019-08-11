<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ContactAuthService;
use App\Http\Requests\IdentifyRequest;

class HomeController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function identify(IdentifyRequest $request, ContactAuthService $contactService)
    {
        $contact = $contactService->createOrLoadFromEmail($request->get('email'));
        return view('identify', ['contact' => $contact]);
    }
}
