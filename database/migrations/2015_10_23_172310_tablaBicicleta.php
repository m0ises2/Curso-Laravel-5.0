<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TablaBicicleta extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('bicicleta', function(Blueprint $table){
			$table->increments('id');
			$table->string('model', 20)->nullable();
			$table->string('name', 15);
			$table->integer('gears')->nullable();
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
		Schema::drop('bicicleta');
	}

}
