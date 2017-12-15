<?php
session_start();
	class Markingmale extends Admin_Controller
	{
		
		public function __construct()
	 	{
	   		parent::__construct();
	   		$this->load->model('cpdrc/cpdrc_fw','',TRUE);
	 	}
	 	//this is for the inserting of the data. and the image of the markings
	 	public function index()
	 	{
	 		$id = $this->input->post('id');
	 		$type = $this->input->post('type');
	 		$source = $this->input->post('source');
	 		$userfile = $this->input->post('userfile');
	 		$markname = $this->input->post('markname');
	 		$desc = $this->input->post('desc');
	 		$markType = $this->input->post('markType');

	 		$user = $this->session->userdata('logged_in');

		 		$config['file_name'] = $userfile;
			 	$config['upload_path'] = './uploads/markings';
			 	$config['allowed_types'] = 'gif|jpg|jpeg|png';
			 	$config['max_size']='5000';
			 	$config['max_width']='2000';
			 	$config['max_height'] = '2000';

			 	$this->load->library('upload', $config);	 		
					if($this->upload->do_upload()){
					 	$filedata=$this->upload->data();
					 	$file=$filedata['file_name'];

						$upd = array('inmate_id' => $id,
									'mark_name' => $markname,
									'mark_desc' => $desc,
									'mark_type' => $type,
									'mark_filename' => $file,
									'mark_img_set' => '1',
									'mark_img_source' => $source,
									'mark_addedby' => $user['user_id'] ,
									'markType' => $markType );

						$this->db->insert('inmate_2d', $upd);

						$data['marks'] = $this->cpdrc_fw->getMarks($id);
						$this->load->view('menu/2d/view2d', $data);

					}
					else{
						echo "<div align='center'><img src='".base_url()."uploads/markings/source/error1.jpg' width='300' height='300'/></div><br>
				 			<div class='alert alert-danger alert-dismissible' align='center'> <button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button>".$this->upload->display_errors()."</div>";
					}
	 	}
	 	//FRONT
	 	public function headfront()
	 	{
	 		$data['id'] = $this->input->post('id');
	 		$data['type'] = "B1F";
	 		$data['source'] = "malefront.jpg";

	 		$this->load->view('menu/2d/form2d', $data);
	 	}
	 	public function bodyfront()
	 	{
	 		$data['id'] = $this->input->post('id');
	 		$data['type'] = "B2F";
	 		$data['source'] = "malefront.jpg";

	 		$this->load->view('menu/2d/form2d', $data);
	 	}
	 	public function leftarmfront()
	 	{
	 		$data['id'] = $this->input->post('id');
	 		$data['type'] = "B3F";
	 		$data['source'] = "malefront.jpg";

	 		$this->load->view('menu/2d/form2d', $data);
	 	}
	 	public function rightarmfront()
	 	{
	 		$data['id'] = $this->input->post('id');
	 		$data['type'] = "B4F";
	 		$data['source'] = "malefront.jpg";

	 		$this->load->view('menu/2d/form2d', $data);
	 	}
	 	public function leftlegfront()
	 	{
	 		$data['id'] = $this->input->post('id');
	 		$data['type'] = "B5F";
	 		$data['source'] = "malefront.jpg";

	 		$this->load->view('menu/2d/form2d', $data);
	 	}
	 	public function rightlegfront()
	 	{
	 		$data['id'] = $this->input->post('id');
	 		$data['type'] = "B6F";
	 		$data['source'] = "malefront.jpg";

	 		$this->load->view('menu/2d/form2d', $data);
	 	}
	 	//BACK
	 	public function headback()
	 	{
	 		$data['id'] = $this->input->post('id');
	 		$data['type'] = "B1B";
	 		$data['source'] = "maleback.jpg";

	 		$this->load->view('menu/2d/form2d', $data);
	 	}
	 	public function bodyback()
	 	{
	 		$data['id'] = $this->input->post('id');
	 		$data['type'] = "B2B";
	 		$data['source'] = "maleback.jpg";

	 		$this->load->view('menu/2d/form2d', $data);
	 	}
	 	public function leftarmback()
	 	{
	 		$data['id'] = $this->input->post('id');
	 		$data['type'] = "B3B";
	 		$data['source'] = "maleback.jpg";

	 		$this->load->view('menu/2d/form2d', $data);
	 	}
	 	public function rightarmback()
	 	{
	 		$data['id'] = $this->input->post('id');
	 		$data['type'] = "B4B";
	 		$data['source'] = "maleback.jpg";

	 		$this->load->view('menu/2d/form2d', $data);
	 	}
	 	public function leftlegback()
	 	{
	 		$data['id'] = $this->input->post('id');
	 		$data['type'] = "B5B";
	 		$data['source'] = "maleback.jpg";

	 		$this->load->view('menu/2d/form2d', $data);
	 	}
	 	public function rightlegback()
	 	{
	 		$data['id'] = $this->input->post('id');
	 		$data['type'] = "B6B";
	 		$data['source'] = "maleback.jpg";

	 		$this->load->view('menu/2d/form2d', $data);
	 	}
	 	//LEFT
	 	public function headleft()
	 	{
	 		$data['id'] = $this->input->post('id');
	 		$data['type'] = "B1L";
	 		$data['source'] = "maleback.jpg";

	 		$this->load->view('menu/2d/form2d', $data);
	 	}
	 	public function bodyleft()
	 	{
	 		$data['id'] = $this->input->post('id');
	 		$data['type'] = "B2L";
	 		$data['source'] = "maleback.jpg";

	 		$this->load->view('menu/2d/form2d', $data);
	 	}
	 	public function legleft()
	 	{
	 		$data['id'] = $this->input->post('id');
	 		$data['type'] = "B3L";
	 		$data['source'] = "maleback.jpg";

	 		$this->load->view('menu/2d/form2d', $data);
	 	}
	 	//RIGHT
	 	public function headright()
	 	{
	 		$data['id'] = $this->input->post('id');
	 		$data['type'] = "B1R";
	 		$data['source'] = "maleback.jpg";

	 		$this->load->view('menu/2d/form2d', $data);
	 	}
	 	public function bodyright()
	 	{
	 		$data['id'] = $this->input->post('id');
	 		$data['type'] = "B2R";
	 		$data['source'] = "maleback.jpg";

	 		$this->load->view('menu/2d/form2d', $data);
	 	}
	 	public function legright()
	 	{
	 		$data['id'] = $this->input->post('id');
	 		$data['type'] = "B3R";
	 		$data['source'] = "maleback.jpg";

	 		$this->load->view('menu/2d/form2d', $data);
	 	}	 	
	}

	    