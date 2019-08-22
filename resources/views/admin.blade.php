@extends('layouts.basic')
@section('content')

    <h2>Admin Panel</h2>
    <hr>
    <p>Your address book:</p>
    @if($isAdmin)
    <div class="container">
        @foreach (App\Contact::all() as $contact)
            @include('partials.contact_row', ['contact' => $contact])
        @endforeach
    </div>
    @endif

@endsection('content')
