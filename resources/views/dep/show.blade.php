@extends('layouts/main')
@section('title')
ระบบจัดการข้อมูลพนักงาน
@endsection
@section('content')
@php    
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
      $thai_date_return="วัน ".$thai_day_arr[date("w",$time)];
      $thai_date_return.= " ที่ ".date("j",$time);
      $thai_date_return.=" ".$thai_month_arr[date("n",$time)];
      $thai_date_return.= " ".(date("Y",$time)+543);
      $thai_date_return.= "  ".date("H:i",$time)." น.";
      return $thai_date_return;
    }

  @endphp  
  @foreach ($dep as $d)
  <div class="panel panel-primary">
    <div class="panel-heading div2">
      {{ $d['name_dep'] }}
    </div>
    <div class="panel-body show">
      <table class="table" style="width:100%">
        <tr>
          <td class="div4"><span >รหัสฝ่าย</span></td>
          <td><span class="div3">{{ $d['id_dep'] }}</span></td>
        </tr>
        <tr>
          <td class="div4"><span >ชื่อฝ่าย</span></td>
          <td><span class="div3">{{ $d['name_dep'] }}</span></td>
        </tr>
        <tr>
          <td class="div4"><span >สร้างเมื่อ</span></td>
          <td><span class="div3">{{ thai_date(strtotime($d['created_at'])) }}</span></td>
        </tr>
        <tr>
          <td class="div4"><span >แก้ไขเมื่อ</span></td>
          <td><span class="div3">{{ thai_date(strtotime($d['updated_at'])) }}</span></td>
        </tr>        
      </table>
    </div>
  </div>
  @endforeach
@endsection
