<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Scripts -->

        <script defer src="{{ asset('js/app.js') }}"  data-turbolinks-track="true"></script>
        

        <!-- Styles -->

        <link href="{{ asset('css/app.css') }}" rel="stylesheet" data-turbolinks-track="true">

        <title>eSanté</title>

       
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
