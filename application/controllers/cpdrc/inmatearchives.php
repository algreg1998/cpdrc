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

	 		//start change the status of the current CS_REASON
	 		$this->db->where('inmate_id', $id);
	 		$this->db->where('status', 'Active');
	 		$this->db->update('cs_reasons', array('status' => 'Done' ) );
	 		//end change the status of the current CS_REASON

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

	 		//start change the status of the current CS_REASON
	 		$this->db->where('inmate_id', $id);
	 		$this->db->where('status', 'Active');
	 		$this->db->update('cs_reasons', array('status' => 'Done' ) );
	 		//end change the status of the current CS_REASON

	 		redirect('cpdrc/pages/archives', 'refresh');
	 	}
	 	public function view()
	 	{
	 		$id=$this->input->post('id');

	 		$data['id'] = $this->input->post('id');
	 		$data['inmate']=$this->cpdrc_fw->inmateinfo($id);
	 		$data['case']=$this->cpdrc_fw->getcaseinfo($id);
	 		$data['old'] = $this->cpdrc_fw->getOldCase($id);
	 		$data['releaseInfo'] = $this->cpdrc_fw->inmateReleaseInfo($id);

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

			$e['commencing']= " ";
	        $e['counts']= $this->input->post('counts');

	        $cs_reasons['inmate_id']= $id;
			$cs_reasons['start_date']=$this->input->post('confine');
			$cs_reasons['release_date']=$this->input->post('dategood');
			$cs_reasons['created_on']=time();
			$cs_reasons['number_of_years']=$this->input->post('max_years');
			$cs_cases['case_no'] = $e['case_no'];

	        echo $this->input->post('crime');
	        $cs_cases['violation_id']=$this->input->post('crime');
	        $violation_info = $this->admin_model->get('cs_violations',array('id'=>$cs_cases['violation_id']),TRUE);

			$cs_cases['s_min_year'] = $violation_info->min_year;
			$cs_cases['s_min_month'] = $violation_info->min_month;
			$cs_cases['s_min_day'] = $violation_info->min_day;
			$cs_cases['s_max_year'] = $violation_info->max_year;
			$cs_cases['s_max_month'] = $violation_info->max_month;
			$cs_cases['s_max_day'] = $violation_info->max_day;
			$cs_cases['created_on']=time();
			
			// For cs_appearance_schedules table
			$cs_appearance_schedules['reason_id'] = null; // to be assigned a value below
			$cs_appearance_schedules['place']=$this->input->post('court'); 
			
			$inmate['date_detained'] = $this->input->post('confine');
			
			$this->db->set('date_detained',$inmate['date_detained']);
			$this->db->where('inmate_id',$id);
			$this->db->update('inmate');

			$data = array('inmate_id'=>$id,
						  'date_confinment'=>$this->input->post('confine'),
						  'sentence'=>$this->input->post('sentence'),
						  'expire_good'=>$this->input->post('dategood'),
						  'case_no'=>$this->input->post('casenum'),
						  'crime'=>$this->input->post('crime'),
						  'court_name'=>$this->input->post('court'),
						  'commencing'=> "",
						  'counts' => $this->input->post('counts'),
						  'expire_bad'=>$this->input->post('datebad'));
			
			$reason = $this->admin_model->get('cs_reasons',array('inmate_id'=>$id,'status'=>'Active'),TRUE);

			if($reason){
				$checker = $this->admin_model->get('cs_cases_full',array('case_no'=>$data['case_no'],'violation_id'=>$data['crime'],'reasons_id'=>$reason->id,'case_status'=>'active'),TRUE);
			}else{
				$query = $this->db->insert('cs_reasons',$cs_reasons);
				$reason = $this->admin_model->get('cs_reasons',array('inmate_id'=>$id,'status'=>'Active'),TRUE);
			}
			$cs_cases['reasons_id'] = $reason->id;
			if (empty($checker)) {
			
				$this->db->insert('inmate_case_info', $data); // for insertion
				
				$primarykey = $this->db->insert_id();
				$data = $this->admin_model->get("inmate",array("inmate_id"=>$id));
				$logData = array(
						'linked_id' => $primarykey,
						'table_name' => 'inmate_case_info',
						'table_field' => 'id',
						'subject' => 'Add Case Information',
						'reasons' => 'A Case Information of "'.$data[0]->inmate_fname.' '.$data[0]->inmate_lname.'" was added',
						'update_by' => $this->session->userdata('user_id'),
						'action' => 'insert',
						'created_at' => date("Y-m-d h:i:sa"),
						'status' => 'active'
					);
				$this->admin_model->save('cs_logs',$logData);

				$cid = $this->admin_model->save('cs_cases',$cs_cases);
				//logs
				$logData = array(
							'linked_id' => $cid,
							'table_name' => 'cs_cases',
							'table_field' => 'id',
							'subject' => 'Add New Case',
							'reasons' => 'Case # '.$cs_cases['case_no'].' - '.$violation_info->name.' '.$violation_info->level.' ('.$violation_info->RepublicAct.') was added to Inmate ID : '.$id,
							'update_by' => $this->session->userdata('user_id'),
							'action' => 'add',
							'created_at' => now(),
							'status' => 'active'
						);
				$this->admin_model->save('cs_logs',$logData);
			
				$inmate_info = $this->admin_model->get('inmates_full',array('inmate_id'=>$reason->inmate_id),TRUE);
				$max_res = $this->db->query('
								SELECT id,violation_id,
								IF(s_max_year is not NULL, s_max_year, 0) as s_max_year,
								IF(s_max_month is not NULL, s_max_month, 0) as s_max_month,
								IF(s_max_day is not NULL, s_max_day, 0) as s_max_day,
								MAX(( IF(s_max_year is not NULL, s_max_year * 365, 0) + IF(s_max_month is not NULL, s_max_month * 30, 0) + IF(s_max_day is not NULL, s_max_day, 0) )) as max_penalty
								FROM (`cs_cases`)
								WHERE `reasons_id` = "'.$reason->id.'" AND status="active" GROUP BY id
							')->result();
				$m_id = 0;
				$m_pen = 0;
				$number_of_years = 0;
				$number_of_months = 0;
				$number_of_days = 0;
				foreach ($max_res as $max_r) {
					if ($max_r->max_penalty > $m_pen) {
						$m_id = $max_r->violation_id;
						$m_pen = $max_r->max_penalty;
						$number_of_years = intval($max_r->s_max_year);
						$number_of_months = intval($max_r->s_max_month);
						$number_of_days = intval($max_r->s_max_day);
					}
				}
				$max_penalty = $m_pen;

				$data = array();
				$data['created_on'] = now();
				$data['modified_on'] = 0;

				if ($inmate_info->inmate_type == 'Detainee' || $inmate_info->inmate_type == 'Pending' ) {
					$s_date = $inmate_info->date_detained;
				}elseif ($inmate_info->inmate_type == 'Probation') {
					$s_date = $inmate_info->date_probation;
				}elseif ($inmate_info->inmate_type == 'Convict') {
					$s_date = $inmate_info->date_convicted;
				}
				
				$rd = strtotime("+$number_of_days days",strtotime("+$number_of_months months",strtotime("+$number_of_years years", strtotime($s_date))));
				$data['release_date'] = mdate("%Y-%m-%d",$rd);
				$data['number_of_years'] = $number_of_years;
				$data['number_of_months'] = $number_of_months;
				$data['number_of_days'] = $number_of_days;
				$where = array('inmate_id'=>$inmate_info->inmate_id);
				
				$this->admin_model->update('cs_reasons',$where,$data);
				
				$cs_appearance_schedules['reason_id'] = $reason->id;
				$query = $this->db->insert('cs_appearance_schedules',$cs_appearance_schedules);



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

		    	// Retrieve court list from db
		    	$query = $this->db->get('view_court');
		    	//$this->db->from('court');
		    	$inmate['courts'] = $query->result();

		    	/*
					$id = $this->input->post('id');

					$e['inmate_id']= $id;
					$e['case_no']=$this->input->post('casenum');
					$e['court_name']=$this->input->post('court');
					$e['date_confinment']=$this->input->post('confine');
					$e['crime']=$this->input->post('crime');
					// $e['sentence']=$this->input->post('sentence');
					$e['commencing']= " ";
	                $e['counts']= $this->input->post('counts');
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
					
		    	*/
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