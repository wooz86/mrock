<?php

class Biography_Controller extends Base_Controller 
{
	public function action_index()
	{
		return View::make('front.biography.index');
	}

}