@extends('layouts.tpm')

@section('css')
<link rel="stylesheet" href="{{ asset('css/main/select2.css') }}" />
<link rel="stylesheet" href="{{ asset('css/main/jquery.gritter.css') }}" />
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.css' />
<style type="text/css">
[class^="icon-"], [class*=" icon-"] {    
    background-image: url("../public/images/img/glyphicons-halflings.png");
}
.icon-white, .nav-pills>.active>a>[class^="icon-"], .nav-pills>.active>a>[class*=" icon-"], .nav-list>.active>a>[class^="icon-"], .nav-list>.active>a>[class*=" icon-"], .navbar-inverse .nav>.active>a>[class^="icon-"], .navbar-inverse .nav>.active>a>[class*=" icon-"], .dropdown-menu>li>a:hover>[class^="icon-"], .dropdown-menu>li>a:focus>[class^="icon-"], .dropdown-menu>li>a:hover>[class*=" icon-"], .dropdown-menu>li>a:focus>[class*=" icon-"], .dropdown-menu>.active>a>[class^="icon-"], .dropdown-menu>.active>a>[class*=" icon-"], .dropdown-submenu:hover>a>[class^="icon-"], .dropdown-submenu:focus>a>[class^="icon-"], .dropdown-submenu:hover>a>[class*=" icon-"], .dropdown-submenu:focus>a>[class*=" icon-"] {
    background-image: url("../public/images/img/glyphicons-halflings-white.png")
}
.fc-button-next .fc-button-content {
    background: url("../public/images/img/rarrow.png") no-repeat scroll 15px 13px transparent;
    width: 10px;
}
.fc-button-prev .fc-button-content {
    background: url("../public/images/img/larrow.png") no-repeat scroll 15px 13px transparent;
    width: 10px;
}
.fc-state-highlight {
    /* background: url("../../public/images/images/backgrounds/calActiveBg.html") repeat-x scroll 0 0 #eae5da; */
    background-color :#c9eaf3 ;
}
</style>
@endsection

@section('content-header')
<div id="content-header">
	<div id="breadcrumb">
		<a href="{{ url('/pos/') }}" title="กลับไปจัดการข้อมูลตำแหน่ง" class="tip-bottom">
			<i class="icon-book"></i> ข้อมูลตำแหน่ง</a>
		<a href="#">เพิ่มข้อมูลตำแหน่ง</a>
	</div>
</div> 
@endsection

@section('content')
@if(Session::has('masupdate'))
    <div id="gritter-notify">
    <div class="normal"></div>
  </div>

  @endif
  @if(Session::has('masdelete'))    
  <div id="gritter-notify">
    <div class="sticky"></div>
  </div>
  @endif
<div class="container-fluid">
    <div class="row-fluid">
        <div class="span12">            
            <div class="widget-box widget-calendar">                
                <div class="widget-title">
                    <span class="icon"><i class="icon-calendar"></i></span>
                    <h5>ปฎิทินบันทึกกิจกรรม</h5>                    
                    <div class="buttons">
                        <a id="add-event" data-toggle="modal" href="#myModal" class="btn btn-inverse btn-mini"><i class="icon-plus icon-white"></i> เพิ่มกิจกรรม</a>
                        <div class="modal hide" id="myModal">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">×</button>
                                <h2>เพิ่มกิจกรรม</h2>
                            </div>
                            <form id="myForm">
                            {{ csrf_field() }}
                            <div class="modal-body">
                                <span class="request">*</span><span>กิจกรรม :  </span><input type="text" id="name" name="name" required/><br />
                                <span>คำอธิบาย :  </span><textarea id="description" name="description"></textarea><br />
                                <span class="request">*</span><span>      วันที่ทำ :   </span><input id="task_date" type="date" name="task_date" class="date" required/>
                            </div>
                            <div class="modal-footer">
                                <a href="#" class="btn" data-dismiss="modal">ยกเลิก</a>
                                <button class="btn btn-primary" id="save">บันทึก</button>
                            </div>
                            </form>
                        </div>

                        <div class="modal hide in" id="myModal2">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" id="close">×</button>
                                <h2>แก้ไขกิจกรรม</h2>
                            </div>
                            <form id="myForm2">
                            {{ csrf_field() }}
                            <div class="modal-body">
                                <span class="request">*</span><span>กิจกรรม :  </span><input type="text" id="name2" name="name2" required/><br />
                                <span>คำอธิบาย :  </span><textarea id="description2" name="description2"></textarea><br />
                                <span class="request">*</span><span>      วันที่ทำ :   </span><input id="task_date2" type="date" name="task_date2" class="date2" required/>
                            </div>
                            <div class="modal-footer">
                                <a href="#" class="btn" data-dismiss="modal" id="close2">ยกเลิก</a>
                                <button class="btn btn-primary" id="save2">แก้ไข</button>
                            </div>
                            </form>
                        </div>
                        <div class="modal-backdrop1"></div>

                    </div>
                </div>
                <div id='calendar'></div>
            </div>
        </div>
    </div>				 
</div>
@endsection

@section('js')
<script src="{{ asset('js/main/select2.min.js') }}"></script> 
<script src="{{ asset('js/main/maruti.popover.js') }}"></script>
<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.js'></script>
<script>

    $(document).ready(function() {
        // page is now ready, initialize the calendar...
        $('#calendar').fullCalendar({
            // put your options and callbacks here
            events : [
                @foreach($tasks as $task)
                {
                    title : '{{ $task['name']  }}<input type="hidden" value="{{ $task['id'].'/'.$task['task_date'].'/'.$task['description'] }}" >',
                    start : '{{ $task['task_date'] }}',
                    // url : '{{ $task['id'].'/'.$task['task_date'].'/'.$task['description'] }}',
                    //description: '{{ $task['description'] }}',
                    
                },
                @endforeach
            ],
            eventRender: function( event, element, view ) {
                var title = element.find('.fc-title, .fc-list-item-title');          
                title.html(title.text());
            },
        });

        $('#save').click(function(e){
            e.preventDefault();
            var _token = $("input[name='_token']").val();
            
            var name = $("input[name='name']").val();
            var task_date = $("input[name='task_date']").val();
            var description = $("textarea[name='description']").val();
            $('#myModal').css({'display':'none'});
            $('.modal-backdrop.in').hide();
            
            $.ajax({
                type :'POST',
                url : "<?php echo url('/tasks/store');?>",
                data : {_token:_token,name:name,description:description,task_date:task_date},
                success : function(data)
                {
                    location.reload();
                // var data = data.tasks;
                // var event = {id:data.id , title: data.name, start: data.task_date,url :data.id};
                // $('#calendar').fullCalendar( 'renderEvent', event, true);
                // $('#myForm').closest('form').find("input[type=text], textarea,input[type=date]").val("");   
                }                
            });
        });

        $('.fc-title').click(function(e){
            e.preventDefault();
            //$('a.fc-day-grid-event.fc-h-event.fc-event.fc-start.fc-end').attr("disabled","disabled");
            $('#myModal2').css({'display':'block'});
            //$('#myModal2').setAttribute("aria-hidden", "false");
            $('.modal-backdrop1').css({'display':'block'});
            
        });
        $('#close,#close2').click(function(e){
            e.preventDefault();
            $('#myModal2').css({'display':'none'});
            $('.modal-backdrop1').css({'display':'none'});
        });
        $('.modal-backdrop1').click(function(e){
            e.preventDefault();
            $('#myModal2').css({'display':'none'});
            $('.modal-backdrop1').css({'display':'none'});
        });
        
    });
</script>
@endsection
