<?php

class Create_Members_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('members', function($table) {

			$table->engine = 'InnoDB';
			
			$table->increments('id');
			$table->string('firstname');
			$table->string('lastname');
			$table->text('info');
			$table->integer('image_id')->unsigned();
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
		Schema::drop('members');
	}

}