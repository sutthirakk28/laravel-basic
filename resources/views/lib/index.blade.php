@extends('layouts/main')

@section('content')
	<h1>Hello blade Lib</h1>	
  	<h1>{{ Cookie::get('language') }}</h1>
	@if(Session::has('message'))
		<div class=" alert alert-info">
			{{ Session::get('message') }}
		</div>
	@endif
	<h2> {{ Session::get('name') }}</h2>
	<h2> {{ Session::get('language') }}</h2>
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
					<td>
							{{ Form::open(['route' => ['lib.destroy',$l['id'], 'method' => 'DELETE'] ]) }}
							<input type="hidden" name="_method" value="delete"/>
							{{ Html::link('lib/'.$l['id'], 'View', array('class' => 'btn btn-success')) }}
							{{ Html::link('lib/'.$l['id'].'/edit','Edit', array('class' => 'btn btn-warning')) }}
							{{ Form::submit('Delete',array('class' => 'btn btn-danger')) }}
							{{ Form::close()}}
					</td>
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
