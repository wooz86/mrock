<?php

class Set_Foreign_Key_Image_Id_On_Table_Members {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('members', function($table){
				$table->foreign('image_id')->references('id')->on('images');
		});
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('members', function($table){
			$table->drop_foreign('members_image_id_foreign');
		});
	}
	}

}