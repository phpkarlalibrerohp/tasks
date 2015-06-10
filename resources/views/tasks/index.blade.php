@extends('master')


@section('content')

	<h1>Tasks</h1>
	<table class="table">	
		<tr>
			<th></th>
			<th>Priority</th>
			<th>Name</th>
			<th>Description</th>
			<th>Deadline</th>
			<th></th>
		</tr>
		@foreach ($tasks as $task)
			<tr style="background-color: {{$task->color}}">
				<td> 
					<input type="checkbox" class="updateTaskStatus" value="{!! $task->id !!}" {!! $task->status == 1 ? 'checked' : '' !!}>
				</td>
				<td> {!! $task->title !!}</td>
			<tr>
				<td> 
					<input type="checkbox" class="updateTaskStatus" value="{!! $task->id !!}" {!! $task->status == 1 ? 'checked' : '' !!}>
				</td>
				<td> {!! $task->name !!}</td>
				<td> {!! $task->description !!}</td>
				<td> {!! $task->deadline !!}</td>
				<td> 
					<a href="{!! url('task/edit',$task->id); !!}" class="btn btn-primary">Edit</a>
					<button class="btn btn-danger deleteTask" value="{!! $task->id !!}">Delete</button>
				</td>
			</tr>
		@endforeach
	</table>

@stop

@section('footer')
<script>

$(document).ready(function() {
	$('.updateTaskStatus').click(function() {
		// var value = 0;
		// if ( $(this).is(":checked") ){
		// 	value = 1;
		// }
		//window.location='{!! url("task/update").'/' !!}' + $(this).val() + '/' + value;
		$.ajax({
	      type: 'POST',
	      dataType: 'JSON',
	      data: {
   			"id": $(this).val()
	      },
	      url: "{!! url('task/status') !!}",
	      success: function(data){
	        alert('updated');
	      }
	    });
	});
	$('.deleteTask').click(function() {
		var id = $(this).val();
		$(this).closest('tr').remove();
		$.ajax({
	      type: 'POST',
	      dataType: 'JSON',
	      data: {
   			"id": $(this).val()
	      },
	      url: "{!! url('task/delete') !!}",
	      success: function(data){
	        alert('removed');
	      }
	    });
	});
});
</script>
@stop

