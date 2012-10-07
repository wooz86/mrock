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
		// dd(read_exif_data('public/uploads/home/16c8c8c7d8fd06bb5994e432ac8247e46fda1a26.jpg'));

		$intro_image = Image::where('type', '=', 'intro_image')->first();
		$data = array(
			'intro_image' => $intro_image,
		);
		return View::make('admin.home.edit_intro_image_form', $data);
	}

	public function action_update_intro_image()
	{
		$image['intro_image'] = Input::file('intro_image');
		$extension = File::extension($image['intro_image']['name']);
		$filename = sha1(Auth::user()->id . time()) . '.' . Str::lower($extension);
		$filepath = Image::$uploads_dir . 'home/' . $filename;

		$validation = Image::validate_intro_image($image);

		if($validation !== true)
		{
			return Redirect::to('admin/home/edit/intro_image')
				->with_errors($validation->errors);
		}

		$image['intro_image']['new_filename'] = $filename;

		$upload_success = Image::upload('intro_image', $image['intro_image']);

		if($upload_success)
		{		
			if(!(Image::resize_to_dimension(1024, $filepath, $extension, $filepath)))
				Log::write('error', 'Image model: resize_down() failed');

			// if(!(Image::create_thumbs($filepath)))
			// 	Log::write('error', 'Image model: create_thumbs() failed');

			$new_image = Image::find(4);
			$new_image->filename 	= $filename;
			$new_image->order 		= 0;
			$new_image->size		= $image['intro_image']['size'] / 1024;
		    $new_image->type		= 'intro_image';
		    if($new_image->save())
		    {
		    	Session::flash('success', 'Intro image updated');
		    }
		    else
		    {
		    	Log::write('error', 'Admin.Home controller: Failed to insert image info to database.');
		    }
		}
		else
		{
			Session::flash('status_error', 'An error occurred while uploading a new intro image - please try again.');
		}
		    
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