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
                background-color: #000;
                color: #cbdce4;
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

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 10px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                        <a href="{{ url('/home') }}">Профиль</a>
                    @else
                        <a href="{{ url('/login') }}">Вход</a>
                        <a href="{{ url('/register') }}">Регистрация</a>
                    @endif
                </div>
            @endif

            <div class="content">
                <div class="title" style="margin-bottom: 0;">
                    {{ config("app.name") }}
                </div>
                <div class="m-b-md" style="margin-bottom: 30px;">
                    Мы делаем миры
                </div>

                <div class="links">
                    <a href="/chartas">Все харты</a>
                    <a href="/chartas/create">Создать новую</a>
                    <a href="/status">Статус системы</a>
                </div>
            </div>
        </div>
    </body>
</html>
