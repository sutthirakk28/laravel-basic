@extends('layouts.tpm')

@section('css')
<link rel="stylesheet" href="{{ asset('css/main/uniform.css') }}" />
<link rel="stylesheet" href="{{ asset('css/main/select2.css') }}" />
<link rel="stylesheet" href="{{ asset('css/main/jquery.gritter.css') }}" />
@endsection

@section('content-header')
<div id="content-header">
    <div id="breadcrumb"> <a href="#" class="tip-bottom"><i class="icon-book
"></i> ข้อมูลการลางาน</a></div>
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
  @endphp
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
      <div class="widget-box">
        <div class="widget-title">
           <span class="icon"><i class="icon-th"></i></span> 
          <h5 class="f_th1">ประวัติการลางาน</h5>
        </div>
        <div class="widget-content nopadding">
          <table class="table table-bordered data-table">
            <thead>
              <tr>
                <th width="5">ID</th>
                <th width="80">วันที่ยื่น</th>
                <th >รูป</th>
                <th >ชื่อ-นามสกุล</th>
                <th width="90">ประเภท</th>
                <th >วันที่ลา</th>
                <th width="50">จำนวน</th>
                <!-- <th >เหตุผล</th> -->
                <th >หลักฐานการลา</th>
                <th >อนุมัติโดย</th>
                <th width="200">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($leave as $l)
              <tr >                
                <td >{{ $l['id']}}</td>
                <td class="center">{{ thai_date(strtotime($l['date_leave'])) }}</td>
                <td class="img">
                  <a href="{{ url('leave/report/'.$id=$l['lib_id']) }}">{{ Html::image('images/'.$l['user_photo'], '', array('class' => 'image')) }}</a>
                </td>
                @php
                  $day_pro=count_day($l['job_start']);
                @endphp
                <td>
                  <a href="{{ url('leave/report/'.$id=$l['lib_id']) }}">{{ $l['surname'].'/'.$l['nickname']}}</a><br>
                  @if($day_pro >= '119')
                      <span class="label label-important2">ผ่านโปร</span>
                    @else
                      @php $total = $day_pro - 119; @endphp
                        <span class="label label-important">ไม่ผ่านโปร {{$total}}</span>
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
                   <span class="black">พักร้อน</span>
                 @else
                   อื่นๆ
                 @endif
                </td>
                <td class="center">
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
              <td class="center">
                @php
                  $a1=$start_day_year.' '.$start_day_times;
                  $a2=$end_day_year.' '.$end_day_times;

                  $stop_date = date('Y-m-d', strtotime($end_day_year . ' +1 day'));
                  $num_day = dateDiv($start_day_year,$stop_date);

                  $time=dateDiv($a1,$a2);
                @endphp

                @if($start_day_times == '08:30' && $end_day_times == '17:30')

                  {{ $num_day['D'].' วัน ' }}
                @else
                  @if($time['D'] == '0')
                    @if($time['M'] == '0')
                      {{  $time['H'].' ชั่วโมง ' }}
                    @else
                      @if($time['H'] == '0')
                        {{ $time['M'].' นาที' }}
                      @else
                        {{ $time['H'].' ชั่วโมง '.$time['M'].' นาที' }}
                      @endif 
                    @endif
                  @else
                    @if($time['M'] == '0')
                      {{ $time['D'].' วัน '.$time['H'].' ชั่วโมง '}}
                    @else
                      {{ $time['D'].' วัน '.$time['H'].' ชั่วโมง '.$time['M'].' นาที'}}
                    @endif              
                  @endif            
                @endif         
                         
              </td>
              <!-- <td class="reason">
                {{ $l['reason_leave'] }}
              </td> -->
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
              <td class="center">                                        
                {{ Html::link('leave/'.$l['id'], 'View', array('class' => 'btn btn-success')) }}
                {{ Html::link('leave/'.$l['id'].'/edit','Edit', array('class' => 'btn btn-warning')) }}                   
                <a href="#myAlert" data-toggle="modal" data-id="{{$l['id']}}" class="addDialog btn btn-danger">Delete</a>
                
                <!--modal delete -->
                <div id="myAlert" class="modal hide">
                  <div class="modal-header">
                    <button data-dismiss="modal" class="close" type="button">×</button>
                    <h3><i class="material-icons" style="font-size:15px;color:red">error_outline</i> คำเตือน! </h3>
                  </div>
                  <div class="modal-body">
                    <p>เมื่อลบข้อมูลพนักงานอาจเกิดข้อมผิดพลาดได้ <strong><var>คุณต้องการลบจริงไหม ?</var></strong></p>
                  </div>
                  <div class="modal-footer">
                    {{ Form::open(['route' => ['leave.destroy',$l['id'], 'method' => 'DELETE'] ]) }}
                    <input type="hidden" name="_method" value="delete"/>
                    <input type="hidden" name="depId" value="" id="depId"> 
                    {{ Form::submit('Confirm',array('class' => 'btn btn-primary')) }}
                    <a data-dismiss="modal" class="btn" href="#">Cancel</a> 
                    {{ Form::close()}} 
                    
                  </div>
                </div>
                <!--end modal delete -->
              </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>       
    </div>
  </div>
</div>
<div class="container-fluid">
  <div class="row-fluid">
    <div class="span12">
      {{ Html::link('leave/create','Add', array(  'class' => 'btn btn-primary thead')) }}
    </div>
  </div>
</div>
@endsection

@section('js')
<script src="{{ asset('js/main/jquery.uniform.js') }}"></script>
<script src="{{ asset('js/main/select2.min.js') }}"></script> 
<script src="{{ asset('js/main/jquery.dataTables_desc.min.js') }}"></script> 
<script src="{{ asset('js/main/maruti.tables.js') }}"></script>

<script src="{{ asset('js/main/jquery.gritter.min.js') }}"></script> 
<script src="{{ asset('js/main/jquery.peity.min.js') }}"></script> 
<script src="{{ asset('js/main/maruti.interface.js') }}"></script>
<script src="{{ asset('js/main/maruti.popover.js') }}"></script>
@endsection
