<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Inmate extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->helper('date');
		$this->load->model('cpdrc/cpdrc_fw');
	}
	
	public function inmateinfo_modal($inmate_id)
	{
		$inmate_info = $this->admin_model->get('inmates_full',array('inmate_id'=>$inmate_id),TRUE);

		if (!empty($inmate_info)) {
			$this->data['inmate_info'] = $inmate_info;
		}

		$this->load->view('inmateinfo_modal_view',$this->data);
	}

	public function personal($inmate_id)
	{
		if (isset($_GET['is_read']) && !empty($_GET['is_read'])) {
			$is_read = intval($_GET['is_read']);
			$where = array('inmate_id' => $inmate_id);
			$data = array('is_read' => '0');
			$this->admin_model->update('inmate',$where,$data);
			$data = array('is_read' => '0');
			$this->admin_model->update('cs_reasons',$where,$data);
			redirect(current_url());
		}

		$inmate_info = $this->admin_model->get('inmates_full',array('inmate_id'=>$inmate_id),TRUE);
		$data['inmate_info']=$inmate_info;
		if (!empty($inmate_info)) {
			$this->data['inmate_info'] = $inmate_info;
		}

		$reason = $this->admin_model->get('cs_reasons',array('inmate_id'=>$inmate_info->inmate_id),TRUE);
	$data['reason_info']=$reason;
		$this->data['reason_info'] = $reason;
		$this->data['title']	= 'Inmate | Personal Details';
		$this->data['css']		= array();
		$this->data['js_top']	= array();
		$this->data['header'] 	= $this->load->view('admin/header_view',$this->data,TRUE);
		$this->data['body'] 	= $this->load->view('inmateinfo_view',NULL,TRUE);
		$this->data['footer'] 	= $this->load->view('footer_view',NULL,TRUE);
		$this->data['js_bottom']= array();
		$this->data['custom_js']= '<script type="text/javascript">
										$(function(){
											$(".nav-search a").addClass("active");
										});
									</script>';
		$this->load->view('templates',$this->data);
	}

	public function cases($inmate_id)
	{
		$inmate_info = $this->admin_model->get('inmates_full',array('inmate_id'=>$inmate_id),TRUE);

		if (empty($inmate_info)) {
			redirect(base_url('search'));
		}

		//get reason id
		$reason = $this->admin_model->get('cs_reasons',array('inmate_id'=>$inmate_id),TRUE);
		$a['reason_info']=$reason;
		$a['inmate_info'] = $inmate_info;
		$cv = $this->admin_model->get('inmate',array('inmate_id'=>$inmate_id),TRUE);
		$a['inmate'] = $cv;

		$cases = $this->admin_model->get('cs_cases',array('reasons_id'=>$reason->id,'status'=>'active'));
		if (!empty($inmate_info)) {
			$this->data['inmate_info'] = $inmate_info;
		}

		//all cases
		$cases = $this->admin_model->get_select('cs_cases_full',array('reasons_id'=>$reason->id,'case_status'=>'active'),'*');
		
		$max_res = $this->db->query('
						SELECT id,violation_id,
						IF(s_max_year is not NULL, s_max_year, 0) as s_max_year,
						IF(s_max_month is not NULL, s_max_month, 0) as s_max_month,
						IF(s_max_day is not NULL, s_max_day, 0) as s_max_day,
						MAX(( IF(s_max_year is not NULL, s_max_year * 365, 0) + IF(s_max_month is not NULL, s_max_year * 30, 0) + IF(s_max_day is not NULL, s_max_day, 0) )) as max_penalty
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

		$max_vio_name = "";
		if (!empty($max_res)) {
			$mvn = $this->admin_model->get('cs_violations',array('id'=>$m_id),TRUE);

			$mlvl = $mvn->level;
			if (in_array($mvn->level, array('1','2','3','4','5'))) {
				$mlvl = 'level '.$mvn->level;
			}
			$max_vio_name = $mvn->RepublicAct.' - '. $mvn->name.' ('.$mlvl.')';
		}

		$this->form_validation->set_rules('type', 'type', 'trim|required|xss_clean');
		$this->form_validation->set_rules('start_date', 'start date', 'trim|required|xss_clean');
		if ($this->form_validation->run() !== FALSE)
		{
			$where = array('id'=>$reason->id);
			$type = $this->input->post('type');

			if ($type == 'Pending') {
				$this->session->set_flashdata('error_msg','Please select inmate type.');
				redirect(current_url_full());
			}

			$data['type'] = $type;

			$start_date = $this->input->post('start_date');
			if (!empty($start_date)) {
				$d = explode("/", $start_date);
				$ts = strtotime($d[2].'-'.$d[0].'-'.$d[1]);
				$data['start_date'] = mdate("%Y-%m-%d",$ts);
			}
			
			if ($type == 'Detainee' || $type == 'Probation')
			{
				if (empty($cases))
				{
					$data['number_of_years'] = 0;
					$data['number_of_months'] = 0;
					$data['number_of_days'] = 0;
					$data['release_date'] = null;

				}
				else
				{

					if ($inmate_info->inmate_type == 'Detainee') {
						$s_date = $inmate_info->date_detained;
					}elseif ($inmate_info->inmate_type == 'Probation') {
						$s_date = $inmate_info->date_probation;
					}elseif ($inmate_info->inmate_type == 'Convict') {
						$s_date = $inmate_info->date_convicted;
					}

					$rd = strtotime("+$number_of_days days",strtotime("+$number_of_months months",strtotime("+$number_of_years years", strtotime($s_date))));
					$data = array();
					$data['type'] = $type;
					$data['release_date'] = mdate("%Y-%m-%d",$rd);
					$data['number_of_years'] = $number_of_years;
					$data['number_of_months'] = $number_of_months;
					$data['number_of_days'] = $number_of_dayss;
				}
			}
			else
			{
				$noy = $this->input->post('ps_years');
				$nom = $this->input->post('ps_months');
				$nod = $this->input->post('ps_days');
				$number_of_years = intval(str_replace(array(" year(s)"," ",","), "", $noy));
				$number_of_months = intval(str_replace(array(" month(s)"," ",","), "", $nom));
				$number_of_days = intval(str_replace(array(" day(s)"," ",","), "", $nod));
				$data['number_of_years'] = $number_of_years;
				$data['number_of_months'] = $number_of_months;
				$data['number_of_days'] = $number_of_days;
				$data['court_order_number'] = $this->input->post('court_order_number');
				if (!empty($start_date)) {
					$d = explode("/", $start_date);
					$ts = strtotime($d[2].'-'.$d[0].'-'.$d[1]);

					if (($data['number_of_years'] + $data['number_of_months'] + $data['number_of_days']) == 0)
					{
						$data['release_date'] = null;
					}
					else
					{
						if ($inmate_info->type == 'Detainee') {
							$s_date = $inmate_info->date_detained;
						}elseif ($inmate_info->type == 'Probation') {
							$s_date = $inmate_info->date_probation;
						}elseif ($inmate_info->type == 'Convict') {
							$s_date = $inmate_info->date_convicted;
						}

						$date = new DateTime($s_date);
						if ($number_of_months > 0)
							$date->add(new DateInterval('P'.$number_of_months.'M'));
						if ($number_of_days > 0)
							$date->add(new DateInterval('P'.$number_of_days.'D'));
						if ($number_of_years > 0)
							$date->add(new DateInterval('P'.$number_of_years.'Y'));

						$data['release_date'] = $date->format('Y-m-d');
					}
				}

				$dur = $number_of_years > 0 ? $number_of_years.' years(s), ' : '';
				$dur .= $number_of_months > 0 ? $number_of_months.' month(s), ' : '';
				$dur .= $number_of_days > 0 ? $number_of_days.' day(s) ' : '';
				//logs
				$logData = array(
							'linked_id' => $inmate_id,
							'table_name' => 'inmate',
							'table_field' => 'id',
							'subject' => 'Update Inmate',
							'reasons' => 'Change Period of stay to '.$dur.' of Inmate ID: '.$inmate_id.' '.$conum,
							'update_by' => $this->session->userdata('user_id'),
							'action' => 'update',
							'created_at' => now(),
							'status' => 'active'
						);
				$this->admin_model->save('cs_logs',$logData);
			}

			//update reasons
			$where = array('inmate_id'=>$inmate_info->inmate_id);
			$data['modified_on'] = now();
			$start_date = $this->input->post('start_date');
			if (!empty($start_date)) {
				$d = explode("/", $start_date);
				$ts = strtotime($d[2].'-'.$d[0].'-'.$d[1]);
				$data['start_date'] = mdate("%Y-%m-%d",$ts);
			}
			$this->admin_model->update('cs_reasons',$where,$data);

			$data = array('inmate_type'=>$this->input->post('type'));
			
			if ($type == 'Detainee')
			{
				if (!empty($start_date)) {
					$d = explode("/", $start_date);
					$ts = strtotime($d[2].'-'.$d[0].'-'.$d[1]);
					$data['date_detained'] = mdate("%Y-%m-%d",strtotime($start_date));
					$data['inmate_type'] = 'Detainee';
				}
			}
			elseif($type == 'Convict')
			{
				if (!empty($start_date)) {
					$d = explode("/", $start_date);
					$ts = strtotime($d[2].'-'.$d[0].'-'.$d[1]);
					$data['date_convicted'] = mdate("%Y-%m-%d",strtotime($start_date));
					$data['inmate_type'] = 'Convict';
				}
			}
			elseif($type == 'Probation')
			{
				if (!empty($start_date)) {
					$d = explode("/", $start_date);
					$ts = strtotime($d[2].'-'.$d[0].'-'.$d[1]);
					$data['date_probation'] = mdate("%Y-%m-%d",strtotime($start_date));
					$data['inmate_type'] = 'Probation';
				}
			}

			//update inmate
			$this->admin_model->update('inmate',$where,$data);

			if ($inmate_info->status !== $type) {
				//logs
				$logData = array(
							'linked_id' => $inmate_id,
							'table_name' => 'inmate',
							'table_field' => 'id',
							'subject' => 'Update Inmate',
							'reasons' => 'Change inmate status from "'.$inmate_info->status.'" to "'.$type.'"',
							'update_by' => $this->session->userdata('user_id'),
							'action' => 'update',
							'created_at' => now(),
							'status' => 'active'
						);
				$this->admin_model->save('cs_logs',$logData);
			}

			$this->session->set_flashdata('success_msg','Successfully updated.');
			redirect(current_url_full());
		}
		
		$this->data['max_vio_name'] = $max_vio_name;
		$this->data['cases'] = $cases;
		$this->data['reason_info'] = $reason;
		$this->data['cases'] = $cases;
		$this->data['title']	= 'Inmate | Cases';
		$this->data['css']		= array(
									'vendor/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css',
									'vendor/alertify/css/alertify.core.css',
									'vendor/alertify/css/alertify.default.css'
									);
		$this->data['js_top']	= array();
		$this->data['header'] 	= $this->load->view('admin/header_view',$this->data,TRUE);
		$this->data['body'] 	= $this->load->view('inmatecases_view',$a,TRUE);
		$this->data['footer'] 	= $this->load->view('footer_view',NULL,TRUE);
		$this->data['js_bottom']= array(
										'vendor/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js',
										'vendor/alertify/js/alertify.js',
										'js/autoNumeric.js',
										'js/case.js'
									);
		$this->data['custom_js']= '<script type="text/javascript">
										$(function(){
											$(".nav-search a").addClass("active");
											var currentCaseType = $("#type").val();

											var unsaved = false;
											$(":input").change(function(){ //trigers change in all input fields including text type
											    unsaved = true;
											});
											$("#btnSave").click(function() {
											    unsaved = false;
											});
											function unloadPage(){ 
											    if(unsaved){
											        return "You have unsaved changes on this page. Do you want to leave this page and discard your changes or stay on this page?";
											    }
											}
											window.onbeforeunload = unloadPage;
										});
									</script>';
		$this->load->view('templates',$this->data);
	}

	public function appearances($reason_id)
	{
		$reason = $this->admin_model->get('cs_reasons',array('id'=>$reason_id),TRUE);
		
		$inmate_info = $this->admin_model->get('inmates_full',array('inmate_id'=>$reason->inmate_id),TRUE);
		$data['inmate_info'] = $inmate_info;
		//echo json_encode($inmate_info);
		$appearances = '';
		if (!empty($inmate_info)) {

			$this->data['inmate_info'] = $inmate_info;
			$reason = $this->admin_model->get('cs_reasons',array('inmate_id'=>$inmate_info->inmate_id),TRUE);
			$data['reason_info'] = $reason;
			$appearances = $this->admin_model->get('cs_appearance_schedules',array('reason_id'=>$reason->id),FALSE,'date ASC');
		}

		$cases = $this->admin_model->get('cs_cases',array('reasons_id'=>$reason->id,'status'=>'active'));
		
		
		$this->data['appearances'] = $appearances;
		$this->data['reason_info'] = $reason;
		$this->data['inmate_info'] = $inmate_info;
		$this->data['title']	= 'Inmate | Appearances';
		$this->data['cases']	= $cases;
		$this->data['css']		= array();
		$this->data['js_top']	= array();
		$this->data['header'] 	= $this->load->view('admin/header_view',$this->data,TRUE);
		$this->data['body'] 	= $this->load->view('inmateappearances_view',$data,TRUE);
		$this->data['footer'] 	= $this->load->view('footer_view',NULL,TRUE);
		$this->data['js_bottom']= array();
		$this->data['custom_js']= '<script type="text/javascript">
										$(function(){
											$(".nav-search a").addClass("active");
										});
									</script>';
		$this->load->view('templates',$this->data);
	}

	public function addappearance($reason_id)
	{
		$reason = $this->admin_model->get('cs_reasons',array('id'=>$reason_id),TRUE);
		$inmate_info = $this->admin_model->get('inmates_full',array('inmate_id'=>$reason->inmate_id),TRUE);
		if (!empty($inmate_info)) {
			$this->data['inmate_info'] = $inmate_info;
		}

		$this->form_validation->set_rules('schedule','schedule','trim|xss_clean|required');
		//$this->form_validation->set_rules('place','place','trim|xss_clean|required');
		$this->form_validation->set_rules('judge','judge','trim|xss_clean|required');
		$this->form_validation->set_rules('lawyers','lawyers','trim|xss_clean|required');
		$this->form_validation->set_rules('jail_officer','jail officer','trim|xss_clean|required');
		// $this->form_validation->set_rules('vehicle_no','vehicle number','trim|xss_clean|required');
		$this->form_validation->set_rules('remarks','remarks','trim|xss_clean');
		if ($this->form_validation->run() !== FALSE)
		{
			
			$schedule['reason_id'] = $reason->id;
			
			$start_date = $this->input->post('schedule');
			if (!empty($start_date)) {
				$start_date2 = explode(" ", $start_date);
				$d = explode("/", $start_date2[0]);
				$ts = strtotime($d[2].'-'.$d[0].'-'.$d[1].' '.$start_date2[1].":00 ".$start_date2[2]);
				$schedule['date'] = mdate("%Y-%m-%d %H:%i:%s",$ts);
			}

			//$schedule['vehicle_no'] = $this->input->post('vehicle_no');
			$schedule['status'] = $this->input->post('status');
			//echo $this->input->post('place');
			$schedule['place'] = $this->input->post('place');
			$schedule['assistedCourt'] = $this->input->post('ac1');
			if($this->input->post('ac2') != 'default'){
				$schedule['assistingCourt'] = $this->input->post('ac2');
			}else{
				$schedule['assistingCourt'] = "None";
			}
			$schedule['remarks'] = $this->input->post('remarks');

			if ($schedule['status'] == 'Finished') {
				$schedule['time_departed'] = mdate("%Y-%m-%d ",$ts).$this->input->post('time_departed');
				$schedule['time_returned'] = mdate("%Y-%m-%d ",$ts).$this->input->post('time_returned');
			}

			//save schedule info
			$schedule_id = $this->admin_model->save('cs_appearance_schedules',$schedule);

			//save jail officer
			$jailofficers = explode(",", $this->input->post('jail_officer'));
			if (!empty($jailofficers)) {
				$jofficers = array();
				foreach ($jailofficers as $jailofficer) {
					$jofficers[] = array(
						'appearance_schedule_id' => $schedule_id,
						'type' => 'jail_officer',
						'name' => $jailofficer
					);
				}
				$this->admin_model->save_batch('cs_appearance_schedule_personnels',$jofficers);
			}

			//save judge
			$judges = $this->input->post('judge');
			if (!empty($judges)) {
				$jdg[] = array(
					'appearance_schedule_id' => $schedule_id,
					'type' => 'judge',
					'name' => $judges
				);
				$this->admin_model->save_batch('cs_appearance_schedule_personnels',$jdg);
			}
			
			//save lawyers
			$lawyers = explode(",", $this->input->post('lawyers'));
			if (!empty($lawyers)) {
				$law = array();
				foreach ($lawyers as $lawyer) {
					$law[] = array(
						'appearance_schedule_id' => $schedule_id,
						'type' => 'lawyer',
						'name' => $lawyer
					);
				}
				$this->admin_model->save_batch('cs_appearance_schedule_personnels',$law);
			}

			//logs
			$logData = array(
						'linked_id' => $schedule_id,
						'table_name' => 'cs_appearance_schedules',
						'table_field' => 'id',
						'subject' => 'Add Appearance Schedule',
						'reasons' => 'Add new schedule for Inmate ID: '.$inmate_info->inmate_id.' on '.mdate("%F %d, %Y %h:%i:%s %A",strtotime($schedule['date'])),
						'update_by' => $this->session->userdata('user_id'),
						'action' => 'add',
						'created_at' => now(),
						'status' => 'active'
					);
			$this->admin_model->save('cs_logs',$logData);

			$this->session->set_flashdata('success_msg','Appearance was successfully scheduled.');
			redirect(base_url('inmate/addappearance/'.$reason_id));
		}

		$selid = $this->admin_model->get_select('cs_appearance_schedules',array('reason_id'=>$reason_id),'max(id) as id',TRUE)->id;
		$exists_app = $this->admin_model->get('cs_appearance_schedules',array('reason_id'=>$reason_id,'id'=>$selid),TRUE);

		$this->data['exists_app'] = array();
		if (!empty($exists_app)) {
			$this->data['exists_app'] = $exists_app;
			$js = $this->admin_model->get('cs_appearance_schedule_personnels',array('type'=>'judge','appearance_schedule_id'=>$exists_app->id));

			$judge = array();
			foreach ($js as $j) {
				array_push($judge, $j->name);
			}
			$this->data['judge'] = implode(",", $judge);
			//dump($js); die();
			$ls = $this->admin_model->get('cs_appearance_schedule_personnels',array('type'=>'lawyer','appearance_schedule_id'=>$exists_app->id));
			$lawyers = array();
			foreach ($ls as $l) {
				array_push($lawyers, $l->name);
			}
			$this->data['lawyers'] = implode(",", $lawyers);

			$jails = $this->admin_model->get('cs_appearance_schedule_personnels',array('type'=>'jail_officer','appearance_schedule_id'=>$exists_app->id));
			$jail_officers = array();
			foreach ($jails as $jail) {
				array_push($jail_officers, $jail->name);
			}
			$this->data['jail_officer'] = implode(",", $jail_officers);
		}
		// Retrieve court list from db
    	$query = $this->db->get_where('court','court_mun NOT in (SELECT municipality.mun_id FROM municipality WHERE municipality.status ="deleted")AND
court.status ="active"');
			    	//$this->db->from('court');
			    	$courtss['courts'] = $query->result();

		$this->data['reason_info'] = $reason;
		$this->data['title']	= 'Inmate | Add Appearance';
		$this->data['css']		= array(
									'css/jquery-ui.css',
									'vendor/tag-it/css/jquery.tagit.css',
									'vendor/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css',
									'vendor/alertify/css/alertify.core.css',
									'vendor/alertify/css/alertify.default.css'
								);
		$this->data['js_top']	= array();
		$this->data['header'] 	= $this->load->view('admin/header_view',$this->data,TRUE);
		$this->data['body'] 	= $this->load->view('inmateaddappearance_view',$courtss,TRUE);
		$this->data['footer'] 	= $this->load->view('footer_view',NULL,TRUE);
		$this->data['js_bottom']= array(
									'js/jquery-ui.min.js',
									'vendor/tag-it/js/tag-it.js',
									'vendor/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js',
									'vendor/alertify/js/alertify.js',
									'js/autoNumeric.js',
									'js/addappearance.js');
		$this->data['custom_js']= '<script type="text/javascript">
										$(function(){
											$(".nav-search a").addClass("active");

											$("#lawyers").tagit({
												allowSpaces:true
											});

											$("#jail_officer").tagit({
												allowSpaces:true
											});
											
											var unsaved = false;
											
											$(":input").change(function(){
											    unsaved = true;
											});

											$("#btnSave").click(function()
											{
											    unsaved = false;
											    return performSubmit();
											});

											function unloadPage(){ 
											    if(unsaved){
											        return "You have unsaved changes on this page. Do you want to leave this page and discard your changes or stay on this page?";
											    }
											}

											window.onbeforeunload = unloadPage;
										});
										
										function performSubmit()
										{
											if (
										 		$("#schedule").val() !== "" &&
										 		$("#place").val() !== "" &&
										 		$("#judge").val() !== "" &&
												$("#lawyers").val() !== "" &&	
										 		$("#jail_officer").val() !== "" &&	
										 		$("#vehicle_no").val() !== ""	
										 	) {
										 		alertify.set({ labels: {
										 	        ok     : "Yes",
										 	        cancel : "No"
										 	    } });
										 	    alertify.confirm("Are you sure you want to add this appearance? <br>Note: Once added it cannot be deleted or changed.", function (e) {
										 	        if (e) {
										 	        	$("#addAppearanceForm").submit();
										 	        } else {
										 	            return false;
										 	        }
										 	    });
												
										 		return false;
									 		}

									 		return true;
										}
										
									</script>';
		$this->load->view('templates',$this->data);
	}

	public function editappearance($reason_id)
	{
		$reason = $this->admin_model->get('cs_reasons',array('id'=>$reason_id),TRUE);
		$inmate_info = $this->admin_model->get('inmates_full',array('inmate_id'=>$reason->inmate_id),TRUE);
		if (!empty($inmate_info)) {
			$this->data['inmate_info'] = $inmate_info;
		}

		$this->data['reason_info'] = $reason;

		$this->data['title']	= 'Inmate | Edit Appearance';
		$this->data['css']		= array('css/jquery-ui.css','vendor/tag-it/css/jquery.tagit.css');
		$this->data['js_top']	= array();
		$this->data['header'] 	= $this->load->view('admin/header_view',$this->data,TRUE);
		$this->data['body'] 	= $this->load->view('inmateeditappearance_view',NULL,TRUE);
		$this->data['footer'] 	= $this->load->view('footer_view',NULL,TRUE);
		$this->data['js_bottom']= array('js/jquery-ui.min.js','vendor/tag-it/js/tag-it.js');
		$this->data['custom_js']= '<script type="text/javascript">
										$(function(){
											$(".nav-search a").addClass("active");
											$("#lawyers").tagit();
											$("#jail_officer").tagit();

											var unsaved = false;
											$(":input").change(function(){ //trigers change in all input fields including text type
											    unsaved = true;
											});
											$("#btnSave").click(function() {
											    unsaved = false;
											});
											function unloadPage(){ 
											    if(unsaved){
											        return "You have unsaved changes on this page. Do you want to leave this page and discard your changes or stay on this page?";
											    }
											}
											window.onbeforeunload = unloadPage;
										});
									</script>';
		$this->load->view('templates',$this->data);
	}

	public function schedule($schedule_id)
	{
		if (isset($_GET['is_read']) && !empty($_GET['is_read'])) {
			$is_read = intval($_GET['is_read']);
			$where = array('id' => $schedule_id);
			$data = array('is_read' => '0');

			$this->admin_model->update('cs_appearance_schedules',$where,$data);
			redirect(current_url());
		}

		$appearance = $this->admin_model->get('cs_appearance_schedules',array('id'=>$schedule_id),TRUE);
		
		if (empty($appearance)) {
			redirect('search');
		}

		$reason = $this->admin_model->get('cs_reasons',array('id'=>$appearance->reason_id),TRUE);
		$inmate_info = $this->admin_model->get('inmates_full',array('inmate_id'=>$reason->inmate_id),TRUE);
		$data['inmate_info'] = $inmate_info;
		if (!empty($inmate_info)) {
			$this->data['inmate_info'] = $inmate_info;
		}

		$wh = array('type'=>'judge','appearance_schedule_id' => $appearance->id);
		$judge = $this->admin_model->get('cs_appearance_schedule_personnels',$wh,TRUE);
		
		$wh = array('type'=>'jail_officer','appearance_schedule_id' => $appearance->id);
		$jail_officers = $this->admin_model->get('cs_appearance_schedule_personnels',$wh);
		
		$wh = array('type'=>'lawyer','appearance_schedule_id' => $appearance->id);
		$lawyers = $this->admin_model->get('cs_appearance_schedule_personnels',$wh);
		
		
		$this->data['reason_info'] = $reason;
		$this->data['appearance_info'] = $appearance;


		$j = array();
		foreach ($jail_officers as $jail_officer) {
			array_push($j, $jail_officer->name);
		}

		$l = array();
		foreach ($lawyers as $lawyer) {
			array_push($l, $lawyer->name);
		}

		$this->form_validation->set_rules('schedule','schedule','trim|xss_clean|required');
		//$this->form_validation->set_rules('place','place','trim|xss_clean|required');
		$this->form_validation->set_rules('judge','judge','trim|xss_clean|required');
		$this->form_validation->set_rules('lawyers','lawyers','trim|xss_clean|required');
		$this->form_validation->set_rules('jail_officer','jail officer','trim|xss_clean|required');
		// $this->form_validation->set_rules('vehicle_no','vehicle number','trim|xss_clean|required');
		$this->form_validation->set_rules('remarks','remarks','trim|xss_clean|required');
		if ($this->form_validation->run() !== FALSE)
		{
			if ($appearance->status !== $this->input->post('status')) {
				//logs
				$logData = array(
							'linked_id' => $schedule_id,
							'table_name' => 'cs_appearance_schedules',
							'table_field' => 'id',
							'subject' => 'Update Appearance',
							'reasons' => 'Change appearance status from "'.$appearance->status.'" to "'.$this->input->post('status').'"',
							'update_by' => $this->session->userdata('user_id'),
							'action' => 'update',
							'created_at' => now(),
							'status' => 'active'
						);
				$this->admin_model->save('cs_logs',$logData);
			}
			

			$schedule['reason_id'] = $reason->id;
			
			$start_date = $this->input->post('schedule');
			if (!empty($start_date)) {
				$start_date2 = explode(" ", $start_date);
				$d = explode("/", $start_date2[0]);
				$ts = strtotime($d[2].'-'.$d[0].'-'.$d[1].' '.$start_date2[1].":00 ".$start_date2[2]);
				$schedule['date'] = mdate("%Y-%m-%d %H:%i:%s",$ts);
			}

			// $schedule['vehicle_no'] = $this->input->post('vehicle_no');
			$schedule['status'] = $this->input->post('status');
			$schedule['place'] = $this->input->post('place');
			$schedule['assistedCourt'] = $this->input->post('ac1');
			if($this->input->post('ac2') != 'default'){
				$schedule['assistingCourt'] = $this->input->post('ac2');
			}else{
				$schedule['assistingCourt'] = "None";
			}
			$schedule['remarks'] = $this->input->post('remarks');

			if ($schedule['status'] == 'Finished') {
				$schedule['time_departed'] = mdate("%Y-%m-%d ",$ts).$this->input->post('time_departed');
				$schedule['time_returned'] = mdate("%Y-%m-%d ",$ts).$this->input->post('time_returned');
			}
			$schedule['remarks'] = $this->input->post('remarks');

			if ($schedule['status'] == 'Finished') {
				$schedule['time_departed'] = mdate("%Y-%m-%d ",$ts).str_replace(" PM", ":00 PM", str_replace(" AM", ":00 AM", $this->input->post('time_departed')));
				$schedule['time_returned'] = mdate("%Y-%m-%d ",$ts).str_replace(" PM", ":00 PM", str_replace(" AM", ":00 AM", $this->input->post('time_returned')));
			}

			//update schedule info
			$this->admin_model->update('cs_appearance_schedules',array('id'=>$schedule_id),$schedule);

			//if started - notice me
			// if ($schedule['status'] == 'Started') {
			// 	//add to logs_court
			// 	$log['csAppearanceId'] = $schedule_id;
			// 	$log['logTime'] = null;
			// 	$this->admin_model->save('logs_court', $log);
			// }
			
			//delete all jail officers... 
			$this->admin_model->delete('cs_appearance_schedule_personnels',array('type' => 'jail_officer','appearance_schedule_id'=>$schedule_id));
			
			//save jail officer
			$jailofficers = explode(",", $this->input->post('jail_officer'));
			if (!empty($jailofficers)) {
				$jofficers = array();
				foreach ($jailofficers as $jailofficer) {
					$jofficers[] = array(
						'appearance_schedule_id' => $schedule_id,
						'type' => 'jail_officer',
						'name' => $jailofficer
					);
				}
				$this->admin_model->save_batch('cs_appearance_schedule_personnels',$jofficers);
			}

			//save judge
			$judges = $this->input->post('judge');
			if (!empty($judges)) {
				$jdg[] = array(
					'appearance_schedule_id' => $schedule_id,
					'type' => 'judge',
					'name' => $judges
				);
				$this->admin_model->save_batch('cs_appearance_schedule_personnels',$jdg);
			}
			
			//delete all jail lawyers... 
			$this->admin_model->delete('cs_appearance_schedule_personnels',array('type'=>'lawyer','appearance_schedule_id'=>$schedule_id));
			//save lawyers
			$lawyers = explode(",", $this->input->post('lawyers'));
			if (!empty($lawyers)) {
				$law = array();
				foreach ($lawyers as $lawyer) {
					$law[] = array(
						'appearance_schedule_id' => $schedule_id,
						'type'=>'lawyer',
						'name' => $lawyer
					);
				}
				$this->admin_model->save_batch('cs_appearance_schedule_personnels',$law);
			}

			$this->session->set_flashdata('success_msg','Appearance schedule was successfully updated.');
			redirect(base_url('inmate/schedule/'.sprintf("%011d",$schedule_id)));
		}

		if(isset($judge->name)){
			$this->data['judge'] = $judge->name;
		}else{
			$this->data['judge'] ="";
		}
		
		// Retrieve court list from db
			    	$query = $this->db->get_where('court','court_mun NOT in (SELECT municipality.mun_id FROM municipality WHERE municipality.status ="deleted")AND
		court.status ="active"');
			    	//$this->db->from('court');
			    	$data['courts'] = $query->result();
    	
		$this->data['jail_officers'] = implode(",", $j);
		$this->data['lawyers'] = implode(",", $l);
		$this->data['title']	= 'Schedule Info Name goes here';
		$this->data['css']		= array(
									'css/jquery-ui.css',
									'vendor/tag-it/css/jquery.tagit.css',
									'vendor/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css'
								);
		$this->data['js_top']	= array();
		$this->data['header'] 	= $this->load->view('admin/header_view',$this->data,TRUE);
		$this->data['body'] 	= $this->load->view('inmateschedule_view',$data,TRUE);
		$this->data['footer'] 	= $this->load->view('footer_view',NULL,TRUE);
		$this->data['js_bottom']= array(
									'js/jquery-ui.min.js',
									'vendor/tag-it/js/tag-it.js',
									'vendor/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js',
									'js/autoNumeric.js',
									'js/addappearance.js'
								);
		$this->data['custom_js']= '<script type="text/javascript">
										$(function(){
											$(".nav-search a").addClass("active");
											$("#lawyers").tagit({
												allowSpaces:true
											});
											$("#jail_officer").tagit({
												allowSpaces:true
											});
										});
									</script>';
		$this->load->view('templates',$this->data);
	}
	
	public function managecases($reason_id)
	{
		$reason = $this->admin_model->get('cs_reasons',array('id'=>$reason_id),TRUE);
		$inmate_info = $this->admin_model->get('inmates_full',array('inmate_id'=>$reason->inmate_id),TRUE);
		
		$r_type = $reason->type;
		if ($r_type == 'Detainee') {
			if ($inmate_info->date_detained == '0000-00-00 00:00:00') {
				$this->session->set_userdata('error_msg','Please set the Date Started.');
				redirect(base_url('inmate/cases/'.$inmate_info->inmate_id));
			}
		}elseif($r_type == 'Probation'){
			if ($inmate_info->date_probation == '0000-00-00 00:00:00') {
				$this->session->set_userdata('error_msg','Please set the Date Started.');
				redirect(base_url('inmate/cases/'.$inmate_info->inmate_id));
			}
		}elseif($r_type == 'Convict'){
			if ($inmate_info->date_convicted == '0000-00-00 00:00:00') {
				$this->session->set_userdata('error_msg','Please set the Date Started.');
				redirect(base_url('inmate/cases/'.$inmate_info->inmate_id));
			}
		}

		if (!empty($inmate_info)) {
			$this->data['inmate_info'] = $inmate_info;
		}

		//get reason id
		$reason = $this->admin_model->get('cs_reasons',array('inmate_id'=>$inmate_info->inmate_id),TRUE);
		$cases = $this->admin_model->get('cs_cases_full',array('reasons_id'=>$reason->id,'case_status'=>'active'),FALSE,'name ASC, level ASC');
		//echo $this->admin_model->db->last_query();
		if (!empty($inmate_info)) {
			$this->data['inmate_info'] = $inmate_info;
		}

		$violations = $this->admin_model->get('cs_violations',null,FALSE,'name ASC');

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

		foreach ($cases as $case) {
			unset($vio[$case->violation_id]);
		}


		//$this->form_validation->set_rules('case_no','case number','trim|xss_clean|strip_tags|required|is_unique[cs_cases.case_no]');
		$this->form_validation->set_rules('case_no','case number','trim|xss_clean|strip_tags|required');
		$this->form_validation->set_message('is_unique','The %s is already taken.');
		if ($this->form_validation->run() !== FALSE)
		{
			$violation_info = $this->admin_model->get('cs_violations',array('id'=>$this->input->post('violations')),TRUE);
			
			$data['reasons_id'] = $reason->id;
			$data['case_no'] = $this->input->post('case_no');
			$data['violation_id'] = $this->input->post('violations'); 
			$data['created_on'] = now();
			$data['s_min_year'] = $violation_info->min_year;
			$data['s_min_month'] = $violation_info->min_month;
			$data['s_min_day'] = $violation_info->min_day;
			$data['s_max_year'] = $violation_info->max_year;
			$data['s_max_month'] = $violation_info->max_month;
			$data['s_max_day'] = $violation_info->max_day;

			$checker = $this->admin_model->get('cs_cases_full',array('violation_id'=>$data['violation_id'],'reasons_id'=>$reason->id,'case_status'=>'active'),TRUE);
			if (!empty($checker)) {
				$this->session->set_flashdata('error_msg','You have already added that violation.');
				redirect(current_url_full());
			}

			//save case
			$cid = $this->admin_model->save('cs_cases',$data);

			//logs
			$logData = array(
						'linked_id' => $cid,
						'table_name' => 'cs_cases',
						'table_field' => 'id',
						'subject' => 'Add New Case',
						'reasons' => 'Case # '.$data['case_no'].' - '.$violation_info->name.' '.$violation_info->level.' ('.$violation_info->RepublicAct.') was added to Inmate ID : '.$inmate_info->inmate_id,
						'update_by' => $this->session->userdata('user_id'),
						'action' => 'add',
						'created_at' => now(),
						'status' => 'active'
					);

			$this->admin_model->save('cs_logs',$logData);

			//if convict dont change period or date released...
			//recheck max penalty
			if ($inmate_info->status == 'Detainee' || $inmate_info->status == 'Probation')
			{
				$max_res = $this->db->query('
								SELECT id,
								IF(s_max_year is not NULL, s_max_year, 0) as s_max_year,
								IF(s_max_month is not NULL, s_max_month, 0) as s_max_month,
								IF(s_max_day is not NULL, s_max_day, 0) as s_max_day,
								MAX(( IF(s_max_year is not NULL, s_max_year * 365, 0) + IF(s_max_month is not NULL, s_max_year * 30, 0) + IF(s_max_day is not NULL, s_max_day, 0) )) as max_penalty
								FROM (`cs_cases`)
								WHERE `reasons_id` = "'.$reason_id.'" AND status="active" GROUP BY id
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

				if ($inmate_info->status == 'Detainee') {
					$s_date = $inmate_info->date_detained;
				}elseif ($inmate_info->status == 'Probation') {
					$s_date = $inmate_info->date_probation;
				}elseif ($inmate_info->status == 'Convict') {
					$s_date = $inmate_info->date_convicted;
				}

				$rd = strtotime("+$number_of_days days",strtotime("+$number_of_months months",strtotime("+$number_of_years years", strtotime($s_date))));
				$data['release_date'] = mdate("%Y-%m-%d",$rd);
				$data['number_of_years'] = $number_of_years;
				$data['number_of_months'] = $number_of_months;
				$data['number_of_days'] = $number_of_days;
				$where = array('inmate_id'=>$inmate_info->inmate_id);
				$this->admin_model->update('cs_reasons',$where,$data);
			}

			$this->session->set_flashdata('success_msg','Case was successfully added.');
			redirect(current_url_full());
		}

		$this->data['cases'] = $cases;
		$this->data['violations'] = $vio;
		$this->data['reason_info'] = $reason;
		$this->data['title']	= 'Inmates | Manage Cases';
		$this->data['css']		= array(
									'vendor/select2/select2.css',
									'vendor/select2/select2-bootstrap.css',
									'vendor/alertify/css/alertify.core.css',
									'vendor/alertify/css/alertify.default.css'
								);
		$this->data['js_top']	= array();
		$this->data['header'] 	= $this->load->view('admin/header_view',$this->data,TRUE);
		$this->data['body'] 	= $this->load->view('inmatemanagecases_view',NULL,TRUE);
		$this->data['footer'] 	= $this->load->view('footer_view',NULL,TRUE);
		$this->data['js_bottom']= array(
									'vendor/select2/select2.js',
									'vendor/alertify/js/alertify.js',
									'js/managecases.js'
								);
		$this->data['custom_js']= '<script type="text/javascript">
										$(function(){
											$(".nav-search a").addClass("active");
											$("#violations").select2();

											var unsaved = false;
											$(":input").change(function(){ //trigers change in all input fields including text type
											    unsaved = true;
											});
											$("#btnSave").click(function() {
											    unsaved = false;
											});
											function unloadPage(){ 
											    if(unsaved){
											        return "You have unsaved changes on this page. Do you want to leave this page and discard your changes or stay on this page?";
											    }
											}
											window.onbeforeunload = unloadPage;
										});
									</script>';
		$this->load->view('templates',$this->data);
	}

	public function deletecase($reasons_id){
	
		$case_no = isset($_GET['cno']) ? $_GET['cno'] : 0;
		$delreasons = isset($_GET['reason']) ? $_GET['reason'] : "";
		$reason = $this->admin_model->get('cs_reasons',array('id'=>$reasons_id),TRUE);
		$inmate_info = $this->admin_model->get('inmates_full',array('inmate_id'=>$reason->inmate_id),TRUE);
		if (!empty($inmate_info)) {
			$this->data['inmate_info'] = $inmate_info;
		}

		$where = array(
				'reasons_id' => $reasons_id,
				'case_no' => intval($case_no)
			);
		$data = array('status'=>'deleted','reasons'=>$delreasons);
		$update = $this->admin_model->update('cs_cases',$where,$data);

		//if convict dont change period or date released...
		//recheck max penalty
		if ($inmate_info->status == 'Detainee' || $inmate_info->status == 'Probation') {
			$max_res = $this->admin_model->get_select('cs_cases_full',array('reasons_id'=>$reason->id,'case_status'=>'active'),'MAX(FLOOR(max_year)) as max_penalty',TRUE);
			$max_penalty = $max_res == NULL ? 0 : $max_res->max_penalty;

			$data = array();

			$max_res = $this->db->query('
						SELECT id,violation_id,
						IF(s_max_year is not NULL, s_max_year, 0) as s_max_year,
						IF(s_max_month is not NULL, s_max_month, 0) as s_max_month,
						IF(s_max_day is not NULL, s_max_day, 0) as s_max_day,
						MAX(( IF(s_max_year is not NULL, s_max_year * 365, 0) + IF(s_max_month is not NULL, s_max_year * 30, 0) + IF(s_max_day is not NULL, s_max_day, 0) )) as max_penalty
						FROM (`cs_cases`)
						WHERE `reasons_id` = "'.$reason->id.'" AND status="active" GROUP BY id
					')->result();

			// dump($max_res);
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
		
			if ($number_of_years + $number_of_months + $number_of_days == 0) {
				$data['release_date'] = null;
			}else{
				if ($inmate_info->status == 'Detainee') {
					$s_date = $inmate_info->date_detained;
				}elseif ($inmate_info->status == 'Probation') {
					$s_date = $inmate_info->date_probation;
				}elseif ($inmate_info->status == 'Convict') {
					$s_date = $inmate_info->date_convicted;
				}

				$rd = strtotime("+$number_of_days days",strtotime("+$number_of_months months",strtotime("+$number_of_years years", strtotime($s_date))));
				$data['release_date'] = mdate("%Y-%m-%d",$rd);
			}

			$data['number_of_years'] = $max_penalty;
			$where = array('inmate_id'=>$inmate_info->inmate_id);
			$this->admin_model->update('cs_reasons',$where,$data);

			$case_info = $this->admin_model->get('cs_cases_full',array('case_no'=>$case_no),TRUE);
			//logs
			$logData = array(
						'linked_id' => $case_no,
						'table_name' => 'cs_cases_full',
						'table_field' => 'case_no',
						'subject' => 'Delete Case',
						'reasons' => 'Case # '.$case_info->case_no.' - '.$case_info->name.' '.$case_info->level.' ('.$case_info->RepublicAct.') was deleted to Inmate ID : '.$inmate_info->inmate_id,
						'update_by' => $this->session->userdata('user_id'),
						'action' => 'delete',
						'created_at' => now(),
						'status' => 'active'
					);
			$this->admin_model->save('cs_logs',$logData);

		}

		$this->session->set_flashdata('success_msg','Case was successfully deleted.');
		redirect(base_url('inmate/managecases/'.sprintf("%010d",$reasons_id)));
	}
}

/* End of file search.php */
/* Location: ./application/controllers/search.php */