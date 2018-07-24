@extends('layouts/main')
@section('title')
ระบบลางานออนไลน์
@endsection
@section('content')
	<div class="panel panel-primary div1">
		<div class="panel-heading">
				แบบฟอร์มลางานของพนักงาน
		</div> 
    {{ Form::open(['method' => 'post','route' =>['leave.store']]) }}
        <div class="wrapper">
            <div class="element">
                <h2>เลือกชื่อพนักงาน</h2>
                <div class="el-child-inline width">
                    <select name="id_per" id="id_per" class="selectpicker show-tick select" data-live-search="true">
                        <option value="" selected disabled>เลือกชื่อพนักงาน</option>
                      @foreach($lib as $l)
                        <option data-tokens="{{ $l['surname'] }}" value="{{ $l['id'] }}">{{ $l['surname'] }}</option>
                      @endforeach
                    </select>
                </div>
            </div>
            <div class="element">
                <h2>ประเภทการลา</h2>
                <div class="el-child-inline">
                    <div class="ui-checkbox bg-crimson ui-medium ui-animation-flip round">
                        <input type="radio" id="type_leave" name="type_leave" value="1">
                        <span class="ui-custom">
                            <span class="ui-checked"><i class="fas fa-user-md"></i></span>
                            <span class="ui-unchecked" style="color: #CCC;"><i class="fas fa-user-md"></i></span>
                        </span>
                    </div>
                    <label for="Notes">ลาคลอด</label>
                </div>
                <div class="el-child-inline">
                    <div class="ui-checkbox bg-crimson ui-medium ui-animation-rotate round">
                        <input type="radio" id="type_leave" name="type_leave" value="2">
                        <span class="ui-custom">
                            <span class="ui-checked"><i class="fas fa-procedures"></i></span>
                            <span class="ui-unchecked" style="color: #CCC;"><i class="fas fa-procedures"></i></span>
                        </span>
                    </div>
                    <label for="doctor">ลาป่วย</label>
                </div>
                <div class="el-child-inline">
                    <div class="ui-checkbox bg-crimson ui-medium ui-animation-zoom round">
                        <input type="radio" id="type_leave" name="type_leave" value="3">
                        <span class="ui-custom">
                            <span class="ui-checked"><i class="fas fa-user-lock"></i></span>
                            <span class="ui-unchecked" style="color: #CCC;"><i class="fas fa-user-lock"></i></span>
                        </span>
                    </div>
                    <label for="stethoscope">ลากิจ</label>
                </div>
                <div class="el-child-inline">
                    <div class="ui-checkbox bg-crimson ui-medium ui-animation-zoom round">
                        <input type="radio" id="type_leave" name="type_leave" value="4">
                        <span class="ui-custom">
                            <span class="ui-checked"><i class="fas fa-user-tie"></i></span>
                            <span class="ui-unchecked" style="color: #CCC;"><i class="fas fa-user-tie"></i></span>
                        </span>
                    </div>
                    <label for="stethoscope">ลากิจ-ราชการ</label>
                </div>
            </div>

            <div class="element">
                <h2>วันที่ยื่น</h2>
                <div class="form-group">
                    <div class='input-group'>
                        {{ form::date('date_leave','', ['class' => 'form-control']) }}
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>                
                </div>
            </div>
            <div class="element">
                <h2>เหตุผลการลา</h2>
                {{ form::textarea('reason_leave','', ['class' => 'form-control']) }}
            </div>
            <div class="element">
                <h2 class="h2">วันที่ลา</h2>
                <div class="row">
                    <div class="col-xs-5">
                        {{ form::date('dstart_leave','', ['class' => 'form-control']) }}
                    </div>
                    <div class="col-xs-2">
                       <div class="input-group-addon">ถึง</div>
                    </div>
                    <div class="col-xs-5">
                        {{ form::date('dend_leave','', ['class' => 'form-control']) }}
                    </div>
                </div>
            </div>
            <div class="element">
                <h2>หลักฐานการลา</h2>
                <div class="el-child-inline">
                    <div class="ui-checkbox bg-limegreen ui-small ui-animation-zoom">
                        <input type="checkbox" id="proof_leave1" name="proof_leave[]" value="1"><span data-checked="&#10004;" />
                    </div>
                    <label for="Karim">ใบรับรองแพทย์</label>
                </div>
                <div class="el-child-inline">
                    <div class="ui-checkbox bg-limegreen ui-small ui-animation-zoom">
                        <input type="checkbox" id="proof_leave2" name="proof_leave[]" value="2"><span data-checked="&#10004;" />
                    </div>
                    <label for="Ayaan">ใบติดต่อราชการ</label>
                </div>
                <div class="el-child-inline">
                    <div class="ui-checkbox bg-limegreen ui-small ui-animation-zoom">
                        <input type="checkbox" id="proof_leave3" name="proof_leave[]" value="3"><span data-checked="&#10004;" />
                    </div>
                    <label for="Zoya">ตารางสอบ/เรียน</label>
                </div>
                <div class="el-child-inline">
                    <div class="ui-checkbox bg-limegreen ui-small ui-animation-zoom">
                        <input type="checkbox" id="proof_leave4" name="proof_leave[]" value="4"><span data-checked="&#10004;" />
                    </div>
                    <label for="Seema">หลักฐานอื่นๆ</label>
                </div>
            </div>
            <div class="element">
                <h2>อนุมัติโดย</h2>
                <div class="el-child-inline">
                    <div class="ui-checkbox bg-dodgerblue ui-small ui-animation-zoom round">
                        {{ form::radio('approved','1') }}<span data-checked="&#10004;" />
                    </div>
                    <label for="Karim2">ประธานบริษัท</label>
                </div>
                <div class="el-child-inline">
                    <div class="ui-checkbox bg-dodgerblue ui-small ui-animation-zoom round">
                        {{ form::radio('approved','2') }}<span data-checked="&#10004;" />
                    </div>
                    <label for="Ayaan2">กรรมการผู้จัดการ</label>
                </div>
                <div class="el-child-inline">
                    <div class="ui-checkbox bg-dodgerblue ui-small ui-animation-zoom round">
                        {{ form::radio('approved','3') }}<span data-checked="&#10004;" />
                    </div>
                    <label for="Zoya2">เจ้าหน้าที่ฝ่ายบุคคล</label>
                </div>
                <div class="el-child-inline">
                    <div class="ui-checkbox bg-dodgerblue ui-small ui-animation-zoom round">
                        {{ form::radio('approved','4') }}<span data-checked="&#10004;" />
                    </div>
                    <label for="Seema2">หัวหน้าฝ่าย</label>
                </div>
            </div>       
        </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-xs-5">
                {{ form::submit('บันทึกคำร้อง',['class' => 'btn btn-primary'] ) }}
            </div>
        </div>
    </div>    
	{{ Form::close() }} 
</div>
@endsection