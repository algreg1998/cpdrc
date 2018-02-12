<?php
session_start();
	class Upload extends Admin_Controller
	{
		public function __construct()
	 	{
	   		parent::__construct();
	   		$this->load->model('cpdrc/cpdrc_fw','',TRUE);

	 	}
	 	public function index()
	 	{
	 			$user=$this->session->userdata('logged_in');

	 			$config['file_name'] = $this->input->post('userfile');
		 		$config['upload_path'] = './uploads/inmate';
		 		$config['allowed_types'] = 'gif|jpg|jpeg|png';
		 		$config['max_size']='5000';
		 		$config['max_width']='2000';
		 		$config['max_height'] = '2000';

				$this->load->library('upload', $config);	 		
				 	if($this->upload->do_upload())
				 	{
				 		$filedata=$this->upload->data();
				 		$file=$filedata['file_name'];

						//to insure that there are no unset filename of inmate 
						$del = array('added_by' => $user['user_id'],
								'img_set' => '0' );
						$this->db->delete('file', $del);
						//inserting the filename
				 		$u = array('added_by' => $user['user_id'],
				 		'filename' => $file);
				 		$this->db->insert('file', $u);

				 		echo "<img src='". base_url()."/uploads/inmate/".$file." ' width='50%' height='50%'/>
				 		<div class='alert alert-warning alert-dismissible' align='center'> <button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button>Successfully Uploaded!</div>";
					}
					
			 		else{
			 			echo "<img src='".base_url()."uploads/inmate/source/192x192.jpg' width='300' height='300'/>
			 			<div class='alert alert-danger alert-dismissible' align='center'> <button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button>".$this->upload->display_errors()."</div>
			 			<input type='hidden' id='error' value='1'>
			 			
			 	";
			 		} 				
	 	}
	 	public function editpic()
	 	{
	 		// echo $this->input->post('userfile');

	 			$user=$this->session->userdata('logged_in');

	 			$config['file_name'] = $this->input->post('userfile');
		 		$config['upload_path'] = './uploads/inmate';
		 		$config['allowed_types'] = 'gif|jpg|jpeg|png';
		 		$config['max_size']='5000';
		 		$config['max_width']='2000';
		 		$config['max_height'] = '2000';
		 		echo $this->input->post('userfile');
				$this->load->library('upload', $config);	 		
				 	if($this->upload->do_upload())
				 	{
				 		$filedata=$this->upload->data();
				 		$file=$filedata['file_name'];

				 		$upd = array('added_by'=>$user['user_id'],
			    						'filename'=> $file);
						$this->db->where('inmate_id', $this->input->post('id'));
						$this->db->update('file', $upd);

				 		echo "<img src='". base_url()."/uploads/inmate/".$file." ' width='50%' height='50%'/>
				 		<div class='alert alert-warning alert-dismissible' align='center'> <button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button>Successfully Uploaded!</div>";
					}
					
			 		else{
			 			echo "<img src='".base_url()."uploads/inmate/source/192x192.jpg' width='300' height='300'/>
			 			<div class='alert alert-danger alert-dismissible' align='center'> <button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button>".$this->upload->display_errors()."</div>
			 			<input type='hidden' id='error' value='1'>";

				 	}
	 	}
	 	public function changepic()
	 	{
	 		$user=$this->session->userdata('logged_in');
	 		$id = $this->input->post('id');

	 		$config['file_name'] = $this->input->post('userfile');
		 	$config['upload_path'] = './uploads/inmate';
		 	$config['allowed_types'] = 'gif|jpg|jpeg|png';
		 	$config['max_size']='5000';
		 	$config['max_width']='2000';
		 	$config['max_height'] = '2000';
		 	
		 	$this->load->library('upload', $config);	 		
				if($this->upload->do_upload()){

				 	$filedata=$this->upload->data();
				 	$file=$filedata['file_name'];
				 	//updating the name in the database
					$upd = array('filename' => $file,
								'added_by' => $user['user_id'] );
					$this->db->where('inmate_id', $id);
					$this->db->update('file', $upd);

					echo "<img src='". base_url()."/uploads/inmate/".$file." ' width='50%' height='50%'/>
				 		<div class='alert alert-warning alert-dismissible' align='center'> <button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button>Successfully Uploaded!</div>";
				 }
				 else{
			 		echo "<img src='".base_url()."uploads/inmate/source/192x192.jpg' width='250' height='250'/>
			 			<div class='alert alert-danger alert-dismissible' align='center'> <button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button>".$this->upload->display_errors()."</div>
			 			<input type='hidden' id='error' value='1'>";
			 	} 		
	 	}
	 	public function userpic()
	 	{
	 		$user=$this->session->userdata('logged_in');

	 		$config['file_name'] = $this->input->post('userfile');
		 	$config['upload_path'] = './uploads/users';
		 	$config['allowed_types'] = 'gif|jpg|jpeg|png';
		 	$config['max_size']='5000';
		 	$config['max_width']='2000';
		 	$config['max_height'] = '2000';

		 	$this->load->library('upload', $config);

				if($this->upload->do_upload()){

				 	$filedata=$this->upload->data();
				 	$file=$filedata['file_name'];
				 	//updating the name in the database
					$upd = array('user_filename' => $file,
								'added_by' => $user['user_id'] );
					$this->db->insert('user_account', $upd);

					echo "<img src='". base_url()."/uploads/users/".$file." ' width='50%' height='50%'/>
				 		<div class='alert alert-warning alert-dismissible' align='center'> <button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button>Successfully Uploaded!</div>";
				 }
				 else{
			 		echo "<img src='".base_url()."uploads/users/source/errors.jpg' width='300' height='300'/>
			 			<div class='alert alert-danger alert-dismissible' align='center'> <button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button>".$this->upload->display_errors()."</div>";
			 	} 	
	 	}
	 	public function changeuserpic()
	 	{
	 		$user=$this->session->userdata('logged_in');
	 		$id = $this->input->post('id');

	 		$config['file_name'] = $this->input->post('userfile');
		 	$config['upload_path'] = './uploads/users';
		 	$config['allowed_types'] = 'gif|jpg|jpeg|png';
		 	$config['max_size']='5000';
		 	$config['max_width']='2000';
		 	$config['max_height'] = '2000';

		 	$this->load->library('upload', $config);	 		
				if($this->upload->do_upload()){

				 	$filedata=$this->upload->data();
				 	$file=$filedata['file_name'];
				 	//updating the name in the database
					$upd = array('user_filename' => $file);
					$this->db->where('user_id', $id);
					$this->db->update('user_account', $upd);

					echo "<img src='". base_url()."/uploads/users/".$file." ' width='50%' height='50%'/>
				 		<div class='alert alert-warning alert-dismissible' align='center'> <button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button>Successfully Uploaded!</div>";
				 }
				 else{
			 		echo "<img src='".base_url()."uploads/users/source/errors.jpg' width='300' height='300'/>
			 			<div class='alert alert-danger alert-dismissible' align='center'> <button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button>".$this->upload->display_errors()."</div>";
			 	} 

	 	}
	 	public function visitor()
	 	{
	 		$user=$this->session->userdata('logged_in');

	 		$config['file_name'] = $this->input->post('userfile');
		 	$config['upload_path'] = './uploads/visitors';
		 	$config['allowed_types'] = 'gif|jpg|jpeg|png';
		 	$config['max_size']='5000';
		 	$config['max_width']='2000';
		 	$config['max_height'] = '2000';	

		 	$this->load->library('upload', $config);

			if($this->upload->do_upload()){

				 	$filedata=$this->upload->data();
				 	$file=$filedata['file_name'];
				 	//updating the name in the database
					$upd = array('visit_filename' => $file,
								'img_set' => '0',
								'added_by' => $user['user_id'] );

					$this->db->insert('inmate_auth_visitor', $upd);

					echo "<img src='". base_url()."/uploads/visitors/".$file." ' width='50%' height='50%'/>
				 		<div class='alert alert-warning alert-dismissible' align='center'> <button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button>Successfully Uploaded!</div>";
			}
			else{
			 		echo "<img src='".base_url()."uploads/visitors/source/error.jpg' width='300' height='300'/>
			 			<div class='alert alert-danger alert-dismissible' align='center'> <button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button>".$this->upload->display_errors()."</div>
			 			<input type='hidden' id='error' value='1'>";
			} 	
	 	}
	 	public function changeVisitorPic()
	 	{
	 		$user=$this->session->userdata('logged_in');
	 		$id = $this->input->post('id');

	 		$config['file_name'] = $this->input->post('userfile');
		 	$config['upload_path'] = './uploads/visitors';
		 	$config['allowed_types'] = 'gif|jpg|jpeg|png';
		 	$config['max_size']='5000';
		 	$config['max_width']='2000';
		 	$config['max_height'] = '2000';
		 	
		 	$this->load->library('upload', $config);	 		
				if($this->upload->do_upload()){

				 	$filedata=$this->upload->data();
				 	$file=$filedata['file_name'];
				 	//updating the name in the database
					$upd = array('visit_filename' => $file );
					$this->db->where('id', $id);
					$this->db->update('inmate_auth_visitor', $upd);

					echo "<img src='". base_url()."/uploads/visitors/".$file." ' width='50%' height='50%'/>
				 		<div class='alert alert-warning alert-dismissible' align='center'> <button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button>Successfully Uploaded!</div>";
				 }
				 else{
			 		echo "<img src='".base_url()."uploads/visitors/source/error.jpg' width='300' height='300'/>
			 			<div class='alert alert-danger alert-dismissible' align='center'> <button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button>".$this->upload->display_errors()."</div>";
			 	} 		 		
	 	} 
	}
