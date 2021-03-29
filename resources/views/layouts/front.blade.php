<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Scripts -->

        <script defer src="{{ asset('js/app.js') }}"></script>
        
        <script src="//cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>

        @include('layouts/partials/_google_analytics')
        <!-- Styles -->

        <link defer href="{{ asset('css/app.css') }}" rel="stylesheet" >

        <title>CROM BAMAKO</title>

       
    </head>
    <body>
        <header>
            @include("layouts/partials/_header")
            @include("layouts/partials/_tawk")
            
        </header>
        <div class="content-wrapper">
            @include('layouts/partials/_flash-message')
            @yield("content")
        </div>
        <footer>
            @include("layouts/partials/_footer")
        </footer>

        <script type="text/javascript">
    CKEDITOR.replace('editor', {
        filebrowserUploadUrl: "{{route('upload', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form'
    });
    </script> 
    </body>
</html>
