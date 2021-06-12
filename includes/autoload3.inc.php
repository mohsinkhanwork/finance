<?php

/*
	* Load all classes
*/

spl_autoload_register('classAutoLoader');

function classAutoLoader( $className )
{
	$requestURL = '';
	if ( isset($_SERVER['REQUEST_URL']) ) $requestURL = $_SERVER['REQUEST_URL'];
	
	$classURL = $_SERVER['HTTP_HOST'].$requestURL;
	
	if ( strpos( $classURL, 'includes' ) !== false )
	{
		$classPath = '../classes/';
	}
	else
	{
		$classPath = 'classes/';
	}

	$classExtension = '.class.php';
	require_once $classPath . $className . $classExtension;
}


/*
	* Create database object $db
*/

	$db = new Dbh();


/*
	* Set default timezone
*/

	date_default_timezone_set(timezone_name_from_abbr("PKT"));


/*
	* Create temporary admin account
*/

	include('scripts/admin_register.php');


/*
	* Create functions
*/
	function getCurrentDateTime()
	{
	    return date("Y-m-d H:i:s");
	}
	function getDateString($date)
	{
	    $dateArray = date_parse_from_format('Y/m/d', $date);
	    $monthName = DateTime::createFromFormat('!m', $dateArray['month'])->format('F');
	    return $dateArray['day'] . " " . $monthName  . " " . $dateArray['year'];
	}

	function since($datetime)
	{
	    $currentDateTime = new DateTime(getCurrentDateTime());
	    $passedDateTime = new DateTime($datetime);
	    $interval = $currentDateTime->diff($passedDateTime);
	    //$elapsed = $interval->format('%y years %m months %a days %h hours %i minutes %s seconds');
	    $day = $interval->format('%a');
	    $hour = $interval->format('%h');
	    $min = $interval->format('%i');
	    $seconds = $interval->format('%s');

	    if($day > 7)
	    {
	    	return getDateString($datetime);
	    }
	    else if($day >= 1 && $day <= 7 )
	    {
	        if($day == 1) return $day . " day";
	        return $day . " days";
	    }
	    else if($hour >= 1 && $hour <= 24)
	    {
	        if($hour == 1) return $hour . " hour";
	        return $hour . " hours";
	    }
	    else if($min >= 1 && $min <= 60)
	    {
	        if($min == 1) return $min . " minute";
	        return $min . " minutes";
	    }
	    else if($seconds >= 1 && $seconds <= 60)
	    {
	        if($seconds == 1) return $seconds . " second";
	        return $seconds . " seconds";
	    }
	}
?>