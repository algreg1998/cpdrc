<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Accounts extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('date');
	}
	
	public function index()
	{
		$this->administrators();
	}

	public function administrators()
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
        
        $config['base_url'] = base_url().'accounts/administrators?'.$add_query;
        $where = array('status !='=>'deleted');
        $config['total_rows'] = $this->admin_model->search_count('cs_administrators',$where,$like,$filter,NULL,FALSE);

        $config['per_page'] = 5;
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

        $where = array('cs_administrators.status !='=>'deleted');
        $this->data['administrators'] = $this->admin_model->get('cs_administrators',$where,FALSE,$order_by,NULL,$config['per_page'],$page);
        //if deleted all rows in page..
        if (empty($this->data['administrators']) && $page > 0) {
            
            $sub = $config['total_rows']/$config['per_page'];
            $whole = intval($sub);
            if ($sub > $whole) {
                $thepage = $whole * $config['per_page'];
            }

            $red = 'accounts/administrators?'.$add_query.'&offset='.$thepage;
            redirect($red);
        }

		$this->data['title']	= 'Administrators';
		$this->data['css']		= array('vendor/alertify/css/alertify.core.css','vendor/alertify/css/alertify.default.css');
		$this->data['js_top']	= array();
		$this->data['header'] 	= $this->load->view('admin/header_view',$this->data,TRUE);
		$this->data['body'] 	= $this->load->view('accounts_administrators_view',NULL,TRUE);
		$this->data['footer'] 	= $this->load->view('footer_view',NULL,TRUE);
		$this->data['js_bottom']= array('vendor/alertify/js/alertify.js');
		$this->data['custom_js']= '<script type="text/javascript">
										$(function(){
											$(".nav-accounts").addClass("active");
											$(".nav-accounts-administrators a").addClass("active");
										});
									</script>';
		$this->load->view('templates',$this->data);
	}

	public function judges_lawyers()
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
        
        $config['base_url'] = base_url().'accounts/judges-lawyers?'.$add_query;
        $where = array('status !='=>'deleted');
        $config['total_rows'] = $this->admin_model->search_count('cs_users',$where,$like,$filter,NULL,FALSE);

        $config['per_page'] = 5;
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

        $where = array('cs_users.status !='=>'deleted');
        $this->data['users'] = $this->admin_model->get('cs_users',$where,FALSE,$order_by,NULL,$config['per_page'],$page);
        //if deleted all rows in page..
        if (empty($this->data['users']) && $page > 0) {
            
            $sub = $config['total_rows']/$config['per_page'];
            $whole = intval($sub);
            if ($sub > $whole) {
                $thepage = $whole * $config['per_page'];
            }

            $red = 'accounts/judges-lawyers?'.$add_query.'&offset='.$thepage;
            redirect($red);
        }

		$this->data['title']	= 'Judges &amp; Lawyers';
		$this->data['css']		= array();
		$this->data['js_top']	= array();
		$this->data['header'] 	= $this->load->view('admin/header_view',$this->data,TRUE);
		$this->data['body'] 	= $this->load->view('accounts_judges_lawyers_view',NULL,TRUE);
		$this->data['footer'] 	= $this->load->view('footer_view',NULL,TRUE);
		$this->data['js_bottom']= array();
		$this->data['custom_js']= '<script type="text/javascript">
										$(function(){
											$(".nav-accounts").addClass("active");
											$(".nav-accounts-judges-lawyers a").addClass("active");
										});
									</script>';
		$this->load->view('templates',$this->data);
	}

	public function add_administrators()
	{
		$this->load->library('form_validation');
		$rules = "strip_tags|trim|xss_clean";
		$this->form_validation->set_rules('first_name','first name',$rules.'|required|min_length[2]|max_length[50]');
		$this->form_validation->set_rules('middle_name','middle name',$rules.'|min_length[2]|max_length[50]');
		$this->form_validation->set_rules('last_name','last name',$rules.'|required|min_length[2]|max_length[50]');
		$this->form_validation->set_rules('birthday','birthday',$rules.'|required|callback__validate_birthday');
		$this->form_validation->set_rules('gender','gender',$rules.'|required|callback__validate_gender');
		$this->form_validation->set_rules('position','position',$rules.'|required');
		$this->form_validation->set_rules('email','email',$rules.'|required|min_length[2]|max_length[50]|valid_email|callback__is_unique2');
		$this->form_validation->set_rules('username','username',$rules.'|required|min_length[2]|max_length[50]|callback__is_uniqueusername');

		$this->form_validation->set_message('is_unique','The %s is already exists.');

		if ($this->form_validation->run() !== FALSE )
		{
			$this->load->helper('string');
			$password = random_string('alnum', 6);

			$fields = array('first_name','middle_name','last_name','gender','birthday','email','username','position');
			$data = $this->admin_model->array_from_post($fields);
			$data['password'] = $this->admin_model->hash($password);

			$data['status'] = 'active';
			$data['created_on'] = now();
			$data['modified_on'] = 0;
			$save = $this->admin_model->save('cs_administrators',$data);

			if (!empty($save))
			{
				$this->session->set_flashdata('success_msg','Administrator was successfully created. Username: <strong>'.$data['username'].'</strong> Password: <strong>'.$password.'</strong>');
            }
            else
            {
				$this->session->set_flashdata('error_msg','Oops, Something went wrong!');
			}

			redirect(current_url_full());	
		}

		$this->data['title']	= 'Judges &amp; Lawyers';
		$this->data['css']		= array('vendor/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css');
		$this->data['js_top']	= array();
		$this->data['header'] 	= $this->load->view('admin/header_view',$this->data,TRUE);
		$this->data['body'] 	= $this->load->view('accounts_add_administrator_view',NULL,TRUE);
		$this->data['footer'] 	= $this->load->view('footer_view',NULL,TRUE);
		$this->data['js_bottom']= array('vendor/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js');
		$this->data['custom_js']= '<script type="text/javascript">
										$(function(){
											$(".nav-accounts").addClass("active");
											$(".nav-accounts-administrators a").addClass("active");
											$("#birthday").datetimepicker({
							               		viewMode: "years",
							               		format: "YYYY-MM-DD"
								            });
										});
									</script>';
		$this->load->view('templates',$this->data);
	}

	public function add_judge_lawyers()
	{
		$this->load->library('form_validation');
		$rules = "strip_tags|trim|xss_clean";
		$this->form_validation->set_rules('first_name','first name',$rules.'|required|min_length[2]|max_length[50]');
		$this->form_validation->set_rules('middle_name','middle name',$rules.'|min_length[2]|max_length[50]');
		$this->form_validation->set_rules('last_name','last name',$rules.'|required|min_length[2]|max_length[50]');
		$this->form_validation->set_rules('birthday','birthday',$rules.'|required|callback__validate_birthday');
		$this->form_validation->set_rules('gender','gender',$rules.'|required|callback__validate_gender');
		$this->form_validation->set_rules('position','position',$rules.'|required');
		$this->form_validation->set_rules('email','email',$rules.'|required|min_length[2]|max_length[50]|valid_email|is_unique[cs_users.email]');

		$this->form_validation->set_message('is_unique','The %s is already exists.');

		if ($this->form_validation->run() !== FALSE )
		{
			$this->load->helper('string');

			$fields = array('first_name','middle_name','last_name','gender','birthday','email','username','position');
			$data = $this->admin_model->array_from_post($fields);

			$data['status'] = 'active';
			$data['created_on'] = now();
			$data['modified_on'] = 0;
			$save = $this->admin_model->save('cs_users',$data);

			if (!empty($save))
			{
				$this->session->set_flashdata('success_msg',ucfirst($data['position']).' was successfully created.');
            }
            else
            {
				$this->session->set_flashdata('error_msg','Oops, Something went wrong!');
			}

			redirect(current_url_full());	
		}

		$this->data['title']	= 'Judges &amp; Lawyers';
		$this->data['css']		= array('vendor/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css');
		$this->data['js_top']	= array();
		$this->data['header'] 	= $this->load->view('admin/header_view',$this->data,TRUE);
		$this->data['body'] 	= $this->load->view('accounts_add_judges_lawyers_view',NULL,TRUE);
		$this->data['footer'] 	= $this->load->view('footer_view',NULL,TRUE);
		$this->data['js_bottom']= array('vendor/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js');
		$this->data['custom_js']= '<script type="text/javascript">
										$(function(){
											$(".nav-accounts").addClass("active");
											$(".nav-accounts-judges-lawyers a").addClass("active");
											$("#birthday").datetimepicker({
							               		viewMode: "years",
							               		format: "YYYY-MM-DD"
								            });
										});
									</script>';
		$this->load->view('templates',$this->data);
	}

	function _validate_birthday($str)
    {
        $date_ts = strtotime($str);
        $date_human = mdate("%Y-%m-%d",$date_ts);

        if ($str == $date_human)
        {
            return TRUE;
        }
        else
        {
            $this->form_validation->set_message('_validate_birthday','Selected date is not valid.');
            return FALSE;
        }
    }
    
    function _validate_gender($str){
        if($str == 'Male' || $str == 'Female'){
            return TRUE;
        }else{
            $this->form_validation->set_message('_validate_gender','Invalid gender.');
            return FALSE;
        }
    }

    public function check_unique_username(){

        $res['success'] = false;
        $res['username'] = "";


        $this->load->library('form_validation');

        $this->form_validation->set_rules('first_name','first name','trim|xss_clean|required');
        $this->form_validation->set_rules('last_name','first name','trim|xss_clean|required');

        if ($this->form_validation->run() !== FALSE) {
            $first_name = $this->input->post('first_name');
            $last_name = $this->input->post('last_name');
            $username = $this->generate_username($first_name,$last_name);
            $res['success'] = true; 
            $res['username'] = $username; 
        }

        echo json_encode($res);
    }

    public function generate_username($first_name,$last_name){
        $username = strtolower($last_name.'.'.$first_name); 
        $res = $this->admin_model->get('administrators',array('username'=>$username,'status !=' => 'deleted'),TRUE);

        $ctr=1;
        while (!empty($res)) {
            $username .=$ctr;
            $res = $this->admin_model->get('administrators',array('username'=>$username,'status !=' => 'deleted'),TRUE);
            $ctr++;
        }

        return $username;
    }

    public function check_email()
    {
        $stat['success'] = true;

        $this->load->library('form_validation');
        $this->form_validation->set_rules('email','email','required|valid_email');

        if ($this->form_validation->run() !== FALSE)
        {
            $email = $this->input->post('email');
            $check = $this->_is_unique($email);
            
            if (!empty($check)) {
                $stat['success'] = true;
            }else{
                $stat['success'] = false;
            }
        }

        echo json_encode($stat);
    }

    public function _is_unique($email){
        $check = $this->admin_model->get('cs_administrators',array('email'=>$email,'status !='=>'deleted'),TRUE);

        if (!empty($check)) {
            return true;
        }else{
            return false;
        }
    }

    public function _is_unique2($email){
        $check = $this->admin_model->get('cs_administrators',array('email'=>$email,'status !='=>'deleted'),TRUE);

        if (!empty($check)) {
            $this->form_validation->set_message('_is_unique2','Email is already exists.');
            return FALSE;
        }else{
            return true;
        }
    }

    public function _is_uniqueusername($username){
        $check = $this->admin_model->get('cs_administrators',array('username'=>$username,'status !='=>'deleted'),TRUE);

        if (!empty($check)) {
            $this->form_validation->set_message('_is_uniqueusername','Username is already exists.');
            return FALSE;
        }else{
            return true;
        }
    }
}

/* End of file accounts.php */
/* Location: ./application/controllers/accounts.php */