<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Search1 extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('date');
		$this->load->model('cpdrc/cpdrc_fw','',TRUE);
	}
	
	public function index()
	{
		$query = $this->db->select('inmates_full.inmate_id,inmate_lname,inmate_fname,inmate_mi,inmate_info_status,temp.step')
						->from('inmates_full,temp')->where("inmates_full.inmate_id = temp.inmate_id");
		$query = $this->db->get();
		$data['inmates'] = $query->result();		
				
		$this->data['title']	= 'Unfinished Inmates';
		$this->data['css']		= array(
									'vendor/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css',
									'vendor/colorbox/css/colorbox.css',
									'vendor/alertify/css/alertify.core.css',
									'vendor/alertify/css/alertify.default.css');
		$this->data['js_top']	= array();
		$this->data['header'] 	= $this->load->view('admin/header_view',$this->data,TRUE);
		$this->data['body'] 	= $this->load->view('search_view1',$data,TRUE);
		$this->data['footer'] 	= $this->load->view('footer_view',NULL,TRUE);
		$this->data['js_bottom']= array('vendor/datatables/media/js/jquery.dataTables.min.js',
										'vendor/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.js',
										'vendor/colorbox/js/jquery.colorbox-min.js',
										'js/search1.js',
										'vendor/alertify/js/alertify.js');
		$this->data['custom_js']= '<script type="text/javascript">
										$(function(){
											$(".nav-inmate").addClass("active");
											$(".nav-inmate-unfinished a").addClass("active");
										});
									</script>';
		$this->load->view('templates',$this->data);
	}

	public function getinmates(){

		$this->load->library('datatables');
		// $this->datatables->select('inmates_full.inmate_id,inmate_lname,inmate_fname,inmate_mi,inmate_info_status')
		// 				->from('inmates_full,temp')->where("inmates_full.inmate_id = temp.inmate_id");
		echo $this->datatables->generate();
	}

	public function inmateinfo_modal($inmate_id)
	{
		$inmate_info = $this->admin_model->get('inmates_full',array('inmate_id'=>$inmate_id),TRUE);

		if (!empty($inmate_info)) {
			$this->data['inmate_info'] = $inmate_info;
		}

		$reason = $this->admin_model->get('cs_reasons',array('inmate_id'=>intval($inmate_info->inmate_id)),TRUE);
		if (!empty($inmate_info)) {
			$this->data['inmate_info'] = $inmate_info;
		}

		//all cases
		$cases = $this->admin_model->get_select('cs_cases_full',array('reasons_id'=>$reason->id,'case_status'=>'active'),'*');

		$this->data['cases'] = $cases;
		$this->data['reason_info'] = $reason;
		$this->data['cases'] = $cases;

		$this->load->view('inmateinfo_modal_view',$this->data);
	}

	public function inmateinfo($inmate_id)
	{
		$inmate_info = $this->admin_model->get('inmates_full',array('inmate_id'=>$inmate_id),TRUE);

		if (!empty($inmate_info)) {
			$this->data['inmate_info'] = $inmate_info;
		}

		$this->data['title']	= 'Home';
		$this->data['css']		= array();
		$this->data['js_top']	= array();
		$this->data['header'] 	= $this->load->view('admin/header_view',$this->data,TRUE);
		$this->data['body'] 	= $this->load->view('inmateinfo_view',NULL,TRUE);
		$this->data['footer'] 	= $this->load->view('footer_view',NULL,TRUE);
		$this->data['js_bottom']= array('js/home.js'
									);
		$this->data['custom_js']= '<script type="text/javascript">
										$(function(){
											$(".nav-home a").addClass("active");
										});
									</script>';
		$this->load->view('templates',$this->data);
	}
}

/* End of file search.php */
/* Location: ./application/controllers/search.php */