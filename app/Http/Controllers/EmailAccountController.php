<?php

namespace App\Http\Controllers;

use App\EmailAccount;
use App\Http\Requests\EmailAccountRequest;

class EmailAccountController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmailAccountRequest $request)
    {
        $address = new EmailAccount($request->only([
            'email_address'
        ]));
        $address->contact_id = $this->currentContactID;
        if ($address->save()) {
            return back()->withSuccess('Email address added.');
        } {
            return back()->withError('Problem adding your email address.');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EmailAccountRequest $request, $id)
    {
        if (EmailAccount::whereId($id)
            ->where('contact_id', $this->currentContactID)
            ->update($request->only([
                'email_address'
            ]))
        ) {
            return back()->withSuccess('Email address updated.');
        } else {
            return back()->withError('Problem updating your email address.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (EmailAccount::where('id', $id)
            ->where('contact_id', $this->currentContactID)
            ->delete()
        ) {
            return back()->withSuccess('Email address removed.');
        } else {
            return back()->withError('Problem removing email address.');
        }
    }
}
