<?php
namespace App\Services;

use Illuminate\Support\Facades\Mail;
use App\Mail\Verify;
use App\Contact;
use App\EmailAccount;
use Illuminate\Http\Request;

class ContactAuthService
{
    const SESSION_CONTACT_ID = 'contactId';
    const SESSION_CONTACT_TOKEN_ID = 'token';

    public function __construct()
    {
    }

    public function isAuthorized()
    {
        return (\Session::has(self::SESSION_CONTACT_ID));
    }

    public function isAdmin()
    {
        if (\Session::has(self::SESSION_CONTACT_ID)) {
            $id = \Session::get(self::SESSION_CONTACT_ID);
            if ($contact = Contact::find($id)) {
                return $contact->isAdmin();
            }
        }
        return false;
    }

    public function authorizeContact($contact_id)
    {
        \Session::put([self::SESSION_CONTACT_ID => (int) $contact_id]);
        \Session::save();
    }

    public function clearAuthorizedContact()
    {
        \Session::forget(self::SESSION_CONTACT_ID);
    }

    public function getAuthorizedContact()
    {
        return Contact::find(session(self::SESSION_CONTACT_ID));
    }

    public function getAdminContact()
    {
        return $this->getFromEmail(config('app.admin_email'));
    }

    public function getFromEmail($emailAddress)
    {
        $emailAccount = EmailAccount::select('contact_id')->where('email_address', $emailAddress)->first();
        if ($emailAccount) {
            return Contact::where('id', $emailAccount->contact_id)->first();
        }
        return null;
    }

    public function createContactWithEmail($emailAddress)
    {
        $emailId = \DB::transaction(function () use ($emailAddress) {
            $contact = new Contact();
            $contact->save();
            $email = new EmailAccount([
                'email_address' => $emailAddress,
                'contact_id' => $contact->id,
            ]);
            $email->save();
            return (int) $email->id;
        });
        if ($emailId > 0) {
            return $this->sendEmailToken($emailId);
        }
        return false;
    }

    public function verifyEmailToken($token)
    {
        $account = EmailAccount::where('verification_token',$token)->first();
        if ($account) {
            $account->verified = true;
            $account->save();
            $this->authorizeContact($account->contact->id);
            return true;
        }
        return false;
    }

    public function sendEmailToken($emailId)
    {
        $account = EmailAccount::find($emailId);
        if ($account) {
            $account->refreshToken();
            $account->refresh();
            Mail::to($account->email_address)
                ->send(new Verify($account->verification_token));
            return true;
        }
        return false;
    }

}
