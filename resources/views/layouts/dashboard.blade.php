<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Scripts -->

        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Styles -->

        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <title>eSanté</title>

       
    </head>
    <body>
       
        <!-- Dasboard Header -->
        @include("layouts/partials/dashboard/_header")
       
        <!-- End Left sidebar -->
        @include("layouts/partials/dashboard/_sidebar")

        <div class="br-mainpanel">
            @yield("content")
        </div>
        
    </body>
</html>