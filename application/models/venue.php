<?php

class Venue extends Eloquent
{
	public static $table = 'venues';
	public static $timestamps = true;

	public static $rules = array(
		'id'	=> 'integer',
		'title' => 'required|unique:venues|alpha_num|max:200',
		'url' 	=> 'required|url',
	);

	public function gig()
	{
		return $this->has_one('gig');
	}

	public static function validate($input)
	{
		if(isset($input['id']))
			static::$rules['title'] = 'required|unique:venues,title,' . $input['id'] . '|alpha_num|max:200';
		
		$validation = Validator::make($input, static::$rules);

		return $validation->fails() ? $validation : true;
	}

	public static function db_save($input, $return_id = false) 
	{
		$new_venue = new Venue;
		$new_venue->title = $input['title'];
		$new_venue->url = $input['url'];
		$new_venue->save();
		$venue_id = $new_venue->id;
		
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