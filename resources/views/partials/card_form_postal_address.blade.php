<a href="#newPostalAddress" data-toggle="collapse"  class="pull-right pl-1 pr-1 text-success"><i class="fa fa-fw fa-plus"></i></a>
        <b class="text-muted">Postal Addresses:</b>
        <div class="@if(!old('showForm') == 'newPostalAddress') collapse @endif"  data-parent="#containerCard"  id="newPostalAddress">
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
                    <button type="submit" class="btn btn-success m-2 btn-sm">Add <i class="fa fa-fw fa-plus"></i></button>
                </div>
            </form>
        </div>

        @foreach($contact->postalAddresses as $address)
        <div class="mt-0">
            <a href="#editPostalAddress{{ $address->id }}" data-toggle="collapse"  class="pull-right pl-1 pr-1 text-info"><i class="fa fa-fw fa-pencil"></i></a>

            <div class="mb-1">
                    <div><i class="fa fa-fw fa-address-card text-muted"></i> {{ $address->label }}</div>
                    <div>{{ $address->line_1 }}</div>
                    <div>{{ $address->line_2 }}</div>
                    <div>{{ $address->city }}, {{ $address->state }} {{ $address->country }}, {{ $address->zip }}</div>
            </div>

            <div class="@if(!old('showForm') == 'editPostalAddress') collapse @endif"  data-parent="#containerCard"  id="editPostalAddress{{ $address->id }}">
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
                                <button type="submit" class="btn pull-right btn-info m-2 btn-sm">Update <i class="fa fa-fw fa-check"></i></button>
                            </div>
                        </form>

                        <form method="post" action="/postal-address/{{ $address->id }}" class="form-inline pull-left mt-0 mr-1">
                            @csrf
                            <input type="hidden" name="_method" value="delete" />
                            <button type="submit" class="btn btn-sm btn-danger m-2"><i class="fa fa-fw fa-remove"></i></button>
                        </form>


                    </div>
                </form>
            </div>
        </div>
        @endforeach
