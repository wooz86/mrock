<?php

class Content extends Eloquent
{

	public static $table = 'content';
	public static $timestamps = true;

	public $id;
	public $title;
	public $description;
	public $content;
    
    public function __construct()
    {
		parent::__construct();
    }
}