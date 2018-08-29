<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Budget App</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body { 
                color: #ffffff;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
                background: #7e5bbf;
                background: -moz-linear-gradient(-45deg, #7e5bbf 0%, #56c4f5 100%);
                background: -webkit-linear-gradient(-45deg, #7e5bbf 0%,#56c4f5 100%);
                background: linear-gradient(135deg, #7e5bbf 0%,#56c4f5 100%);
                filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#7e5bbf', endColorstr='#56c4f5',GradientType=1 );
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a,.links > a:visited {
                color: #ffffff;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ url('/login') }}">Login</a>
                        <a href="{{ url('/register') }}">Register</a>
                    @endif
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                   Budget App <?php echo date('Y'); ?>
                </div>

                <div class="links">
                    <p align="center">By Steven Kirika</p>
                </div>
            </div>
        </div>
    </body>
</html>
