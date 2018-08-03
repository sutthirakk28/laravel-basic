@extends('layouts.tpm')

@section('css')
<link rel="stylesheet" href="{{ asset('css/main/fullcalendar.css') }}" />
@endsection

@section('content-header')
<div id="content-header">
    <div id="breadcrumb"> <a href="{{ url('/dep') }}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> จัดการข้อมูลฝ่าย</a></div>
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
	<h1 class="elegantshadow">จัดการข้อมูลฝ่าย</h1>
	@if(Session::has('masupdate'))
		<div class="alert alert-success alert-dismissible fade in">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			{{ Session::get('masupdate') }}
		</div>
	@endif
	@if(Session::has('masdelete'))
		<div class="alert alert-danger alert-dismissible fade in">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			{{ Session::get('masdelete') }}
		</div>
	@endif

	<table id="dep" class="table table-bordered" style="wid_depth:100%">
		<thead class="thead">
			<tr>
				<th width="100">รหัส</th>
				<th >ชื่อฝ่าย</th>
				<th width="300">Action</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($dep as $d)
			<tr >
				<td>{{ $d['id_dep'] }}</td>
				<td>{{ $d['name_dep'] }}</td>

				<td class="center">
					{{ Form::open(['route' => ['dep.destroy',$d['id_dep'], 'method' => 'DELETE'] ]) }}
					<input type="hidden" name="_method" value="delete"/>
					{{ Html::link('dep/create','Add', array(	'class' => 'btn btn-primary')) }}
					{{ Html::link('dep/'.$d['id_dep'], 'View', array('class' => 'btn btn-success')) }}
					{{ Html::link('dep/'.$ib=$d['id_dep'].'/edit','Edit', array('class' => 'btn btn-warning')) }}
					{{ Form::submit('Delete',array('class' => 'btn btn-danger','onclick'=>"return confirm('คำเตือน! เมื่อลบฝ่ายข้อมูลอาจเกิดข้อมผิดพลาดได้ ควรปรับเป็นการแก้ไขดีกว่า ?')" )) }}
					{{ Form::close()}}
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	<div class="row">
		<div class="col-xs-5">
			{{ Html::link('dep/create','Add', array(	'class' => 'btn btn-primary thead')) }}
		</div>
	</div>

  <div class="col-md-12">
    <div class="card">
      <div class="card-header card-header-primary">
        <h4 class="card-title ">Simple Table</h4>
        <p class="card-category"> Here is a subtitle for this table</p>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table">
            <thead class=" text-primary">
              <th>
                ID
              </th>
              <th>
                Name
              </th>
              <th>
                Country
              </th>
              <th>
                City
              </th>
              <th>
                Salary
              </th>
            </thead>
            <tbody>
              <tr>
                <td>
                  1
                </td>
                <td>
                  Dakota Rice
                </td>
                <td>
                  Niger
                </td>
                <td>
                  Oud-Turnhout
                </td>
                <td class="text-primary">
                  $36,738
                </td>
              </tr>
              <tr>
                <td>
                  2
                </td>
                <td>
                  Minerva Hooper
                </td>
                <td>
                  Curaçao
                </td>
                <td>
                  Sinaai-Waas
                </td>
                <td class="text-primary">
                  $23,789
                </td>
              </tr>
              <tr>
                <td>
                  3
                </td>
                <td>
                  Sage Rodriguez
                </td>
                <td>
                  Netherlands
                </td>
                <td>
                  Baileux
                </td>
                <td class="text-primary">
                  $56,142
                </td>
              </tr>
              <tr>
                <td>
                  4
                </td>
                <td>
                  Philip Chaney
                </td>
                <td>
                  Korea, South
                </td>
                <td>
                  Overland Park
                </td>
                <td class="text-primary">
                  $38,735
                </td>
              </tr>
              <tr>
                <td>
                  5
                </td>
                <td>
                  Doris Greene
                </td>
                <td>
                  Malawi
                </td>
                <td>
                  Feldkirchen in Kärnten
                </td>
                <td class="text-primary">
                  $63,542
                </td>
              </tr>
              <tr>
                <td>
                  6
                </td>
                <td>
                  Mason Porter
                </td>
                <td>
                  Chile
                </td>
                <td>
                  Gloucester
                </td>
                <td class="text-primary">
                  $78,615
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('js')
<script src="{{ asset('js/main/excanvas.min.js') }}"></script>
<script src="{{ asset('js/main/jquery.flot.min.js') }}"></script> 
<script src="{{ asset('js/main/jquery.flot.resize.min.js') }}"></script> 
<script src="{{ asset('js/main/jquery.peity.min.js') }}"></script> 
<script src="{{ asset('js/main/fullcalendar.min.js') }}"></script>
<script src="{{ asset('js/main/maruti.dashboard.js') }}"></script> 
<script src="{{ asset('js/main/maruti.chat.js') }}"></script> 

<script type="text/javascript">
  // This function is called from the pop-up menus to transfer to
  // a different page. Ignore if the value returned is a null string:
  function goPage (newURL) {

      // if url is empty, skip the menu dividers and reset the menu selection to default
      if (newURL != "") {
      
          // if url is "-", it is this page -- reset the menu:
          if (newURL == "-" ) {
              resetMenu();            
          } 
          // else, send page to designated URL            
          else {  
            document.location.href = newURL;
          }
      }
  }

// resets the menu selection upon entry to this page:
function resetMenu() {
   document.gomenu.selector.selectedIndex = 2;
}
</script>
@endsection