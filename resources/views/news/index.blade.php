@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">News</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    Welcom to News!!!
                    <br>
                    @if (Auth::check())
                      <h2>{{ Auth::user()->name }}</h2>
                    @endif
                    <br>
                    @if (Auth::guest())
                        <a href="{{ route('register') }}">Register</a>
                    @else

                      <a href="{{ route('logout') }}"
                          onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();">
                          Logout
                      </a>
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                          {{ csrf_field() }}
                      </form>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
