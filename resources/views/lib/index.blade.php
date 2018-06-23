@extends('layouts/main')

@section('content')
	<h1>Hello blade Lib</h1>
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>ID</th>
				<th>Title</th>
				<th>Language</th>
				<th>star</th>
				<th>Create</th>
				<th width="200">Action</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
		</tbody>
	</table>
	<div class="row">
		<div class="col-xs-5">
			{{ Html::link('lib/create','Add New', array(
				'class' => 'btn btn-primary'
			))
		}}
		</div>		
	</div>
@endsection
