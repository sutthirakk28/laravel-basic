@extends('layouts.tpm')

@section('css')
<link rel="stylesheet" href="{{ asset('css/main/uniform.css') }}" />
<link rel="stylesheet" href="{{ asset('css/main/select2.css') }}" />
@endsection

@section('content-header')
<div id="content-header">
  <div id="breadcrumb">
    <a href="{{ url('/dep/') }}" title="กลับไปจัดการข้อมูลฝ่าย" class="tip-bottom">
      <i class="icon-book"></i> ข้อมูลตำแหน่ง</a>
    <a href="#">แสดงข้อมูลตำแหน่ง</a>
  </div>
</div> 
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
  @foreach ($pos as $p)
  <div class="container-fluid">
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
            <h5 class="f_th1">{{ $p['name_pos'] }}</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered table-striped">
              <tbody>
                <tr class="odd gradeX">
                  <td>รหัสตำแหน่ง</td>
                  <td>{{ $p['id_pos'] }}</td>
                </tr>
                <tr class="odd gradeX">
                  <td>ชื่อฝ่าย</td>
                  <td>{{ $p['name_dep'] }}</td>
                </tr>
                <tr class="odd gradeX">
                  <td>ชื่อตำแหน่ง</td>
                  <td>{{ $p['name_pos'] }}</td>
                </tr>
                <tr class="odd gradeX">
                  <td>สร้างเมื่อ</td>
                  <td>{{ thai_date(strtotime($p['created_at'])) }}</td>
                </tr>
                <tr class="odd gradeX">
                  <td>แก้ไขเมื่อ</td>
                  <td>{{ thai_date(strtotime($p['updated_at'])) }}</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>        
      </div>
    </div>
  </div>
  @endforeach
@endsection

@section('js')
<script src="{{ asset('js/main/jquery.uniform.js') }}"></script>
<script src="{{ asset('js/main/select2.min.js') }}"></script>
<script src="{{ asset('js/main/jquery.dataTables.min.js') }}"></script> 
<script src="{{ asset('js/main/maruti.tables.js') }}"></script>
@endsection