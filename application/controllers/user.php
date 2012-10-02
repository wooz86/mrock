<?php

class User_Controller extends Base_Controller 
{

	public function action_index()
	{
		if(Auth::guest())
			return View::make('front.login_form');
		else
			return Redirect::to('admin');
	}

	public function action_login()
	{

		$userdata = array(
        	'username' => Input::get('email'),
        	'password' => Input::get('password')
	     );

	    if (Auth::attempt($userdata))
	    {
	    	Session::put('user_id', Auth::user()->id);
	    	Session::put('email', Auth::user()->email);
	    	Session::put('firstname', Auth::user()->firstname);
	    	Session::put('lastname', Auth::user()->lastname);

	        return Redirect::to('admin');
	    }
   	    else
		{
		    return Redirect::to('login')
		    	->with('login_errors', true)
		    	->with_input('only', array('email'));
		}
	}

	public function action_logout()
	{
		Auth::logout();
    	return Redirect::to('/');
	}
}