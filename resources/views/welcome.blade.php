@extends('layouts.basic')
@section('content')

    @if($isAuthorized)
        <h2>Welcome back, {{ $authorizedContact->getDisplayName() }}</h2>
        <hr>
        <div class="row justify-content-md-center">
            <div class="col-md-6 col-lg-4 card">
                @include('partials.contact_card', ['contact' => $authorizedContact])
            </div>
            <div class="col-md-6 col-lg-4 card">
                @include('partials.admin_card', ['contact' => $adminContact])
            </div>
        </div>
    @else

        @include('partials.login')

    @endif
@endsection('content')
