@extends('layouts.tpm')

@section('css')
<link rel="stylesheet" href="{{ asset('css/main/uniform.css') }}" />
<link rel="stylesheet" href="{{ asset('css/main/select2.css') }}" />
<style type="text/css">
[class^="icon-"], [class*=" icon-"] {    
    background-image: url("../../public/images/img/glyphicons-halflings.png");
}
.icon-white, .nav-pills>.active>a>[class^="icon-"], .nav-pills>.active>a>[class*=" icon-"], .nav-list>.active>a>[class^="icon-"], .nav-list>.active>a>[class*=" icon-"], .navbar-inverse .nav>.active>a>[class^="icon-"], .navbar-inverse .nav>.active>a>[class*=" icon-"], .dropdown-menu>li>a:hover>[class^="icon-"], .dropdown-menu>li>a:focus>[class^="icon-"], .dropdown-menu>li>a:hover>[class*=" icon-"], .dropdown-menu>li>a:focus>[class*=" icon-"], .dropdown-menu>.active>a>[class^="icon-"], .dropdown-menu>.active>a>[class*=" icon-"], .dropdown-submenu:hover>a>[class^="icon-"], .dropdown-submenu:focus>a>[class^="icon-"], .dropdown-submenu:hover>a>[class*=" icon-"], .dropdown-submenu:focus>a>[class*=" icon-"] {
    background-image: url("../../public/images/img/glyphicons-halflings-white.png")
}
.fc-button-next .fc-button-content {
    background: url("../../public/images/img/rarrow.png") no-repeat scroll 15px 13px transparent;
    width: 10px;
}
.fc-button-prev .fc-button-content {
    background: url("../../public/images/img/larrow.png") no-repeat scroll 15px 13px transparent;
    width: 10px;
}
</style>
@endsection

@section('content-header')
<div id="content-header">
  <div id="breadcrumb">
    <a href="{{ url('/manage_Users') }}" title="กลับไปหน้าข้อมูลผู้ดูแล" class="tip-bottom">
      <i class="icon-book"></i> ข้อมูลผู้ดูแล</a>
    <a href="#">แสดงข้อมูลผู้ดูแล</a>
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

  @foreach ($user as $users)
  <div class="container-fluid">
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
            <h5 class="f_th1">{{ $users['name'] }}</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered table-striped">
              <tbody>
                <tr class="odd gradeX">
                  <td>ชื่อ</td>
                  <td>{{ $users['name'] }}</td>
                </tr>
                  <tr class="odd gradeX">
                  <td>E-mail</td>
                  <td>
                  {{ $users['email'] }}
                  </td>
                </tr>
                  <tr class="odd gradeX">
                  <td>ระดับ</td>
                  <td>
                     @if($users['type'] == 1)
                      <span class="label label-success"> Director </span>
                      @else
                      <span class="label label-info">Administrator</span>
                      @endif
                  </td>
                </tr>
                </tr>
                  <tr class="odd gradeX">
                  <td>สร้างเมื่อ</td>
                  <td>{{ thai_date(strtotime($users['created_at'])) }}</td>
                </tr>
                  <tr class="odd gradeX">
                  <td>แก้ไขเมื่อ</td>
                  <td>{{ thai_date(strtotime($users['updated_at'])) }}</td>
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