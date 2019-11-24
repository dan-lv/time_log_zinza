<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Plan your time</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="{{ mix('css/style.css') }}"> 
    </head>
    <body>
        <div>
            @include('header')
            @yield('content')
        </div> 

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script>
        $(document).ready(function() {
            $("#notification").click(function(){
                $(".menu-container").toggleClass("open");
            });
        });
    </script>
    </body>
</html>