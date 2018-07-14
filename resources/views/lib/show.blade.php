@extends('layouts/main')
@section('title')
ระบบจัดการข้อมูลพนักงาน
@endsection
@section('content')

  
  @php
    function getAge($birthday) {
      $then = strtotime($birthday);
      return(floor((time()-$then)/31556926));
    }     

    function getDate1($day) {
      $diff  = date_diff( date_create($day), date_create() );
      return($diff->y.' ปี '.$diff->m.' เดือน '.$diff->d.' วัน');
    }

    $thai_day_arr=array("อาทิตย์","จันทร์","อังคาร","พุธ","พฤหัสบดี","ศุกร์","เสาร์");
    $thai_month_arr=array(
      "0"=>"",
      "1"=>"มกราคม",
      "2"=>"กุมภาพันธ์",
      "3"=>"มีนาคม",
      "4"=>"เมษายน",
      "5"=>"พฤษภาคม",
      "6"=>"มิถุนายน", 
      "7"=>"กรกฎาคม",
      "8"=>"สิงหาคม",
      "9"=>"กันยายน",
      "10"=>"ตุลาคม",
      "11"=>"พฤศจิกายน",
      "12"=>"ธันวาคม"                 
    );
    function thai_date($time){
        global $thai_day_arr,$thai_month_arr;
        $thai_date_return="วัน".$thai_day_arr[date("w",$time)];
        $thai_date_return.= "ที่ ".date("j",$time);
        $thai_date_return.=" เดือน".$thai_month_arr[date("n",$time)];
        $thai_date_return.= " พ.ศ.".(date("Y",$time)+543);
        return $thai_date_return;
    }
  @endphp
  @foreach ($lib as $libs)
  <div class="panel panel-primary">
    <div class="panel-heading div2">
      {{ $libs['surname'] }}
    </div>
    <div class="panel-body show">
      <table class="table" style="width:100%">
        <tr>
          <td class="div4"><span >รหัสพนักงาน</span></td>
          <td><span class="div3">{{ $libs['id_employ'] }}</span></td>
        </tr>
        <tr>
          <td class="div4"><span >ชื่อ-นามสกุล</span></td>
          <td><span class="div3">{{ $libs['surname'] }}</span></td>
        </tr>
        <tr>
          <td class="div4"><span >ชื่อเล่น</span></td>
          <td><span class="div3">{{ $libs['nickname'] }}</span></td>
        </tr>
        <tr>
          <td class="div4"><span >อายุ</span></td>
          <td><span class="div3">{{ getAge($libs['age']).' ปี'}}</span></td>
        </tr>
        <tr>
          <td  class="div4"><span>ฝ่าย</span></td>
          <td><span class="div3">{{ $libs['name_dep']}}</span></td>
        </tr>
        <tr>
          <td class="div4"><span >ตำแหน่ง</span></td>
          <td><span class="div3">{{ $libs['name_pos'] }}</span></td>
        </tr>
        <tr>
          <td class="div4"><span >วันเริ่มงาน</span></td>
          <td><span class="div3">{{ $libs['job_start']}}</span></td>
        </tr>
        <tr>
          <td class="div4"><span >ครบ 45 วัน</span></td>          
          <td><span class="div3">{{ date('d/m/Y',strtotime('+60 days',strtotime('07/14/2018')))}}</span></td>
        </tr>
        <tr class="div5">
          <td class="div4"><span >ครบ 60 วันส่งเอกสารการประเมิน</span></td>
          <td><span class="div3">{{ date('d/m/Y',strtotime('+60 days',strtotime('07/14/2018'))) }}</span></td>
        </tr>
        <tr class="div5">
          <td class="div4"><span >กำหนดรับเอกสารประเมิน</span></td>
          <td><span class="div3">{{ thai_date(strtotime($libs['job_start'])) }}</span></td>
        </tr>
        <tr>
          <td class="div4"><span >ครบ 90 วัน</span></td>
          <td><span class="div3">{{ $libs['job_start']}}</span></td>
        </tr>
        <tr class="div6">
          <td class="div4"><span >ผ่านทดลองาน 119 วัน</span></td>
          <td><span class="div3">{{ $libs['job_start']}}</span></td>
        </tr>
        <tr >
          <td class="div4"><span >อายุงาน</span></td>
          <td><span class="div3">{{ getDate1($libs['job_start']) }}</span></td>
        </tr>
        <tr class="div7">
          <td class="div4"><span>วันที่ลาออก</span></td>
          <td><span class="div3">0000-00-00</span></td>
        </tr>
      </table>
    </div>
  </div>
  @endforeach
@endsection
