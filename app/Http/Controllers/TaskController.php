<?php namespace App\Http\Controllers;

use App\Task;
use App\Priority;
use App\Tag;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Request;
use App\Http\Requests\TaskValidation;
// use Illuminate\Http\Request;

class TaskController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//$tasks = Task::all();
		$tasks = Task::all();
		return view('tasks.index', compact('tasks'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$priorities = Priority::lists('title','id','color');
		$tagss = Tag::all();

		for($x = 0; $x<= 12; $x++) {
			$dateHour[] = sprintf("%02d", $x);
		}

		for($x = 0; $x<= 59; $x++) {
			$dateMinSec[] = sprintf("%02d", $x);
		}

		return view('tasks.create', compact('tagss','priorities','dateHour','dateMinSec'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(TaskValidation $request)
	{

		//dd($request::all());
		//dd(Request::all());
		//$input = Request::all();
		// CHECKER
		$input = $request->all();
		// dd($input);

		$deadline = $input['deadlineDate'].' '.sprintf("%02d", $input['deadlineTimeHour']).':'
			.sprintf("%02d", $input['deadlineTimeMin']).':'.sprintf("%02d", $input['deadlineTimeSec'])
			.' '.$input['deadlineTimeAPM'];

		$current = strtotime(carbon::now());
		$deadline = strtotime($deadline);
		$input['deadline'] = date("Y-m-d H:i:s", $deadline);
		$input['user_id'] = 0;
		//return $deadline.'<br>'.date("Y-m-d H:i:s", $deadline);
		//return $deadline.'<br>'.$current;
		Task::create($input);
		return redirect('tasks');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{

		//$priorities = Priority::all();
		$priorities = Priority::lists('title','id','color');

		$tempPrio = array(
			'Low'		=>	1,
			'Average'	=>	2,
			'High'		=>	3
		);

		for($x = 0; $x<= 12; $x++) {
			$dateHour[] = sprintf("%02d", $x);
		}

		for($x = 0; $x<= 59; $x++) {
			$dateMinSec[] = sprintf("%02d", $x);
		}

		$task = Task::findOrFail($id);

		// $x = Carbon::parse($task->deadline);
		// dd($x);
		
		$deadline = date("Y-m-d h:i:s A", strtotime($task->deadline));
		$date = explode(' ',$deadline);

		$dateTime[] = $date[0];
		$time = explode(':',$date[1]);
		$dateTime[] = $time[0];
		$dateTime[] = $time[1];
		$dateTime[] = $time[2];
		$dateTime[] = $date[2];


		//return $dateTime;
		return view('tasks.create', compact('priorities','dateHour','dateMinSec','task', 'dateTime'));

	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(TaskValidation $request)
	{
		$input = $request->all();

		$deadline = $input['deadlineDate'].' '.sprintf("%02d", $input['deadlineTimeHour']).':'
			.sprintf("%02d", $input['deadlineTimeMin']).':'.sprintf("%02d", $input['deadlineTimeSec'])
			.' '.$input['deadlineTimeAPM'];
		$deadline = strtotime($deadline);
		$status = 0;
		if(isset($input['status'])) $status = 1;
		$task['name'] = $input['name'];
		$task['description'] = $input['description'];
		$task['status'] = $status;
		$task['priority_id'] = $input['priority_id'];
		$task['deadline'] = date("Y-m-d H:i:s", $deadline);
		Task::where('id', '=', $input['id'])->update($task);
		return redirect('tasks');
	}

	public function updateStatus() {
		$id = Request::input('id');
		$task = Task::findOrFail($id);
		if($task->status == 0) $newStat = 1;
		else $newStat = 0;
		$task->status = $newStat;
		$task->update();
		return redirect('tasks');
	}
	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy()
	{
		$id = Request::input('id');
		$task = Task::findOrFail($id);
		$task->delete();
		return redirect('tasks');
	}

	/** 
		Laracast Samples
	**/
	// Sample on how to validate directly in the controller
	// public function validateTest(Request $request) 
	// {
	// 	$this->validate($request, ['name' => 'required', 'description' => 'required']);
	// 	Task::create($request->all());

	// 	return redirect('tasks');
	// }
}
