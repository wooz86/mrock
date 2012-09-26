<?php

class Biography_Controller extends Base_Controller 
{
	public function action_index()
	{
		$page = Page::find(3);
		$text = Content::where('page_id', '=', 3)->get();

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
		return View::make('front.biography.index', $data);
	}

}