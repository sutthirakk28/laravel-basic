<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>TPM1980</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Taviraj:100,600" rel="stylesheet" type="text/css">
        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
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
                font-size: 25px;
                font-weight: 700;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
                font-family: 'Taviraj', sans-serif;
            }

            .m-b-md {
                margin-bottom: 15px;
                font-size: 70px;
                font-family: 'Taviraj', sans-serif;
            }
            a.link1:link {
                color: #636b6f;
            }
            a.link1:visited {
                color: #636b6f;
            }
            a.link1:hover {
                color: green;
                text-decoration: underline;
            }
            a.link1:active {
                color: blue;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
           <!-- @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ url('/login') }}">Login</a>
                        <a href="{{ url('/register') }}">Register</a>
                    @endif
                </div>
            @endif-->
            <div class="top-right links">
                <a href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                    Logout
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </div>
            <div class="content">
                <div class="title m-b-md">
                    ระบบลางานออนไลน์สำหรับพนักงาน
                </div>
                <div class="title m-b-md">
                    TPM(1980)CO., LTD.
                </div>

                <div class="links">
                    <a href="#" class="link1">เขียนใบลา</a>
                    <a href="#" class="link1">อนุมัติการลา</a>
                    <a href="#" class="link1">ประวัติการลา</a>
                    <a href="{{ url('/lib') }}" class="link1">จัดการข้อมูลพนักงาน</a>
                </div>
            </div>
        </div>
    </body>
</html>
