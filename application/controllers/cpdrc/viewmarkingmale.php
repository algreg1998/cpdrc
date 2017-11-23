<?php
session_start();
	class Viewmarkingmale extends Admin_Controller
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
	 		$type = "B1F";

	 		$data['marks'] = $this->model_marks->display($id, $type);
	 		$this->load->view('menu/2d/details', $data);
	 	}
	 	public function bodyfront()
	 	{
	 		$id = $this->input->post('id');
	 		$type = "B2F";

	 		$data['marks'] = $this->model_marks->display($id, $type);
	 		$this->load->view('menu/2d/details', $data);
	 	}
	 	public function leftarmfront()
	 	{
	 		$id = $this->input->post('id');
	 		$type = "B3F";

	 		$data['marks'] = $this->model_marks->display($id, $type);
	 		$this->load->view('menu/2d/details', $data);
	 	}
	 	public function rightarmfront()
	 	{
	 		$id = $this->input->post('id');
	 		$type = "B4F";

	 		$data['marks'] = $this->model_marks->display($id, $type);
	 		$this->load->view('menu/2d/details', $data);
	 	}
	 	public function leftlegfront()
	 	{
	 		$id = $this->input->post('id');
	 		$type = "B5F";

	 		$data['marks'] = $this->model_marks->display($id, $type);
	 		$this->load->view('menu/2d/details', $data);
	 	}
	 	public function rightlegfront()
	 	{
	 		$id = $this->input->post('id');
	 		$type = "B6F";

	 		$data['marks'] = $this->model_marks->display($id, $type);
	 		$this->load->view('menu/2d/details', $data);
	 	}
	 	//BACK
	 	public function headback()
	 	{
	 		$id = $this->input->post('id');
	 		$type = "B1B";

	 		$data['marks'] = $this->model_marks->display($id, $type);
	 		$this->load->view('menu/2d/details', $data);
	 	}
	 	public function bodyback()
	 	{
	 		$id = $this->input->post('id');
	 		$type = "B2B";

	 		$data['marks'] = $this->model_marks->display($id, $type);
	 		$this->load->view('menu/2d/details', $data);
	 	}
	 	public function leftarmback()
	 	{
	 		$id = $this->input->post('id');
	 		$type = "B3B";

	 		$data['marks'] = $this->model_marks->display($id, $type);
	 		$this->load->view('menu/2d/details', $data);
	 	}
	 	public function rightarmback()
	 	{
	 		$id = $this->input->post('id');
	 		$type = "B4B";

	 		$data['marks'] = $this->model_marks->display($id, $type);
	 		$this->load->view('menu/2d/details', $data);
	 	}
	 	public function leftlegback()
	 	{
	 		$id = $this->input->post('id');
	 		$type = "B5B";

	 		$data['marks'] = $this->model_marks->display($id, $type);
	 		$this->load->view('menu/2d/details', $data);
	 	}
	 	public function rightlegback()
	 	{
	 		$id = $this->input->post('id');
	 		$type = "B6B";

	 		$data['marks'] = $this->model_marks->display($id, $type);
	 		$this->load->view('menu/2d/details', $data);
	 	}
	 	//LEFT
	 	public function headleft()
	 	{
	 		$id = $this->input->post('id');
	 		$type = "B1L";

	 		$data['marks'] = $this->model_marks->display($id, $type);
	 		$this->load->view('menu/2d/details', $data);
	 	}
	 	public function bodyleft()
	 	{
	 		$id = $this->input->post('id');
	 		$type = "B2L";

	 		$data['marks'] = $this->model_marks->display($id, $type);
	 		$this->load->view('menu/2d/details', $data);
	 	}
	 	public function legleft()
	 	{
	 		$id = $this->input->post('id');
	 		$type = "B3L";

	 		$data['marks'] = $this->model_marks->display($id, $type);
	 		$this->load->view('menu/2d/details', $data);
	 	}
	 	//RIGHT
	 	public function headright()
	 	{
	 		$id = $this->input->post('id');
	 		$type = "B1R";

	 		$data['marks'] = $this->model_marks->display($id, $type);
	 		$this->load->view('menu/2d/details', $data);
	 	}
	 	public function bodyright()
	 	{
	 		$id = $this->input->post('id');
	 		$type = "B2R";

	 		$data['marks'] = $this->model_marks->display($id, $type);
	 		$this->load->view('menu/2d/details', $data);
	 	}
	 	public function legright()
	 	{
	 		$id = $this->input->post('id');
	 		$type = "B3R";

	 		$data['marks'] = $this->model_marks->display($id, $type);
	 		$this->load->view('menu/2d/details', $data);
	 	}	 	
	}

	    