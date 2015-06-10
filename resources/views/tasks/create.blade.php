@extends('master')

@section('content')


@if (!isset($task)) 
	{!! Form::open(['url' => 'tasks']) !!}
@else 
	{!! Form::open(['url' => 'task']) !!}
	{!! Form::input('hidden','id',$task->id) !!}
@endif
	<div class="form-group">
		{!! Form::label('name', 'Name:') !!}
		{!! Form::text('name', isset($task) ? $task->name : null , ['class' => 'form-control']) !!}
	</div>
	<div class="form-group">
<<<<<<< HEAD
		{!! Form::label('priority', 'Priority:') !!}
		{!! Form::select('priority_id',array('' => '') + $priorities, isset($task) ? $task->priority_id : null, ['class' => 'form-control']) !!}
	</div>
	<div class="form-group">
=======
>>>>>>> 92d3a9d388b7c917be90758cf62b675475b8b52c
		{!! Form::label('description', 'Description:') !!}
		{!! Form::textarea('description',isset($task) ? $task->description : null , ['class' => 'form-control']) !!}
	</div>
	<div class="form-group">
		{!! Form::label('deadline', 'Deadline:') !!}
	</div>
	<div class="form-group">
		{!! Form::label('date', 'Date:') !!}
		{!! Form::input('date','deadlineDate',isset($task) ? $dateTime[0] : date('Y-m-d'), ['class' => 'form-control']) !!}
	</div>
	<div class="form-group">
		{!! Form::label('date', 'Time:') !!}
		{!! Form::select('deadlineTimeHour', $dateHour, isset($task) ? $dateTime[1] : date('h') ) !!}
		{!! Form::select('deadlineTimeMin', $dateMinSec, isset($task) ? $dateTime[2] : date('i') ) !!}
		{!! Form::select('deadlineTimeSec', $dateMinSec, isset($task) ? $dateTime[3] : date('s') ) !!}
		{!! Form::select('deadlineTimeAPM', array('AM' => 'AM', 'PM' => 'PM'), isset($task) ? $dateTime[4] : date('A')) !!}
	</div>
	<div class="form-group">
		{!! Form::label('status', 'Status:') !!} <br>
		{!! Form::checkbox('status', 1, isset($task) ? $task->status == 1 ? true: null : null ) !!} Done <br>
	</div>
	<div class="form-group">
		@if (!isset($task)) 
			{!! Form::submit('Add Task', ['class' => 'btn btn-primary form-control']); !!}
		@else 
			{!! Form::submit('Edit Task', ['class' => 'btn btn-primary form-control']); !!}
		@endif
	</div>
	@if (count($errors) > 0)
	    <div class="alert alert-danger">
	        <ul>
	            @foreach ($errors->all() as $error)
	                <li>{{ $error }}</li>
	            @endforeach
	        </ul>
	    </div>
	@endif
{!! Form::close() !!}


@stop