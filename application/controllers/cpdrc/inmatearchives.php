<?php
session_start();
	class Inmatearchives extends Admin_Controller
	{
		public function __construct()
	 	{
	   		parent::__construct();
	   		$this->load->model('cpdrc/cpdrc_fw','',TRUE);

	 	}
	 	public function index()
	 	{
	 		$user = $this->session->userdata('logged_in');
	 		$id = $this->input->post('id');

	 		$transfer = array('inmate_id' => $id,
	 						  'date_of_transfer' => $this->input->post('date'),
	 						  'transfer_to' => $this->input->post('transferto'),
	 						  'information' => $this->input->post('info'),
	 						  'warden_id' => $user['user_id'] );
	 		$stat = array('status' => 'Transfer');

	 		$this->db->where('inmate_id', $id);
	 		$this->db->update('inmate', $stat);
	 		$this->db->insert('inmate_transfer', $transfer);

	 		//update the case info status
	 		$this->db->where('inmate_id', $id);
	 		$this->db->where('case_status', '0');
	 		$this->db->update('inmate_case_info', array('case_status' => '1' ) );

	 		redirect('cpdrc/pages/archives', 'refresh');
	 	}
	 	public function released()
	 	{
	 		$user = $this->session->userdata('logged_in');
	 		$id = $this->input->post('id');

	 		$released = array('inmate_id' => $id,
	 						  'date_released' => $this->input->post('date'),
	 						  'type_released' => $this->input->post('type'),
	 						  'released_info' => $this->input->post('info'),
	 						  'user_id' => $user['user_id'] );

	 		$stat = array('status' => 'Released');

	 		$this->db->where('inmate_id', $id);
	 		$this->db->update('inmate', $stat);
	 		$this->db->insert('inmate_released', $released);

	 		//update the case info status
	 		$this->db->where('inmate_id', $id);
	 		$this->db->where('case_status', '0');
	 		$this->db->update('inmate_case_info', array('case_status' => '1' ) );

	 		redirect('cpdrc/pages/archives', 'refresh');	 		

	 	}
	 	public function view()
	 	{
	 		$id=$this->input->post('id');

	 		$data['id'] = $this->input->post('id');
	 		$data['inmate']=$this->cpdrc_fw->inmateinfo($id);
	 		$data['case']=$this->cpdrc_fw->getcaseinfo($id);
	 		$data['old'] = $this->cpdrc_fw->getOldCase($id);

			$this->load->view('menu/viewinmate', $data);	
	 	}
	 	public function setActive()
	 	{
	 		$id = $this->input->post('id');

			$inmate['case']=$this->cpdrc_fw->getcaseinfolimit($id);
			$inmate['arc']=$this->cpdrc_fw->addedcaseinfo($id);
			$inmate['gos'] = $this->cpdrc_fw->inmateinfo($id);
			$inmate['id']=$id;
			// Retrieve violation data from database
	    	$violations = $this->admin_model->get('cs_violations',array("status"=>'active'),FALSE,'name ASC');

			$vio = array();

			foreach ($violations as $violation) {
				if ( in_array($violation->level, array('1','2','3','4','5')) )
				{
					$vio[$violation->id] = $violation->name.' (level '.$violation->level.') ' . $violation->RepublicAct;
				}
				else
				{
					$vio[$violation->id] = $violation->name.' ('.$violation->level.') ' . $violation->RepublicAct;
				}
			}
			$inmate['violations'] = $vio;
			if (count($vio)==0) {
				$data['error'] = "<b>Warning!</b> No more violations to choose from! ";
			}

	    	// $this->db->select('id,name');
	    	// $query = $this->db->get('cs_violations');
	    	// $inmate['violations'] = $query->result();

	    	// Retrieve court list from db
	    	// $query = $this->db->get('view_court');
	    	//$this->db->from('court');
	    	$query = $this->db->get_where('court','court_mun NOT in (SELECT municipality.mun_id FROM municipality WHERE municipality.status ="deleted")AND court.status ="active"');
			    	//$this->db->from('court');
	    	$inmate['courts'] = $query->result();
// echo  $this->db->last_query();		    		
				// die();
			$this->load->view('menu/add_new_caseinfo', $inmate);	 		
	 	}
	 	//w/o case info.. from pending to active again..
	 	public function setActive2()
	 	{
	 		 $id = $this->input->post('id');

	 		 $stat = array('status' => 'Active');

	 		 $this->db->where('inmate_id', $id);
	 		 $this->db->update('inmate', $stat);
	 		 echo $id;
	 		 //redirect('cpdrc/pages/archives');

	 	}
	 	public function addNewCase()
	 	{
				$id = $this->input->post('id');

				$e['inmate_id']= $id;
				$e['case_no']=$this->input->post('casenum');
				$e['court_name']=$this->input->post('court');
				$e['date_confinment']=$this->input->post('confine');
				$e['crime']=$this->input->post('crime');
				// $e['sentence']=$this->input->post('sentence');
				$e['commencing']=$this->input->post('commencing');
				// $e['expire_good']=$this->input->post('dategood');
				// $e['expire_bad']=$this->input->post('datebad');

				$this->db->select('*');
				$this->db->from('inmate_case_info');
				$this->db->where("case_no = ".$e['case_no']);
				$this->db->where("crime = ".$e['crime']);

				$res = $this->db->get()->result();
				// echo $this->db->last_query();
				// echo json_encode($res);
				if(!empty($res)){
					$this->session->set_flashdata('error_msg','Case is already existing.');
				}else{
					$this->db->insert('inmate_case_info', $e);
				}


				$inmate['case']=$this->cpdrc_fw->getcaseinfolimit($id);
				$inmate['gos'] = $this->cpdrc_fw->inmateinfo($id);
				$inmate['id']=$id;

				// Retrieve violation data from database
		    	$violations = $this->admin_model->get('cs_violations',array('status' => 'active' ),FALSE,'name ASC');

				$vio = array();
				
				foreach ($violations as $violation) {
					if ( in_array($violation->level, array('1','2','3','4','5')) )
					{
						$vio[$violation->id] = $violation->name.' (level '.$violation->level.') ' . $violation->RepublicAct;
					}
					else
					{
						$vio[$violation->id] = $violation->name.' ('.$violation->level.') ' . $violation->RepublicAct;
					}
				}
				$inmate['violations'] = $vio;
				if (count($vio)==0) {
					$data['error'] = "<b>Warning!</b> No more violations to choose from! ";
				}
		    	// $this->db->select('id,name');
		    	// $query = $this->db->get('cs_violations');
		    	// $inmate['violations'] = $query->result();

		    	// Retrieve court list from db
		    	$query = $this->db->get('view_court');
		    	//$this->db->from('court');
		    	$inmate['courts'] = $query->result();
				
				$this->load->view('menu/add_new_caseinfo', $inmate);

	 	}
	 	public function checkToUpdate()
	 	{
	 		$id = $this->input->post('id');

	 			//for the inmate status
		 		$this->db->where('inmate_id', $id);
		 		$this->db->update('inmate', array('status' => 'Active' ) );

		 		//for the transfer table.. if not empty
		 		$this->db->where('inmate_id', $id);
		 		$this->db->where('record', '0');
		 		$this->db->update('inmate_transfer', array('record' => '1'));

		 		//for released table.. if empty
		 		$this->db->where('inmate_id', $id);
		 		$this->db->where('record', '0');
		 		$this->db->update('inmate_released', array('record' => '1'));

				redirect('cpdrc/pages/manageinmate');		
	 	}
	 	// public function checkToUpdate2()
	 	// {
	 	// 	$id = $this->input->post('id');

	 	// 		//for the inmate status
		 // 		$this->db->where('inmate_id', $id);
		 // 		$this->db->update('inmate', array('status' => 'Active' ) );

		 // 		//for the transfer table.. if not empty
		 // 		$this->db->where('inmate_id', $id);
		 // 		$this->db->where('record', '0');
		 // 		$this->db->update('inmate_transfer', array('record' => '1'));

		 // 		//for released table.. if empty
		 // 		$this->db->where('inmate_id', $id);
		 // 		$this->db->where('record', '0');
		 // 		$this->db->update('inmate_released', array('record' => '1'));

		 // 		$data['id'] = $this->input->post('id');
			// 	$data['marks'] = $this->cpdrc_fw->getMarks($data['id']);
			// 	$data['formid'] = $this->input->post('formid');
			// 	$data['filename'] = $this->input->post('filename');
			// 	$data['name'] = $this->input->post('name');
		 		
		 // 		$this->db->select('*')->from('inmate')->join('inmate_info', 'inmate.inmate_id=inmate_info.inmate_id')->where('inmate.inmate_id', $data['id']);
			// 	$get = $this->db->get();

			// 	foreach ($get->result() as $key) {
			// 		if($key->gender == 'Male'){
			// 			//for male
			// 			$this->load->view('menu/2d/addnew2d', $data);
			// 		}
			// 		else{
			// 			//for female
			// 			$this->load->view('menu/2d/addnew2d2', $data);
			// 		}
			// 	}	
	 	// }

	 	public function checkToUpdate2()
	 	{
	 		$id = $this->input->post('id');

	 			//for the inmate status
		 		$this->db->where('inmate_id', $id);
		 		$this->db->update('inmate', array('status' => 'Active' ) );

		 		//for the transfer table.. if not empty
		 		$this->db->where('inmate_id', $id);
		 		$this->db->where('record', '0');
		 		$this->db->update('inmate_transfer', array('record' => '1'));

		 		//for released table.. if empty
		 		$this->db->where('inmate_id', $id);
		 		$this->db->where('record', '0');
		 		$this->db->update('inmate_released', array('record' => '1'));

		 		$data['id'] = $this->input->post('id');
				$data['marks'] = $this->cpdrc_fw->getMarks($data['id']);
				$data['formid'] = $this->input->post('formid');
				$data['filename'] = $this->input->post('filename');
				$data['name'] = $this->input->post('name');
		 		
		 		$this->db->select('*')->from('inmate')->join('inmate_info', 'inmate.inmate_id=inmate_info.inmate_id')->where('inmate.inmate_id', $data['id']);
				$get = $this->db->get();

				foreach ($get->result() as $key) {
					if($key->gender == 'Male'){
						//for male
						$this->data['title']    = 'Inmate Markings Management';
						$this->data['css']      = array();
						$this->data['js_top']   = array();
						$this->data['header']   = $this->load->view('admin/header_view',$this->data,TRUE);
						$this->data['body']     = $this->load->view('menu/2d/2dmark',$data,TRUE);
						$this->data['footer']   = $this->load->view('footer_view',NULL,TRUE);
						$this->data['js_bottom']= array();
						$this->data['custom_js']= '<script type="text/javascript">
							$(function(){
							});
						</script>';
						$this->load->view('templates',$this->data);
					}
					else{
						//for female
						$this->data['title']    = 'Inmate Markings Management';
						$this->data['css']      = array();
						$this->data['js_top']   = array();
						$this->data['header']   = $this->load->view('admin/header_view',$this->data,TRUE);
						$this->data['body']     = $this->load->view('menu/2d/2dmark2',$data,TRUE);
						$this->data['footer']   = $this->load->view('footer_view',NULL,TRUE);
						$this->data['js_bottom']= array();
						$this->data['custom_js']= '<script type="text/javascript">
							$(function(){
							});
						</script>';
						$this->load->view('templates',$this->data);
					}
				}	
	 	}

	 	
	}