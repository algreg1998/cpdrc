<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_Controller extends MY_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
		$this->data['meta_title'] = config_item('site_name');
	}
}

/* End of file User_Controller.php */
/* Location: ./application/libraries/User_Controller.php */