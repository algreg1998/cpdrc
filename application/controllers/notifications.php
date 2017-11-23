<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Notifications extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper("date");
	}
	
	public function index()
	{
		$current_month = mdate("%m",now());
		$current_month_f = mdate("%F",now());
		$current_year = mdate("%Y",now());
		$current_day = mdate("%d",now());

		$release_inmates = $this->admin_model->getReleaseMonth($current_year,$current_month);
		$appearances = $this->admin_model->getAppearanceSchedule($current_year,$current_month);
		$nearendstay = $this->admin_model->getNearEndofStay($current_year,$current_month,$current_day);
		$overstaying = $this->admin_model->getOverStayingMonth($current_year,$current_month,$current_day);
		$editRequest = $this->admin_model->getAllApprovedAndReject($current_year,$current_month,$current_day);

		$this->data['release_inmates']	= $release_inmates;
		$this->data['appearances']	= $appearances;
		$this->data['nearendstay']	= $nearendstay;
		$this->data['overstaying']	= $overstaying;
		$this->data['editRequest']	= $editRequest;
		$this->data['current_month_f']	= $current_month_f;
		$this->data['current_year']	= $current_year;
		$this->data['title']	= 'Notifications';
		$this->data['css']		= array();
		$this->data['js_top']	= array();
		$this->data['header'] 	= $this->load->view('admin/header_view',$this->data,TRUE);
		$this->data['body'] 	= $this->load->view('notifications_view',NULL,TRUE);
		$this->data['footer'] 	= $this->load->view('footer_view',NULL,TRUE);
		$this->data['js_bottom']= array();
		$this->data['custom_js']= '<script type="text/javascript">
										$(function(){
											$(".nav-notifications a").addClass("active");
											$(".notificationsWrapper table tbody tr").click(function(){
												window.location = $(this).data("href");
											});
										});
									</script>';
		$this->load->view('templates',$this->data);
	}
}

/* End of file notifications.php */
/* Location: ./application/controllers/notifications.php */