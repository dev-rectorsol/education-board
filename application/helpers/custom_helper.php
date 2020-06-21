<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	//-- check logged user
	if (!function_exists('check_login_user')) {
	    function check_login_user() {
	        $ci = get_instance();
	        if ($ci->session->userdata('is_login') != TRUE) {
	            $ci->session->sess_destroy();
	            redirect(base_url('auth'));
	        }
	    }
	}


	if (!function_exists('pre')) {
	    function pre($data) {
				if (is_array($data)) {
					return '<pre>'.$data.'</pre>';
				}else{
					echo "Variable is not array";
				}
	    }
	}



	if(!function_exists('check_power')){
	    function check_power($type){
	        $ci = get_instance();

	        $ci->load->model('common_model');
	        $option = $ci->common_model->check_power($type);

	        return $option;
	    }
    }
if(!function_exists('objectToArray')){
		function objectToArray($d) {
				if (is_object($d)) {
						// Gets the properties of the given object
						// with get_object_vars function
						$d = get_object_vars($d);
				}

				if (is_array($d)) {
						/*
						* Return array converted to object
						* Using __FUNCTION__ (Magic constant)
						* for recursive call
						*/
						return array_map(__FUNCTION__, $d);
				}
				else {
						// Return array
						return $d;
				}
		}
	}


// if(!function_exists('objectToArray')){
//
// 	function arrayToObject($d) {
//         if (is_array($d)) {
//             /*
//             * Return array converted to object
//             * Using __FUNCTION__ (Magic constant)
//             * for recursive call
//             */
//             return (object) array_map(__FUNCTION__, $d);
//         }
//         else {
//             // Return object
//             return $d;
//         }
//     }
// 	}
	//-- current date time function
	if(!function_exists('current_datetime')){
	    function current_datetime(){
	        $dt = new DateTime('now', new DateTimezone('Asia/Dhaka'));
	        $date_time = $dt->format('Y-m-d H:i:s');
	        return $date_time;
	    }
	}

	//-- show current date & time with custom format
	if(!function_exists('my_date_show_time')){
	    function my_date_show_time($date){
	        if($date != ''){
	            $date2 = date_create($date);
	            $date_new = date_format($date2,"d M Y h:i A");
	            return $date_new;
	        }else{
	            return '';
	        }
	    }
	}

	//-- show current date & time with custom format
	if(!function_exists('time_diff')){
	    function time_diff($date){
				$start_date = new DateTime($date);
				$since_start = $start_date->diff(new DateTime(current_datetime()));
				if ($since_start->y) {
					return $since_start->y. " Year";
				}elseif ($since_start->m) {
					return $since_start->m. " Month";
				}elseif ($since_start->d) {
					return $since_start->d. " Day";
				}elseif ($since_start->h) {
					return $since_start->h. " Hour";
				}elseif ($since_start->i) {
					return $since_start->i. " Minute";
				}else{
					return;
				}
	    }
	}



	if(!function_exists('my_date_show_time')){
	    function my_date_show($date){
	        if($date != ''){
	            $date2 = date_create($date);
	            $date_new = date_format($date2,"M Y ");
	            return $date_new;
	        }else{
	            return '';
	        }
	    }
	}

	//-- show current date with custom format
	if(!function_exists('my_date_show')){
	    function my_date_show($date){

	        if($date != ''){
	            $date2 = date_create($date);
	            $date_new = date_format($date2,"d M Y");
	            return $date_new;
	        }else{
	            return '';
	        }
	    }
	}

	if(!function_exists('getUniqidId')) {
	    function getUniqidId($slug=""){
				return uniqid($slug);
	    }
	}

	if(!function_exists('getCustomId')) {
	    function getCustomId($max, $slug=""){
				$text = $slug . ($max + 1);
				return $text;
	    }
	}

	if(!function_exists('get_footer')) {
	    function get_footer(){
				$ci = get_instance();
				$var = $ci->load->view('web/footer');
				return $var;
	    }
	}

	if(!function_exists('get_sidebar')) {
	    function get_sidebar($path = ''){
				$ci = get_instance();
				$var = $ci->load->view($path);
				return $var;
	    }
	}

	if(!function_exists('get_section')) {
	    function get_section($path = ''){
				$ci = get_instance();
				$var = $ci->load->view($path);
				return $var;
	    }
	}

	if(!function_exists('get_related')) {
	    function get_related($type = '', $node = '', $path = '') {
				$ci = get_instance();
				$data['type'] = $type;
				$data['node'] = $node;
				$var = $ci->load->view($path, $data);
				return $var;
	    }
	}

	if(!function_exists('get_player')) {
	    function get_player($node) {
				$ci = get_instance();
				$data['node'] = $node;
				$var = $ci->load->view('web/layout/embedded-player', $data);
				return $var;
	    }
	}

	if(!function_exists('isJson')) {
		function isJson($string) {
			json_decode($string);
			return (json_last_error() == JSON_ERROR_NONE);
		}
	}
if(!function_exists('clear_path_cache')) {
	function clear_path_cache($uri)
	{
	    $CI =& get_instance();
	    $path = $CI->config->item('cache_path');
	    //path of cache directory
	    $cache_path = ($path == '') ? APPPATH.'cache/' : $path;

	    $uri =  $CI->config->item('base_url').
	    $CI->config->item('index_page').
	    $uri;
	    $cache_path .= md5($uri);

	    return @unlink($cache_path);
	}
}



/**
 * Clears all cache from the cache directory
 */
 if(!function_exists('clear_all_cache')) {

	function clear_all_cache()
	{
	    $CI =& get_instance();
	    $path = $CI->config->item('cache_path');

	    $cache_path = ($path == '') ? APPPATH.'cache/' : $path;

	    $handle = opendir($cache_path);
	    while (($file = readdir($handle))!== FALSE)
	    {
	        //Leave the directory protection alone
	        if ($file != '.htaccess' && $file != 'index.html')
	        {
	           @unlink($cache_path.'/'.$file);
	        }
	    }
	    closedir($handle);
	}
}

 if(!function_exists('convertToHoursMins')) {
	 function convertToHoursMins($time, $format = '%d:%s') {
    	settype($time, 'integer');
		    if ($time < 0 || $time >= 1440) {
		        return;
		    }
		    $hours = floor($time/60);
		    $minutes = $time%60;
		    if ($minutes < 10) {
		        $minutes = '0' . $minutes;
		    }
		    return sprintf($format, $hours, $minutes);
		}
}

 if(!function_exists('removeChar')) {
	 function removeHyphen($str) {
    		return ucwords(preg_replace('/[-]/', ' ', $str));
		}
}

 if(!function_exists('convert')) {
	 function convert($size)	{
		    $unit=array('b','kb','mb','gb','tb','pb');
		    return @round($size/pow(1024,($i=floor(log($size,1024)))),2).' '.$unit[$i];
		}
}

 if(!function_exists('array_flatten')) {
	 function array_flatten($array) {
				if (!is_array($array)) {
		    	return FALSE;
			  }
			  $result = array();
			  foreach ($array as $value) {
			    if (is_array($value)) {
			      $result = array_merge($result, array_flatten($value));
			    }
			    else {
			      $result[] = $value;
			    }
			  }
			  return $result;
		}
}
