<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_Controller extends MY_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('admin_model');
		$this->load->helper('date');
		$this->data['meta_title'] = config_item('site_name');

		if (!$this->session->userdata('is_logged_in'))
		{
			redirect(base_url('login'));
		}

		$current_month = mdate("%m",now());
		$current_month_f = mdate("%F",now());
		$current_year = mdate("%Y",now());
		$current_day = mdate("%d",now());

		$release_inmatesCount = $this->admin_model->getReleaseMonthCount($current_year,$current_month);
		$appearancesCount = $this->admin_model->getAppearanceScheduleCount($current_year,$current_month);
		$nearendstayCount = $this->admin_model->getNearEndofStayCount($current_year,$current_month,$current_day);
		$overstayingCount = $this->admin_model->getOverStayingMonthCount($current_year,$current_month,$current_day);
		$editRequestCount = $this->admin_model->getAllApprovedAndReject($current_year,$current_month,$current_day);
		
		$this->data['release_inmatesCount'] = count($release_inmatesCount);
		$this->data['appearancesCount'] = count($appearancesCount);
		$this->data['nearendstayCount'] = count($nearendstayCount);
		$this->data['overstayingCount'] = count($overstayingCount);
		$this->data['editRequestCount'] = count($editRequestCount);
		$query = $this->db->select('count(temp.inmate_id) as cnt')
						->from('inmates_full,temp')->where("inmates_full.inmate_id = temp.inmate_id");
		$query = $this->db->get();
		$result = $query->row();
		
		$this->data['unfinished'] = $result->cnt;
		
		$allnoti = $this->data['release_inmatesCount'] + $this->data['appearancesCount'] + $this->data['nearendstayCount'] + $this->data['overstayingCount']+$this->data['editRequestCount'];
		$this->data['allnoti']	= $allnoti;
	}
}

/* End of file Admin_Controller.php */
/* Location: ./application/libraries/Admin_Controller.php */