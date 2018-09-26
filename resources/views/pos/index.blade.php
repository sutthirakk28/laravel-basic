
@extends('layouts.tpm')

@section('css')
<link rel="stylesheet" href="{{ asset('css/main/uniform.css') }}" />
<link rel="stylesheet" href="{{ asset('css/main/select2.css') }}" />
<link rel="stylesheet" href="{{ asset('css/main/jquery.gritter.css') }}" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@endsection

@section('content-header')
<div id="content-header">
    <div id="breadcrumb"> <a href="#" class="tip-bottom"><i class="icon-book
"></i> ข้อมูลตำแหน่ง</a></div>
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
		<a href="{{ route('export.excelpos') }}" title="Excel" class="btn thead">Excel <i class="fa fa-file-excel-o" aria-hidden="true" style="font-size:14px"></i></a>
      <a href="{{ url('manage_Users/pdf') }}" title="Excel" class="btn thead">PDF <i class="fa fa-file-pdf-o" aria-hidden="true" style="font-size:13.5px"></i></a>
      <a id="print" href="#" title="Excel" class="btn thead">Print <i class="fa fa-print" aria-hidden="true" style="font-size:15px"></i></a>
	    <div class="widget-box">
	      <div class="widget-title">
	         <span class="icon"><i class="icon-th"></i></span> 
	        <h5 class="f_th1">จัดการข้อมูลตำแหน่ง</h5>
	      </div>
	      <div class="widget-content nopadding">
	        <table class="table table-bordered data-table">
	          <thead>
	            <tr>
				 	<th width="100">รหัสตำแหน่ง</th>
					<th>ชื่อฝ่าย</th>
					<th >ชื่อตำแหน่ง</th>
					<th width="300">Action</th>
				</tr>
	          </thead>
	          <tbody>
	            @foreach ($pos as $p)
	            <tr >
	            	<td>{{ $p['id_pos'] }}</td>
					<td>
						<span class="dep">
							{{ $p['name_dep'] }}							
						</span>
					</td>
					<td>
						{{ $p['name_pos'] }}
						@foreach ($lib as $l)
							@if($l['position'] == $p['id_pos'])
								<span class="label label-important2"> {{ $l['count_id'] }} คน </span>                         
							@endif
						@endforeach
					</td> 
	              <td class="center">                                        
	                {{ Html::link('pos/'.$p['id_pos'], 'View', array('class' => 'btn btn-success')) }}
					{{ Html::link('pos/'.$p['id_pos'].'/edit','Edit', array('class' => 'btn btn-warning')) }}                   
	                <a href="#myAlert" data-toggle="modal" data-id="{{$p['id_pos']}}" class="addDialog btn btn-danger">Delete</a>
	                
	                <!--modal delete -->
	                <div id="myAlert" class="modal hide">
	                  <div class="modal-header">
	                    <button data-dismiss="modal" class="close" type="button">×</button>
	                    <h3><i class="material-icons" style="font-size:15px;color:red">error_outline</i> คำเตือน! </h3>
	                  </div>
	                  <div class="modal-body">
	                    <p>เมื่อลบตำแหน่งข้อมูลอาจเกิดข้อมผิดพลาดได้ <strong><var>คุณต้องการลบจริงไหม ?</var></strong></p>
	                  </div>
	                  <div class="modal-footer">
	                    {{ Form::open(['route' => ['pos.destroy',$p['id_pos'], 'method' => 'DELETE'] ]) }}
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
	    {{ Html::link('pos/create','Add', array(  'class' => 'btn btn-primary thead')) }}
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
<script src="{{ asset('js/main/print/printThis.js') }}"></script>
<script>
$('#print').on("click", function () {
  $('.table').printThis({
    header: "<h1>ข้อมูลฝ่าย</h1>"   
  });
});

</script>
@endsection