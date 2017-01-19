<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Cooling - JARVIS</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link href="{{ elixir('css/app.css') }}" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div class="flex-center position-ref full-height">

            <div class="content">
                <div class="title m-b-md">
                    <i class="fa fa-thermometer-empty fa-2x" aria-hidden="true"></i> Cooling
                </div>

                <div class="links">
                    <a href="{{ url('/') }}">< Back</a>
                    <a href="{{ url('/cooling/fans/activate') }}">Activate fans</a>
                    <a href="{{ url('/cooling/fans/deactivate') }}">Deactivate fans</a>
                </div>
            </div>
        </div>
    </body>
</html>
