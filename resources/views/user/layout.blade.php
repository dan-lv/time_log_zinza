<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Plan your time</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        
        <link rel="stylesheet" type="text/css" href="{{ mix('css/style.css') }}"> 
    </head>
    <body>
        <div>
            @include('header')
            @yield('content')
        </div> 

        <script src="{{ mix('js/library.js') }}"></script>
        <script src="{{ mix('js/user_scripts.js') }}"></script>
        
        @yield('scripts')
    </body>
</html>
