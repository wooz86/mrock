<?php

class Image extends Eloquent
{
	public static $table = 'images';
	public static $timestamps = true;

	public static $intro_image_rules = array(
		// 'intro_image' => 'image|max:2000|min_width:940'
		'intro_image' => 'required|image|max:2000|min_width:940|min_height:400'
	);

	public static function validate_intro_image($input)
	{
		$validation = Validator::make($input, static::$intro_image_rules);

		return $validation->fails() ? $validation : true;
	}

}