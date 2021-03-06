<?php

class Contact_Controller extends Base_Controller 
{

	public function action_index()
	{
		$page = Page::find(6);
		$text = Content::where('page_id', '=', 6)->get();

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
		return View::make('front.contact.index', $data);
	}

	public function action_post_contact_form()
	{
		Session::forget('contact_errors');

		$contactdata = array(
        	'name' => Input::get('name'),
        	'email' => Input::get('email'),
        	'message' => Input::get('message')
	    );

	    $rules = array(
		    'name'  => 'required|max:50',
		    'email' => 'required|email',
		    'message' => 'required|alpha_dash',
		);

		$validation = Validator::make($contactdata, $rules);

		if($validation->passes())
		{
			$email_sent = Email::send_email($contactdata);
			
			if($email_sent == true)
			{
				Session::flash('email_sent', 'Thank you! Message has successfully been sent.');
				return Redirect::to('home');
			}
			else
			{
				return Redirect::to('contact')
    				->with('contact_errors', true)
		    		->with_input();
			}
		}
		else
		{
			return Redirect::to('contact')
		    	->with('contact_validation_errors', true)
		    	->with_input();

		}
	}

}