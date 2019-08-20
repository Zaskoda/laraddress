<?php

namespace App\Http\Controllers;

use App\Http\Requests\PhoneNumberRequest;
use App\PhoneNumber;

class PhoneNumberController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PhoneNumberRequest $request)
    {
        $number = new PhoneNumber($request->only(['number']));
        $number->contact_id = $this->currentContactID;
        $number->save();
        return back()->withSuccess('Phone number added.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PhoneNumberRequest $request, $id)
    {
        PhoneNumber::whereId($id)
            ->where('contact_id', $this->currentContactID)
            ->update($request->only([
                'number'
            ]));
        return back()->withSuccess('Phone number updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        PhoneNumber::where('id', $id)
            ->where('contact_id', $this->currentContactID)
            ->delete();
        return back()->withSuccess('Phone number removed.');
    }
}
