<?php

class Admin_Home_Controller extends Admin_Base_Controller 
{
	public function action_index()
	{
		$data = array(
			'firstname' => Session::get('firstname'),
			'lastname' => Session::get('lastname'),
		);
		
		return View::make('admin.index', $data);
	}

}