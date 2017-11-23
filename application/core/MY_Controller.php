<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller{
	
	public $data = array();
	
	function __construct(){
		parent::__construct();
		
		// cache control
		header('Cache-Control: no-store, no-cache, must-revalidate');
		header('Cache-Control: post-check=0, pre-check=0',false);
		header('Pragma: no-cache'); 

		$this->data['errors'] = array();
		$this->data['success'] = array();
		$this->data['site_name'] = config_item('site_name');
		
		#Meta Tags...
		$this->data['title']	= config_item('site_name');
		$this->data['meta_char']= 'UTF-8';
		$this->data['meta_auth']= 'Team Dan';
		$this->data['meta_keys']= 'Cebu Provincial Detention and Rehabilition Center';
		$this->data['meta_desc']= 'Cebu Provincial Detention and Rehabilition Center';
	} 	
	
}