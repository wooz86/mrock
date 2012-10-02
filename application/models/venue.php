<?php

class Venue extends Eloquent
{
	public static $table = 'venues';
	public static $timestamps = true;

	public static $rules_new = array(
		'id'	=> 'integer',
		'title' => 'required|unique:venues|alpha_num|max:200',
		'url' 	=> 'required|url',
	);
	public static $rules_update = array(
		'id'	=> 'integer',
		'title' => 'required|alpha_num|max:200',
		'url' 	=> 'required|url',
	);

	public function gig()
	{
		return $this->has_one('gig');
	}

	public static function validate($input, $new = true)
	{
		if($new == false)
		{
			$validation = Validator::make($input, static::$rules_update);
		}
		else
			$validation = Validator::make($input, static::$rules_new);

		return $validation->fails() ? $validation : true;
	}

	public static function db_save($input, $return_id = false) 
	{
		$new_venue = new Venue;
		$new_venue->title = $input['title'];
		$new_venue->url = $input['url'];
		$new_venue->save();
		$venue_id = $venue->id;
		
		if($return_id == true)
		{
			if(!empty($venue_id))
				return $venue_id;
		}
		else
		{
			if(!empty($venue_id))
				return true;
		}
		return false;
	}

	public static function db_update($input) 
	{
		$venue = Venue::find($input['id']);
    	$venue->title = $input['title'];
    	$venue->url = $input['url'];
	    
	    if($venue->save())
	    	return true;

	    return false;
	}

}