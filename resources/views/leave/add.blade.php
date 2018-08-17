@extends('layouts.tpm')

@section('css')

@endsection

@section('content-header')
<div id="content-header">
    <div id="breadcrumb">
        <a href="{{ url('/leave') }}" title="กลับไปข้อมูลพนักงาน" class="tip-bottom">
            <i class="icon-book"></i> ข้อมูลการลางาน</a>
        <a href="#">แบบฟอร์มลางานของพนักงาน</a>
    </div>
</div> 
@endsection

@section('content')
	<div class="panel panel-primary div1">
    {{ Form::open(['method' => 'post','route' =>['leave.store']]) }}
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
                    <select name="id_per" id="id_per" class="selectpicker show-tick select" data-live-search="true" data-dependent="id_person" required>
                        <option value="" selected disabled>เลือกชื่อพนักงาน</option>
                      @foreach($lib as $l)
                        <option data-tokens="{{ $l['surname'] }}{{ $l['nickname'] }}" value="{{ $l['id'] }}">{{ $l['surname'] }}/{{ $l['nickname'] }}</option>
                      @endforeach
                    </select>
                </div>
            </div>
            <div class="element">
                <h2>*ประเภทการลา</h2>
                <div class="el-child-inline">
                    <div class="ui-checkbox bg-dodgerblue ui-small ui-animation-zoom round">
                        <input type="radio" name="type_leave" value="0" required><span data-checked="&#10004;" />
                    </div>
                    <label for="Karim2">ลาบวช-ทำหมัน</label>
                </div>
                <div class="el-child-inline">
                    <div class="ui-checkbox bg-dodgerblue ui-small ui-animation-zoom round">
                        <input type="radio" name="type_leave" value="1" required><span data-checked="&#10004;" />
                    </div>
                    <label for="Karim2">ลาคลอด</label>
                </div>
                <div class="el-child-inline">
                    <div class="ui-checkbox bg-dodgerblue ui-small ui-animation-zoom round">
                        <input type="radio" name="type_leave" value="2" ><span data-checked="&#10004;" />
                    </div>
                    <label for="Ayaan2">ลาป่วย</label>
                </div>
                <div class="el-child-inline">
                    <div class="ui-checkbox bg-dodgerblue ui-small ui-animation-zoom round">
                        <input type="radio" name="type_leave" value="3" ><span data-checked="&#10004;" />
                    </div>
                    <label for="Zoya2">ลากิจ</label>
                </div>
                <div class="el-child-inline">
                    <div class="ui-checkbox bg-dodgerblue ui-small ui-animation-zoom round">
                        <input type="radio" name="type_leave" value="4" ><span data-checked="&#10004;" />
                    </div>
                    <label for="Seema2">พักร้อน</label>
                </div>
            </div>
            <div class="element">
                <h2 class="underline">สิทธิการลา <span id="span-name"></span></h2>
                <span class="black">รวม</span> <span class="badge badge-info">102</span>
                <span class="orange">ลาบวช-ทำหมัน</span> <span class="badge badge-warning">20</span>
                <span class="yellow">ลาคลอด</span> <span class="badge badge-success">3</span>
                <span class="red">ลาป่วย</span> <span class="badge badge-success">90</span>
                <span class="blue">ลากิจ</span> <span class="badge badge-warning">55</span>
                <span class="black">พักร้อน</span> <span class="badge badge-warning">12</span>
                <div class="alert alert-error leave"><strong>  ชี้แจง ! <span class="badge badge-success"> ? </span> = ใช้สิทธิลา <span class="badge badge-warning"> ? </span> = ครบสิทธิลา <span class="badge badge-important"> ? </span> = หักเงิน *(ลาบวช-ทำหมัน 15วัน,ลาคลอด 90วัน,ลาป่วย 30วัน,ลากิจ 6วัน,พักร้อน 6วัน)</strong></div>    

            </div>
            <div class="element" id="e_textshow">
                <!-- <table border="1" style="text-align:center;color: #b624da;">
                    <thead>
                        <tr>
                            <th>รหัสพนักงาน</th>
                            <th>ประเภท</th>
                            <th>เริ่ม</th>
                            <th>สิ้นสุด</th>
                        </tr>   
                    </thead>
                    <tbody>

                    </tbody>
                    <tfoot>
                    </tfoot>
                </table> -->  
                <meta name="csrf-token" content="{{ csrf_token() }}">

                <h2>*ประเภทการลา</h2>
                <div class="el-child-inline">
                    <div class="ui-checkbox bg-dodgerblue ui-small ui-animation-zoom round" id="radio_0">
                        <input type="radio" name="type_leave2" value="0" title="*ใช้สิทธิการลา" required id="radio-0"><span data-checked="&#10004;" />
                    </div>
                    <label for="Karim2">ลาบวช-ทำหมัน</label>
                </div>
                <div class="el-child-inline">
                    <div class="ui-checkbox bg-dodgerblue ui-small ui-animation-zoom round" id="radio_1">
                        <input type="radio" name="type_leave2" value="1" title="*ใช้สิทธิการลา" id="radio-1"><span data-checked="&#10004;" />
                    </div>
                    <label for="Karim2">ลาคลอด</label>
                </div>
                <div class="el-child-inline">
                    <div class="ui-checkbox bg-dodgerblue ui-small ui-animation-zoom round" id="radio_2">
                        <input type="radio" name="type_leave2" value="2" title="*ใช้สิทธิการลา" id="radio-2"><span data-checked="&#10004;" />
                    </div>
                    <label for="Ayaan2">ลาป่วย</label>
                </div>
                <div class="el-child-inline">
                    <div class="ui-checkbox bg-dodgerblue ui-small ui-animation-zoom round" id="radio_3">
                        <input type="radio" name="type_leave2" value="3" title="*ใช้สิทธิการลา" id="radio-3"><span data-checked="&#10004;" />
                    </div>
                    <label for="Zoya2">ลากิจ</label>
                </div>
                <div class="el-child-inline">
                    <div class="ui-checkbox bg-dodgerblue ui-small ui-animation-zoom round" id="radio_4">
                        <input type="radio" name="type_leave2" value="4" title="*ใช้สิทธิการลา" id="radio-4"><span data-checked="&#10004;" />
                    </div>
                    <label for="Seema2">พักร้อน</label>
                </div>

            </div>    
            <div class="element">
                <h2>*วันที่ยื่น</h2>
                <div class="form-group">
                    <div class='input-group'>
                        {{ form::date('date_leave','',array('required' => 'required','class' => 'form-control')) }}
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

                    <div class="col-xs-12">
                       <strong class="font1">*เริ่มต้น</strong>
                        <input id="nstart_day" type="datetime-local" name="nstart_day" value="{{ $now1 }}T08:30" class="form-control" required>
                        <strong>-  ถึง  -</strong>
                        <strong class="font1">*สิ้นสุด</strong>
                        <input id="nend_day" type="datetime-local" name="nend_day" value="{{ $now1 }}T17:30" class="form-control" required>
                    </div>
                </div>
				<div class="alert alert-danger day">
				  <strong>คำเตือน !</strong> ช่วงเวลาทำการของ บริษัท ทีพีเอ็ม(1980) จำกัด : <span class="day1">จันทร์-เสาร์ เวลา 08:30น. - 17:30น.</sapn>
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
                <h2>*อนุมัติโดย</h2>
                <div class="el-child-inline">
                    <div class="ui-checkbox bg-dodgerblue ui-small ui-animation-zoom round">
                        <input type="radio" name="approved" value="1" required><span data-checked="&#10004;" />
                    </div>
                    <label for="Karim2">ประธานบริษัท</label>
                </div>
                <div class="el-child-inline">
                    <div class="ui-checkbox bg-dodgerblue ui-small ui-animation-zoom round">
                        <input type="radio" name="approved" value="2"><span data-checked="&#10004;" />
                    </div>
                    <label for="Ayaan2">กรรมการผู้จัดการ</label>
                </div>
                <div class="el-child-inline">
                    <div class="ui-checkbox bg-dodgerblue ui-small ui-animation-zoom round">
                        <input type="radio" name="approved" value="3"><span data-checked="&#10004;" />
                    </div>
                    <label for="Zoya2">เจ้าหน้าที่ฝ่ายบุคคล</label>
                </div>
                <div class="el-child-inline">
                    <div class="ui-checkbox bg-dodgerblue ui-small ui-animation-zoom round">
                        <input type="radio" name="approved" value="4"><span data-checked="&#10004;" />
                    </div>
                    <label for="Seema2">หัวหน้าฝ่าย</label>
                </div>
            </div>
        </div>
    <div class="panel-body patding">
        <div class="row">
            <div class="col-xs-5">
                {{ form::submit('บันทึกคำร้อง',['class' => 'btn btn-primary b1'] ) }}
            </div>
        </div>
    </div>
	{{ Form::close() }}
</div>

@endsection

@section('js')
<script type="text/javascript">
    $(document).ready(function(){
        $('#id_per').on('change',function(){
            var studentid = $(this).val();
            $('h2 span').text($('#id_per option:selected').text());
            console.log( $('#span-name').val());
            loadScore(studentid);
            
        })
    });

    //function ajax
    function loadScore(studentid)
    {   
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            type :'POST',
            url : "{{ url('/getDataScore') }}",
            data : {_token: CSRF_TOKEN,studentid:studentid},
            dataType : 'json',
            success : function(student)
            {    
                // $('tbody').empty();
                // $.each(student,function(index){
                    
                //     var row = $('<tr/>');
                //     row.append($('<td/>',{
                //         text : student[index].id_per,
                //     })).append($('<td/>',{
                //         text : student[index].type_leave,
                //     })).append($('<td/>',{
                //         text : student[index].nstart_day,
                //     })).append($('<td/>',{
                //         text : student[index].nend_day,
                //     }))
                    
                //     $('tbody').append(row); 
                // })
                if (student != 0) {
                    $('#radio_0,#radio_1,#radio_2,#radio_3,#radio_4').css({'border-color': 'dodgerblue','color' :'dodgerblue'});
                    // $('#radio_1').css({'border-color': 'dodgerblue','color' :'dodgerblue'});
                    // $('#radio_2').css({'border-color': 'dodgerblue','color' :'dodgerblue'});
                    // $('#radio_3').css({'border-color': 'dodgerblue','color' :'dodgerblue'});
                    // $('#radio_4').css({'border-color': 'dodgerblue','color' :'dodgerblue'});
                    
                } else {
                    $('#radio_0,#radio_1,#radio_2,#radio_3,#radio_4').css({'border-color': '#ec0510','color' :'#ec0510'});
                    // $('#radio_1').css({'border-color': '#ec0510','color' :'#ec0510'});
                    // $('#radio_2').css({'border-color': '#ec0510','color' :'#ec0510'});
                    // $('#radio_3').css({'border-color': '#ec0510','color' :'#ec0510'});
                    // $('#radio_4').css({'border-color': '#ec0510','color' :'#ec0510'});
                    $('#radio-4,#radio-1,#radio-2,#radio-3,#radio-4').attr('title', 'ครบสิทธิการลา(หักเงิน)');
                }
                               
            }
        })
    }
</script>
@endsection
