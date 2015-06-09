<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Priority extends Model {

	protected $table = 'priorities';

	protected $fillable = [
		'title',
		'color'
	];
}
