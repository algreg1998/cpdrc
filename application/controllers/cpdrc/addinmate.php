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
	    	$form = " ";

	    	$info['ref_formid'] = null;
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
					// $info['formid'] = $info['ref_formid'];
					// $info['id'] = $user_id;
					// $info['name'] = $info['inmate_lname'].", ".$info['inmate_fname']." ".$info['inmate_mi'];
					// $info['filename'] = $filename;
					// $info['info'] = null;

					// 	$this->data['title']    = 'Manage Inmate';
     //                    $this->data['css']      = array();
     //                    $this->data['js_top']   = array();
     //                    $this->data['header']   = $this->load->view('admin/header_view',$this->data,TRUE);
     //                    $this->data['body']     = $this->load->view('menu/add_inmate2',$info,TRUE);
     //                    $this->data['footer']   = $this->load->view('footer_view',NULL,TRUE);
     //                    $this->data['js_bottom']= array();
     //                    $this->data['custom_js']= '<script type="text/javascript">
     //                          $(function(){
     //                          });
     //                    </script>';
     //                    $this->load->view('templates',$this->data); 
						redirect("cpdrc/addinmate/profiling/".$user_id);
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
			    	$this->data['js_bottom']= array('vendor/jquery/jquery-3.2.1.min.js');
			    	$this->data['custom_js']= '<script type="text/javascript">
				    	$(document).ready(function() {
                $("#uploadphoto").css("display", "none");
                $("#photo").change(function() {
                    $("#uploadphoto").click();
                    $("#photo").hide();
                });
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
                $info['relation']=$this->input->post('relation');
		    	$info['address']=$this->input->post('currentStreet').', '.$this->input->post('currentBrgy').', '.$this->input->post('currentCity');
		    	$info['religion']=$this->input->post('religion');

		    	if($info['age'] < 100 && $info['age'] > 17){
		    		$this->db->insert('inmate_info', $info);
		    		//Step 2 --update temporary
		    		$affectedFields['step'] = 2;
		    		$this->cpdrc_fw->update($id,$affectedFields);
					
					redirect("cpdrc/addinmate/profiling/".$id);
		    		
		    	}
		    	elseif ($info['age'] < 18) {
		    		// $info['data'] = "<b>Warning!</b> Age must be 18 years old and above.";
		    		$this->session->set_flashdata('error_msg',"<b>Warning!</b> Age must be 18 years old and above.");
		    		// $info['id'] = $id;
		    		// $info['formid'] = $this->input->post('formid');
		    		// $info['name'] = $this->input->post('name');
		    		// $info['filename'] = $filename;

		    		// $this->data['title']    = 'Manage Inmate';
		    		// $this->data['css']      = array();
		    		// $this->data['js_top']   = array();
		    		// $this->data['header']   = $this->load->view('admin/header_view',$this->data,TRUE);
		    		// $this->data['body']     = $this->load->view('menu/add_inmate2',$data,TRUE);
		    		// $this->data['footer']   = $this->load->view('footer_view',NULL,TRUE);
		    		// $this->data['js_bottom']= array();
        //             $this->data['custom_js']= '<script type="text/javascript">
        //                                     $(document).ready(function(){
        //                                         $("#ft").keyup(function(){
        //                                             var feet = $("#ft").val();
        //                                             var inches = $("#in").val();
                                                    
        //                                             var finalInches = parseInt((feet * 12)) + parseInt(inches);
        //                                             var result_cm = (finalInches * 2.54).toFixed(2);
                                                    
        //                                             $("#cm").val(result_cm);
        //                                         });
                                                
        //                                         $("#in").keyup(function(){
        //                                             var feet = $("#ft").val();
        //                                             var inches = $("#in").val();
                                                    
        //                                             var finalInches = parseInt((feet * 12)) + parseInt(inches);
        //                                             var result_cm = (finalInches * 2.54).toFixed(2);
                                                    
        //                                             $("#cm").val(result_cm);
        //                                         });
                                                
        //                                         $("#kg").keyup(function(){
        //                                             var kilograms = $("#kg").val();
                                                    
        //                                             var result_lbs = (parseInt(kilograms) * 2.2).toFixed(2);
                                                    
        //                                             $("#lbs").val(result_lbs);
        //                                         });
        //                                     });
        //                                 </script>';
		    		// $this->load->view('templates',$this->data);
		    		redirect("cpdrc/addinmate/profiling/".$id);
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
                                            $(document).ready(function(){
                                                $("#convertHeight").click(function(){
                                                    var feet = $("#ft").val();
                                                    var inches = $("#in").val();
                                                    
                                                    var finalInches = parseInt((feet * 12)) + parseInt(inches);
                                                    var result_cm = (finalInches * 2.54).toFixed(2);
                                                    
                                                    $("#cm").val(result_cm);
                                                });
                                                
                                                $("#convertWeight").click(function(){
                                                    var kilograms = $("#kg").val();
                                                    
                                                    var result_lbs = (parseInt(kilograms) * 2.2).toFixed(2);
                                                    
                                                    $("#lbs").val(result_lbs);
                                                });
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

			  //   	$inmate['id']=$w['inmate_id'];
			  //   	$inmate['formid'] = $this->input->post('formid');
			  //   	$inmate['name'] = $this->input->post('name');
			  //   	$inmate['filename'] = $this->input->post('filename');

			  //   	// // Retrieve violation data from database
			  //   	// $this->db->select('id,name');
			  //   	// $query = $this->db->get('cs_violations');
			  //   	// $inmate['violations'] = $query->result();

			  //   	$violations = $this->admin_model->get('cs_violations',null,FALSE,'name ASC');

					// $vio = array();
					// foreach ($violations as $violation) {
					// 	if($violation->status == 'active'){
					// 		if ( in_array($violation->level, array('1','2','3','4','5')) )
					// 		{
					// 			$vio[$violation->id] = $violation->name.' (level '.$violation->level.') ' . $violation->RepublicAct;
					// 		}
					// 		else
					// 		{
					// 			$vio[$violation->id] = $violation->name.' ('.$violation->level.') ' . $violation->RepublicAct;
					// 		}	
					// 	}
					// }
					// $inmate['violations'] = $vio;
			  //   	if (count($vio)==0) {
					// 	$data['error'] = "<b>Warning!</b> No more violations to choose from! ";
					// }
			  //   	// Retrieve court list from db
			  //   	$query = $this->db->get_where('court','court_mun NOT in (SELECT municipality.mun_id FROM municipality WHERE municipality.status ="deleted")AND court.status ="active"');
			  //   	$inmate['courts'] = $query->result();

			    	
		    		
			  //   	$this->data['title']    = 'Manage Inmate';
		   //  		$this->data['css']      = array();
		   //  		$this->data['js_top']   = array();
		   //  		$this->data['header']   = $this->load->view('admin/header_view',$this->data,TRUE);
		   //  		$this->data['body']     = $this->load->view('menu/add_inmate4',$inmate,TRUE);
		   //  		$this->data['footer']   = $this->load->view('footer_view',NULL,TRUE);
		   //  		$this->data['js_bottom']= array();
		   //  		$this->data['custom_js']= '<script type="text/javascript">
			  //   		$(function(){
			  //   		});
			  //   	</script>';
		   //  		$this->load->view('templates',$this->data);

		    		redirect("cpdrc/addinmate/profiling/".$user_id);
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
				
				$id = $this->input->post('id');
				// For cs_reasons table
				$cs_reasons['inmate_id']= $id;
				$cs_reasons['start_date']=$this->input->post('confine');
				$cs_reasons['release_date']=$this->input->post('dategood');
				$cs_reasons['created_on']=time();
				$cs_reasons['number_of_years']=$this->input->post('max_years');
				

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
				
				$reason = $this->admin_model->get('cs_reasons',array('inmate_id'=>$id),TRUE);

				if($reason){
					$checker = $this->admin_model->get('cs_cases_full',array('case_no'=>$data['case_no'],'violation_id'=>$data['crime'],'reasons_id'=>$reason->id,'case_status'=>'active'),TRUE);
				}else{
					$query = $this->db->insert('cs_reasons',$cs_reasons);
					$reason = $this->admin_model->get('cs_reasons',array('inmate_id'=>$id),TRUE);
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
					

					redirect("cpdrc/addinmate/profiling/".$id);
					
				}else{
					$this->session->set_flashdata('case_data',json_encode($data));
					$inmate['id']=$id;
					$this->session->set_flashdata('error_msg','<b>Warning!</b> Case information already exist. Please check the information in the table below');
			    	redirect("cpdrc/addinmate/profiling/".$id);
			  	}
			
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

	    public function profiling($id){
	    	
	    	$query = $this->db->get_where('temp',array('inmate_id'=>$id));
	    	$get = $query->row();
	    	if($get){
	    		//echo 'menu/add_inmate'.$get->step;
		    	$step = $get->step;
				
				
				$query = $this->db->get_where('inmates_full',array('inmate_id'=>$id));
		    	$get = $query->row();
		    	


		    	
		    	$file = $this->cpdrc_fw->getFilename($id);
		    	
		    	if(isset($file)){
		    		$data['filename'] = $file;
		    	}else{
		    		$data['filename'] = "asd8.png";
		    	}
		    	$data['id'] = $id;
				$data['name'] = $get->inmate_lname.", ".$get->inmate_fname." ".$get->inmate_mi;

				$gender =$get->gender;

				$query = $this->db->get_where('inmate',array('inmate_id'=>$id));
		    	$get = $query->row();
		    	
				$data['formid'] = $get->ref_formid;
				if($step == 2){	
					$query = $this->db->get_where('inmate_info',array('inmate_id'=>$id));
					    	$get = $query->row();
					$data['info']=$get;
				}

				if($step == 3){	
					$query = $this->db->get_where('inmate_build',array('inmate_id'=>$id));
					    	$get = $query->row();
					$data['info']=$get;
				}

				if($step == 4){
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
						$data['violations'] = $vio;
						if (count($vio)==0) {
							$data['error'] = "<b>Warning!</b> No more violations to choose from! ";
						}
				    	// Retrieve court list from db
				    	$query = $this->db->get_where('court','court_mun NOT in (SELECT municipality.mun_id FROM municipality WHERE municipality.status ="deleted")AND court.status ="active"');
				    	//$this->db->from('court');
				    	$data['courts'] = $query->result();

						$data['case']=$this->cpdrc_fw->getcaseinfolimit($id);
						
				    	
				}else if($step == 5){
					$data['marks'] = $this->cpdrc_fw->getMarks($id);
				}
				
				$this->data['title']    = 'Manage Inmate';
				$this->data['css']      = array('vendor/select2/select2.css','vendor/select2/select2-bootstrap.css');
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
			    		$this->data['js_bottom']= array('vendor/select2/select2.js');
                        $this->data['custom_js']= '<script type="text/javascript">
                                                    $(document).ready(function(){
                                                    	$("#citizenshipList").select2();
                                                    	$("#crimeList").select2();
                                                    	$("#courtList").select2();
                                                    	$("#religionList").select2();
                                                    	$(".city").select2();
                                                        $("#ft").keyup(function(){
                                                            var feet = $("#ft").val();
                                                            var inches = $("#in").val();
                                                            
                                                            var finalInches = parseInt((feet * 12)) + parseInt(inches);
                                                            var result_cm = (finalInches * 2.54).toFixed(2);
                                                            
                                                            $("#cm").val(result_cm);
                                                        });
                                                        
                                                        $("#in").keyup(function(){
                                                            var feet = $("#ft").val();
                                                            var inches = $("#in").val();
                                                            
                                                            var finalInches = parseInt((feet * 12)) + parseInt(inches);
                                                            var result_cm = (finalInches * 2.54).toFixed(2);
                                                            
                                                            $("#cm").val(result_cm);
                                                        });
                                                        
                                                        $("#kg").keyup(function(){
                                                            var kilograms = $("#kg").val();
                                                            
                                                            var result_lbs = (parseInt(kilograms) * 2.2).toFixed(2);
                                                            
                                                            $("#lbs").val(result_lbs);
                                                        });
                                                        $("#ft").change(function(){
                                                            var feet = $("#ft").val();
                                                            var inches = $("#in").val();
                                                            
                                                            var finalInches = parseInt((feet * 12)) + parseInt(inches);
                                                            var result_cm = (finalInches * 2.54).toFixed(2);
                                                            
                                                            $("#cm").val(result_cm);
                                                        });
                                                        
                                                        $("#in").change(function(){
                                                            var feet = $("#ft").val();
                                                            var inches = $("#in").val();
                                                            
                                                            var finalInches = parseInt((feet * 12)) + parseInt(inches);
                                                            var result_cm = (finalInches * 2.54).toFixed(2);
                                                            
                                                            $("#cm").val(result_cm);
                                                        });
                                                        
                                                        $("#kg").change(function(){
                                                            var kilograms = $("#kg").val();
                                                            
                                                            var result_lbs = (parseInt(kilograms) * 2.2).toFixed(2);
                                                            
                                                            $("#lbs").val(result_lbs);
                                                        });
                                                    });
                                                </script>';
			    		$this->load->view('templates',$this->data);
	    	}else{
	    		redirect("search1")	;
	    	}
	    	
			
	    }
	}
?>