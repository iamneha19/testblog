<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePost extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('post', function(Blueprint $table)
            {
                $table->increments('id')->unsigned();
                $table->string('name');
                $table->string('description');
                $table->integer('user_id')->unsigned();
                $table->foreign('user_id')
                          ->references('id')
                          ->on('users');
				$table->timestamps();
				$table->softDeletes();
                          
            });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('post');
	}

}
