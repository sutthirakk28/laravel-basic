@extends('layouts.tpm')

@section('css')
<link rel="stylesheet" href="{{ asset('css/main/uniform.css') }}" />
<link rel="stylesheet" href="{{ asset('css/main/select2.css') }}" />
<link rel="stylesheet" href="{{ asset('css/main/jquery.gritter.css') }}" />
<style type="text/css">
.widget-title .label {
  padding: 1px 3px 1px 2px;
  float: right;
  margin: -2px 6px 0px 5px;
  box-shadow: 0 1px 2px rgba(0,0,0,0.3) inset, 0 1px 0 #ffffff;
}
</style>
@endsection

@section('content-header')
<div id="content-header">
    <div id="breadcrumb">
        <a href="{{ url('/leave') }}" title="กลับไปข้อมูลการลางาน" class="tip-bottom">
            <i class="icon-book"></i> ข้อมูลการลางาน</a>
        <a href="#">แสดงข้อมูลลางาน</a>
    </div>
</div>  
@endsection

@section('content')


  @php
    error_reporting(E_ALL ^ E_NOTICE);

    function getDate1($day,$day2) {
      $diff  = date_diff( date_create($day), date_create($day2) );
      return($diff->d);
    }

    function thai_date($time){
      $thai_day_arr=array("อาทิตย์","จันทร์","อังคาร","พุธ","พฤหัสบดี","ศุกร์","เสาร์");
      $thai_month_arr=array(
        "0"=>"",
        "1"=>"ม.ค.",
        "2"=>"ก.พ.",
        "3"=>"มี.ค.",
        "4"=>"เม.ย.",
        "5"=>"พ.ค.",
        "6"=>"มิ.ย.",
        "7"=>"ก.ค.",
        "8"=>"ส.ค.",
        "9"=>"ก.ย.",
        "10"=>"ต.ค.",
        "11"=>"พ.ย.",
        "12"=>"ธ.ค."
      );
      $thai_date_return= date("j",$time);
      $thai_date_return.=" ".$thai_month_arr[date("n",$time)];
      $thai_date_return.= " ".(date("Y",$time)+543);
      return $thai_date_return;
    }

    function thai_date2($time){
      $thai_day_arr=array("อาทิตย์","จันทร์","อังคาร","พุธ","พฤหัสบดี","ศุกร์","เสาร์");
      $thai_month_arr=array(
        "0"=>"",
        "1"=>"ม.ค.",
        "2"=>"ก.พ.",
        "3"=>"มี.ค.",
        "4"=>"เม.ย.",
        "5"=>"พ.ค.",
        "6"=>"มิ.ย.",
        "7"=>"ก.ค.",
        "8"=>"ส.ค.",
        "9"=>"ก.ย.",
        "10"=>"ต.ค.",
        "11"=>"พ.ย.",
        "12"=>"ธ.ค."
      );
      $thai_date_return= date("j",$time);
      $thai_date_return.=" ".$thai_month_arr[date("n",$time)];
      $thai_date_return.= " ".(date("Y",$time)+543);
      $thai_date_return.= "  ".date("H:i",$time)." น.";
      return $thai_date_return;
    }

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
    function count_day($day1){
      $date1=date_create($day1);
      $date2=date_create(date("Y-m-d"));
      $d=date_diff($date1,$date2);
      $count = $d->format("%a");
      return $count;
    }
    function secondsToTime($seconds) {
      $dtF = new \DateTime('@0');
      $dtT = new \DateTime("@$seconds");
      return $dtF->diff($dtT)->format('%a วัน %h ช. %i น.');
    }
  @endphp

<div class="container-fluid">
<div class="row-fluid">
<div class="span12">
<div class="widget-box">
    <div class="widget-content nopadding">
      <div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
        <h5 class="f_th1">
          @php
            $t1_1=0;
            $leave_ordain = 0;
            $leave_deliver = 0;
            $leave_sick = 0;
            $leave_Work = 0;
            $leave_Government = 0;
          @endphp

          @foreach($lib as $proof)
            @if($t1_1 == 0)
              @php $day_pro=count_day($proof['job_start']); @endphp
              {{ $proof['surname'] .'/'. $proof['nickname'] }}
                @if($day_pro >= '119')
                  <span class="label label-important2">ผ่านโปร</span>
                @else
                  @php $total = $day_pro - 119; @endphp
                    <span class="label label-important">ไม่ผ่านโปร {{$total}}</span>
                @endif 
              @php $t1_1 =1; @endphp
            @endif
          @endforeach  
        </h5>
      </div>
      <table class="table table-bordered data-table">
      <thead>
        <tr>
          <th width="5">ID</th>
          <th >วันที่ยื่น</th>
          <th >วันที่ลา</th>                
          <th width="90">ประเภท</th>
          
          <th width="70">จำนวน</th>
          <th >เหตุผล</th>
          <th >หลักฐานการลา</th>
          <th  width="120">อนุมัติโดย</th>
          <th >สร้าง/แก้ไข</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($lib as $l)
        <tr >                
          <td >{{ $l['id']}}</td>                                
          <td class="center">
            {{ thai_date(strtotime($l['date_leave'])) }}
          </td>
          <td >
          @php
            $nstart_day = explode("T",$l['nstart_day']);
            $nend_day = explode("T",$l['nend_day']);
            $start_day_year = $nstart_day[0];
            $start_day_times = $nstart_day[1];
            $end_day_year = $nend_day[0];
            $end_day_times = $nend_day[1];
          @endphp

          @if ($start_day_year == $end_day_year)
            {{ thai_date(strtotime($start_day_year))}}
          {!! nl2br(e('('.$start_day_times.'-'.$end_day_times.')')) !!}
          @else
            {{ thai_date(strtotime($start_day_year)).'('.$start_day_times.')' }}<br>
            ถึง<br>
            {{ thai_date(strtotime($end_day_year)).'('.$end_day_times.')' }}
          @endif
          </td>                
          <td>
           @if ($l['type_leave'] == 0)
             <span class="orange">ลาบวช-ทำหมัน</span>
            @elseif($l['type_leave'] == 1)
             <span class="yellow">ลาคลอด</span>
           @elseif ($l['type_leave'] == 2)
             <span class="red">ลาป่วย</span>
           @elseif ($l['type_leave'] == 3)
             <span class="blue">ลากิจ</span>
           @elseif ($l['type_leave'] == 4)
             <span class="black">ลากิจ-ราชการ</span>
           @else
             อื่นๆ
           @endif
          </td>
          
        <td class="center">
          @php
            $a1=$start_day_year.' '.$start_day_times;
            $a2=$end_day_year.' '.$end_day_times;

            $stop_date = date('Y-m-d', strtotime($end_day_year . ' +1 day'));
            $num_day = dateDiv($start_day_year,$stop_date);

            $time=dateDiv($a1,$a2);
            $ordain_day = 0;
            $deliver_day = 0;
            $sick_day = 0;
            $Work_day = 0;
            $Government_day = 0;
            $sum = 0;            
          @endphp

          @if($start_day_times == '08:30' && $end_day_times == '17:30')
            {{ $num_day['D'].' วัน ' }} 

            @php 
            $d = ($num_day['D'] * 24) * 60;
            $sum = $d;
            @endphp

            @if ($l['type_leave'] == 0)
              @php $ordain_day = $d; @endphp
            @elseif($l['type_leave'] == 1)
              @php $deliver_day = $d; @endphp 
            @elseif ($l['type_leave'] == 2)
              @php $sick_day = $d; @endphp
            @elseif ($l['type_leave'] == 3)
              @php $Work_day = $d; @endphp
            @elseif ($l['type_leave'] == 4)
              @php $Government_day = $d; @endphp
            @endif

          @else
            @if($time['D'] == '0')
              @if($time['M'] == '0')
                {{  $time['H'].' ชั่วโมง ' }}
                @php
                  $d = $num_day['H'] * 60;
                  $sum = $d;
                @endphp
                  @if ($l['type_leave'] == 0)
                    @php $ordain_day = $d; @endphp
                  @elseif($l['type_leave'] == 1)
                    @php $deliver_day = $d; @endphp 
                  @elseif ($l['type_leave'] == 2)
                    @php $sick_day = $d; @endphp
                  @elseif ($l['type_leave'] == 3)
                    @php $Work_day = $d; @endphp
                  @elseif ($l['type_leave'] == 4)
                    @php $Government_day = $d; @endphp
                  @endif
              @else                
                {{ $time['H'].' ชั่วโมง '.$time['M'].' นาที' }}
                @php 
                  $m = $time['H'] * 60;
                  $minutes = $time['M'] + $m;
                  $sum = $minutes;
                @endphp
                  @if ($l['type_leave'] == 0)
                    @php $ordain_day = $minutes; @endphp
                  @elseif($l['type_leave'] == 1)
                    @php $deliver_day = $minutes; @endphp 
                  @elseif ($l['type_leave'] == 2)
                    @php $sick_day = $minutes; @endphp
                  @elseif ($l['type_leave'] == 3)
                    @php $Work_day = $minutes; @endphp
                  @elseif ($l['type_leave'] == 4)
                    @php $Government_day = $minutes; @endphp
                  @endif
              @endif
            @else
              @if($time['M'] == '0')
                {{ $time['D'].' วัน '.$time['H'].' ชั่วโมง '}}
                @php 
                  $h = $time['D'] * 24;
                  $hour2 = ($time['H'] + $h) * 60;
                  $sum = $hour2;
                @endphp
                @if ($l['type_leave'] == 0)
                    @php $ordain_day = $hour2; @endphp
                  @elseif($l['type_leave'] == 1)
                    @php $deliver_day = $hour2; @endphp 
                  @elseif ($l['type_leave'] == 2)
                    @php $sick_day = $hour2; @endphp
                  @elseif ($l['type_leave'] == 3)
                    @php $Work_day = $hour2; @endphp
                  @elseif ($l['type_leave'] == 4)
                    @php $Government_day = $hour2; @endphp
                  @endif
              @else
                {{ $time['D'].' วัน '.$time['H'].' ชั่วโมง '.$time['M'].' นาที'}}
                @php
                  $h = $time['D'] * 24;

                  $m = ($time['H'] + $h) * 60;
                  $minutes = ($time['M'] + $m);
                  $sum = $minutes;
                @endphp
                  @if ($l['type_leave'] == 0)
                    @php $ordain_day = $minutes; @endphp
                  @elseif($l['type_leave'] == 1)
                    @php $deliver_day = $minutes; @endphp 
                  @elseif ($l['type_leave'] == 2)
                    @php $sick_day = $minutes; @endphp
                  @elseif ($l['type_leave'] == 3)
                    @php $Work_day = $minutes; @endphp
                  @elseif ($l['type_leave'] == 4)
                    @php $Government_day = $minutes; @endphp
                  @endif
              @endif              
            @endif            
          @endif         
                   
        </td>
        <td class="reason">
          {{ $l['reason_leave'] }}
        </td>
        <td>
          <ul>                  
          @php
            $proof_leave=explode(",",$l['proof_leave']);
          @endphp
          @foreach($proof_leave as $p)
            @if($p == 1)
              <li>ใบรับรองแพทย์</li>
            @endif
            @if($p == 2)
              <li>ใบติดต่อราชการ</li>
            @endif
            @if($p == 3)
              <li>ตารางสอบ/เรียน</li>
            @endif
            @if($p == 4)
              <li>หลักฐานอื่นๆ</li>
            @endif
            @if($p=='')
              <li>ไม่มีหลักฐาน</li>
            @endif
          @endforeach
          </ul>
        </td>
        <td>
          @if ($l['approved'] == 1)
            ประธานบริษัท
          @elseif ($l['approved'] == 2)
            กรรมการผู้จัดการ
          @elseif ($l['approved'] == 3)
            เจ้าหน้าที่ฝ่ายบุคคล
          @elseif ($l['approved'] == 4)
            หัวหน้าฝ่าย
          @else
            อื่นๆ
          @endif
        </td>
        <td>
          สร้าง : {{ thai_date2(strtotime($l['created_at'])) }}<br />
          แก้ไข : {{ thai_date2(strtotime($l['updated_at'])) }}
        </td>
      </tr>

        @php        
          $leave_ordain = $leave_ordain + $ordain_day;
          $leave_deliver = $leave_deliver + $deliver_day;
          $leave_sick = $leave_sick + $sick_day;
          $leave_Work = $leave_Work + $Work_day;
          $leave_Government = $leave_Government + $Government_day;
          $leave_sum = $leave_sum + $sum;
        @endphp
        @endforeach
      </tbody>
    </table>
    </div>

  </div>

  <div class="alert alert-error"><span class="badge badge-info">{{secondsToTime($leave_sum*60)}}</span><strong>  ชี้แจง ! <span class="badge badge-success"> ? </span> = ใช้สิทธิลา <span class="badge badge-warning"> ? </span> = ครบสิทธิลา <span class="badge badge-important"> ? </span> = หักเงิน </strong></div>
  <div class="alert-num">
    <span class="orange">ลาบวช-ทำหมัน</span> <span class="badge badge-success">{{secondsToTime($leave_ordain*60)}}</span>
    <span class="yellow">ลาคลอด</span> <span class="badge badge-success">{{secondsToTime($leave_deliver*60)}}</span>
    <span class="red">ลาป่วย</span> <span class="badge badge-success">{{secondsToTime($leave_sick*60)}}</span>
    <span class="blue">ลากิจ</span> <span class="badge badge-success">{{secondsToTime($leave_Work*60)}}</span>
    <span class="black">ลากิจ-ราชการ</span> <span class="badge badge-success">{{secondsToTime($leave_Government*60)}}</span>
  </div> 
</div>
</div>
</div>

@endsection

@section('js')
<script src="{{ asset('js/main/jquery.uniform.js') }}"></script>
<script src="{{ asset('js/main/select2.min.js') }}"></script>
<script src="{{ asset('js/main/jquery.dataTables_desc.min.js') }}"></script> 
<script src="{{ asset('js/main/maruti.tables.js') }}"></script>
@endsection