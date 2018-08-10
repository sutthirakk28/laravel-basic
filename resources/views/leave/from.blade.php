@extends('layouts.tpm')

@section('css')

@endsection

@section('content-header')
<div id="content-header">
    <div id="breadcrumb">
        <a href="{{ url('/leave') }}" title="กลับไปข้อมูลการลางาน" class="tip-bottom">
            <i class="icon-book"></i> ข้อมูลการลางาน</a>
        <a href="#">แบบฟอร์มแก้ไขลางานของพนักงาน</a>
    </div>
</div> 
@endsection

@section('content')
	@foreach($leave as $l)
	<div class="panel panel-primary div1">
    {{ Form::open(['method' => 'put','route' =>['leave.update', $l['id']]]) }}
        <div class="wrapper f_th1">
            @if(count($errors) > 0 )
                <div class=" alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="element">
                <h2>*เลือกชื่อพนักงาน</h2>
                <div class="el-child-inline width">
                    <select name="id_per" id="id_per" class="selectpicker show-tick select" data-live-search="true" required>                
	                    @foreach($lib as $libs)
						  	@if($libs['id'] == $l['id_per'])
						  		<option value="{{ $libs['id'] }}" selected>{{ $libs['surname'] }}/{{ $libs['nickname'] }}</option>
						  	@else
						  		<option value="{{ $libs['id'] }}">{{ $libs['surname'] }}/{{ $libs['nickname'] }}</option>
						  	@endif					    
					  	@endforeach
                    </select>
                </div>
            </div>
            <div class="element">
                <h2>*ประเภทการลา</h2>                
                @if($l['type_leave'] == 1)
                	<div class="el-child-inline">
                		<div class="ui-checkbox bg-dodgerblue ui-small ui-animation-zoom round">
                			<input type="radio" name="type_leave" value="1" checked>
                			<span data-checked="&#10004;" />
	                    </div>
	                    <label for="Karim2">ลาคลอด</label>
	                </div>
                @else
                	<div class="el-child-inline">
                		<div class="ui-checkbox bg-dodgerblue ui-small ui-animation-zoom round">
                			<input type="radio" name="type_leave" value="1">
                			<span data-checked="&#10004;" />
	                    </div>
	                    <label for="Karim2">ลาคลอด</label>
	                </div>
                @endif

                @if($l['type_leave'] == 2)
                	<div class="el-child-inline">
	                    <div class="ui-checkbox bg-dodgerblue ui-small ui-animation-zoom round">
	                        <input type="radio" name="type_leave" value="2" checked><span data-checked="&#10004;" />
	                    </div>
	                    <label for="Ayaan2">ลาป่วย</label>
	                </div>
                @else
                	<div class="el-child-inline">
	                    <div class="ui-checkbox bg-dodgerblue ui-small ui-animation-zoom round">
	                        <input type="radio" name="type_leave" value="2" ><span data-checked="&#10004;" />
	                    </div>
	                    <label for="Ayaan2">ลาป่วย</label>
	                </div>
                @endif

                @if($l['type_leave'] == 3)
                	<div class="el-child-inline">
	                    <div class="ui-checkbox bg-dodgerblue ui-small ui-animation-zoom round">
	                        <input type="radio" name="type_leave" value="3" checked><span data-checked="&#10004;" />
	                    </div>
	                    <label for="Zoya2">ลากิจ</label>
	                </div>
                @else
                	<div class="el-child-inline">
	                    <div class="ui-checkbox bg-dodgerblue ui-small ui-animation-zoom round">
	                        <input type="radio" name="type_leave" value="3" ><span data-checked="&#10004;" />
	                    </div>
	                    <label for="Zoya2">ลากิจ</label>
	                </div>
                @endif

                @if($l['type_leave'] == 4)
                	<div class="el-child-inline">
	                    <div class="ui-checkbox bg-dodgerblue ui-small ui-animation-zoom round">
	                        <input type="radio" name="type_leave" value="4" checked><span data-checked="&#10004;" />
	                    </div>
	                    <label for="Seema2">ลากิจ-ราชการ</label>
	                </div>
                @else
                	<div class="el-child-inline">
	                    <div class="ui-checkbox bg-dodgerblue ui-small ui-animation-zoom round">
	                        <input type="radio" name="type_leave" value="4" ><span data-checked="&#10004;" />
	                    </div>
	                    <label for="Seema2">ลากิจ-ราชการ</label>
	                </div>
                @endif                       
            </div>
            <div class="element">
                <h2>*วันที่ยื่น</h2>
                <div class="form-group">
                    <div class='input-group'>
                        {{ form::date('date_leave',$l['date_leave'],array('required' => 'required','class' => 'form-control')) }}
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>
                </div>
            </div>
            <div class="element">
                <h2>เหตุผลการลา</h2>
                {{ form::textarea('reason_leave',$l['reason_leave'], ['class' => 'form-control']) }}
            </div>
            <div class="element">
                <h2 class="h2">วันที่ลา</h2>
                <div class="row">

                    <div class="col-xs-12">
                       <strong class="font1">*เริ่มต้น</strong>
                        <input id="nstart_day" type="datetime-local" name="nstart_day" value="{{$l['nstart_day']}}" class="form-control" required>
                        <strong>-  ถึง  -</strong>
                        <strong class="font1">*สิ้นสุด</strong>
                        <input id="nend_day" type="datetime-local" name="nend_day" value="{{$l['nend_day']}}" class="form-control" required>
                    </div>
                </div>
				<div class="alert alert-danger day">
				  <strong>คำเตือน !</strong> ช่วงเวลาทำการของ บริษัท ทีพีเอ็ม(1980) จำกัด : <span class="day1">จันทร์-เสาร์ เวลา 08:30น. - 17:30น.</sapn>
				</div>
            </div>
            <div class="element">
                <h2>หลักฐานการลา</h2>
	        @php
	          $proof_leave=explode(",",$l['proof_leave']);
	          $t1_1=0; $t1_2=0; $t2_1=0; $t2_2=0; $t3_1=0; $t3_2=0; $t4_1=0; $t4_2=0;
	        @endphp
            @foreach($proof_leave as $proof)
            	@if($proof == 1) @php $t1_1 = $proof; @endphp @else @php $t1_2 = $proof; @endphp @endif
            	@if($proof == 2) @php $t2_1 = $proof; @endphp @else @php $t2_2 = $proof; @endphp @endif
            	@if($proof == 3) @php $t3_1 = $proof; @endphp @else @php $t3_2 = $proof; @endphp @endif
            	@if($proof == 4) @php $t4_1 = $proof; @endphp @else @php $t4_2 = $proof; @endphp @endif
            @endforeach	               

                
            @if($t1_1 == 1)
            <div class="el-child-inline">
                <div class="ui-checkbox bg-limegreen ui-small ui-animation-zoom">
                    <input type="checkbox" id="proof_leave1" name="proof_leave[]" value="1" checked><span data-checked="&#10004;" />
                </div>
                <label for="Karim">ใบรับรองแพทย์</label>
            </div>
            @elseif($t1_1 == 0)
            <div class="el-child-inline">
                <div class="ui-checkbox bg-limegreen ui-small ui-animation-zoom">
                    <input type="checkbox" id="proof_leave1" name="proof_leave[]" value="1"><span data-checked="&#10004;" />
                </div>
                <label for="Karim">ใบรับรองแพทย์</label>
            </div>
            @endif

            @if($t2_1 == 2)
            <div class="el-child-inline">
                <div class="ui-checkbox bg-limegreen ui-small ui-animation-zoom">
                    <input type="checkbox" id="proof_leave2" name="proof_leave[]" value="2" checked><span data-checked="&#10004;" />
                </div>
                <label for="Ayaan">ใบติดต่อราชการ</label>
            </div>
            @elseif($t2_1 == 0)
            <div class="el-child-inline">
                <div class="ui-checkbox bg-limegreen ui-small ui-animation-zoom">
                    <input type="checkbox" id="proof_leave2" name="proof_leave[]" value="2"><span data-checked="&#10004;" />
                </div>
                <label for="Ayaan">ใบติดต่อราชการ</label>
            </div>
            @endif

            @if($t3_1 == 3)
        	<div class="el-child-inline">
                <div class="ui-checkbox bg-limegreen ui-small ui-animation-zoom">
                    <input type="checkbox" id="proof_leave3" name="proof_leave[]" value="3" checked><span data-checked="&#10004;" />
                </div>
                <label for="Zoya">ตารางสอบ/เรียน</label>
            </div>
            @elseif($t3_1 == 0)
            <div class="el-child-inline">
                <div class="ui-checkbox bg-limegreen ui-small ui-animation-zoom">
                    <input type="checkbox" id="proof_leave3" name="proof_leave[]" value="3"><span data-checked="&#10004;" />
                </div>
                <label for="Zoya">ตารางสอบ/เรียน</label>
            </div>
            @endif

            @if($t4_1== 4)
        	<div class="el-child-inline">
                <div class="ui-checkbox bg-limegreen ui-small ui-animation-zoom">
                    <input type="checkbox" id="proof_leave4" name="proof_leave[]" value="4" checked><span data-checked="&#10004;" />
                </div>
                <label for="Seema">หลักฐานอื่นๆ</label>
            </div>
            @elseif($t4_1 == 0)
            <div class="el-child-inline">
                <div class="ui-checkbox bg-limegreen ui-small ui-animation-zoom">
                    <input type="checkbox" id="proof_leave4" name="proof_leave[]" value="4"><span data-checked="&#10004;" />
                </div>
                <label for="Seema">หลักฐานอื่นๆ</label>
            </div>
            @endif

		   </div>

            <div class="element">
                <h2>*อนุมัติโดย</h2>
                @if($l['approved'] == '1')
                <div class="el-child-inline">
                    <div class="ui-checkbox bg-dodgerblue ui-small ui-animation-zoom round">
                        <input type="radio" name="approved" value="1" checked><span data-checked="&#10004;" />
                    </div>
                    <label for="Karim2">ประธานบริษัท</label>
                </div>
	            @else
                <div class="el-child-inline">
                    <div class="ui-checkbox bg-dodgerblue ui-small ui-animation-zoom round">
                        <input type="radio" name="approved" value="1" ><span data-checked="&#10004;" />
                    </div>
                    <label for="Karim2">ประธานบริษัท</label>
                </div>
	            @endif

	            @if($l['approved'] == '2')
                <div class="el-child-inline">
                    <div class="ui-checkbox bg-dodgerblue ui-small ui-animation-zoom round">
                        <input type="radio" name="approved" value="2" checked><span data-checked="&#10004;" />
                    </div>
                    <label for="Ayaan2">กรรมการผู้จัดการ</label>
                </div>
	            @else
                <div class="el-child-inline">
                    <div class="ui-checkbox bg-dodgerblue ui-small ui-animation-zoom round">
                        <input type="radio" name="approved" value="2"><span data-checked="&#10004;" />
                    </div>
                    <label for="Ayaan2">กรรมการผู้จัดการ</label>
                </div>
	            @endif

	            @if($l['approved'] == '3')
                <div class="el-child-inline">
                    <div class="ui-checkbox bg-dodgerblue ui-small ui-animation-zoom round">
                        <input type="radio" name="approved" value="3" checked><span data-checked="&#10004;" />
                    </div>
                    <label for="Zoya2">เจ้าหน้าที่ฝ่ายบุคคล</label>
                </div>
	            @else
                <div class="el-child-inline">
                    <div class="ui-checkbox bg-dodgerblue ui-small ui-animation-zoom round">
                        <input type="radio" name="approved" value="3"><span data-checked="&#10004;" />
                    </div>
                    <label for="Zoya2">เจ้าหน้าที่ฝ่ายบุคคล</label>
                </div>
	            @endif

	            @if($l['approved'] == '4')
                <div class="el-child-inline">
                    <div class="ui-checkbox bg-dodgerblue ui-small ui-animation-zoom round">
                        <input type="radio" name="approved" value="4" checked><span data-checked="&#10004;" />
                    </div>
                    <label for="Seema2">หัวหน้าฝ่าย</label>
                </div>
	            @else
                <div class="el-child-inline">
                    <div class="ui-checkbox bg-dodgerblue ui-small ui-animation-zoom round">
                        <input type="radio" name="approved" value="4"><span data-checked="&#10004;" />
                    </div>
                    <label for="Seema2">หัวหน้าฝ่าย</label>
                </div>
	            @endif              
            </div>
        </div>
    <div class="panel-body patding">
        <div class="row">
            <div class="col-xs-5">
                {{ form::submit('แก้ไขคำร้อง',['class' => 'btn btn-primary b1'] ) }}
            </div>
        </div>
    </div>
	{{ Form::close() }}
	</div>
	@endforeach
@endsection

@section('js')

@endsection
