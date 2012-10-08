<?php

class Admin_Members_Controller extends Admin_Base_Controller 
{
	public function action_index()
	{
		$data = array();
		$members = Member::with('image')->all();
		if(!empty($members))
		{
			foreach($members as $member)
			{
				if(!empty($member->image))
				{
					$member->image->filename = str_replace('.jpg','_thumb.jpg', $member->image->filename);
				}
				$member->created_at = date('Y-m-d H:i', strtotime($member->created_at));
				$member->updated_at = date('Y-m-d H:i', strtotime($member->updated_at));
			}
			$data['members'] = $members;
		}
		return View::make('admin.members.index', $data);
	}

	public function action_save()
	{
		$data = array(
		);

		$input = array(
			'firstname' 	=> Input::get('firstname'),
			'lastname' 		=> Input::get('lastname'),
			'info' 			=> Input::get('info'),
		);

		$validation = Member::validate($input);

    	if($validation !== true)
    	{
    		return Redirect::to('admin/members')
				->with_errors($validation->errors)
				->with_input();
    	}

    	$image['member_image'] = Input::file('member_image');

    	if(!empty($image['member_image']['name']))
    	{
    		$image_validation = Image::validate_big_image($image);

	    	if($image_validation !== true)
	    	{
	    		return Redirect::to('admin/members')
					->with_errors($image_validation->errors)
					->with_input();
	    	}

    		$extension = File::extension($image['member_image']['name']);
			$filename = sha1(Auth::user()->id . time()) . '.' . Str::lower($extension);
			$path = Image::$uploads_dir . 'members/';

			$image['member_image']['new_filename'] = $filename;

			$upload_success = Image::upload('member_image', $image['member_image']);

			if($upload_success)
			{		
				if(!(Image::resize_to_dimension(1024, $path, $filename, $extension, $path . $filename)))
					Log::write('error', 'Image model: resize_down() failed');

				if(!(Image::create_thumb($path, $filename)))
					Log::write('error', 'Image model: create_thumbs() failed');

				$member_image = new Image;
				$member_image->filename 	= $filename;
				$member_image->order 		= 0;
				$member_image->size			= $image['member_image']['size'] / 1024;
			    $member_image->type			= 'member_image';

			    if($member_image->save())
			    {
			    	$input['image_id'] = $member_image->id;
			    	Session::flash('success', 'Member image updated');
			    }
			    else
			    {
			    	Log::write('error', 'Admin.Home controller: Failed to insert image info to database.');
			    }
			}
			else
			{
				Session::flash('status_error', 'An error occurred while uploading a new member image - please try again.');
			}
    	}

    	if(Member::db_save($input, false) == false)
    		Log::write('error', 'Member Model: db_save() failed.');

    	Session::flash('success', 'Member added.');

    	return Redirect::to('admin/members');
		
	}

	public function action_edit($id)
	{
		$member = Member::with('image')->find($id);

		if(!empty($member))
		{
			$data['member'] = $member;
			
			if(!empty($member->image))
			{
				$data['member']->image->filename = str_replace('.jpg','_580.jpg', $member->image->filename);
			}
		}

		return View::make('admin.members.edit_member_form', $data);
	}

	public function action_update()
	{
		$input = array(
			'id'		 	=> Input::get('id'),
			'firstname' 	=> Input::get('firstname'),
			'lastname' 		=> Input::get('lastname'),
			'info' 			=> Input::get('info'),
		);

		$validation = Member::validate($input);

    	if($validation !== true)
    	{
    		return Redirect::to('admin/member/' . Input::get('id') . '/edit')
				->with_errors($validation->errors)
				->with_input();
    	}

    	$input = Purifier::clean($input);

    	$image['member_image'] = Input::file('member_image');
    	
    	if(!empty($image['member_image']['name']))
    	{
       		$image_validation = Image::validate_big_image($image);

	    	if($image_validation !== true)
	    	{
	    		return Redirect::to('admin/member/' . Input::get('id') . '/edit')
					->with_errors($image_validation->errors)
					->with_input();
	    	}

    		$extension = File::extension($image['member_image']['name']);
			$filename = sha1(Auth::user()->id . time()) . '.' . Str::lower($extension);
			$path = Image::$uploads_dir . 'members/';

			$image['member_image']['new_filename'] = $filename;

			$upload_success = Image::upload('member_image', $image['member_image']);

			if($upload_success)
			{		
				if(!(Image::resize_to_dimension(1024, $path, $filename, $extension, $path . $filename)))
					Log::write('error', 'Image model: resize_down() failed');

				if(!(Image::create_thumb($path, $filename)))
					Log::write('error', 'Image model: create_thumbs() failed');

				$member = Member::find($input['id']);

				if(!empty($member->image_id))
					$member_image = Image::find($member->image_id);

				else				
					$member_image = new Image;
				
				$member_image->filename 	= $filename;
				$member_image->order 		= 0;
				$member_image->size			= $image['member_image']['size'] / 1024;
			    $member_image->type			= 'member_image';

			    if($member_image->save())
			    {
			    	$input['image_id'] = $member_image->id;
			    	Session::flash('success', 'Member image updated');
			    }
			    else
			    {
			    	Log::write('error', 'Admin.Home controller: Failed to insert image info to database.');
			    }
			}
			else
			{
				Session::flash('status_error', 'An error occurred while uploading a new member image - please try again.');
			}
    	}
    				 
    	if(Member::db_update($input) == false)
    	{
    		Log::write('error', 'Member Model: db_update() failed.');
    		return Redirect::to('admin/members');
    	}
    	
		Session::flash('success', 'Member updated.');
		return Redirect::to('admin/members');
	}
}