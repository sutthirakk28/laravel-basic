
@extends('layouts.tpm')

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
    .container-fluid{
        font-family: Maitree;

    }
    .chat {
        list-style: none;
        margin: 0;
        padding: 0;
    }

    .chat li .chat-body p {
        margin: 0;
        color: #777777;
    }

    .panel-body {
        overflow-y: scroll;
        height: 350px;
    }

    ::-webkit-scrollbar-track {
        -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
        background-color: #F5F5F5;
    }

    ::-webkit-scrollbar {
        width: 12px;
        background-color: #F5F5F5;
    }

    ::-webkit-scrollbar-thumb {
        -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);
        background-color: #555;
    }
    [class^="icon-"], [class*=" icon-"] {    
    background-image: url("../images/img/glyphicons-halflings.png");
}
.icon-white, .nav-pills>.active>a>[class^="icon-"], .nav-pills>.active>a>[class*=" icon-"], .nav-list>.active>a>[class^="icon-"], .nav-list>.active>a>[class*=" icon-"], .navbar-inverse .nav>.active>a>[class^="icon-"], .navbar-inverse .nav>.active>a>[class*=" icon-"], .dropdown-menu>li>a:hover>[class^="icon-"], .dropdown-menu>li>a:focus>[class^="icon-"], .dropdown-menu>li>a:hover>[class*=" icon-"], .dropdown-menu>li>a:focus>[class*=" icon-"], .dropdown-menu>.active>a>[class^="icon-"], .dropdown-menu>.active>a>[class*=" icon-"], .dropdown-submenu:hover>a>[class^="icon-"], .dropdown-submenu:focus>a>[class^="icon-"], .dropdown-submenu:hover>a>[class*=" icon-"], .dropdown-submenu:focus>a>[class*=" icon-"] {
    background-image: url("../images/img/glyphicons-halflings-white.png")
}
.fc-button-next .fc-button-content {
    background: url("../images/img/rarrow.png") no-repeat scroll 15px 13px transparent;
    width: 10px;
}
.fc-button-prev .fc-button-content {
    background: url("../images/img/larrow.png") no-repeat scroll 15px 13px transparent;
    width: 10px;
}
.image{
    width: 36px;
    float: left;
    padding-right: 7px;
}
.alert-block {
    padding-top: 5px;
    padding-bottom: 5px;
}
.indicator.online {
    background: #28B62C;
    display: inline-block;
    width: 1em;
    height: 1em;
    border-radius: 50%;
    -webkit-animation: pulse-animation 2s infinite linear;
}
@-webkit-keyframes pulse-animation {
	0% { -webkit-transform: scale(1); }
	25% { -webkit-transform: scale(1); }
    50% { -webkit-transform: scale(1.2) }
    75% { -webkit-transform: scale(1); }
    100% { -webkit-transform: scale(1); }
}
.indicator.offline {
    background: #FF4136;
    display: inline-block;
    width: 1em;
    height: 1em;
    
}
.chat-message input[type=text] {
	margin-bottom: 0 !important;
	width: 90%;
}
.panel-body {
    overflow-y: scroll;
    height: 400px;
}
p {
    display: block;
    margin-top: 13px;
    /* border-top: 1px solid #dadada; */
}
</style>
@endsection

@section('content-header')
<div id="content-header">
    <div id="breadcrumb"> 
        <a href="{{ url('/home') }}" title="กลับไปหน้าแรก" class="tip-bottom">
            <i class="icon-home"></i> Home
        </a>
        <a href="#">แจ้งเตือน LINE Notify</a>
    </div>
    <p></p>
    <div class="alert alert-success alert-block"> <a class="close" data-dismiss="alert" href="#">×</a>
        <img src="{{asset('images/admin/icon-linenotify.png')}}" class="image" alt="linenotify">
        <h4 class="alert-heading">LINE Notify</h4>
        ส่งข้อความ และแจ้งเตือนด้วย Line Notify
    </div>  
</div>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row-fluid">
        <div class="span12">
            <div class="widget-box widget-chat">
                <div class="widget-title">
                    <span class="icon">
                        <i class="fa fa-commenting" aria-hidden="true"></i>
                    </span>
                    <h5>มาคุยกันเถอะ</h5>
                </div>
                <div class="widget-content nopadding">
                    <div class="chat-users panel-right2">
                        <div class="panel-title">
                            <h5>Administrator Online
                            </h5>
                        </div>
                        <div class="panel-content nopadding">
                            <ul class="contact-list">
                                @foreach($user as $users)
                                    @if($users['id'] != Auth::id())
                                        <li id="user-Sunil" class="online"><a href=""><img alt="" src="{{asset('../images/org_man2.png')}}" /> <span>{{$users['name']}}</span>       <span class="indicator online"></span></a></li>
                                    @else
                                        <li id="user-vijay" class="online new"><a href=""><img alt="" src="{{asset('../images/org_man1.png')}}" /> <span>{{$users['name']}}</span>       <span class="indicator online"></span></a><span class="msg-count badge badge-info">☆</span></li>
                                    @endif                                
                                @endforeach
                                
                            </ul>
                        </div>
                    </div>
                    <div id="app">  
                        <div class="chat-content panel-left2">
                            <div class="chat-messages" id="chat-messages">
                                <div id="chat-messages-inner">                                
                                    <div class="panel-body">
                                        <chat-messages :messages="messages"></chat-messages>
                                    </div>
                                </div>
                            </div>
                            <div class="chat-message well">
                                <!-- <button class="btn btn-info"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
                                <span class="input-box">
                                    <input type="text" name="msg-box" id="msg-box" />
                                    <meta name="csrf-token" content="{{ csrf_token() }}">
                                </span> -->
                                <chat-form v-on:messagesent="addMessage" :user="{{ Auth::user() }}"></chat-form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>  
</div>
@endsection

@section('js')
<script>
    window.Laravel = {!! json_encode([
        'csrfToken' => csrf_token(),
        'pusherKey' => config('broadcasting.connections.pusher.key'),
        'pusherCluster' => config('broadcasting.connections.pusher.options.cluster')
    ]) !!};    

</script>
<script src="/js/app.js"></script>
@endsection