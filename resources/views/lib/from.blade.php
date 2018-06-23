@extends('layouts/main')

@section('content')
	<h1>Form Create</h1>
	<div class="panel panel-primary">
		<div class="panel-heading">
			@if(isset($lib))
				Edit form
			@else
				Add Form
			@endif
		</div>
			@if(isset($lib))
				{{ Form::open(['method' => 'put','route' =>['lib.update', $lib->id] ])}}
			@else
				{{ Form::open(['url' => 'lib']) }}
			@endif

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
					{{ form::label('title','Title Library') }}
				</div>
				<div class="col-xs-5">
					@if(isset($lib->title))
						{{ form::text('title',$lib->title, ['class' => 'form-control']) }}
					@else
						{{ form::text('title','', ['class' => 'form-control']) }}
					@endif
				</div>
			</div>
		</div>
		<div class="panel-body">
			<div class="row">
				<div class="col-xs-2">
					{{ form::label('language','Language') }}
				</div>
				<div class="col-xs-5">
					@if(isset($lib->language))
						{{ form::text('language', $lib->language, ['class' => 'form-control'] ) }}
					@else
						{{ form::text('language', '', ['class' => 'form-control']) }}
					@endif
				</div>
			</div>
		</div>
		<div class="panel-body">
			<div class="row">
				<div class="col-xs-2">
					{{ form::label('star','Star') }}
				</div>
				<div class="col-xs-5">
					@if(isset($lib->star))
						{{ form::text('star', $lib->star, ['class'=>'form-control']) }}
					@else
						{{ form::text('star', '', ['class'=>'form-control']) }}
					@endif
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
	</div>
	<div class="row">
		<div class="col-xs-2">
			
		</div>
		{{ Form::close() }}		
	</div>
@endsection