<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTagTaskTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tag_task', function(Blueprint $table)
		{
			$table->integer('task_id')->index()->unsigned();
			$table->integer('tag_id')->index()->unsigned();
			$table->timestamps();

			$table->foreign('task_id')->references('id')->on('tasks')->onDelete('cascade');
			$table->foreign('tag_id')->references('id')->on('tags')->onDelete('cascade');
		});	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('tag_task');
	}

}
