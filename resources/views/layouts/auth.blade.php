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
        <div class="d-flex align-items-center justify-content-center bg-br-primary ht-100v ">
             
                @yield("content")
            
            
        </div>
        
</html>
