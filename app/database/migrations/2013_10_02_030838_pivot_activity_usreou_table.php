<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class PivotActivityUsreouTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('activity_usreou', function(Blueprint $table) {
			// $table->increments('id');
			$table->integer('activity_id')->unsigned()->index();
			$table->integer('usreou_id')->unsigned()->index();
			$table->foreign('activity_id')->references('id')->on('activities')->onDelete('cascade');
			$table->foreign('usreou_id')->references('id')->on('usreous')->onDelete('cascade');
		});
	}



	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('activity_usreou');
	}

}
