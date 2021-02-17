<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Scripts -->
        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/1.5.0/perfect-scrollbar.min.js" integrity="sha512-yUNtg0k40IvRQNR20bJ4oH6QeQ/mgs9Lsa6V+3qxTj58u2r+JiAYOhOW0o+ijuMmqCtCEg7LZRA+T4t84/ayVA==" crossorigin="anonymous"></script>-->


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