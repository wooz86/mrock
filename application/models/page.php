<?php

class Page extends Eloquent
{
	public static $table = 'pages';
	public static $timestamps = true;

	public function content()
	{
		$this->has_many('Content');
	}

}