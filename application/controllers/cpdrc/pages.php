<?php
session_start();
class Pages extends Admin_Controller
{
      public function __construct()
      {
            parent::__construct();
            $this->load->model('cpdrc/cpdrc_fw','',TRUE);
            $this->load->library('session');
            $this->load->library('form_validation');
      }			

      public function index()
      {	

                  //number of inmates in cpdrc
            $this->db->select('*')->from('inmate')->where('status', 'Active');
            $get=$this->db->get();
            $count=$get->num_rows();                          
                  //number of inmate's cases
            $this->db->select('*')->from('inmate_case_info');
            $get2=$this->db->get();
            $count2=$get2->num_rows();
                  //number of authorized visitors
            $this->db->select('*')->from('inmate_auth_visitor');
            $get3=$this->db->get();
            $count3=$get3->num_rows();

                  //user accounts
            $this->db->select('*')->from('user_account');
            $get4=$this->db->get();
            $count4=$get4->num_rows();

            $value['num']=$count;
            $value['case']=$count2;
            $value['visit']=$count3;
            $value['user']=$count4;

            $result=$this->session->userdata('logged_in');
            if(!empty($result['user_id']))
            {	
                  if($result['type'] == "Warden Administrator")
                  {
                              //deleting the unset img of a inmate in the database
                        $del = array('img_set' => '0',
                              'added_by' => $result['user_id'],
                              'inmate_id' => NULL );
                        $this->db->delete('file', $del);
                              //deleting a unset pic of a user
                        $del2 = array('img_set' => '0',
                              'added_by' => $result['user_id']
                              );
                        $this->db->delete('user_account', $del2);
                              //deleting the unset img of a visitor in the database
                        $del3 = array('img_set' => '0',
                              'added_by' => $result['user_id'],
                              'inmate_id' => NULL );
                        $this->db->delete('inmate_auth_visitor', $del3);


                        $this->data['title']    = 'Profiling Menu';
                        $this->data['css']            = array();
                        $this->data['js_top']   = array();
                        $this->data['header']   = $this->load->view('admin/header_view',$this->data,TRUE);
                        $this->data['body']     = $this->load->view('cpdrc/home',NULL,TRUE);
                        $this->data['footer']   = $this->load->view('footer_view',NULL,TRUE);
                        $this->data['js_bottom']= array();
                        $this->data['custom_js']= '<script type="text/javascript">
                        $(function(){
                              $(function(){
                                    $(".nav-profiling a").addClass("active");
                              });
                        });
                  </script>';
                  $this->load->view('templates',$this->data);



            		     // $this->load->view('cpdrc/home', $value);
            }
            else
            {
                              //deleting the unset img of a inmate in the database
                  $del = array('img_set' => '0',
                        'added_by' => $result['user_id'],
                        'inmate_id' => NULL );
                  $this->db->delete('file', $del);
                              //deleting the unset img of a visitor in the database
                  $del2 = array('img_set' => '0',
                        'added_by' => $result['user_id'],
                        'inmate_id' => NULL );
                  $this->db->delete('inmate_auth_visitor', $del2);

                  $this->data['title']    = 'Manage Inmate';
                  $this->data['css']            = array();
                  $this->data['js_top']   = array();
                  $this->data['header']   = $this->load->view('admin/header_view',$this->data,TRUE);
                  $this->data['body']     = $this->load->view('cpdrc/user_home',$value,TRUE);
                  $this->data['footer']   = $this->load->view('footer_view',NULL,TRUE);
                  $this->data['js_bottom']= array();
                  $this->data['custom_js']= '<script type="text/javascript">
                  $(function(){
                  });
            </script>';
            $this->load->view('templates',$this->data);

                              //$this->load->view('cpdrc/user_home', $value);
            }
      }
      else
      {
          $this->load->view('index');
      }
      }
      public function logout()
      {   
            $result=$this->session->userdata('logged_in');
            $this->cpdrc_fw->logbook('Log out',$result['user_id']);

                        //deleting the unset img of a inmate in the database
            $del = array('img_set' => '0',
                  'added_by' => $result['user_id'],
                  'inmate_id' => NULL );
            $this->db->delete('file', $del); 

                        //deleting a unset pic of a user
            $del2 = array('img_set' => '0',
                  'added_by' => $result['user_id']
                  );
            $this->db->delete('user_account', $del2);

                        //deleting the unset img of a visitor in the database
            $del3 = array('img_set' => '0',
                  'added_by' => $result['user_id'],
                  'inmate_id' => NULL );
            $this->db->delete('inmate_auth_visitor', $del3);

            session_destroy();

            $this->session->sess_destroy();
            $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
            $this->output->set_header("Pragma: no-cache");
            redirect('cpdrc/pages', 'refresh');

      }


     //This is the viewing of each menu in the home//
      public function addinmate()
      {

           $a=$this->session->userdata('logged_in');


           $this->data["cells"] = $this->cpdrc_fw->getAvailableCells();
                        // echo json_encode($this->data["cells"] );
                        // echo $this->db->last_query();

           if(!empty($a['user_id']))
           {
                              //deleting the unset img of a inmate in the database
            $del = array('img_set' => '0',
                  'added_by' => $a['user_id'],
                  'inmate_id' => NULL );
            $this->db->delete('file', $del); 

            $this->data['title']    = 'Manage Inmate';
            $this->data['css']      = array();
            $this->data['js_top']   = array();
            $this->data['header']   = $this->load->view('admin/header_view',$this->data,TRUE);
            $this->data['body']     = $this->load->view('menu/add_inmate',NULL,TRUE);
            $this->data['footer']   = $this->load->view('footer_view',NULL,TRUE);
            $this->data['js_bottom']= array('vendor/jquery/jquery-3.2.1.min.js');
            $this->data['custom_js']= '<script>
            $(document).ready(function() {
                $("#uploadphoto").css("display", "none");
                $("#photo").change(function() {
                    $("#uploadphoto").click();
                    $("#photo").hide();
                });
            });
            </script>';
      $this->load->view('templates',$this->data);                       

                              // $this->load->view('menu/add_inmate');
      }
      else
      {
            $this->data['title']    = 'Manage Inmate';
            $this->data['css']      = array();
            $this->data['js_top']   = array();
            $this->data['header']   = $this->load->view('admin/header_view',$this->data,TRUE);
            $this->data['body']     = $this->load->view('menu/add_inmate',NULL,TRUE);
            $this->data['footer']   = $this->load->view('footer_view',NULL,TRUE);
            $this->data['js_bottom']= array();
            $this->data['custom_js']= '<script type="text/javascript">
            $(function(){
            });
      </script>';
      $this->load->view('templates',$this->data);
      redirect('cpdrc/pages', 'refresh');
      }
      }
      public function manageinmate()
      {
            $a=$this->session->userdata('logged_in');

            if(!empty($a['user_id']))
            {     
                              //Step 4 --update temporary
                  $where = array("inmate_id"=>$this->input->post('inmate_id'));
                  $this->db->delete('temp',$where);
                  
                  $this->db->order_by("addedOn","DESC");
                  $query = $this->db->get_where('editrequest',array('inmateId'=>$this->input->post('inmate_id')));
                  $get = $query->row();
                  if($get){
                        $this->db->where("editRequestID",$get->editRequestID);
                  $this->db->update("editrequest",array("status"=>"finished"));
                  
                  }
                  
                              //this contains the info of all the inmate
                  $data['manage']=$this->cpdrc_fw->manageInmate();
                  $data['allmarks']= $this->cpdrc_fw->allmarks();

                  $this->data['title']    = 'Manage Inmate';
                  $this->data['css']      = array();
                  $this->data['js_top']   = array();
                  $this->data['header']   = $this->load->view('admin/header_view',$this->data,TRUE);
                  $this->data['body']     = $this->load->view('menu/manage_inmate',$data,TRUE);
                  $this->data['footer']   = $this->load->view('footer_view',NULL,TRUE);
                  $this->data['js_bottom']= array();
                  $this->data['custom_js']= '<script type="text/javascript">
                  $(function(){
                  });
            </script>';
            $this->load->view('templates',$this->data);
                              //$this->load->view('menu/manage_inmate', $data);

      }
      else
      {
            redirect('cpdrc/pages', 'refresh');
      }
      }
      public function authvisit()
      {
            $a=$this->session->userdata('logged_in');

            if(!empty($a['user_id']))
            {
                              //deleting the unset img of a visitor in the database
                  $del = array('img_set' => '0',
                        'added_by' => $a['user_id'],
                        'inmate_id' => NULL );
                  $this->db->delete('inmate_auth_visitor', $del);

                  $data['auth']=$this->cpdrc_fw->allVisitor();
                  $data['visit']=$this->cpdrc_fw->manageInmate();

                  $this->data['title']    = 'Manage Inmate';
                  $this->data['css']      = array();
                  $this->data['js_top']   = array('vendor/jquery/jquery-3.2.1.min.js');
                  $this->data['header']   = $this->load->view('admin/header_view',$this->data,TRUE);
                  $this->data['body']     = $this->load->view('menu/auth_visitor',$data,TRUE);
                  $this->data['footer']   = $this->load->view('footer_view',NULL,TRUE);
                  $this->data['js_bottom']= array('');
                  $this->data['custom_js']= '<script>
                    
                  </script>';
                  $this->load->view('templates',$this->data);
                             // $this->load->view('menu/auth_visitor', $data);
      }
      else
      {
            redirect('cpdrc/pages', 'refresh');
      }
      }
      public function records()
      {
            $a=$this->session->userdata('logged_in');

            if(!empty($a['user_id']))
            {
                  $data['record']=$this->cpdrc_fw->manageInmate();

                  $this->data['title']    = 'Manage Inmate';
                  $this->data['css']            = array();
                  $this->data['js_top']   = array();
                  $this->data['header']   = $this->load->view('admin/header_view',$this->data,TRUE);
                  $this->data['body']     = $this->load->view('menu/records',$data,TRUE);
                  $this->data['footer']   = $this->load->view('footer_view',NULL,TRUE);
                  $this->data['js_bottom']= array();
                  $this->data['custom_js']= '<script type="text/javascript">
                  $(function(){
                  });
            </script>';
            $this->load->view('templates',$this->data);  
      }
      else
      {
            redirect('cpdrc/pages', 'refresh');
      }
      }
            public function archives() // for dirst loading only
            {
                  $a=$this->session->userdata('logged_in');
                  
                  if(!empty($a['user_id']))
                  {
                        $data['datapen'] = $this->cpdrc_fw->getPending();
                        $data['transfer'] = $this->cpdrc_fw->getTransfer();
                        $data['released'] = $this->cpdrc_fw->getReleased();
                        
                        $this->data['title']    = 'Manage Inmate';
                        $this->data['css']      = array();
                        $this->data['js_top']   = array();
                        $this->data['header']   = $this->load->view('admin/header_view',$this->data,TRUE);
                        $this->data['body']     = $this->load->view('menu/archives',$data,TRUE);
                        $this->data['footer']   = $this->load->view('footer_view',NULL,TRUE);
                        $this->data['js_bottom']= array();
                        $this->data['custom_js']= '<script type="text/javascript">
                        $(function(){
                        });
                  </script>';
                  $this->load->view('templates',$this->data);
                        //$this->load->view('menu/archives', $data);
            }
            else
            {
                  redirect('cpdrc/pages', 'refresh');
            }
      }
      public function user()
      {
            $a=$this->session->userdata('logged_in');

            if(!empty($a['user_id']))
            {
                        //deleting the unset img of a user in the database
                  $del = array('img_set' => '0',
                        'added_by' => $a['user_id']
                        );
                  $this->db->delete('user_account', $del);

                  $data['user']=$this->cpdrc_fw->userAccnt();

                  $this->data['title']    = 'Manage Inmate';
                  $this->data['css']      = array();
                  $this->data['js_top']   = array();
                  $this->data['header']   = $this->load->view('admin/header_view',$this->data,TRUE);
                  $this->data['body']     = $this->load->view('menu/user_accounts',$data,TRUE);
                  $this->data['footer']   = $this->load->view('footer_view',NULL,TRUE);
                  $this->data['js_bottom']= array();
                  $this->data['custom_js']= '<script type="text/javascript">
                  $(function(){
                  });
            </script>';
            $this->load->view('templates',$this->data);
                        // $this->load->view('menu/user_accounts', $data);
      }
      else
      {
            redirect('cpdrc/pages', 'refresh');
      }
}
            //End of the menu location//
public function settings()
{
      $user=$this->session->userdata('logged_in');

      if(!empty($user['user_id'])){

                  //deleting the unset img of a inmate in the database
            $del = array('img_set' => '0',
                  'added_by' => $user['user_id'],
                  'inmate_id' => NULL );
            $this->db->delete('file', $del); 

                  //deleting a unset pic of a user
            $del2 = array('img_set' => '0',
                  'added_by' => $user['user_id']
                  );
            $this->db->delete('user_account', $del2);

                  //deleting the unset img of a visitor in the database
            $del3 = array('img_set' => '0',
                  'added_by' => $user['user_id'],
                  'inmate_id' => NULL );
            $this->db->delete('inmate_auth_visitor', $del3);


            $id = $user['user_id'];
            $res['user']=$this->cpdrc_fw->getUsers($id);
            $this->load->view('cpdrc/settings', $res);
      }
      else{
            redirect('cpdrc/pages', 'refresh');
      }
}
public function reports()
{
      $user=$this->session->userdata('logged_in');

      if(!empty($user['user_id'])){

                        //deleting the unset img of a inmate in the database
            $del = array('img_set' => '0',
                  'added_by' => $user['user_id'],
                  'inmate_id' => NULL );
            $this->db->delete('file', $del); 

                        //deleting a unset pic of a user
            $del2 = array('img_set' => '0',
                  'added_by' => $user['user_id']
                  );
            $this->db->delete('user_account', $del2);

                        //deleting the unset img of a visitor in the database
            $del3 = array('img_set' => '0',
                  'added_by' => $user['user_id'],
                  'inmate_id' => NULL );
            $this->db->delete('inmate_auth_visitor', $del3);

            $data['all'] = $this->cpdrc_fw->report_all();
            $data['active'] = $this->cpdrc_fw->report_active();
            $data['transfer'] = $this->cpdrc_fw->report_transfer();
            $data['released'] = $this->cpdrc_fw->report_released();
            $data['cases'] = $this->cpdrc_fw->report_cases();
            $data['visitors'] = $this->cpdrc_fw->report_visitors();
            $data['latest'] = $this->cpdrc_fw->report_latestcase();
            $data['prev'] = $this->cpdrc_fw->report_prevcase();
            $data['records'] = $this->cpdrc_fw->report_records();
            $data['marks'] = $this->cpdrc_fw->report_marks();
            $data['users'] = $this->cpdrc_fw->report_users();

            $this->data['title']    = 'Manage Inmate';
            $this->data['css']      = array();
            $this->data['js_top']   = array();
            $this->data['header']   = $this->load->view('admin/header_view',$this->data,TRUE);
            $this->data['body']     = $this->load->view('menu/reports/reports', $data,TRUE);
            $this->data['footer']   = $this->load->view('footer_view',NULL,TRUE);
            $this->data['js_bottom']= array();
            $this->data['custom_js']= '<script type="text/javascript">
            $(function(){
            });
      </script>';
      $this->load->view('templates',$this->data);   

                        // $this->load->view('menu/reports', $data);

}
else{
      redirect('cpdrc/pages', 'refresh');
}

}
public function reportsMonthly()
{
      $user=$this->session->userdata('logged_in');

      if(!empty($user['user_id'])){

            $month = array();
            for($mnth = 1; $mnth < 12 ; $mnth++){
                  $month[] = $this->cpdrc_fw->getReportsMonthly(2017,$mnth);
            }

            $data['all'] = $month;
            $this->data['title']    = 'Manage Inmate';
            $this->data['css']      = array();
            $this->data['js_top']   = array();
            $this->data['header']   = $this->load->view('admin/header_view',$this->data,TRUE);
            $this->data['body']     = $this->load->view('menu/reports/reportsMonthly', $data,TRUE);
            $this->data['footer']   = $this->load->view('footer_view',NULL,TRUE);
            $this->data['js_bottom']= array();
            $this->data['custom_js']= '<script type="text/javascript">
            $(function(){
            });
      </script>';
      $this->load->view('templates',$this->data);   

                        // $this->load->view('menu/reports', $data);

}
else{
      redirect('cpdrc/pages', 'refresh');
}

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

public function reportsDaily()
{
      $user=$this->session->userdata('logged_in');
      
      if(!empty($user['user_id'])){

            if ($this->form_validation->run() != TRUE )
             {
                  if (!empty( $this->input->post('year')) && !empty( $this->input->post('month'))) {
                       $year = $this->input->post('year');
                       $month = $this->input->post('month');     
                  }else{
                        $year =date("Y");
                        $month =date("m");
                  }
            $data['months'] = $this->getHighestMonthOfYear1($year);
            $data['day'] = $this->pol($year,$month);


            }else{
                  $data['day'] = NULL;
            }
      $data['total']= $this->cpdrc_fw->getTotalReportsDaily($year,$month);
      $data['year']=$year;
      $data['month']=$month;
      $this->data['title']    = 'Reports | Daily';
      $this->data['css']      = array();
      $this->data['js_top']   = array();
      $this->data['header']   = $this->load->view('admin/header_view',$this->data,TRUE);
      $this->data['body']     = $this->load->view('menu/reports/reportsDaily', $data,TRUE);
      $this->data['footer']   = $this->load->view('footer_view',NULL,TRUE);
      $this->data['js_bottom']= array();
      $this->data['custom_js']= '<script type="text/javascript">
      $(function(){
            $(".nav-graphical").addClass("active");
            $(".nav-graphical-Daily a").addClass("active");
      });
      </script>';
      $this->load->view('templates',$this->data);   

                              // $this->load->view('menu/reports', $data);

      }
      else{
            redirect('cpdrc/pages', 'refresh');
      }
}

public function reportsMasterList() {
      $user=$this->session->userdata('logged_in');
      $this->load->library('form_validation');
      if(!empty($user['user_id'])){
            if ($this->form_validation->run() != TRUE ) 
            {
                  $gender = $this->input->post('gender');
            }

            if($gender == '')
            {
                  $gender = "both";
            }
            $data['gender'] = $gender;
            $data['master'] = $this->cpdrc_fw->getMasterListByGender($gender);
            $this->data['title']    = 'Masterlist';
            $this->data['css']      = array(
                                    'vendor/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css',
                                    'vendor/colorbox/css/colorbox.css',
                                    'vendor/alertify/css/alertify.core.css',
                                    'vendor/alertify/css/alertify.default.css'
                                    );
            $this->data['js_top']   = array();
            $this->data['header']   = $this->load->view('admin/header_view',$this->data,TRUE);
            $this->data['body']     = $this->load->view('menu/reports/reportsMasterList', $data,TRUE);
            $this->data['footer']   = $this->load->view('footer_view',NULL,TRUE);
            $this->data['js_bottom']= array(
                                    'vendor/datatables/media/js/jquery.dataTables.min.js',
                                    'vendor/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.js',
                                    'vendor/colorbox/js/jquery.colorbox-min.js',
                                    'js/reportsMasterList.js',
                                    'vendor/alertify/js/alertify.js'
                                    );
            $this->data['custom_js']= '

            <script type="text/javascript">
            $(function(){
                  $(".nav-graphical").addClass("active");
                  $(".nav-masterList a").addClass("active");
            });
            </script>';
            $this->load->view('templates',$this->data);   
      }
      else{
            redirect('cpdrc/pages', 'refresh');
      }
}

public function reportsCrimeIndex() {
      $user=$this->session->userdata('logged_in');
      $this->load->library('form_validation');
      if(!empty($user['user_id'])){
            $data['allCrime'] = $this->cpdrc_fw->getAllCrime();

            if ($this->form_validation->run() != TRUE ) {
                  $crime = $this->input->post('crime');
                  $data['id'] = $crime;      
            } 

            
            $data['crimeIndex'] = $this->cpdrc_fw->getCrimeIndex($crime);
            $data['cName'] =  $this->cpdrc_fw->getCrimeName($crime);
            $data['crime'] = $crime;

            $this->data['title']    = 'Table | Violations';
            $this->data['css']      = array(
                                          'vendor/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css',
                                          'vendor/colorbox/css/colorbox.css',
                                          'vendor/alertify/css/alertify.core.css',
                                          'vendor/alertify/css/alertify.default.css'
                                          );
            $this->data['js_top']   = array();
            $this->data['header']   = $this->load->view('admin/header_view',$this->data,TRUE);
            $this->data['body']     = $this->load->view('menu/reports/reportsCrimeIndex', $data,TRUE);
            $this->data['footer']   = $this->load->view('footer_view',NULL,TRUE);
            $this->data['js_bottom']= array(
                                          'vendor/datatables/media/js/jquery.dataTables.min.js',
                                          'vendor/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.js',
                                          'vendor/colorbox/js/jquery.colorbox-min.js',
                                          'js/reportsCrimeIndex.js',
                                          'vendor/alertify/js/alertify.js'
                                          );
            $this->data['custom_js']= '
            

            <script type="text/javascript">
            $(function(){
                  $(".nav-graphical").addClass("active");
                  $(".nav-violations").addClass("active");
                  $(".nav-crimeIndex a").addClass("active");
            });
            
            $(document).ready(function(){
                  var crime = $("#crime").val();
                  if(crime != "")
                  {
                        $("#printCrimexIndex").show();
                  }
                  else
                  {
                        $("#printCrimeIndex").hide();
                  }
            });
            </script>';
            $this->load->view('templates',$this->data);   

                              // $this->load->view('menu/reports', $data);

      }
      else{
            redirect('cpdrc/pages', 'refresh');
      }
}
public function reportsCrimeIndexGeo() {
      $user=$this->session->userdata('logged_in');
      $this->load->library('form_validation');
      if(!empty($user['user_id'])){
            //$data['allCrime'] = $this->cpdrc_fw->getAllCrime();
            $data['place_options'] =  array("Alcantara", "Alcoy", "Alegria", "Aloguinsan", "Argao", "Asturias",
                                            "Badian", "Barili", "Bogo", "Boljoon", "Borbon",
                                            "Carcar", "Carmen", "Catmon", "Cebu City", "Compostela", "Consolacion", "Cordova",
                                            "Daanbantayan", "Dalaguete", "Danao City", "Dumanjug",
                                            "Ginatilan",
                                            "Lapu-Lapu City", "Liloan",
                                            "Madridejos", "Malabuyoc", "Mandaue City", "Medillin", "Minglanilla", "Moalboal",
                                            "Naga",
                                            "Oslob",
                                            "Pilar", "Pinamungahan", "Poro",
                                            "Ronda",
                                            "Samboan", "San Fernando", "San Francisco", "San Remigio", "Santa Fe", "Santander", "Sibonga", "Sogod",
                                            "Tabogon", "Tabuelan", "Talisay City", "Tuburan", "Tudela", "Toledo");

            if ($this->form_validation->run() != TRUE ) 
            {
                  $place = $this->input->post('place');
                  $data['id'] = $place;      
            } 

            
            $data['crimeIndex'] = $this->cpdrc_fw->getCrimeIndexGeo($place);
            // $data['crimeIndexCount'] = $this->cpdrc_fw->getCrimeIndexCount($place);
            // $data['cName'] =  $this->cpdrc_fw->getCrimeName($crime);
            $data['place'] = $place;

            $this->data['title']    = 'Table | Violations';
            $this->data['css']      = array(
                                          'vendor/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css',
                                          'vendor/colorbox/css/colorbox.css',
                                          'vendor/alertify/css/alertify.core.css',
                                          'vendor/alertify/css/alertify.default.css'
                                          );
            $this->data['js_top']   = array();
            $this->data['header']   = $this->load->view('admin/header_view',$this->data,TRUE);
            $this->data['body']     = $this->load->view('menu/reports/reportsCrimeIndexGeo', $data,TRUE);
            $this->data['footer']   = $this->load->view('footer_view',NULL,TRUE);
            $this->data['js_bottom']= array(
                                          'vendor/datatables/media/js/jquery.dataTables.min.js',
                                          'vendor/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.js',
                                          'vendor/colorbox/js/jquery.colorbox-min.js',
                                          'js/reportsCrimeIndex.js',
                                          'vendor/alertify/js/alertify.js'
                                          );
            $this->data['custom_js']= '            

            <script type="text/javascript">
            $(function(){
                  $(".nav-graphical").addClass("active");
                  $(".nav-violations").addClass("active");
                  $(".nav-crimeIndexGeo a").addClass("active");
            });
            
            $(document).ready(function(){
                  var place = $("#place").val();
                  if(place != "")
                  {
                        $("#printCrimexIndex").show();
                  }
                  else
                  {
                        $("#printCrimeIndex").hide();
                  }
            });
            </script>';
            $this->load->view('templates',$this->data);   

                              // $this->load->view('menu/reports', $data);

      }
      else{
            redirect('cpdrc/pages', 'refresh');
      }
}

public function releases()
{
 $this->load->library('form_validation');


 if ($this->form_validation->run() != TRUE )
 {
      if (!empty( $this->input->post('year')) && !empty( $this->input->post('month'))) {
           $year = $this->input->post('year');
           $month = $this->input->post('month');     
     }else{
      $year =date("Y");
      $month =date("m");
}

$data['inmates'] = $this->cpdrc_fw->getReleasesForMonth($year,$month);
}

$data['year']=$year;
$data['month']=$month;
$this->data['title']    = 'Reports | Releases';
$this->data['css']      = array(
                                          'vendor/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css',
                                          'vendor/colorbox/css/colorbox.css',
                                          'vendor/alertify/css/alertify.core.css',
                                          'vendor/alertify/css/alertify.default.css'
                                          );
$this->data['js_top']   = array();
$this->data['header']   = $this->load->view('admin/header_view',$this->data,TRUE);
$this->data['body']     = $this->load->view('menu/reports/releases', $data,TRUE);
$this->data['footer']   = $this->load->view('footer_view',NULL,TRUE);
$this->data['js_bottom']= array(
                                          'vendor/datatables/media/js/jquery.dataTables.min.js',
                                          'vendor/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.js',
                                          'vendor/colorbox/js/jquery.colorbox-min.js',
                                          'js/datatables.js',
                                          'vendor/alertify/js/alertify.js'
                                          );
$this->data['custom_js']= '<script type="text/javascript">
$(function(){
      $(".nav-graphical").addClass("active");
      $(".nav-graphical-releases a").addClass("active");
});
</script>';
$this->load->view('templates',$this->data);   

                        // $this->load->view('menu/reports', $data);   
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
            $served =$a[0]->served;
            $probation =$a[0]->probation;
            $shipped =$a[0]->shipped;
            $bonded =$a[0]->bonded;
            $acquitted =$a[0]->acquitted;
            $dismissed =$a[0]->dismissed;
            $dead =$a[0]->dead;
            $gcta =$a[0]->gcta;
            $others =$a[0]->others;

            $pStrength =  $this->getPrisonStrength($year,$month,$dy);
            if($prisonersReceived == ""){
                  $total = $pStrength  + 0 - $prisonersReleased;

            }else{
                  $total = $pStrength + $prisonersReceived - $prisonersReleased;
            }

            $pStren [] = array("day" =>$dy,
                  "pStrength"=>$pStrength,
                  "prisonersReceived" => $prisonersReceived,
                  "served" => $served,
                  "probation" => $probation,
                  "shipped" => $shipped,
                  "bonded" => $bonded,
                  "acquitted" => $acquitted,
                  "dismissed" => $dismissed,
                  "dead" => $dead,
                  "gcta" => $gcta,
                  "others" => $others,
                  "prisonersReleased" => $prisonersReleased,
                  "total" => $total); 
                               // echo $this->cpdrc_fw->db->last_query();

      }
      return $pStren;
}
public function head($output,$date,$time){
      fputcsv($output, array("","","Republic of the Philippines"));
      fputcsv($output, array("","","Province of Cebu"));
      fputcsv($output, array("","","OFFICE OF THE PROVINCIAL WARDEN"));
      fputcsv($output, array("","","CEBU PROVINCIAL DETENTION & REHABILITATION CENTER"));
      fputcsv($output, array("",""," Kalunasan,Cebu City"));
      fputcsv($output, array("","","Date Created:".$date,"Time Created:".$time));
}

public function printCrimeIndex()
            {
                  $this->load->library('CIpdf');

                  $crime = $this->input->post('crime');
                  
                  $crimeIndex = $this->cpdrc_fw->getCrimeIndex($crime);

                  $pdf = new CIpdf('L','mm','A4');
                  $pdf->AliasNbPages();
                  $pdf->AddPage();
                  // $pdf->Ln(-30);
                  // $pdf->head();

                  $pdf->ViolationName($this->cpdrc_fw->getCrimeName($crime),$crimeIndex);
                  $pdf->Display($crimeIndex );
                  $pdf->Output();
            }
      
      public function printCrimeIndexGeo()
            {
                  $this->load->library('CIGpdf');

                  $place = $this->input->post('place');
                  $data['id'] = $place;      
            
            $data['crimeIndex'] = $this->cpdrc_fw->getCrimeIndexGeo($place);
            // $data['crimeIndexCount'] = $this->cpdrc_fw->getCrimeIndexCount($place);
            // $data['cName'] =  $this->cpdrc_fw->getCrimeName($crime);
            $data['place'] = $place;

                  $pdf = new CIGpdf('L','mm','A4');
                  $pdf->AliasNbPages();
                  $pdf->AddPage();
                  // $pdf->Ln(-30);
                  // $pdf->head();

                  $pdf->Display($data['crimeIndex']);
                  $pdf->Output();
            }


// public function printDaily()
// {
//       $year = $this->input->post('year');
//       $month = $this->input->post('month');
//       $pStren = $this->pol($year,$month);

//       $dateObj   = DateTime::createFromFormat('!m', $month);
//                   $monthName = $dateObj->format('F'); // March
//                   // output headers so that the file is downloaded rather than displayed

//                   header('Content-Type: text/csv; charset=utf-8');
//                   header('Content-Disposition: attachment; filename=Daily'.$monthName.$year.'.csv');

//                   // create a file pointer connected to the output stream
//                   $output = fopen('php://output', 'w');
//                   fprintf($output, chr(0xEF).chr(0xBB).chr(0xBF));
//                   $this->head($output,"July 7, 2017","8:08 am");
//                   // output the column headings
//                   fputcsv($output, array("DAY", "PRISONERS STRENGTH", "PRISONERS RECV'D" ,"SERVED","PROBATION","SHIPPED","BONDED","ACQUITTED","DISMISSED","DEAD","OTHERS","RELEASED", "TOTAL"));

//                   $served=0;
//                   $probation=0;
//                   $shipped=0;
//                   $bonded=0;
//                   $acquitted=0;
//                   $dismissed=0;
//                   $dead=0;
//                   $others=0;
//                   // loop over the rows, outputting them
//                   foreach ($pStren as $x) {
//                         $weew = json_decode(json_encode($x));
                        
//                         if($weew->served != ""){
//                               $served += $weew->served;      
//                         }
//                          if($weew->probation != ""){
//                               $probation += $weew->probation;      
//                         }
//                          if($weew->shipped != ""){
//                               $shipped += $weew->shipped;      
//                         }
//                          if($weew->bonded != ""){
//                               $bonded += $weew->bonded;      
//                         }
//                          if($weew->acquitted != ""){
//                               $acquitted += $weew->acquitted;      
//                         }
//                          if($weew->dismissed != ""){
//                               $dismissed += $weew->dismissed;      
//                         }
//                          if($weew->dead != ""){
//                               $dead += $weew->dead;      
//                         }
//                          if($weew->others != ""){
//                               $others += $weew->others;      
//                         }

//                         fputcsv($output, $x);
//                   }
//                   $weew =json_decode(json_encode($this->cpdrc_fw->getTotalReportsDaily($year,$month)));
//                   $al = array("TOTAL",
//                         "",
//                         $weew[0]->prisonersReceivedWMonth,
//                         $served,
//                         $probation,
//                         $shipped,
//                         $bonded,
//                         $acquitted,
//                         $dismissed,
//                         $dead,
//                         $others,
//                         $weew[1]->prisonersReleasedWMonth,
//                         $x['total']
//                         );
//                   fputcsv($output, $al);
// }
// public function printRelease()
// {
//       $year = $this->input->post('year');
//       $month = $this->input->post('month');
//       $pStren = $this->pol($year,$month);
      
//       $releases = $this->cpdrc_fw->getReleasesForMonth($year,$month);

//       $dateObj   = DateTime::createFromFormat('!m', $month);
//       $monthName = $dateObj->format('F'); // March
//       // output headers so that the file is downloaded rather than displayed
//       header('Content-Type: text/csv; charset=utf-8');
//       header('Content-Disposition: attachment; filename=Release'.$monthName.$year.'.csv');

//       // create a file pointer connected to the output stream
//       $output = fopen('php://output', 'w');
//       $this->head($output,"July 7, 2017","8:08 am");
//       // output the column headings
//       fputcsv($output, array("No.","NAME OF INMATES","CRIME", "CASE NO.","COURT","DATE COMMITTED","PLACE","NATURE OF RELEASE","DATE"));

//       // loop over the rows, outputting them
//       foreach ($releases as $x) {
//             fputcsv($output, $x);
//       }
// }
public function getHighestMonthOfYear()
{
$res = $this->cpdrc_fw->getHighestMonthOfYear($this->input->post('year'));
 $res = json_decode(json_encode($res));
 $ret ='<select name="month" id="months">';
 for($i = 1 ; $i <= $res[0]->month; $i++ ){
      $dateObj   = DateTime::createFromFormat('!m', $i);
      $monthName = $dateObj->format('F'); // March
      $ret.="<option value='".$i."'>".$monthName."</option>";
 }
 $ret .="</select>";
echo $ret;
}

public function getHighestMonthOfYear1($i)
{
$res = $this->cpdrc_fw->getHighestMonthOfYear($i);
 $res = json_decode(json_encode($res));
 $ret ='<select name="month" id="months">';
 for($i = 1 ; $i <= $res[0]->month; $i++ ){
      $dateObj   = DateTime::createFromFormat('!m', $i);
      $monthName = $dateObj->format('F'); // March
      $ret.="<option value='".$i."'>".$monthName."</option>";
 }
 $ret .="</select>";
return $ret;
}
public function municipality()
{
      if ($this->form_validation->run() != TRUE ) 
      {
            $gender = $this->input->post('gender');
      }

      if($gender == '')
      {
            $gender = "both";
      }
      $data['gender'] = $gender;

      $municipalities = array();

      $a = $this->cpdrc_fw->getMunicipalityReport("Alcantara",$gender);
      $municipalities [] = $a;
      $a = $this->cpdrc_fw->getMunicipalityReport("Alcoy",$gender);
      $municipalities [] = $a;
      $a = $this->cpdrc_fw->getMunicipalityReport("Alegria",$gender);
      $municipalities [] = $a;
      $a = $this->cpdrc_fw->getMunicipalityReport("Aloguinsan",$gender);
      $municipalities [] = $a;
      $a = $this->cpdrc_fw->getMunicipalityReport("Argao",$gender);
      $municipalities [] = $a;
      $a = $this->cpdrc_fw->getMunicipalityReport("Asturias",$gender);
      $municipalities [] = $a;
      $a = $this->cpdrc_fw->getMunicipalityReport("Badian",$gender);
      $municipalities [] = $a;
      $a = $this->cpdrc_fw->getMunicipalityReport("Balamban",$gender);
      $municipalities [] = $a;
      $a = $this->cpdrc_fw->getMunicipalityReport("Bantayan",$gender);
      $municipalities [] = $a;
      $a = $this->cpdrc_fw->getMunicipalityReport("Barili",$gender);
      $municipalities [] = $a;
      $a = $this->cpdrc_fw->getMunicipalityReport("Bogo",$gender);
      $municipalities [] = $a;
      $a = $this->cpdrc_fw->getMunicipalityReport("Boljoon",$gender);
      $municipalities [] = $a;
      $a = $this->cpdrc_fw->getMunicipalityReport("Borbon",$gender);
      $municipalities [] = $a;
      $a = $this->cpdrc_fw->getMunicipalityReport("Carcar",$gender);
      $municipalities [] = $a;
      $a = $this->cpdrc_fw->getMunicipalityReport("Carmen",$gender);
      $municipalities [] = $a;
      $a = $this->cpdrc_fw->getMunicipalityReport("Catmon",$gender);
      $municipalities [] = $a;
      $a = $this->cpdrc_fw->getMunicipalityReport("Cebu City",$gender);
      $municipalities [] = $a;
      $a = $this->cpdrc_fw->getMunicipalityReport("Compostela",$gender);
      $municipalities [] = $a;
      $a = $this->cpdrc_fw->getMunicipalityReport("Consolacion",$gender);
      $municipalities [] = $a;
      $a = $this->cpdrc_fw->getMunicipalityReport("Cordova",$gender);
      $municipalities [] = $a;
      $a = $this->cpdrc_fw->getMunicipalityReport("Daanbantayan",$gender);
      $municipalities [] = $a;
      $a = $this->cpdrc_fw->getMunicipalityReport("Dalaguete",$gender);
      $municipalities [] = $a;
      $a = $this->cpdrc_fw->getMunicipalityReport("Danao City",$gender);
      $municipalities [] = $a;
      $a = $this->cpdrc_fw->getMunicipalityReport("Dumanjug",$gender);
      $municipalities [] = $a;
      $a = $this->cpdrc_fw->getMunicipalityReport("Ginatilan",$gender);
      $municipalities [] = $a;
      $a = $this->cpdrc_fw->getMunicipalityReport("Lapu-Lapu City",$gender);
      $municipalities [] = $a;
      $a = $this->cpdrc_fw->getMunicipalityReport("Liloan",$gender);
      $municipalities [] = $a;
      $a = $this->cpdrc_fw->getMunicipalityReport("Madridejos",$gender);
      $municipalities [] = $a;
      $a = $this->cpdrc_fw->getMunicipalityReport("Malabuyoc",$gender);
      $municipalities [] = $a;
      $a = $this->cpdrc_fw->getMunicipalityReport("Mandaue City",$gender);
      $municipalities [] = $a;
      $a = $this->cpdrc_fw->getMunicipalityReport("Medellin",$gender);
      $municipalities [] = $a;
      $a = $this->cpdrc_fw->getMunicipalityReport("Minglanilla",$gender);
      $municipalities [] = $a;
      $a = $this->cpdrc_fw->getMunicipalityReport("Moalboal",$gender);
      $municipalities [] = $a;
      $a = $this->cpdrc_fw->getMunicipalityReport("Naga",$gender);
      $municipalities [] = $a;
      $a = $this->cpdrc_fw->getMunicipalityReport("Oslob",$gender);
      $municipalities [] = $a;
      $a = $this->cpdrc_fw->getMunicipalityReport("Pilar",$gender);
      $municipalities [] = $a;
      $a = $this->cpdrc_fw->getMunicipalityReport("Pinamungahan",$gender);
      $municipalities [] = $a;
      $a = $this->cpdrc_fw->getMunicipalityReport("Poro",$gender);
      $municipalities [] = $a;
      $a = $this->cpdrc_fw->getMunicipalityReport("Ronda",$gender);
      $municipalities [] = $a;
      $a = $this->cpdrc_fw->getMunicipalityReport("Samboan",$gender);
      $municipalities [] = $a;
      $a = $this->cpdrc_fw->getMunicipalityReport("San Fernando",$gender);
      $municipalities [] = $a;
      $a = $this->cpdrc_fw->getMunicipalityReport("San Francisco",$gender);
      $municipalities [] = $a;
      $a = $this->cpdrc_fw->getMunicipalityReport("San Remigio",$gender);
      $municipalities [] = $a;
      $a = $this->cpdrc_fw->getMunicipalityReport("Santa Fe",$gender);
      $municipalities [] = $a;
      $a = $this->cpdrc_fw->getMunicipalityReport("Santander",$gender);
      $municipalities [] = $a;
      $a = $this->cpdrc_fw->getMunicipalityReport("Sibonga",$gender);
      $municipalities [] = $a;
      $a = $this->cpdrc_fw->getMunicipalityReport("Sogod",$gender);
      $municipalities [] = $a;
      $a = $this->cpdrc_fw->getMunicipalityReport("Tabogon",$gender);
      $municipalities [] = $a;
      $a = $this->cpdrc_fw->getMunicipalityReport("Tabuelan",$gender);
      $municipalities [] = $a;
      $a = $this->cpdrc_fw->getMunicipalityReport("Talisay City",$gender);
      $municipalities [] = $a;
      $a = $this->cpdrc_fw->getMunicipalityReport("Tuburan",$gender);
      $municipalities [] = $a;
      $a = $this->cpdrc_fw->getMunicipalityReport("Tudela",$gender);
      $municipalities [] = $a;
      $a = $this->cpdrc_fw->getMunicipalityReport("Toledo",$gender);
      $municipalities [] = $a;
            
            

      $data['municipalities'] = $municipalities;
      $this->data['title']    = 'Manage Inmate';
      $this->data['css']      = array(
                                          'vendor/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css',
                                          'vendor/colorbox/css/colorbox.css',
                                          'vendor/alertify/css/alertify.core.css',
                                          'vendor/alertify/css/alertify.default.css'
                                          );
      $this->data['js_top']   = array();
      $this->data['header']   = $this->load->view('admin/header_view',$this->data,TRUE);
      $this->data['body']     = $this->load->view('menu/reports/municipality', $data,TRUE);
      $this->data['footer']   = $this->load->view('footer_view',NULL,TRUE);
      $this->data['js_bottom']= array(
                                          'vendor/datatables/media/js/jquery.dataTables.min.js',
                                          'vendor/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.js',
                                          'vendor/colorbox/js/jquery.colorbox-min.js',
                                          'js/datatables.js',
                                          'vendor/alertify/js/alertify.js'
                                          );
      $this->data['custom_js']= '<script type="text/javascript">
      $(function(){
            $(".nav-graphical").addClass("active");
            $(".nav-graphical-municipality a").addClass("active");
      });
      </script>';
      $this->load->view('templates',$this->data);   
}
public function crimeIndexTabulated()
{
      $a = $this->cpdrc_fw->getCrimeIndexTabulated();      

      $data['crimes'] = $a;
      $this->data['title']    = 'Crime Index Tabulated';
      $this->data['css']      = array(
                                          'vendor/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css',
                                          'vendor/colorbox/css/colorbox.css',
                                          'vendor/alertify/css/alertify.core.css',
                                          'vendor/alertify/css/alertify.default.css'
                                          );
      $this->data['js_top']   = array();
      $this->data['header']   = $this->load->view('admin/header_view',$this->data,TRUE);
      $this->data['body']     = $this->load->view('menu/reports/crimeIndexTabulated', $data,TRUE);
      $this->data['footer']   = $this->load->view('footer_view',NULL,TRUE);
      $this->data['js_bottom']= array(
                                          'vendor/datatables/media/js/jquery.dataTables.min.js',
                                          'vendor/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.js',
                                          'vendor/colorbox/js/jquery.colorbox-min.js',
                                          'js/datatables.js',
                                          'vendor/alertify/js/alertify.js'
                                          );
      $this->data['custom_js']= '<script type="text/javascript">
      $(function(){
            $(".nav-graphical").addClass("active");
            $(".nav-violations").addClass("active");
            $(".nav-crimeindexTabulated a").addClass("active");
      });
      </script>';
      $this->load->view('templates',$this->data);   
}
// public function printRelease(){
//                   $this->load->library('Rpdf');

//                   $year = $this->input->post('year');
//                   $month = $this->input->post('month');
//                   $pStren = $this->pol($year,$month);
                  
//                   $releases = $this->cpdrc_fw->getReleasesForMonth($year,$month);

//                   $dateObj   = DateTime::createFromFormat('!m', $month);
//                   $monthName = $dateObj->format('F');
//                   //echo json_encode($muni);
//                   // $a = json_decode(json_encode($muni));
//                   // $b =  json_decode(json_encode($a[0]));
//                   // echo $b[0]->place ;
//                   $pdf = new Rpdf('L','mm','A4');;
//                   $pdf->AliasNbPages();
//                   $pdf->AddPage();
//                   $pdf->month($monthName,$year);
//                   $pdf->display($releases);
//                   $pdf->Output();
//             }

            public function printDaily(){
                  $this->load->library('PDpdf');

                  $year = $this->input->post('year');
                  $month = $this->input->post('month');
                  $pStren = $this->pol($year,$month);

                  $dateObj   = DateTime::createFromFormat('!m', $month);
                  $monthName = $dateObj->format('F'); // March
                  
                  $served=0;
                  $probation=0;
                  $shipped=0;
                  $bonded=0;
                  $acquitted=0;
                  $dismissed=0;
                  $dead=0;
                  $others=0;
                  // loop over the rows, outputting them
                  foreach ($pStren as $x) {
                        $weew = json_decode(json_encode($x));
                        
                        if($weew->served != ""){
                              $served += $weew->served;      
                        }
                         if($weew->probation != ""){
                              $probation += $weew->probation;      
                        }
                         if($weew->shipped != ""){
                              $shipped += $weew->shipped;      
                        }
                         if($weew->bonded != ""){
                              $bonded += $weew->bonded;      
                        }
                         if($weew->acquitted != ""){
                              $acquitted += $weew->acquitted;      
                        }
                         if($weew->dismissed != ""){
                              $dismissed += $weew->dismissed;      
                        }
                         if($weew->dead != ""){
                              $dead += $weew->dead;      
                        }
                         if($weew->others != ""){
                              $others += $weew->others;      
                        }
                  }
                  $weew =json_decode(json_encode($this->cpdrc_fw->getTotalReportsDaily($year,$month)));
                  $al = array("TOTAL",
                        "",
                        $weew[0]->prisonersReceivedWMonth,
                        $served,
                        $probation,
                        $shipped,
                        $bonded,
                        $acquitted,
                        $dismissed,
                        $dead,
                        $others,
                        $weew[1]->prisonersReleasedWMonth,
                        $x['total']
                        );

                  $pdf = new PDpdf('L','mm','A4');;
                  $pdf->AliasNbPages();
                  $pdf->AddPage();
                  $pdf->month($monthName,$year);
                  $pdf->body($al,$pStren);
                  $pdf->Output();
            }

            public function printCIT(){
                  $this->load->library('CITpdf');

                  $a = $this->cpdrc_fw->getCrimeIndexTabulated();
                  //echo json_encode($muni);
                  // $a = json_decode(json_encode($muni));
                  // $b =  json_decode(json_encode($a[0]));
                  // echo $b[0]->place ;
                  $pdf = new CITpdf('L','mm','A4');;
                  $pdf->AliasNbPages();
                  $pdf->AddPage();
                  $pdf->SetFont('Times','',12);
                  $pdf->BasicTable($a);
                     
                  $pdf->Output();
            }
      public function getMuniRep($gender){
                  $municipalities = array();

                  $a = $this->cpdrc_fw->getMunicipalityReport("Alcantara",$gender);
                  $municipalities [] = $a;
                  $a = $this->cpdrc_fw->getMunicipalityReport("Alcoy",$gender);
                  $municipalities [] = $a;
                  $a = $this->cpdrc_fw->getMunicipalityReport("Alegria",$gender);
                  $municipalities [] = $a;
                  $a = $this->cpdrc_fw->getMunicipalityReport("Aloguinsan",$gender);
                  $municipalities [] = $a;
                  $a = $this->cpdrc_fw->getMunicipalityReport("Argao",$gender);
                  $municipalities [] = $a;
                  $a = $this->cpdrc_fw->getMunicipalityReport("Asturias",$gender);
                  $municipalities [] = $a;
                  $a = $this->cpdrc_fw->getMunicipalityReport("Badian",$gender);
                  $municipalities [] = $a;
                  $a = $this->cpdrc_fw->getMunicipalityReport("Balamban",$gender);
                  $municipalities [] = $a;
                  $a = $this->cpdrc_fw->getMunicipalityReport("Bantayan",$gender);
                  $municipalities [] = $a;
                  $a = $this->cpdrc_fw->getMunicipalityReport("Barili",$gender);
                  $municipalities [] = $a;
                  $a = $this->cpdrc_fw->getMunicipalityReport("Bogo",$gender);
                  $municipalities [] = $a;
                  $a = $this->cpdrc_fw->getMunicipalityReport("Boljoon",$gender);
                  $municipalities [] = $a;
                  $a = $this->cpdrc_fw->getMunicipalityReport("Borbon",$gender);
                  $municipalities [] = $a;
                  $a = $this->cpdrc_fw->getMunicipalityReport("Carcar",$gender);
                  $municipalities [] = $a;
                  $a = $this->cpdrc_fw->getMunicipalityReport("Carmen",$gender);
                  $municipalities [] = $a;
                  $a = $this->cpdrc_fw->getMunicipalityReport("Catmon",$gender);
                  $municipalities [] = $a;
                  $a = $this->cpdrc_fw->getMunicipalityReport("Cebu City",$gender);
                  $municipalities [] = $a;
                  $a = $this->cpdrc_fw->getMunicipalityReport("Compostela",$gender);
                  $municipalities [] = $a;
                  $a = $this->cpdrc_fw->getMunicipalityReport("Consolacion",$gender);
                  $municipalities [] = $a;
                  $a = $this->cpdrc_fw->getMunicipalityReport("Cordova",$gender);
                  $municipalities [] = $a;
                  $a = $this->cpdrc_fw->getMunicipalityReport("Daanbantayan",$gender);
                  $municipalities [] = $a;
                  $a = $this->cpdrc_fw->getMunicipalityReport("Dalaguete",$gender);
                  $municipalities [] = $a;
                  $a = $this->cpdrc_fw->getMunicipalityReport("Danao City",$gender);
                  $municipalities [] = $a;
                  $a = $this->cpdrc_fw->getMunicipalityReport("Dumanjug",$gender);
                  $municipalities [] = $a;
                  $a = $this->cpdrc_fw->getMunicipalityReport("Ginatilan",$gender);
                  $municipalities [] = $a;
                  $a = $this->cpdrc_fw->getMunicipalityReport("Lapu-Lapu City",$gender);
                  $municipalities [] = $a;
                  $a = $this->cpdrc_fw->getMunicipalityReport("Liloan",$gender);
                  $municipalities [] = $a;
                  $a = $this->cpdrc_fw->getMunicipalityReport("Madridejos",$gender);
                  $municipalities [] = $a;
                  $a = $this->cpdrc_fw->getMunicipalityReport("Malabuyoc",$gender);
                  $municipalities [] = $a;
                  $a = $this->cpdrc_fw->getMunicipalityReport("Mandaue City",$gender);
                  $municipalities [] = $a;
                  $a = $this->cpdrc_fw->getMunicipalityReport("Medellin",$gender);
                  $municipalities [] = $a;
                  $a = $this->cpdrc_fw->getMunicipalityReport("Minglanilla",$gender);
                  $municipalities [] = $a;
                  $a = $this->cpdrc_fw->getMunicipalityReport("Moalboal",$gender);
                  $municipalities [] = $a;
                  $a = $this->cpdrc_fw->getMunicipalityReport("Naga",$gender);
                  $municipalities [] = $a;
                  $a = $this->cpdrc_fw->getMunicipalityReport("Oslob",$gender);
                  $municipalities [] = $a;
                  $a = $this->cpdrc_fw->getMunicipalityReport("Pilar",$gender);
                  $municipalities [] = $a;
                  $a = $this->cpdrc_fw->getMunicipalityReport("Pinamungahan",$gender);
                  $municipalities [] = $a;
                  $a = $this->cpdrc_fw->getMunicipalityReport("Poro",$gender);
                  $municipalities [] = $a;
                  $a = $this->cpdrc_fw->getMunicipalityReport("Ronda",$gender);
                  $municipalities [] = $a;
                  $a = $this->cpdrc_fw->getMunicipalityReport("Samboan",$gender);
                  $municipalities [] = $a;
                  $a = $this->cpdrc_fw->getMunicipalityReport("San Fernando",$gender);
                  $municipalities [] = $a;
                  $a = $this->cpdrc_fw->getMunicipalityReport("San Francisco",$gender);
                  $municipalities [] = $a;
                  $a = $this->cpdrc_fw->getMunicipalityReport("San Remigio",$gender);
                  $municipalities [] = $a;
                  $a = $this->cpdrc_fw->getMunicipalityReport("Santa Fe",$gender);
                  $municipalities [] = $a;
                  $a = $this->cpdrc_fw->getMunicipalityReport("Santander",$gender);
                  $municipalities [] = $a;
                  $a = $this->cpdrc_fw->getMunicipalityReport("Sibonga",$gender);
                  $municipalities [] = $a;
                  $a = $this->cpdrc_fw->getMunicipalityReport("Sogod",$gender);
                  $municipalities [] = $a;
                  $a = $this->cpdrc_fw->getMunicipalityReport("Tabogon",$gender);
                  $municipalities [] = $a;
                  $a = $this->cpdrc_fw->getMunicipalityReport("Tabuelan",$gender);
                  $municipalities [] = $a;
                  $a = $this->cpdrc_fw->getMunicipalityReport("Talisay City",$gender);
                  $municipalities [] = $a;
                  $a = $this->cpdrc_fw->getMunicipalityReport("Tuburan",$gender);
                  $municipalities [] = $a;
                  $a = $this->cpdrc_fw->getMunicipalityReport("Tudela",$gender);
                  $municipalities [] = $a;
                  $a = $this->cpdrc_fw->getMunicipalityReport("Toledo",$gender);
                  $municipalities [] = $a;
                  return $municipalities;
            }
            public function printMunicipality($gender){
                  $this->load->library('GODpdf');

                  $muni = $this->getMuniRep($gender);
                  //echo json_encode($muni);
                  // $a = json_decode(json_encode($muni));
                  // $b =  json_decode(json_encode($a[0]));
                  // echo $b[0]->place ;
                  $pdf = new GODpdf('L','mm','A4');;
                  $pdf->AliasNbPages();
                  $pdf->AddPage();
                  $pdf->SetFont('Times','',12);
                  $pdf->BasicTable($muni);
                     
                  $pdf->Output();
            }

            public function printMasterList($gender){
                  $this->load->library('MLpdf');

                  $data['master'] = $this->cpdrc_fw->getMasterListByGender($gender);
                  
                  $pdf = new MLpdf('L','mm','A4');
                   $pdf->AliasNbPages();
                  $pdf->AddPage();
                  $pdf->SetFont('Times','',12);
                  $pdf->displayTotal($data['master']);
                  $pdf->Display($data['master']);
                  $pdf->Output();
            }

            public function printRelease(){
                  $this->load->library('Rpdf');

                  $year = $this->input->post('year');
                  $month = $this->input->post('month');
                  $pStren = $this->pol($year,$month);
                  
                  $releases = $this->cpdrc_fw->getReleasesForMonth($year,$month);

                  $dateObj   = DateTime::createFromFormat('!m', $month);
                  $monthName = $dateObj->format('F');
                  //echo json_encode($muni);
                  // $a = json_decode(json_encode($muni));
                  // $b =  json_decode(json_encode($a[0]));
                  // echo $b[0]->place ;
                  $pdf = new Rpdf('L','mm','A4');;
                  $pdf->AliasNbPages();
                  $pdf->AddPage();
                  $pdf->month($monthName,$year,$releases);
                  $pdf->display($releases);
                  $pdf->Output();


            }

}
?>
