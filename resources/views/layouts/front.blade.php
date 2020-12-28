<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Scripts -->

        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Styles -->

        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <title>Medplatform</title>

       
    </head>
    <body>
        <header>
            @include("layouts/partials/_header")
        </header>
        <div class="content-wrapper">
            @yield("content")
        </div>
        <footer>
            @include("layouts/partials/_footer")
        </footer>
    </body>
</html>
