<?php

class Admin_Home_Controller extends Admin_Base_Controller 
{
	public function action_index()
	{
		$data = array(
			'user_id' => Session::get('user_id'),
			'firstname' => Session::get('firstname'),
			'lastname' => Session::get('lastname'),
		);
		
		return View::make('admin.home.index', $data);
	}

	public function action_edit_intro_text()
	{
		$data = array(
			'intro_text_title' => '',
			'intro_text' => '',
		);

		$intro_text = Content::find(1);

		if($intro_text)
			$data['intro_text'] = $intro_text;

		return View::make('admin.home.edit_intro_text_form', $data);
	}

	public function action_update_intro_text()
	{
		$input = array(
        	'intro_text_title'	=> Input::get('intro_text_title'),
        	'intro_text' 		=> Input::get('intro_text'),
	    );

	    $rules = array(
		    'intro_text_title'  => 'required|alpha_dash|max:20',
		    'intro_text' 		=> 'required|max:2000',
		);

		$validation = Validator::make($input, $rules);

		$html_clean = Purifier::clean($input);



		if($validation->fails())
		{
			return Redirect::to('admin/home/edit/intro_text')
				->with_errors($validation->errors)
				->with_input();
		}

		$intro_text = Content::find(1);
		$intro_text->title = $html_clean['intro_text_title'];
		$intro_text->content = $html_clean['intro_text'];
		$intro_text->save();

		Session::flash('success', 'Intro text updated.');

		return Redirect::to('admin/home/edit/intro_text');
	}

	public function action_edit_intro_image()
	{
		$data = array();
		return View::make('admin.home.edit_intro_image_form', $data);
	}

	public function action_update_intro_image()
	{
		$image['intro_image'] = Input::file('intro_image');
		$width = getimagesize($image['intro_image']['tmp_name'])[1];
		$height = getimagesize($image['intro_image']['tmp_name'])[0];

		$validation = Image::validate_intro_image($image);

		if($validation !== true)
		{
			return Redirect::to('admin/home/edit/intro_image')
				->with_errors($validation->errors);
		}

		Session::flash('success', 'Intro image updated.');

		return Redirect::to('admin/home/edit/intro_image');

	}

	public function action_edit_intro_video()
	{
		$data = array();

		$intro_video = Content::find(3);

		if(!empty($intro_video))
			$data['intro_video'] = $intro_video;

		return View::make('admin.home.edit_intro_video_form', $data);	
	}

	public function action_update_intro_video()
	{
		if(Input::has('intro_video_url'))
		{
			$input['content'] = Input::get('intro_video_url');

			$rules = array(
				'content' => 'required|url',
			);

			$validation = Validator::make($input, $rules);

			if($validation->fails())
			{
				return Redirect::to('admin/home/edit/intro_video')
					->with_errors($validation->errors)
					->with_input();
			}

			$video_id = Content::get_youtube_embed(Input::get('intro_video_url'));

			if($video_id !== false)
				$input['content'] = 'http://www.youtube.com/embed/' . $video_id;
			else
				return Redirect::to('admin/home/edit/intro_video');

			$intro_video = Content::find(3);
			$intro_video->content = $input['content'];

			if($intro_video->save() == false)
			{
				Log::write('error', 'Could not save the new intro video url');
				return Redirect::to('admin/home/edit/intro_video');
			}

			Session::flash('success', 'Intro video updated.');
			return Redirect::to('admin/home/edit/intro_video');
		}
	}

}