<?php
session_start();
	class Viewmarkingfemale extends Admin_Controller
	{
		
		public function __construct()
	 	{
	   		parent::__construct();
	   		$this->load->model('cpdrc/cpdrc_fw','',TRUE);
	   		$this->load->model('cpdrc/model_marks','',TRUE);
	 	}
	 	//this is for the inserting of the data. and the image of the markings
	 	public function index()
	 	{

	 	}
	 		 	//FRONT
	 	public function headfront()
	 	{
	 		$id = $this->input->post('id');
	 		$type = "G1F";

	 		$data['marks'] = $this->model_marks->display($id, $type);
	 		$this->load->view('menu/2d/details', $data);
	 	}
	 	public function bodyfront()
	 	{
	 		$id = $this->input->post('id');
	 		$type = "G2F";

	 		$data['marks'] = $this->model_marks->display($id, $type);
	 		$this->load->view('menu/2d/details', $data);
	 	}
	 	public function leftarmfront()
	 	{
	 		$id = $this->input->post('id');
	 		$type = "G3F";

	 		$data['marks'] = $this->model_marks->display($id, $type);
	 		$this->load->view('menu/2d/details', $data);
	 	}
	 	public function rightarmfront()
	 	{
	 		$id = $this->input->post('id');
	 		$type = "G4F";

	 		$data['marks'] = $this->model_marks->display($id, $type);
	 		$this->load->view('menu/2d/details', $data);
	 	}
	 	public function leftlegfront()
	 	{
	 		$id = $this->input->post('id');
	 		$type = "G5F";

	 		$data['marks'] = $this->model_marks->display($id, $type);
	 		$this->load->view('menu/2d/details', $data);
	 	}
	 	public function rightlegfront()
	 	{
	 		$id = $this->input->post('id');
	 		$type = "G6F";

	 		$data['marks'] = $this->model_marks->display($id, $type);
	 		$this->load->view('menu/2d/details', $data);
	 	}
	 	//GACK
	 	public function headback()
	 	{
	 		$id = $this->input->post('id');
	 		$type = "G1B";

	 		$data['marks'] = $this->model_marks->display($id, $type);
	 		$this->load->view('menu/2d/details', $data);
	 	}
	 	public function bodyback()
	 	{
	 		$id = $this->input->post('id');
	 		$type = "G2B";

	 		$data['marks'] = $this->model_marks->display($id, $type);
	 		$this->load->view('menu/2d/details', $data);
	 	}
	 	public function leftarmback()
	 	{
	 		$id = $this->input->post('id');
	 		$type = "G3B";

	 		$data['marks'] = $this->model_marks->display($id, $type);
	 		$this->load->view('menu/2d/details', $data);
	 	}
	 	public function rightarmback()
	 	{
	 		$id = $this->input->post('id');
	 		$type = "G4B";

	 		$data['marks'] = $this->model_marks->display($id, $type);
	 		$this->load->view('menu/2d/details', $data);
	 	}
	 	public function leftlegback()
	 	{
	 		$id = $this->input->post('id');
	 		$type = "G5B";

	 		$data['marks'] = $this->model_marks->display($id, $type);
	 		$this->load->view('menu/2d/details', $data);
	 	}
	 	public function rightlegback()
	 	{
	 		$id = $this->input->post('id');
	 		$type = "G6B";

	 		$data['marks'] = $this->model_marks->display($id, $type);
	 		$this->load->view('menu/2d/details', $data);
	 	}
	 	//LEFT
	 	public function headleft()
	 	{
	 		$id = $this->input->post('id');
	 		$type = "G1L";

	 		$data['marks'] = $this->model_marks->display($id, $type);
	 		$this->load->view('menu/2d/details', $data);
	 	}
	 	public function bodyleft()
	 	{
	 		$id = $this->input->post('id');
	 		$type = "G2L";

	 		$data['marks'] = $this->model_marks->display($id, $type);
	 		$this->load->view('menu/2d/details', $data);
	 	}
	 	public function legleft()
	 	{
	 		$id = $this->input->post('id');
	 		$type = "G3L";

	 		$data['marks'] = $this->model_marks->display($id, $type);
	 		$this->load->view('menu/2d/details', $data);
	 	}
	 	//RIGHT
	 	public function headright()
	 	{
	 		$id = $this->input->post('id');
	 		$type = "G1R";

	 		$data['marks'] = $this->model_marks->display($id, $type);
	 		$this->load->view('menu/2d/details', $data);
	 	}
	 	public function bodyright()
	 	{
	 		$id = $this->input->post('id');
	 		$type = "G2R";

	 		$data['marks'] = $this->model_marks->display($id, $type);
	 		$this->load->view('menu/2d/details', $data);
	 	}
	 	public function legright()
	 	{
	 		$id = $this->input->post('id');
	 		$type = "G3R";

	 		$data['marks'] = $this->model_marks->display($id, $type);
	 		$this->load->view('menu/2d/details', $data);
	 	}		 	
	}

	    