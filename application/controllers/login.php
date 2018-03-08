<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends User_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('cpdrc/cpdrc_fw','',TRUE);

		if ($this->session->userdata('is_logged_in'))
		{
			redirect(base_url());
		}
	}
	
	public function index()
	{
		$this->form_validation->set_rules('username','username','required');
		$this->form_validation->set_rules('password','password','required');
		if ($this->form_validation->run() != FALSE) {
			$password = $this->user_model->hash($this->input->post('password'));
			$username = $this->input->post('username');
			$chkr = $this->user_model->get('user_account',array('password'=>$password,'username'=>$username),TRUE);
			$agent=$this->getAgent();
			if (!empty($chkr)) {
				$chkr = $this->user_model->get('user_account',array('username'=>$username,'status'=>'Active'),TRUE);
				if(!empty($chkr)){
					$this->cpdrc_fw->logbook_signin("Log in",$chkr->user_id,$agent);
					$sess_array = array(
	                      'username' => $chkr->username,
	                      'password' => $chkr->password,
	                      'fname' => $chkr->user_fname,
	                      'lname' => $chkr->user_lname,
	                      'type' => $chkr->type,
	                      'user_id' =>$chkr->user_id
	                    );
					$sess_data = array(
							'is_logged_in' => true,
							'user_type' => $chkr->type,
							'user_id' => $chkr->user_id
						);
					$this->session->set_userdata($sess_data);
					$this->session->set_userdata('logged_in', $sess_array);
					redirect(base_url());
				}else{
					$this->session->set_flashdata('error_msg','User Deactivated please contact Administrator.');
				}
			}else{
				$this->session->set_flashdata('error_msg','Username and Password does not match.');
			}

			redirect(current_url_full());
		}

		$this->data['title']	= 'Login';
		$this->data['css']		= array();
		$this->data['js_top']	= array();
		$this->data['header'] 	= $this->load->view('login_header_view',$this->data,TRUE);
		$this->data['footer'] 	= $this->load->view('footer_view',NULL,TRUE);
		$this->data['js_bottom']= array();
		$this->load->view('login_view',$this->data);
	}
	private function getAgent()
	    {
	    	$this->load->library('user_agent');

	    	    if ($this->agent->is_browser())
                {
                    $agent = $this->agent->browser().'  v.'.$this->agent->version();
                }
                elseif ($this->agent->is_robot())
                {
                    $agent = $this->agent->robot();
                }
                elseif ($this->agent->is_mobile())
                {
                    $agent = $this->agent->mobile();
                }
                else
                {
                    $agent = 'Unidentified User Agent';
                }

                return $agent." on ".$this->agent->platform(); // Platform info (Windows, Linux, Mac, etc.)
	    }
}

/* End of file login.php */
/* Location: ./application/controllers/login.php */