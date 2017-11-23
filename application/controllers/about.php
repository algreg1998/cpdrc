<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class About extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
	}
	
	public function index()
	{
		$this->data['title']	= 'Search';
		$this->data['css']		= array();
		$this->data['js_top']	= array();
		$this->data['header'] 	= $this->load->view('admin/header_view',$this->data,TRUE);
		$this->data['body'] 	= $this->load->view('about_view',NULL,TRUE);
		$this->data['footer'] 	= $this->load->view('footer_view',NULL,TRUE);
		$this->data['js_bottom']= array();
		$this->data['custom_js']= '<script type="text/javascript">
										$(function(){
											$(".nav-about a").addClass("active");
										});
									</script>';
		$this->load->view('templates',$this->data);
	}
}

/* End of file about.php */
/* Location: ./application/controllers/about.php */