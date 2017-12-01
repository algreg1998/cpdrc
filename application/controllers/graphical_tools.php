<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Graphical_tools extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('date');
	}
	
	public function violations()
	{
		$this->load->library('form_validation');
		$year = isset($_GET['year']) && !empty($_GET['year']) ? intval($_GET['year']) : intval(mdate("%Y",now()));
		$violation = isset($_GET['violation']) && !empty($_GET['violation']) ? $_GET['violation'] : '';

		$violations = $this->admin_model->get_select('cs_violations',null,'DISTINCT(name)',FALSE,'name ASC');
		$vio_list = array();
		foreach ($violations as $vio) {
			$vio_list[$vio->name] = $vio->name;
		}
		$year_list = array();
		for ($i=intval(mdate("%Y",now())); $i >= 1800 ; $i--) { 
			$year_list[$i]=$i;
		}

		if (empty($violation)) {
			$violation = reset($vio_list); 
		}

		$res = $this->admin_model->getViolationReportGraph($year,$violation);
		

		// dump($res); die();
		$detainee = array(0,0,0,0,0,0,0,0,0,0,0,0);
		$convict = array(0,0,0,0,0,0,0,0,0,0,0,0);
		$probation = array(0,0,0,0,0,0,0,0,0,0,0,0);
		foreach ($res as $re) {
			$detainee[intval($re->month)-1] = intval($re->detainee);
			$convict[intval($re->month)-1] = intval($re->convict);
			$probation[intval($re->month)-1] = intval($re->probation);
		}

		$filename = $this->filename_safe($violation.'_'.$year);
		//echo $this->db->last_query(); die();
		$this->data['violation_list'] = $vio_list;
		$this->data['year_list'] = $year_list;
		$this->data['title']	= 'Graph | Violations';
		$this->data['css']		= array('vendor/select2/select2.css','vendor/select2/select2-bootstrap.css');
		$this->data['js_top']	= array();
		$this->data['header'] 	= $this->load->view('admin/header_view',$this->data,TRUE);
		$this->data['body'] 	= $this->load->view('graphical_tools_violations_view',NULL,TRUE);
		$this->data['footer'] 	= $this->load->view('footer_view',NULL,TRUE);
		$this->data['js_bottom']= array('vendor/highcharts/highcharts.js','vendor/highcharts/modules/exporting.js','js/violations.js','vendor/select2/select2.js');
		$this->data['custom_js']= '<script type="text/javascript">
										var detainee= '.json_encode($detainee).';
										var convict= '.json_encode($convict).';
										var probation= '.json_encode($probation).';
										var chartTitle = "' . ( empty($violation) ? 'Please select a violation' : $violation) .'";
										var subTitle = "' . ( empty($violation) ? 'Select a year' : $year) . '";
										var filename = "'.$filename.'";
										$(function(){
											$(".nav-graphical").addClass("active");
											$(".nav-violations").addClass("active");
											$(".nav-graphical-violations a").addClass("active");
											$("#selectYear").select2();
											$("#selectViolation").select2();
										});
									</script>';
		$this->load->view('templates',$this->data);
	}

	

	public function populations()
	{
		$this->load->library('form_validation');
		$year = isset($_GET['year']) && !empty($_GET['year']) ? intval($_GET['year']) : intval(mdate("%Y",now()));

	

		$res = $this->admin_model->getPopulationReportGraph($year);

		
		$detainee = array(0,0,0,0,0,0,0,0,0,0,0,0);
		$convict = array(0,0,0,0,0,0,0,0,0,0,0,0);
		$probation = array(0,0,0,0,0,0,0,0,0,0,0,0);
		foreach ($res as $re) {
			$detainee[intval($re->month)-1] = intval($re->detainee);
			$convict[intval($re->month)-1] = intval($re->convict);
			$probation[intval($re->month)-1] = intval($re->probation);
		}

		$year_list = array();
		for ($i=intval(mdate("%Y",now())); $i >= 1800 ; $i--) { 
			$year_list[$i]=$i;
		}
		$filename = $this->filename_safe('Inmate_Population_'.$year);
		$this->admin_model->getPopulationReportGraph($year);
		$this->data['year_list'] = $year_list;
		$this->data['title']	= 'Population';
		$this->data['css']		= array('vendor/select2/select2.css','vendor/select2/select2-bootstrap.css');
		$this->data['js_top']	= array();
		$this->data['header'] 	= $this->load->view('admin/header_view',$this->data,TRUE);
		$this->data['body'] 	= $this->load->view('graphical_tools_populations_view',NULL,TRUE);
		$this->data['footer'] 	= $this->load->view('footer_view',NULL,TRUE);
		$this->data['js_bottom']= array('vendor/highcharts/highcharts.js','vendor/highcharts/modules/exporting.js','js/populations.js','vendor/select2/select2.js');
		$this->data['custom_js']= '<script type="text/javascript">
										var detainee= '.json_encode($detainee).';
										var convict= '.json_encode($convict).';
										var probation= '.json_encode($probation).';
										var subTitle = "' . ( empty($year) ? 'Select a year' : $year) . '";
										var filename = "'.$filename.'";
											
										$(function(){
											
											$(".nav-graphical").addClass("active");
											$(".nav-graphical-populations a").addClass("active");
											$("#selectYear").select2();
											
										});
									</script>';
		$this->load->view('templates',$this->data);
	}
	public function addReleased()
	{	


		$data['number'] = cal_days_in_month(CAL_GREGORIAN, date('m'), date('Y')); // 31
		
		$this->data['title']	= 'Population';
		$this->data['css']		= array('vendor/select2/select2.css','vendor/select2/select2-bootstrap.css');
		$this->data['js_top']	= array();
		$this->data['header'] 	= $this->load->view('admin/header_view',$this->data,TRUE);
		$this->data['body'] 	= $this->load->view('graphical_tools_addedReleased_view',$data,TRUE);
		$this->data['footer'] 	= $this->load->view('footer_view',NULL,TRUE);
		$this->data['js_bottom']= array('vendor/highcharts/highcharts.js','vendor/highcharts/modules/exporting.js');
		$this->data['custom_js']= "<script type='text/javascript'>
										var monthname = 'November'
										$('.nav-graphical').addClass('active');
											$('.nav-graphical-addReleased a').addClass('active');
									</script>";
		$this->load->view('templates',$this->data);
	}

	public function filename_safe($filename) {
		$temp = $filename;
		 
		// Lower case
		$temp = strtolower($temp);
		 
		// Replace spaces with a '_'
		$temp = str_replace(" ", "_", $temp);
		 
		// Loop through string
		$result = '';
		for ($i=0; $i<strlen($temp); $i++) {
			if (preg_match('([0-9]|[a-z]|_)', $temp[$i])) {
				$result = $result . $temp[$i];
			}
		}
		 
		// Return filename
		return $result;
	}
}

/* End of file logs.php */
/* Location: ./application/controllers/logs.php */