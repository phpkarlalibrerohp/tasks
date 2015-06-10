<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Priority extends Model {

	protected $table = 'priorities';

	protected $fillable = [
		'title',
		'color'
	];

	public function task() 
	{
		return $this->belongsTo('App\Task');
	}

	public function tasks() 
	{
		return $this->hasMany('App\Task','id','task_id');
	}

}
