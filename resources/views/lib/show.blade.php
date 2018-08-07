@extends('layouts.tpm')

@section('css')
<link rel="stylesheet" href="{{ asset('css/main/uniform.css') }}" />
<link rel="stylesheet" href="{{ asset('css/main/select2.css') }}" />

@endsection

@section('content-header')
<div id="content-header">
  <div id="breadcrumb">
    <a href="{{ url('/lib/') }}" title="กลับไปจัดการข้อมูลฝ่าย" class="tip-bottom">
      <i class="icon-book"></i> จัดการข้อมูลพนักงาน</a>
    <a href="#">ข้อมูลพนักงาน</a>
  </div>
</div> 
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
      $thai_date_return="วัน ".$thai_day_arr[date("w",$time)];
      $thai_date_return.= " ที่ ".date("j",$time);
      $thai_date_return.=" ".$thai_month_arr[date("n",$time)];
      $thai_date_return.= " ".(date("Y",$time)+543);
      $thai_date_return.= "  ".date("H:i",$time)." น.";
      return $thai_date_return;
    }

    function count_day($day1){
      $date1=date_create($day1);
      $date2=date_create("2018-08-07");
      $d=date_diff($date1,$date2);
      $count = $d->format("%a");
      return $count;
    }
    
  @endphp

@foreach ($lib as $libs)
<div class="container-fluid">
<div class="row-fluid">
<div class="span12">
<div class="widget-box">
    <div class="widget-title">
        <ul class="nav nav-tabs f_th3">
            <li class="active"><a data-toggle="tab" href="#tab1">ข้อมูลรวม</a></li>
            <li><a data-toggle="tab" href="#tab2">ข้อมูลส่วนตัว</a></li>
            <li><a data-toggle="tab" href="#tab3">ข้อมูลการทำงาน</a></li>
        </ul>
    </div>
    <div class="widget-content tab-content">
        <div id="tab1" class="tab-pane active">
          <div class="widget-content nopadding">
            <div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
              <h5 class="f_th1">
                {{ $libs['surname'] }}
              </h5>
            </div>
            <table class="table table-bordered table-striped">
            <tbody>                
              <tr class="odd gradeX">
                <td><i class="icon-user"></i>   รูป</td>
                <td>{{ Html::image('images/'.$libs['user_photo'], '', array('class' => 'image')) }}</td>
              </tr>
              <tr class="odd gradeX">
                <td><i class="icon-user"></i>   รหัสพนักงาน</td>
                <td>{{ $libs['id_employ'] }}</td>
              </tr>
              <tr class="odd gradeX">
                <td><i class="icon-user"></i>   ชื่อ-นามสกุล</td>
                <td>{{ $libs['surname'] }}</td>
              </tr>
              <tr class="odd gradeX">
                <td><i class="icon-user"></i>   ชื่อเล่น</td>
                <td>{{ $libs['nickname'] }}</td>
              </tr>
              <tr class="odd gradeX">
                <td><i class="icon-user"></i>   อายุ</td>
                <td>{{ getAge($libs['age']).' ปี'}}</td>
              </tr>
              <tr class="odd gradeX">
                <td><i class="icon-user"></i>   ฝ่าย</td>
                <td>{{ $libs['name_dep'] }}</td>
              </tr>
              <tr class="odd gradeX">
                <td><i class="icon-user"></i>   ตำแหน่ง</td>
                <td>{{ $libs['name_pos'] }}</td>
              </tr>
              <tr class="odd gradeX">
              <td><i class="icon-user"></i>   วุฒิการศึกษา</td>
              <td>
                @if($libs['education'] == 1)
                  มัธยมศึกษาตอนต้น
                @elseif($libs['education'] == 2)
                  มัธยมศึกษาตอนปลาย
                @elseif($libs['education'] == 3)
                  ปวช. (ประกาศนียบัตรวิชาชีพ)
                @elseif($libs['education'] == 4)
                  ปวส. (ประกาศนียบัตรวิชาชีพชั้นสูง) 
                @elseif($libs['education'] == 5)
                  ปริญญาตรี
                @elseif($libs['education'] == 6)
                  ปริญญาโท
                @elseif($libs['education'] == 7)
                  ปริญญาเอก
                @else
                  -
                @endif
              </td>
              </tr>
              <tr class="odd gradeX">
                <td><i class="icon-user"></i>   คณะ/สาขา</td>
                <td>
                  @if(isset($libs['n_education']))
                    {{ $libs['n_education'] }}
                  @else
                    -
                  @endif
                </td>
              </tr>
              <tr class="odd gradeX">
                <td><i class="icon-user"></i>    เบอร์โทรศัพท์</td>
                <td>
                   @if(isset($libs['phone']))
                    0-{{ $libs['phone'] }}
                  @else
                    -
                  @endif
                </td>
              </tr>
              <tr class="odd gradeX">
                <td><i class="icon-file"></i>   วันเริ่มงาน</td>
                <td>{{ thai_date(strtotime($libs['job_start'])) }}</td>
              </tr>
              <tr class="odd gradeX green">
                <td><i class="icon-file"></i>    ครบ 45 วัน</td>
                <td>{{ thai_date(strtotime('+45 days',strtotime($libs['job_start']))) }}</td>
              </tr>
              <tr class="odd gradeX yellow">
                <td><i class="icon-file"></i>    ครบ 60 วันส่งเอกสารการประเมิน</td>
                <td>{{ thai_date(strtotime('+60 days',strtotime($libs['job_start']))) }}</td>
              </tr>
              <tr class="odd gradeX yellow">
                <td><i class="icon-file"></i>    กำหนดรับเอกสารประเมิน</td>
                <td>{{ thai_date(strtotime('+70 days',strtotime($libs['job_start']))) }}</td>
              </tr>
              <tr class="odd gradeX orenge">
                <td><i class="icon-file"></i>    ครบ 90 วัน</td>
                <td>{{ thai_date(strtotime('+90 days',strtotime($libs['job_start']))) }}</td>
              </tr>
              <tr class="odd gradeX gray">
                @php
                  $day_pro=count_day($libs['job_start']);
                @endphp
                <td><i class="icon-file"></i>    ผ่านทดลองงาน 119 วัน
                </td>
                <td>{{ thai_date(strtotime('+119 days',strtotime($libs['job_start']))) }} 
                  @if($day_pro >= '119')
                    <span class="label label-important2">ผ่านโปร</span>
                  @else
                    <span class="label label-important">ยังไม่ผ่านโปร</span>
                  @endif
                  </td>
              </tr>
              <tr class="odd gradeX">
                <td><i class="icon-file"></i>    อายุงาน</td>
                <td>{{ getDate1($libs['job_start']) }}</td>
              </tr>
              <tr class="odd gradeX red">
                <td ><i class="icon-file"></i>    วันที่ลาออก</td>
                <td>0000-00-00</td>
              </tr>
              </tr>
                <tr class="odd gradeX">
                <td><i class="icon-envelope"></i>    สร้างเมื่อ</td>
                <td>{{ thai_date2(strtotime($libs['created_at'])) }}</td>
              </tr>
                <tr class="odd gradeX">
                <td><i class="icon-envelope"></i>    แก้ไขเมื่อ</td>
                <td>{{ thai_date2(strtotime($libs['updated_at'])) }}</td>
              </tr>
            </tbody>
            </table>
          </div>    
        </div>
        <div id="tab2" class="tab-pane">
          <div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
              <h5 class="f_th1">
                <!-- {{ Html::image('images/'.$libs['user_photo'], '', array('class' => 'image')) }} -->
                {{ $libs['surname'] }}
              </h5>
            </div>
          <table class="table table-bordered table-striped">
            <tbody>
              <tr class="odd gradeX">
                <td><i class="icon-user"></i>   รูป</td>
                <td>{{ Html::image('images/'.$libs['user_photo'], '', array('class' => 'image')) }}</td>
              </tr>
              <tr class="odd gradeX">
                <td><i class="icon-user"></i>   รหัสพนักงาน</td>
                <td>{{ $libs['id_employ'] }}</td>
              </tr>
              <tr class="odd gradeX">
                <td><i class="icon-user"></i>   ชื่อ-นามสกุล</td>
                <td>{{ $libs['surname'] }}</td>
              </tr>
              <tr class="odd gradeX">
                <td><i class="icon-user"></i>   ชื่อเล่น</td>
                <td>{{ $libs['nickname'] }}</td>
              </tr>
              <tr class="odd gradeX">
                <td><i class="icon-user"></i>   อายุ</td>
                <td>{{ getAge($libs['age']).' ปี'}}</td>
              </tr>
              <tr class="odd gradeX">
                <td><i class="icon-user"></i>   ฝ่าย</td>
                <td>{{ $libs['name_dep'] }}</td>
              </tr>
              <tr class="odd gradeX">
                <td><i class="icon-user"></i>   ตำแหน่ง</td>
                <td>{{ $libs['name_pos'] }}</td>
              </tr>
              <tr class="odd gradeX">
              </td>
              <td><i class="icon-user"></i>   วุฒิการศึกษา</td>
              <td>
                @if($libs['education'] == 1)
                  มัธยมศึกษาตอนต้น
                @elseif($libs['education'] == 2)
                  มัธยมศึกษาตอนปลาย
                @elseif($libs['education'] == 3)
                  ปวช. (ประกาศนียบัตรวิชาชีพ)
                @elseif($libs['education'] == 4)
                  ปวส. (ประกาศนียบัตรวิชาชีพชั้นสูง) 
                @elseif($libs['education'] == 5)
                  ปริญญาตรี
                @elseif($libs['education'] == 6)
                  ปริญญาโท
                @elseif($libs['education'] == 7)
                  ปริญญาเอก
                @else
                  -
                @endif
              </td>
              </tr>
              <tr class="odd gradeX">
                <td><i class="icon-user"></i>   คณะ/สาขา</td>
                <td>
                  @if(isset($libs['n_education']))
                    {{ $libs['n_education'] }}
                  @else
                    -
                  @endif
                </td>
              </tr>
              <tr class="odd gradeX">
                <td><i class="icon-user"></i>    เบอร์โทรศัพท์</td>
                <td>
                   @if(isset($libs['phone']))
                    0-{{ $libs['phone'] }}
                  @else
                    -
                  @endif
                </td>
              </tr>
            </tbody>
            </table>
        </div>
        <div id="tab3" class="tab-pane">
          <div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
              <h5 class="f_th1">
                <!-- {{ Html::image('images/'.$libs['user_photo'], '', array('class' => 'image')) }} -->
                {{ $libs['surname'] }}
              </h5>
            </div>
          <table class="table table-bordered table-striped">
            <tbody>
              <tr class="odd gradeX">
                <td><i class="icon-file"></i>   วันเริ่มงาน</td>
                <td>{{ thai_date(strtotime($libs['job_start'])) }}</td>
              </tr>
              <tr class="odd gradeX green">
                <td><i class="icon-file"></i>    ครบ 45 วัน</td>
                <td>{{ thai_date(strtotime('+45 days',strtotime($libs['job_start']))) }}</td>
              </tr>
              <tr class="odd gradeX yellow">
                <td><i class="icon-file"></i>    ครบ 60 วันส่งเอกสารการประเมิน</td>
                <td>{{ thai_date(strtotime('+60 days',strtotime($libs['job_start']))) }}</td>
              </tr>
              <tr class="odd gradeX yellow">
                <td><i class="icon-file"></i>    กำหนดรับเอกสารประเมิน</td>
                <td>{{ thai_date(strtotime('+70 days',strtotime($libs['job_start']))) }}</td>
              </tr>
              <tr class="odd gradeX orenge">
                <td><i class="icon-file"></i>    ครบ 90 วัน</td>
                <td>{{ thai_date(strtotime('+90 days',strtotime($libs['job_start']))) }}</td>
              </tr>
              <tr class="odd gradeX gray">
                <td><i class="icon-file"></i>    ผ่านทดลองงาน 119 วัน
                </td>
                <td>{{ thai_date(strtotime('+119 days',strtotime($libs['job_start']))) }} 
                  @if($day_pro >= '119')
                    <span class="label label-important2">ผ่านโปร</span>
                  @else
                    <span class="label label-important">ยังไม่ผ่านโปร</span>
                  @endif
                  </td>
              </tr>
              <tr class="odd gradeX ">
                <td><i class="icon-file"></i>    อายุงาน</td>
                <td>{{ getDate1($libs['job_start']) }}</td>
              </tr>
              <tr class="odd gradeX red">
                <td ><i class="icon-file"></i>    วันที่ลาออก</td>
                <td>0000-00-00</td>
              </tr>
              </tr>
            </tbody>
            </table>
        </div>
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
