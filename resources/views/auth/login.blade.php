<!DOCTYPE html>
<html lang="en">
    
<head>
        <title>TPM Admin</title><meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <link rel="stylesheet" href="{{ asset('css/main/bootstrap.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('css/main/bootstrap-responsive.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('css/main/maruti-login.css') }}" />
        <style type="text/css">
            [class^="icon-"], [class*=" icon-"] {
                background-image: url("../images/img/glyphicons-halflings.png")
            }
        </style>
    </head>
    <body>
        <div id="loginbox">            
            <form id="loginform" class="form-vertical" method="POST" action="{{ route('login') }}">
            {{ csrf_field() }}
				<div class="control-group normal_text"> <h3><img src="{{URL::asset('/images/img/logo.png')}}" alt="Logo" /></h3></div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on"><i class="icon-user"></i></span>
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
                
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on"><i class="icon-lock"></i></span>
                            <input id="password" type="password" class="form-control" name="password" required>
                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me    
                    </div>
                </div>
                <div class="form-actions">
                    <span class="pull-left">
                        <a href="{{ route('password.request') }}" class="flip-link btn btn-inverse" id="to-recover">&laquo; Lost password?</a>
                    </span>
                    <span class="pull-right">
                        <input type="submit" class="btn btn-success" value="Login" />
                    </span>
                </div>
            </form>
        </div>
        <script src="{{ asset('js/main/jquery.min.js') }}"></script>
        <script src="{{ asset('js/main/maruti.login.js') }}"></script> 
    </body>

</html>
