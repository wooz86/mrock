<?php

use Imagine\Image\Box;
use Imagine\Image\Point;

class Image extends Eloquent
{
	public static $table 		= 'images';
	public static $timestamps 	= true;

	public static $uploads_dir 	= 'public/uploads/';
	
	public static $thumbs = array(
		'small' => array(
			'width' 	=> 200,
			'height' 	=> 200,
		),
		'medium' => array(
			'width' 	=> 200,
			'height' 	=> 200,
		),
	);

	public static $intro_image_rules = array(
		'intro_image' => 'required|mimes:jpg,png,bmp|max:2000|minwidth:940|minheight:400'
	);

	public static function validate_intro_image($input)
	{
		$validation = Validator::make($input, static::$intro_image_rules);

		return $validation->fails() ? $validation : true;
	}

	public static function set_upload_dir($key)
	{
		switch($key) 
		{
			case 'intro_image':
				return $directory = static::$uploads_dir . 'home/';
			break;
			case 'biography':
				return $directory = static::$uploads_dir . 'biography/';
			break;
			case 'member':
				return $directory = static::$uploads_dir . 'members/';
			break;
			case 'gallery':
				return $directory = static::$uploads_dir . 'gallery/';
			break;
			default:
       			return $directory = static::$uploads_dir . 'misc/';
		}
		return false;
	}

	public static function resize_down($path, $filename)
	{
		$imagine 	= new Imagine\Gd\Imagine();
		$image 	 	= $imagine->open($path . $filename);
		$width 	 	= getimagesize($path.$filename)[1];
		$height  	= getimagesize($path.$filename)[0];

		$ratio 		= 1024 / $width;
		$new_width  = round($ratio * $width);
		$new_height = round($ratio * $height);

		$size = new Imagine\Image\Box($width, $height);

		$resized = $image->resize($size->scale($ratio))->save($path . $filename);

		if($resized)
			return true;
		else
			return false;
	}

	public static function upload($key, $input)
	{		
		$directory = static::set_upload_dir($key);
		$file_upload = Input::upload($key, $directory, $input['new_filename']);

		if($file_upload)
			return true;
		else
			return false;
	}

	public static function create_thumbs($path, $filename)
	{
		$imagine = new Imagine\Gd\Imagine();
		$image = $imagine->open($path . $filename);

		$resized = $image->resize(new Box(1024, 768))->save($path . $filename);

		if($resized)
			return true;
		else
			return false;
	}
}