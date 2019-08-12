@extends('layouts.basic')
@section('content')

    @if($isAuthorized)
        @if($isAdmin)
            Show Admin Panel Link
        @endif
        Show Koda's Address
        Show Own Address
        Allow edit of address
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
        <div>
            Debug:<br>
            isAuth: {{ $isAuthorized }}<br>
            isAdmin: {{ $isAdmin }}<br>
            Session: {{ Session::has('contactId') }}
            Contact: {{ json_encode($authorizedContact) }}
        </div>
@endsection('content')
