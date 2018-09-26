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
.container-fluid,#content-header{
   font-family: Maitree;
}
.sum{
    color:red;
}
</style>
@endsection

@section('content-header')
<div id="content-header">
    <div id="breadcrumb"> 
        <a href="{{ url('/leave') }}" title="กลับไปข้อมูลการลางาน" class="tip-bottom">
            <i class="icon-book"></i> ข้อมูลการลางาน
        </a>
        <a href="#">สรุปผลการลา</a>
    </div>
</h1>  
</div>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row-fluid">
        <div class="span12">
            <a href="{{ route('export.exceltomonth') }}" title="Excel" class="btn thead">Excel <i class="fa fa-file-excel-o" aria-hidden="true" style="font-size:14px"></i></a>
            <a href="{{ url('manage_Users/pdf') }}" title="Excel" class="btn thead">PDF <i class="fa fa-file-pdf-o" aria-hidden="true" style="font-size:13.5px"></i></a>
            <a id="print" href="#" title="Excel" class="btn thead">Print <i class="fa fa-print" aria-hidden="true" style="font-size:15px"></i></a>            
            <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-align-left"></i> </span>
            <h5>รายงาน สรุปผลการลา</h5><span class="label">เดือนที่แล้ว</span><span class="label label-success">เดือนนี้</span> 
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th width="30%">ชื่อ</th>
                  <th width="10%">ลาบวช-ทำหมัน</th>
                  <th width="10%">ลาคลอด</th>
                  <th width="10%">ลาป่วย</th>
                  <th width="10%">ลากิจ</th>
                  <th width="10%">พักร้อน</th>
                  <th class="sum">รวม</th>
                </tr>
              </thead>
              <tbody>
                @php 
                    function dateDiv($t1,$t2){
                    $t1Arr=splitTime($t1);
                    $t2Arr=splitTime($t2);
                    
                    $Time1=mktime($t1Arr["h"], $t1Arr["m"], $t1Arr["s"], $t1Arr["M"], $t1Arr["D"], $t1Arr["Y"]);
                    $Time2=mktime($t2Arr["h"], $t2Arr["m"], $t2Arr["s"], $t2Arr["M"], $t2Arr["D"], $t2Arr["Y"]);
                    $TimeDiv=abs($Time2-$Time1);

                    $Time["D"]=intval($TimeDiv/86400); 
                    $Time["H"]=intval(($TimeDiv%86400)/3600); 
                    $Time["M"]=intval((($TimeDiv%86400)%3600)/60); 
                    $Time["S"]=intval(((($TimeDiv%86400)%3600)%60));
                    return $Time;
                    }

                    function splitTime($time){  
                    $timeArr["Y"]= substr($time,2,2);
                    $timeArr["M"]= substr($time,5,2);
                    $timeArr["D"]= substr($time,8,2);
                    $timeArr["h"]= substr($time,11,2);
                    $timeArr["m"]= substr($time,14,2);
                    $timeArr["s"]= substr($time,17,2);
                    return $timeArr;
                    }

                    function secondsToTime($seconds) {
                    $dtF = new \DateTime('@0');
                    $dtT = new \DateTime("@$seconds");
                    return $dtF->diff($dtT)->format('%a วัน %h:%i น.');
                    }

                    $name='';                      
                @endphp

                @foreach($leave as $leaves)
                <tr class="odd gradeX">        
                @php 
                $leave_ordain = $leave_deliver = $leave_sick = $leave_Work = $leave_Government = 0; 
                $sum = 0;
                @endphp                         
                    @if($leaves['id_per'] != $name)
                    <td>{{$leaves['surname'].' ('.$leaves['nickname'].')' }}</td>
                        @php $name=$leaves['id_per']; @endphp

                        @foreach($leave as $l)
                        @php
                            $nstart_day = explode("T",$l['nstart_day']);
                            $nend_day = explode("T",$l['nend_day']);
                            $start_day_year = $nstart_day[0];
                            $start_day_times = $nstart_day[1];
                            $end_day_year = $nend_day[0];
                            $end_day_times = $nend_day[1];

                            $a1=$start_day_year.' '.$start_day_times;
                            $a2=$end_day_year.' '.$end_day_times;

                            $stop_date = date('Y-m-d', strtotime($end_day_year . ' +1 day'));
                            $num_day = dateDiv($start_day_year,$stop_date);

                            $time=dateDiv($a1,$a2);
                            $ordain_day = 0; $deliver_day = 0; $sick_day = 0; $Work_day = 0; $Government_day = 0;
                        @endphp

                            @if($l['id_per'] == $leaves['id_per'])

                                @if($l['type_leave'] == 0)
                                    @if($start_day_times == '08:30' && $end_day_times == '17:30')
                                        @php 
                                            $ordain_day = ($num_day['D'] * 24) * 60;           
                                        @endphp
                                    @else
                                        @php
                                            $h = $time['D'] * 24;
                                            $m = ($time['H'] + $h) * 60;
                                            $d = ($time['M'] + $m);
                                            $ordain_day = $d;
                                        @endphp
                                    @endif
                                @elseif($l['type_leave'] == 1)
                                    @if($start_day_times == '08:30' && $end_day_times == '17:30')
                                        @php 
                                            $deliver_day = ($num_day['D'] * 24) * 60;           
                                        @endphp
                                    @else
                                        @php
                                            $h = $time['D'] * 24;
                                            $m = ($time['H'] + $h) * 60;
                                            $d = ($time['M'] + $m);
                                            $deliver_day = $d;
                                        @endphp
                                    @endif
                                @elseif($l['type_leave'] == 2)
                                    @if($start_day_times == '08:30' && $end_day_times == '17:30')
                                        @php 
                                            $sick_day = ($num_day['D'] * 24) * 60;           
                                        @endphp
                                    @else
                                        @php
                                            $h = $time['D'] * 24;
                                            $m = ($time['H'] + $h) * 60;
                                            $d = ($time['M'] + $m);
                                            $sick_day = $d;
                                        @endphp
                                    @endif
                                @elseif($l['type_leave'] == 3)
                                    @if($start_day_times == '08:30' && $end_day_times == '17:30')
                                        @php 
                                            $Work_day = ($num_day['D'] * 24) * 60;           
                                        @endphp
                                    @else
                                        @php
                                            $h = $time['D'] * 24;
                                            $m = ($time['H'] + $h) * 60;
                                            $d = ($time['M'] + $m);
                                            $Work_day = $d;
                                        @endphp
                                    @endif
                                @elseif($l['type_leave'] == 4)
                                    @if($start_day_times == '08:30' && $end_day_times == '17:30')
                                        @php 
                                            $Government_day = ($num_day['D'] * 24) * 60;           
                                        @endphp
                                    @else
                                        @php
                                            $h = $time['D'] * 24;
                                            $m = ($time['H'] + $h) * 60;
                                            $d = ($time['M'] + $m);
                                            $Government_day = $d;
                                        @endphp
                                    @endif
                                @endif
                            
                            @endif
                        @php        
                            $leave_ordain = $leave_ordain + $ordain_day;
                            $leave_deliver = $leave_deliver + $deliver_day;
                            $leave_sick = $leave_sick + $sick_day;
                            $leave_Work = $leave_Work + $Work_day;
                            $leave_Government = $leave_Government + $Government_day;
                            $sum = $leave_ordain + $leave_deliver + $leave_sick + $leave_Work + $leave_Government;
                        @endphp
                        @endforeach        
                    <td>{{secondsToTime($leave_ordain*60)}}</td>
                    <td>{{secondsToTime($leave_deliver*60)}}</td>
                    <td class="center">{{secondsToTime($leave_sick*60)}}</td>
                    <td class="center">{{secondsToTime($leave_Work*60)}}</td>
                    <td class="center">{{secondsToTime($leave_Government*60)}}</td>
                    <td class="sum">{{secondsToTime($sum*60)}}</td>       
                        
                    @else
                        @if($leaves['type_leave'] == 0)
                            @if($start_day_times == '08:30' && $end_day_times == '17:30')
                                @php 
                                    $ordain_day = ($num_day['D'] * 24) * 60;           
                                @endphp
                            @else
                                @php
                                    $h = $time['D'] * 24;
                                    $m = ($time['H'] + $h) * 60;
                                    $d = ($time['M'] + $m);
                                    $ordain_day = $d;
                                @endphp
                            @endif
                        @elseif($leaves['type_leave'] == 1)
                            @if($start_day_times == '08:30' && $end_day_times == '17:30')
                                @php 
                                    $deliver_day = ($num_day['D'] * 24) * 60;           
                                @endphp
                            @else
                                @php
                                    $h = $time['D'] * 24;
                                    $m = ($time['H'] + $h) * 60;
                                    $d = ($time['M'] + $m);
                                    $deliver_day = $d;
                                @endphp
                            @endif
                        @elseif($leaves['type_leave'] == 2)
                            @if($start_day_times == '08:30' && $end_day_times == '17:30')
                                @php 
                                    $sick_day = ($num_day['D'] * 24) * 60;           
                                @endphp
                            @else
                                @php
                                    $h = $time['D'] * 24;
                                    $m = ($time['H'] + $h) * 60;
                                    $d = ($time['M'] + $m);
                                    $sick_day = $d;
                                @endphp
                            @endif
                        @elseif($leaves['type_leave'] == 3)
                            @if($start_day_times == '08:30' && $end_day_times == '17:30')
                                @php 
                                    $Work_day = ($num_day['D'] * 24) * 60;           
                                @endphp
                            @else
                                @php
                                    $h = $time['D'] * 24;
                                    $m = ($time['H'] + $h) * 60;
                                    $d = ($time['M'] + $m);
                                    $Work_day = $d;
                                @endphp
                            @endif
                        @elseif($leaves['type_leave'] == 4)
                            @if($start_day_times == '08:30' && $end_day_times == '17:30')
                                @php 
                                    $Government_day = ($num_day['D'] * 24) * 60;           
                                @endphp
                            @else
                                @php
                                    $h = $time['D'] * 24;
                                    $m = ($time['H'] + $h) * 60;
                                    $d = ($time['M'] + $m);
                                    $Government_day = $d;
                                @endphp
                            @endif
                        @endif
                    @endif

                    
                    
                </tr>
                @endforeach
              </tbody>
            </table>
            
          </div>
        </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script src="{{ asset('js/main/print/printThis.js') }}"></script>
<script>
$('#print').on("click", function () {
  $('.table').printThis({
    header: "<h1>ข้อมูลฝ่าย</h1>"   
  });
});

</script>
@endsection