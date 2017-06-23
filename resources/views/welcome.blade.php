<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
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

            .links > li > a {
                color: #636b6f;
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

            <div class="content">
                <div class="title m-b-md">
                    Kubide Notes Api
                </div>

                <h4>How to install</h4>
                <ol class="links">
                    <li>php composer install</li>
                    <li>php -r "file_exists('.env') || copy('.env.example', '.env');"</li>
                    <li>Edit .env</li>
                    <li>php artisan key:generate</li>
                    <li>php artisan migrate</li>
                </ol>

                <h4>Then</h4>
                <ul class="links">
                    <li><a href="{{ route('notes.index')}}"> List all notes GET {{route('notes.index')}}</a></li>
                    <li><a href="{{ route('notes.index', ['favorite'=>true])}}"> List favorite notes GET {{ route('notes.index', ['favorite'=>true])}}</a></li>
                    <li><a href="{{ route('notes.index')}}"> Post a note POST {{route('notes.index')}}</a></li>
                    <li><a href="#"> Show a note GET {{route('notes.index')}}/{id}</a></li>
                    <li><a href="#"> Favorite a note POST {{route('notes.index')}}/{id}/favorite</a></li>
                    <li><a href="#"> Unavorite a note POST {{route('notes.index')}}/{id}/unfavorite</a></li>
                </ul>

                <h4>To run test (NoteControllerTest.php)</h4>
                <ul class="links">
                    <li>phpunit</li>
                    <li>(After, to restore database)php artisan migrate</li>
                </ul>

            </div>
        </div>
    </body>
</html>
