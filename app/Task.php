<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model {

	protected $table = 'tasks';
	//
	protected $fillable = [
		'name',
		'description',
		'status',
		'priority_id',
		'deadline'
	];

	public function priority()
	{
		return $this->belongsTo('App\Priority');
	}

}
