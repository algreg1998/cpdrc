<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
define('FILE_READ_MODE', 0644);
define('FILE_WRITE_MODE', 0666);
define('DIR_READ_MODE', 0755);
define('DIR_WRITE_MODE', 0777);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/

define('FOPEN_READ',							'rb');
define('FOPEN_READ_WRITE',						'r+b');
define('FOPEN_WRITE_CREATE_DESTRUCTIVE',		'wb'); // truncates existing file data, use with care
define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE',	'w+b'); // truncates existing file data, use with care
define('FOPEN_WRITE_CREATE',					'ab');
define('FOPEN_READ_WRITE_CREATE',				'a+b');
define('FOPEN_WRITE_CREATE_STRICT',				'xb');
define('FOPEN_READ_WRITE_CREATE_STRICT',		'x+b');

/* Custome Define */
define('DS'										,DIRECTORY_SEPARATOR);
define('ROOT_DIR'								,dirname($_SERVER['SCRIPT_FILENAME']).DS);
define('UPLOADS_DIR'							,ROOT_DIR.'uploads'.DS);

function inmatephoto_url($file_name){
	return base_url().'uploads/'.$file_name;
}

function css_url($file_name){
	return base_url().'assets/css/'.$file_name;
}

function img_url($file_name){
	return base_url().'assets/img/'.$file_name;
}

function lib_url($file_name){
	return base_url().'assets/img/'.$file_name;
}

function fonts_url($file_name){
	return base_url().'assets/img/'.$file_name;
}

function images_url($file_name){
	return base_url().'assets/images/'.$file_name;
}

function js_url($file_name){
	return base_url().'assets/js/'.$file_name;
}

function assets_url($file_name){
	return base_url().'assets/'.$file_name;
}

function vendor_url($file_name){
	return base_url().'assets/vendor/'.$file_name;
}


/* End of file constants.php */
/* Location: ./application/config/constants.php */