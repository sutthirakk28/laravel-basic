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
                background-image: url("../../public/images/img/glyphicons-halflings.png")
            }
        </style>
    </head>
    <body>
        <div id="loginbox">
                          
            <form id="loginform" class="form-vertical" method="POST" action="{{ route('password.email') }}">
                
                <p class="normal_text">Enter your e-mail address below and we will send you instructions how to recover a password.</p>
                {{ csrf_field() }}
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <div class="controls">
                    <div class="main_input_box">
                        <span class="add-on"><i class="icon-envelope"></i></span> <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                    </div>
                    @if (session('status'))
                        <div class="alert alert-success">
                        {{ session('status') }}
                        </div>
                    @endif
                    @if ($errors->has('email'))
                        <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
                </div>       
                <div class="form-actions">
                <span class="pull-left"><a href="{{ route('login') }}" class="flip-link btn btn-inverse" id="to-login">&laquo; Back to login</a></span>
                <span class="pull-right"><input type="submit" class="btn btn-info" value="Send Password Reset" /></span>
                </div>
            </form>
        </div>
        <script src="{{ asset('js/main/jquery.min.js') }}"></script>
        <script src="{{ asset('js/main/maruti.login.js') }}"></script> 
    </body>

</html>
