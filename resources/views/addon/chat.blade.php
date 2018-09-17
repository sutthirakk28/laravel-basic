@extends('layouts.tpm')

@section('css')
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
                                <li id="user-Sunil" class="online"><a href=""><img alt="" src="../images/img/demo/av1.jpg" /> <span>เกศสุดา</span></a></li>
                                <li id="user-Laukik"><a href=""><img alt="" src="../images/img/demo/av2.jpg" /> <span>สุชิน</span></a></li>
                                <li id="user-vijay" class="online new"><a href=""><img alt="" src="../images/img/demo/av3.jpg" /> <span>บรรลังฤทธิ์ะ</span></a><span class="msg-count badge badge-info">3</span></li>
                                <li id="user-Jignesh" class="online"><a href=""><img alt="" src="../images/img/demo/av4.jpg" /> <span>สมชัย</span></a></li>
                                <li id="user-Malay" class="online"><a href=""><img alt="" src="../images/img/demo/av5.jpg" /> <span>เกศสุดา</span></a></li>
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
	
	setTimeout(function(){
		add_message('นายสุชิน  บุญคำ', '../images/img/demo/av2.jpg','สวัสดีทุกคนที่คุณต้องการมิตรภาพกับฉัน?')
		},'1000');
	setTimeout(function(){
		add_message('นายบรรลังฤทธิ์  วงค์เหมาะ', '../images/img/demo/av3.jpg','ゆうぴ！ どうしてそりゃ！')
		},'4000');
	setTimeout(function(){
		add_message('นางสาวพิมพ์พิไล  งามแสง', '../images/img/demo/av2.jpg','ขอบคุณ !!! เห็นคุณเร็ว ๆ นี้')
		},'8000');
	setTimeout(function(){
		add_message('นางสาวเกศสุดา  อาสสุวรรณ์','../images/img/demo/av3.jpg','ok Bye than!!!.')
		},'12000');	
	setTimeout(function(){
		remove_user('นายสมชัย  ทองหล่อ','นายสมชัย  ทองหล่อ')
        },'16000');
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
		inner.append('<p id="'+id+'" class="user-'+idname+'">'
										+'<span class="msg-block"><img src="'+img+'" alt="" /><strong>'+name+'</strong> <span class="time">- '+hours+':'+minutes+'</span>'
										+'<span class="msg">'+msg+'</span></span></p>');
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