@extends('layouts.main')

@section('title','Band new Song')


@section('content')

<h1>Blande Today</h1><br>
band  {!! $band !!}
<h1>รุ่น  {!! $album !!}</h1>
<?php 
if($band !=''){
	echo '0';
}
?>

@if($band != '')
	<h1>{{ $band }}</h1>
	<textarea>{!! $album !!}</textarea>
@else
	<h2>ไม่มีข้อมูลรถ</h2>
	<div>{{$album}}</div>
@endif

@for($i=0; $i<=10; $i++)
	{{$i}}
@endfor

{{isset($band) ? $band : 'Default'}}
{{$band or 'Default'}}

<input type="text" name="">
<input type="submit" name="" value="sent">

@php
	echo rand(1,20);

@endphp

@endsection