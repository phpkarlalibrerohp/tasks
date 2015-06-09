<?php

use App\Priority;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class PrioritySeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{

		Priority::create(['title' => 'low', 'color' => '#999999']);
		Priority::create(['title' => 'average', 'color' => '#009933']);
		Priority::create(['title' => 'high', 'color' => '#FF0000']);
	}

}
