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
  margin-top: 5px;
}
strong.sum_month {
  color: #468847;
}
.stat-boxes2 .left {
  padding: 15px 0px;
  text-align: center;
  width: auto;
  float: left;
}
.stat-boxes2 .left {
  padding: 15px 0px;
  text-align: center;
  width: auto;
  float: left;
  border-bottom: 2px solid #dadada;
  padding: 5px;
  font-style: italic;
  font-weight: bold;
}
.stat-boxes2 .left span {
  border-bottom: 0px solid #dadada;
  padding: 5px;
}
.stat-boxes2 .right {
  color: #666666;
  font-size: 12px;
  padding: 5px 5px 5px 5px;
  border-left: 1px solid #dadada;
  text-align: left;
  float: left;
}
.widget-box {
  margin-top: 1px;
  margin-bottom: 1px;
}
.left.peity_bar_bad {
  color: #ba1e20;
}
.left.peity_bar_good {
  color: #459d1c;
}
.left.peity_bar_neutral {
  color: #4fb9f0;
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
          <li> <a href="{{ url('/addon/graph') }}"> <i class="icon-graph"></i>แผนภูมิ</a> </li>
        </ul>
   </div>   
   @php 
    $leave0 = $leave1 = $leave2 = $leave3 = $leave4 = 0; 
    $leave01 = $leave11 = $leave21 = $leave31 = $leave41 = 0; 
  @endphp
  @foreach($ctl_month as $sum_month)
    @if($sum_month['type_leave'] == 0) 
      @php $leave0 = $sum_month['count_leave']; @endphp
    @elseif($sum_month['type_leave'] == 1) 
      @php $leave1 = $sum_month['count_leave']; @endphp
    @elseif($sum_month['type_leave'] == 2) 
      @php $leave2 = $sum_month['count_leave']; @endphp
    @elseif($sum_month['type_leave'] == 3) 
      @php $leave3 = $sum_month['count_leave']; @endphp
    @elseif($sum_month['type_leave'] == 4)
      @php $leave4 = $sum_month['count_leave']; @endphp
    @endif 
  @endforeach
  @foreach($ctl_month2 as $sum_month1)
    @if($sum_month1['type_leave'] == 0) 
      @php $leave01 = $sum_month1['count_leave']; @endphp
    @elseif($sum_month1['type_leave'] == 1) 
      @php $leave11 = $sum_month1['count_leave']; @endphp
    @elseif($sum_month1['type_leave'] == 2) 
      @php $leave21 = $sum_month1['count_leave']; @endphp
    @elseif($sum_month1['type_leave'] == 3) 
      @php $leave31 = $sum_month1['count_leave']; @endphp
    @elseif($sum_month1['type_leave'] == 4)
      @php $leave41 = $sum_month1['count_leave']; @endphp
    @endif 
  @endforeach
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
                  @if($leave0 == 0 OR $leave01 == 0)
                    @if($leave0 == 0)
                      @php $leave_ordain = -1 * abs(100) @endphp
                    @elseif($leave01 == 0)
                      @php $leave_ordain = $leave0 *100; @endphp
                    @endif
                  @else
                      @php $leave_ordain = (($leave0 / $leave01) * 100) - 100; @endphp                      
                  @endif

                  @if($leave_ordain > 0)
                    <div class="left peity_bar_good"><span>
                  @elseif($leave_ordain < 0)
                    <div class="left peity_bar_bad"><span>
                  @else
                    <div class="left peity_bar_neutral"><span>
                  @endif
                    <span style="display: none;">
                    @foreach($ctl as $sum_l)
                      @if($sum_l['type_leave'] == 0)
                        {{$sum_l['count_leave']}},
                      @endif
                    @endforeach
                    </span>
                    <canvas width="50" height="24"></canvas>
                    </span>
                      {{ number_format(ceil($leave_ordain)) }}%               
                    </div>
                  <div class="right">ลาบวชฯ 
                    <strong class="sum_month">                      
                    {{ $leave0 }}
                    </strong>   เดือนล่าสุด </div>
                </li>
                <li>
                  @if($leave1 == 0 OR $leave11 == 0)
                    @if($leave1 == 0)
                      @php $leave_deliver = -1 * abs(100);  @endphp
                    @else
                      @php $leave_deliver = $leave1 *100; @endphp
                    @endif
                  @else
                      @php $leave_deliver = (($leave1 / $leave11) * 100) - 100; @endphp 
                  @endif 
                  @if($leave_deliver > 0)
                    <div class="left peity_bar_good"><span>
                  @elseif($leave_deliver < 0)
                    <div class="left peity_bar_bad"><span>
                  @else
                    <div class="left peity_bar_neutral"><span>
                  @endif
                    <span style="display: none;">
                    @foreach($ctl as $sum_l)
                      @if($sum_l['type_leave'] == 1)
                        {{$sum_l['count_leave']}},
                      @endif
                    @endforeach
                    </span>
                    <canvas width="50" height="24"></canvas>
                    </span>                      
                      {{ number_format(ceil($leave_deliver)) }}%
                    </div>
                  <div class="right">ลาคลอด <strong class="sum_month">
                    {{ $leave1 }}
                    </strong>   เดือนล่าสุด </div>
                </li>
                <li>
                  @if($leave2 == 0 OR $leave21 == 0)
                    @if($leave2 == 0)
                      @php $leave_sick = -1 * abs(100) @endphp
                    @else
                      @php $leave_sick = 100; @endphp
                    @endif                          
                  @else
                      @php $leave_sick = (($leave2 / $leave21) * 100) - 100; @endphp
                  @endif 
                   @if($leave_sick > 0)
                    <div class="left peity_bar_good"><span>
                  @elseif($leave_sick < 0)
                    <div class="left peity_bar_bad"><span>
                  @else
                    <div class="left peity_bar_neutral"><span>
                  @endif
                    <span style="display: none;">
                      @foreach($ctl as $sum_l)
                        @if($sum_l['type_leave'] == 2)
                          {{$sum_l['count_leave']}},
                        @endif
                      @endforeach
                      </span>
                    <canvas width="50" height="24"></canvas>
                    </span>                     
                    {{ number_format(ceil($leave_sick)) }}%                       
                    </div>
                  <div class="right">ลาป่วย <strong class="sum_month">
                    {{ $leave2 }}
                    </strong>   เดือนล่าสุด </div>
                </li>
                <li>
                  @if($leave3 == 0 OR $leave31 == 0)
                    @if($leave3 == 0)
                      @php $leave_Work = -1 * abs(100) @endphp
                    @else
                      @php  $leave_Work = 100; @endphp
                    @endif
                  @else
                    @php $leave_Work = (($leave3 / $leave31) * 100) - 100; @endphp
                  @endif
                   @if($leave_Work > 0)
                    <div class="left peity_bar_good"><span>
                  @elseif($leave_Work < 0)
                    <div class="left peity_bar_bad"><span>
                  @else
                    <div class="left peity_bar_neutral"><span>
                  @endif
                    <span style="display: none;">
                      @foreach($ctl as $sum_l)
                        @if($sum_l['type_leave'] == 3)
                          {{$sum_l['count_leave']}},
                        @endif
                      @endforeach
                      </span>
                    <canvas width="50" height="24"></canvas>
                    </span>                      
                      {{ number_format(ceil($leave_Work)) }}% 
                    </div>
                  <div class="right">ลากิจ <strong class="sum_month">
                    {{ $leave3 }}
                    </strong>   เดือนล่าสุด </div>
                </li>
                <li>
                  @if($leave4 == 0 OR $leave41 == 0)
                    @if($leave4 == 0)
                      @php  $leave_Government = -1 * abs(100) @endphp
                    @else
                      @php  $leave_Government = 100; @endphp
                    @endif
                  @else
                    @php $leave_Government = (($leave4 / $leave41) * 100) - 100; @endphp   
                  @endif    
                  @if($leave_Government > 0)
                    <div class="left peity_bar_good"><span>
                  @elseif($leave_Government < 0)
                    <div class="left peity_bar_bad"><span>
                  @else
                    <div class="left peity_bar_neutral"><span>
                  @endif
                    <span style="display: none;">
                      @foreach($ctl as $sum_l)
                        @if($sum_l['type_leave'] == 4)
                          {{$sum_l['count_leave']}},
                        @endif
                      @endforeach
                      </span>
                    <canvas width="50" height="24"></canvas>
                    </span>                     
                     {{ number_format(ceil($leave_Government)) }}%                                       
                    </div>
                  <div class="right">พักร้อน <strong class="sum_month">
                    {{ $leave4 }}
                    </strong>   เดือนล่าสุด </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  <hr>
  <div class="row-fluid">
    <div class="span8">
      <div class="widget-box">
        <div class="widget-title">
          <span class="icon">
            <i class="icon-signal"></i>
          </span>          
          <h5>bar-chart-grouped <code>สรุปการลาแยกตามประเภท แต่ละเดือน</code></h5>
        </div>
        <div class="widget-content">          
          <canvas id="bar-chart-grouped" width="800" height="463"></canvas>
        </div>
      </div>
    </div>
    <div class="span4">
      <div class="widget-box">
        <div class="widget-title">
          <span class="icon">
            <i class="icon-signal"></i>
          </span>
          <h5>pie-chart <code>สรุปประเภทการลา/ร้อยละ</code></h5>
        </div>
        <div class="widget-content">
          <canvas id="pie-chart" width="800" height="450"></canvas>
        </div>
      </div>
      <div class="widget-box">
        <div class="widget-title">
          <span class="icon">
            <i class="icon-signal"></i>
          </span>
          <h5>bar-chart <code>สรุปยอดการลา/เดือน</code></h5>
        </div>
        <div class="widget-content">
          <canvas id="bar-chart" width="800" height="450"></canvas>
        </div>
      </div>
    </div>					
  </div>
  <hr>
  <div class="row-fluid">    
    <div class="span6">
      <div class="widget-box">
        <div class="widget-title">
          <span class="icon">
            <i class="icon-signal"></i>
          </span>
          <h5>polar-chart  <code>สรุปยอดการลา/รายบุคคล</code></h5>
        </div>
        <div class="widget-content">
          <canvas id="polar-chart" width="800" height="500"></canvas>
        </div>
      </div>
    </div>
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
  </div>
  <hr>
</div>
<!--bar-chart-grouped  -->
  @foreach($max_min as $max_mins)
    @php 
      $total = (int)$max_mins['max'] - (int)$max_mins['min'];
      $maxs = $maxs1 =  $maxs2 = $maxs3 = $maxs4 = (int)$max_mins['max'];
      $mins = $mins1 = $mins2 = $mins3 = $mins4 = (int)$max_mins['min'];
      $array = $array1 = $array2 = $array3 = $array4 = array(); 
      $toshow = array();
      $tomins = (int)$max_mins['min'];  
    @endphp
  @endforeach

  @for($mins; $mins <= $maxs; $mins++)
    @php $nn = ''; @endphp
    @foreach($barchartgrouped as $bar)
      @php $mon = (int)$bar['months']; $n = $bar['count_leave']; @endphp        
      @if($mon == $mins)
      @php $nn = 1; $array[] = $n.','; @endphp 
      @endif
    @endforeach
    @if($nn=='')
      @php $array[] = '0'.','; @endphp
    @endif
  @endfor
 <br>
  @for($mins1; $mins1 <= $maxs1; $mins1++)
    @php $nn = ''; @endphp
    @foreach($barchartgrouped1 as $bar1)
      @php $mon = (int)$bar1['months']; $n = $bar1['count_leave']; @endphp        
      @if($mon == $mins1)
      @php $nn = 1; $array1[] = $n.','; @endphp 
      @endif
    @endforeach
    @if($nn=='')
      @php $array1[] = '0'.','; @endphp
    @endif 
  @endfor 
  <br>
  @for($mins2; $mins2 <= $maxs2; $mins2++)
    @php $nn = ''; @endphp    
    @foreach($barchartgrouped2 as $bar2)
      @php $mon = (int)$bar2['months']; $n = $bar2['count_leave']; @endphp        
      @if($mon == $mins2) 
      @php $nn = 1; $array2[] = $n.','; @endphp 
      @endif
    @endforeach
    @if($nn=='')
      @php $array2[] = '0'.','; @endphp
    @endif 
  @endfor
  <br>
  @for($mins3; $mins3 <= $maxs3; $mins3++)
    @php $nn = ''; @endphp
    @foreach($barchartgrouped3 as $bar3)
      @php $mon = (int)$bar3['months']; $n = $bar3['count_leave']; @endphp        
      @if($mon == $mins3)
      @php $nn = 1; $array3[] = $n.','; @endphp 
      @endif
    @endforeach
    @if($nn=='')
      @php $array3[] = '0'.','; @endphp
    @endif    
  @endfor
  <br>
  @for($mins4; $mins4 <= $maxs4; $mins4++)
    @php $nn = ''; @endphp
    @foreach($barchartgrouped4 as $bar4)
      @php $mon = (int)$bar4['months']; $n = $bar4['count_leave']; @endphp        
      @if($mon == $mins4) 
      @php $nn = 1; $array4[] = $n.','; @endphp 
      @endif
    @endforeach
    @if($nn=='')
      @php $array4[] = '0'.','; @endphp
    @endif 
  @endfor 
  <br>
  @php
  $months = array(
    'มกราคม',
    'กุมภาพันธ์',
    'มีนาคม',
    'เมษายน',
    'พฤษภาคม',
    'มิถุนายน',
    'กรกฎาคม',
    'สิงหาคม',
    'กันยายน',
    'ตุลาคม',
    'พฤศจิกายน',
    'ธันวาคม',
    );
    @endphp    
    @php $tomins = $tomins - 1; @endphp
    @for($t = 0; $t <= $total; $t++)
      @php 
        $toshow[] = $months[$tomins];
        $tomins++;
      @endphp
    @endfor
<!-- line-chart  -->  
@php 
$colors = ["#3e95cd", "#8e5ea2", "#3cba9f","#e8c3b9","#c45850","#468847","#ffac49","#0e6ee8","#fd7a06","#e148e2","#fd0654","#d4ea25","#9E9E9E"];
@endphp


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

<script src="{{ asset('js/main/chart/chart.js/Chart.min.js') }}"></script>

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
//chart.js
  //line-chart
  
  new Chart(document.getElementById("polar-chart"), {
    type: 'polarArea',
    data: {
      labels: [
        @foreach($polarchart as $polarcharts)
          '{{ $polarcharts['surname'] }}',
        @endforeach
      ],
      datasets: [
        {
          label: "จำนวน (ครั้ง)",
          backgroundColor: [
            @foreach($colors as $color)
              '{{ $color }}',
            @endforeach
          ],
          data: [
            @foreach($polarchart as $polarcharts)
              '{{ $polarcharts['count_leave'] }}',
            @endforeach
          ]
        }
      ]
    },
    options: {
      title: {
        display: true,
        text: 'รายงานการลาแยกตามรายบุคคลของปี พ.ศ.{{date("Y")+543}}'
      }
    }
});
 // Bar chart
 
new Chart(document.getElementById("bar-chart"), {
    type: 'bar',
    data: {
      labels: [
        @foreach($barchart as $barcharts)
          '{{ $barcharts['months'] }}',
        @endforeach
      ],
      datasets: [
        {
          label: "จำนวน (ครั้ง)",
          backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850","#3a87ad"],
          data: [
            @foreach($barchart as $barcharts)
              '{{ $barcharts['count_leave'] }}',
            @endforeach
            ]
        }
      ]
    },
    options: {
      legend: { display: false },
      title: {
        display: true,
        text: 'รายงานการลาแยกตามเดือนของปี พ.ศ.{{date("Y")+543}}'
      }
    }
});
//pie-chart
new Chart(document.getElementById("pie-chart"), {
    type: 'pie',
    data: {
      labels: [
        @foreach($piechart as $piecharts)
          '{{$piecharts['type_leave']}}',
        @endforeach
      ],
      datasets: [{
        label: "จำนวน (%)",
        backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
        data: [
          @foreach($piechart as $piecharts)
          Number('{{ $piecharts['count_leave'] }}' / 71 * 100).toFixed(2),
          @endforeach
        ]
      }]
    },
    options: {
      title: {
        display: true,
        text: 'รายงานการลาแยกตามประเภทของปี พ.ศ.{{date("Y")+543}}'
      }
    }
});
//bar-chart-grouped
new Chart(document.getElementById("bar-chart-grouped"), {
    type: 'bar',
    data: {
      labels: [
        @foreach($toshow as $toshows)
          '{{ $toshows}}',
        @endforeach
      ],
      datasets: [
        {
          label: "ลาบวช-ทำหมัน",
          backgroundColor: "#3e95cd",
          data: [            
            @foreach($array as $a)
            {{$a}}
            @endforeach
          ]
        }, {
          label: "ลาคลอด",
          backgroundColor: "#8e5ea2",
          data: [            
            @foreach($array1 as $a1)
              {{$a1}}
            @endforeach
          ]
        },
        {
          label: "ลาป่วย",
          backgroundColor: "#3cba9f",
          data: [            
            @foreach($array2 as $a2)
              {{$a2}}
            @endforeach 
          ]
        }, {
          label: "ลากิจ",
          backgroundColor: "#e8c3b9",
          data: [            
            @foreach($array3 as $a3)
              {{$a3}}
            @endforeach 
          ]
        },
        {
          label: "พักร้อน",
          backgroundColor: "#c45850",
          data: [
            @foreach($array4 as $a4)
              {{$a4}}
            @endforeach 
          ]
        }
      ]
    },
    options: {
      title: {
        display: true,
        text: 'รายงานการลาแยกตามประเภท และเดือนของปี พ.ศ.{{date("Y")+543}}'
      }
    }
});
</script>
@endsection
