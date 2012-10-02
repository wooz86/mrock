<?php

class Content extends Eloquent
{

	public static $table = 'content';
	public static $timestamps = true;

	public function page()
	{
		return $this->belongs_to('Page');
	}

	public static function get_youtube_embed($video_url)
	{
		if(strpos($video_url, 'youtube.com/embed/') !== false)
			preg_match('/[\\/]embed\\/([^\\?\\&]+)/', $video_url, $matches);

		if(strpos($video_url, 'youtu.be/') !== false)
			preg_match('/[\\/]([^\\?\\&]+)/', $video_url, $matches);


		else
			preg_match('/[\\?\\&]v=([^\\?\\&]+)/', $video_url, $matches);

		if(!empty($matches))
			return $matches;
		
		return false;
	}
    
}