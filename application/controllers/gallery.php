<?php

class Gallery_Controller extends Base_Controller 
{
	public function action_index()
	{
		$page = Page::find(5);
		$text = Content::where('page_id', '=', 5)->get();
		$images = Image::where('type', '=', 'gallery_image')->get();

		$data = array(
			'main_text' => '',
			'side_text' => ''
		);

		if(!empty($page))
			$data['page'] = $page;

		if(!empty($text))
		{
			foreach($text as $part)
			{
				if($part->type == 'main')
					$data['main_text'] = $part;

				if($part->type == 'side')
					$data['side_text'] = $part;
			}
		}

		if(!empty($images))
		{
			foreach($images as $image)
			{
				$image->filename = str_replace('.jpg','_thumb.jpg', $image->filename);
			}
			$data['images'] = $images;
		}

		return View::make('front.gallery.index', $data);
	}

}