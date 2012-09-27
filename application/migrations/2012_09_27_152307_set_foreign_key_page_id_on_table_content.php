<?php

class Set_Foreign_Key_Page_Id_On_Table_Content {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('content', function($table){
			$table->foreign('page_id')->references('id')->on('pages');			
		});
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('content', function($table){
			$table->drop_foreign('content_page_id_foreign');
		});
	}

}