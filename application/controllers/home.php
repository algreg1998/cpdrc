<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper("date");
	}
	
	public function index()
	{
		$this->load->library('form_validation');
		$year = isset($_GET['year']) && !empty($_GET['year']) ? intval($_GET['year']) : intval(mdate("%Y",now()));
		$reports = $this->admin_model->getPopulationReport($year);

		$months = array(
					'January' => array(),
					'February' => array(),
					'March' => array(),
					'April' => array(),
					'May' => array(),
					'June' => array(),
					'July' => array(),
					'August' => array(),
					'September' => array(),
					'October' => array(),
					'November' => array(),
					'December' => array()
				);
		
		foreach ($reports as $key => $report)
		{
			$months[$report->monthname] = $report;
		}

		$crimes = $this->admin_model->getCrimeIndex($year);

		$current_yr = mdate("%Y",now());
		$current_mon = mdate("%m",now());
		$current_mon_f = mdate("%F",now());
		$current_month_pop = $this->admin_model->getPopulationReport($current_yr);

		$this->data['current_month_pop'] = $current_month_pop;
		$this->data['current_yr'] = $current_yr;
		$this->data['current_mon'] = $current_mon;
		$this->data['current_mon_f'] = $current_mon_f;
		$this->data['reports'] = $months;
		$this->data['selectedYear'] = $year;
		$this->data['crimes'] = $crimes;

		/*Graph for current month population*/
		$month_pops = $this->admin_model->getCurrentMonthPopulationGraph($current_yr,$current_mon);
		$d_arr = array();
		$c_arr = array();
		$p_arr = array();

		$p_d_arr = 0;
		$p_c_arr = 0;
		$p_p_arr = 0;
		foreach ($month_pops as $m_day) {
			$p_d_arr += intval($m_day->detainee);
			$p_c_arr += intval($m_day->convict);
			$p_p_arr += intval($m_day->probation);
			// $d_arr[] = "[Date.UTC(".mdate("%Y",strtotime($m_day->yr_mon_day)).", ".(intval(mdate("%m",strtotime($m_day->yr_mon_day))) - 1).", ".mdate("%d",strtotime($m_day->yr_mon_day))."), ".$m_day->detainee."]";
			// $c_arr[] = "[Date.UTC(".mdate("%Y",strtotime($m_day->yr_mon_day)).", ".(intval(mdate("%m",strtotime($m_day->yr_mon_day))) - 1).", ".mdate("%d",strtotime($m_day->yr_mon_day))."), ".$m_day->convict."]";
			// $p_arr[] = "[Date.UTC(".mdate("%Y",strtotime($m_day->yr_mon_day)).", ".(intval(mdate("%m",strtotime($m_day->yr_mon_day))) - 1).", ".mdate("%d",strtotime($m_day->yr_mon_day))."), ".$m_day->probation."]";
			
		}
		if (($p_d_arr + $p_c_arr + $p_p_arr) > 0) {
			$data_pie = "['Detainee',$p_d_arr],['Convict',$p_c_arr],['Probation',$p_p_arr]";
		}else{
			$data_pie = "";
		}
		
		$month_crimeindex = $this->admin_model->getCrimeIndexCurrentMonthGraph($current_yr,$current_mon);
		$crimes_arr = array();
		$d2_arr = array();
		$c2_arr = array();
		$p2_arr = array();
		foreach ($month_crimeindex as $crimeindex) {
			$crimes_arr[] = $crimeindex->name;
			$d2_arr[] = intval($crimeindex->detainee);
			$c2_arr[] = intval($crimeindex->convict);
			$p2_arr[] = intval($crimeindex->probation);
		}

		$this->data['title']	= 'Home';
		$this->data['css']		= array('vendor/select2/select2.css','vendor/select2/select2-bootstrap.css','vendor/colorbox/css/colorbox.css');
		$this->data['js_top']	= array();
		$this->data['header'] 	= $this->load->view('admin/header_view',$this->data,TRUE);
		$this->data['body'] 	= $this->load->view('home_view',NULL,TRUE);
		$this->data['footer'] 	= $this->load->view('footer_view',NULL,TRUE);
		$this->data['js_bottom']= array('js/home.js','vendor/select2/select2.js','vendor/colorbox/js/jquery.colorbox-min.js','vendor/highcharts/highcharts.js','js/home.js');
		$this->data['custom_js']= '<script type="text/javascript">
										$(function(){
											$(".nav-home a").addClass("active");
											$("#selectYear").select2();
											$("#populationgraph").highcharts({
											    chart: {
										            plotBackgroundColor: null,
										            plotBorderWidth: null,
										            plotShadow: false
										        },
										        title: {
										            text: ""
										        },
										        tooltip: {
										            pointFormat: "{series.name}: <b>{point.percentage:.1f}%</b>"
										        },
										        plotOptions: {
										            pie: {
										                allowPointSelect: true,
										                cursor: "pointer",
										                dataLabels: {
										                    enabled: true,
										                    format: "<b>{point.name}</b>: {point.percentage:.1f} %",
										                    style: {
										                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || "black"
										                    }
										                }
										            }
										        },
										        series: [{
										            type: "pie",
										            name: "Inmates",
										            data: ['.$data_pie.']
										        }]
											});

											$("#crimegraph").highcharts({
										        chart: {
										            type: "bar"
										        },
										        title: {
										            text: ""
										        },
										        subtitle: {
										            text: ""
										        },
										        xAxis: {
										            categories: '.json_encode($crimes_arr).',
										            title: {
										                text: null
										            },
										            allowDecimals: false
										        },
										        yAxis: {
										            min: 0,
										            title: {
										                text: "Inmates",
										            },
										            labels: {
										                overflow: "justify"
										            },
										            minRange: 1,
            										allowDecimals: false,
										        },
										        plotOptions: {
										            bar: {
										                dataLabels: {
										                    enabled: true
										                }
										            }
										        },
										        tooltip: {
										            headerFormat: "<b>{point.x}</b><br>",
										            crosshairs: true,
            										shared: true
									            },
										        credits: {
										            enabled: false
										        },
										        series: [{
										            name: "Detainee",
										            data: '.json_encode($d2_arr).'

										        }, {
										            name: "Convict",
										            data: '.json_encode($c2_arr).'
										        }, {
										            name: "Probation",
										            data: '.json_encode($p2_arr).'
										        }]
										    });
										});
									</script>';
		$this->load->view('templates',$this->data);
	}

	public function getinmates()
	{
		$year = isset($_GET['year']) ? intval($_GET['year']) : intval(mdate("%Y",now()));
		$month = isset($_GET['month']) ? sprintf("%02d",$_GET['month']) : mdate("%m",now());
		$status = isset($_GET['status']) ? $_GET['status'] : '';

		$where["inmate_type"] = $status;
		

		if ($status == 'Detainee')
		{
			$where["YEAR(date_detained)"] = $year;
			$where["MONTH(date_detained)"] = $month;
			$where["status !="] = 'Released' ;
			$this->data['inmates'] = $this->admin_model->get_select('inmates_full',$where,'*',FALSE);
		}
		elseif ($status == 'Convict')
		{
			$where["YEAR(date_convicted)"] = $year;
			$where["MONTH(date_convicted)"] = $month;
			$where["status !="] = 'Released' ;
			$this->data['inmates'] = $this->admin_model->get_select('inmates_full',$where,'*',FALSE);
		}
		elseif ($status == 'Probation')
		{
			$where["YEAR(date_probation)"] = $year;
			$where["MONTH(date_probation)"] = $month;
			$where["status !="] = 'Released' ;
			$this->data['inmates'] = $this->admin_model->get_select('inmates_full',$where,'*',FALSE);
		}
		else
		{

			$where["inmate_type"] = 'Detainee';
			$where["YEAR(date_detained)"] = $year;
			$where["MONTH(date_detained)"] = $month;
			$where["status !="] = 'Released' ;
			$res1 = $this->admin_model->get_select('inmates_full',$where,'*',FALSE);
			//echo $this->admin_model->db->last_query();

			$where = array();
			$where["inmate_type"] = 'Convict';
			$where["YEAR(date_convicted)"] = $year;
			$where["MONTH(date_convicted)"] = $month;
			$where["status !="] = 'Released' ;
			$res2 =  $this->admin_model->get_select('inmates_full',$where,'*',FALSE);
			//echo $this->admin_model->db->last_query();

			$where = array();
			$where["inmate_type"] = 'Probation';
			$where["YEAR(date_probation)"] = $year;
			$where["MONTH(date_probation)"] = $month;
			$where["status !="] = 'Released' ;
			$res3 = $this->admin_model->get_select('inmates_full',$where,'*',FALSE);
			
			$this->data['inmates'] = array_merge($res1,$res2,$res3);
			//echo $this->admin_model->db->last_query();
		}

		//$this->load->view('selected_inmates_modal_view',$this->data,NULL);
		
		$this->data['title']	= 'Home';
		$this->data['css']		= array('vendor/select2/select2.css','vendor/select2/select2-bootstrap.css','vendor/colorbox/css/colorbox.css');
		$this->data['js_top']	= array();
		$this->data['header'] 	= $this->load->view('admin/header_view',$this->data,TRUE);
		$this->data['body'] 	= $this->load->view('selected_inmates_view',NULL,TRUE);
		$this->data['footer'] 	= $this->load->view('footer_view',NULL,TRUE);
		$this->data['js_bottom']= array('js/home.js','vendor/select2/select2.js','vendor/colorbox/js/jquery.colorbox-min.js','vendor/highcharts/highcharts.js','js/home.js');
		$this->data['custom_js']= '<script type="text/javascript">
										$(function(){
											$(".nav-home a").addClass("active");
											$("#selectYear").select2();
										});
									</script>';
		$this->load->view('templates',$this->data);
	}


	public function getcrimeindex(){
		$status = $_GET['status'];
		$violation_id = $_GET['vid'];
		$where = array('status' => $status);
		$this->data['inmates'] = $this->admin_model->getInmatesCrime($status,$violation_id);

		$this->data['title']	= 'Home';
		$this->data['css']		= array('vendor/select2/select2.css','vendor/select2/select2-bootstrap.css','vendor/colorbox/css/colorbox.css');
		$this->data['js_top']	= array();
		$this->data['header'] 	= $this->load->view('admin/header_view',$this->data,TRUE);
		$this->data['body'] 	= $this->load->view('selected_inmates_view',NULL,TRUE);
		$this->data['footer'] 	= $this->load->view('footer_view',NULL,TRUE);
		$this->data['js_bottom']= array('js/home.js','vendor/select2/select2.js','vendor/colorbox/js/jquery.colorbox-min.js','vendor/highcharts/highcharts.js','js/home.js');
		$this->data['custom_js']= '<script type="text/javascript">
										$(function(){
											$(".nav-home a").addClass("active");
											$("#selectYear").select2();
										});
									</script>';
		$this->load->view('templates',$this->data);
	}

	// public function getcrimeindex(){
	// 	$status = $_GET['status'];
	// 	$violation_id = $_GET['vid'];
	// 	$where = array('status' => $status);
	// 	$this->data['inmates'] = $this->admin_model->getInmatesCrinme($status,$violation_id);
	// 	$this->load->view('selected_inmates_modal_view',$this->data,NULL);
	// }
	
	// public function getinmates()
	// {
	// 	$year = isset($_GET['year']) ? intval($_GET['year']) : intval(mdate("%Y",now()));
	// 	$month = isset($_GET['month']) ? sprintf("%02d",$_GET['month']) : mdate("%m",now());
	// 	$status = isset($_GET['status']) ? $_GET['status'] : '';

	// 	$where["status"] = $status;

	// 	if ($status == 'Detainee')
	// 	{
	// 		$where["YEAR(date_detained)"] = $year;
	// 		$where["MONTH(date_detained)"] = $month;
	// 		$this->data['inmates'] = $this->admin_model->get_select('inmates_full',$where,'*',FALSE);
	// 	}
	// 	elseif ($status == 'Convict')
	// 	{
	// 		$where["YEAR(date_convicted)"] = $year;
	// 		$where["MONTH(date_convicted)"] = $month;
	// 		$this->data['inmates'] = $this->admin_model->get_select('inmates_full',$where,'*',FALSE);
	// 	}
	// 	elseif ($status == 'Probation')
	// 	{
	// 		$where["YEAR(date_probation)"] = $year;
	// 		$where["MONTH(date_probation)"] = $month;
	// 		$this->data['inmates'] = $this->admin_model->get_select('inmates_full',$where,'*',FALSE);
	// 	}
	// 	else
	// 	{

	// 		$where["status"] = 'Detainee';
	// 		$where["YEAR(date_detained)"] = $year;
	// 		$where["MONTH(date_detained)"] = $month;
	// 		$res1 = $this->admin_model->get_select('inmates_full',$where,'*',FALSE);

	// 		$where = array();
	// 		$where["status"] = 'Convict';
	// 		$where["YEAR(date_convicted)"] = $year;
	// 		$where["MONTH(date_convicted)"] = $month;
	// 		$res2 =  $this->admin_model->get_select('inmates_full',$where,'*',FALSE);

	// 		$where = array();
	// 		$where["status"] = 'Probation';
	// 		$where["YEAR(date_probation)"] = $year;
	// 		$where["MONTH(date_probation)"] = $month;
	// 		$res3 = $this->admin_model->get_select('inmates_full',$where,'*',FALSE);
			
	// 		$this->data['inmates'] = array_merge($res1,$res2,$res3);
	// 	}

	// 	$this->load->view('selected_inmates_modal_view',$this->data,NULL);
	// }
}

/* End of file login.php */
/* Location: ./application/controllers/login.php */