<?php

class Admin_Biography_Controller extends Admin_Base_Controller 
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

	public function action_edit_band_text()
	{
		$data = array(
			'band_text_title' => '',
			'band_text' => '',
		);

		$band_text = Content::find(4);

		if($band_text)
			$data['band_text'] = $band_text;

		return View::make('admin.biography.edit_band_text_form', $data);
	}

	public function action_update_band_text()
	{
		$input = array(
        	'band_text_title'	=> Input::get('band_text_title'),
        	'band_text' 		=> Input::get('band_text'),
	    );

	    $rules = array(
		    'band_text_title'  => 'required|alpha_dash|max:20',
		    'band_text' 		=> 'required|max:2000',
		);

		$validation = Validator::make($input, $rules);

		$html_clean = Purifier::clean($input);

		if($validation->fails())
		{
			return Redirect::to('admin/biography/edit/band_text')
				->with_errors($validation->errors)
				->with_input();
		}

		$band_text = Content::find(4);
		$band_text->title = $html_clean['band_text_title'];
		$band_text->content = $html_clean['band_text'];
		$band_text->save();

		Session::flash('success', 'band text updated.');

		return Redirect::to('admin/biography/edit/band_text');
	}

	public function action_edit_band_image()
	{
		// dd(read_exif_data('public/uploads/biography/16c8c8c7d8fd06bb5994e432ac8247e46fda1a26.jpg'));

		$band_image = Image::where('type', '=', 'band_image')->first();
		$data = array(
			'band_image' => $band_image,
		);
		return View::make('admin.biography.edit_band_image_form', $data);
	}

	public function action_update_band_image()
	{
		$image['band_image'] = Input::file('band_image');
		$extension = File::extension($image['band_image']['name']);
		$filename = sha1(Auth::user()->id . time()) . '.' . Str::lower($extension);
		$path = Image::$uploads_dir . 'biography/';

		$validation = Image::validate_big_image($image);

		if($validation !== true)
		{
			return Redirect::to('admin/biography/edit/band_image')
				->with_errors($validation->errors);
		}

		$image['band_image']['new_filename'] = $filename;

		$upload_success = Image::upload('band_image', $image['band_image']);

		if($upload_success)
		{		
			if(!(Image::resize_to_dimension(1024, $path, $filename, $extension, $path . $filename)))
				Log::write('error', 'Image model: resize_down() failed');

			// if(!(Image::create_thumbs($filepath)))
			// 	Log::write('error', 'Image model: create_thumbs() failed');

			$new_image = Image::find(5);
			$new_image->filename 	= $filename;
			$new_image->order 		= 0;
			$new_image->size		= $image['band_image']['size'] / 1024;
		    $new_image->type		= 'band_image';
		    if($new_image->save())
		    {
		    	Session::flash('success', 'band image updated');
		    }
		    else
		    {
		    	Log::write('error', 'Admin.Biography controller: Failed to insert image info to database.');
		    }
		}
		else
		{
			Session::flash('status_error', 'An error occurred while uploading a new band image - please try again.');
		}
		    
		return Redirect::to('admin/biography/edit/band_image');
	}

}