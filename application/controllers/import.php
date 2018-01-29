<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Import extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->helper('date');
		$this->load->model('Import_model');
	}
	
	public function viewImportPage()
	{

		$this->data['title']	= 'Graph | Violations';
		$this->data['css']		= array('vendor/select2/select2.css','vendor/select2/select2-bootstrap.css');
		$this->data['js_top']	= array();
		$this->data['header'] 	= $this->load->view('admin/header_view',$this->data,TRUE);
		$this->data['body'] 	= $this->load->view('import/importLandingPage',NULL,TRUE);
		$this->data['footer'] 	= $this->load->view('footer_view',NULL,TRUE);
		$this->data['js_bottom']= array();
		$this->data['custom_js']= '<script type="text/javascript">
										$(function(){
								            $(".nav-import a").addClass("active");
								      	});
									</script>';
		$this->load->view('templates',$this->data);
	}
	public function uploadData(){
		$data['result']=$this->Import_model->saveData();
		// die();
		// $data['query']=$this-> upload_services->get_car_features_info();
	}
}

/* End of file search.php */
/* Location: ./application/controllers/search.php */