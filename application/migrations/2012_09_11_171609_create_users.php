<?php

class Create_Users {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function($table){
			$table->increments('id');
        	$table->string('username', 50);
			$table->string('email', 320);
    		$table->string('password', 50);
    		$table->integer('role');
    		$table->boolean('active');
    		$table->timestamps();  
		});
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}