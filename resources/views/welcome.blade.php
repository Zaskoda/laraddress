@extends('layouts.basic')
@section('content')

    @if($isAuthorized)
        @if($isAdmin)
            <a href="/administraton" class="btn btn-sm btn-warning pull-right">Admin</a>
        @endif
        <h2>Welcome back, {{ $authorizedContact->getDisplayName() }}</h2>

        <p>Your contact info:</p>
        <div>
            <div><b>Name</b>: {{ $authorizedContact->name }}</div>
            @foreach($authorizedContact->emailAccounts as $account)
            <div><i class="fa fa-envelope"></i> {{ $account->email_address }}</div>
            @endforeach
        </div>

        @if($isAdmin)
            <hr>
            <p>Your address book:</p>
            @foreach (App\Contact::all() as $contact)
            <div><a href="/">{{ $contact->getDisplayName() }}</a></div>
            @endforeach
        @endif

    @else

        <div class="text-center">
            <p><strong>Please identify yourself:</strong><br> Enter your email address in the form below so I can determine your identity.</p>
            <form action="/identify" method="post" class="form-inline  justify-content-center">
                @csrf
                <div class="form-group">
                    <input name="email_address" placeholder="enter your email" class="form-control">
                </div>
                <input type="submit" value="check in" class="btn btn-info">
            </form>
        </div>
        {!! $errors->first('email', '<p class="text-centere text-warning">:message</p>') !!}
    @endif
    <hr>
    <div style="margin-top: 5em; border: 1px solid #888; padding: 5em;">
        Debug:<br>
        isAuth: {{ $isAuthorized }}<br>
        isAdmin: {{ $isAdmin }}<br>
        Session: {{ Session::has('contactId') }}
        Contact: @if($isAuthorized) {{ json_encode($authorizedContact) }} @endif
    </div>
@endsection('content')
