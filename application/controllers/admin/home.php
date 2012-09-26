<?php

class Admin_Home_Controller extends Admin_Base_Controller 
{
	public function action_index()
	{
		$data = array(
			'user_id' => Session::get('user_id'),
			'firstname' => Session::get('firstname'),
			'lastname' => Session::get('lastname'),
		);
		
		return View::make('admin.home.index', $data);
	}

	public function action_edit_intro_text()
	{
		$data = array(
			'intro_text_title' => '',
			'intro_text' => '',
		);

		$intro_text = Content::find(1);

		if($intro_text)
			$data['intro_text'] = $intro_text;

		return View::make('admin.home.edit_intro_text_form', $data);
	}

	public function action_save_intro_text()
	{
		//CSRF Protection
	    $token = Session::token();
	    $csrf_input = Input::get('csrf_token');

	    if ($csrf_input === $token)
	    {
   			$input = array(
	        	'intro_text_title' => Input::get('intro_text_title'),
	        	'intro_text' 		=> Input::get('intro_text'),
		    );

		    $rules = array(
			    'intro_text_title'  => 'required|alpha_dash|max:20',
			    'intro_text' 		=> 'required|max:2000',
			);

			$validation = Validator::make($input, $rules);

			$html_clean = Purifier::clean($input);

			if($validation->fails())
			{
				return Redirect::to('admin/home/edit/intro_text')
					->with_errors($validation->errors)
					->with_input();
			}

			$intro_text = Content::find(1);

			$intro_text->title = $html_clean['intro_text_title'];
			$intro_text->content = $html_clean['intro_text'];
			$intro_text->save();

			Session::flash('success', 'Intro text updated.');

			return Redirect::to('admin/home/edit/intro_text');

		}
	}

	public function action_edit_intro_image()
	{
		
	}

}