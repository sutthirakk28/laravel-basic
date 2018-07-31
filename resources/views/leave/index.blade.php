@extends('layouts/main')
@section('title')
ข้อมูลประวัติการลา
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

  @endphp
	<h1 class="elegantshadow">ประวัติการลา</h1>
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

	<table id="leave" class="table table-striped table-bordered nowrap" style="width:100%">
		<thead class="thead">
			<tr>
        <th width="5">ID</th>
				<th width="100">วันที่ยื่น</th>
				<th >รูป</th>
        <th >ชื่อ-นามสกุล</th>
        <th >ประเภท</th>
				<th >วันที่ลา</th>
        <th >จำนวน</th>
        <th >เหตุผล</th>
        <th >หลักฐานการลา</th>
        <th >อนุมัติโดย</th>
				<th width="300">Action</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($leave as $l)
			<tr >
        <td >{{ $l['id']}}</td>
				<td class="center">{{ thai_date(strtotime($l['date_leave'])) }}</td>
				<td>
					{{ Html::image('images/'.$l['user_photo'], '', array('class' => 'image')) }}
				</td>
        <td>{{ $l['surname'].'/'.$l['nickname']}}</td>
        <td>
         @if ($l['type_leave'] == 1)
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
            $nstart_day=explode("T",$l['nstart_day']);
            $nend_day=explode("T",$l['nend_day']);

          @endphp

          @if ($nstart_day[0] == $nend_day[0])
            {{ thai_date(strtotime($nstart_day[0]))}}
          {{ '('.$nstart_day[1].'-'.$nend_day[1].')'}}
          @else
            {{ thai_date(strtotime($nstart_day[0])).'('.$nstart_day[1].')' }}<br>
  					ถึง<br>
  					{{ thai_date(strtotime($nend_day[0])).'('.$nend_day[1].')' }}
          @endif
				</td>
        <td>
          @php
            $stop_date = date('Y-m-d', strtotime($l['dend_leave'] . ' +1 day'));
            //$num_day1 = strtotime($l['dstart_leave'] . ' +1 day');
            $num_day = getDate1($stop_date,$l['dstart_leave']);
          @endphp
          {{ $num_day.' วัน' }}
        </td>
        <td>
          {{ $l['reason_leave'] }}
        </td>
        <td>
          @php
            $proof_leave=explode(",",$l['proof_leave']);
          @endphp
          @foreach($proof_leave as $p)
            @if($p == 1)
              ใบรับรองแพทย์
            @endif
            @if($p == 2)
              ใบติดต่อราชการ
            @endif
            @if($p == 3)
              ตารางสอบ/เรียน
            @endif
            @if($p == 4)
              หลักฐานอื่นๆ
            @endif
            @if($p=='')
              ไม่มีหลักฐาน
            @endif
          @endforeach
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
					{{ Form::open(['route' => ['leave.destroy',$l['id'], 'method' => 'DELETE'] ]) }}
					<input type="hidden" name="_method" value="delete"/>
					{{ Html::link('leave/create','Add', array(	'class' => 'btn btn-primary thead')) }}
					{{ Html::link('leave/'.$l['id'], 'View', array('class' => 'btn btn-success')) }}
					{{ Html::link('leave/'.$id=$l['id'].'/edit','Edit', array('class' => 'btn btn-warning')) }}
					{{ Form::submit('Delete',array('class' => 'btn btn-danger','onclick'=>"return confirm('คำเตือน! เมื่อลบฝ่ายข้อมูลอาจเกิดข้อมผิดพลาดได้ ควรปรับเป็นการแก้ไขดีกว่า ?')" )) }}
					{{ Form::close()}}
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
@endsection
