<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Heating - JARVIS</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link href="{{ elixir('css/app.css') }}" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div class="flex-center position-ref full-height">

            <div class="content">
                <div class="title m-b-md">
                    <i class="fa fa-thermometer-full fa-2x" aria-hidden="true"></i> Heating
                </div>

                <div class="links">
                    <a href="{{ url('/') }}">< Back</a>
                    <a href="{{ url('/heating/boost-heating') }}">Boost heating</a>
                    <a href="{{ url('/heating/boost-hotwater') }}">Boost hot water</a>
                </div>
            </div>
        </div>
    </body>
</html>
