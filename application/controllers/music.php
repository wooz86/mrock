<?php

class Music_Controller extends Base_Controller 
{
	public function action_index()
	{
		return View::make('front.music.index');
	}

}