@extends('layouts/main')
@section('title')
ระบบลางานออนไลน์
@endsection
@section('content')
<!-- <h1 class="elegantshadow">
	ระบบลางานออนไลน์ บ.ทีพีเอ็ม 1980 จำกัด 
	</h1> -->
	<div class="panel panel-primary div1">
		<div class="panel-heading">
				แบบฟอร์มลางานของพนักงาน
		</div>
	{{ Form::open(['url' => 'leave']) }}
        <div class="wrapper">

        <div class="element">
            <h2>ประเภทการลา</h2>
            <div class="el-child-inline">
                <div class="ui-checkbox bg-crimson ui-medium ui-animation-flip round">
                    <input type="radio" id="Notes" name="medical">
                    <span class="ui-custom">
                        <span class="ui-checked"><i class="fas fa-notes-medical"></i></span>
                        <span class="ui-unchecked" style="color: #CCC;"><i class="fas fa-notes-medical"></i></span>
                    </span>
                </div>
                <label for="Notes">ลากิจ</label>
            </div>
            <div class="el-child-inline">
                <div class="ui-checkbox bg-crimson ui-medium ui-animation-rotate round">
                    <input type="radio" id="doctor" name="medical">
                    <span class="ui-custom">
                        <span class="ui-checked"><i class="fas fa-user-md"></i></span>
                        <span class="ui-unchecked" style="color: #CCC;"><i class="fas fa-user-md"></i></span>
                    </span>
                </div>
                <label for="doctor">ลาป่วย</label>
            </div>
            <div class="el-child-inline">
                <div class="ui-checkbox bg-crimson ui-medium ui-animation-zoom round">
                    <input type="radio" id="stethoscope" name="medical">
                    <span class="ui-custom">
                        <span class="ui-checked"><i class="fas fa-stethoscope"></i></span>
                        <span class="ui-unchecked" style="color: #CCC;"><i class="fas fa-stethoscope"></i></span>
                    </span>
                </div>
                <label for="stethoscope">ลาราชการ</label>
            </div>
        </div>

        <div class="element">
            <h2>Medical [Single]</h2>
            <div class="el-child-inline">
                <div class="ui-checkbox bg-indigo ui-medium ui-animation-flip">
                    <input type="radio" id="hdd" name="computer">
                    <span class="ui-custom">
                        <span class="ui-checked"><i class="fas fa-hdd"></i></span>
                        <span class="ui-unchecked" style="color: #CCC;"><i class="fas fa-hdd"></i></span>
                    </span>
                </div>
                <label for="hdd">HDD</label>
            </div>
            <div class="el-child-inline">
                <div class="ui-checkbox bg-indigo ui-medium ui-animation-rotate">
                    <input type="radio" id="mobile" name="computer">
                    <span class="ui-custom">
                        <span class="ui-checked"><i class="fas fa-mobile"></i></span>
                        <span class="ui-unchecked" style="color: #CCC;"><i class="fas fa-mobile"></i></span>
                    </span>
                </div>
                <label for="mobile">Mobile</label>
            </div>
            <div class="el-child-inline">
                <div class="ui-checkbox bg-indigo ui-medium ui-animation-zoom">
                    <input type="radio" id="laptop" name="computer">
                    <span class="ui-custom">
                        <span class="ui-checked"><i class="fas fa-laptop"></i></span>
                        <span class="ui-unchecked" style="color: #CCC;"><i class="fas fa-laptop"></i></span>
                    </span>
                </div>
                <label for="laptop">Laptop</label>
            </div>
        </div>

        <div class="element">
            <h2>Different Icon For Radio Button</h2>
            <div class="el-child-inline">
                <div class="ui-checkbox bg-dodgerblue ui-medium ui-animation-zoom round">
                    <input type="radio" id="male" name="gender">
                    <span class="ui-custom">
                        <span class="ui-checked"><i class="fas fa-male"></i></span>
                    </span>
                </div>
                <label for="male">Male</label>
            </div>
            <div class="el-child-inline">
                <div class="ui-checkbox bg-dodgerblue ui-medium ui-animation-zoom round">
                    <input type="radio" id="female" name="gender">
                    <span class="ui-custom">
                        <span class="ui-checked"><i class="fas fa-female"></i></span>
                    </span>
                </div>
                <label for="female">Female</label>
            </div>
        </div>

        <div class="element">
            <h2>Your Favourite Framework</h2>
            <div class="el-child-inline">
                <div class="ui-checkbox bg-crimson ui-medium ui-animation-flip round">
                    <input type="radio" id="Angular" name="framework">
                    <span class="ui-custom">
                        <span class="ui-checked"><i class="fab fa-angular"></i></span>
                    </span>
                </div>
                <label for="Angular">Angular</label>
            </div>
            <div class="el-child-inline">
                <div class="ui-checkbox bg-dodgerblue ui-medium ui-animation-rotate round">
                    <input type="radio" id="React" name="framework">
                    <span class="ui-custom">
                        <span class="ui-checked"><i class="fab fa-react"></i></span>
                    </span>
                </div>
                <label for="React">React</label>
            </div>
            <div class="el-child-inline">
                <div class="ui-checkbox bg-magenta ui-medium ui-animation-zoom round">
                    <input type="radio" id="Vuejs" name="framework">
                    <span class="ui-custom">
                        <span class="ui-checked"><i class="fab fa-vuejs"></i></span>
                    </span>
                </div>
                <label for="Vuejs">Vuejs</label>
            </div>
        </div>

        <div class="element">
            <h2>Mode of Transport</h2>
            <div class="el-child-inline">
                <div class="ui-checkbox bg-cadetblue ui-large ui-animation-rotate">
                    <input type="checkbox" id="car" name="car">
                    <span class="ui-custom">
                        <span class="ui-checked"><i class="fas fa-car"></i></span>
                        <span class="ui-unchecked" style='color: #CCC;'><i class="fas fa-car"></i></span>
                    </span>
                </div>
                <label for="car">Car</label>
            </div>
            <div class="el-child-inline">
                <div class="ui-checkbox bg-cadetblue ui-large ui-animation-zoom">
                    <input type="checkbox" id="bicycle" name="Bicycle">
                    <span class="ui-custom">
                        <span class="ui-checked"><i class="fas fa-bicycle"></i></span>
                        <span class="ui-unchecked" style='color: #CCC;'><i class="fas fa-bicycle"></i></span>
                    </span>
                </div>
                <label for="bicycle">Bicycle</label>
            </div>
            <div class="el-child-inline">
                <div class="ui-checkbox bg-cadetblue ui-large ui-animation-flip">
                    <input type="checkbox" id="bus" name="bus">
                    <span class="ui-custom">
                        <span class="ui-checked"><i class="fas fa-bus"></i></span>
                        <span class="ui-unchecked" style='color: #CCC;'><i class="fas fa-bus"></i></span>
                    </span>
                </div>
                <label for="bus">Bus</label>
            </div>
        </div>

        <div class="element">
            <h2>Select The Developer [ Single & Multiple ]</h2>
            <div class="el-child-inline">
                <div class="ui-checkbox bg-dodgerblue ui-small ui-animation-zoom round">
                    <input type="radio" id="Karim2" name="developer2"><span data-checked="&#10004;" />
                </div>
                <label for="Karim2">Karim Khan</label>
            </div>
            <div class="el-child-inline">
                <div class="ui-checkbox bg-dodgerblue ui-small ui-animation-zoom round">
                    <input type="radio" id="Ayaan2" name="developer2"><span data-checked="&#10004;" />
                </div>
                <label for="Ayaan2">Ayaan Khan</label>
            </div>
            <div class="el-child-inline">
                <div class="ui-checkbox bg-dodgerblue ui-small ui-animation-zoom round">
                    <input type="radio" id="Zoya2" name="developer2"><span data-checked="&#10004;" />
                </div>
                <label for="Zoya2">Zoya Khan</label>
            </div>
            <div class="el-child-inline">
                <div class="ui-checkbox bg-dodgerblue ui-small ui-animation-zoom round">
                    <input type="radio" id="Seema2" name="developer2"><span data-checked="&#10004;" />
                </div>
                <label for="Seema2">Seema Khan</label>
            </div>

            <br /><br />

            <div class="el-child-inline">
                <div class="ui-checkbox bg-limegreen ui-small ui-animation-zoom">
                    <input type="checkbox" id="Karim" name="developer"><span data-checked="&#10004;" />
                </div>
                <label for="Karim">Karim Khan</label>
            </div>
            <div class="el-child-inline">
                <div class="ui-checkbox bg-limegreen ui-small ui-animation-zoom">
                    <input type="checkbox" id="Ayaan" name="developer"><span data-checked="&#10004;" />
                </div>
                <label for="Ayaan">Ayaan Khan</label>
            </div>
            <div class="el-child-inline">
                <div class="ui-checkbox bg-limegreen ui-small ui-animation-zoom">
                    <input type="checkbox" id="Zoya" name="developer"><span data-checked="&#10004;" />
                </div>
                <label for="Zoya">Zoya Khan</label>
            </div>
            <div class="el-child-inline">
                <div class="ui-checkbox bg-limegreen ui-small ui-animation-zoom">
                    <input type="checkbox" id="Seema" name="developer"><span data-checked="&#10004;" />
                </div>
                <label for="Seema">Seema Khan</label>
            </div>
        </div>

    </div>
    <div class="panel-body">
            @if(count($errors) > 0 )
                <div class=" alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="row">
                <div class="col-xs-2">
                    {{ form::label('id_dep','รหัสฝ่าย') }}
                </div>
                <div class="col-xs-5">
                        {{ form::text('id_dep', 'อัตโนมัติ', ['class' => 'form-control', 'readonly' => 'true']) }}
                </div>
            </div>
        </div>
        <div class="panel-body">
            
            <div class="row">
                <div class="col-xs-2">
                    {{ form::label('name_dep','ชื่อฝ่าย') }}
                </div>
                <div class="col-xs-5">
                        {{ form::text('name_dep','', ['class' => 'form-control']) }}
                </div>
            </div>
        </div>
    <div class="panel-body">
            <div class="row">
                <div class="col-xs-5">
                    {{ form::submit('Save',['class' => 'btn btn-primary'] ) }}
                </div>
            </div>
        </div>
	{{ Form::close() }} 
	</div>





@endsection