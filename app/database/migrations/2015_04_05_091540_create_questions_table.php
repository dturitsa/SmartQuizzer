<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionsTable extends Migration {

	public function up()
	{
		Schema::create('questions', function($table)
		{
			$table->increments('id');

			$table->text('category');
			$table->text('question');
			$table->text('answer');
			$table->integer('ratingscount');
			$table->double('rating');


			// created_at, updated_at DATETIME
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('questions');
	}
}