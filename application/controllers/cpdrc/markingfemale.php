<?php
session_start();
	class Markingfemale extends Admin_Controller
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
			 	$config['max_size']='400';
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
									'markType' => $markType);

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
	 		$data['type'] = "G1F";
	 		$data['source'] = "femalefront.jpg";

	 		$this->load->view('menu/2d/form2d2', $data);
	 	}
	 	public function bodyfront()
	 	{
	 		$data['id'] = $this->input->post('id');
	 		$data['type'] = "G2F";
	 		$data['source'] = "femalefront.jpg";

	 		$this->load->view('menu/2d/form2d2', $data);
	 	}
	 	public function leftarmfront()
	 	{
	 		$data['id'] = $this->input->post('id');
	 		$data['type'] = "G3F";
	 		$data['source'] = "femalefront.jpg";

	 		$this->load->view('menu/2d/form2d2', $data);
	 	}
	 	public function rightarmfront()
	 	{
	 		$data['id'] = $this->input->post('id');
	 		$data['type'] = "G4F";
	 		$data['source'] = "femalefront.jpg";

	 		$this->load->view('menu/2d/form2d2', $data);
	 	}
	 	public function leftlegfront()
	 	{
	 		$data['id'] = $this->input->post('id');
	 		$data['type'] = "G5F";
	 		$data['source'] = "femalefront.jpg";

	 		$this->load->view('menu/2d/form2d2', $data);
	 	}
	 	public function rightlegfront()
	 	{
	 		$data['id'] = $this->input->post('id');
	 		$data['type'] = "G6F";
	 		$data['source'] = "femalefront.jpg";

	 		$this->load->view('menu/2d/form2d2', $data);
	 	}
	 	//BACK
	 	public function headback()
	 	{
	 		$data['id'] = $this->input->post('id');
	 		$data['type'] = "G1B";
	 		$data['source'] = "femaleback.jpg";

	 		$this->load->view('menu/2d/form2d2', $data);
	 	}
	 	public function bodyback()
	 	{
	 		$data['id'] = $this->input->post('id');
	 		$data['type'] = "G2B";
	 		$data['source'] = "femaleback.jpg";

	 		$this->load->view('menu/2d/form2d2', $data);
	 	}
	 	public function leftarmback()
	 	{
	 		$data['id'] = $this->input->post('id');
	 		$data['type'] = "G3B";
	 		$data['source'] = "femaleback.jpg";

	 		$this->load->view('menu/2d/form2d2', $data);
	 	}
	 	public function rightarmback()
	 	{
	 		$data['id'] = $this->input->post('id');
	 		$data['type'] = "G4B";
	 		$data['source'] = "femaleback.jpg";

	 		$this->load->view('menu/2d/form2d2', $data);
	 	}
	 	public function leftlegback()
	 	{
	 		$data['id'] = $this->input->post('id');
	 		$data['type'] = "G5B";
	 		$data['source'] = "femaleback.jpg";

	 		$this->load->view('menu/2d/form2d2', $data);
	 	}
	 	public function rightlegback()
	 	{
	 		$data['id'] = $this->input->post('id');
	 		$data['type'] = "G6B";
	 		$data['source'] = "femaleback.jpg";

	 		$this->load->view('menu/2d/form2d2', $data);
	 	}
	 	//LEFT
	 	public function headleft()
	 	{
	 		$data['id'] = $this->input->post('id');
	 		$data['type'] = "G1L";
	 		$data['source'] = "femaleback.jpg";

	 		$this->load->view('menu/2d/form2d2', $data);
	 	}
	 	public function bodyleft()
	 	{
	 		$data['id'] = $this->input->post('id');
	 		$data['type'] = "G2L";
	 		$data['source'] = "femaleback.jpg";

	 		$this->load->view('menu/2d/form2d2', $data);
	 	}
	 	public function legleft()
	 	{
	 		$data['id'] = $this->input->post('id');
	 		$data['type'] = "G3L";
	 		$data['source'] = "femaleback.jpg";

	 		$this->load->view('menu/2d/form2d2', $data);
	 	}
	 	//RIGHT
	 	public function headright()
	 	{
	 		$data['id'] = $this->input->post('id');
	 		$data['type'] = "G1R";
	 		$data['source'] = "femaleback.jpg";

	 		$this->load->view('menu/2d/form2d2', $data);
	 	}
	 	public function bodyright()
	 	{
	 		$data['id'] = $this->input->post('id');
	 		$data['type'] = "G2R";
	 		$data['source'] = "femaleback.jpg";

	 		$this->load->view('menu/2d/form2d2', $data);
	 	}
	 	public function legright()
	 	{
	 		$data['id'] = $this->input->post('id');
	 		$data['type'] = "G3R";
	 		$data['source'] = "femaleback.jpg";

	 		$this->load->view('menu/2d/form2d2', $data);
	 	}			 	
	}

	    