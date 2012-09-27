<?php

class Create_Pages_Table {    

	public function up()
    {
		Schema::create('pages', function($table) {

            $table->engine = 'InnoDB';
            
			$table->increments('id');
			$table->string('title');
			$table->string('description');
            $table->boolean('is_nav');
			$table->timestamps();
	});
		DB::table('pages')->insert(array(
            'title' => 'Home',
            'description' => 'Eaque magnam, exercitationem ducimus mauris assumenda facilisis, cupidatat amet pede neque optio sociosqu, mattis penatibus posuere, nisi, gravida volutpat reiciendis.',
            'is_nav' => 1,
        ));
       	DB::table('pages')->insert(array(
            'title' => 'Music',
            'description' => 'Eaque magnam, exercitationem ducimus mauris assumenda facilisis, cupidatat amet pede neque optio sociosqu, mattis penatibus posuere, nisi, gravida volutpat reiciendis.',
            'is_nav' => 1,
        ));
       	DB::table('pages')->insert(array(
            'title' => 'Biography',
            'description' => 'Eaque magnam, exercitationem ducimus mauris assumenda facilisis, cupidatat amet pede neque optio sociosqu, mattis penatibus posuere, nisi, gravida volutpat reiciendis.',
            'is_nav' => 1,
        ));
        DB::table('pages')->insert(array(
            'title' => 'Gigs',
            'description' => 'Eaque magnam, exercitationem ducimus mauris assumenda facilisis, cupidatat amet pede neque optio sociosqu, mattis penatibus posuere, nisi, gravida volutpat reiciendis.',
            'is_nav' => 1,
        ));
        DB::table('pages')->insert(array(
            'title' => 'Gallery',
            'description' => 'Eaque magnam, exercitationem ducimus mauris assumenda facilisis, cupidatat amet pede neque optio sociosqu, mattis penatibus posuere, nisi, gravida volutpat reiciendis.',
            'is_nav' => 1,
        ));
       	DB::table('pages')->insert(array(
            'title' => 'Contact',
            'description' => 'Eaque magnam, exercitationem ducimus mauris assumenda facilisis, cupidatat amet pede neque optio sociosqu, mattis penatibus posuere, nisi, gravida volutpat reiciendis.',
            'is_nav' => 1,
        ));

    }    

	public function down()
    {
		Schema::drop('pages');

    }

}