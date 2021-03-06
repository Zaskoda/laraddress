<?php

namespace App\Http\Controllers;

use App\Contact;
use App\EmailAccount;
use App\Http\Requests\ContactUpdateRequest;
use App\Http\Requests\IdentifyRequest;
use App\Services\ContactAuthService;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function identify(IdentifyRequest $request, ContactAuthService $contactService)
    {
        $contact = $contactService->getFromEmail($request->get('email_address'));

        if ($contact) {
            $contactService->sendEmailToken($contact->id);
            return redirect('/')->withInfo('Check your email for a verification link. (give it a few minutes)');
        }
        return redirect('/unidentified')->with(['email_address' => $request->get('email_address')]);
    }

    /**
     * Account creation step
     */
    public function unidentified(Request $request)
    {
        return view('unidentified', ['email' => $request->session()->get('email_address')]);
    }

    public function verify(ContactAuthService $contactService, $token)
    {
        if ($contactService->verifyEmailToken($token)) {
            return redirect('/')->withSuccess('You have been verified.');
        }
        return redirect('/')->withError('You verification failed. Please try again.');
    }

    public function create(IdentifyRequest $request, ContactAuthService $contactService)
    {
        if ($contactService->createContactWithEmail($request->get('email_address'))) {
            return redirect('/')->withInfo('Check your email for a verification link.');
        }
        return redirect('/')->withError('I was unable to create your new account.');
    }

    public function update(ContactUpdateRequest $request)
    {
        $contact = Contact::find($this->currentContactID)->update($request->only([
            'nickname',
            'formal_name',
            'birthday'
        ]));
        return redirect('/')->withSuccess('Your contact information updated.');
    }


    public function logout(ContactAuthService $contactService)
    {
        $contactService->clearAuthorizedContact();
        return redirect('/');
    }

    public function sneakLink($emailId)
    {
        $emailAccount = EmailAccount::find($emailId);
        $emailAccount->refreshToken();
        return view('email.verify')->with(['tokenlink' => url('/').'/verify/'.$emailAccount->verification_token]);
    }

}
