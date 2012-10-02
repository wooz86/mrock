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
            'title' => 'Title Main',
            'description' => 'Eaque magnam, exercitationem ducimus mauris assumenda facilisis, cupidatat amet pede neque optio sociosqu, mattis penatibus posuere, nisi, gravida volutpat reiciendis.',
            'page_id' => 1,
            'type' => 'main',
            'content' => '<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, commodo vitae, ornare sit amet, wisi. Aenean fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci, sagittis tempus lacus enim ac dui. Donec non enim in turpis pulvinar facilisis. Ut felis. Praesent dapibus, neque id cursus faucibus, tortor neque egestas augue, eu vulputate magna eros eu erat. Aliquam erat volutpat. Nam dui mi, tincidunt quis, accumsan porttitor, facilisis luctus, metus</p><p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, commodo vitae, ornare sit amet, wisi. Aenean fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci, sagittis tempus lacus enim ac dui. Donec non enim in turpis pulvinar facilisis. Ut felis. Praesent dapibus, neque id cursus faucibus, tortor neque egestas augue, eu vulputate magna eros eu erat. Aliquam erat volutpat. Nam dui mi, tincidunt quis, accumsan porttitor, facilisis luctus, metus</p>',
        ));

		DB::table('content')->insert(array(
            'title' => 'Title Side',
            'description' => 'Eaque magnam, exercitationem ducimus mauris assumenda facilisis, cupidatat amet pede neque optio sociosqu, mattis penatibus posuere, nisi, gravida volutpat reiciendis.',
            'page_id' => 1,
            'type' => 'side',
            'content' => '<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, commodo vitae, ornare sit amet, wisi. Aenean fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci, sagittis tempus lacus enim ac dui. Donec non enim in turpis pulvinar facilisis. Ut felis. Praesent dapibus, neque id cursus faucibus, tortor neque egestas augue, eu vulputate magna eros eu erat. Aliquam erat volutpat. Nam dui mi, tincidunt quis, accumsan porttitor, facilisis luctus, metus</p>',
        ));
        DB::table('content')->insert(array(
            'title' => 'Intro video',
            'description' => '',
            'page_id' => 1,
            'type' => 'intro_video',
            'content' => 'http://www.youtube.com/embed/LjLPqIL2HHU',
        ));
    }    

	public function down()
    {
		Schema::drop('content');

    }

}