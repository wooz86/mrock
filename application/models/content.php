<?php

class Content extends Eloquent
{

	public static $table = 'content';
	public static $timestamps = true;

	public function page()
	{
		$this->belongs_to('Page');
	}
    
}