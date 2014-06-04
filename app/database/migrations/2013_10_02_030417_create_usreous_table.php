<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsreousTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('usreous', function(Blueprint $table) {
			$table->increments('id');
			$table->string('organization');
			$table->integer('in_id')->unique();
			$table->integer('address_id');
			$table->string('ceo');
			$table->string('phone');
			$table->string('fax')->nullable();
			$table->string('email');
			$table->integer('registry_id');
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('usreous');
	}

}
