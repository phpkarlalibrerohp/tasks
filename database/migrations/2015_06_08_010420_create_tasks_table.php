<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasksTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tasks', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->text('description');
			$table->datetime('deadline');
			$table->boolean('status');
			$table->integer('tag_id')->index()->unsigned();
			$table->integer('priority_id')->index()->unsigned();
			$table->timestamps();

			$table->foreign('tag_id')->references('id')->on('tags');
			$table->foreign('priority_id')->references('id')->on('priorities');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('tasks');
	}

}
