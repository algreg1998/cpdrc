<?php
session_start();
class Pages extends Admin_Controller
{
      public function __construct()
      {
            parent::__construct();
            $this->load->model('cpdrc/cpdrc_fw','',TRUE);
            $this->load->library('session');
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


                        $this->data['title']    = 'Manage Inmate';
                        $this->data['css']            = array();
                        $this->data['js_top']   = array();
                        $this->data['header']   = $this->load->view('admin/header_view',$this->data,TRUE);
                        $this->data['body']     = $this->load->view('cpdrc/home',NULL,TRUE);
                        $this->data['footer']   = $this->load->view('footer_view',NULL,TRUE);
                        $this->data['js_bottom']= array();
                        $this->data['custom_js']= '<script type="text/javascript">
                        $(function(){
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
            $this->data['js_bottom']= array();
            $this->data['custom_js']= '<script type="text/javascript">
            $(function(){
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
                  $this->data['css']            = array();
                  $this->data['js_top']   = array();
                  $this->data['header']   = $this->load->view('admin/header_view',$this->data,TRUE);
                  $this->data['body']     = $this->load->view('menu/auth_visitor',$data,TRUE);
                  $this->data['footer']   = $this->load->view('footer_view',NULL,TRUE);
                  $this->data['js_bottom']= array();
                  $this->data['custom_js']= '<script type="text/javascript">
                  $(function(){
                  });
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
            $this->load->library('form_validation');
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
            $data['day'] = $this->pol($year,$month);


      }else{
            $data['day'] = NULL;
      }
      $data['total']= $this->cpdrc_fw->getTotalReportsDaily($year,$month);
      $data['year']=$year;
      $data['month']=$month;
      $this->data['title']    = 'Manage Inmate';
      $this->data['css']      = array();
      $this->data['js_top']   = array();
      $this->data['header']   = $this->load->view('admin/header_view',$this->data,TRUE);
      $this->data['body']     = $this->load->view('menu/reports/reportsDaily', $data,TRUE);
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
      $this->data['title']    = 'Manage Inmate';
      $this->data['css']      = array();
      $this->data['js_top']   = array();
      $this->data['header']   = $this->load->view('admin/header_view',$this->data,TRUE);
      $this->data['body']     = $this->load->view('menu/reports/releases', $data,TRUE);
      $this->data['footer']   = $this->load->view('footer_view',NULL,TRUE);
      $this->data['js_bottom']= array();
      $this->data['custom_js']= '<script type="text/javascript">
      $(function(){
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

      public function printDaily(){
            $year = $this->input->post('year');
            $month = $this->input->post('month');
            $pStren = $this->pol($year,$month);

            $dateObj   = DateTime::createFromFormat('!m', $month);
                  $monthName = $dateObj->format('F'); // March
                  
                  
                  

                  header('Content-Type: text/csv; charset=utf-8');
                  header('Content-Disposition: attachment; filename=Daily'.$monthName.$year.'.csv');

                  // create a file pointer connected to the output stream
                  $output = fopen('php://output', 'w');
                  fprintf($output, chr(0xEF).chr(0xBB).chr(0xBF));
                  $this->head($output,"July 7, 2017","8:08 am");
                  // output the column headings
                  fputcsv($output, array("DAY", "PRISONERS STRENGTH", "PRISONERS RECV'D" ,"SERVED","PROBATION","SHIPPED","BONDED","ACQUITTED","DISMISSED","DEAD","OTHERS","RELEASED", "TOTAL"));

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

                        fputcsv($output, $x);
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
                  fputcsv($output, $al);
            }
            public function printRelease(){
                  $year = $this->input->post('year');
                  $month = $this->input->post('month');
                  $pStren = $this->pol($year,$month);
                  
                  $releases = $this->cpdrc_fw->getReleasesForMonth($year,$month);

                  $dateObj   = DateTime::createFromFormat('!m', $month);
                  $monthName = $dateObj->format('F'); // March
                  // output headers so that the file is downloaded rather than displayed
                  header('Content-Type: text/csv; charset=utf-8');
                  header('Content-Disposition: attachment; filename=Release'.$monthName.$year.'.csv');

                  // create a file pointer connected to the output stream
                  $output = fopen('php://output', 'w');
                  $this->head($output,"July 7, 2017","8:08 am");
                  // output the column headings
                  fputcsv($output, array("No.","NAME OF INMATES","CRIME", "CASE NO.","COURT","DATE COMMITTED","PLACE","NATURE OF RELEASE","DATE"));

                  // loop over the rows, outputting them
                  foreach ($releases as $x) {
                        fputcsv($output, $x);
                  }
            }
            public function municipality()
            {
            

                  $data['municipalities'] = $this->getMuniRep();
                  $this->data['title']    = 'Manage Inmate';
                  $this->data['css']      = array();
                  $this->data['js_top']   = array();
                  $this->data['header']   = $this->load->view('admin/header_view',$this->data,TRUE);
                  $this->data['body']     = $this->load->view('menu/reports/municipality', $data,TRUE);
                  $this->data['footer']   = $this->load->view('footer_view',NULL,TRUE);
                  $this->data['js_bottom']= array();
                  $this->data['custom_js']= '<script type="text/javascript">
                  $(function(){
                  });
                  </script>';
                  $this->load->view('templates',$this->data);   
            }
            public function getMuniRep(){
                  $municipalities = array();

                  $a = $this->cpdrc_fw->getMunicipalityReport("Alcantara");
                  $municipalities [] = $a;
                  $a = $this->cpdrc_fw->getMunicipalityReport("Alcoy");
                  $municipalities [] = $a;
                  $a = $this->cpdrc_fw->getMunicipalityReport("Alegria");
                  $municipalities [] = $a;
                  $a = $this->cpdrc_fw->getMunicipalityReport("Aloguinsan");
                  $municipalities [] = $a;
                  $a = $this->cpdrc_fw->getMunicipalityReport("Argao");
                  $municipalities [] = $a;
                  $a = $this->cpdrc_fw->getMunicipalityReport("Asturias");
                  $municipalities [] = $a;
                  $a = $this->cpdrc_fw->getMunicipalityReport("Badian");
                  $municipalities [] = $a;
                  $a = $this->cpdrc_fw->getMunicipalityReport("Balamban");
                  $municipalities [] = $a;
                  $a = $this->cpdrc_fw->getMunicipalityReport("Bantayan");
                  $municipalities [] = $a;
                  $a = $this->cpdrc_fw->getMunicipalityReport("Barili");
                  $municipalities [] = $a;
                  $a = $this->cpdrc_fw->getMunicipalityReport("Bogo");
                  $municipalities [] = $a;
                  $a = $this->cpdrc_fw->getMunicipalityReport("Boljoon");
                  $municipalities [] = $a;
                  $a = $this->cpdrc_fw->getMunicipalityReport("Borbon");
                  $municipalities [] = $a;
                  $a = $this->cpdrc_fw->getMunicipalityReport("Carcar");
                  $municipalities [] = $a;
                  $a = $this->cpdrc_fw->getMunicipalityReport("Carmen");
                  $municipalities [] = $a;
                  $a = $this->cpdrc_fw->getMunicipalityReport("Catmon");
                  $municipalities [] = $a;
                  $a = $this->cpdrc_fw->getMunicipalityReport("Cebu City");
                  $municipalities [] = $a;
                  $a = $this->cpdrc_fw->getMunicipalityReport("Compostela");
                  $municipalities [] = $a;
                  $a = $this->cpdrc_fw->getMunicipalityReport("Consolacion");
                  $municipalities [] = $a;
                  $a = $this->cpdrc_fw->getMunicipalityReport("Cordova");
                  $municipalities [] = $a;
                  $a = $this->cpdrc_fw->getMunicipalityReport("Daanbantayan");
                  $municipalities [] = $a;
                  $a = $this->cpdrc_fw->getMunicipalityReport("Dalaguete");
                  $municipalities [] = $a;
                  $a = $this->cpdrc_fw->getMunicipalityReport("Danao City");
                  $municipalities [] = $a;
                  $a = $this->cpdrc_fw->getMunicipalityReport("Dumanjug");
                  $municipalities [] = $a;
                  $a = $this->cpdrc_fw->getMunicipalityReport("Ginatilan");
                  $municipalities [] = $a;
                  $a = $this->cpdrc_fw->getMunicipalityReport("Lapu-Lapu City");
                  $municipalities [] = $a;
                  $a = $this->cpdrc_fw->getMunicipalityReport("Liloan");
                  $municipalities [] = $a;
                  $a = $this->cpdrc_fw->getMunicipalityReport("Madridejos");
                  $municipalities [] = $a;
                  $a = $this->cpdrc_fw->getMunicipalityReport("Malabuyoc");
                  $municipalities [] = $a;
                  $a = $this->cpdrc_fw->getMunicipalityReport("Mandaue City");
                  $municipalities [] = $a;
                  $a = $this->cpdrc_fw->getMunicipalityReport("Medellin");
                  $municipalities [] = $a;
                  $a = $this->cpdrc_fw->getMunicipalityReport("Minglanilla");
                  $municipalities [] = $a;
                  $a = $this->cpdrc_fw->getMunicipalityReport("Moalboal");
                  $municipalities [] = $a;
                  $a = $this->cpdrc_fw->getMunicipalityReport("Naga");
                  $municipalities [] = $a;
                  $a = $this->cpdrc_fw->getMunicipalityReport("Oslob");
                  $municipalities [] = $a;
                  $a = $this->cpdrc_fw->getMunicipalityReport("Pilar");
                  $municipalities [] = $a;
                  $a = $this->cpdrc_fw->getMunicipalityReport("Pinamungahan");
                  $municipalities [] = $a;
                  $a = $this->cpdrc_fw->getMunicipalityReport("Poro");
                  $municipalities [] = $a;
                  $a = $this->cpdrc_fw->getMunicipalityReport("Ronda");
                  $municipalities [] = $a;
                  $a = $this->cpdrc_fw->getMunicipalityReport("Samboan");
                  $municipalities [] = $a;
                  $a = $this->cpdrc_fw->getMunicipalityReport("San Fernando");
                  $municipalities [] = $a;
                  $a = $this->cpdrc_fw->getMunicipalityReport("San Francisco");
                  $municipalities [] = $a;
                  $a = $this->cpdrc_fw->getMunicipalityReport("San Remigio");
                  $municipalities [] = $a;
                  $a = $this->cpdrc_fw->getMunicipalityReport("Santa Fe");
                  $municipalities [] = $a;
                  $a = $this->cpdrc_fw->getMunicipalityReport("Santander");
                  $municipalities [] = $a;
                  $a = $this->cpdrc_fw->getMunicipalityReport("Sibonga");
                  $municipalities [] = $a;
                  $a = $this->cpdrc_fw->getMunicipalityReport("Sogod");
                  $municipalities [] = $a;
                  $a = $this->cpdrc_fw->getMunicipalityReport("Tabogon");
                  $municipalities [] = $a;
                  $a = $this->cpdrc_fw->getMunicipalityReport("Tabuelan");
                  $municipalities [] = $a;
                  $a = $this->cpdrc_fw->getMunicipalityReport("Talisay City");
                  $municipalities [] = $a;
                  $a = $this->cpdrc_fw->getMunicipalityReport("Tuburan");
                  $municipalities [] = $a;
                  $a = $this->cpdrc_fw->getMunicipalityReport("Tudela");
                  $municipalities [] = $a;
                  $a = $this->cpdrc_fw->getMunicipalityReport("Toledo");
                  $municipalities [] = $a;
                  return $municipalities;
            }
            public function printMunicipality(){
                  $this->load->library('GODpdf');

                  $muni = $this->getMuniRep();
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
            public function crimeIndexTabulated(){
                  $a = $this->cpdrc_fw->getCrimeIndexTabulated();
                  


                  $data['crimes'] = $a;
                  $this->data['title']    = 'Manage Inmate';
                  $this->data['css']      = array();
                  $this->data['js_top']   = array();
                  $this->data['header']   = $this->load->view('admin/header_view',$this->data,TRUE);
                  $this->data['body']     = $this->load->view('menu/reports/crimeIndexTabulated', $data,TRUE);
                  $this->data['footer']   = $this->load->view('footer_view',NULL,TRUE);
                  $this->data['js_bottom']= array();
                  $this->data['custom_js']= '<script type="text/javascript">
                  $(function(){
                  });
                  </script>';
                  $this->load->view('templates',$this->data);   
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

      }
      ?>