<?php

class Create_Images_Table {    

	public function up()
    {
		Schema::create('images', function($table) {

			$table->engine = 'InnoDB';
			
			$table->increments('id');
			$table->string('caption');
			$table->string('filename');
			$table->integer('order');
			$table->integer('size');
			$table->string('type');
			$table->timestamps();
	});

    }    

	public function down()
    {
		Schema::drop('images');

    }

}