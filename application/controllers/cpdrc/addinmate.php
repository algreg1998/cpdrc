<?php
session_start();
	class Addinmate extends Admin_Controller
	{
		 
		public function __construct()
	 	{
	   		parent::__construct();
	   		$this->load->model('cpdrc/cpdrc_fw','',TRUE);
	   		$this->load->model('admin_model','',TRUE);
	   		$this->load->library('session');
	 	}
	   		
	    public function index() //from inmate 
	    {
	    	if($this->input->post('id')== NULL){
	    			redirect("search1");
	    		}
	    	$actor=$this->session->userdata('logged_in');
	    	$user_id=$this->input->post('id');
	    	$form = $this->input->post('formid');

	    	$info['ref_formid'] = $form;
			$info['inmate_id']=$user_id;
			$info['cell_no']=$this->input->post('cell');
			$info['inmate_fname']= ucwords($this->input->post('fname'));
			$info['inmate_lname']= ucwords($this->input->post('lname'));
			$info['inmate_mi']= ucwords($this->input->post('mi'));
			$info['inmate_alias']= ucwords($this->input->post('alias'));
			$info['added_by']=$actor['user_id'];


			
	    	//double checking to avoid duplicate value in the database
	    	$get=$this->cpdrc_fw->checkinmate($user_id);
	    	$get2 = $this->cpdrc_fw->checkformid($form);
	    	$this->data["cells"] = $this->cpdrc_fw->getAvailableCells();
	    	//checking the ref form id
	    	if($get2 == FALSE)
	    	{
	    		//checking the inmate id
		    	if($get == FALSE)
		    	{
		    		
			   		//to db inmate
			    	$this->db->insert('inmate', $info);
			    	//Step 1 here
			    	$ar['inmate_id'] = $user_id;
			    	$ar['step'] = 1;
			    	$this->cpdrc_fw->insert($ar);
			    	//setting the image of the inmate..
			    	$this->db->select('*')->from('file')->where('added_by', $actor['user_id'])->where('img_set', '0');
			    	$cnt = $this->db->get();

				    if($cnt->num_rows() == 0)
				    {
				    	$ins = array(
				    	'inmate_id' => $user_id,
				    	'added_by' => $actor['user_id'],
				    	'img_set' => '1' );
				    	$this->db->insert('file', $ins);
				    }
				    else
				    {
						//update img file to put a inmate id
						$upd = array('inmate_id' => $user_id,
							    	'img_set' => '1' );
						$this->db->where('added_by', $actor['user_id']);
						$this->db->where('img_set', '0');
						$this->db->update('file', $upd);
					}

					//getting the filename of the inmates photo
					$filename = $this->cpdrc_fw->getFilename($user_id);
					//pass all data to the next step
					$info['formid'] = $info['ref_formid'];
					$info['id'] = $user_id;
					$info['name'] = $info['inmate_lname'].", ".$info['inmate_fname']." ".$info['inmate_mi'];
					$info['filename'] = $filename;
					$info['info'] = null;

						$this->data['title']    = 'Manage Inmate';
                        $this->data['css']      = array();
                        $this->data['js_top']   = array();
                        $this->data['header']   = $this->load->view('admin/header_view',$this->data,TRUE);
                        $this->data['body']     = $this->load->view('menu/add_inmate2',$info,TRUE);
                        $this->data['footer']   = $this->load->view('footer_view',NULL,TRUE);
                        $this->data['js_bottom']= array();
                        $this->data['custom_js']= '<script type="text/javascript">
                              $(function(){
                              });
                        </script>';
                        $this->load->view('templates',$this->data); 
						
			    	// $this->load->view('menu/add_inmate2', $info);
			    }
			    else
			    {
			    	//deleting the unset photo before redirecting to another page
	                $del = array('img_set' => '0',
	                        'added_by' => $actor['user_id'],
	                        'inmate_id' => NULL );
	                $this->db->delete('file', $del);

			    	$data['error']="<strong>Warning!</strong> Inmate number already exist.";


			    	$this->data['title']    = 'Manage Inmate';
			    	$this->data['css']      = array();
			    	$this->data['js_top']   = array();
			    	$this->data['header']   = $this->load->view('admin/header_view',$this->data,TRUE);
			    	$this->data['body']     = $this->load->view('menu/add_inmate',$data,TRUE);
			    	$this->data['footer']   = $this->load->view('footer_view',NULL,TRUE);
			    	$this->data['js_bottom']= array();
			    	$this->data['custom_js']= '<script type="text/javascript">
				    	$(function(){
				    	});
				    </script>';
			    	$this->load->view('templates',$this->data); 
			    	// $this->load->view('menu/add_inmate', $data);
			    }
			}
			else
			{
				$data['error']="<strong>Warning!</strong> Reference Form ID already exist.";

				$this->data['title']    = 'Manage Inmate';
				$this->data['css']      = array();
				$this->data['js_top']   = array();
				$this->data['header']   = $this->load->view('admin/header_view',$this->data,TRUE);
				$this->data['body']     = $this->load->view('menu/add_inmate',$data,TRUE);
				$this->data['footer']   = $this->load->view('footer_view',NULL,TRUE);
				$this->data['js_bottom']= array();
				$this->data['custom_js']= '<script type="text/javascript">
					$(function(){
					});
				</script>';
				$this->load->view('templates',$this->data); 
			    // $this->load->view('menu/add_inmate', $data);
			}	
	    }
	    
	    public function add2() //from inmate info with inmate
	    {		
	    		if($this->input->post('id') == NULL){
	    			redirect("search1");
	    		}
	    		$id =$this->input->post('id');
	    		$filename = $this->input->post('filename');

				//to inmate_info
		    	$info['inmate_id'] = $id;
		    	$info['nationality']= ucwords($this->input->post('nationality'));
		    	$info['status']=$this->input->post('status');
		    	$info['birthdate']=$this->input->post('bday');
		    	$info['age']=$this->input->post('age');
		    	$info['gender']=$this->input->post('gender');
		    	$info['born_in']=$this->input->post('birthplace');
		    	$info['home_add']=$this->input->post('homeStreet').', '.$this->input->post('homeBrgy').', '.$this->input->post('homeCity');
		    	$info['place'] = $this->input->post('homeCity');
		    	$info['province_add']=$this->input->post('province');
		    	$info['occupation']=$this->input->post('occupation');
		    	$info['father']=$this->input->post('father');
		    	$info['mother']=$this->input->post('mother');
		    	$info['relative']=$this->input->post('relative');
		    	$info['relation']=$this->input->post('relation');
                $info['contactpersonnum']=$this->input->post('contactpersonnum');
		    	$info['address']=$this->input->post('currentStreet').', '.$this->input->post('currentBrgy').', '.$this->input->post('currentCity');

		    	if($info['age'] < 100 && $info['age'] > 17){
		    		$this->db->insert('inmate_info', $info);
		    		//Step 2 --update temporary
		    		$affectedFields['step'] = 2;
		    		$this->cpdrc_fw->update($id,$affectedFields);

		    		$data['id'] = $id;
		    		$data['formid'] = $this->input->post('formid');
		    		$data['name'] = $this->input->post('name');
		    		$data['filename'] = $filename;
		    		$data['info'] = null;
		    		
		    		$this->data['title']    = 'Manage Inmate';
		    		$this->data['css']      = array();
		    		$this->data['js_top']   = array();
		    		$this->data['header']   = $this->load->view('admin/header_view',$this->data,TRUE);
		    		$this->data['body']     = $this->load->view('menu/add_inmate3',$data,TRUE);
		    		$this->data['footer']   = $this->load->view('footer_view',NULL,TRUE);
		    		$this->data['js_bottom']= array();
		    		$this->data['custom_js']= '<script type="text/javascript">
			    		$(function(){
			    		});
			    	</script>';
		    		$this->load->view('templates',$this->data);

		    		// $this->load->view('menu/add_inmate3', $data);
		    	}
		    	elseif ($info['age'] < 18) {
		    		$info['data'] = "<b>Warning!</b> Age must be 18 years old and above.";
		    		$info['id'] = $id;
		    		$info['formid'] = $this->input->post('formid');
		    		$info['name'] = $this->input->post('name');
		    		$info['filename'] = $filename;

		    		$this->data['title']    = 'Manage Inmate';
		    		$this->data['css']      = array();
		    		$this->data['js_top']   = array();
		    		$this->data['header']   = $this->load->view('admin/header_view',$this->data,TRUE);
		    		$this->data['body']     = $this->load->view('menu/add_inmate2',$data,TRUE);
		    		$this->data['footer']   = $this->load->view('footer_view',NULL,TRUE);
		    		$this->data['js_bottom']= array();
		    		$this->data['custom_js']= '<script type="text/javascript">
			    		$(function(){
			    		});
			    	</script>';
		    		$this->load->view('templates',$this->data);

		    		// $this->load->view('menu/add_inmate2', $info);		    		
		    	}
		    	else{
		    		$info['data'] = "<b>Warning!</b> Invalid value for 'Age'.";
		    		$info['id'] = $id;
		    		$info['formid'] = $this->input->post('formid');
		    		$info['name'] = $this->input->post('name');
		    		$info['filename'] = $filename;


		    		$this->data['title']    = 'Manage Inmate';
		    		$this->data['css']      = array();
		    		$this->data['js_top']   = array();
		    		$this->data['header']   = $this->load->view('admin/header_view',$this->data,TRUE);
		    		$this->data['body']     = $this->load->view('menu/add_inmate2',$info,TRUE);
		    		$this->data['footer']   = $this->load->view('footer_view',NULL,TRUE);
		    		$this->data['js_bottom']= array();
		    		$this->data['custom_js']= '<script type="text/javascript">
								    		$(function(){
								    		});
			    	</script>';
		    		$this->load->view('templates',$this->data);

		    		// $this->load->view('menu/add_inmate2', $info);
		    	}
	    }
	    public function add3() // from inmate, inmate info and inmate body
	    {
	    	if($this->input->post('id')== NULL){
	    			redirect("search1");
	    		}
	    	$actor=$this->session->userdata('logged_in');
	    	$user_id=$this->input->post('id');

   	
		    	//data build
		    	$w['inmate_id']=$user_id;
		    	$w['height']=$this->input->post('height');
		    	$w['weight']=$this->input->post('weight');
		    	$w['complexion']=$this->input->post('complexion');
		    	$w['build']=$this->input->post('build');
		    	$w['hair']=$this->input->post('hair');
		    	$w['hair_peculiarities']=$this->input->post('hairp');


		    	// if($w['height'] > 0 && $w['weight'] > 0){
		    		
		    	
			    	$this->db->insert('inmate_build', $w);
					//Step 3 --update temporary
		    		$affectedFields['step'] = 3;
		    		$this->cpdrc_fw->update($user_id,$affectedFields);

			    	$inmate['id']=$w['inmate_id'];
			    	$inmate['formid'] = $this->input->post('formid');
			    	$inmate['name'] = $this->input->post('name');
			    	$inmate['filename'] = $this->input->post('filename');

			    	// // Retrieve violation data from database
			    	// $this->db->select('id,name');
			    	// $query = $this->db->get('cs_violations');
			    	// $inmate['violations'] = $query->result();

			    	$violations = $this->admin_model->get('cs_violations',null,FALSE,'name ASC');

					$vio = array();
					foreach ($violations as $violation) {
						if($violation->status == 'active'){
							if ( in_array($violation->level, array('1','2','3','4','5')) )
							{
								$vio[$violation->id] = $violation->name.' (level '.$violation->level.') ' . $violation->RepublicAct;
							}
							else
							{
								$vio[$violation->id] = $violation->name.' ('.$violation->level.') ' . $violation->RepublicAct;
							}	
						}
					}
					$inmate['violations'] = $vio;
			    	if (count($vio)==0) {
						$data['error'] = "<b>Warning!</b> No more violations to choose from! ";
					}
			    	// Retrieve court list from db
			    	$query = $this->db->get_where('court','court_mun NOT in (SELECT municipality.mun_id FROM municipality WHERE municipality.status ="deleted")AND court.status ="active"');
			    	$inmate['courts'] = $query->result();

			    	
		    		
			    	$this->data['title']    = 'Manage Inmate';
		    		$this->data['css']      = array();
		    		$this->data['js_top']   = array();
		    		$this->data['header']   = $this->load->view('admin/header_view',$this->data,TRUE);
		    		$this->data['body']     = $this->load->view('menu/add_inmate4',$inmate,TRUE);
		    		$this->data['footer']   = $this->load->view('footer_view',NULL,TRUE);
		    		$this->data['js_bottom']= array();
		    		$this->data['custom_js']= '<script type="text/javascript">
			    		$(function(){
			    		});
			    	</script>';
		    		$this->load->view('templates',$this->data);


			    	// $this->load->view('menu/add_inmate4', $inmate);		    		
		    	// }
		    	// elseif($w['height'] < 0){ //validate height

		    	// 	$info['data'] = "<b>Warning!</b> Invalid value for Height.";
		    	// 	$info['id'] = $user_id;
		    	// 	$info['formid'] = $this->input->post('formid');
			    // 	$info['name'] = $this->input->post('name');
			    // 	$info['filename'] = $this->input->post('filename');

			    // 	$this->data['title']    = 'Manage Inmate';
		    	// 	$this->data['css']      = array();
		    	// 	$this->data['js_top']   = array();
		    	// 	$this->data['header']   = $this->load->view('admin/header_view',$this->data,TRUE);
		    	// 	$this->data['body']     = $this->load->view('menu/add_inmate3',$info,TRUE);
		    	// 	$this->data['footer']   = $this->load->view('footer_view',NULL,TRUE);
		    	// 	$this->data['js_bottom']= array();
		    	// 	$this->data['custom_js']= '<script type="text/javascript">
			    // 		$(function(){
			    // 		});
			    // 	</script>';
		    	// 	$this->load->view('templates',$this->data);
		    	// 	// $this->load->view('menu/add_inmate3', $info);		    		
		    	// }
		    	// elseif($w['weight'] < 0){ //validate weight
			    // 	$info['id']=$user_id;
			    // 	$info['formid'] = $this->input->post('formid');
			    // 	$info['name'] = $this->input->post('name');
			    // 	$info['filename'] = $this->input->post('filename');

		    	// 	$info['data'] = "<b>Warning!</b> Invalid value for Weight.";
		    	// 	$this->load->view('menu/add_inmate3', $info);		    		
		    	// }			    		
	    }
	    public function add4()
	    {
	    	if($this->input->post('id')== NULL){
	    			redirect("search1");
	    		}
				#$cs_reasons['type']=$this->input->post('sentence');
				#$cs_cases['crime']=$this->input->post('crime'); // Original;
				$id = $this->input->post('id');
				// For cs_reasons table
				$cs_reasons['inmate_id']= $id;
				$cs_reasons['start_date']=$this->input->post('confine');
				

				//release date
				$cs_reasons['release_date']=$this->input->post('dategood');
				


				$cs_reasons['created_on']=time();
				$cs_reasons['number_of_years']=$this->input->post('max_years');
				
				// For cs_cases table
				//$cs_cases['s_max_year']=$this->input->post('max_years');

				$cs_cases['case_no']=$this->input->post('casenum');
				$cs_cases['violation_id']=$this->input->post('crime');

				$violation_info = $this->admin_model->get('cs_violations',array('id'=>$cs_cases['violation_id']),TRUE);
				
				$cs_cases['s_min_year'] = $violation_info->min_year;
				$cs_cases['s_min_month'] = $violation_info->min_month;
				$cs_cases['s_min_day'] = $violation_info->min_day;
				$cs_cases['s_max_year'] = $violation_info->max_year;
				$cs_cases['s_max_month'] = $violation_info->max_month;
				$cs_cases['s_max_day'] = $violation_info->max_day;

				$cs_cases['created_on']=$cs_reasons['created_on'];
				// For cs_appearance_schedules table
				$cs_appearance_schedules['reason_id'] = null; // to be assigned a value below
				$cs_appearance_schedules['place']=$this->input->post('court'); 
				
				// Update inmate record in db
				$inmate['date_detained'] = $this->input->post('confine');
				
				$this->db->set('date_detained',$inmate['date_detained']);
				$this->db->where('inmate_id',$id);
				$this->db->update('inmate');

				// $e is used for checkcaseinfo()
				$e['inmate_id']= $id;
				$e['date_confinment']=$this->input->post('confine');
				$e['sentence']="";
				
				// $e['expire_good']=$this->input->post('dategood');
				
				$e['case_no']=$this->input->post('casenum');
				$e['crime']=$this->input->post('crime');
				$e['court_name']=$this->input->post('court'); // Stored in cs_appearance_schedules.place
				// To determine which tables should $e be stored
				$e['commencing']="";

				// $e['expire_bad']=$this->input->post('datebad');
				
				#echo('{reasons}'.print_r($cs_reasons));
				#echo('{case}'.print_r($cs_cases));
				
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
				/**/
				//commented out to enable many violations for 1 case
				$res = $this->cpdrc_fw->checkcaseinfo($e);
				//commented out to enable many violations for 1 case end
				// Debugging only
				// print_r($res);
				// echo $this->db->last_query();
				

				// if($res == FALSE) // original
				// print_r($res);
				// die();
				$reason = $this->admin_model->get('cs_reasons',array('inmate_id'=>$id),TRUE);
				// echo $this->admin_model->db->last_query()."<br>";
				if($reason){
					$checker = $this->admin_model->get('cs_cases_full',array('case_no'=>$data['case_no'],'violation_id'=>$data['crime'],'reasons_id'=>$reason->id,'case_status'=>'active'),TRUE);
				}
			
			// echo $this->admin_model->db->last_query();
// echo "<pre>";
// var_dump($reason);
// echo $data['case_no']."<br>";
// echo $data['crime']."<br>";
// echo $reason->id;
			// die();
			if (empty($checker)) {
				
			// }
				// if($res == 0)
				// {
				//commented out to enable many violations for 1 case end
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

					$query = $this->db->insert('cs_reasons',$cs_reasons);
					if($query && ! $this->session->flashdata('update_token')){
						$reason = $this->db->get_where('cs_reasons',array('inmate_id'=>$cs_reasons['inmate_id']));//temp placement, should be transferred to MODEL
						// Check DB query at this point
					
						$cs_cases['reasons_id'] = $reason->row()->id;
						$cs_appearance_schedules['reason_id'] = $reason->row()->id;
						$query = $this->db->insert('cs_cases',$cs_cases);
						$query = $this->db->insert('cs_appearance_schedules',$cs_appearance_schedules);
						 $this->session->set_flashdata('update_token', time());
					}
					/**/
					$inmate['case']=$this->cpdrc_fw->getcaseinfolimit($id);

					$inmate['id']=$id;
					$inmate['formid'] = $this->input->post('formid');
			    	$inmate['name'] = $this->input->post('name');
			    	$inmate['filename'] = $this->input->post('filename');

			    	$cases = $this->admin_model->get('cs_cases_full',array('reasons_id'=>$cs_cases['reasons_id'],'case_status'=>'active'),FALSE,'name ASC, level ASC');
			    	// // Retrieve violation data from database
			    	// $this->db->select('id,name');
			    	// $query = $this->db->get('cs_violations');
			    	// $inmate['violations'] = $query->result();
			    	$violations = $this->admin_model->get('cs_violations',null,FALSE,'name ASC');

					$vio = array();
					foreach ($violations as $violation) {
						if($violation->status == 'active'){
							if ( in_array($violation->level, array('1','2','3','4','5')) )
							{
								$vio[$violation->id] = $violation->name.' (level '.$violation->level.') ' . $violation->RepublicAct;
							}
							else
							{
								$vio[$violation->id] = $violation->name.' ('.$violation->level.') ' . $violation->RepublicAct;
							}	
						}
					}

					$inmate['violations'] = $vio;
					if (count($vio)==0) {
						$inmate['error'] = "<b>Warning!</b> No more violations to choose from! ";
					}

			    	// Retrieve court list from db
			    	// Retrieve court list from db
			    	$query = $this->db->get_where('court','court_mun NOT in (SELECT municipality.mun_id FROM municipality WHERE municipality.status ="deleted")AND court.status ="active"');
			    	$inmate['courts'] = $query->result();


			    	$this->data['title']    = 'Manage Inmate';
		    		$this->data['css']      = array();
		    		$this->data['js_top']   = array();
		    		$this->data['header']   = $this->load->view('admin/header_view',$this->data,TRUE);
		    		$this->data['body']     = $this->load->view('menu/add_inmate4',$inmate,TRUE);
		    		$this->data['footer']   = $this->load->view('footer_view',NULL,TRUE);
		    		$this->data['js_bottom']= array();
		    		$this->data['custom_js']= '<script type="text/javascript">
			    		$(function(){
			    		});
			    	</script>';
		    		$this->load->view('templates',$this->data);

					// $this->load->view('menu/add_inmate4', $inmate);
					/**/
					//commented out to enable many violations for 1 case
				}else{
					$inmate['case']=$this->cpdrc_fw->getcaseinfolimit($id);
					// echo $this->cpdrc_fw->db->last_query();
					
					$inmate['id']=$id;
					$inmate['formid'] = $this->input->post('formid');
			    	$inmate['name'] = $this->input->post('name');
			    	$inmate['filename'] = $this->input->post('filename');

			    	$inmate['error'] = "<b>Warning!</b> Case information already exist. Please check the information in the table below";

			    	$query = $this->db->get_where('cs_reasons',array("inmate_id"=>$id));
			    	//$this->db->from('court');
			    	$data['cs_reasons'] = $query->result();
			    	$cs_res = json_decode(json_encode($data['cs_reasons']));
			    	if($cs_res){
						$cases = $this->admin_model->get('cs_cases_full',array('reasons_id'=>$cs_res[0]->id,'case_status'=>'active'),FALSE,'name ASC, level ASC');
			    	}
					
			    	// // Retrieve violation data from database
			    	// $this->db->select('id,name');
			    	// $query = $this->db->get('cs_violations');
			    	// $inmate['violations'] = $query->result();
			    	$violations = $this->admin_model->get('cs_violations',null,FALSE,'name ASC');

					$vio = array();
					foreach ($violations as $violation) {
						if($violation->status == 'active'){
							if ( in_array($violation->level, array('1','2','3','4','5')) )
							{
								$vio[$violation->id] = $violation->name.' (level '.$violation->level.') ' . $violation->RepublicAct;
							}
							else
							{
								$vio[$violation->id] = $violation->name.' ('.$violation->level.') ' . $violation->RepublicAct;
							}	
						}
					}
					// if($cs_res){
					// 	foreach ($cases as $case) {
					// 		unset($vio[$case->violation_id]);
					// 	}
					// }
					$inmate['violations'] = $vio;

			    	// Retrieve court list from db
			    	$query = $this->db->get_where('court','court_mun NOT in (SELECT municipality.mun_id FROM municipality WHERE municipality.status ="deleted")AND court.status ="active"');
			    	$inmate['courts'] = $query->result();

			    	$this->data['title']    = 'Manage Inmate';
		    		$this->data['css']      = array();
		    		$this->data['js_top']   = array();
		    		$this->data['header']   = $this->load->view('admin/header_view',$this->data,TRUE);
		    		$this->data['body']     = $this->load->view('menu/add_inmate4',$inmate,TRUE);
		    		$this->data['footer']   = $this->load->view('footer_view',NULL,TRUE);
		    		$this->data['js_bottom']= array();
		    		$this->data['custom_js']= '<script type="text/javascript">
			    		$(function(){
			    		});
			    	</script>';
		    		$this->load->view('templates',$this->data);

					// $this->load->view('menu/add_inmate4', $inmate);
				}
				/**/
				//commented out to enable many violations for 1 case end
	    }
	  public function add5() //for the passing of inmate id to 2d model view
	    {
	    	if($this->input->post('id')== NULL){
	    			redirect("search1");
	    		}
	    	$filename = $this->input->post('filename');

			$data['id'] = $this->input->post('id');
			$data['name'] = $this->input->post('name');
			$data['formid'] = $this->input->post('formid');
			$data['filename'] = $filename;

			$data['marks'] = $this->cpdrc_fw->getMarks($data['id']);

			$this->db->select('*')->from('inmate')->join('inmate_info', 'inmate.inmate_id=inmate_info.inmate_id')->where('inmate.inmate_id', $data['id']);
			$get = $this->db->get();

			//Step 4 --update temporary
		    $affectedFields['step'] = 4;
		    $this->cpdrc_fw->update($data['id'],$affectedFields);
		    
		    $afield['status'] = 'Active';
			$this->cpdrc_fw->updateinmateStatus($data['id'],$afield);
			
			$afield['inmate_type'] = 'Detainee';
			$this->cpdrc_fw->updateinmateStatus($data['id'],$afield);
			
			$this->db->select('*')->from('cs_reasons')->where('cs_reasons.inmate_id', $data['id']);
			$a = $this->db->get();
			foreach ($a->result() as $key) {
				$f['type'] = 'Detainee';
				$this->cpdrc_fw->updatecsReasonStatus($data['id'],$f);
			}

			foreach ($get->result() as $key) {
				if($key->gender == 'Male'){
					//for male

					$this->data['title']    = 'Manage Inmate';
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

					// $this->load->view('menu/2d/2dmark', $data);
				}
				else{
					//for female

					$this->data['title']    = 'Manage Inmate';
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

					// $this->load->view('menu/2d/2dmark2', $data);
				}
			}	    	
	    }
	    public function getViolation($data = 'default'){
	    	if($data == 'default'){
		    	$query = $this->db->get('cs_violations');
	    	}
	    	else {
	    		$query = $this->db->get_where('cs_violations',array('id'=>$data));
			}
			echo json_encode($query->row());
			#echo($query->row()->max_year);
	    	// return $query->row();
	    }

	    public function continue(){
	    	
	    	$query = $this->db->get_where('temp',array('inmate_id'=>$this->input->post('inmate_id')));
	    	$get = $query->row();
	    	//echo 'menu/add_inmate'.$get->step;
	    	$step = $get->step;
			
			
			$query = $this->db->get_where('inmates_full',array('inmate_id'=>$this->input->post('inmate_id')));
	    	$get = $query->row();
	    	

	    	
	    	$file = $this->cpdrc_fw->getFilename($this->input->post('inmate_id'));
	    	
	    	if(isset($file)){
	    		$data['filename'] = $file;
	    	}else{
	    		$data['filename'] = "asd8.png";
	    	}
	    	$data['id'] = $this->input->post('inmate_id');
			$data['name'] = $get->inmate_lname.", ".$get->inmate_fname." ".$get->inmate_mi;

			$gender =$get->gender;

			$query = $this->db->get_where('inmate',array('inmate_id'=>$this->input->post('inmate_id')));
	    	$get = $query->row();
	    	
			$data['formid'] = $get->ref_formid;
if($step == 2){	
	$query = $this->db->get_where('inmate_info',array('inmate_id'=>$this->input->post('inmate_id')));
	    	$get = $query->row();
	$data['info']=$get;
}

if($step == 3){	
	$query = $this->db->get_where('inmate_build',array('inmate_id'=>$this->input->post('inmate_id')));
	    	$get = $query->row();
	$data['info']=$get;
}

			if($step == 4){
				$query = $this->db->get_where('cs_reasons',array("inmate_id"=>$this->input->post('inmate_id')));
			    	//$this->db->from('court');
			    	$data['cs_reasons'] = $query->result();
			    	$cs_res = json_decode(json_encode($data['cs_reasons']));
			    	if($cs_res){
						$cases = $this->admin_model->get('cs_cases_full',array('reasons_id'=>$cs_res[0]->id,'case_status'=>'active'),FALSE,'name ASC, level ASC');
			    	}
					
			    	// // Retrieve violation data from database
			    	// $this->db->select('id,name');
			    	// $query = $this->db->get('cs_violations');
			    	// $inmate['violations'] = $query->result();
			    	$violations = $this->admin_model->get('cs_violations',null,FALSE,'name ASC');

					$vio = array();
					foreach ($violations as $violation) {
						if($violation->status == 'active'){
							if ( in_array($violation->level, array('1','2','3','4','5')) )
							{
								$vio[$violation->id] = $violation->name.' (level '.$violation->level.') ' . $violation->RepublicAct;
							}
							else
							{
								$vio[$violation->id] = $violation->name.' ('.$violation->level.') ' . $violation->RepublicAct;
							}	
						}
					}
					$data['violations'] = $vio;
					if (count($vio)==0) {
						$data['error'] = "<b>Warning!</b> No more violations to choose from! ";
					}
			    	// Retrieve court list from db
			    	$query = $this->db->get_where('court','court_mun NOT in (SELECT municipality.mun_id FROM municipality WHERE municipality.status ="deleted")AND court.status ="active"');
			    	//$this->db->from('court');
			    	$data['courts'] = $query->result();

					$data['case']=$this->cpdrc_fw->getcaseinfolimit($data['id']);
					
			    	
			}else if($step == 5){
				$data['marks'] = $this->cpdrc_fw->getMarks($this->input->post('inmate_id'));
			}
			
			$this->data['title']    = 'Manage Inmate';
			$this->data['css']      = array();
			$this->data['js_top']   = array();
			$this->data['header']   = $this->load->view('admin/header_view',$this->data,TRUE);
			

			switch ($step) {
				case 2:
					$this->data['body']     = $this->load->view('menu/add_inmate2',$data,TRUE);		    		
					//$this->load->view("menu/add_inmate2", $data);
					break;
				case 3:
					$this->data['body']     = $this->load->view('menu/add_inmate3',$data,TRUE);		    		
					//$this->load->view("menu/add_inmate3", $data);
					break;
				case 4:
					$this->data['body']     = $this->load->view('menu/add_inmate4',$data,TRUE);		    		
					//$this->load->view("menu/add_inmate4", $data);
					break;
				case 5:
					if($gender =="Male"){
						$this->data['body']     = $this->load->view('menu/2d/2dmark',$data,TRUE);		    		
						//$this->load->view("menu/2d/2dmark", $data);
					}else if($gender =="Female"){
						$this->data['body']     = $this->load->view('menu/2d/2dmark2',$data,TRUE);		    		
						//$this->load->view("menu/2d/2dmark2", $data);
					}
					break;
			}
			$this->data['footer']   = $this->load->view('footer_view',NULL,TRUE);
		    		$this->data['js_bottom']= array();
		    		$this->data['custom_js']= '<script type="text/javascript">
			    		$(function(){
			    		});
			    	</script>';
		    		$this->load->view('templates',$this->data);
			
	    }
	}
?>