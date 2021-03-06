<?php
session_start();
	class Editinmate extends Admin_Controller
	{
		 
		public function __construct()
	 	{
	   		parent::__construct();
	   		$this->load->model('cpdrc/cpdrc_fw','',TRUE);
	   		$this->load->model('admin_model','',TRUE);
	   		$this->load->library('session');
	 	}
	   	public function index(){


			$data['data'] = $this->admin_model->getAllEditReqs();
			// echo $this->admin_model->db->last_query();
	   		$this->data['title']    = 'Manage Inmate';
            $this->data['css']      = array('');
            $this->data['js_top']   = array();
            $this->data['header']   = $this->load->view('admin/header_view',$this->data,TRUE);
            $this->data['body']     = $this->load->view('admin/editRequest_view',$data,TRUE);
            $this->data['footer']   = $this->load->view('footer_view',NULL,TRUE);
            $this->data['js_bottom']= array(
							'vendor/datatables/media/js/jquery.dataTables.min.js',
							'vendor/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.js',
						);
            $this->data['custom_js']= '<script type="text/javascript">
                                            $(function(){
                                                $(".nav-editReq a").addClass("active");
                                            });
									    </script>';
            $this->load->view('templates',$this->data); 
	   	}	

	   	public function editInmate(){
	   		$inmate_id = $this->input->post("inmate_id");
	   		$data['data'] = $this->admin_model->get('inmate', array('inmate_id' => $inmate_id));
            $data['picture'] = $this->admin_model->get('file', array('inmate_id' => $inmate_id));
	   		$data['cells']= $this->cpdrc_fw->getAvailableCells();

	   		$this->data['title']    = 'Manage Inmate';
            $this->data['css']      = array('vendor/select2/select2.css','vendor/select2/select2-bootstrap.css');
            $this->data['js_top']   = array();
            $this->data['header']   = $this->load->view('admin/header_view',$this->data,TRUE);
            $this->data['body']     = $this->load->view('menu2/add_inmate',$data,TRUE);
            $this->data['footer']   = $this->load->view('footer_view',NULL,TRUE);
            $this->data['js_bottom']= array(
							'vendor/datatables/media/js/jquery.dataTables.min.js',
							'vendor/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.js',
						'js/editRequest.js'
						);
            $this->data['custom_js']= '<script>
                $(document).ready(function() {
                    $("#uploadphoto").css("display", "none");
                    $("#photo").change(function() {
                        $("#uploadphoto").click();
                        $("#photo").hide();
                    });
                });
            </script>';
            $this->load->view('templates',$this->data); 
	   	}
	   	public function editInmate1($id){
	   		$inmate_id = $id;
	   		$data['data'] = $this->admin_model->get('inmate', array('inmate_id' => $inmate_id));
            $data['picture'] = $this->admin_model->get('file', array('inmate_id' => $inmate_id));
	   		$data['cells']= $this->cpdrc_fw->getAvailableCells();

	   		$this->data['title']    = 'Manage Inmate';
            $this->data['css']      = array();
            $this->data['js_top']   = array();
            $this->data['header']   = $this->load->view('admin/header_view',$this->data,TRUE);
            $this->data['body']     = $this->load->view('menu2/add_inmate',$data,TRUE);
            $this->data['footer']   = $this->load->view('footer_view',NULL,TRUE);
            $this->data['js_bottom']= array(
							'vendor/datatables/media/js/jquery.dataTables.min.js',
							'vendor/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.js',
						'js/editRequest.js'
						);
            $this->data['custom_js']= '<script>
                $(document).ready(function() {
                    $("#uploadphoto").css("display", "none");
                    $("#photo").change(function() {
                        $("#uploadphoto").click();
                        $("#photo").hide();
                    });
                });
            </script>';
            $this->load->view('templates',$this->data); 
	   	}
	   	public function addRequest(){

			$inmate_id = $this->input->post("inmate_id");
			$reason = $this->input->post("reason");
			$data = array(
			   'inmateId' => $inmate_id ,
			   'reason'=>$reason,
			   'requestedBy' =>  $this->session->userdata('user_id'),
			);

			$ret = $this->db->insert('editRequest', $data); 
			if($ret){
				echo $inmate_id;
			}
			
	   	}
	   	public function approve(){
				$now = mdate("%Y-%m-%d %H:%i",now());
				$editRequestID = $this->input->post('editRequestID');
				$this->db->where('editRequestID',$editRequestID);
				$this->db->update('editRequest',array("status"=>"approved","judgedBy"=>$this->session->userdata('user_id'),"judgedOn"=> $now));

				echo $editRequestID;
	   	}
	   	public function reject(){
	   		$now = mdate("%Y-%m-%d %H:%i",now());
	   		$editRequestID = $this->input->post('editRequestID');
				
				
			$this->db->where('editRequestID',$editRequestID);
			$this->db->update('editRequest',array("status"=>"rejected","judgedBy"=>$this->session->userdata('user_id'),"judgedOn"=> $now));

			echo $editRequestID ;
	   	}

	    public function edit1() //from inmate 
	    {
	    	
	    	$actor=$this->session->userdata('logged_in');
	    	$user_id = $this->input->post('id');
	    	$old = $this->input->post('old');
	    	$form = $this->input->post('formid');
	    	
	    	
	    	
	    	$info['ref_formid'] = $form;
			$info['inmate_id']=$user_id;
			$info['cell_no']=$this->input->post('cell');
			$info['inmate_fname']= ucwords($this->input->post('fname'));
			$info['inmate_lname']= ucwords($this->input->post('lname'));
			$info['inmate_mi']= ucwords($this->input->post('mi'));
			$info['inmate_alias']= ucwords($this->input->post('alias'));
			

	    	//double checking to avoid duplicate value in the database
	    	$get=$this->cpdrc_fw->checkinmate($user_id);
	    	$this->data["cells"] = $this->cpdrc_fw->getAvailableCells();
	    
	    	if(!$get || $user_id == $old ){

		   		//to db inmate
		   		$this->db->where('inmate_id', $this->input->post('old'));
				$this->db->update('inmate', $info); 
				
				$editReq = array('inmate_id', $info['inmate_id']);

				$this->db->where('inmate_id', $this->input->post('old'));
				$this->db->update('inmate', $info); 
				//logs
				$logData = array(
						'linked_id' => $user_id,
						'table_name' => 'inmate',
						'table_field' => 'inmate_id',
						'subject' => 'Edit Inmate Information Step 1 ',
						'reasons' => 'Inmate Information of "'.$info['inmate_fname'].' '.$info['inmate_lname'].'" was updated',
						'update_by' => $this->session->userdata('user_id'),
						'action' => 'update',
						'created_at' => date("Y-m-d h:i:sa"),
						'status' => 'active'
					);
				$this->admin_model->save('cs_logs',$logData);
	            //getting the filename of the inmates photo
				$filename = $this->cpdrc_fw->getFilename($user_id);

		    	//Step 1 here
		    	$ar['inmate_id'] = $user_id;
		    	$ar['step'] = 1;
		    	$this->cpdrc_fw->insert($ar);

		
		    	//setting the image of the inmate..
		    	// $this->db->select('*')->from('file')->where('added_by', $actor['user_id'])->where('img_set', '0');

		    	// $cnt = $this->db->get();
		    	

			 //    if($cnt->num_rows() == 0)
			 //    {
			 //    	$ins = array(
			 //    	'inmate_id' => $user_id,
			 //    	'added_by' => $actor['user_id'],
			 //    	'img_set' => '1' );
			 //    	$this->db->insert('file', $ins);
			 //    }
			 //    else
			 //    {
				// 	//update img file to put a inmate id
				// 	$upd = array('inmate_id' => $user_id,
				// 		    	'img_set' => '1' );
				// 	$this->db->where('added_by', $actor['user_id']);
				// 	$this->db->where('img_set', '0');
				// 	$this->db->update('file', $upd);
				// }

				//getting the filename of the inmates photo
				$filename = $this->cpdrc_fw->getFilename($user_id);
				// echo $this->cpdrc_fw->db->last_query();
				//pass all data to the next step
				$info['formid'] = $info['ref_formid'];
				$info['id'] = $user_id;
				$info['name'] = $info['inmate_lname'].", ".$info['inmate_fname']." ".$info['inmate_mi'];
				$info['filename'] = $filename;

				$query = $this->db->get_where('inmate_info',array('inmate_id'=>$user_id));
		    	$get = $query->row();
		        $info['info']=$get;

					$this->data['title']    = 'Manage Inmate';
	                $this->data['css']      = array('vendor/select2/select2.css','vendor/select2/select2-bootstrap.css');
	                $this->data['js_top']   = array();
	                $this->data['header']   = $this->load->view('admin/header_view',$this->data,TRUE);
	                $this->data['body']     = $this->load->view('menu/add_inmate2',$info,TRUE);
	                $this->data['footer']   = $this->load->view('footer_view',NULL,TRUE);
	                $this->data['js_bottom']= array('vendor/select2/select2.js');
	                $this->data['custom_js']= '<script type="text/javascript">
	                      $(function(){
	                      	$("#citizenshipList").select2();
							$("#religionList").select2();
							$(".city").select2();
	                      });
	                </script>';
	                $this->load->view('templates',$this->data); 
				
	    		// $this->load->view('menu/add_inmate2', $info);
	    	}else{
	    	$this->session->set_flashdata('error_msg','You have been redirected here since the Inmate ID you are trying to update already exists.');
	    	redirect("search");
	    	}
	    
			
	    }
	    
	    public function edit2() //from inmate info with inmate
	    {		$id =$this->input->post('id');
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
		    	$info['religion']=$this->input->post('religion');
		    	$info['address']=$this->input->post('currentStreet').', '.$this->input->post('currentBrgy').', '.$this->input->post('currentCity');

		    	
		    		$this->db->where('inmate_id', $id);
		    		$this->db->update('inmate_info', $info);
		    		
		    		$data = $this->admin_model->get("inmate",array("inmate_id"=>$id));
					$logData = array(
							'linked_id' => $id,
							'table_name' => 'inmate',
							'table_field' => 'inmate_id',
							'subject' => 'Edit Inmate Information Step 2 ',
							'reasons' => 'Inmate Information of "'.$data[0]->inmate_fname.' '.$data[0]->inmate_lname.'" was updated',
							'update_by' => $this->session->userdata('user_id'),
							'action' => 'update',
							'created_at' => date("Y-m-d h:i:sa"),
							'status' => 'active'
						);
					$this->admin_model->save('cs_logs',$logData);
					

		    		//Step 2 --update temporary
		    		$affectedFields['step'] = 2;
		    		$this->cpdrc_fw->update($id,$affectedFields);
		    		$query = $this->db->get_where('inmate_build',array('inmate_id'=>$id));
					$get = $query->row();
					$data['info']=$get;

		    		$data['id'] = $id;
		    		$data['formid'] = $this->input->post('formid');
		    		$data['name'] = $this->input->post('name');
		    		$data['filename'] = $filename;
		    		
		    		$this->data['title']    = 'Manage Inmate';
		    		$this->data['css']      = array();
		    		$this->data['js_top']   = array();
		    		$this->data['header']   = $this->load->view('admin/header_view',$this->data,TRUE);
		    		$this->data['body']     = $this->load->view('menu/add_inmate3',$data,TRUE);
		    		$this->data['footer']   = $this->load->view('footer_view',NULL,TRUE);
		    		$this->data['js_bottom']= array();
		    		$this->data['custom_js']= '<script type="text/javascript">
			    		$(document).ready(function(){
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
                                                    });
			    	</script>';
		    		$this->load->view('templates',$this->data);

	    }
	    public function edit3() // from inmate, inmate info and inmate body
	    {
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

		    		$this->db->where('inmate_id', $user_id);
			    	$this->db->update('inmate_build', $w);
			    	
			    	$data = $this->admin_model->get("inmate",array("inmate_id"=>$user_id));
					//logs
					$logData = array(
							'linked_id' => $user_id,
							'table_name' => 'inmate',
							'table_field' => 'inmate_id',
							'subject' => 'Edit Inmate Information Step 3 ',
							'reasons' => 'Inmate Information of "'.$data[0]->inmate_fname.' '.$data[0]->inmate_lname.'" was updated',
							'update_by' => $this->session->userdata('user_id'),
							'action' => 'update',
							'created_at' => date("Y-m-d h:i:sa"),
							'status' => 'active'
						);
					$this->admin_model->save('cs_logs',$logData);$this->admin_model->save('cs_logs',$logData);

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
	
					$inmate['case']=$this->cpdrc_fw->getcaseinfolimit($inmate['id']);

			    	$this->data['title']    = 'Manage Inmate';
		    		$this->data['css']      = array('vendor/select2/select2.css','vendor/select2/select2-bootstrap.css');
		    		$this->data['js_top']   = array();
		    		$this->data['header']   = $this->load->view('admin/header_view',$this->data,TRUE);
		    		$this->data['body']     = $this->load->view('menu/add_inmate4',$inmate,TRUE);
		    		$this->data['footer']   = $this->load->view('footer_view',NULL,TRUE);
		    		$this->data['js_bottom']= array('vendor/select2/select2.js');
		    		$this->data['custom_js']= '<script type="text/javascript">
			    		$(function(){
			    			
                                                    	$("#crimeList").select2();
                                                    	$("#courtList").select2();
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

	}
?>