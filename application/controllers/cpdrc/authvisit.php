<?php
session_start();
	class Authvisit extends Admin_Controller
	{
		public function __construct()
	 	{
	   		parent::__construct();
	   		$this->load->model('cpdrc/cpdrc_fw','',TRUE);

	 	}
	 	public function index()
	 	{
	 		$user=$this->session->userdata('logged_in');
	 		$name=$this->input->post('fullname');

		 		$add = array('inmate_id' => $this->input->post('id'),
		 					'fullname' => $this->input->post('fullname'),
		 					'relation' => $this->input->post('relation'),
		 					'address' => $this->input->post('address'),
		 					'contact_number' => $this->input->post('contact'),
		 					'img_set' => '1' );

	 		$res=$this->cpdrc_fw->checkVisitor($name);
	 		if($res == FALSE)
	 		{


		 		$this->db->select('*')->from('inmate_auth_visitor')->where('added_by', $user['user_id'])->where('img_set', '0');
		 		$get=$this->db->get();

		 		if($get->num_rows() == 0)
		 		{
		 			$upd = array('visit_filename' => '192x192.jpg',
		 						'added_by'=> $user['user_id'] );
		 			$this->db->insert('inmate_auth_visitor', $upd);

		 			$this->db->where('img_set', '0');
		 			$this->db->where('added_by', $user['user_id']);
		 			$this->db->update('inmate_auth_visitor', $add);

					echo "<div class='alert alert-warning alert-dismissible' role='alert'>
					  <button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button>
					  <strong>Success!</strong> ".$add['fullname']." is added in the database!<br><a href='".base_url()."index.php/cpdrc/pages/authvisit'> Go back to table</a>
					</div>";

		 		}
		 		else
		 		{			 			
		 			$this->db->where('added_by', $user['user_id']);
		 			$this->db->where('img_set', '0');
		 			$this->db->update('inmate_auth_visitor', $add);

					echo "<div class='alert alert-warning alert-dismissible' role='alert'>
					  <button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button>
					  <strong>Success!</strong> ".$add['fullname']." is added in the database!<br><a href='".base_url()."index.php/cpdrc/pages/authvisit'> Go back to table</a>
					</div>";
		 		}
	 		}
	 		else
		 	{
					echo "<div class='alert alert-danger alert-dismissible' role='alert'>
					  <button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button>
					  <strong>Warning!</strong> ".$add['fullname']." already exist!<br><a href='".base_url()."index.php/cpdrc/pages/authvisit'> Go back to table</a>
					</div>";
	 		}

	 	}
	 	public function add()
	 	{
	 		$id=$this->input->post('id');
	 		$data['id']=$id;
	 		$this->load->view('menu/add_visitor', $data);
	 	}
	 	public function view()
	 	{
	 		$id=$this->input->post('id');
	 		$data['all']=$this->cpdrc_fw->visitPerInmate($id);
	 		$this->load->view('menu/view_visitperinmate', $data);
	 	}
	 	public function view2()
	 	{
	 		$id=$this->input->post('id');
	 		$data['viewing']=$this->cpdrc_fw->visitordetails($id);
	 		$this->load->view('menu/view_visitor', $data);
	 	}
	 	public function delete()
	 	{
	 		$id=$this->input->post('id');

	 		$this->db->where('id', $id);
	 		$this->db->delete('inmate_auth_visitor');

            $data['auth']=$this->cpdrc_fw->allVisitor();
            $data['visit']=$this->cpdrc_fw->manageInmate();
            $this->load->view('menu/auth_visitor2', $data);	 		
	 	}
	 	public function edit()
	 	{
	 		$id=$this->input->post('id');
	 		$data['edit']=$this->cpdrc_fw->visitordetails($id);
	 		$this->load->view('menu/edit_visitor', $data);
	 	}
	 	public function update()
	 	{
	 		$id = $this->input->post('dbid');
	 		$upd = array('fullname' => $this->input->post('fullname'),
	 					'relation' => $this->input->post('relation'),
	 					'address' => $this->input->post('address'),
	 					'contact_number' => $this->input->post('contact') 
	 					);
	 		$this->db->where('id', $id);
	 		$this->db->update('inmate_auth_visitor', $upd);

					echo "<div class='alert alert-warning alert-dismissible' role='alert'>
					  <button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button>
					  <strong>Success!</strong> <a href='".base_url()."index.php/cpdrc/pages/authvisit'> Go back to table</a>
					</div>";
	 	}
	}