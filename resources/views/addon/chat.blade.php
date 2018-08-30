@extends('layouts.tpm')

@section('css')
<style type="text/css">
[class^="icon-"], [class*=" icon-"] {    
    background-image: url("../../public/images/img/glyphicons-halflings.png");
}
.icon-white, .nav-pills>.active>a>[class^="icon-"], .nav-pills>.active>a>[class*=" icon-"], .nav-list>.active>a>[class^="icon-"], .nav-list>.active>a>[class*=" icon-"], .navbar-inverse .nav>.active>a>[class^="icon-"], .navbar-inverse .nav>.active>a>[class*=" icon-"], .dropdown-menu>li>a:hover>[class^="icon-"], .dropdown-menu>li>a:focus>[class^="icon-"], .dropdown-menu>li>a:hover>[class*=" icon-"], .dropdown-menu>li>a:focus>[class*=" icon-"], .dropdown-menu>.active>a>[class^="icon-"], .dropdown-menu>.active>a>[class*=" icon-"], .dropdown-submenu:hover>a>[class^="icon-"], .dropdown-submenu:focus>a>[class^="icon-"], .dropdown-submenu:hover>a>[class*=" icon-"], .dropdown-submenu:focus>a>[class*=" icon-"] {
    background-image: url("../../public/images/img/glyphicons-halflings-white.png")
}
.fc-button-next .fc-button-content {
    background: url("../../public/images/img/rarrow.png") no-repeat scroll 15px 13px transparent;
    width: 10px;
}
.fc-button-prev .fc-button-content {
    background: url("../../public/images/img/larrow.png") no-repeat scroll 15px 13px transparent;
    width: 10px;
}
</style>
@endsection

@section('content-header')
<div id="content-header">
    <div id="breadcrumb"> 
        <a href="{{ url('/home') }}" title="กลับไปหน้าแรก" class="tip-bottom">
            <i class="icon-home"></i> Home
        </a>
        <a href="#">ห้องแชท Chatroom</a>
    </div>
    <h1>Chatroom</h1>  
</div>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row-fluid">
        <div class="span12">
            <div class="widget-box widget-chat">
                <div class="widget-title">
                    <span class="icon">
                        <i class="icon-comment"></i>
                    </span>
                    <h5>มาคุยกันเถอะ</h5>
                </div>
                <div class="widget-content nopadding">
                    <div class="chat-users panel-right2">
                        <div class="panel-title">
                            <h5>Online Users</h5>
                        </div>
                        <div class="panel-content nopadding">
                            <ul class="contact-list">
                                <li id="user-Sunil" class="online"><a href=""><img alt="" src="../../public/images/img/demo/av1.jpg" /> <span>เกศสุดา</span></a></li>
                                <li id="user-Laukik"><a href=""><img alt="" src="../../public/images/img/demo/av2.jpg" /> <span>สุชิน</span></a></li>
                                <li id="user-vijay" class="online new"><a href=""><img alt="" src="../../public/images/img/demo/av3.jpg" /> <span>บรรลังฤทธิ์ะ</span></a><span class="msg-count badge badge-info">3</span></li>
                                <li id="user-Jignesh" class="online"><a href=""><img alt="" src="../../public/images/img/demo/av4.jpg" /> <span>สมชัย</span></a></li>
                                <li id="user-Malay" class="online"><a href=""><img alt="" src="../../public/images/img/demo/av5.jpg" /> <span>เกศสุดา</span></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="chat-content panel-left2">
                        <div class="chat-messages" id="chat-messages">
                            <div id="chat-messages-inner"></div>
                        </div>
                        <div class="chat-message well">
                            <button class="btn btn-success">Send</button>
                            <span class="input-box">
                                <input type="text" name="msg-box" id="msg-box" />
                            </span> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>  
</div>
@endsection

@section('js')
<script src="{{ asset('js/main/maruti.chat.js') }}"></script>
@endsection