<?php

class Admin_Gigs_Controller extends Admin_Base_Controller 
{
	public function action_index()
	{

		$page 	= Page::find(4);
		$text 	= Content::where('page_id', '=', 4)->get();
		$gigs 	= Gig::with('venue')->all();
		$venues = Venue::get(array('id', 'title'));

		foreach($gigs as $gig)
		{
			$gig->date = date('Y-m-d H:i', strtotime($gig->date));
			$gig->created_at = date('Y-m-d H:i', strtotime($gig->created_at));
			$gig->updated_at = date('Y-m-d H:i', strtotime($gig->updated_at));
		}

		$data = array(
			'main_text' => '',
			'side_text' => '',
			'years' 	=> Gig::get_years(),
			'months' 	=> Gig::$months,
			'days' 		=> Gig::$days,
			'hours'		=> Gig::$hours,
			'minutes'	=> Gig::$minutes,
		);

		if(!empty($page))
			$data['page'] = $page;

		if(!empty($text))
		{
			foreach($text as $part)
			{
				if($part->type == 'main')
					$data['main_text'] = $part;

				if($part->type == 'side')
					$data['side_text'] = $part;
			}
		}

		if(!empty($venues))
		{
			foreach($venues as $venue)
				$venues_array[$venue->id] = $venue->title;

			$data['venues'] = $venues_array;
		}

		if(!empty($gigs))
			$data['gigs'] = $gigs;

		return View::make('admin.gigs.index', $data);
	}
 
	public function action_edit($id)
	{

		dd('This page is used to edit gig no: ' . $id);
		$data = array();

		return View::make('admin.gigs.edit_gig_form', $data);	
	}

	public function action_save()
	{
		$input = array(
			'ticket_url' 	=> Input::get('ticket_url'),
		);

		if(Gig::check_date(Input::get('date_year'), Input::get('date_month'), Input::get('date_day')) == false)
			return Redirect::to('admin/gigs');

		$input['date'] = Input::get('date_year') . '-' . Input::get('date_month') . '-' . Input::get('date_day') . ' ' . Input::get('date_hour') . ':' . Input::get('date_minute') . ':00';
		
		$validation = Gig::validate($input);

		if(Input::has('new_venue_title') || Input::has('new_venue_url'))
		{
			$venue_input = array(
				'title' =>	Input::get('new_venue_title'),
				'url'	=>	Input::get('new_venue_url'),
			);

			$validation = Venue::validate($venue_input);

			if($validation !== true)
	    		return Redirect::to('admin/gigs')
					->with_errors($validation->errors)
					->with_input();
			
			$input['venue_id'] = Venue::db_save($venue_input, true);
		}
		else
		{
			if(is_numeric(Input::get('venue')))
			{	
				if(Venue::find(Input::get('venue')))
					$input['venue_id'] = Input::get('venue');
			}
			else
				return Redirect::to('admin/gigs');
		}

		if(Gig::db_save($input) !== true)
			return Redirect::to('admin/gigs');
		

		Session::flash('success', 'Gig added.');
		return Redirect::to('admin/gigs');
	}

}