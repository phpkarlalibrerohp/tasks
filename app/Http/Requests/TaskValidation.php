<?php namespace App\Http\Requests;
use Carbon\Carbon;
use App\Http\Requests\Request;

class TaskValidation extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'name' 			=> 		'required|min:3',
			'description'	=>		'required|min:3',
			'priority_id'	=>		'required',
			'deadlineDate'	=>		'required|date_format:Y-m-d|after:'. Carbon::now()->format('m/d/Y')
		];
	}

	public function messages() 
	{
		return [
			'deadlineDate.after'	=>		'deadline checker custom message'
		];
	}

}
