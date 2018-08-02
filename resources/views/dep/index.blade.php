@extends('layouts.tpm')
@section('menu')
<li class="nav-item">
  <a class="nav-link" href="{{ url('/home') }}">
    <i class="material-icons">dashboard</i>
    <p>Dashboard</p>
  </a>
</li>
<li class="nav-item ">
  <a class="nav-link" href="{{ url('/leave/create') }}">
    <i class="material-icons">person</i>
    <p>เขียนใบลา</p>
  </a>
</li>
<li class="nav-item ">
  <a class="nav-link" href="{{ url('/leave/') }}">
    <i class="material-icons">content_paste</i>
    <p>ประวัติการลา</p>
  </a>
</li>
<li class="nav-item ">
  <a class="nav-link" href="{{ url('/lib') }}">
    <i class="material-icons">library_books</i>
    <p>จัดการข้อมูลพนักงาน</p>
  </a>
</li>
<li class="nav-item active ">
  <a class="nav-link" href="{{ url('/dep') }}">
    <i class="material-icons">bubble_chart</i>
    <p>จัดการข้อมูลฝ่าย</p>
  </a>
</li>
<li class="nav-item ">
  <a class="nav-link" href="{{ url('/pos') }}">
    <i class="material-icons">location_ons</i>
    <p>จัดการข้อมูลตำแหน่ง</p>
  </a>
</li>
<li class="nav-item ">
  <a class="nav-link" href="#">
    <i class="material-icons">notifications</i>
    <p>Notifications</p>
  </a>
</li>
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
