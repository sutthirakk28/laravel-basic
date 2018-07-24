<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
	<meta charset="utf-8">
	<title>@yield('title')</title>
	<!-- Styles -->

    <!-- datepicker 
    <link rel="stylesheet" type="text/css" href="{{ asset('https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('https://cdn.rawgit.com/mdehoog/Semantic-UI/6e6d051d47b598ebab05857545f242caf2b4b48c/dist/semantic.min.css')}}">
    -->    

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="{{ asset('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ asset('https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('https://cdn.datatables.net/fixedheader/3.1.5/css/fixedHeader.bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css')}}">
	<link href="https://fonts.googleapis.com/css?family=Taviraj:100,600" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Kanit:100,600" rel="stylesheet" type="text/css">
    <link href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" rel="stylesheet" type="text/css">

	{{ Html::style(('css/app.css'))}}
    {{ Html::style(('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'))}}
    {{ Html::style(('https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css'))}}
	{{ Html::style(('https://cdn.datatables.net/fixedheader/3.1.5/css/fixedHeader.bootstrap.min.css'))}}
	{{ Html::style(('https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css'))}}
	
	@if(isset($style))
		@foreach($style as $css)
			{{ Html::style(($css)) }}
		@endforeach
	@endif
</head>
<body>	
	<div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/home') }}">
                        <!--{{ config('app.name', 'Laravel') }} -->บริษัท ทีพีเอ็ม(1980) จำกัด
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    <span class="glyphicon glyphicon-user"></span>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ url('/home') }}">
                                            หน้าแรก
                                        </a>
                                        <a href="{{ url('/leave/create') }}">
                                            เขียนใบลา
                                        </a>
                                        <a href="{{ url('#') }}">
                                            อนุมัติการลา
                                        </a>
                                        <a href="{{ url('/leave/') }}">
                                            ประวัติการลา
                                        </a>
                                        <a href="{{ url('/lib') }}">
                                            จัดการข้อมูลพนักงาน
                                        </a>
                                        <a href="{{ url('/dep') }}">
                                            จัดการข้อมูลฝ่าย
                                        </a>
                                        <a href="{{ url('/pos') }}">
                                            จัดการข้อมูลตำแหน่ง
                                        </a>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                     <span class="glyphicon glyphicon-log-in"></span>
                                            Logout
                                        </a>                                      

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container">
			@yield('content')
        </div>
        	
    </div>

    <!-- Scripts -->

    <!-- datepicker 
    <script type="text/javascript" src="{{ asset('https://cdn.rawgit.com/mdehoog/Semantic-UI/6e6d051d47b598ebab05857545f242caf2b4b48c/dist/semantic.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('https://code.jquery.com/jquery-2.1.4.js')}}"></script>
    -->

	<script type="text/javascript" src="{{ asset('https://code.jquery.com/jquery-3.3.1.js')}}"></script>
	<script type="text/javascript" src="{{ asset('https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('https://cdn.datatables.net/fixedheader/3.1.5/js/dataTables.fixedHeader.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js')}}"></script>
	<script src="{{ asset('js/app.js') }}"></script>
	
	{{Html::script('https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js')}}
	{{Html::script('https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js')}}
    {{Html::script('https://cdn.datatables.net/fixedheader/3.1.5/js/dataTables.fixedHeader.min.js')}}
    {{Html::script('https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js')}}
    {{Html::script('https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js')}}
    
	@if(isset($script))
		@foreach($script as $js)
			{{ Html::script(($js)) }}
		@endforeach
	@endif
</body>
</html>
