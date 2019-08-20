<a href="#newSirenAccount" data-toggle="collapse"  class="pull-right pl-1 pr-1 text-success"><i class="fa fa-fw fa-plus"></i></a>
<b class="text-muted">Websites and <a target="_blank" href="https://en.wikipedia.org/wiki/Who_Owns_the_Future%3F">Siren</a> Accounts:</b>
<div class="@if(!old('showForm') == 'newSirenAccount') collapse @endif"  data-parent="#containerCard"  id="newSirenAccount">
    <form class="align-bottom mt-0" method="post" action="/siren-account">
        @csrf
        <input type="hidden" name="showForm" value="newSirenAccount">
        <div class="form-group m-2">
            <select
                name="platform_id"
                class="form-control form-control-sm mb-1"
            >
                <option value="" selected disabled>Select Platform</option>
                @foreach ($sirenPlatforms as $platform)
                    <option value="{{ $platform->id }}">
                        <i class="fa fa-fw fa-{{ $platform->icon }} text-muted"></i>
                        {{ $platform->platform_name}}
                    </option>
                @endforeach
            </select>
            {!! $errors->first('platform_id', '<div class="text-warning mb-1">:message</div>') !!}
            <input
                name="account_name"
                type=""
                class="form-control form-control-sm mb-1"
                placeholder="link/account name"
                value="{{ old('account_name') }}"
            >
            {!! $errors->first('account_name', '<div class="text-warning mb-1">:message</div>') !!}
            <input
            name="profile_url"
                type=""
                class="form-control form-control-sm mb-1"
                placeholder="https://whole-url.to/whoeveryouare"
                value="{{ old('profile_url') }}"
            >
            {!! $errors->first('profile_url', '<div class="text-warning mb-1">:message</div>') !!}
        </div>
        <div class="text-right">
            <button type="submit" class="btn btn-success m-2 btn-sm">Add <i class="fa fa-fw fa-plus"></i></button>
        </div>
    </form>
</div>

@foreach($contact->sirenAccounts as $account)
<div class="mt-0">
    <a href="#editSirenAccount{{ $account->id }}" data-toggle="collapse"  class="pull-right pl-1 pr-1 text-info"><i class="fa fa-fw fa-pencil"></i></a>

    <div class="mb-1">
        <i class="fa fa-fw fa-{{ $account->platform->icon }} text-muted mr-1"></i>
        <b class="text-muted mr-2">{{ $account->platform->platform_name }}: </b>
        <a href="{{ $account->profile_url }}">{{ $account->account_name }}</a>
    </div>

    <div class="@if(!old('showForm') == 'editSirenAccount') collapse @endif"  data-parent="#containerCard"  id="editSirenAccount{{ $account->id }}">
        <form class="align-bottom mt-0" method="post" action="/siren-account/{{ $account->id }}">
            <input type="hidden" name="_method" value="put" />
            @csrf
            <div class="form-group m-4">

                <form class="align-bottom mt-0" method="post" action="/siren-account">
                    @csrf
                    <input type="hidden" name="showForm" value="editSirenAccount">
                    <div class="form-group m-2">
                        <select
                            name="platform_id"
                            class="form-control form-control-sm mb-1"
                        >
                            @foreach ($sirenPlatforms as $platform)
                                <option
                                    value="{{ $platform->id }}"
                                    @if ($platform->id == $account->platform_id)
                                    selected
                                    @endif
                                >
                                    <i class="fa fa-fw fa-{{ $platform->icon }} text-muted"></i>
                                    {{ $platform->platform_name }}
                                </option>
                            @endforeach
                        </select>
                        {!! $errors->first('platform_id', '<div class="text-warning mb-1">:message</div>') !!}
                        <input
                            name="account_name"
                            type=""
                            class="form-control form-control-sm mb-1"
                            placeholder="whoeveryouare"
                            value="{{ old('account_name', $account->account_name) }}"
                        >
                        {!! $errors->first('account_name', '<div class="text-warning mb-1">:message</div>') !!}
                        <input
                        name="profile_url"
                            type=""
                            class="form-control form-control-sm mb-1"
                            placeholder="https://whole-url.to/whoeveryouare"
                            value="{{ old('profile_url', $account->profile_url) }}"
                        >
                        {!! $errors->first('profile_url', '<div class="text-warning mb-1">:message</div>') !!}
                    </div>

                    <div class="">
                        <button type="submit" class="btn pull-right btn-info m-2 btn-sm">Update <i class="fa fa-fw fa-check"></i></button>
                    </div>
                </form>

                <form method="post" action="/siren-account/{{ $account->id }}" class="form-inline pull-left mt-0 mr-1">
                    @csrf
                    <input type="hidden" name="_method" value="delete" />
                    <button type="submit" class="btn btn-sm btn-danger m-2"><i class="fa fa-fw fa-remove"></i></button>
                </form>


            </div>
        </form>
    </div>
</div>
@endforeach
