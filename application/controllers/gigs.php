<?php

class Gigs_Controller extends Base_Controller 
{
	public function action_index()
	{
		$page = Page::find(4);
		$text = Content::where('page_id', '=', 4)->get();
		// $gigs = Gig::with('venue')->where('date', '>=', time())->get();
		$gigs = Gig::with('venue')->all();

		$data = array(
			'main_text' => '',
			'side_text' => '',
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

		if(!empty($gigs))
			$data['gigs'] = $gigs;

		return View::make('front.gigs.index', $data);
	}

}