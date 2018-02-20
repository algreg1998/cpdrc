<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Import extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->helper('date');
		$this->load->model('Import_model');
	}
	
	public function viewImportPage()
	{


		$this->data['title']	= 'Import CSV';
		$this->data['css']		= array('vendor/select2/select2.css','vendor/select2/select2-bootstrap.css');
		$this->data['js_top']	= array();
		$this->data['header'] 	= $this->load->view('admin/header_view',$this->data,TRUE);
		$this->data['body'] 	= $this->load->view('import/importLandingPage',NULL,TRUE);
		$this->data['footer'] 	= $this->load->view('footer_view',NULL,TRUE);
		$this->data['js_bottom']= array();
        $this->data['custom_js']= '<script type="text/javascript">
										$( document ).ready(function() {
										    $(".close").click(function () {
                                                $(this).parent().removeClass("in"); // hides alert with Bootstrap CSS3 
                                            });
                                            $("#importSubmit").hide();
                                            $("#error").hide();
                                            $("#checked").hide();
                                            $( "#file" ).change(function() {
                                              // get the file name, possibly with path (depends on browser)
                                              var filename = $("#file").val();
                                        
                                              // Use a regular expression to trim everything before final dot
                                              var extension = filename.replace(/^.*\./, \'\');
//                                              alert( "User is planning to upload a ["+extension+"] file." );
                                              if(filename != "")
                                              {
                                                  if(extension != "csv")
                                                  {
                                                      $("#error").show();
                                                      $("#checked").hide();
                                                      $("#importSubmit").hide();
                                                  }
                                                  else
                                                  {
                                                      $("#error").hide();
                                                      $("#checked").show();
                                                      $("#importSubmit").show();
                                                  }
                                              }
                                              else
                                              {
                                                  $("#error").hide();
                                                  $("#checked").hide();
                                                  $("#importSubmit").hide();
                                              }
                                              
                                            });
                                        });
									</script>';
		$this->load->view('templates',$this->data);
	}
	public function uploadData(){

		$type = $this->input->post("type");
		switch ($type) {
			case 'inmate':
				$data['result']=$this->Import_model->saveInmateData();
				if($data['result']){
					$msg ='';
					foreach ($data['result'] as $key ) {
						$msg.= "<li>".$key."</li>";
					}
					$this->session->set_flashdata('error_msg','Oops, Something went wrong! Importing canceled. <br><br><ul>'.$msg.'</ul><br>Inmate IDs already exists. Please change to prevent duplicates.');
				}else{
					$this->session->set_flashdata('success_msg','Inmate Records successfully inserted');
				}
						
				break;
			case 'violation':
				$data['result']=$this->Import_model->saveViolationData();
				if($data['result']){
					$msg ='';
					foreach ($data['result'] as $key ) {
						$msg.= "<li>".$key."</li>";
					}
					$this->session->set_flashdata('error_msg','Oops, Something went wrong! Importing canceled. <br><br><ul>'.$msg.'</ul><br>Violation names already exists. Please change to prevent duplicates.');
				}else{
					$this->session->set_flashdata('success_msg','Violation Records successfully inserted');
				}
						
				break;
			// case 'cases':
			// 	$data['result']=$this->Import_model->filterCases();
			// 	if($data['result']){
			// 		$msg ='';
			// 		foreach ($data['result'] as $key ) {
			// 			$msg.= "<li>".$key."</li>";
			// 		}
			// 		$this->session->set_flashdata('error_msg','Oops, Something went wrong! Importing canceled. <br><br><ul>'.$msg.'</ul><br>Violation names already exists. Please change to prevent duplicates.');
			// 	}else{
			// 		$this->session->set_flashdata('success_msg','Violation Records successfully inserted');
			// 	}
						
			// 	break;
			
			default:
				# code...
				break;
		}
		redirect("import/viewImportPage");
		// $data['query']=$this-> upload_services->get_car_features_info();
	}
}

/* End of file search.php */
/* Location: ./application/controllers/search.php */