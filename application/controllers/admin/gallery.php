<?php

class Admin_Gallery_Controller extends Admin_Base_Controller 
{
	public function action_index()
	{
		return View::make('admin.index');
	}

}