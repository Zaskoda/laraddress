<?php

namespace App\Http\Controllers;

use App\PostalAddress;
use App\Http\Requests\PostalAddressRequest;
use Illuminate\Http\Request;

class PostalAddressController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostalAddressRequest $request)
    {
        $address = new PostalAddress($request->only([
            'label',
            'line_1',
            'line_2',
            'city',
            'state',
            'country',
            'zip',
        ]));
        $address->contact_id = $this->currentContactID;
        $address->save();
        return back()->withSuccess('Postal address added.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostalAddressRequest $request, $id)
    {
        PostalAddress::whereId($id)
            ->where('contact_id', $this->currentContactID)
            ->update($request->only([
                'label',
                'line_1',
                'line_2',
                'city',
                'state',
                'country',
                'zip',
            ]));
        return back()->withSuccess('Postal address updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        PostalAddress::where('id', $id)
            ->where('contact_id', $this->currentContactID)
            ->delete();
        return back()->withSuccess('Postal address removed.');
    }
}
