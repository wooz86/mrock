<?php

class Venue extends Eloquent
{
	public static $table = 'venues';
	public static $timestamps = true;

	public function gig()
	{
		return $this->has_one('gig');
	}

}