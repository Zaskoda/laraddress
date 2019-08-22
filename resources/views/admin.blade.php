@extends('layouts.basic')
@section('content')

    <h2>Admin Panel</h2>
    <hr>
    <p>Your address book:</p>
    @if($isAdmin)
    <div class="container">
        @foreach (App\Contact::all() as $contact)
        <div class="card mt-1 mb-1">
            @include('partials.contact_row', ['contact' => $contact])
        </div>
        @endforeach
    </div>
    @endif

@endsection('content')
