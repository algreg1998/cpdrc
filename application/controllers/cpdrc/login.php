<?php
session_start();
	class Login extends Admin_Controller
	{
		public function __construct()
	 	{
	   		parent::__construct();
	   		$this->load->model('cpdrc/cpdrc_fw','',TRUE);
	 	}
	    
	    public function index()
	    {
	     
            $username=$this->input->post("username");
	    	$password=$this->input->post("password");
	    	$agent=$this->getAgent();

	    	$return = $this->cpdrc_fw->login($username, $password, $agent);

	    	if($return == FALSE)
            {  
            	$data["message"]="<i class='icon-remove'></i> Invalid username and password combination.";
                $this->load->view('index.php',$data);
            }
            else
            {
                  $this->session->set_userdata('logged_in', $return);
                  redirect('cpdrc/pages', 'refresh');

            }

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
?>