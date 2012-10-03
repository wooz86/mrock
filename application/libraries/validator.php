<?php

class Validator extends Laravel\Validator {

    public function validate_min_width($attribute, $value, $parameters)
    {
    	if(array_key_exists($attribute, Input::file()) && $this->validate_image($attribute, Input::file()))
    	{
	    	return getimagesize($value['tmp_name'])[1] <= $parameters[0];
    	}
        return false;
    }

    public function validate_min_height($attribute, $value, $parameters)
    {
    	if(array_key_exists($attribute, Input::file()) && $this->validate_image($attribute, Input::file()))
    	{
	    	return getimagesize($value['tmp_name'])[0] <= $parameters[0];
    	}
        return false;
    }

 //    protected function replace_width($message, $attribute, $rule, $parameters)
	// {
	// 	return str_replace(':width', $parameters[0], $message);
	// }
	
	// protected function replace_height($message, $attribute, $rule, $parameters)
	// {
	// 	return str_replace(':height', $parameters[0], $message);
	// }

}