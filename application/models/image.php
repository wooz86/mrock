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

	public static function upload($key, $input)
	{		
		$directory = static::set_upload_dir($key);

		$file_upload = Input::upload($key, $directory, $input['new_filename']);

		if($file_upload)
			return true;
		else
			return false;
	}

	public static function resize_to_dimension($dimension, $source, $extension, $destination)
	{
		$size = getimagesize($source);
		$width = $size[0];
		$height = $size[1];

		//determine what the file extension of the image
		switch($extension)
		{
			case 'gif': case 'GIF':
				$sourceImage = imagecreatefromgif($source);
				break;
			case 'jpg': case 'JPG': case 'jpeg':
				$sourceImage = imagecreatefromjpeg($source);
				break;
			case 'png': case 'PNG':
				$sourceImage = imagecreatefrompng($source);
				break;
		}

		// find the largest dimension of the image
		// then calculate the resize perc based upon that dimension
		$percentage = ($width >= $height) ? 100 / $width * $dimension : 100 / $height * $dimension;

		// define new width / height
		$newWidth = $width / 100 * $percentage;
		$newHeight = $height / 100 * $percentage;

		// create a new image
		$destinationImage = imagecreatetruecolor($newWidth, $newHeight);

		// copy resampled
		imagecopyresampled($destinationImage, $sourceImage, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);

	    // exif only supports jpg in our supported file types
	    if ($extension == "jpg" || $extension == "jpeg")
		{
			$exif = exif_read_data($source);
			$ort = $exif['Orientation'];

			// determine what oreientation the image was taken at
			switch($ort)
		    {
		        case 2: // horizontal flip
		            $this->ImageFlip($dimg);
		        	break;

		        case 3: // 180 rotate left
		            $destinationImage = imagerotate($destinationImage, 180, -1);
		        	break;

		        case 4: // vertical flip
		            $this->ImageFlip($dimg);
		       		break;

		        case 5: // vertical flip + 90 rotate right
		            $this->ImageFlip($destinationImage);
		            $destinationImage = imagerotate($destinationImage, -90, -1);
		        	break;

		        case 6: // 90 rotate right
		            $destinationImage = imagerotate($destinationImage, -90, -1);
		        	break;

		        case 7: // horizontal flip + 90 rotate right
		            $this->ImageFlip($destinationImage);
		            $destinationImage = imagerotate($destinationImage, -90, -1);
		        	break;

		        case 8: // 90 rotate left
		            $destinationImage = imagerotate($destinationImage, 90, -1);
		        	break;
		    }
		}

		// create the jpeg
		return imagejpeg($destinationImage, $destination, 100);

	}

	public function ImageFlip(&$image, $x = 0, $y = 0, $width = null, $height = null)
	{

	    if ($width  < 1) $width  = imagesx($image);
	    if ($height < 1) $height = imagesy($image);

	    // Truecolor provides better results, if possible.
	    if (function_exists('imageistruecolor') && imageistruecolor($image))
	        $tmp = imagecreatetruecolor(1, $height);
	    else
	        $tmp = imagecreate(1, $height);

	    $x2 = $x + $width - 1;

	    for ($i = (int)floor(($width - 1) / 2); $i >= 0; $i--)
	    {
	        // Backup right stripe.
	        imagecopy($tmp, $image, 0, 0, $x2 - $i, $y, 1, $height);

	        // Copy left stripe to the right.
	        imagecopy($image, $image, $x2 - $i, $y, $x + $i, $y, 1, $height);

	        // Copy backuped right stripe to the left.
	        imagecopy($image, $tmp, $x + $i,  $y, 0, 0, 1, $height);
	    }
		imagedestroy($tmp);
		return true;
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