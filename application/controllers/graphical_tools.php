<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Graphical_tools extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('cpdrc/cpdrc_fw','',TRUE);
		$this->load->helper('date');
		$this->load->library('form_validation');
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
	public function getPrisonStrength($year,$month,$day){
	      $pStren = $this->cpdrc_fw->getReportsDailyPreviousPStren($year,$month,$day);
	                  // if($day == 14){
	                  //       echo $this->cpdrc_fw->db->last_query();
	                  //       //echo json_encode($pStren);
	                  // }
	      $a = json_decode(json_encode($pStren));
	      $cnt =0;
	      for($i = 0; $i< count($a); $i++) {
	       $cnt+=  $a[$i]->count;
	 }

	 $pStren1 = $this->cpdrc_fw->getReportsDailyPreviousReleased($year,$month,$day);
	                  //  if($day == 14){
	                  //      echo "<br>";
	                  //        echo $this->cpdrc_fw->db->last_query();
	                  // //       //echo json_encode($pStren);
	                  //  }
	 $b = json_decode(json_encode($pStren1));
	 $cntRes = 0;
	 for($i = 0; $i < count($b); $i++) {
	       $cntRes+=  $b[$i]->count;
	 }

	 return $cnt - $cntRes;
	}
	public function pol($year,$month){

      $pStren = array();

      $day = $this->cpdrc_fw->getHighestDayOfMonth($year,$month);
      $a = json_decode(json_encode($day));
      $day =$a[0]->day;



      for($dy = 1; $dy <= $day ; $dy++){

            $prisonersReceived = $this->cpdrc_fw->getReportsDailyCurrentRecieved($year,$month,$dy);
            $a = json_decode(json_encode($prisonersReceived));
            if($a[0]->prisonersReceived>0){
                  $prisonersReceived =$a[0]->prisonersReceived;
            }else{
                  $prisonersReceived = "";
            }



            $prisonersReleased = $this->cpdrc_fw->getReportsDailyCurrentReleased($year,$month,$dy);
            $a = json_decode(json_encode($prisonersReleased));
            $prisonersReleased =$a[0]->prisonersReleased;

            $pStrength =  $this->getPrisonStrength($year,$month,$dy);
            if($prisonersReceived == ""){
                  $total = $pStrength  + 0 - $prisonersReleased;

            }else{
                  $total = $pStrength + $prisonersReceived - $prisonersReleased;
            }

            $pStren [] = array("day" =>$dy,
                  "prisonersReleased" => $prisonersReleased,
                  "total" => $total); 

      }
      return $pStren;
}
	public function addReleased()
	{	

		$data['data']=$this->pol(2017,12);
		// $data['asd']=$this->cpdrc_fw->getTotalReportsDaily(2017,12);
		$day = array();
		$total = array();
		$rel = array();
		foreach ($data['data'] as $k) {
			// echo $k["day"]." ".$k["pStrength"]." ".$k["prisonersReceived"]." ".$k["prisonersReleased"]." ".$k["total"]." <br>";
			$day[]=array("day"=>$k["day"]);
			$total[]=array("total"=>$k["total"]);
			$rel[]=array("rel"=>$k["prisonersReleased"]);
		}
		$data['day'] = $day;
		$data['total'] = $total ;
		$data['rel'] = $rel;
		// echo "<pre>";
		// print_r($data['day']);
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
	public function popuPie()
	{	
		
		$data['popu'] = $this->admin_model->getMaleFemalCnt();
        $this->data['title']    = 'Masterlist';
        $this->data['css']      = array(
                                'vendor/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css',
                                'vendor/colorbox/css/colorbox.css',
                                'vendor/alertify/css/alertify.core.css',
                                'vendor/alertify/css/alertify.default.css'
                                );
        $this->data['js_top']   = array();
        $this->data['header']   = $this->load->view('admin/header_view',$this->data,TRUE);
        $this->data['body']     = $this->load->view('graphical_tools_populationPieChart_view', $data,TRUE);
        $this->data['footer']   = $this->load->view('footer_view',NULL,TRUE);
        $this->data['js_bottom']= array('vendor/highcharts/highcharts.js','vendor/highcharts/modules/exporting.js');
        $this->data['custom_js']= "<script type='text/javascript'>
										var monthname = 'November'
										$('.nav-graphical').addClass('active');
											$('.nav-graphical-popuPie a').addClass('active');
									</script>";
        $this->load->view('templates',$this->data);   
	}
	public function getPopuonDate1($year){
		$reports = $this->admin_model->getPopulationReport($year);
	   	// var_dump($reports);
	   	foreach ($reports as $key => $report)
		{
			$a = $report->detainee+$report->convict+$report->probation;

			 // var_dump($report);
			$months[$report->monthname] = $a ;
		}
		var_dump($months);
	   	die();
		return $cnt - $cntRes;
	}
	public function getPopuonDate($month,$day,$year){
		$pStren = $this->cpdrc_fw->getReportsDailyPreviousPStren($year,$month,$day);
	    $a = json_decode(json_encode($pStren));
		$cnt =0;
		for($i = 0; $i< count($a); $i++) {								
		    $cnt+=  $a[$i]->count;
		}

		$pStren1 = $this->cpdrc_fw->getReportsDailyPreviousReleased($year,$month,$day);
		$b = json_decode(json_encode($pStren1));
		$cntRes = 0;
		for($i = 0; $i < count($b); $i++) {
		    $cntRes+=  $b[$i]->count;
		}
		return $cnt - $cntRes;
	}
	public function popuBar()
	{	
		if ($this->form_validation->run() != TRUE )
       {
            if (!empty( $this->input->post('year')) && !empty( $this->input->post('month'))) {
                 $year = $this->input->post('year');
                 $month = $this->input->post('month');     
           }else{
	            $year =date("Y");
	            $month =date("m");
	      }

	      }else{
	            $data['day'] = NULL;
	      }

		$day = cal_days_in_month(CAL_GREGORIAN,$month,$year);
		$a = array();
		$days= array();

		for ($i =1; $i <= $day; $i++) { 
			$a[$i] =  $this->getPopuonDate($month,$i,$year);
			$days[]=$i;
		}
		// for ($i =1; $i <= $day; $i++) { 
		// 	$a[$i] =  $this->getPopuonDate1($year);
		// 	$days[]=$i;
		// }
		$data["data"]=$a;
		$data["days"]=$days;
		$data['year']=$year;
      	$data['month']=$month;
		$dateObj   = DateTime::createFromFormat('!m', $month);
								$monthName = $dateObj->format('F'); // March
								// echo $monthName;
		$data['monthName']	=$monthName;							
        $this->data['title']    = 'Masterlist';
        $this->data['css']      = array(
                                'vendor/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css',
                                'vendor/colorbox/css/colorbox.css',
                                'vendor/alertify/css/alertify.core.css',
                                'vendor/alertify/css/alertify.default.css'
                                );
        $this->data['js_top']   = array();
        $this->data['header']   = $this->load->view('admin/header_view',$this->data,TRUE);
        $this->data['body']     = $this->load->view('graphical_tools_populationBarGraph_view', $data,TRUE);
        $this->data['footer']   = $this->load->view('footer_view',NULL,TRUE);
        $this->data['js_bottom']= array('vendor/highcharts/highcharts.js','vendor/highcharts/modules/exporting.js');
        $this->data['custom_js']= "<script type='text/javascript'>
										var monthname = 'November'
										$('.nav-graphical').addClass('active');
											$('.nav-graphical-popuBar a').addClass('active');
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