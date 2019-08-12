<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ $appName }}</title>

        <link href="{{ asset('/css/app.css') }}" rel="stylesheet" type="text/css" />
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    </head>
    <body>
        <h1 class="header">
            {{ $adminName }}'s Address Book [alpha]
        </h1>
        <div class="container">
            @include('partials.alerts')
            @if($isAuthorized)
                <a class="btn btn-info btn-sm float-right" href="/logout">Logout</a>
            @endif
            @yield('content')
        </div>


        <script src="{{ asset('/js/app.js') }}" type="text/javascript"></script>

    </body>
</html>
