<?php
session_start();
	class Useraccounts extends Admin_Controller
	{
		public function __construct()
	 	{
	   		parent::__construct();
	   		$this->load->model('cpdrc/cpdrc_fw','',TRUE);
	   		$this->load->model('user_model','',TRUE);

	 	}

	 	public function index()
	 	{
	 		$added=$this->session->userdata('logged_in');
	 		$un=$this->input->post('username');
	 		//check the username if taken or not
	 		$res=$this->cpdrc_fw->checkusername($un);
	 		$new = $this->input->post('password');
	 		$confirm = $this->input->post('confirm');

	 		if(strcmp($new, $confirm) != 0)
	 		{
						echo "<div class='alert alert-danger alert-dismissible' role='alert'>
						  <button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button>
						  <strong>Warning!</strong> password didn't match.
						</div>";
	 		}
	 		else{
			 			$user = array('username' =>  $un,
			 					'password' => $this->user_model->hash($this->input->post('password')),
			 					'user_fname' => $this->input->post('fname'),
			 					'user_lname' => $this->input->post('lname'),
			 					'user_mi' => $this->input->post('mi'),
			 					'user_address' => $this->input->post('address'),
			 					'user_contact' => $this->input->post('contact'),
			 					'type' => $this->input->post('type'),
			 					'img_set' => '1' 
			 					);
	
		 		if($res == FALSE)
		 		{


		 			$this->db->select('*')->from('user_account')->where('img_set', '0')->where('added_by', $added['user_id']);
		 			$count=$this->db->get();

		 			if($count->num_rows() == 0)
		 			{
		 				$upd = array('user_filename' => '192x192.jpg',
									'added_by' => $added['user_id'] );

						$this->db->insert('user_account', $upd);

						$this->db->where('img_set', '0');
				 		$this->db->where('added_by', $added['user_id']);
				 		$this->db->update('user_account', $user);

						echo "<div class='alert alert-warning alert-dismissible' role='alert'>
						  <button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button>
						  <strong>Success!</strong> ".$user['user_fname']." ".$user['user_lname']." is added in the database!<br><a href='".base_url()."index.php/cpdrc/pages/user'> Go back to table</a>
						</div>";
		 			}
		 			else
		 			{
				 		$this->db->where('img_set', '0');
				 		$this->db->where('added_by', $added['user_id']);
				 		$this->db->update('user_account', $user);

						echo "<div class='alert alert-warning alert-dismissible' role='alert'>
						  <button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button>
						  <strong>Success!</strong> ".$user['user_fname']." ".$user['user_lname']." is added in the database!
						</div>";
				 	}
		 		}
		 		else
		 		{
						echo "<div class='alert alert-danger alert-dismissible' role='alert'>
						  <button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button>
						  <strong>Warning!</strong> '".$user['username']."' already exist!<br><a href='".base_url()."index.php/cpdrc/pages/user'> Go back to table</a>
						</div>";
		 		}
	 		}
	 	}

	 	public function view()
	 	{
	 		$id=$this->input->post('id');
	 		$data['user']=$this->cpdrc_fw->getUsers($id);
	 		$data['logs']=$this->cpdrc_fw->getUserlog($id);
	 		$data['act']=$this->cpdrc_fw->getUserAct($id);
	 		$data['actv']=$this->cpdrc_fw->getVisitorLog($id);
	 		$data['actr']=$this->cpdrc_fw->getRecordLog($id);
	 		$this->load->view('menu/user_view', $data);
	 	}

	 	public function setactive()
	 	{
	 		$id=$this->input->post('id');

	 		$upd = array('status' => 'Active' );
	 		$this->db->where('user_id', $id);
	 		$this->db->update('user_account', $upd);

	 		redirect('cpdrc/pages/user');
	 		//$data['user']=$this->cpdrc_fw->userAccnt();
            //$this->load->view('menu/user_accounts2', $data);
	 	}

	 	public function setdeactive()
	 	{
	 		$id=$this->input->post('id');

	 		$upd = array('status' => 'Deactive' );
	 		$this->db->where('user_id', $id);
	 		$this->db->update('user_account', $upd);

	 		redirect('cpdrc/pages/user');
	 		//$data['user']=$this->cpdrc_fw->userAccnt();
            //$this->load->view('menu/user_accounts2', $data);
	 	}
	}
