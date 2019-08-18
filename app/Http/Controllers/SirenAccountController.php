<?php

namespace App\Http\Controllers;

use App\SirenAccount;
use App\Http\Requests\SirenAccountRequest;

class SirenAccountController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SirenAccountRequest $request)
    {
        $account = new SirenAccount($request->only([
            'account_name',
            'platform_id',
            'profile_url',
        ]));
        $account->contact_id = $this->currentContactID;
        if ($account->save()) {
            return back()->withSuccess('Siren account added.');
        }
        return back()->withError('Problem adding siren account.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SirenAccountRequest $request, $id)
    {
        if (SirenAccount::whereId($id)
            ->where('contact_id', $this->currentContactID)
            ->update($request->only([
                'account_name',
                'platform_id',
                'profile_url',
            ]))) {
            return back()->withSuccess('Siren account updated.');
        } else {
            return back()->withError('Error updating siren account.');
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
        if (SirenAccount::where('id', $id)
            ->where('contact_id', $this->currentContactID)
            ->delete()) {
            return back()->withSuccess('Siren account removed.');
        } else {
            return back()->withError('Problem removing your siren account.');
        }
    }
}
