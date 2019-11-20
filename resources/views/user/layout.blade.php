<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Plan your time</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/mystyle.css') }}"> 
    </head>
    <body>
        <div class="overlay-dark">
            @include('user.header')
            <div class="image">
                <h2 class="text">Find Creativity In</h2>
                <h3 class="text">Gray World</h3>
                <div class="container btn-position">
                    <div class="wrap">
                        <a href="" class="item1"> Check-in </a>
                        <a href="" class="item2"> Absent </a>
                        <a href="" class="item3"> Check-out </a>
                    </div>
                </div>
            </div>
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
