<?php

class Email extends Eloquent
{

	public static function send_email($messagedata)
	{
		Bundle::start('swiftmailer');

		// Get the Swift Mailer instance
		$mailer = IoC::resolve('mailer');

		// Construct the message
		$message = Swift_Message::newInstance('Message From M-rock contact form')
		    ->setFrom(array($messagedata['email'] => $messagedata['name']))
		    ->setTo(array('joel.thoresson@gmail.com'=> 'Emrik'))
		    ->setBody($messagedata['message'],'text/plain');

		// Send the email
		if($mailer->send($message))
		{
			return true;
		}

		return false;
	}

}