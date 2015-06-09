@extends('master')

@section('content')

	<h1>Priorities</h1>
	<table class="table">	
		<tr>
			<th>ID</th>
			<th style="width: 50%">Color</th>
			<th>Name</th>
			<th></th>
		</tr>
		@foreach ($priorities as $priority)
			<tr>
				<td> {!! $priority->id !!}</td>
				<td style="background-color:{!! $priority->color !!}"></td>
				<th> {!! ucfirst($priority->title) !!}</th>
				<td> 
					<a href="{!! url('priority/edit',$priority->id); !!}" class="btn btn-primary">Edit</a>
				</td>
			</tr>
		@endforeach
	</table>
@stop