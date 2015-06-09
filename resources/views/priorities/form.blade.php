@extends('master')

@section('content')

	{!! Form::open(['url' => 'priority']) !!}
	{!! Form::input('hidden','id',$priority->id) !!}

	<div class="form-group">
		{!! Form::label('title', 'Title:') !!}
		{!! Form::text('title', $priority->title, ['class' => 'form-control']) !!}
	</div>
	<div class="form-group">
		{!! Form::label('color', 'Color:') !!}
		{!! Form::input('color','color',$priority->color, ['class' => 'form-control']) !!}
	</div>
	<div class="form-group">
		{!! Form::submit('Edit Priority', ['class' => 'btn btn-primary form-control']); !!}
	</div>
{!! Form::close() !!}

@stop