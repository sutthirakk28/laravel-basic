@extends('layouts.tpm')

@section('css')
<link rel="stylesheet" href="{{ asset('css/main/fullcalendar.css') }}" />

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
.fc-state-highlight {
    /* background: url("../../public/images/images/backgrounds/calActiveBg.html") repeat-x scroll 0 0 #eae5da; */
    background-color :#c9eaf3 ;
}
p.z1{
    display: block;
    float: left;
    line-height: 16px;
    padding: 0 2px 1px 5px;
}
</style>
@endsection

@section('content-header')
<div id="content-header">
    <div id="breadcrumb"> 
        <a href="{{ url('/home') }}" title="กลับไปหน้าแรก" class="tip-bottom">
            <i class="icon-home"></i> Home
        </a>
        <a href="#">Calendar</a>
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
                                <h3>เพิ่มกิจกรรม</h3>
                            </div>
                            <div class="modal-body">
                                <p>กดยืนยันกิจกรรม :</p>
                                <p><input id="event-name" type="text" /></p>
                            </div>
                            <div class="modal-footer">
                                <a href="#" class="btn" data-dismiss="modal">ยกเลิก</a>
                                <a href="#" id="add-event-submit" class="btn btn-primary">เพิ่ม</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="widget-content">
                    <div class="panel-left">
                        <div id="fullcalendar"></div>
                    </div>
                    <div id="external-events" class="panel-right">
                        <div class="panel-title"><h5><span class="request">* ลากกิจกรรมวางในปฎิทิน</span> </h5></div>
                        <div class="panel-content">
                            <div class="external-event ui-draggable label label-inverse">My Event 1</div>
                            <div class="external-event ui-draggable label label-inverse">My Event 2</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>				 
</div>
@endsection

@section('js')
<script type="text/javascript">

$(document).ready(function(){
	
	maruti.init();
	
	$('#add-event-submit').click(function(){
		maruti.add_event();
	});
	
	$('#event-name').keypress(function(e){
		if(e.which == 13) {	
			maruti.add_event();
		}
	});	
});

maruti = {	
	
	// === Initialize the fullCalendar and external draggable events === //
	init: function() {	
		// Prepare the dates
		var date = new Date();
		var d = date.getDate();
		var m = date.getMonth();
		var y = date.getFullYear();	
		
		$('#fullcalendar').fullCalendar({
			header: {
				left: 'prev,next',
				center: 'title',
				right: 'month,basicWeek,basicDay'
			},
			editable: true,
			droppable: true, // this allows things to be dropped onto the calendar !!!
			drop: function(date, allDay) { // this function is called when something is dropped
				
				// retrieve the dropped element's stored Event Object
				var originalEventObject = $(this).data('eventObject');
					
				// we need to copy it, so that multiple events don't have a reference to the same object
				var copiedEventObject = $.extend({}, originalEventObject);
					
				// assign it the date that was reported
				copiedEventObject.start = date;
				copiedEventObject.allDay = allDay;
					
				// render the event on the calendar
				// the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
                $('#fullcalendar').fullCalendar('renderEvent', copiedEventObject, true);
                var d = copiedEventObject.start;
                // d.setDate(d.getDate() + 1);
                var n = d.toISOString();
                var start_day = n.split('T');
                                
                console.log(start_day[0]);
                console.log(originalEventObject);
				// is the "remove after drop" checkbox checked?
				
					// if so, remove the element from the "Draggable Events" list
					$(this).remove();
				
			}
		});
        this.external_events();
        		
	},
	
	// === Adds an event if name is provided === //
	add_event: function(){
		if($('#event-name').val() != '') {
			var event_name = $('#event-name').val();
			$('#external-events .panel-content').append('<div class="external-event ui-draggable label label-inverse">'+event_name+'</div>');
			this.external_events();
			$('#modal-add-event').modal('hide');
            $('#event-name').val('');
            console.log($('#event-name').val());
		} else {
			this.show_error();
		}
	},
	
	// === Initialize the draggable external events === //
	external_events: function(){
		/* initialize the external events
		-----------------------------------------------------------------*/
		$('#external-events div.external-event').each(function() {		
			// create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
			// it doesn't need to have a start or end
			var eventObject = {
				title: $.trim($(this).text()) // use the element's text as the event title
			};
			console.log(eventObject);	
			// store the Event Object in the DOM element so we can get to it later
            $(this).data('eventObject', eventObject);
            $('p.z1').html('<div style="position:absolute;z-index:8;top:0;left:0"><div class="fc-event fc-event-skin fc-event-hori fc-event-draggable fc-corner-left fc-corner-right ui-draggable" unselectable="on" style="position: absolute; z-index: 8;"><div class="fc-event-inner fc-event-skin"><span class="fc-event-title">Suthirak</span></div><div class="ui-resizable-handle ui-resizable-e">&nbsp;&nbsp;&nbsp;</div></div><div class="fc-cell-overlay" style="position: absolute; z-index: 3; top: 352px; left: 768px; width: 192px; height: 165px; display: none;"></div></div>');
			//$('#external-events .panel-content').append('<div class="external-event ui-draggable label label-inverse">Suthirak</div>');	
			// make the event draggable using jQuery UI
			$(this).draggable({
				zIndex: 999,
				revert: true,      // will cause the event to go back to its
				revertDuration: 0  //  original position after the drag
			});		
		});		
	},
	
	// === Show error if no event name is provided === //
	show_error: function(){
		$('#modal-error').remove();
		$('<div style="border-radius: 5px; top: 70px; font-size:14px; left: 50%; margin-left: -70px; position: absolute;width: 140px; background-color: #f00; text-align: center; padding: 5px; color: #ffffff;" id="modal-error">Enter event name!</div>').appendTo('#modal-add-event .modal-body');
		$('#modal-error').delay('1500').fadeOut(700,function() {
			$(this).remove();
		});
	}
	
	
};

</script>
<script src="{{ asset('js/main/fullcalendar.min.js') }}"></script>
@endsection