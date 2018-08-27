@extends('layouts.tpm')

@section('css')
@endsection

@section('content-header')
<div id="content-header">
	<div id="breadcrumb">
		<a href="{{ url('/pos/') }}" title="กลับไปจัดการข้อมูลตำแหน่ง" class="tip-bottom">
			<i class="icon-book"></i> ข้อมูลตำแหน่ง</a>
		<a href="#">เพิ่มข้อมูลตำแหน่ง</a>
	</div>
</div> 
@endsection

@section('content')<div class="container-fluid">
	<div class="row-fluid">
		<div class="span12">
			<div class="widget-box">
                <form action="{{ route('tasks.store') }}" method="post">
                {{ csrf_field() }}
                Task name:
                <br />
                <input type="text" name="name" />
                <br /><br />
                Task description:
                <br />
                <textarea name="description"></textarea>
                <br /><br />
                Start time:
                <br />
                <input type="text" name="task_date" class="date" />
                <br /><br />
                <input type="submit" value="Save" />
                </form>
            </div>
	    </div>
    </div>
@endsection

@section('js')
<script>
    $('.date').datepicker({
        autoclose: true,
        dateFormat: "yy-mm-dd"
    });
</script>

<script src="//code.jquery.com/jquery-1.11.3.min.js') }}"></script>
<script src="https://code.jquery.com/ui/1.11.3/jquery-ui.min.js"></script>
@endsection
