<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

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
		return $this->hasOne('App\Priority','id','priority_id');

		//return $this->hasOne('App\Phone', 'foreign_key'); -> to override the laravel fk convention
		//return $this->hasOne('App\Phone', 'foreign_key', 'local_key');
	}

	public function priorities() 
	{
		return $this->belongsTo('App\Priority');
	}

	public function scopeAllTasksByDateAndPrio() {
		return DB::table('tasks')
			->join('priorities','tasks.priority_id','=','priorities.id')
			->select('tasks.*','priorities.title', 'priorities.color')
			->orderBy('tasks.deadline','DESC')
			->orderBy('priorities.id','DESC')
			->get();
	}
}
