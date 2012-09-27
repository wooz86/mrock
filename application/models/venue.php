<?php

class Venue extends Eloquent
{
	public static $table = 'venues';
	public static $timestamps = true;

	public function gig()
	{
		$this->has_many('Gig');
	}

}