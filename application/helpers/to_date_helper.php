<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	if(!function_exists('to_date')) {
	
		function to_date($dateStr) {
		    
		    return $dateStr !== '0000-00-00 00:00:00' ? date('Y-m-d', strtotime($dateStr)) : '';
		}	
	}

?>