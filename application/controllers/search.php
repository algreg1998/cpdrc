<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Search extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('date');
		$this->load->model('cpdrc/cpdrc_fw');
	}

	
	public function index()
	{
		$this->data['title']	= 'Finished Inmates';
		$this->data['css']		= array(
										'vendor/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css',
										'vendor/colorbox/css/colorbox.css'
									);
		$this->data['js_top']	= array();
		$this->data['header'] 	= $this->load->view('admin/header_view',$this->data,TRUE);
		$this->data['body'] 	= $this->load->view('search_view',NULL,TRUE);
		$this->data['footer'] 	= $this->load->view('footer_view',NULL,TRUE);
		$this->data['js_bottom']= array(
										'vendor/datatables/media/js/jquery.dataTables.min.js',
										'vendor/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.js',
										'vendor/colorbox/js/jquery.colorbox-min.js',
										'js/search.js'
									);
		$this->data['custom_js']= '<script type="text/javascript">
										$(function(){
											$(".nav-inmate").addClass("active");
											$(".nav-inmate-finished a").addClass("active");
										});
									</script>';
		$this->load->view('templates',$this->data);
	}

	public function getinmates(){

		$this->load->library('datatables');
		$this->datatables->select('inmate_id,inmate_lname,inmate_fname,inmate_mi,inmate_info_status')
						->from('inmates_full A')->where("inmate_id NOT IN (SELECT inmate_id FROM temp B) 
							AND status = 'Active'");

		echo $this->datatables->generate();
	}

	public function inmateinfo_modal($inmate_id)
	{
		$inmate_info = $this->admin_model->get('inmates_full',array('inmate_id'=>$inmate_id),TRUE);
		
		if (!empty($inmate_info)) {
			$this->data['inmate_info'] = $inmate_info;

		}

		$reason = $this->admin_model->get('cs_reasons',array('inmate_id'=>$inmate_info->inmate_id),TRUE);
		
		if (!empty($inmate_info)) {
			$this->data['inmate_info'] = $inmate_info;
		}

		//all cases
		$cases = $this->admin_model->get_select('cs_cases_full',array('reasons_id'=>$reason->id,'case_status'=>'active'),'*');

		$this->data['cases'] = $cases;
		$this->data['reason_info'] = $reason;
		$this->data['cases'] = $cases;
		$this->data['inmate_info'] = $inmate_info;

		$this->admin_model->db->order_by("editRequestID", "desc"); 
		
		$this->data['reqStat'] =  $this->admin_model->get_select('editrequest as er ',array('er.requestedBy'=>$this->session->userdata('user_id'), 'er.inmateId'=>$inmate_id),'status');
		// echo $inmate_id."<br>";
		// echo $this->admin_model->db->last_query();
		// die();
		$this->load->view('inmateinfo_modal_view',$this->data);
	}

	public function printCPT(){
                // $inmate_info = $this->admin_model->get('inmates_full',array('inmate_id'=>$inmate_id),TRUE);
     //            $this->load->library('cpdf');

             	$id=$this->input->post('id');
             	// echo $id;
		 		
		 		$data['id'] = $this->input->post('id');
		 		$data['inmate']=$this->cpdrc_fw->inmateinfo($id);
		 		$data['case']=$this->cpdrc_fw->getcaseinfo($id);
		 		$data['old'] = $this->cpdrc_fw->getOldCase($id);

                $pdf = new cpdf('P','mm','A4');
                $pdf->AliasNbPages();
                $pdf->AddPage();
                $pdf->body($data['inmate'],$data['case'],$data['old']);
                // $pdf->display($data['inmate'],$data['case'],$data['old']);
                $pdf->Output();
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

	public function getcaseinfo($id)
	 	{

	 		$this->db->select('*')->from('inmate_case_info')->where('inmate_id', $id)->where('case_status', '0');
	 		$count=$this->db->get();
	 		$case = array();

				foreach ($count->result() as $key) {
						$case[] = array(
							'cid' => $key->cid,
							'id' => $key->inmate_id,
			 				'case_no' => $key->case_no,
				 			'court' => $key->court_name,
				 			'confine' => $key->date_confinment,
				 			'crime' => $key->crime,
				 			'sentence' => $key->sentence,
				 			'commencing' => $key->commencing,
				 			'expireg' => $key->expire_good,
				 			'expireb' => $key->expire_bad
						);	
				}
				return $case;

	 	}
}

/* End of file search.php */
/* Location: ./application/controllers/search.php */


