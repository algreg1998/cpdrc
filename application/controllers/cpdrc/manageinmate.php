	<?php

	class Manageinmate extends Admin_Controller
	{
		public function __construct()
	 	{
	   		parent::__construct();
	   		$this->load->model('cpdrc/cpdrc_fw','',TRUE);
	   		$this->load->model('cpdrc/model_marks','',TRUE);
	 	}
	 	public function index()
	 	{
	 		$id = $this->input->post('id');
	 		//CHECK GENDER
	 		
	 		$gender = $this->model_marks->gender($id);

	 			$data['headF'] = $this->model_marks->headF($id, $gender);
		 		$data['bodyF'] = $this->model_marks->bodyF($id, $gender);
		 		$data['leftarmF'] = $this->model_marks->leftarmF($id, $gender);
		 		$data['rightarmF'] = $this->model_marks->rightarmF($id, $gender);
		 		$data['leftlegF'] = $this->model_marks->leftlegF($id, $gender);
		 		$data['rightlegF'] = $this->model_marks->rightlegF($id, $gender);
		 		//BACk
				$data['headB'] = $this->model_marks->headB($id, $gender);
				$data['bodyB'] = $this->model_marks->bodyB($id, $gender);
				$data['leftarmB'] = $this->model_marks->leftarmB($id, $gender);
				$data['rightarmB'] = $this->model_marks->rightarmB($id, $gender);
				$data['leftlegB'] = $this->model_marks->leftlegB($id, $gender);
				$data['rightlegB'] = $this->model_marks->rightlegB($id, $gender);
				//LEFT
				$data['headL'] = $this->model_marks->headL($id, $gender);
				$data['bodyL'] = $this->model_marks->bodyL($id, $gender);
				$data['legL'] = $this->model_marks->legL($id, $gender);
				//RIGHT
				$data['headR'] = $this->model_marks->headR($id, $gender);
				$data['bodyR'] = $this->model_marks->bodyR($id, $gender);
				$data['legR'] = $this->model_marks->legR($id, $gender);
				
				$data['id'] = $this->input->post('id');
				$data['formid'] = $this->input->post('formid');
				$data['name'] = $this->input->post('name');
				$data['filename'] = $this->input->post('filename');



			//next would be the passing of all the datas
			if($gender == 'Male'){
				
				$this->data['title']    = 'Manage Inmate';
				$this->data['css']      = array();
				$this->data['js_top']   = array();
				$this->data['header']   = $this->load->view('admin/header_view',$this->data,TRUE);
				$this->data['body']     = $this->load->view('menu/2d/modelview',$data,TRUE);
				$this->data['footer']   = $this->load->view('footer_view',NULL,TRUE);
				$this->data['js_bottom']= array();
				$this->data['custom_js']= '<script type="text/javascript">
					$(function(){
					});
				</script>';
				$this->load->view('templates',$this->data);

				// $this->load->view('menu/2d/modelview', $data);
			}
			else
			{
				$this->data['title']    = 'Manage Inmate';
				$this->data['css']      = array();
				$this->data['js_top']   = array();
				$this->data['header']   = $this->load->view('admin/header_view',$this->data,TRUE);
				$this->data['body']     = $this->load->view('menu/2d/modelview2',$data,TRUE);
				$this->data['footer']   = $this->load->view('footer_view',NULL,TRUE);
				$this->data['js_bottom']= array();
				$this->data['custom_js']= '<script type="text/javascript">
					$(function(){
					});
				</script>';
				$this->load->view('templates',$this->data);
			}

	 	}
	 	public function edit()
	 	{
	 		$id=$this->input->post('id');
	 		$data['inmate']=$this->cpdrc_fw->inmateinfo($id);
	 		$data['case']=$this->cpdrc_fw->getcaseinfo($id);

	 		$this->load->view('menu/editinmate', $data);
	 	}
	 	public function view()
	 	{
	 		$id=$this->input->post('id');
	 		$data['id'] = $this->input->post('id'); //user id
	 		$data['inmate']=$this->cpdrc_fw->inmateinfo($id);
	 		$data['case']=$this->cpdrc_fw->getcaseinfo($id);
	 		$data['old'] = $this->cpdrc_fw->getOldCase($id);

			$this->load->view('menu/viewinmate', $data);	
	 	}
	 	public function archives()
	 	{
	 		$id=$this->input->post('id');

	 		$status = array('status' => 'Pending');
	 		$this->db->where('inmate_id', $id);
	 		$this->db->update('inmate', $status);

	 		redirect('cpdrc/pages/manageinmate');
	 		
	 	}
	 	public function editing()
	 	{
	 		$id=$this->input->post('id'); //cid
	 		$data = $this->cpdrc_fw->editingcase($id);
			$this->load->view('menu/editcaseinfo', $data);

	 	}
	 	public function viewcase()
	 	{
	 		$id = $this->input->post('id');

	 		$this->db->select('*')->from('inmate_case_info')->where('cid', $id);
	 		$get = $this->db->get();

	 		foreach ($get->result() as $key) {
	 			$case2[] = array('case_no' => $key->case_no,
	 						   'court' => $key->court_name,
	 						   'date' => $key->date_confinment,
	 						   'crime' => $key->crime,
	 						   'sentence' => $key->sentence,
	 						   'commencing' => $key->commencing,
	 						   'dateg' => $key->expire_good,
	 						   'dateb' => $key->expire_bad
	 						    );
	 		}
	 		$data['case'] = $case2;
	 
	 		$this->load->view('menu/caseview', $data);
	 	}
	 	////////////////////////////////////////////////////////////////////////
	 	public function deletemark()
	 	{
	 		//id2 is the inmate mark id and id is the inmate_id from database
	 	 	$id2 = $this->input->post('id');

	 	 	$id = $this->cpdrc_fw->get2d($id2);

	 	 	$this->db->where('id', $id2);
	 	 	$this->db->delete('inmate_2d');


	 	 	$data['marks'] = $this->cpdrc_fw->getMarks($id);
			$this->load->view('menu/2d/view2d', $data); 	
	 	}
	 	public function deletemark2()
	 	{
	 		//id2 is the inmate mark id and id is the inmate_id from database
	 	 	$id2 = $this->input->post('id');
	 	 	$id = $this->cpdrc_fw->get2d($id2);

	 	 	$this->db->where('id', $id2);
	 	 	$this->db->delete('inmate_2d');

	 	 	$data['marks'] = $this->cpdrc_fw->getMarks($id);
			$this->load->view('menu/2d/view2d2', $data); 	
	 	}
	}
