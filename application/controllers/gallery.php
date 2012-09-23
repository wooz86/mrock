<?php

class Gallery_Controller extends Base_Controller 
{
	public function action_index()
	{
		return View::make('front.gallery.index');
	}

}