<?php

class Admin_Gallery_Controller extends Admin_Base_Controller 
{
	public function action_index()
	{
		$images = Image::where('type', '=', 'gallery_image')->get();

		if(!empty($images))
		{
			foreach($images as $image)
			{
				$image->filename = str_replace('.jpg','_thumb.jpg', $image->filename);
			}
			$data['images'] = $images;
		}

		return View::make('admin.gallery.index', $data);
	}

	public function action_save()
	{
		$input = array(
			'gallery_image' => Input::file('gallery_image'),
			'caption' 		=> Input::get('caption'),
		);

		$validation = Image::validate_big_image($input);

    	if($validation !== true)
    	{
    		return Redirect::to('admin/gallery')
				->with_errors($validation->errors)
				->with_input();
    	}
    	
    	$extension = File::extension($input['gallery_image']['name']);
		$filename = sha1(Auth::user()->id . time()) . '.' . Str::lower($extension);
		$path = Image::$uploads_dir . 'gallery/';

		$input['gallery_image']['new_filename'] = $filename;

		$upload_success = Image::upload('gallery_image', $input['gallery_image']);

		if($upload_success)
		{		
			if(!(Image::resize_to_dimension(1024, $path, $filename, $extension, $path . $filename)))
				Log::write('error', 'Image model: resize_down() failed');

			if(!(Image::create_thumb($path, $filename)))
				Log::write('error', 'Image model: create_thumbs() failed');

			$gallery_image = new Image;
			$gallery_image->filename 	= $filename;
			$gallery_image->caption 	= $input['caption'];
			$gallery_image->order 		= 0;
			$gallery_image->size		= $input['gallery_image']['size'] / 1024;
		    $gallery_image->type		= 'gallery_image';

		    if($gallery_image->save())
		    {
		    	Session::flash('success', 'Gallery image added');
		    }
		    else
		    {
		    	Log::write('error', 'Admin.Gallery controller: Failed to insert image info to database.');
		    }
		}
		else
		{
			Session::flash('status_error', 'An error occurred while uploading a new gallery image - please try again.');
		}

		return Redirect::to('admin/gallery');
	}

}