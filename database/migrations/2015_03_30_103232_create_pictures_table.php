<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePicturesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pictures', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->integer('item_id')->unsigned();
			$table->foreign('item_id')->references('id')->on('items')->onDelete('cascade');
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
		Schema::table('pictures', function($table)
		{
			$table->dropForeign('pictures_item_id_foreign');
		});
		Schema::drop('pictures');
	}

}
