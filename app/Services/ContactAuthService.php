<?php
namespace App\Services;

use Illuminate\Support\Facades\Mail;
use App\Mail\Verify;
use App\Contact;

class ContactAuthService
{

    const CONTACT_ID = 'contactId';
    const CONTACT_TOKEN = 'token';

    static function isAuthorized()
    {
        return (\Session::has(self::CONTACT_ID));
    }

    public function getAuthorizedContact()
    {
        return Contact::find($session(self::CONTACT_ID));
    }

    public function checkContactToken($token)
    {
        $contact = Contact::where(CONTACT_TOKEN, $token)->first();
        if (!empty($contact)) {
            session([self::CONTACT_ID => $contactId]);
            return true;
        }
        return false;
    }

    public function clearAuthorizedContact()
    {
        session()->forget(self::CONTACT_ID);
    }

    public function createOrLoadFromEmail($email)
    {
        $contact = Contact::where('email', $email)->first();
        if (!$contact) {
            $contact = $this->createFromEmail($email);
        }
        return $contact;
    }

    private function createFromEmail($email)
    {
        $contact = new Contact(['email' => $email]);
        $contact->save();
        return $contact;
    }

    public function sendToken($id, $method = 'email')
    {
        Mail::to($email)->send(new Verify());
        return true;
    }

}
