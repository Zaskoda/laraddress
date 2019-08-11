@extends('layouts.basic')
@section('content')
        <div class="flex-center position-ref full-height">
            Welcome Back, {{ (empty($contact->name) ? $contact->email : $contact->name) }}
            <div class="well">
            There would be a form here to add/remove contact info
            </div>
        </div>
@endsection('content')
