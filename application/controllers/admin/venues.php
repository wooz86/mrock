<?php

class Admin_Venues_Controller extends Admin_Base_Controller 
{
	public function action_index()
	{
		$data = array();
		$venues = Venue::all();

		foreach($venues as $venue)
		{
			$venue->created_at = date('Y-m-d H:i', strtotime($venue->created_at));
			$venue->updated_at = date('Y-m-d H:i', strtotime($venue->updated_at));
		}

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

		$validation = Venue::validate($input);

    	if($validation !== true)
    	{
    		return Redirect::to('admin/venues')
				->with_errors($validation->errors)
				->with_input();
    	}

    	if(Venue::db_save($input, false) == false)
    		Log::write('error', 'Venue Model: db_save() failed.');

    	Session::flash('success', 'Venue added.');

    	return Redirect::to('admin/venues');
		
	}

	public function action_edit($id)
	{
		$venue = Venue::find($id);

		if(!empty($venue))
		{
			$data['venue'] = $venue;
		}

		return View::make('admin.venues.edit_venue_form', $data);
	}

	public function action_update()
	{
		$input = array(
			'id' 	=> Input::get('id'),
			'title' => Input::get('title'),
			'url' 	=> Input::get('url'),
		);

		$validation = Venue::validate($input);

    	if($validation !== true)
    	{
    		return Redirect::to('admin/venue/' . Input::get('id') . '/edit')
				->with_errors($validation->errors)
				->with_input();
    	}
    	
    	if(Venue::db_update($input) == false)
    	{
    		Log::write('error', 'Venue Model: db_update() failed.');
    		return Redirect::to('admin/venues');
    	}
    	
		Session::flash('success', 'Venue updated.');
		return Redirect::to('admin/venues');
	}
}