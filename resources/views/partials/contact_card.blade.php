
<div class="card col-md-6 col-lg-4" id="containerCard">
    <div class="mt-1 mb-2">

        <div>
            <a href="#editFormalName" data-toggle="collapse"  data-parent="#containerCard" class="pull-right pl-1 pr-1 text-info"><i class="fa fa-pencil"></i></a>
            <label><b class="text-muted">Formal Name</b>: {{ $contact->formal_name ?: 'empty' }} </label>
            <div class="collapse" id="editFormalName">
                <form class="form-inline align-bottom mb-2" method="post" action="/contact">
                    <input type="hidden" name="_method" value="put" />
                    @csrf
                    <div class="form-group m-2">
                        <input name="formal_name" class="form-control form-control-sm" placeholder="Empty" value="{{ $contact->formal_name }}">
                    </div>
                    <button type="submit" class="btn btn-info m-2 btn-sm"><i class="fa fa-check"></i></button>
                </form>
            </div>
        </div>

        <div>
            <a href="#editNickame" data-toggle="collapse"  data-parent="#containerCard" class="pull-right pl-1 pr-1 text-info"><i class="fa fa-pencil"></i></a>
            <b class="text-muted">Nickname</b>: {{ $contact->nickname ?: 'empty' }}
            <div class="collapse" id="editNickame">
                <form class="form-inline align-bottom mb-2" method="post" action="/contact">
                    <input type="hidden" name="_method" value="put" />
                    @csrf
                    <div class="form-group m-2">
                        <input name="nickname" class="form-control form-control-sm" placeholder="Empty" value="{{ $contact->nickname }}">
                    </div>
                    <button type="submit" class="btn btn-info m-2 btn-sm"><i class="fa fa-check"></i></button>
                </form>
            </div>

        </div>
    </div>
    <div  class="mt-1 mb-2">
        <div>
            <div>
                <a href="#editBirthday" data-toggle="collapse"  data-parent="#containerCard" class="pull-right pl-1 pr-1 text-info"><i class="fa fa-pencil"></i></a>
                <b class="text-muted">Birthday:</b><br> <i class="fa fa-birthday-cake text-muted"></i> {{ date('D M jS, Y', strtotime($contact->birthday)) }}
            </div>
            <div class="collapse" id="editBirthday">
                <form class="form-inline align-bottom mb-2" method="post" action="/contact">
                    <input type="hidden" name="_method" value="put" />
                    @csrf
                    <div class="form-group m-2">
                        <input name="birthday" type="date" class="form-control form-control-sm" placeholder="Empty" value="{{ date('Y-m-d', strtotime($contact->birthday)) }}">
                    </div>
                    <button type="submit" class="btn btn-info m-2 btn-sm"><i class="fa fa-check"></i></button>
                </form>
            </div>
        </div>
    </div>


    <div class="mt-1 mb-2">
        <a href="#newPhoneNumber" data-toggle="collapse"  data-parent="#containerCard" class="pull-right pl-1 pr-1 text-success"><i class="fa fa-plus"></i></a>
        <b class="text-muted">Phone Numbers:</b>
        <div class="collapse mt-0" id="newPhoneNumber">
            <form class="form-inline align-bottom mt-0" method="post" action="/phone-number">
                @csrf
                <div class="form-group m-2">
                    <input name="number" type="tel" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" class="form-control form-control-sm" placeholder="XXX-XXX-XXXX">
                </div>
                <button type="submit" class="btn btn-info m-2 btn-sm"><i class="fa fa-check"></i></button>
            </form>
        </div>

        @foreach($contact->phoneNumbers as $phone)
        <div class="mt-0">
            <a href="#editPhoneNumber{{ $phone->id }}" data-toggle="collapse"  data-parent="#containerCard" class="pull-right pl-1 pr-1 text-info"><i class="fa fa-pencil"></i></a>
            <i class="fa fa-phone text-muted"></i> {{ $phone->number }}
            <div class="collapse mt-0" id="editPhoneNumber{{ $phone->id }}">
                <form
                    method="post"
                    action="/phone-number/{{ $phone->id }}"
                    class="form-inline pull-left mt-0 mr-1"
                    onsubmit="return confirm('Are you sure you want to delete this phone number?')"
                >
                    @csrf
                    <input type="hidden" name="_method" value="delete" />
                    <button
                        type="submit"
                        class="btn btn-sm btn-danger m-2"
                        ><i class="fa fa-remove"></i></button>
                </form>

                <form class="form-inline align-bottom mt-0" method="post" action="/phone-number/{{ $phone->id }}">
                    <input type="hidden" name="_method" value="put" />
                    @csrf
                    <div class="form-group m-2">
                        <input name="number" type="tel" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" class="form-control form-control-sm" value="{{ $phone->number }}">
                    </div>
                    <button type="submit" class="btn btn-info m-2 btn-sm"><i class="fa fa-check"></i></button>
                </form>
            </div>
        </div>
        @endforeach
    </div>

    <div class="mt-1 mb-2">

        <a href="#newPostalAddress" data-toggle="collapse"  data-parent="#containerCard" class="pull-right pl-1 pr-1 text-success"><i class="fa fa-plus"></i></a>
        <b class="text-muted">Postal Addresses:</b>
        <div class="@if(!old('showForm') == 'newPostalAddress') collapse @endif mt-0" id="newPostalAddress">
            <form class="align-bottom mt-0" method="post" action="/postal-address">
                @csrf
                <input type="hidden" name="showForm" value="newPostalAddress">
                <div class="form-group m-2">
                    <input
                        name="label"
                        type=""
                        class="form-control form-control-sm mb-1"
                        placeholder="Label (i.e. 'Home' or 'Work')"
                        value="{{ old('label') }}"
                    >
                    {!! $errors->first('label', '<div class="text-warning mb-1">:message</div>') !!}
                    <input
                        name="line_1"
                        type=""
                        class="form-control form-control-sm mb-1"
                        placeholder="Addres Line 1"
                        value="{{ old('line_1') }}"
                    >
                    {!! $errors->first('line_1', '<div class="text-warning mb-1">:message</div>') !!}
                    <input
                        name="line_2"
                        type=""
                        class="form-control form-control-sm mb-1"
                        placeholder="Addres Line 2"
                        value="{{ old('line_2') }}"
                    >
                    {!! $errors->first('line_2', '<div class="text-warning mb-1">:message</div>') !!}
                    <input
                        name="city"
                        type=""
                        class="form-control form-control-sm mb-1"
                        placeholder="City"
                        value="{{ old('city') }}"
                    >
                    {!! $errors->first('city', '<div class="text-warning mb-1">:message</div>') !!}
                    <input
                        name="state"
                        type=""
                        class="form-control form-control-sm mb-1"
                        placeholder="State"
                        value="{{ old('state') }}"
                    >
                    {!! $errors->first('state', '<div class="text-warning mb-1">:message</div>') !!}
                    <input
                        name="country"
                        type=""
                        class="form-control form-control-sm mb-1"
                        placeholder="Country"
                        value="{{ old('country') }}"
                    >
                    {!! $errors->first('country', '<div class="text-warning mb-1">:message</div>') !!}
                    <input
                        name="zip"
                        type=""
                        class="form-control form-control-sm mb-1"
                        placeholder="Zip"
                        value="{{ old('zip') }}"
                    >
                    {!! $errors->first('zip', '<div class="text-warning mb-1">:message</div>') !!}
                </div>
                <div class="text-right">
                    <button type="submit" class="btn btn-info m-2 btn-sm">Add <i class="fa fa-check"></i></button>
                </div>
            </form>
        </div>

        @foreach($contact->postalAddresses as $address)
        <div class="mt-0">
            <a href="#editPostalAddress{{ $address->id }}" data-toggle="collapse"  data-parent="#containerCard" class="pull-right pl-1 pr-1 text-info"><i class="fa fa-pencil"></i></a>

            <div class="mb-1">
                    <div><i class="fa fa-address-card text-muted"></i> {{ $address->label }}</div>
                    <div>{{ $address->line_1 }}</div>
                    <div>{{ $address->line_2 }}</div>
                    <div>{{ $address->city }}, {{ $address->state }} {{ $address->country }}, {{ $address->zip }}</div>
            </div>

            <div class="@if(!old('showForm') == 'editPostalAddress') collapse @endif mt-0" id="editPostalAddress{{ $address->id }}">
                <form class="align-bottom mt-0" method="post" action="/postal-address/{{ $address->id }}">
                    <input type="hidden" name="_method" value="put" />
                    @csrf
                    <div class="form-group m-4">

                        <form class="align-bottom mt-0" method="post" action="/postal-address">
                            @csrf
                            <input type="hidden" name="showForm" value="editPostalAddress">
                            <div class="form-group m-2">
                                <input
                                    name="label"
                                    type=""
                                    class="form-control form-control-sm mb-1"
                                    placeholder="Label (i.e. 'Home' or 'Work')"
                                    value="{{ old('label', $address->label) }}"
                                >
                                {!! $errors->first('label', '<div class="text-warning mb-1">:message</div>') !!}
                                <input
                                    name="line_1"
                                    type=""
                                    class="form-control form-control-sm mb-1"
                                    placeholder="Addres Line 1"
                                    value="{{ old('line_1', $address->line_1) }}"
                                >
                                {!! $errors->first('line_1', '<div class="text-warning mb-1">:message</div>') !!}
                                <input
                                    name="line_2"
                                    type=""
                                    class="form-control form-control-sm mb-1"
                                    placeholder="Addres Line 2"
                                    value="{{ old('line_2', $address->line_2) }}"
                                >
                                {!! $errors->first('line_2', '<div class="text-warning mb-1">:message</div>') !!}
                                <input
                                    name="city"
                                    type=""
                                    class="form-control form-control-sm mb-1"
                                    placeholder="City"
                                    value="{{ old('city', $address->city) }}"
                                >
                                {!! $errors->first('city', '<div class="text-warning mb-1">:message</div>') !!}
                                <input
                                    name="state"
                                    type=""
                                    class="form-control form-control-sm mb-1"
                                    placeholder="State"
                                    value="{{ old('state', $address->state) }}"
                                >
                                {!! $errors->first('state', '<div class="text-warning mb-1">:message</div>') !!}
                                <input
                                    name="country"
                                    type=""
                                    class="form-control form-control-sm mb-1"
                                    placeholder="Country"
                                    value="{{ old('country', $address->country) }}"
                                >
                                {!! $errors->first('country', '<div class="text-warning mb-1">:message</div>') !!}
                                <input
                                    name="zip"
                                    type=""
                                    class="form-control form-control-sm mb-1"
                                    placeholder="Zip"
                                    value="{{ old('zip', $address->zip) }}"
                                >
                                {!! $errors->first('zip', '<div class="text-warning mb-1">:message</div>') !!}
                            </div>
                            <div class="">
                                <button type="submit" class="btn pull-right btn-info m-2 btn-sm">Update <i class="fa fa-check"></i></button>
                            </div>
                        </form>

                        <form method="post" action="/postal-address/{{ $address->id }}" class="form-inline pull-left mt-0 mr-1">
                            @csrf
                            <input type="hidden" name="_method" value="delete" />
                            <button type="submit" class="btn btn-sm btn-danger m-2"><i class="fa fa-remove"></i></button>
                        </form>


                    </div>
                </form>
            </div>
        </div>
        @endforeach

    </div>

    <div class="mt-1 mb-2">
        <a href="#newEmailAccount" data-toggle="collapse"  data-parent="#containerCard" class="pull-right pl-1 pr-1 text-success"><i class="fa fa-plus"></i></a>
        <b class="text-muted">Email Accounts</b>:<br>
        <div class="@if(!old('showForm') == 'newEmailAccount') collapse @endif mt-0" id="newEmailAccount">
            <form class="align-bottom mt-0" method="post" action="/email-account">
                @csrf
                <input type="hidden" name="showForm" value="newEmailAccount">
                <div class="form-group m-2">
                    <input
                        name="email_address"
                        type="email"
                        class="form-control form-control-sm mb-1"
                        placeholder="you@some.domain"
                        value="{{ old('email_address') }}"
                    >
                    {!! $errors->first('email_address', '<div class="text-warning mb-1">:message</div>') !!}
                </div>
                <div class="text-right">
                    <button type="submit" class="btn btn-info m-2 btn-sm">Add <i class="fa fa-check"></i></button>
                </div>
            </form>
        </div>
        @foreach($contact->emailAccounts as $account)
        <div class="mt-0">
            <a href="#editEmailAccount{{ $account->id }}" data-toggle="collapse"  data-parent="#containerCard" class="pull-right pl-1 pr-1 text-info"><i class="fa fa-pencil"></i></a>
            <i class="fa fa-at text-muted"></i> {{ $account->email_address }}

            <div class="@if(!old('showForm') == 'editEmailAccount') collapse @endif mt-0" id="editEmailAccount{{ $account->id }}">

                <form
                    method="post"
                    action="/email-account/{{ $account->id }}"
                    class="form-inline pull-left mt-0 mr-1"
                    onsubmit="return confirm('Are you sure you want to delete this email address?')"
                >
                    @csrf
                    <input type="hidden" name="_method" value="delete" />
                    <button type="submit" class="btn btn-sm btn-danger m-2"><i class="fa fa-remove"></i></button>
                </form>

                <form class="form-inline align-bottom mt-0"method="post" action="/email-account/{{ $account->id }}">
                    <input type="hidden" name="_method" value="put" />
                    @csrf
                    <div class="form-group m-2">
                        <input
                            name="email_address"
                            type="email"
                            class="form-control form-control-sm mb-1"
                            placeholder="you@some.domain"
                            value="{{ old('email_address', $account->email_address) }}"
                        >
                        {!! $errors->first('email_address', '<div class="text-warning mb-1">:message</div>') !!}
                        </div>
                    <button type="submit" class="btn btn-info m-2 btn-sm"><i class="fa fa-check"></i></button>
                </form>
            </div>
        </div>
        @endforeach


    </div>

</div>
