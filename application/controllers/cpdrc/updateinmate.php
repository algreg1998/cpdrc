<?php
session_start();
	class Updateinmate extends Admin_Controller
	{
		public function __construct()
	 	{
	   		parent::__construct();
	   		$this->load->model('cpdrc/cpdrc_fw','',TRUE);
	 	}
	    
	    public function index()
	    {
	    		//||||||||||||||||||||||||||||||||||||||||||||||||||||||||||
	    		// DONE DONE DONE DONE DONE DONE DONE DONE DONE DONE DONE
	    		//|||||||||||||||||||||||||||||||||||||||||||||||||||||||||
	    		$dbid=$this->input->post('dbid'); //for the id in the database
	    		$user_id=$this->input->post('id'); //if inmate_id is updated..

		    	$a['inmate_id']=$user_id;
		    	$a['cell_no']=$this->input->post('cell');
		    	$a['inmate_fname']=$this->input->post('fname');
		    	$a['inmate_lname']=$this->input->post('lname');
		    	$a['inmate_mi']=$this->input->post('mi');
		    	$a['inmate_alias']=$this->input->post('alias');

		    	//to inmate_info
		    	
		    	$b['inmate_id']=$user_id;
		    	$b['nationality']=$this->input->post('nationality');
		    	$b['status']=$this->input->post('status');
		    	$b['birthdate']=$this->input->post('bday');
		    	$b['age']=$this->input->post('age');
		    	$b['gender']=$this->input->post('gender');
		    	$b['born_in']=$this->input->post('birthplace');
		    	$b['home_add']=$this->input->post('home');
		    	$b['province_add']=$this->input->post('province');
		    	$b['occupation']=$this->input->post('occupation');
		    	$b['father']=$this->input->post('father');
		    	$b['mother']=$this->input->post('mother');
		    	$b['relative']=$this->input->post('relative');
		    	$b['relation']=$this->input->post('relation');
		    	$b['address']=$this->input->post('address');
		    	//to inmate build
		    	$c['inmate_id']=$user_id;
		    	$c['height']=$this->input->post('height');
		    	$c['weight']=$this->input->post('weight');
		    	$c['complexion']=$this->input->post('complexion');
		    	$c['build']=$this->input->post('build');
		    	$c['hair']=$this->input->post('hair');
		    	$c['hair_peculiarities']=$this->input->post('hairp');
		    	//inmate case info
		    	
		    	$d['inmate_id']=$user_id;
		    	$d['cid']=$this->input->post('cid');
		    	$d['case_no']=$this->input->post('case_no');
		    	$d['court_name']=$this->input->post('court');
		    	$d['date_confinment']=$this->input->post('confine');
		    	$d['crime']=$this->input->post('crime');
		    	$d['sentence']=$this->input->post('sentence');
		    	$d['commencing']=$this->input->post('commencing');
		    	$d['expire_good']=$this->input->post('dategood');
		    	$d['expire_bad']=$this->input->post('datebad'); 
		    
		    	

		    	//storing all the data in the database['cpdrc'];
				$this->cpdrc_fw->updateinmate($a, $b, $c, $d, $dbid); 
				//redirect back to the manageinmate view..
				redirect('cpdrc/pages/manageinmate', 'refresh');


	    	
	    }
	}