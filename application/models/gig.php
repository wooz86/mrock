<?php

class Gig extends Eloquent
{
	public static $table = 'gigs';
	public static $timestamps = true;

	public static $rules = array(
		'id' 			=> 'integer',
		'title'			=> 'required|max:100|alpha_dash',
		'venue_id'		=> 'integer',
		'ticket_url' 	=> 'url',		
	);

	public static $months = array(
		'Month' => 'Month', 
		'01' 	=> '01', 
		'02'	=> '02', 
		'03' 	=> '03', 
		'04'	=> '04',
		'05'	=> '05', 
		'06'	=> '06', 
		'07'	=> '07', 
		'08'	=> '08', 
		'09'	=> '09', 
		'10'	=> '10', 
		'11'	=> '11', 
		'12'	=> '12'
	);
	public static $days = array(
		'Day'	=> 'Day', 
		'01'	=> '01', 
		'02'	=> '02', 
		'03'	=> '03', 
		'04'	=> '04', 
		'05'	=> '05', 
		'06'	=> '06', 
		'07'	=> '07', 
		'08'	=> '08', 
		'09'	=> '09', 
		'10'	=> '10', 
		'11'	=> '11', 
		'12'	=> '12', 
		'13'	=> '13', 
		'14'	=> '14', 
		'15'	=> '15', 
		'16'	=> '16', 
		'17'	=> '17', 
		'18'	=> '18', 
		'19'	=> '19', 
		'20'	=> '20', 
		'21'	=> '21', 
		'22'	=> '22', 
		'23'	=> '23', 
		'24'	=> '24', 
		'25'	=> '25', 
		'26'	=> '26', 
		'27'	=> '27', 
		'28'	=> '28', 
		'29'	=> '29', 
		'30'	=> '30', 
		'31'	=> '31',
	);
	public static $hours = array(
		'Hour'	=> 'Hour',
		'01'	=> '01', 
		'02'	=> '02', 
		'03'	=> '03', 
		'04'	=> '04', 
		'05'	=> '05', 
		'06'	=> '06', 
		'07'	=> '07', 
		'08'	=> '08', 
		'09'	=> '09', 
		'10'	=> '10', 
		'11'	=> '11', 
		'12'	=> '12', 
		'13'	=> '13', 
		'14'	=> '14', 
		'15'	=> '15',
		'16'	=> '16', 
		'17'	=> '17', 
		'18'	=> '18', 
		'19'	=> '19', 
		'20'	=> '20', 
		'21'	=> '21', 
		'22'	=> '22', 
		'23'	=> '23', 
		'24'	=> '24',
	);
	public static $minutes = array(
		'Minute'	=> 'Minute', 
		'00'		=> '00', 
		'15'		=> '15', 
		'30'		=> '30', 
		'45'		=> '45'
	);


	public function venue()
	{
		return $this->belongs_to('venue');
	}

	public static function validate($input)
	{
		$validation = Validator::make($input, static::$rules);

		return $validation->fails() ? $validation : true;
	}

	public static function get_years()
	{
		$current_year = date('Y');
		$years['Year'] = 'Year';

		for($i = 0; $i <= 5; $i++)
		{
			if($i == 0)
				$years[$current_year] = $current_year;

			else
				$years[$current_year + $i] = $current_year + $i;

		}
		return $years;
	}

	public static function check_date($year, $month, $day)
	{
		return checkdate($month, $day, $year);
	}

	public static function db_save($input) 
	{
		$gig = Gig::create($input);

		if(!empty($gig))
			return true;

		return false;
	}

}