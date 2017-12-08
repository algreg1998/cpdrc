<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Manage extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->helper('date');
		$this->load->model('cpdrc/cpdrc_fw');
	}
	
	public function index()
	{
		$violations = $this->admin_model->get('cs_violations',array('status'=>'active'),FALSE,'name ASC, level ASC');
		$this->data['violations'] = $violations;
		$this->data['title']	= 'Manage | Violation';
		$this->data['css']		= array(
									'vendor/alertify/css/alertify.core.css',
									'vendor/alertify/css/alertify.default.css');
		$this->data['js_top']	= array();
		$this->data['header'] 	= $this->load->view('admin/header_view',$this->data,TRUE);
		$this->data['body'] 	= $this->load->view('manage_view',NULL,TRUE);
		$this->data['footer'] 	= $this->load->view('footer_view',NULL,TRUE);
		$this->data['js_bottom']= array('vendor/alertify/js/alertify.js');
		$this->data['custom_js']= '<script type="text/javascript">
										$(function(){
											$(".nav-manage").addClass("active");
											$(".nav-manage-violation a").addClass("active");
										});
									</script>';
		$this->load->view('templates',$this->data);
	}

	public function addviolation()
	{
		$violations = $this->admin_model->get('cs_violations',array('status'=>'active'),FALSE,'name ASC, level ASC');
		$categories = $this->admin_model->get('cs_violations_categories',array('status'=>'active'),FALSE,'name ASC');
		
		$this->form_validation->set_rules('name','name','trim|strip_tags|xss_clean|required');
		$this->form_validation->set_rules('description','description','trim|strip_tags|xss_clean|required');
		$this->form_validation->set_rules('level','level','trim|strip_tags|xss_clean|required');
		$this->form_validation->set_rules('RepublicAct','RepublicAct','trim|strip_tags|xss_clean|required');

		if ($this->form_validation->run() !== FALSE) {
			$min_year = $this->input->post('min_year');
			$min_month = $this->input->post('min_month');
			$min_day = $this->input->post('min_day');
			$max_year = $this->input->post('max_year');
			$max_month = $this->input->post('max_month');
			$max_day = $this->input->post('max_day');

			$tot = $min_year + $min_month + $min_day + $max_year + $max_month + $max_day;
			
			$lvl = $this->input->post('level');
			if (intval($tot) <= 0 && ($lvl !== 'lifetime' && $lvl !== 'none')) {
				$this->session->set_flashdata('error_msg','Please add some min and max penalty of the violation.');
				redirect(base_url('manage/addviolation'));
			}

			$vio_data = $this->admin_model
						->array_from_post(
								array(
									'violations_category_id',
									'name',
									'description',
									'level',
									'RepublicAct',
									'min_year',
									'min_month',
									'min_day',
									'max_year',
									'max_month',
									'max_day'
								)
						);
			$vio_data['created_on'] = now();
			//echo now();
			//check if name and level exists
			$where = array(
						'name' => $this->input->post('name'),
						'level' => $this->input->post('level'),
						'RepublicAct' => $this->input->post('RepublicAct'),
						'status' => 'active'
					);
			$chkr = $this->admin_model->get('cs_violations',$where,TRUE);
			if (!empty($chkr)) {
				$this->session->set_flashdata('error_msg','Violation is already exists.');
				redirect(base_url('manage/addviolation'));
			}
			$this->session->set_flashdata('success_msg','Violation was successfully saved.');
			$save = $this->admin_model->save('cs_violations',$vio_data);

			//logs
			$logData = array(
						'linked_id' => $save,
						'table_name' => 'cs_violations',
						'table_field' => 'id',
						'subject' => 'Add Violation',
						'reasons' => 'Violation "'.$this->input->post('name').'" was added',
						'update_by' => $this->session->userdata('user_id'),
						'action' => 'add',
						'created_at' => date("Y-m-d h:i:sa"),
						'status' => 'active'
					);
			$this->admin_model->save('cs_logs',$logData);

			redirect(base_url('manage/addviolation'));
		}
		$cats = $categories;
		$categories = array();
		foreach ($cats as $cat) {
			$categories[$cat->id] = $cat->name;
		}

		$this->data['violations'] = $violations;
		$this->data['categories'] = $categories;

		$this->data['title']	= 'Manage';
		$this->data['css']		= array();
		$this->data['js_top']	= array();
		$this->data['header'] 	= $this->load->view('admin/header_view',$this->data,TRUE);
		$this->data['body'] 	= $this->load->view('addviolation_view',NULL,TRUE);
		$this->data['footer'] 	= $this->load->view('footer_view',NULL,TRUE);
		$this->data['js_bottom']= array('js/autoNumeric.js');
		$this->data['custom_js']= '<script type="text/javascript">
										$(function(){
											$(".nav-manage").addClass("active");
											$(".nav-manage-violation a").addClass("active");

											$("#min_year,#min_month,#min_day").autoNumeric({
												aPad:false,
												aSep:"",
												mDec:0,
												vMin:0,
												vMax:200
											});
											$("#max_year,#max_month,#max_day").autoNumeric({
												aPad:false,
												aSep:"",
												mDec:0,
												vMax:200
											});
											
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

	public function editviolation($id)
	{
		$violations = $this->admin_model->get('cs_violations',array('status'=>'active'),FALSE,'name ASC, level ASC');
		$categories = $this->admin_model->get('cs_violations_categories',array('status'=>'active'),FALSE,'name ASC');
		
		$violation_info = $this->admin_model->get('cs_violations',array('id'=>$id,'status'=>'active'),TRUE);
		$this->form_validation->set_rules('name','name','trim|strip_tags|xss_clean|required');
		$this->form_validation->set_rules('description','description','trim|strip_tags|xss_clean|required');
		$this->form_validation->set_rules('level','level','trim|strip_tags|xss_clean|required');
		$this->form_validation->set_rules('RepublicAct','RepublicAct','trim|strip_tags|xss_clean|required');

		if ($this->form_validation->run() !== FALSE) {
			$min_year = $this->input->post('min_year');
			$min_month = $this->input->post('min_month');
			$min_day = $this->input->post('min_day');
			$max_year = $this->input->post('max_year');
			$max_month = $this->input->post('max_month');
			$max_day = $this->input->post('max_day');

			$tot = $min_year + $min_month + $min_day + $max_year + $max_month + $max_day;
			
			$lvl = $this->input->post('level');
			if (intval($tot) <= 0 && ($lvl !== 'lifetime' && $lvl !== 'none')) {
				$this->session->set_flashdata('error_msg','Please add some min and max penalty of the violation.');
				redirect(base_url('manage/addviolation'));
			}

			$vio_data = $this->admin_model
						->array_from_post(
								array(
									'violations_category_id',
									'name',
									'description',
									'level',
									'RepublicAct',
									'min_year',
									'min_month',
									'min_day',
									'max_year',
									'max_month',
									'max_day'
								)
						);
			$vio_data['created_on'] = now();

			//check if name and level exists
			$where = array(
						'name'=>$this->input->post('name'),
						'level'=>$this->input->post('level'),
						'id !=' => $id,
						'status'=>'active'
					);
			$chkr = $this->admin_model->get('cs_violations',$where,TRUE);
			if (!empty($chkr)) {
				$this->session->set_flashdata('error_msg','Violation Name and Level is already exists.');
				redirect(base_url('manage/editviolation/'.$id));
			}
			$this->session->set_flashdata('success_msg','Violation was successfully updated.');
			$update = $this->admin_model->update('cs_violations',array('id'=>$id,'status'=>'active'),$vio_data);
			redirect(base_url('manage/editviolation/'.$id));
		}
		$cats = $categories;
		$categories = array();
		foreach ($cats as $cat) {
			$categories[$cat->id] = $cat->name;
		}

		$this->data['violations'] = $violations;
		$this->data['categories'] = $categories;
		$this->data['violation_info'] = $violation_info;

		$this->data['title']	= 'Manage';
		$this->data['css']		= array();
		$this->data['js_top']	= array();
		$this->data['header'] 	= $this->load->view('admin/header_view',$this->data,TRUE);
		$this->data['body'] 	= $this->load->view('editviolation_view',NULL,TRUE);
		$this->data['footer'] 	= $this->load->view('footer_view',NULL,TRUE);
		$this->data['js_bottom']= array('js/autoNumeric.js');
		$this->data['custom_js']= '<script type="text/javascript">
										$(function(){
											$(".nav-manage").addClass("active");
											$(".nav-manage-violation a").addClass("active");

											$("#min_year,#min_month,#min_day").autoNumeric({
												aPad:false,
												aSep:"",
												mDec:0,
												vMin:0,
												vMax:200
											});
											$("#max_year,#max_month,#max_day").autoNumeric({
												aPad:false,
												aSep:"",
												mDec:0,
												vMax:200
											});
											
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

	public function addviolationcategories()
	{
		$this->form_validation->set_rules('name','name','trim|strip_tags|xss_clean|required');
		$this->form_validation->set_rules('description','description','trim|strip_tags|xss_clean|required');
		
		$categories = $this->admin_model->get('cs_violations_categories',array('status'=>'active'),FALSE,'name ASC');

		if ($this->form_validation->run() !== FALSE) {

			$vio_data = $this->admin_model->array_from_post(array('name','description'));
			$vio_data['created_on'] = now();
			$vio_data['modified_on'] = now(); 
			//check if name and level exists
			$where = array('name'=>$this->input->post('name'),'status'=>'active');
			$chkr = $this->admin_model->get('cs_violations_categories',$where,TRUE);
			if (!empty($chkr)) {
				$this->session->set_flashdata('error_msg','Category is already exists.');
				redirect(base_url('manage/addviolationcategories'));
			}
			$this->session->set_flashdata('success_msg','Violation was successfully saved.');
			$save = $this->admin_model->save('cs_violations_categories',$vio_data);
			redirect(base_url('manage/addviolationcategories'));
		}

		$this->data['categories'] = $categories;
		$this->data['title']	= 'Manage';
		$this->data['css']		= array(
									'vendor/alertify/css/alertify.core.css',
									'vendor/alertify/css/alertify.default.css');
		$this->data['js_top']	= array();
		$this->data['header'] 	= $this->load->view('admin/header_view',$this->data,TRUE);
		$this->data['body'] 	= $this->load->view('addviolationcategory_view',NULL,TRUE);
		$this->data['footer'] 	= $this->load->view('footer_view',NULL,TRUE);
		$this->data['js_bottom']= array('vendor/alertify/js/alertify.js');
		$this->data['custom_js']= '<script type="text/javascript">
										$(function(){
											$(".nav-manage").addClass("active");
											$(".nav-manage-violation a").addClass("active");
											
											$("#btnSave").click(function(){
												var catName = $("#name").val();
												var description = $("#description").val();
												if (description !== "" && catName !== "") {
													alertify.set({ labels: {
												        ok     : "Yes",
												        cancel : "No"
												    }else{alert("asdasd")} });
												    alertify.confirm("Are you sure you want to add <strong>"+catName+"</strong>?", function (e) {
												        if (e) {
												            $("#addViolationForm").submit();
												        } else {
												            return false;
												        }
												    });
												}

												return false;
											});
											$(".generalAlertify").click(function(){
											    var red = $(this).attr("href");
											    var type = $(this).attr("data-type");
											    var item = $(this).attr("data-item");
											    alertify.set({ labels: {
											        ok     : "Yes",
											        cancel : "No"
											    } });
											    alertify.confirm("Are you sure you want to "+type+" <strong>"+item+"</strong>?", function (e) {
											        if (e) {
											            window.location.href = red;
											        } else {
											            return false;
											        }
											    });

											    return false;
											});
											
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

	public function editviolationcategories($id)
	{
		$this->form_validation->set_rules('name','name','trim|strip_tags|xss_clean|required');
		$this->form_validation->set_rules('description','description','trim|strip_tags|xss_clean|required');

		// $categories = $this->admin_model->get('cs_violations_categories',null,FALSE,'name ASC');

		$violation_info = $this->admin_model->get('cs_violations_categories',array('id'=>$id,'status'=>'active'),TRUE);

		if ($this->form_validation->run() !== FALSE) {

			$vio_data = $this->admin_model->array_from_post(array('name','description'));
			$vio_data['modified_on'] = now();
			//check if name and level exists
			$where = array('name'=>$this->input->post('name'),'status'=>'active');
			$chkr = $this->admin_model->get('cs_violations_categories',$where,TRUE);
			if (!empty($chkr) && $chkr->id !== $id) {
				$this->session->set_flashdata('error_msg','Category is already exists.');
				redirect(base_url('manage/addviolationcategories'));
			}
			$this->session->set_flashdata('success_msg','Violation was successfully saved.');
			$save = $this->admin_model->update('cs_violations_categories',array('id'=>$id,'status'=>'active'),$vio_data);
			redirect(base_url('manage/addviolationcategories'));
		}

		$this->data['violation_info'] = $violation_info;
		$this->data['title']	= 'Manage';
		$this->data['css']		= array(
									'vendor/alertify/css/alertify.core.css',
									'vendor/alertify/css/alertify.default.css');
		$this->data['js_top']	= array();
		$this->data['header'] 	= $this->load->view('admin/header_view',$this->data,TRUE);
		$this->data['body'] 	= $this->load->view('editviolationcategory_view',NULL,TRUE);
		$this->data['footer'] 	= $this->load->view('footer_view',NULL,TRUE);
		$this->data['js_bottom']= array('vendor/alertify/js/alertify.js');
		$this->data['custom_js']= '<script type="text/javascript">
										$(function(){
											$(".nav-manage").addClass("active");
											$(".nav-manage-violation a").addClass("active");

											$(".generalAlertify").click(function(){
											    var red = $(this).attr("href");
											    var type = $(this).attr("data-type");
											    var item = $(this).attr("data-item");
											    alertify.set({ labels: {
											        ok     : "Yes",
											        cancel : "No"
											    } });
											    alertify.confirm("Are you sure you want to "+type+" <strong>"+item+"</strong>?", function (e) {
											        if (e) {
											            window.location.href = red;
											        } else {
											            return false;
											        }
											    });

											    return false;
											});
											
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

	public function deleteviolationcategories($id){
		$checkr = $this->admin_model->get('cs_violations',array('violations_category_id' => $id,'status'=>'active'));
		if (!empty($checkr )) {
			$this->session->set_flashdata('error_msg','You cannot delete that category. It already been used.');
			redirect(base_url('manage/addviolationcategories'));
		}

		$this->admin_model->update('cs_violations_categories',array('id' => $id),array('status'=>'deleted'));
		$this->session->set_flashdata('success_msg','Category was successfully deleted.');
		redirect(base_url('manage/addviolationcategories'));
		
	}

	public function deleteviolation($id){
		$checkr = $this->admin_model->get('cs_cases',array('violation_id' => $id,'status'=>'deleted'));
		if (!empty($checkr )) {
			$this->session->set_flashdata('error_msg','You cannot delete that violation. Some cases connected with it.');
			redirect(base_url('manage'));
		}

		$this->admin_model->update('cs_violations',array('id' => $id),array('status'=>'deleted'));

		$violation_info = $this->admin_model->get('cs_violations',array('id' => $id),true);
		
		//logs
		$logData = array(
					'linked_id' => $id,
					'table_name' => 'cs_violations',
					'table_field' => 'id',
					'subject' => 'Delete Violation',
					'reasons' => 'Violation "'.$violation_info->name.' '.$violation_info->level.' ('.$violation_info->RepublicAct.')" was deleted',
					'update_by' => $this->session->userdata('user_id'),
					'action' => 'delete',
					'created_at' => date("Y-m-d h:i:sa"),
					'status' => 'active'
				);
		$this->admin_model->save('cs_logs',$logData);

		$this->session->set_flashdata('success_msg','Violation was successfully deleted.');
		redirect(base_url('manage'));
		
	}

	public function archive(){
		$archive_cases = $this->admin_model->get('cs_cases_full',array('case_status'=>'deleted'),FALSE,'name ASC, level ASC');
		$this->data['archive_cases'] = $archive_cases;
		$this->data['title']	= 'Manage | Archive';
		$this->data['css']		= array(
									'vendor/alertify/css/alertify.core.css',
									'vendor/alertify/css/alertify.default.css');
		$this->data['js_top']	= array();
		$this->data['header'] 	= $this->load->view('admin/header_view',$this->data,TRUE);
		$this->data['body'] 	= $this->load->view('archive_view',NULL,TRUE);
		$this->data['footer'] 	= $this->load->view('footer_view',NULL,TRUE);
		$this->data['js_bottom']= array('vendor/alertify/js/alertify.js','js/archive.js');
		$this->data['custom_js']= '<script type="text/javascript">
										$(function(){
											$(".nav-manage").addClass("active");
											$(".nav-manage-archive a").addClass("active");
										});
									</script>';
		$this->load->view('templates',$this->data);
	}

	public function restorearchive($id = 0){

		$case_info = $this->admin_model->get('cs_cases_full',array('case_id'=>$id,'case_status'=>'deleted'),TRUE);
		if (empty($case_info)) {
			redirect(base_url('manage/archive'));
		}

		$reasons = isset($_GET['reason']) ? $_GET['reason'] : '';
		$where = array('id' => $id);
		$data = array('status'=>'active','reasons'=>$reasons);
		$results = $this->admin_model->update('cs_cases',$where,$data);

		$reason = $this->admin_model->get('cs_reasons',array('id'=>$case_info->reasons_id),TRUE);
		$cases = $this->admin_model->get('cs_cases_full',array('reasons_id'=>$reason->id,'case_status'=>'active'),FALSE,'name ASC, level ASC');

		$violation_info = $this->admin_model->get('cs_violations',array('id'=>$case_info->violation_id),TRUE);
		$inmate_info = $this->admin_model->get('inmates_full',array('inmate_id'=>$reason->inmate_id),TRUE);

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
			$where = array('inmate_id'=>$reason->inmate_id);
			$this->admin_model->update('cs_reasons',$where,$data);
		}


		//logs
		$logData = array(
					'linked_id' => $id,
					'table_name' => 'cs_cases',
					'table_field' => 'id',
					'subject' => 'Restore Case',
					'reasons' => 'Restore case # '.$case_info->case_no.' of Inmate ID: '.$inmate_info->inmate_id,
					'update_by' => $this->session->userdata('user_id'),
					'action' => 'restore',
					'created_at' => date("Y-m-d h:i:sa"),
					'status' => 'active'
				);
		$this->admin_model->save('cs_logs',$logData);

		$this->session->set_flashdata('success_msg','Case was successfully restored.');
		redirect('manage/archive');
	}

	public function logs()
	{
		$this->load->library('pagination');
        $page = isset($_GET['offset']) && !empty($_GET['offset']) ? intval($_GET['offset']) : 0;
        $add_query = "";
        $like = "";
        $filter = "";
        $order_by = "created_on asc";
        
        if (isset($_GET['keywords'])) {
            $keywords = $_GET['keywords'];
            $add_query .= "keywords=".$_GET['keywords'];
            $like = explode(" ",$keywords);
        }
        if (isset($_GET['filter']) && $_GET['filter'] !== "all") {
            $pre = isset($_GET['keywords']) ? '&' : '';
            $xplod = explode("-", $_GET['filter']);
            $filter = strtolower(end($xplod));
            $add_query .= $pre."filter=".$filter;
        }
        
        $config['base_url'] = base_url().'manage/logs?'.$add_query;
        $where = array('status !='=>'deleted');
        $config['total_rows'] = $this->admin_model->search_count('cs_logs',$where,$like,$filter,NULL,FALSE);

        $config['per_page'] = 10;
        $config['uri_protocol'] = "PATH_INFO";
        //$config['use_page_numbers'] = TRUE;     
        $config['page_query_string'] = TRUE;
        $config['enable_query_strings']=TRUE;
        $config['query_string_segment'] = 'offset';

        $config['full_tag_open'] = "<ul class='pagination'>";
        $config['full_tag_close'] ="</ul>";
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
        $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
        $config['next_tag_open'] = "<li>";
        $config['next_tagl_close'] = "</li>";
        $config['prev_tag_open'] = "<li>";
        $config['prev_tagl_close'] = "</li>";
        $config['first_tag_open'] = "<li>";
        $config['first_tagl_close'] = "</li>";
        $config['last_tag_open'] = "<li>";
        $config['last_tagl_close'] = "</li>";

        $this->pagination->initialize($config);
        $this->data['page'] = $this->pagination->create_links();

        $where = array('cs_logs.status !='=>'deleted');
        $this->data['logs'] = $this->admin_model->getLogs($config['per_page'],$page);
        //echo $this->admin_model->db->last_query();
        //if deleted all rows in page..
        if (empty($this->data['logs']) && $page > 0) {
            
            $sub = $config['total_rows']/$config['per_page'];
            $whole = intval($sub);
            if ($sub > $whole) {
                $thepage = $whole * $config['per_page'];
            }

            $red = 'manage/logs?'.$add_query.'&offset='.$thepage;
            redirect($red);
        }

		$this->data['title']	= 'Manage | Logs';
		$this->data['css']		= array(
									'vendor/alertify/css/alertify.core.css',
									'vendor/alertify/css/alertify.default.css');
		$this->data['js_top']	= array();
		$this->data['header'] 	= $this->load->view('admin/header_view',$this->data,TRUE);
		$this->data['body'] 	= $this->load->view('logs_view',NULL,TRUE);
		$this->data['footer'] 	= $this->load->view('footer_view',NULL,TRUE);
		$this->data['js_bottom']= array('vendor/alertify/js/alertify.js');
		$this->data['custom_js']= '<script type="text/javascript">
										$(function(){
											$(".nav-manage").addClass("active");
											$(".nav-manage-logs a").addClass("active");
										});
									</script>';
		$this->load->view('templates',$this->data);
	}

	public function courts()
	{
		
		$courts = $this->admin_model->get_select('view_court v,court c','c.status = "active" AND v.court_id = c.court_id',"v.court_id ,v.court_name");
		// //echo $this->admin_model->db->last_query();
		$this->data['courts'] = $courts;
		$this->data['title']	= 'Manage | Courts';
		$this->data['css']		= array(
									'vendor/alertify/css/alertify.core.css',
									'vendor/alertify/css/alertify.default.css');
		$this->data['js_top']	= array();
		$this->data['header'] 	= $this->load->view('admin/header_view',$this->data,TRUE);
		$this->data['body'] 	= $this->load->view('court_view',NULL,TRUE);
		$this->data['footer'] 	= $this->load->view('footer_view',NULL,TRUE);
		$this->data['js_bottom']= array('vendor/alertify/js/alertify.js');
		$this->data['custom_js']= '<script type="text/javascript">
										$(function(){
											$(".nav-manage").addClass("active");
											$(".nav-manage-courts a").addClass("active");
											$(".generalAlertify").click(function(){
											    var red = $(this).attr("href");
											    var type = $(this).attr("data-type");
											    var item = $(this).attr("data-item");
											    alertify.set({ labels: {
											        ok     : "Yes",
											        cancel : "No"
											    } });
											    alertify.confirm("Are you sure you want to "+type+" <strong>"+item+"</strong>?", function (e) {
											        if (e) {
											            window.location.href = red;
											        } else {
											            return false;
											        }
											    });

											    return false;
											});
										});
									</script>';
		$this->load->view('templates',$this->data);
	}

	public function addcourt()
	{
		$courts = $this->admin_model->get('court',"court_mun IS NOT  NULL",FALSE);
		
		$municipalities = $this->admin_model->get('municipality',"province != 'Default'",FALSE);
		
		$this->form_validation->set_rules('court_name','court_name','trim|strip_tags|xss_clean|required');
		
		if ($this->form_validation->run() !== FALSE) {
			
			//data
			$data = array(
						"court_name"=>$this->input->post("court_name"),
						"court_mun"=>$this->input->post("court_municipality_id"),
						"status" => "active"
					);
			$save =$this->admin_model->save('court',$data);
			if(!empty($save)){
				$this->session->set_flashdata('success_msg','Court was successfully saved.');
				//logs
				$logData = array(
							'linked_id' => $save,
							'table_name' => 'court',
							'table_field' => 'court_id',
							'subject' => 'Add Court',
							'reasons' => 'Court "'.$this->input->post('court_name').'" was added',
							'update_by' => $this->session->userdata('user_id'),
							'action' => 'add',
							'created_at' => date("Y-m-d h:i:sa"),
							'status' => 'active'
						);
				$this->admin_model->save('cs_logs',$logData);
			}
			redirect(base_url('manage/addcourt'));
		}
		$muns = $municipalities;
		$municipalities = array();
		foreach ($muns as $mun) {
			$municipalities[$mun->mun_id] = $mun->mun_name.", ".$mun->province;
		}

		$this->data['courts'] = $courts;
		$this->data['municipalities'] = $municipalities;

		$this->data['title']	= 'Manage Courts';
		$this->data['css']		= array();
		$this->data['js_top']	= array();
		$this->data['header'] 	= $this->load->view('admin/header_view',$this->data,TRUE);
		$this->data['body'] 	= $this->load->view('addcourt_view',NULL,TRUE);
		$this->data['footer'] 	= $this->load->view('footer_view',NULL,TRUE);
		$this->data['js_bottom']= array('js/autoNumeric.js');
		$this->data['custom_js']= '<script type="text/javascript">
										$(function(){
											$(".nav-manage").addClass("active");
											$(".nav-manage-courts a").addClass("active");

											$("#min_year,#min_month,#min_day").autoNumeric({
												aPad:false,
												aSep:"",
												mDec:0,
												vMin:0,
												vMax:200
											});
											$("#max_year,#max_month,#max_day").autoNumeric({
												aPad:false,
												aSep:"",
												mDec:0,
												vMax:200
											});
											
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

	public function editcourt($id)
	{
		$this->form_validation->set_rules('court_name','court_name','trim|strip_tags|xss_clean|required');
		//$this->form_validation->set_rules('description','description','trim|strip_tags|xss_clean|required');

		// $categories = $this->admin_model->get('cs_violations_categories',null,FALSE,'name ASC');

		$court_info = $this->admin_model->get('court',array('court_id'=>$id,'status'=>'active'),TRUE);
		$municipalities = $this->admin_model->get('municipality',"province != 'Default'",FALSE);
		
		$muns = $municipalities;
		$municipalities = array();
		foreach ($muns as $mun) {
			$municipalities[$mun->mun_id] = $mun->mun_name;
		}

		if ($this->form_validation->run() !== FALSE) {

			$court_data = $this->admin_model->array_from_post(array('court_name','court_mun'));
			
			//check if name and level exists
			$where = array('court_name'=>$this->input->post('court_name'),'status'=>'active');
			$chkr = $this->admin_model->get('court',$where,TRUE);
			if (!empty($chkr) && $chkr->id !== $id) {
				$this->session->set_flashdata('error_msg','Court is already existing.');
				redirect(base_url('manage/editcourt/'.$id));
			}
			$this->session->set_flashdata('success_msg','Court was successfully saved.');
			//echo $this->input->post('court_mun');
			$save = $this->admin_model->update('court',array('court_id'=>$id),$court_data);
			$this->session->set_flashdata('success_msg','Court was successfully saved.');
			//logs
			$logData = array(
						'linked_id' => $save,
						'table_name' => 'court',
						'table_field' => 'court_id',
						'subject' => 'Update Court',
						'reasons' => 'Court "'.$this->input->post('court_name').'" was updated',
						'update_by' => $this->session->userdata('user_id'),
						'action' => 'update',
						'created_at' => date("Y-m-d h:i:sa"),
						'status' => 'active'
					);
			$this->admin_model->save('cs_logs',$logData);
			redirect(base_url('manage/courts'));
		}
		

		$this->data['court_info'] = $court_info;
		$this->data['municipalities'] = $municipalities;

		$this->data['title']	= 'Manage';
		$this->data['css']		= array(
									'vendor/alertify/css/alertify.core.css',
									'vendor/alertify/css/alertify.default.css');
		$this->data['js_top']	= array();
		$this->data['header'] 	= $this->load->view('admin/header_view',$this->data,TRUE);
		$this->data['body'] 	= $this->load->view('editcourt_view',NULL,TRUE);
		$this->data['footer'] 	= $this->load->view('footer_view',NULL,TRUE);
		$this->data['js_bottom']= array('vendor/alertify/js/alertify.js');
		$this->data['custom_js']= '<script type="text/javascript">
										$(function(){
											$(".nav-manage").addClass("active");
											$(".nav-manage-violation a").addClass("active");

											$(".generalAlertify").click(function(){
											    var red = $(this).attr("href");
											    var type = $(this).attr("data-type");
											    var item = $(this).attr("data-item");
											    alertify.set({ labels: {
											        ok     : "Yes",
											        cancel : "No"
											    } });
											    alertify.confirm("Are you sure you want to "+type+" <strong>"+item+"</strong>?", function (e) {
											        if (e) {
											            window.location.href = red;
											        } else {
											            return false;
											        }
											    });

											    return false;
											});
											
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

	public function deletecourt($id)
	{
		/*$checkr = $this->admin_model->get('court',array('court_mun' => $id));
		if (!empty($checkr)) {
			$this->session->set_flashdata('error_msg','You cannot delete that municipality. Some court connected with it.');
			redirect(base_url('manage/addcourtmunicipalities'));
		}*/
		
		$this->admin_model->update('court',array('court_id' => $id),array('status'=>'deleted'));

		$court_info = $this->admin_model->get('court',array('court_id' => $id),true);
		
		//logs
		$logData = array(
					'linked_id' => $id,
					'table_name' => 'court',
					'table_field' => 'id',
					'subject' => 'Delete Court',
					'reasons' => 'Court "'.$court_info->court_name.'" was deleted',
					'update_by' => $this->session->userdata('user_id'),
					'action' => 'delete',
					'created_at' => date("Y-m-d h:i:sa"),
					'status' => 'active'
				);
		$this->admin_model->save('cs_logs',$logData);

		$this->session->set_flashdata('success_msg','Court was successfully deleted.');
		redirect(base_url('manage/courts'));
	}

	public function addcourtmunicipalities()
	{
		$this->form_validation->set_rules('name','name','trim|strip_tags|xss_clean|required');
		$this->form_validation->set_rules('province','province','trim|strip_tags|xss_clean|required');
		// $this->form_validation->set_rules('description','description','trim|strip_tags|xss_clean|required');

		$municipalities = $this->admin_model->get('municipality',array('mun_id !='=>0, 'status' => 'active'),FALSE);
		
		if ($this->form_validation->run() !== FALSE) {
			$data = array( "mun_name"=>$this->input->post("name"),
						   "province"=>$this->input->post("province"),
						   "status"=>"active",
						);
			if ($this->cpdrc_fw->checkmunicipality($data['mun_name']) == FALSE) {
				$save=$this->admin_model->save('municipality', $data);
				$this->session->set_flashdata('success_msg','Municipality was successfully saved.');
				//logs
				
				$logData = array(
							'linked_id' => $save,
							'table_name' => 'municipality',
							'table_field' => 'mun_id',
							'subject' => 'Add Municipality',
							'reasons' => 'Municipality "'.$this->input->post('name').'" was added',
							'update_by' => $this->session->userdata('user_id'),
							'action' => 'add',
							'created_at' => date("Y-m-d h:i:sa"),
							'status' => 'active'
						);
				$this->admin_model->save('cs_logs',$logData);
			} else {
				$this->session->set_flashdata('error_msg','Municipality is already exists.');
			}
				
			redirect(base_url('manage/addcourtmunicipalities'));
		}

		$this->data['municipalities'] = $municipalities;
		$this->data['title']	= 'Manage';
		$this->data['css']		= array(
									'vendor/alertify/css/alertify.core.css',
									'vendor/alertify/css/alertify.default.css');
		$this->data['js_top']	= array();
		$this->data['header'] 	= $this->load->view('admin/header_view',$this->data,TRUE);
		$this->data['body'] 	= $this->load->view('addcourtmunicipality_view',NULL,TRUE);
		$this->data['footer'] 	= $this->load->view('footer_view',NULL,TRUE);
		$this->data['js_bottom']= array('vendor/alertify/js/alertify.js');
		$this->data['custom_js']= '<script type="text/javascript">
										$(function(){
											$(".nav-manage").addClass("active");
											$(".nav-manage-violation a").addClass("active");
											
											$("#btnSave").click(function(){
												var catName = $("#name").val();
												var description = $("#description").val();
												if (description !== "" && catName !== "") {
													alertify.set({ labels: {
												        ok     : "Yes",
												        cancel : "No"
												    } });
												    alertify.confirm("Are you sure you want to add <strong>"+catName+"</strong>?", function (e) {
												        if (e) {
												            $("#addViolationForm").submit();
												        } else {
												            return false;
												        }
												    });
												}

												return false;
											});
											$(".generalAlertify").click(function(){
											    var red = $(this).attr("href");
											    var type = $(this).attr("data-type");
											    var item = $(this).attr("data-item");
											    alertify.set({ labels: {
											        ok     : "Yes",
											        cancel : "No"
											    } });
											    alertify.confirm("Are you sure you want to "+type+" <strong>"+item+"</strong>?", function (e) {
											        if (e) {
											            window.location.href = red;
											        } else {
											            return false;
											        }
											    });

											    return false;
											});
											
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
	
	public function editcourtmunicipalities($id)
	{
		$this->form_validation->set_rules('mun_name','mun_name','trim|strip_tags|xss_clean|required');
		$this->form_validation->set_rules('province','province','trim|strip_tags|xss_clean|required');

		// $categories = $this->admin_model->get('cs_violations_categories',null,FALSE,'name ASC');

		$municipality_info = $this->admin_model->get('municipality',array('mun_id'=>$id,'status'=>'active'),TRUE);

		if ($this->form_validation->run() !== FALSE) {

			$municipality_data = $this->admin_model->array_from_post(array('mun_name','province'));
			
			//check if name and level exists
			$where = array('mun_name'=>$this->input->post('mun_name'),'status'=>'active');
			$chkr = $this->admin_model->get('municipality',$where,TRUE);
			if (!empty($chkr) && $chkr->id !== $id) {
				$this->session->set_flashdata('error_msg','Category is already existing.');
				redirect(base_url('manage/addcourtmunicipalities'));
			}
			$this->session->set_flashdata('success_msg','Municipality was successfully saved.');
			$save = $this->admin_model->update('municipality',array('mun_id'=>$id,'status'=>'active'),$municipality_data);
			$logData = array(
							'linked_id' => $save,
							'table_name' => 'municipality',
							'table_field' => 'mun_id',
							'subject' => 'Update Municipality',
							'reasons' => 'Municipality "'.$this->input->post('mun_name').'" was updated',
							'update_by' => $this->session->userdata('user_id'),
							'action' => 'update',
							'created_at' => date("Y-m-d h:i:sa"),
							'status' => 'active'
						);
			$this->admin_model->save('cs_logs',$logData);

			redirect(base_url('manage/addcourtmunicipalities'));
		}

		$this->data['municipality_info'] = $municipality_info;
		$this->data['title']	= 'Manage';
		$this->data['css']		= array(
									'vendor/alertify/css/alertify.core.css',
									'vendor/alertify/css/alertify.default.css');
		$this->data['js_top']	= array();
		$this->data['header'] 	= $this->load->view('admin/header_view',$this->data,TRUE);
		$this->data['body'] 	= $this->load->view('editcourtmunicipality_view',NULL,TRUE);
		$this->data['footer'] 	= $this->load->view('footer_view',NULL,TRUE);
		$this->data['js_bottom']= array('vendor/alertify/js/alertify.js');
		$this->data['custom_js']= '<script type="text/javascript">
										$(function(){
											$(".nav-manage").addClass("active");
											$(".nav-manage-violation a").addClass("active");

											$(".generalAlertify").click(function(){
											    var red = $(this).attr("href");
											    var type = $(this).attr("data-type");
											    var item = $(this).attr("data-item");
											    alertify.set({ labels: {
											        ok     : "Yes",
											        cancel : "No"
											    } });
											    alertify.confirm("Are you sure you want to "+type+" <strong>"+item+"</strong>?", function (e) {
											        if (e) {
											            window.location.href = red;
											        } else {
											            return false;
											        }
											    });

											    return false;
											});
											
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
	public function deletemunicipality($id)
	{
		$checkr = $this->admin_model->get('court',array('court_mun' => $id));
		if (!empty($checkr)) {
			$this->session->set_flashdata('error_msg','You cannot delete that municipality. Some court connected with it.');
			redirect(base_url('manage/addcourtmunicipalities'));
		}

		$this->admin_model->update('municipality',array('mun_id' => $id),array('status'=>'deleted'));

		$municipality_info = $this->admin_model->get('municipality',array('mun_id' => $id),true);
		
		//logs
		$logData = array(
					'linked_id' => $id,
					'table_name' => 'municipality',
					'table_field' => 'mun_id',
					'subject' => 'Delete Municipality',
					'reasons' => 'Municipality "'.$municipality_info->mun_name.'" was deleted',
					'update_by' => $this->session->userdata('user_id'),
					'action' => 'delete',
					'created_at' => date("Y-m-d h:i:sa"),
					'status' => 'active'
				);
		$this->admin_model->save('cs_logs',$logData);

		$this->session->set_flashdata('success_msg','Municipality was successfully deleted.');
		redirect(base_url('manage/addcourtmunicipalities'));
	}
	public function now(){
		return date("Y-m-d h:i:sa");
	}
	public function cells()
	{
		$this->data['cells'] = $this->admin_model->get_select('cell','status = "active"',"*");
		
		$this->data['title']	= 'Manage | Cells';
		$this->data['css']		= array(
									'vendor/alertify/css/alertify.core.css',
									'vendor/alertify/css/alertify.default.css');
		$this->data['js_top']	= array();
		$this->data['header'] 	= $this->load->view('admin/header_view',$this->data,TRUE);
		$this->data['body'] 	= $this->load->view('cell_view',NULL,TRUE);
		$this->data['footer'] 	= $this->load->view('footer_view',NULL,TRUE);
		$this->data['js_bottom']= array('vendor/alertify/js/alertify.js');
		$this->data['custom_js']= '<script type="text/javascript">
										$(function(){
											$(".nav-manage").addClass("active");
											$(".nav-manage-cells a").addClass("active");
										});
										$(".generalAlertify").click(function(){
											    var red = $(this).attr("href");
											    var type = $(this).attr("data-type");
											    var item = $(this).attr("data-item");
											    alertify.set({ labels: {
											        ok     : "Yes",
											        cancel : "No"
											    } });
											    alertify.confirm("Are you sure you want to "+type+" <strong>"+item+"</strong>?", function (e) {
											        if (e) {
											            window.location.href = red;
											        } else {
											            return false;
											        }
											    });

											    return false;
											});
									</script>';
		$this->load->view('templates',$this->data);
	}

	public function addcell()
	{
		$this->form_validation->set_rules('cellNumber','cellNumber','trim|strip_tags|xss_clean|required');
		$this->form_validation->set_rules('capacity','capacity','trim|strip_tags|xss_clean|required');
		
		if ($this->form_validation->run() !== FALSE) {
			
			//data
			$data = array(
						"cellNumber"=>$this->input->post("cellNumber"),
						"capacity"=>$this->input->post("capacity"),
						"status" => "active"
					);
			$where = array("cellNumber" => $this->input->post("cellNumber"));
			$result = $this->admin_model->get("cell",$where,TRUE);
			if(empty($result)){
				$save = $this->admin_model->save('cell',$data);
				$this->session->set_flashdata('success_msg','Cell was successfully saved.');
				//logs
			$logData = array(
						'linked_id' => $save,
						'table_name' => 'cell',
						'table_field' => 'cellId',
						'subject' => 'Add Cell',
						'reasons' => 'Cell "'.$this->input->post("cellNumber").'" was added',
						'update_by' => $this->session->userdata('user_id'),
						'action' => 'add',
						'created_at' => date("Y-m-d h:i:sa"),
						'status' => 'active'
					);
			$this->admin_model->save('cs_logs',$logData);
			}else{
				$this->session->set_flashdata('error_msg','Cell "'.$this->input->post("cellNumber").'" already exists.');
			}
			redirect(base_url('manage/addcell'));
		}
		
		$this->data['title']	= 'Manage Courts';
		$this->data['css']		= array();
		$this->data['js_top']	= array();
		$this->data['header'] 	= $this->load->view('admin/header_view',$this->data,TRUE);
		$this->data['body'] 	= $this->load->view('addcell_view',NULL,TRUE);
		$this->data['footer'] 	= $this->load->view('footer_view',NULL,TRUE);
		$this->data['js_bottom']= array('js/autoNumeric.js');
		$this->data['custom_js']= '<script type="text/javascript">
										$(function(){
											$(".nav-manage").addClass("active");
											$(".nav-manage-cells a").addClass("active");
										});
									</script>';
		$this->load->view('templates',$this->data);
	}

	public function editcell($id)
	{
		$this->form_validation->set_rules('cellNumber','cellNumber','trim|strip_tags|xss_clean|required');
		$this->form_validation->set_rules('capacity','capacity','trim|strip_tags|xss_clean|required');
		
		if ($this->form_validation->run() !== FALSE) {

			//$court_data = $this->admin_model->array_from_post(array('court_name','court_mun','cellId'));
			$court_data = array(
								"cellNumber" => $this->input->post('cellNumber'),
								"capacity" => $this->input->post('capacity')
								);
			$where = array('cellId'=>$this->input->post('cellId'),'status'=>'active');
			$chkr = $this->admin_model->get('cell',$where,TRUE);
			// if (!empty($chkr) && $chkr->id !== $id) {
			// 	$this->session->set_flashdata('error_msg','Court is already existing.');
			// 	redirect(base_url('manage/editcell/'.$id));
			// }
			$this->session->set_flashdata('success_msg','Court was successfully updated.');
			//echo $this->input->post('court_mun');
			$save = $this->admin_model->update('cell',array('cellId'=>$this->input->post('cellId')),$court_data);
			$cell_info = $this->admin_model->get('cell',array('cellId' => $id),true);
		
			//logs
			$logData = array(
						'linked_id' => $id,
						'table_name' => 'cell',
						'table_field' => 'id',
						'subject' => 'Update Cell',
						'reasons' => 'Cell "'.$chkr->cellNumber.'" was updated',
						'update_by' => $this->session->userdata('user_id'),
						'action' => 'update',
						'created_at' => date("Y-m-d h:i:sa"),
						'status' => 'active'
					);
			$this->admin_model->save('cs_logs',$logData);
			redirect(base_url('manage/cells'));
		}
		
		$res = $this->admin_model->get('cell',array("cellId"=> $id),TRUE);
		//echo $res->cellNumber;
		$this->data['cellId'] = $id;
		$this->data['cellNumber'] = $res->cellNumber;
		$this->data['capacity'] = $res->capacity;

		$this->data['title']	= 'Manage';
		$this->data['css']		= array(
									'vendor/alertify/css/alertify.core.css',
									'vendor/alertify/css/alertify.default.css');
		$this->data['js_top']	= array();
		$this->data['header'] 	= $this->load->view('admin/header_view',$this->data,TRUE);
		$this->data['body'] 	= $this->load->view('editcell_view',NULL,TRUE);
		$this->data['footer'] 	= $this->load->view('footer_view',NULL,TRUE);
		$this->data['js_bottom']= array('vendor/alertify/js/alertify.js');
		$this->data['custom_js']= '<script type="text/javascript">
										$(function(){
											$(".nav-manage").addClass("active");
											$(".nav-manage-cells a").addClass("active");
										});
									</script>';
		$this->load->view('templates',$this->data);
	}

	public function deletecell($id)
	{
		/*$checkr = $this->admin_model->get('court',array('court_mun' => $id));
		if (!empty($checkr)) {
			$this->session->set_flashdata('error_msg','You cannot delete that municipality. Some court connected with it.');
			redirect(base_url('manage/addcourtmunicipalities'));
		}*/
		
		$this->admin_model->update('cell',array('cellId' => $id),array('status'=>'deleted'));

		$cell_info = $this->admin_model->get('cell',array('cellId' => $id),true);
		
		//logs
		$logData = array(
					'linked_id' => $id,
					'table_name' => 'cell',
					'table_field' => 'id',
					'subject' => 'Delete Cell',
					'reasons' => 'Cell "'.$cell_info->cellNumber.'" was deleted',
					'update_by' => $this->session->userdata('user_id'),
					'action' => 'delete',
					'created_at' => date("Y-m-d h:i:sa"),
					'status' => 'active'
				);
		$this->admin_model->save('cs_logs',$logData);

		$this->session->set_flashdata('success_msg','Court was successfully deleted.');
		redirect(base_url('manage/cells'));
	}
	
}

/* End of file manage.php */
/* Location: ./application/controllers/notifications.php */