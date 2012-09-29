<?php

class Admin_Gigs_Controller extends Base_Controller 
{
	public function action_index()
	{
		$page = Page::find(4);
		$text = Content::where('page_id', '=', 4)->get();
		// $gigs = Gig::where('date', '>=', time());
		$gigs = Gig::with('venue')->all();
		$venues = Venue::get(array('id', 'title'));

		// dd($venues);

		$data = array(
			'main_text' => '',
			'side_text' => ''
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

	public function action_add()
	{
		$data = array();

		return View::make('admin.gigs.add_gig_form', $data);	
	}

	public function action_edit($id)
	{

		dd('This page is used to edit gig no: ' . $id);
		$data = array();

		return View::make('admin.gigs.edit_gig_form', $data);	
	}

	public function action_save()
	{
		
	}

}