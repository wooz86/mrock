<?php

class Admin_Venues_Controller extends Admin_Base_Controller 
{
	public function action_index()
	{
		$data = array();

		$venues = Venue::get(array('id', 'title', 'url'));

		if(!empty($venues))
			$data['venues'] = $venues;

		return View::make('admin.venues.index', $data);
	}

	public function action_save()
	{
		$data = array(
		);

		$input = array(
			'title' => Input::get('title'),
			'url' => Input::get('url'),
		);

		$rules = array(
			'title' => 'required|unique:venues|alpha_num|max:200',
			'url' => 'required|url',
		);

		$validation = Validator::make($input, $rules);

		// CSRF Protection
	    $token = Session::token();
	    $csrf_input = Input::get('csrf_token');

	    if ($csrf_input === $token)
	    {
	    	if($validation->fails())
	    	{
	    		return Redirect::to('admin/venues')
					->with_errors($validation->errors)
					->with_input();
	    	}
	    	
	    	$venue = new Venue;
	    	$venue->title = Input::get('title');
	    	$venue->url = Input::get('url');
	    	$venue->save();

	    	Session::flash('success', 'Venue added.');

	    	return Redirect::to('admin/venues');
		}


		return View::make('admin.venues.index', $data);
	}

	public function action_edit($id)
	{
		$data = array();

		$venue = Venue::find($id);

		if(!empty($venue))
		{
			$data['venue'] = $venue;
		}

		
		return View::make('admin.venues.edit_venue_form', $data);
	}
}