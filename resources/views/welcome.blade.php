<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>JARVIS</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link href="{{ elixir('css/app.css') }}" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div class="flex-center position-ref full-height">

            <div class="content">
                <div class="title m-b-md">
                    <i class="fa fa-home fa-2x" aria-hidden="true"></i> J.A.R.V.I.S.
                </div>

                <div class="links">
                    <a href="{{ url('/lighting') }}"><i class="fa fa-lightbulb-o fa-2x" aria-hidden="true"></i> Lighting</a>
                    <a href="{{ url('/heating') }}"><i class="fa fa-thermometer-full fa-2x" aria-hidden="true"></i> Heating</a>
                    <a href="{{ url('/cooling') }}"><i class="fa fa-thermometer-empty fa-2x" aria-hidden="true"></i> Cooling</a>
                    <a href="{{ url('/security') }}"><i class="fa fa-shield fa-2x" aria-hidden="true"></i> Security</a>
                </div>
            </div>
        </div>
    </body>
</html>
