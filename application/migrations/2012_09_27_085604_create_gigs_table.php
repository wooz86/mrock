<?php

class Create_Gigs_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('gigs', function($table) {

			$table->engine = 'InnoDB';
			
			$table->increments('id');
			$table->string('title');
			$table->integer('venue_id')->unsigned();
			$table->date('date');
			$table->string('ticket_url');
			$table->timestamps();
		});
		DB::table('gigs')->insert(array(
            'title' 		=> 'Concert title',
            'venue_id' 		=> 	1,
            'date' 			=> 'måndag 24 Oktober 2012 kl. 18:00:00 Centraleuropa, normaltid',
            'ticket_url' 	=> 'http://www.ticnet.se',
        ));
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('gigs');
	}

}