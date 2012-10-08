<?php

class Create_Content_Table {    

	public function up()
    {
		Schema::create('content', function($table) {

            $table->engine = 'InnoDB';
            
			$table->increments('id');
			$table->string('title');
			$table->string('description');
			$table->integer('page_id')->unsigned();
			$table->string('type');
			$table->text('content');
			$table->timestamps();            
		});

		DB::table('content')->insert(array(
            'title' => 'We Are M-ROCK',
            'description' => 'Description of M-ROCK',
            'page_id' => 1,
            'type' => 'main',
            'content' => '<p>Vestibulum id ligula porta felis euismod semper. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Curabitur blandit tempus porttitor. Donec id elit non mi porta gravida at eget metus. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Etiam porta sem malesuada magna mollis euismod. Nulla vitae elit libero, a pharetra augue.</p>',
        ));

		DB::table('content')->insert(array(
            'title' => 'Follow & Contact',
            'description' => '',
            'page_id' => 1,
            'type' => 'side',
            'content' => '<p>Get the latest news and happenings through our facebook and twitter. You can also contact us by email.</p>',
        ));
        DB::table('content')->insert(array(
            'title' => 'Intro video',
            'description' => '',
            'page_id' => 1,
            'type' => 'intro_video',
            'content' => 'http://www.youtube.com/embed/LjLPqIL2HHU',
        ));
        DB::table('content')->insert(array(
            'title' => 'This is us',
            'description' => 'Eaque magnam, exercitationem ducimus mauris assumenda facilisis, cupidatat amet pede neque optio sociosqu, mattis penatibus posuere, nisi, gravida volutpat reiciendis.',
            'page_id' => 3,
            'type' => 'band_text',
            'content' => '<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est.</p>',
        ));
        
    }    

	public function down()
    {
		Schema::drop('content');

    }

}