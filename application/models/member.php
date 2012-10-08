<?php

class Member extends Eloquent
{
	public static $rules = array(
		'id' 			=> 'integer',
		'firstname' 	=> 'required|alpha|max:50',
		'lastname' 		=> 'required|alpha|max:50',
		'info' 			=> 'max:2000',
	);

	public function image()
	{
		return $this->belongs_to('Image');
	}

	public static function validate($input)
	{
		$validation = Validator::make($input, static::$rules);

		return $validation->fails() ? $validation : true;
	}

	public static function db_save($input, $return_id = false) 
	{
		$member = new Member;
		$member->firstname 	= $input['firstname'];
		$member->lastname 	= $input['lastname'];
		$member->info 		= $input['info'];
    	
    	if(!empty($input['image_id']))
    		$member->image_id = $input['image_id'];
		
		$member->save();
		$member_id = $member->id;
		
		if($return_id == true)
		{
			if(!empty($member_id))
				return $member_id;
		}
		else
		{
			if(!empty($member_id))
				return true;
		}
		return false;
	}

	public static function db_update($input) 
	{
		$member = Member::find($input['id']);
    	$member->firstname 	= $input['firstname'];
    	$member->lastname 	= $input['lastname'];
    	$member->info 		= $input['info'];
    	
    	if(!empty($input['image_id']))
    		$member->image_id = $input['image_id'];
	    
	    if($member->save())
	    	return true;

	    return false;
	}
}