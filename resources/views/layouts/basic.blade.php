<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <link href="{{ asset('/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('/css/app.css') }}" rel="stylesheet" type="text/css" />

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    </head>
    <body>
        <h1 class="header">Koda's Address Book [alpha]</h1>
        <div class="container">
            @yield('content')
        </div>


        <script src="{{ asset('/js/app.js') }}" type="text/javascript"></script>

    </body>
</html>
