<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile extends User_Controller {

	public function __construct()
	{
		parent::__construct();
	}
	
	public function index()
	{
		$this->data['title']	= 'Profile';
		$this->data['css']		= array();
		$this->data['js_top']	= array();
		$this->data['header'] 	= $this->load->view('header_view',$this->data,TRUE);
		$this->data['body'] 	= $this->load->view('profile_view',NULL,TRUE);
		$this->data['footer'] 	= $this->load->view('footer_view',NULL,TRUE);
		$this->data['js_bottom']= array();
		$this->data['custom_js']= '<script type="text/javascript">
										$(function(){
											$(".nav-search a").addClass("active");
										});
									</script>';
		$this->load->view('templates',$this->data);
	}
}

/* End of file profile.php */
/* Location: ./application/controllers/profile.php */