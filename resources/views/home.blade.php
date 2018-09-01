@extends('layouts.tpm')

@section('css')
<link rel="stylesheet" href="{{ asset('css/main/fullcalendar/fullcalendar.min.css') }}" />
<style type="text/css">  
  [class^="icon-"], [class*=" icon-"] {
    background-image: url('images/img/glyphicons-halflings.png');
  }
  #sidebar > ul li a i {
    background-image: url('images/img/glyphicons-halflings-white.png');
  }
  #user-nav > ul > li > a > i, #sidebar li a i {
    background-image: url('images/img/glyphicons-halflings-white.png');
  }
  #breadcrumb a {
    background-image: url('images/img/breadcrumb.png');
  }
  .icon-white, .nav-pills>.active>a>[class^="icon-"], .nav-pills>.active>a>[class*=" icon-"], .nav-list>.active>a>[class^="icon-"], .nav-list>.active>a>[class*=" icon-"], .navbar-inverse .nav>.active>a>[class^="icon-"], .navbar-inverse .nav>.active>a>[class*=" icon-"], .dropdown-menu>li>a:hover>[class^="icon-"], .dropdown-menu>li>a:focus>[class^="icon-"], .dropdown-menu>li>a:hover>[class*=" icon-"], .dropdown-menu>li>a:focus>[class*=" icon-"], .dropdown-menu>.active>a>[class^="icon-"], .dropdown-menu>.active>a>[class*=" icon-"], .dropdown-submenu:hover>a>[class^="icon-"], .dropdown-submenu:focus>a>[class^="icon-"], .dropdown-submenu:hover>a>[class*=" icon-"], .dropdown-submenu:focus>a>[class*=" icon-"] {
    background-image: url('images/img/glyphicons-halflings-white.png');
  }
  #header h1 {
    background: url('images/img/logo.png') no-repeat scroll 0 0 transparent;
  }
  .select2-container .select2-choice div b {
    background: url('images/img/select2.png') no-repeat 0 1px;
  }
  span#sum_admin,span#sum_per,span#sum_task,span#sum_leave {
    margin-left: 35px;
  }
  .container-fluid {
    font-family: Maitree;
  } 
  .quick-actions li {
    min-width: 120px;
    max-width: 150px;    
  } 
  .btn-mini [class^="icon-"], .btn-mini [class*=" icon-"] {
    margin-top: 1px;
  }  
  .iTooltip{  
    position:absolute;  
    border:1px solid #FFCC66;  
    background-color:#FFFFCC;  
    color:#000000;  
    display:none;  
    padding:5px;  
    font-size:12px;  
    z-index:90000;
  }  
  
  .span2 {
    margin-top: 60px;
  }
</style>
@endsection

@section('content-header')
<div id="content-header">
    <div id="breadcrumb"> <a href="#" class="tip-bottom"><i class="icon-home"></i> Home</a></div>
  </div>  
@endsection

@section('content')
<div class="container-fluid">
    <div class="quick-actions_homepage">
    <ul class="quick-actions">
          <li> <a href="{{ url('/leave') }}"> <i class="icon-book"><span class="badge badge-success" id="sum_leave">0</i>ประวัติลา</a> </li> 
          <li> <a href="#"> <i class="icon-people"><span class="badge badge-success" id="sum_admin">0</i>ผู้ดูแล</a> </li>          
          <li> <a href="{{ url('/lib') }}"> <i class="icon-client"><span class="badge badge-success" id="sum_per">0</i></i>พนักงาน</a> </li>
          <li> <a href="{{ url('/tasks') }}"> <i class="icon-calendar"><span class="badge badge-success" id="sum_task">0</i></i>กิจกรรม </a> </li>
          <li> <a href="#"> <i class="icon-graph"></i>แผนภูมิ</a> </li>
        </ul>
   </div>
   
   <div class="row-fluid">
      <div class="widget-box">
        <div class="widget-title"><span class="icon"><i class="icon-tasks"></i></span>
          <h5>ประวัติการลา</h5>
          <div class="buttons"><a href="#" class="btn btn-mini btn-success"><i class="icon-refresh"></i> Refresh</a></div>
        </div>
        <div class="widget-content">
          <div class="row-fluid">
            <div class="span10">
              <div id='calendar'></div>
              <span class='iTooltip' id="infotooltip"></span>
            </div>
            <div class="span2">
              <ul class="stat-boxes2">
                <li>
                  <div class="left peity_bar_neutral"><span><span style="display: none;">2,4</span>
                    <canvas width="50" height="24"></canvas>
                    </span>10%</div>
                  <div class="right">ลาบวชฯ <strong>23</strong>   เดือนล่าสุด </div>
                </li>
                <li>
                  <div class="left peity_bar_bad"><span><span style="display: none;">2,4,9,7,12,10,12,19,3,12,10,12,19,3</span>
                    <canvas width="50" height="24"></canvas>
                    </span>-10%</div>
                  <div class="right">ลาคลอด <strong>23</strong>   เดือนล่าสุด </div>
                </li>
                <li>
                  <div class="left peity_bar_good"><span><span style="display: none;">2,4,9,7,12,10,12,19,3</span>
                    <canvas width="50" height="24"></canvas>
                    </span>+10%</div>
                  <div class="right">ลาป่วย <strong>23</strong>   เดือนล่าสุด </div>
                </li>
                <li>
                  <div class="left peity_bar_bad"><span><span style="display: none;">2,4,9,7,12,10,12,19,3</span>
                    <canvas width="50" height="24"></canvas>
                    </span>-10%</div>
                  <div class="right">ลากิจ <strong>23</strong>   เดือนล่าสุด </div>
                </li>
                <li>
                  <div class="left peity_bar_good"><span><span style="display: none;">2,4,9,7,12,10,12,19,3</span>
                    <canvas width="50" height="24"></canvas>
                    </span>+10%</div>
                  <div class="right">พักร้อน <strong>23</strong>   เดือนล่าสุด </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <div class="row-fluid">
      <div class="span6">
        <div class="widget-box widget-chat">
          <div class="widget-title"> <span class="icon"> <i class="icon-comment"></i> </span>
            <h5>มาคุยกันเถอะ!</h5>
          </div>
          <div class="widget-content nopadding">
            <div class="chat-users panel-right2">
              <div class="panel-title">
                <h5>Online Users</h5>
              </div>
              <div class="panel-content nopadding">
                <ul class="contact-list">
                  <li id="user-Sunil" class="online"><a href=""><img alt="" src="images/img/demo/av1.jpg" /> <span>เกศสุดา</span></a></li>
                  <li id="user-Laukik"><a href=""><img alt="" src="images/img/demo/av2.jpg" /> <span>สุชิน</span></a></li>
                  <li id="user-vijay" class="online new"><a href=""><img alt="" src="images/img/demo/av3.jpg" /> <span>บรรลังฤทธิ์ะ</span></a><span class="msg-count badge badge-info">3</span></li>
                  <li id="user-Jignesh" class="online"><a href=""><img alt="" src="images/img/demo/av4.jpg" /> <span>สมชัย</span></a></li>
                  <li id="user-Malay" class="online"><a href=""><img alt="" src="images/img/demo/av5.jpg" /> <span>เกศสุดา</span></a></li>
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
                </span> </div>
            </div>
          </div>
        </div>
      </div>
      <div class="span6">
        <div class="widget-box">
          <div class="widget-title">
            <ul class="nav nav-tabs">
              <li class="active"><a data-toggle="tab" href="#tab1">Tab1</a></li>
              <li><a data-toggle="tab" href="#tab2">Tab2</a></li>
              <li><a data-toggle="tab" href="#tab3">Tab3</a></li>
            </ul>
          </div>
          <div class="widget-content tab-content">
            <div id="tab1" class="tab-pane active">
              <p>And is full of waffle to It has multiple paragraphs and is full of waffle to pad out the comment. Usually, you just wish these sorts of comments would come to an end.multiple paragraphs and is full of waffle to pad out the comment.</p>
              <img src="images/img/demo/demo-image1.jpg" alt="demo-image"/></div>
            <div id="tab2" class="tab-pane"> <img src="images/img/demo/demo-image2.jpg" alt="demo-image"/>
              <p>And is full of waffle to It has multiple paragraphs and is full of waffle to pad out the comment. Usually, you just wish these sorts of comments would come to an end.multiple paragraphs and is full of waffle to pad out the comment.</p>
            </div>
            <div id="tab3" class="tab-pane">
              <p>And is full of waffle to It has multiple paragraphs and is full of waffle to pad out the comment. Usually, you just wish these sorts of comments would come to an end.multiple paragraphs and is full of waffle to pad out the comment. </p>
              <img src="images/img/demo/demo-image3.jpg" alt="demo-image"/></div>
          </div>
        </div>
      </div>
      <div class="span6">
        <div class="widget-box">
          <div class="widget-title"><span class="icon"><i class="icon-user"></i></span>
            <h5>Our Partner (Box with Fix height)</h5>
          </div>
          <div class="widget-content nopadding fix_hgt">
            <ul class="recent-posts">
              <li>
                <div class="user-thumb"> <img width="40" height="40" alt="User" src="images/img/demo/av1.jpg"> </div>
                <div class="article-post"> <span class="user-info">John Deo</span>
                  <p>Web Desginer &amp; creative Front end developer</p>
                </div>
              </li>
              <li>
                <div class="user-thumb"> <img width="40" height="40" alt="User" src="images/img/demo/av2.jpg"> </div>
                <div class="article-post"> <span class="user-info">John Deo</span>
                  <p>Web Desginer &amp; creative Front end developer</p>
                </div>
              </li>
              <li>
                <div class="user-thumb"> <img width="40" height="40" alt="User" src="images/img/demo/av4.jpg"> </div>
                <div class="article-post"> <span class="user-info">John Deo</span>
                  <p>Web Desginer &amp; creative Front end developer</p>
                </div>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <hr>
    <div class="row-fluid">
      <div class="span6">
        <div class="widget-box">
          <div class="widget-title"><span class="icon"><i class="icon-file"></i></span>
            <h5>Latest Posts</h5>
          </div>
          <div class="widget-content nopadding">
            <ul class="recent-posts">
              <li>
                <div class="user-thumb"> <img width="40" height="40" alt="User" src="images/img/demo/av1.jpg"> </div>
                <div class="article-post"> <span class="user-info"> By: john Deo / Date: 2 Aug 2012 / Time:09:27 AM </span>
                  <p><a href="#">This is a much longer one that will go on for a few lines.It has multiple paragraphs and is full of waffle to pad out the comment.</a> </p>
                </div>
              </li>
              <li>
                <div class="user-thumb"> <img width="40" height="40" alt="User" src="images/img/demo/av2.jpg"> </div>
                <div class="article-post"> <span class="user-info"> By: john Deo / Date: 2 Aug 2012 / Time:09:27 AM </span>
                  <p><a href="#">This is a much longer one that will go on for a few lines.It has multiple paragraphs and is full of waffle to pad out the comment.</a> </p>
                </div>
              </li>
              <li>
                <div class="user-thumb"> <img width="40" height="40" alt="User" src="images/img/demo/av4.jpg"> </div>
                <div class="article-post"> <span class="user-info"> By: john Deo / Date: 2 Aug 2012 / Time:09:27 AM </span>
                  <p><a href="#">This is a much longer one that will go on for a few lines.Itaffle to pad out the comment.</a> </p>
                </div>
              <li>
                <button class="btn btn-warning btn-mini">View All</button>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <div class="span6">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-refresh"></i> </span>
            <h5>News updates</h5>
          </div>
          <div class="widget-content nopadding updates">
            <div class="new-update clearfix"><i class="icon-ok-sign"></i>
              <div class="update-done"><a title="" href="#"><strong>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</strong></a> <span>dolor sit amet, consectetur adipiscing eli</span> </div>
              <div class="update-date"><span class="update-day">20</span>jan</div>
            </div>
            <div class="new-update clearfix"> <i class="icon-gift"></i> <span class="update-notice"> <a title="" href="#"><strong>Congratulation Maruti, Happy Birthday </strong></a> <span>many many happy returns of the day</span> </span> <span class="update-date"><span class="update-day">11</span>jan</span> </div>
            <div class="new-update clearfix"> <i class="icon-move"></i> <span class="update-alert"> <a title="" href="#"><strong>Maruti is a Responsive Admin theme</strong></a> <span>But already everything was solved. It will ...</span> </span> <span class="update-date"><span class="update-day">07</span>Jan</span> </div>
            <div class="new-update clearfix"> <i class="icon-leaf"></i> <span class="update-done"> <a title="" href="#"><strong>Envato approved Maruti Admin template</strong></a> <span>i am very happy to approved by TF</span> </span> <span class="update-date"><span class="update-day">05</span>jan</span> </div>
            <div class="new-update clearfix"> <i class="icon-question-sign"></i> <span class="update-notice"> <a title="" href="#"><strong>I am alwayse here if you have any question</strong></a> <span>we glad that you choose our template</span> </span> <span class="update-date"><span class="update-day">01</span>jan</span> </div>
          </div>
        </div>
      </div>
    </div>
    <hr>
    
    <hr>
    <div class="row-fluid">
      <div class="span6">
        <div class="accordion" id="collapse-group">
          <div class="accordion-group widget-box">
            <div class="accordion-heading">
              <div class="widget-title"> <a data-parent="#collapse-group" href="#collapseGOne" data-toggle="collapse"> <span class="icon"><i class="icon-magnet"></i></span>
                <h5>Accordion Example 1</h5>
                </a> </div>
            </div>
            <div class="collapse in accordion-body" id="collapseGOne">
              <div class="widget-content"> It has multiple paragraphs and is full of waffle to pad out the comment. Usually, you just wish these sorts of comments would come to an end. </div>
            </div>
          </div>
          <div class="accordion-group widget-box">
            <div class="accordion-heading">
              <div class="widget-title"> <a data-parent="#collapse-group" href="#collapseGTwo" data-toggle="collapse"> <span class="icon"><i class="icon-magnet"></i></span>
                <h5>Accordion Example 2</h5>
                </a> </div>
            </div>
            <div class="collapse accordion-body" id="collapseGTwo">
              <div class="widget-content">And is full of waffle to It has multiple paragraphs and is full of waffle to pad out the comment. Usually, you just wish these sorts of comments would come to an end.</div>
            </div>
          </div>
          <div class="accordion-group widget-box">
            <div class="accordion-heading">
              <div class="widget-title"> <a data-parent="#collapse-group" href="#collapseGThree" data-toggle="collapse"> <span class="icon"><i class="icon-magnet"></i></span>
                <h5>Accordion Example 3</h5>
                </a> </div>
            </div>
            <div class="collapse accordion-body" id="collapseGThree">
              <div class="widget-content"> Waffle to It has multiple paragraphs and is full of waffle to pad out the comment. Usually, you just </div>
            </div>
          </div>
        </div>
      </div>
      <div class="span6">
        <div class="widget-box collapsible">
          <div class="widget-title"> <a data-toggle="collapse" href="#collapseOne"> <span class="icon"><i class="icon-arrow-right"></i></span>
            <h5>Toggle, Open by default, </h5>
            </a> </div>
          <div id="collapseOne" class="collapse in">
            <div class="widget-content"> This box is opened by default, paragraphs and is full of waffle to pad out the comment. Usually, you just wish these sorts of comments would come to an end. </div>
          </div>
          <div class="widget-title"> <a data-toggle="collapse" href="#collapseTwo"> <span class="icon"><i class="icon-remove"></i></span>
            <h5>Toggle, closed by default</h5>
            </a> </div>
          <div id="collapseTwo" class="collapse">
            <div class="widget-content"> This box is now open </div>
          </div>
          <div class="widget-title"> <a data-toggle="collapse" href="#collapseThree"> <span class="icon"><i class="icon-remove"></i></span>
            <h5>Toggle, closed by default</h5>
            </a> </div>
          <div id="collapseThree" class="collapse">
            <div class="widget-content"> This box is now open </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('js')
<script src="{{ asset('js/main/excanvas.min.js') }}"></script>
<script src="{{ asset('js/main/jquery.flot.min.js') }}"></script> 
<script src="{{ asset('js/main/jquery.flot.resize.min.js') }}"></script> 
<script src="{{ asset('js/main/jquery.peity.min.js') }}"></script>
<script src="{{ asset('js/main/maruti.dashboard.js') }}"></script> 
<script src="{{ asset('js/main/maruti.chat.js') }}"></script>

<script src="{{ asset('js/main/fullcalendar/moment.min.js') }}"></script>
<script src="{{ asset('js/main/fullcalendar/fullcalendar.min.js') }}"></script>
<script src="{{ asset('js/main/fullcalendar/th.js') }}"></script>
<script type="text/javascript">
$(document).ready(function() {
 //list_leave
  $('#calendar').fullCalendar({
    height: 514,
    // dayClick: function() {
    //   alert('a day has been clicked!');
    // },
    header: {
      left: 'prev,next today',
      center: 'title',
      right: 'month,agendaWeek,agendaDay'
    },
    buttonIcons:{
      prev: 'left-single-arrow',
      next: 'right-single-arrow',
      prevYear: 'left-double-arrow',
      nextYear: 'right-double-arrow'        
    },
    firstDay:1,
    events : [
        @foreach($leave as $l)
        {          
          id    : '{{ $l['id'] }}',
          title : '{{ $l['nickname'].' : '}}@if($l['type_leave']==0)ลาบวช-ทำหมัน@elseif($l['type_leave']==1)ลาคลอด @elseif($l['type_leave']==2)ลาป่วย @elseif($l['type_leave']==3)ลากิจ @else พักร้อน @endif',
          start : '{{ $l['nstart_day'] }}',
          end   : '{{ $l['nend_day'] }}',
          allDay: false,
          error : function() {}                    
        },
        @endforeach
    ],
    // editable: true,
    eventLimit: true,
    lang: 'th',
    eventMouseover: function( event, jsEvent, view ){
    callTooltip("#infotooltip",jsEvent,event.title);   
    },
    eventMouseout: function( event, jsEvent, view ){
        $("#infotooltip").hide();  
    }  
  });

  var callTooltip = function (obj,jsEvent,strText){ // ฟังก์ชั่นแสดงกล่องข้อความ Tooltip  
    var locateX=jsEvent.pageX;     
    var locateY=jsEvent.pageY;   
    locateX-=0;  
    locateY-=300;  
    $(obj).show().css({  
        left:locateX,  
        top:locateY  
    }).html(strText);                 
  }    
  //sum leave
  $.ajax({
    type :'GET',
    url : "{{ url('/home/sum_leave') }}",
    success : function(data)
    {
       $('span#sum_leave').text(data.sum_leave);
    }                
  });
  //sum admin
  $.ajax({
    type :'GET',
    url : "{{ url('/home/sum_admin') }}",
    success : function(data)
    {
       $('span#sum_admin').text(data.sum_admin);
    }                
  });
  //sum persion
  $.ajax({
    type :'GET',
    url : "{{ url('/home/sum_per') }}",
    success : function(data)
    {     
      $('span#sum_per').text(data.sum_per);
    }                
  });
  //sum task
  $.ajax({
    type :'GET',
    url : "{{ url('/home/sum_task') }}",
    success : function(data)
    {     
      $('span#sum_task').text(data.sum_task);
    }                
  });

});

  function goPage (newURL) {
    if (newURL != "") {
      if (newURL == "-" ) {
          resetMenu();            
      } else {  
      document.location.href = newURL;
      }
    }
  }
  function resetMenu() {
    document.gomenu.selector.selectedIndex = 2;
  }
</script>
@endsection
