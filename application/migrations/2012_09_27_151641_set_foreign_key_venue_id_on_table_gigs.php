<?php

class Set_Foreign_Key_Venue_Id_On_Table_Gigs {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('gigs', function($table){
				$table->foreign('venue_id')->references('id')->on('venues');
		});
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('gigs', function($table){
			$table->drop_foreign('gigs_venue_id_foreign');
		});
	}

}