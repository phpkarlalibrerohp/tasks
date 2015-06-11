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
		'deadline',
		'user_id'
	];

	//tell laravel additional dates so that itll use carbon
	protected $dates = ['deadline'];



	public function priority()	{
		return $this->belongsTo('App\Priority');
	}

	public function tags() {
		return $this->belongsToMany('App\Tag');
	}

	public function scopeAllTasksByDateAndPrio() {
		return DB::table('tasks')
			->join('priorities','tasks.priority_id','=','priorities.id')
			->select('tasks.*','priorities.title', 'priorities.color')
			->orderBy('tasks.deadline','DESC')
			->orderBy('priorities.id','DESC')
			->get();
	}

	public function scopeStatusActive($query)
	{
		$query->where('status','==', 1);
	}

	public function setUserIdAttribute($id) 
	{
		$this->attributes['user_id'] = 1;
	}

	//
	// public function setDeadlineAttribute($date)
	// {
	// 	// $this->attributes['deadline'] = Carbon::createFromFormat('Y-m-d',$date);
	// 	$this->attributes['deadline'] = Carbon::parse('Y-m-d',$date);
	// }


}
