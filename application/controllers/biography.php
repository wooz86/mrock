<?php

class Biography_Controller extends Base_Controller 
{
	public function action_index()
	{
		$page = Page::find(3);
		$text = Content::where('page_id', '=', 3)->get();
		$band_image = Image::where('type', '=', 'band_image')->first();

		$data = array(
			'main_text' => '',
			'side_text' => ''
		);

		if(!empty($page))
			$data['page'] = $page;

		if(!empty($band_image))
		{
			$data['band_image'] = $band_image;
			// $data['band_image']->filename = str_replace('.jpg','_580.jpg', $band_image->filename);
		}

		if(!empty($text))
		{
			foreach($text as $part)
			{
				if($part->type == 'band_text')
					$data['band_text'] = $part;
			}
		}
		return View::make('front.biography.index', $data);
	}

}