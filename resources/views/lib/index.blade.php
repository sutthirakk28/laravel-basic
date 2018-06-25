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
			@forelse ($lib as $l)
				<tr>
					<td>{{ $l['id'] }}</td>
					<td>{{ $l['title'] }}</td>
					<td>{{ $l['language'] }}</td>
					<td>{{ $l['star'] }}</td>
					<td>{{ $l['created_at'] }}</td>
					<td>{{ Html::link('lib/'.$l['id'], 'View', array('class' => 'btn btn-primary')) }}</td>
				</tr>
			@empty
				<tr>
					<td colspan="6">No data</td>
				</tr>
			@endforelse

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
