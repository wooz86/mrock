<?php

class Home_Controller extends Base_Controller 
{

	/*
	|--------------------------------------------------------------------------
	| The Default Controller
	|--------------------------------------------------------------------------
	|
	| Instead of using RESTful routes and anonymous functions, you might wish
	| to use controllers to organize your application API. You'll love them.
	|
	| This controller responds to URIs beginning with "home", and it also
	| serves as the default controller for the application, meaning it
	| handles requests to the root of the application.
	|
	| You can respond to GET requests to "/home/profile" like so:
	|
	|		public function action_profile()
	|		{
	|			return "This is your profile!";
	|		}
	|
	| Any extra segments are passed to the method as parameters:
	|
	|		public function action_profile($id)
	|		{
	|			return "This is the profile for user {$id}.";
	|		}
	| 
	*/

	public function action_index()
	{
		$page = Page::find(1);
		$text = Content::where('page_id', '=', 1)->get();
		$intro_image = Image::where('type', '=', 'intro_image')->first();

		// $page_html_clean = Purifier::clean($page);

		$data = array(
			'main_text' => '',
			'side_text' => ''
		);

		if(!empty($page))
			$data['page'] = $page;

		if(!empty($page))
			$data['intro_image'] = $intro_image;

		if(!empty($text))
		{
			foreach($text as $part)
			{
				if($part->type == 'main')
				{
					$part->title = Purifier::clean($part->title);
					$part->content = Purifier::clean($part->content);
					$data['main_text'] = $part;
				}

				if($part->type == 'side')
					$data['side_text'] = $part;

				if($part->type == 'intro_video')
					$data['intro_video'] = $part;
			}
		}
		return View::make('front.home.index', $data);
	}

}