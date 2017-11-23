<?php
session_start();

	class Loginfunc extends Admin_Controller
	{
		public function __construct()
	 	{
	   		parent::__construct();

	 	}
	    
	    public function index()
	    {

             if(!$this->session->userdata('logged_in'))
             {
                 $this->load->view('index');
             }
             else
             {
             	 redirect('cpdrc/pages', 'refresh');
             } 
	    }
	}
?>