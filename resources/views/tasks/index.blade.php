@extends('layouts.tpm')

@section('css')
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
.btn-mini [class^="icon-"], .btn-mini [class*=" icon-"] {
    margin-top: 1px;
}
</style>
@endsection

@section('content-header')
<div id="content-header">
	<div id="breadcrumb">
		<a href="{{ url('/home') }}" title="กลับไปจัดการข้อมูลตำแหน่ง" class="tip-bottom">
			<i class="icon-book"></i> Home</a>
		<a href="#">ปฎิทินบันทึกกิจกรรม</a>
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
                        <a href="#" onClick="window.location.reload()" class="btn btn-mini btn-success"><i class="icon-refresh"></i> Refresh</a>
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
                                <input type="hidden" id="id" name="id" required/>
                                <span class="request">*</span><span>กิจกรรม :  </span><input type="text" id="name2" name="name2" required/><br />
                                <span>คำอธิบาย :  </span><textarea id="description2" name="description2"></textarea><br />
                                <span class="request">*</span><span>      วันที่ทำ :   </span><input id="task_date2" type="date" name="task_date2" class="date2" required/>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-danger" id="delete">ลบกิจกรรม</button>
                                <a href="#" class="btn" data-dismiss="modal" id="close2">ยกเลิก</a>
                                <button class="btn btn-primary" id="edit">แก้ไข</button>
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
<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.js'></script>
<script>

    $(document).ready(function() {
        $('#calendar').fullCalendar({
            events : [
                @foreach($tasks as $task)
                {
                    id : '{{ $task['id'] }}',
                    title : '{{ $task['name']  }}',
                    start : '{{ $task['task_date'] }}',
                    description: '{{ $task['description'] }}',                    
                },
                @endforeach
            ],
            // eventRender: function( event, element, view ) {
            //     var title = element.find('.fc-title, .fc-list-item-title');          
            //     title.html(title.text());
            // },
            viewRender: function (view, element) {
                $('.fc-content').click(function(e){
                    e.preventDefault();
                    $('#myModal2').css({'display':'block'});
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
            },
            eventClick: function(calEvent, jsEvent, view) {
                $("input[name='id']").val(calEvent.id);
                $("input[name='name2']").val(calEvent.title);
                $("input[name='task_date2']").val(calEvent.start.format('YYYY-MM-DD'));
                $("textarea[name='description2']").val(calEvent.description);
                $(this).css('border-color', 'red');
                
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
                    
                    alert(data.success); 
                    location.reload();
                // var data = data.id;
                // var event = {id:data.id , title: name, start: task_date};
                // $('#calendar').fullCalendar( 'renderEvent', event, true);
                // $('#myForm').closest('form').find("input[type=text], textarea,input[type=date]").val("");   
                }                
            });
        });
       
        $('#edit').click(function(e){
            e.preventDefault();
            var _token = $("input[name='_token']").val();
            var id = $("input[name='id']").val();
            var name2 = $("input[name='name2']").val();
            var task_date2 = $("input[name='task_date2']").val();
            var description2 = $("textarea[name='description2']").val();                          
           $.ajax({
                type :'POST',
                url : "{{ url('/tasks/edit_task') }}",
                data : {_token:_token,id:id,name:name2,task_date:task_date2,description:description2},
                success : function(data)
                {
                    alert(data.success); 
                    location.reload();  
                }                
            });
            $('#myModal2').css({'display':'none'});
            $('.modal-backdrop1').css({'display':'none'});
        });  

        $('#delete').click(function(e){
            e.preventDefault();
            var _token = $("input[name='_token']").val();
            var id = $("input[name='id']").val();
           $.ajax({
                type :'POST',
                url : "{{ url('/tasks/destroy') }}",
                data : {_token:_token,id:id},
                success : function(data)
                {
                    alert(data.success); 
                    location.reload();  
                }                
            });
            $('#myModal2').css({'display':'none'});
            $('.modal-backdrop1').css({'display':'none'});
        });         
        
    });
</script>
@endsection
