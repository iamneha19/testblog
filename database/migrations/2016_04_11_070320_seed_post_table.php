<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SeedPostTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		DB::table('post')->insert(
                        array(
                                array(
									'name' => 'test',
									'description'=>'test',
									'user_id'=>'7',
									
									),
								array(
									'name' => 'my post',
									'description'=>'Description is one of four rhetorical modes along with exposition, argumentation, and narration',
									'user_id'=>'7',
									
									),
								array(
									'name' => 'new post again',
									'description'=>'Description is one of four rhetorical modes along with exposition, argumentation, and narration...',
									'user_id'=>'7',
									
									),
                        ));
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		DB::table('post')->delete();
	}
	

}
