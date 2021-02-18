<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        


        <script defer src="{{ asset('js/app.js') }}"></script>

        <!-- Styles -->

        <link defer href="{{ asset('css/app.css') }}" rel="stylesheet">
        

        <title>Tableau de bord - {{ config('global.application_name')}} </title>

       
    </head>
    <body>
                   

        <!-- Dasboard Header -->
        @include("layouts/partials/dashboard/_header")
       
        <!-- End Left sidebar -->
        @include("layouts/partials/dashboard/_sidebar")

        <div class="br-mainpanel">
            
            @include('layouts/partials/_flash-message')

            @yield("content")
        </div>
        
    </body>
</html>