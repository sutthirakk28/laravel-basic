@extends('layouts.tpm')

@section('css')
<link rel="stylesheet" href="{{ asset('css/main/uniform.css') }}" />
<link rel="stylesheet" href="{{ asset('css/main/select2.css') }}" />
<link rel="stylesheet" href="{{ asset('css/main/jquery.gritter.css') }}" />
@endsection

@section('content-header')
<div id="content-header">
    <div id="breadcrumb"> <a href="#" class="tip-bottom"><i class="icon-book
"></i> ข้อมูลฝ่าย</a></div>
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
	@if(Session::has('masupdate'))
		<div id="gritter-notify">
      <div class="normal"></div>
    </div>

	@endif
	@if(Session::has('masdelete'))		
    <div id="gritter-notify">
      <div class="sticky"></div>
    </div>
	@endif

  <div class="container-fluid">
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title">
             <span class="icon"><i class="icon-th"></i></span> 
            <h5 class="f_th1">จัดการข้อมูลฝ่าย</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th width="100">รหัส</th>
                  <th >ชื่อฝ่าย</th>
                  <th width="300">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($dep as $d)
                <tr >
                  <td >{{ $d['id_dep'] }}</td>
                  <td >
                    <span class="dep">
                      {{ $d['name_dep'] }}

                      @foreach ($pos as $p)
                        @if($p['id_dep'] == $d['id_dep'])
                          <span class="label label-important3"> {{ $p['count_id'] }} ตำแหน่ง </span>                       
                        @endif
                      @endforeach
                      @foreach ($lib as $l)
                        @if($l['id_dep'] == $d['id_dep'])
                          <span class="label label-important2"> {{ $l['count_id'] }} คน </span>                         
                        @endif
                      @endforeach
                    </span>
                  </td>
                  <td class="center">                                        
                    {{ Html::link('dep/'.$d['id_dep'], 'View', array('class' => 'btn btn-success')) }}
                    {{ Html::link('dep/'.$ib=$d['id_dep'].'/edit','Edit', array('class' => 'btn btn-warning')) }}                   
                    <a href="#myAlert" data-toggle="modal" data-id="{{$d['id_dep']}}" class="addDialog btn btn-danger">Delete</a>
                    
                    <!--modal delete -->
                    <div id="myAlert" class="modal hide">
                      <div class="modal-header">
                        <button data-dismiss="modal" class="close" type="button">×</button>
                        <h3><i class="material-icons" style="font-size:15px;color:red">error_outline</i> คำเตือน! </h3>
                      </div>
                      <div class="modal-body">
                        <p>เมื่อลบฝ่ายข้อมูลอาจเกิดข้อมผิดพลาดได้ <strong><var>คุณต้องการลบจริงไหม ?</var></strong></p>
                      </div>
                      <div class="modal-footer">
                        {{ Form::open(['route' => ['dep.destroy',$d['id_dep'], 'method' => 'DELETE'] ]) }}
                        <input type="hidden" name="_method" value="delete"/>
                        <input type="hidden" name="depId" value="" id="depId"> 
                        {{ Form::submit('Confirm',array('class' => 'btn btn-primary')) }}
                        <a data-dismiss="modal" class="btn" href="#">Cancel</a> 
                        {{ Form::close()}} 
                        
                      </div>
                    </div>
                    <!--end modal delete -->
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>       
      </div>
    </div>
  </div>
  <div class="container-fluid">
    <div class="row-fluid">
      <div class="span12">
        {{ Html::link('dep/create','Add', array(  'class' => 'btn btn-primary thead')) }}
      </div>
    </div>
  </div>
@endsection

@section('js')
<script src="{{ asset('js/main/jquery.uniform.js') }}"></script>
<script src="{{ asset('js/main/select2.min.js') }}"></script> 
<script src="{{ asset('js/main/jquery.dataTables.min.js') }}"></script> 
<script src="{{ asset('js/main/maruti.tables.js') }}"></script>

<script src="{{ asset('js/main/jquery.gritter.min.js') }}"></script> 
<script src="{{ asset('js/main/jquery.peity.min.js') }}"></script> 
<script src="{{ asset('js/main/maruti.interface.js') }}"></script>
<script src="{{ asset('js/main/maruti.popover.js') }}"></script>
@endsection