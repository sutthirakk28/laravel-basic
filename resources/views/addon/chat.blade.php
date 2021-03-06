@extends('layouts.tpm')

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style type="text/css">
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
                                        <li id="user-vijay" class="online new"><a href=""><img alt="" src="{{asset('../images/org_man1.png')}}" /> <span>{{$users['name']}}</span>       <span class="indicator online"></span></a><span class="msg-count badge badge-info">3</span></li>
                                    @endif                                
                                @endforeach
                                
                            </ul>
                        </div>
                    </div>
                    <div class="chat-content panel-left2">
                        <div class="chat-messages" id="chat-messages">
                            <div id="chat-messages-inner"></div>
                        </div>
                        <div class="chat-message well">
                            <button class="btn btn-info"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
                            <span class="input-box">
                                <input type="text" name="msg-box" id="msg-box" />
                                <meta name="csrf-token" content="{{ csrf_token() }}">
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
<script >

$(document).ready(function(){
	
	var msg_template = '<p><span class="msg-block"><strong></strong><span class="time"></span><span class="msg"></span></span></p>';
	
	$('.chat-message button').click(function(){
		var input = $(this).siblings('span').children('input[type=text]');		
		if(input.val() != ''){
			add_message('You','../images/img/demo/av1.jpg',input.val(),true);
            
		}		
	});
	
	$('.chat-message input').keypress(function(e){
		if(e.which == 13) {	
			if($(this).val() != ''){
				add_message('You','../images/img/demo/av1.jpg',$(this).val(),true);
                
			}		
		}
	});
    
   	var i = 0;
	function add_message(name,img,msg,clear) {
        i = i + 1;
        var  inner = $('#chat-messages-inner');
        var time = new Date();
        var hours = time.getHours();
        var minutes = time.getMinutes();
        if(hours < 10) hours = '0' + hours;
        if(minutes < 10) minutes = '0' + minutes;
        var id = 'msg-'+i;
        var idname = name.replace(' ','-').toLowerCase();

        /*start ajax */
        if(msg != ''){
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');            
            $.ajax({
                type :'GET',
                url : "{{ url('/line/index/') }}",
                data : {_token: CSRF_TOKEN,id:msg},
                dataType : 'json',
                success : function(result)
                {
                    var data = result.line;
                    var data2 = result.status;        
                    console.log(data);
                    
                    inner.append('<p id="'+id+'" class="user-'+idname+'">'
                        +'<span class="msg-block"><img src="'+img+'" alt="" /><strong>'+name+'</strong> <span class="time"> '+data+' '+hours+':'+minutes+' น.</span>'
					    +'<span class="msg">'+msg+'</span></span></p>');        
                    
                } 
            });
        }
        /* End ajax*/

		$('#'+id).hide().fadeIn(800);
		if(clear) {
			$('.chat-message input').val('').focus();
		}
		$('#chat-messages').animate({ scrollTop: inner.height() },1000);
	}
    function remove_user(userid,name) {
        i = i + 1;
        $('.contact-list li#user-'+userid).addClass('offline').delay(1000).slideUp(800,function(){
            $(this).remove();
        });
        var  inner = $('#chat-messages-inner');
        var id = 'msg-'+i;
        inner.append('<p class="offline" id="'+id+'"><span>User '+name+' ออกจากแชท</span></p>');
        $('#'+id).hide().fadeIn(800);
    }
});

</script>
@endsection