<?php

class Music_Controller extends Base_Controller 
{
	public function action_index()
	{
		$page = Page::find(2);
		$text = Content::where('page_id', '=', 2)->get();

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
		return View::make('front.music.index', $data);
	}

}