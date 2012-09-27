<?php

class Gig extends Eloquent
{
	public static $table = 'gigs';
	public static $timestamps = true;

	public function venue()
	{
		$this->belongs_to('Venue');
	}

}