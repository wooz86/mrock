<?php

class Create_Venues_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('venues', function($table) {

			$table->engine = 'InnoDB';
			
			$table->increments('id');
			$table->string('title');
			$table->string('url');
			$table->timestamps();
		});
		DB::table('venues')->insert(array(
            'title' => 'Big Arena',
            'url' 	=> 'http://www.bigarena.com',
        ));
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('venues');
	}


}