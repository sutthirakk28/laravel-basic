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
<div class="container-fluid">
    <div class="row-fluid">
        <div class="span12">            
            <div class="widget-box widget-calendar">                
                <div class="widget-title">
                    <span class="icon"><i class="icon-calendar"></i></span>
                    <h5>ปฎิทินบันทึกกิจกรรม</h5>                    
                    <div class="buttons">
                        <a id="add-event" data-toggle="modal" href="#modal-add-event" class="btn btn-inverse btn-mini"><i class="icon-plus icon-white"></i> เพิ่มกิจกรรม</a>
                        <div class="modal hide" id="modal-add-event">
                                <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">×</button>
                                <h2>เพิ่มกิจกรรม</h2>
                            </div>
                            <form action="" method="">
                            <div class="modal-body">                                
                                {{ csrf_field() }}
                                <span class="request">*</span><span>กิจกรรม :  </span><input type="text" id="name" name="name" required/><br />
                                <span>คำอธิบาย :  </span><textarea id="description" name="description"></textarea><br />
                                <span class="request">*</span><span>      วันที่ทำ :   </span><input id="task_date" type="date" name="task_date" class="date" required/>
                            </div>
                            <div class="modal-footer">
                                <a href="#" class="btn" data-dismiss="modal">ยกเลิก</a>
                                <input type="submit" id="save" value="Save" />
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div id='calendar'></div>
            </div>
        </div>
    </div>				 
</div>
@endsection

@section('js')
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
                    title : '{{ $task['name'] }}',
                    start : '{{ $task['task_date'] }}',
                    url : '{{ route('tasks.edit', $task['id']) }}'
                },
                @endforeach
            ]
        })

        $('#save').on('click',function(){
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            var name = $('input#name').val();
            var description = $('textarea#description').val();
            var task_date = $('input#task_date').val();
            
            $.ajax({
                type :'POST',
                url : "{{ url('/tasks/store') }}",
                data : {_token: CSRF_TOKEN,name:name,description:description,task_date:task_date},
                dataType : 'json',
                success : function(data)
                {
                    console.log(data);
                }
            })
        })

        
    });
</script>
@endsection
