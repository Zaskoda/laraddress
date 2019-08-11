@extends('layouts.basic')
@section('content')
        <div class="text-center">
            @include('partials.alerts')
            <p><strong>Please identify yourself:</strong><br> Enter your email address in the form below so I can determine your identity.</p>


            <form action="/identify" method="post">
                @csrf
                <input name="email" placeholder="enter your email">
                <input type="submit" value="check in">
                {!! $errors->first('email', '<p class="text-warning">:message</p>') !!}
            </form>
        </div>
@endsection('content')
