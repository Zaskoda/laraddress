@extends('layouts.basic')
@section('content')

    @if($isAuthorized)
        @if($isAdmin)
            <a href="/administraton" class="btn btn-sm btn-warning pull-right">Admin</a>
        @endif
        <h2>Welcome back, {{ $authorizedContact->getDisplayName() }}</h2>
        <hr>

        @include('partials.contact_card', ['contact' => $authorizedContact])

        @if($isAdmin)
            <hr>
            <p>Your address book:</p>

            @foreach (App\Contact::all() as $contact)
                @include('partials.contact_row', ['contact' => $contact])
            @endforeach
        @endif

    @else

        @include('partials.login')

    @endif
@endsection('content')
