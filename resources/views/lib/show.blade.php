@extends('layouts/main')
@section('title')
ระบบจัดการข้อมูลพนักงาน
@endsection
@section('content')
<div class="panel panel-primary">
  <div class="panel-heading div2">
    {{$lib->surname}}
  </div>
  @php
    function getAge($birthday) {
      $then = strtotime($birthday);
      return(floor((time()-$then)/31556926));
    }     

    function getDate1($day) {
      $diff  = date_diff( date_create($day), date_create() );
      return($diff->y.' ปี '.$diff->m.' เดือน '.$diff->d.' วัน');
    }
  @endphp
  <div class="panel-body show">
        <table class="table" style="width:100%">
          <tr>
            <td><span class="div4">รหัสพนักงาน</span></td>
            <td><span class="div3">{{ $lib->id_employ }}</span></td>
          </tr>
          <tr>
            <td><span class="div4">ชื่อ-นามสกุล</span></td>
            <td><span class="div3">{{ $lib->surname }}</span></td>
          </tr>
          <tr>
            <td><span class="div4">ชื่อเล่น</span></td>
            <td><span class="div3">{{ $lib->nickname }}</span></td>
          </tr>
          <tr>
            <td><span class="div4">อายุ</span></td>
            <td><span class="div3">{{ getAge($lib->age).' ปี'}}</span></td>
          </tr>
          <tr>
            <td><span class="div4">ฝ่าย</span></td>
            <td><span class="div3">{{ $lib->position }}</span></td>
          </tr>
          <tr>
            <td><span class="div4">ตำแหน่ง</span></td>
            <td><span class="div3">{{ $lib->position }}</span></td>
          </tr>
          <tr>
            <td><span class="div4">วันเริ่มงาน</span></td>
            <td><span class="div3">{{ $lib->job_start }}</span></td>
          </tr>
          <tr>
            <td><span class="div4">ครบ 45 วัน</span></td>
            <td><span class="div3">{{ $lib->id_employ }}</span></td>
          </tr>
          <tr class="div5">
            <td><span class="div4">ครบ 60 วันส่งเอกสารการประเมิน</span></td>
            <td><span class="div3">{{ $lib->id_employ }}</span></td>
          </tr>
          <tr class="div5">
            <td><span class="div4">กำหนดรับเอกสารประเมิน</span></td>
            <td><span class="div3">{{ $lib->id_employ }}</span></td>
          </tr>
          <tr>
            <td><span class="div4">ครบ 90 วัน</span></td>
            <td><span class="div3">{{ $lib->id_employ }}</span></td>
          </tr>
          <tr class="div6">
            <td><span class="div4">ผ่านทดลองาน 119 วัน</span></td>
            <td><span class="div3">{{ $lib->id_employ }}</span></td>
          </tr>
          <tr >
            <td><span class="div4">อายุงาน</span></td>
            <td><span class="div3">{{ getDate1($lib->job_start) }}</span></td>
          </tr>
          <tr class="div7">
            <td><span class="div4">วันที่ลาออก</span></td>
            <td><span class="div3">0000-00-00</span></td>
          </tr>
        </table>
      </li>
  </div>
</div>
@endsection
