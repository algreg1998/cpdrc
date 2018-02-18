<?php
session_start();
	class Conductrecords extends Admin_Controller
	{
		public function __construct()
	 	{
	   		parent::__construct();
	   		$this->load->model('cpdrc/cpdrc_fw','',TRUE);

	 	}
	 	public function index()
	 	{
	 		$id=$this->input->post('id');
	 		$user=$this->session->userdata('logged_in');

	 		$rec = array('inmate_id' => $id,
	 					'date_occur' =>$this->input->post('date'),
	 					'rec_type' => $this->input->post('type'),
	 					'punishment' => $this->input->post('punish'),
	 					'cause' => $this->input->post('cause'),
	 					'warden_id' => $user['user_id'],
	 					'pointValue' => $this->input->post('pointValue'),
	 					'pointUnit' => $this->input->post('pointUnit'),
                        'status' => 1);

	 		$save = $this->db->insert('inmate_conduct_rec', $rec);
	 		if ($save)
			{
				$this->session->set_flashdata('success_msg','Conduct Record was successfully created. Inmate Id: <strong>'.$rec['inmate_id'].'</strong> was added a  <strong>'.$rec['rec_type'].'</strong>');
            }else
            {
				$this->session->set_flashdata('error_msg','Oops, Something went wrong!');
			}
	 		redirect('cpdrc/pages/records');

	 	}
	 	public function view()
	 	{
	 		$id=$this->input->post('id');
	 		$data['rec']=$this->cpdrc_fw->myinmate($id);
	 		$data['view']=$this->cpdrc_fw->viewconrec($id);
	 		$data['releaseInfo'] = $this->cpdrc_fw->inmateReleaseInfo($id);

	 		
	 		$this->load->view('menu/view_conrec', $data);
	 	}
	 	public function delete()
	 	{
	 		$id = $this->input->post('id');
	 		$update = array("status"=>'0');
	 		// $this->db->where('id', $id);
	 		$this->admin_model->update('inmate_conduct_rec',array("id"=>$id),$update);
	 		
	 		$data['view']=$this->cpdrc_fw->viewconrec2($id);
	 		$this->load->view('menu/view_conrec2', $data);
	 	}
	 	public function delete2()
	 	{
	 		$id = $this->input->post('id');

	 		$this->db->where('id', $id);
	 		$this->db->delete('inmate_conduct_rec');
	 		
	 		$data['view']=$this->cpdrc_fw->viewconrec2($id);
	 		$this->load->view('menu/view_conrec3', $data);
	 	}	 	
	}
