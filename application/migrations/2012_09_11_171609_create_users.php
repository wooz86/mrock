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

			$table->engine = 'InnoDB';
			
			$table->increments('id');
			$table->string('email', 320)->unique();
    		$table->string('password', 60);
    		$table->string('firstname', 50);
    		$table->string('lastname', 50);
    		$table->boolean('active');
    		$table->timestamps();  
		});
		DB::table('users')->insert(array(
            'email' 	=> 'a@a.com',
            'password' 	=> Hash::make('a'),
            'firstname' => 'Admin',
            'lastname'	=> 'Aronsson',
            'active'	=> 0,
        ));
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