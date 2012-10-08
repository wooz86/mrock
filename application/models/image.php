<?php

use Imagine\Image\Box;
use Imagine\Image\Point;

class Image extends Eloquent
{
	public static $table 		= 'images';
	public static $timestamps 	= true;

	public static $uploads_dir 	= 'public/uploads/';

	public static $rules = array(
		'image' => 'required|mimes:jpg,png,bmp|max:2000|minwidth:940|minheight:400'
	);

	public function member()
	{
		return $this->has_one('Member');
	}

	public static function validate_big_image($input)
	{
		if(isset($input['intro_image']))
		{
			static::$rules['intro_image'] = static::$rules['image'];
			unset(static::$rules['image']);
		}
		if(isset($input['band_image']))
		{
			static::$rules['band_image'] = static::$rules['image'];
			unset(static::$rules['image']);
		}

		if(isset($input['member_image']))
		{
			static::$rules['member_image'] = static::$rules['image'];
			unset(static::$rules['image']);
		}

		$validation = Validator::make($input, static::$rules);

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
			case 'member_image':
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

	public static function resize_to_dimension($dimension, $path, $sourceFile, $extension, $destination, $smallerVariant = '580')
	{
		$source = $path . $sourceFile;
		$destination = $path . $sourceFile;

		$size = getimagesize($source);
		$width = $size[0];
		$height = $size[1];

		if($width < $dimension || $height < $dimension)
			return false;

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
		$imageCreated = imagejpeg($destinationImage, $destination, 100);

		if($smallerVariant)
		{
			$sourceSize = getimagesize($source);
			$width = $sourceSize[0];
			$height = $sourceSize[1];

			$percentage = ($width >= $height) ? 100 / $width * $smallerVariant : 100 / $height * $smallerVariant;
			$newWidth = $width / 100 * $percentage;
			$newHeight = $height / 100 * $percentage;
			$new_filename = str_replace('.jpg', '', $sourceFile) . '_580.jpg';

			$imagine = new Imagine\Gd\Imagine();
			$image = $imagine->open($source);
			$resized = $image->resize(new Box($newWidth, $newHeight))->save($path . $new_filename);
		}

		if($imageCreated)
			return true;

		return false;
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

	public static function create_thumb($path, $filename, $size = 200)
	{
		$source = $path . $filename;

		$imagine = new Imagine\Gd\Imagine();
		$image = $imagine->open($source);

		$imagedata = getimagesize($source);
		$width = $imagedata[0];
		$height = $imagedata[1];

		if($width < $size || $height < $size)
			return false;

		if($width > $height)
		{
			$new_height = 1.75 * $size;
			$new_width = $new_height * ($width / $height);
		}
		if($height > $width)
		{
			$new_width = 1.75 * $size;
			$new_height = $new_width * ($height / $width);
		}
		if($height == $width)
		{
			$new_width = 1.75 * $size;
			$new_height = 1.75 * $size;
		}

		$new_width = round($new_width);
		$new_height = round($new_height);

		$new_filename = str_replace('.jpg', '', $filename) . '_thumb.jpg';
		$resized = $image->resize(new Box($new_width, $new_height))->save($path . $new_filename);

		$image = $imagine->open($path . $new_filename);

		$boxSize = new Box($new_width, $new_height);
		$center  = new Imagine\Image\Point\Center($boxSize);

		$x = $center->getX() - ($size / 2);
		$y = $center->getY() - ($size / 2);

		$startPoint = new Point($x, $y);

		$cropped = $image->crop($startPoint, new Box($size, $size))->save($path . $new_filename);

		if($cropped)
			return true;
		else
			return false;
	}
}