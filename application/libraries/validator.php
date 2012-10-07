<?php

class Validator extends Laravel\Validator 
{

	/**
	 * Validate the minimum width of an image.
	 *
	 * @param  string  $attribute
	 * @param  mixed   $value
	 * @return bool
	 */
    public function validate_minwidth($attribute, $value, $parameters)
    {
    	if(array_key_exists($attribute, Input::file()) && $this->validate_image($attribute, Input::file()))
    	{
	    	return getimagesize($value['tmp_name'])[0] > $parameters[0];
    	}
        return false;
    }

    /**
	 * Validate the minimum height of an image.
	 *
	 * @param  string  $attribute
	 * @param  mixed   $value
	 * @return bool
	 */
    public function validate_minheight($attribute, $value, $parameters)
    {
    	if(array_key_exists($attribute, Input::file()) && $this->validate_image($attribute, Input::file()))
    	{
	    	return getimagesize($value['tmp_name'])[1] > $parameters[0];
    	}
        return false;
    }

	/**
	 * Replace all place-holders for the :width rule.
	 *
	 * @param  string  $message
	 * @param  string  $attribute
	 * @param  string  $rule
	 * @param  array   $parameters
	 * @return string
	 */
    protected function replace_width($message, $attribute, $rule, $parameters)
	{
		return str_replace(':width', $parameters[0], $message);
	}

	/**
	 * Replace all place-holders for the :height rule.
	 *
	 * @param  string  $message
	 * @param  string  $attribute
	 * @param  string  $rule
	 * @param  array   $parameters
	 * @return string
	 */	
	protected function replace_height($message, $attribute, $rule, $parameters)
	{
		return str_replace(':height', $parameters[0], $message);
	}
	
	/**
	 * Replace all error message place-holders with actual values. Modified for image dimension validation.
	 *
	 * @param  string  $message
	 * @param  string  $attribute
	 * @param  string  $rule
	 * @param  array   $parameters
	 * @return string
	 */
	protected function replace($message, $attribute, $rule, $parameters)
	{
		$message = str_replace(':attribute', $this->attribute($attribute), $message);

		switch($rule) 
		{
			case 'minwidth':
				$rule = 'width';
			break;
			case 'minheight':
				$rule = 'height';
			break;
			case 'maxwidth':
				$rule = 'width';
			break;
			case 'maxheight':
				$rule = 'height';
			break;
		}

		if (method_exists($this, $replacer = 'replace_'.$rule))
		{
			$message = $this->$replacer($message, $attribute, $rule, $parameters);
		}

		return $message;
	}

}