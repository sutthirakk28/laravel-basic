@extends('layouts.tpm')

@section('css')
<link rel="stylesheet" href="{{ asset('css/main/uniform.css') }}" />
<link rel="stylesheet" href="{{ asset('css/main/select2.css') }}" />
@endsection

@section('content-header')
<div id="content-header">
    <div id="breadcrumb">
        <a href="{{ url('/leave') }}" title="กลับไปข้อมูลการลางาน" class="tip-bottom">
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
                <h2><span class="request">*</span> วันที่ยื่น</h2>
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
                <h2><span class="request">*</span> เลือกชื่อพนักงาน</h2>
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
                <h2 class="underline">สิทธิการลา <span id="span-name"></span></h2>
                <span class="black">รวม</span> <span class="badge badge-info">0 วัน 0 ช. 0 น.</span>
                <span class="black">ลาบวช-ทำหมัน</span> <span class="badge badge-warning" id="time0">0 วัน 0 ช. 0 น.</span>
                <span class="black">ลาคลอด</span> <span class="badge badge-success" id="time1">0 วัน 0 ช. 0 น.</span>
                <span class="black">ลาป่วย</span> <span class="badge badge-success" id="time2">0 วัน 0 ช. 0 น.</span>
                <span class="black">ลากิจ</span> <span class="badge badge-warning" id="time3">0 วัน 0 ช. 0 น.</span>
                <span class="black">พักร้อน</span> <span class="badge badge-warning" id="time4">0 วัน 0 ช. 0 น.</span>
<!--                 <div class="alert alert-error leave"><strong>  ชี้แจง ! <span class="badge badge-success"> ? </span> = ใช้สิทธิลา <span class="badge badge-warning"> ? </span> = ครบสิทธิลา <span class="badge badge-important"> ? </span> = หักเงิน *(ลาบวช-ทำหมัน 15วัน,ลาคลอด 90วัน,ลาป่วย 30วัน,ลากิจ 6วัน,พักร้อน 6วัน)</strong></div>    
 -->
            </div>
            
            <div class="element">
                <h2 class="h2">วันที่ลา</h2>
                <div class="row">

                    <div class="col-xs-12">
                       <strong class="font1"><span class="request">*</span> เริ่มต้น</strong>
                        <input id="nstart_day" type="datetime-local" name="nstart_day" value="{{ $now1 }}T08:30" class="form-control" required>
                        <strong>-  ถึง  -</strong>
                        <strong class="font1"><span class="request">*</span> สิ้นสุด</strong>
                        <input id="nend_day" type="datetime-local" name="nend_day" value="{{ $now1 }}T17:30" class="form-control" required>
                    </div>
                </div>
				<div class="alert alert-danger day">
				  <strong>คำเตือน !</strong> ช่วงเวลาทำการของ บริษัท ทีพีเอ็ม(1980) จำกัด : <span class="day1">จันทร์-เสาร์ เวลา 08:30น. - 17:30น.</sapn>
				</div>
            </div>
             <div class="element">
                <h2>สถานะ</h2>
                <select name="status_leave" id="status_leave" class="selectpicker show-tick select">
                    <option value="0" selected >คำนวณตามระบบ</option>
                    <option value="1" >ไม่หักเงิน</option> 
                    <option value="2" >หักเงิน</option>                  
                </select>
            </div>
            <div class="element" id="e_textshow">
                <table border="1" style="text-align:center;color: #b624da;">
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
                </table>
                <div class="showdata" id="showdata">dddd</div>  
                <meta name="csrf-token" content="{{ csrf_token() }}">

                <h2><span class="request">*</span> ประเภทการลา</h2>
                <div class="el-child-inline">
                    <div class="ui-checkbox bg-dodgerblue ui-small ui-animation-zoom round" id="radio_0">
                        <input type="radio" name="type_leave" value="0" title="*ใช้สิทธิการลา" required id="radio-0"><span data-checked="&#10004;" />
                    </div>
                    <label for="Karim2">ลาบวช-ทำหมัน</label>
                </div>
                <div class="el-child-inline">
                    <div class="ui-checkbox bg-dodgerblue ui-small ui-animation-zoom round" id="radio_1">
                        <input type="radio" name="type_leave" value="1" title="*ใช้สิทธิการลา" id="radio-1"><span data-checked="&#10004;" />
                    </div>
                    <label for="Karim2">ลาคลอด</label>
                </div>
                <div class="el-child-inline">
                    <div class="ui-checkbox bg-dodgerblue ui-small ui-animation-zoom round" id="radio_2">
                        <input type="radio" name="type_leave" value="2" title="*ใช้สิทธิการลา" id="radio-2"><span data-checked="&#10004;" />
                    </div>
                    <label for="Ayaan2">ลาป่วย</label>
                </div>
                <div class="el-child-inline">
                    <div class="ui-checkbox bg-dodgerblue ui-small ui-animation-zoom round" id="radio_3">
                        <input type="radio" name="type_leave" value="3" title="*ใช้สิทธิการลา" id="radio-3"><span data-checked="&#10004;" />
                    </div>
                    <label for="Zoya2">ลากิจ</label>
                </div>
                <div class="el-child-inline">
                    <div class="ui-checkbox bg-dodgerblue ui-small ui-animation-zoom round" id="radio_4">
                        <input type="radio" name="type_leave" value="4" title="*ใช้สิทธิการลา" id="radio-4"><span data-checked="&#10004;" />
                    </div>
                    <label for="Seema2">พักร้อน</label>
                </div>

            </div>    
            
            <div class="element">
                <h2>เหตุผลการลา</h2>
                {{ form::textarea('reason_leave','', ['class' => 'form-control']) }}
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
                <h2><span class="request">*</span> อนุมัติโดย</h2>
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
            $('span#span-name ').text($('#id_per option:selected').text());
            loadScore(studentid);
            
        })

        $('#status_leave').on('change',function(){
            var status_leave = $('#status_leave').val();
            if(status_leave == 1){
                $('#status_leave').css({'border-color': 'limegreen'});
            }else if(status_leave == 2){
                $('#status_leave').css({'border-color': '#fb0101'});
            }else{
                $('#status_leave').css({'border-color': 'dodgerblue'});
            }
            
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
            {    console.log(student);
                $('#showdata').empty();
                $('tbody').empty();
                var data = student.leave;
                var day0 = 0; 
                var time0 = 0;

                var day1 = 0;
                var time1 = 0;

                var day2 = 0;
                var time2 = 0;

                var day3 = 0;
                var time3 = 0;

                var day4 = 0;
                var time4 = 0;
                $.each(data,function(i,item){
                    
                    var row = $('<tr/>');
                    row.append($('<td/>',{
                        text : data[i].id_per,
                    })).append($('<td/>',{
                        text : data[i].type_leave,
                    })).append($('<td/>',{
                        text : data[i].nstart_day,
                    })).append($('<td/>',{
                        text : data[i].nend_day,
                    }));                    
                    $('tbody').append(row);
                    if(data[i].nstart_day == null){ 
                        var str_start_day = '0000-00-00T00:00';
                    }else{
                        var str_start_day = data[i].nstart_day; 
                    }
                    if(data[i].nend_day == null){ 
                        var str_end_day = '0000-00-00T00:00';
                    }else{
                        var str_end_day = data[i].nend_day; 
                    }
                    
                    var nstart_day = str_start_day.split('T');
                    var start_day = nstart_day[0].split('-');
                    var start_times = nstart_day[1].split(':');

                    var nend_day = str_end_day.split('T');
                    var end_day = nend_day[0].split('-');
                    var end_times = nend_day[1].split(':');

                    // console.log(start_day[0]+'-'+start_day[1]+'-'+start_day[2]+' '+start_times[0]+':'+start_times[1]);
                    // console.log(end_day[0]+'-'+end_day[1]+'-'+end_day[2]+' '+end_times[0]+':'+end_times[1]);
                    //-- หาวัน
                    var oneDay = 24*60*60*1000; // hours*minutes*seconds*milliseconds
                    var firstDate = new Date(start_day[0],start_day[1],start_day[2]);
                    var secondDate = new Date(end_day[0],end_day[1],end_day[2]);
                    var diffDays = Math.round(Math.abs((firstDate.getTime() - secondDate.getTime())/(oneDay)));
                    //--หาเวลา
                    var day = '1 1 1970 ',  // 1st January 1970
                    diff_in_min = ( Date.parse(day + nend_day[1]) - Date.parse(day + nstart_day[1]) ) / 1000 / 60 ;

                    

                    if(data[i].type_leave == 0){
                        if(start_day[0] != 0000){
                            var day00 = diffDays ;
                            if(nend_day[1] == '17:30' && nstart_day[1] == '08:30'){
                                var day00 = day00 + 1;
                                var time00 = 0;
                                // console.log(day00+' วัน');
                            }else{
                               var time00 = diff_in_min;
                               //console.log(time00+' ชม.'); 
                            }
                            day0 += day00;
                            time0 += time00;
                           // var time0 = Math.floor((time00 % 86400000) / 3600000); // hours
                            // console.log(day0+' วัน');                    
                        }else{
                           
                        }                        
                    }else if(data[i].type_leave == 1){
                        if(start_day[0] != 0000){
                            var day11 = diffDays;
                            if(nend_day[1] == '17:30' && nstart_day[1] == '08:30'){
                                var day11 = day11 + 1;
                                var time11 =0;
                            }else{
                               var time11 = diff_in_min; 
                            }
                            day1 += day11;
                            time1 += time11 ; 
                        }else{
                            
                        }
                    }else if(data[i].type_leave == 2){
                        if(start_day[0] != 0000){
                            var day22 = diffDays ;
                            if(nend_day[1] == '17:30' && nstart_day[1] == '08:30'){
                                var day22 = day22 + 1;
                                var time22 =0;
                            }else{
                               var time22 = diff_in_min; 
                            }
                            day2 += day22;
                            time2 += time22 ;
                        }else{
                           
                        }
                    }else if(data[i].type_leave == 3){
                        if(start_day[0] != 0000){
                            var day33 = diffDays ;
                            if(nend_day[1] == '17:30' && nstart_day[1] == '08:30'){
                                var day33 = day33 + 1;
                                var time33 =0;
                            }else{
                               var time33 = diff_in_min;
                            }
                            day3 += day33;
                            time3 += time33;
                        }else{
                            
                        }
                    }else{
                        if(start_day[0] != 0000){
                            var day44 = diffDays;
                            if(nend_day[1] == '17:30' && nstart_day[1] == '08:30'){
                                var day44 = day44 + 1;
                                var time44 = 0;
                            }else{
                               var time44 = diff_in_min; 
                            }
                            day4 += day44;
                            time4 += time44;
                        }else{
                            
                        }
                    }
                    console.log(data[i].type_leave+' '+diffDays+'วัน'+diff_in_min+'ช');  
                    
                    // var day2 = day1 + day22;
                    // var day3 = day3 + day33;
                    // var day4 = day4 + day44;
                    // console.log(day0+day1+day2+day3+day4);                   

                 $('#showdata').append();    
                })
                 console.log(day1);
                var [t_00,t_01,t_02] = [0,0,0];
                var [t_10,t_11,t_12] = [0,0,0];
                var [t_20,t_31,t_22] = [0,0,0];
                var [t_30,t_01,t_32] = [0,0,0];
                var [t_40,t_41,t_42] = [0,0,0];

                var t_00 = Math.floor(time0/60/24);
                var t_01 = ((((time0%86400)%3600)%60));
                var t_02 = Math.floor((time0%86400)/3600);
                day0 = day0 + t_00;

                var t_10 = Math.floor(time1/60/24);
                var t_11 = ((((time1%86400)%3600)%60));
                var t_12 = Math.floor(((time1%86400)%3600)/60);
                day1 = day1 + t_10;

                var t_20 = Math.floor(time2/60/24);
                var t_21 = ((((time2%86400)%3600)%60));
                var t_22 = Math.floor(((time2%86400)%3600)/60);
                day2 = day2 + t_20;

                var t_30 = Math.floor(time3/60/24);
                var t_31 = ((((time3%86400)%3600)%60));
                var t_32 = Math.floor(((time3%86400)%3600)/60);
                day3 = day3 + t_30;

                var t_40 = Math.floor(time4/60/24);
                var t_41 = ((((time4%86400)%3600)%60));
                var t_42 = Math.floor(((time4%86400)%3600)/60);
                day4 = day4 + t_40;

                console.log('0=ชม'+day0+' วัน '+t_02+' ช. '+t_01+' น. ');
                console.log('1=ชม'+day1+'-'+t_12+'-'+t_11);
                console.log('2=ชม'+day2+'-'+t_22+'-'+t_21);
                console.log('3=ชม'+day3+'-'+t_32+'-'+t_31);
                console.log('4=ชม'+day4+'-'+t_42+'-'+t_41);
                
                $('#time0').text(day0+' วัน '+t_02+' ช. '+t_01+' น. ');
                $('#time1').text(day1+' วัน '+t_12+' ช. '+t_11+' น. ');
                $('#time2').text(day2+' วัน '+t_22+' ช. '+t_21+' น. ');
                $('#time3').text(day3+' วัน '+t_32+' ช. '+t_31+' น. ');
                $('#time4').text(day4+' วัน '+t_42+' ช. '+t_41+' น. ');

                if (student != 0) {
                    $('#radio_0,#radio_1,#radio_2,#radio_3,#radio_4').css({'border-color': 'dodgerblue','color' :'dodgerblue'});
                    // $('#radio_1').css({'border-color': 'dodgerblue','color' :'dodgerblue'});
                    // $('#radio_2').css({'border-color': 'dodgerblue','color' :'dodgerblue'});
                    // $('#radio_3').css({'border-color': 'dodgerblue','color' :'dodgerblue'});
                    // $('#radio_4').css({'border-color': 'dodgerblue','color' :'dodgerblue'});
                    $('#radio-0,#radio-1,#radio-2,#radio-3,#radio-4').attr('title', '*ใช้สิทธิการลา');
                } else {
                    $('#radio_0,#radio_1,#radio_2,#radio_3,#radio_4').css({'border-color': '#ec0510','color' :'#ec0510'});
                    // $('#radio_1').css({'border-color': '#ec0510','color' :'#ec0510'});
                    // $('#radio_2').css({'border-color': '#ec0510','color' :'#ec0510'});
                    // $('#radio_3').css({'border-color': '#ec0510','color' :'#ec0510'});
                    // $('#radio_4').css({'border-color': '#ec0510','color' :'#ec0510'});
                    $('#radio-0,#radio-1,#radio-2,#radio-3,#radio-4').attr('title', 'ครบสิทธิการลา(หักเงิน)');
                }
                               
            }
        })
    }
</script>
<script src="{{ asset('js/main/jquery.uniform.js') }}"></script>
<script src="{{ asset('js/main/select2.min.js') }}"></script>
@endsection
