<?php

class Admin_User_Controller extends Admin_Base_Controller 
{
	public function action_index()
	{
		// Show "user profile" page
	}
	public function action_edit()
	{

		$data = array(
			'email' => Session::get('email'),
			'firstname' => Session::get('firstname'),
			'lastname' => Session::get('lastname'),
		);

		return View::make('admin.user_edit_form', $data);
	}
}