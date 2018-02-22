<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Import_model extends MY_Model {
    public function __construct()
        {
            parent::__construct();
            $this->load->model('cpdrc/cpdrc_fw','',TRUE);
        }
    public function saveInmateData(){
        $fields;            /** columns names retrieved after parsing */ 
        $separator = ';';    /** separator used to explode each line */
        $enclosure = '"';    /** enclosure used to decorate each field */
        
        $max_row_size = 4096;    /** maximum row size to be used for decoding */
 
        $file =  fopen($_FILES['file']['tmp_name'], 'r');

        
        $eval = FALSE;
        $ret = null;

        if($file){
            $i  =   1;
            while( ($row = fgetcsv($file, $max_row_size, $separator, $enclosure)) != false ) {            
                if( $row != null ) { // skip empty lines
                    $values =   explode(',',$row[0]);
                    $arrObj['inmate_id']= trim($values[1]);
                    $get=$this->cpdrc_fw->checkinmate($info['inmate_id']);
                 
                    if($get){
                         $eval = TRUE;
                         $ret[]="<b>".trim($values[1]."</b>- ".ucwords(trim($values[3]))." ".ucwords(trim($values[5]))." ".ucwords(trim($values[4])));
                    }
                }
            }   
            fclose($file);  
            $file =  fopen($_FILES['file']['tmp_name'], 'r');
            if(!$eval){
                while( ($row = fgetcsv($file, $max_row_size, $separator, $enclosure)) != false ) {            
                     if( $row != null ) { // skip empty lines
                         $values =   explode(',',$row[0]);
                         // echo"<pre>";
                         // var_dump($values);
                         echo trim($values[1]."<br>");
                         $info['ref_formid'] = null;
                         $info['inmate_id']= trim($values[1]);
                         $info['cell_no']=trim($values[2]);
                         $info['inmate_fname']= ucwords(trim($values[3]));
                         $info['inmate_lname']= ucwords(trim($values[5]));
                         $info['inmate_mi']= ucwords(trim($values[4]));
                         $info['inmate_alias']= ucwords(trim($values[6]));
                         $info['added_by']=$this->session->userdata('user_id');
     
                         $this->db->insert('inmate', $info);
                         $inmateId = $info['inmate_id'];
                         
                         $inmate_info['inmate_id']=$inmateId;
                         $inmate_info['status']=trim($values[7]);
                         $inmate_info['nationality']= ucwords(trim($values[8]));
                         $bday = explode('/',trim($values[9]));
                         $inmate_info['birthdate']=$bday[2]."-".$bday[0]."-".$bday[1];
                         // echo $bday[2]."-".$bday[1]."-".$bday[0];
                         // die();
                         $inmate_info['age']=trim($values[10]);
                         $inmate_info['gender']=trim($values[11]);
                         $inmate_info['born_in']=trim($values[11]);
                         $inmate_info['home_add']=trim($values[14]).', '.trim($values[13]).', '.trim($values[12]);
                         $inmate_info['place'] = trim($values[12]);
                         $inmate_info['province_add']=trim($values[16]);
                         $inmate_info['occupation']=trim($values[17]);
                         $inmate_info['father']=trim($values[18]);
                         $inmate_info['mother']=trim($values[19]);
                         $inmate_info['relative']=trim($values[20]);
                         $inmate_info['relation']=trim($values[21]);
                         $inmate_info['address']=trim($values[24]).', '.trim($values[23]).', '.trim($values[22]);
                         $this->db->insert('inmate_info', $inmate_info);
                         // echo $this->db->last_query();
                         // die();
                         $inmate_build['inmate_id']=$inmateId;
                         $inmate_build['height']=trim($values[25]);
                         $inmate_build['weight']=trim($values[26]);
                         $inmate_build['complexion']=trim($values[28]);
                         $inmate_build['build']=trim($values[27]);
                         $inmate_build['hair']=trim($values[29]);
                         $inmate_build['hair_peculiarities']=trim($values[30]);
     
                         $this->db->insert('inmate_build', $inmate_build);
     
                         $ins = array(
                             'inmate_id' => $inmateId,
                             'added_by' => $this->session->userdata('user_id'),
                             'img_set' => '1' );
                         $this->db->insert('file', $ins);
     
                         $temp['inmate_id'] = $inmateId;
                         $temp['step'] = 3;
                         $this->cpdrc_fw->insert($temp);
                     }
                }
            }
            fclose($file);  
        }
        return $ret;
     }

    public function saveViolationData(){
        $fields;            /** columns names retrieved after parsing */ 
        $separator = ';';    /** separator used to explode each line */
        $enclosure = '"';    /** enclosure used to decorate each field */
        
        $max_row_size = 4096;    /** maximum row size to be used for decoding */
 
        $file =  fopen($_FILES['file']['tmp_name'], 'r');
        
        $eval = FALSE;
        $ret = null;

        if($file){
            $i  =   1;
            while( ($row = fgetcsv($file, $max_row_size, $separator, $enclosure)) != false ) {            
                if( $row != null ) { // skip empty lines
                    $values =   explode(',',$row[0]);
                    $where = array(
                                'name' => trim(trim($values[0])),
                                'status' => 'active'
                            );
                    $this->admin_model->db->query("SET collation_connection = 'utf8_general_ci';");
                    $chkr = $this->admin_model->get('cs_violations',$where,TRUE);
                    if (!empty($chkr)) {
                        $eval = TRUE;
                        $ret[]="<b>".trim($values[0]."</b>");
                    }else{
                        echo "<br>".trim($values[0]."</br>");
                    }
                }
            }   
            fclose($file);  
            $file =  fopen($_FILES['file']['tmp_name'], 'r');
            if(!$eval){
                while( ($row = fgetcsv($file, $max_row_size, $separator, $enclosure)) != false ) {            
                    if( $row != null ) { // skip empty lines
                        $values =   explode(',',$row[0]);
                        $vio_data['violations_category_id'] = '00000000000' ;
                        $vio_data['name'] = trim($values[0]);
                        $vio_data['level'] = 1;
                        $vio_data['min_year'] = 1;
                        $vio_data['min_month'] = 1;
                        $vio_data['min_day'] = 1;
                        $vio_data['max_year'] = 1;
                        $vio_data['max_month'] = 1;
                        $vio_data['max_day'] = 1;
                        $vio_data['created_on'] = now();
                        $vio_data['RepublicAct'] = NULL;
                        $vio_data['description'] = NULL;
                        $save = $this->admin_model->save('cs_violations',$vio_data);
                         //logs
                        $logData = array(
                            'linked_id' => $save,
                            'table_name' => 'cs_violations',
                            'table_field' => 'id',
                            'subject' => 'Add Violaion Information',
                            'reasons' => 'A Violation Information with the name'.$vio_data['name'].' of was added',
                            'update_by' => $this->session->userdata('user_id'),
                            'action' => 'insert',
                            'created_at' => date("Y-m-d h:i:sa"),
                            'status' => 'active'
                        );
                        $this->admin_model->save('cs_logs',$logData);
                    }
                }
            }
            fclose($file);  
        }
        return $ret;

     }

    // public function filterCases(){
    //     $fields;            /** columns names retrieved after parsing */ 
    //     $separator = ';';    /** separator used to explode each line */
    //     $enclosure = '"';    /** enclosure used to decorate each field */

        
    //     $max_row_size = 4096;    /** maximum row size to be used for decoding */
 
    //     $file =  fopen($_FILES['file']['tmp_name'], 'r');
        
    //     $eval = FALSE;
    //     $ret = null;
    //     $data = null;
    //     if($file){
    //         $i  =   1;
    //         while( ($row = fgetcsv($file, $max_row_size, $separator, $enclosure)) != false ) {
    //             if( $row != null ) {
    //                 $data[] = $row[0];
    //             }
    //         }   
            
    //         fclose($file);  
    //         foreach ($data as $d) {
    //          $values =   explode('/',$d);
                
    //             if(count($values) > 1){
    //                 foreach ($values as $key) {
    //                     $ret[]= "<b>".$key."<b>";
    //                 }    
    //             }else{
    //                $ret[]= "<b>".trim($values[0]."<b>");
    //             }
    //         }

    //         for ($i=0; $i <count($ret) ; $i++) { 
    //             $values = explode('-',$ret[$i] );
    //             $l = count($values)- 2;
    //             $r = count($values) - 1;
    //             echo "<br>".trim($values[$l])."||".trim($values[$r]);
    //             echo "<br>";
    //             if(is_numeric(trim($values[$l]) || is_numeric(trim($values[$r]))){
    //                 // echo strlen(trim($values[$l]));
    //                 echo is_numeric($values[$r]);
    //                 echo "<br>";
    //                 $index = strlen(trim($values[$l])-2);
    //                 if(trim($values[$l][$index] == trim($values[$r][0])){
                        
    //                     echo trim($values[$l][strlen(trim($values[$l])-2]."++" .trim($values[$r][0]);
    //                 }
    //             }
    //             echo "<br>";



    //             foreach ($values as $key ) {
    //                 echo $key."||";
    //             }
    //             echo "<br>";
    //             echo "--------------------------------";
    //         }

    //         // foreach ($ret as $key) {
    //         //     echo "<br>".$key;
    //         // }
    //         die();
             
    //     }
    //     return $ret;
    //  }

    public function importInmate(){
        $fields;            /** columns names retrieved after parsing */ 
        $separator = ';';    /** separator used to explode each line */
        $enclosure = '"';    /** enclosure used to decorate each field */
        
        $max_row_size = 4096;    /** maximum row size to be used for decoding */
 
        $file =  fopen($_FILES['file']['tmp_name'], 'r');

        
        $eval = FALSE;
        $ret = null;

        if($file){
            $array = array();

            while( ($row = fgetcsv($file, $max_row_size, $separator, $enclosure)) != false ) {            
                if( $row != null ) { // skip empty lines
                    $values =   explode(',',$row[0]);
                    
                     $arrObj = new stdClass;
                    
                    // INMATE
                     $arrObj->ref_formid = null;
                     $arrObj->inmate_id= trim($values[1]);
                     $arrObj->cell_no=trim($values[2]);
                     $arrObj->inmate_fname= ucwords(trim($values[3]));
                     $arrObj->inmate_lname= ucwords(trim($values[5]));
                     $arrObj->inmate_mi= ucwords(trim($values[4]));
                     $arrObj->inmate_alias= ucwords(trim($values[6]));
                     $arrObj->added_by=$this->session->userdata('user_id');
 
                     $arrObj->status=trim($values[7]);
                     $arrObj->nationality= ucwords(trim($values[8]));
                     $bday = explode('/',$values[9]);
                     $arrObj->birthdate=$bday[2]."-".$bday[0]."-".$bday[1];
                     echo $arrObj->inmate_id."<br>";
                    // INMATE_INFO
                     $arrObj->age=trim($values[10]);
                     $arrObj->gender=trim($values[11]);
                     $arrObj->born_in=trim($values[11]);
                     $arrObj->home_add=trim($values[14]).', '.trim($values[13]).', '.trim($values[12]);
                     $arrObj->place = trim($values[12]);
                     $arrObj->province_add=trim($values[16]);
                     $arrObj->occupation=trim($values[17]);
                     $arrObj->father=trim($values[18]);
                     $arrObj->mother=trim($values[19]);
                     $arrObj->relative=trim($values[20]);
                     $arrObj->relation=trim($values[21]);
                     $arrObj->address=trim($values[24]).', '.trim($values[23]).', '.trim($values[22]);
                    
                     $inmateId = $arrObj->inmate_id;


                    // INMATE_BUILD
                     $arrObj->inmate_id=$inmateId;
                     $arrObj->height=trim($values[25]);
                     $arrObj->weight=trim($values[26]);
                     $arrObj->complexion=trim($values[28]);
                     $arrObj->build=trim($values[27]);
                     $arrObj->hair=trim($values[29]);
                     $arrObj->hair_peculiarities=trim($values[30]);
                        


                    // CS_REASON
                     $arrObj->inmate_id=$inmateId;
                     $arrObj->start_date        = trim($values[32]);

                     $type = trim($values[33]);
                     if ($type == 'Detainee' || $type == 'Pending' ) {
                        $arrObj->date_detained = now();
                    }elseif ($type == 'Probation') {
                        $arrObj->date_probation =now();
                    }elseif ($type == 'Convict') {
                        $arrObj->date_convicted = now();
                    }

                     $arrObj->type              = $type;
                     $arrObj->created_on        = time();
                    // echo $arrObj->type."<br>";
                     // $arrObj->cs_reason_id = ;
                     
                     $v = explode('||', trim($values[34]));
                     $c = explode('||', trim($values[35]));
                     $cnt = explode('||', trim($values[36]));
                     $crtName = explode('||', trim($values[37]));
                     
                     
                     $cases = array();

                     for ($i=0; $i < count($v) ; $i++) { 
                         $arrObj->cs_reason_id = $i;

                         $cs_cases = array();
                         // $cs_cases['date_confinment']=>$this->input->post('confine'),
                         $cs_cases['court_name']=$crtName[$i];
                         $cs_cases['counts'] =$cnt[$i];
                        
                         $cs_cases['case_no']       = trim($c[$i]);
                         $name                      = trim($v[$i]);
                         
                         $violation_info            = $this->admin_model->get('cs_violations',array('name'=>$name),TRUE);
                        
                         $cs_cases['violation_id']   = $violation_info->id;
                         $cs_cases['name'] = $name;
                         $cs_cases['s_min_year']    = $violation_info->min_year;
                         $cs_cases['s_min_month']   = $violation_info->min_month;
                         $cs_cases['s_min_day']     = $violation_info->min_day;
                         $cs_cases['s_max_year']    = $violation_info->max_year;
                         $cs_cases['s_max_month']   = $violation_info->max_month;
                         $cs_cases['s_max_day']     = $violation_info->max_day;
                         $cs_cases['created_on']    = time();

                         $cases[] = $cs_cases;
                     }
                    

                     $arrObj->cases = $cases;


                    $array[] = $arrObj;
                }
            }   
            fclose($file);  
              $chkr = $this->check($array);
            if(!$chkr){
                // die();
                foreach ($array as $key) {
                    $inmate = array("ref_formid " => $key->ref_formid, 
                                    "inmate_id" => $key->inmate_id, 
                                    "cell_no" => $key->cell_no,
                                    "inmate_fname" => $key->inmate_fname, 
                                    "inmate_lname" => $key->inmate_lname, 
                                    "inmate_mi" => $key->inmate_mi, 
                                    "inmate_alias" => $key->inmate_alias, 
                                    "added_by" => $key->added_by,
                                    "inmate_type"=>$key->type
                                );

                    $this->db->insert('inmate', $inmate);
                    
                    $inmate_info = array("inmate_id" => $key->inmate_id ,
                                    "status" => $key->status ,
                                    "nationality" => $key->nationality ,
                                    "birthdate" => $key->birthdate ,
                                    "age" => $key->age ,
                                    "gender" => $key->gender ,
                                    "born_in" => $key->born_in ,
                                    "home_add" => $key->home_add ,
                                    "place" => $key->place ,
                                    "province_add" => $key->province_add ,
                                    "occupation" => $key->occupation ,
                                    "father" => $key->father ,
                                    "mother" => $key->mother ,
                                    "relative" => $key->relative ,
                                    "relation" => $key->relation ,
                                    "address" => $key->address 
                                );

                    $this->db->insert('inmate_info', $inmate_info);

                    $inmate_build = array(
                                    "inmate_id" => $key->inmate_id ,
                                    "height" => $key->height ,
                                    "weight" => $key->weight ,
                                    "complexion" => $key->complexion ,
                                    "build" => $key->build ,
                                    "hair" => $key->hair ,
                                    "hair_peculiarities" => $key->hair_peculiarities
                        );
     
                    $this->db->insert('inmate_build', $inmate_build);

                    $cs_reasons = array("inmate_id" => $key->inmate_id , 
                                    "start_date" => $key->start_date , 
                                    "type" => $key->type , 
                                    "created_on" => $key->created_on
                                );
                    $query = $this->admin_model->save('cs_reasons',$cs_reasons);
                    $cs_reason_id = $this->admin_model->db->insert_id();
                    
                    foreach ($key->cases as $c) {
                        $inmate_case_info = array('inmate_id'=>$key->inmate_id,
                              'case_no'=>$c["case_no"],
                              'crime'=>$c["violation_id"],
                              'court_name'=>$c["court_name"],
                              'counts' => $c["counts"]
                              );
                        $inmate_case_infoID = $this->admin_model->save('inmate_case_info', $inmate_case_info); 
                        
                        //logs
                        $logData = array(
                            'linked_id' => $inmate_case_infoID,
                            'table_name' => 'inmate_case_info',
                            'table_field' => 'id',
                            'subject' => 'Add Case Information',
                            'reasons' => 'A Case Information of "'.$key->inmate_fname.' '.$key->inmate_lname.'" was added',
                            'update_by' => $this->session->userdata('user_id'),
                            'action' => 'insert',
                            'created_at' => date("Y-m-d h:i:sa"),
                            'status' => 'active'
                        );
                        $this->admin_model->save('cs_logs',$logData);

                        $case = array(
                                "reasons_id"=>$cs_reason_id,
                                "case_no" => $c["case_no"],
                                "violation_id" => $c["violation_id"],
                                "s_min_year" => $c["s_min_year"],
                                "s_min_month" => $c["s_min_month"],
                                "s_min_day" => $c["s_min_day"],
                                "s_max_year" => $c["s_max_year"],
                                "s_max_month" => $c["s_max_month"],
                                "s_max_day" => $c["s_max_day"],
                                "created_on" => $c["created_on"]
                            );
                        $cid = $this->admin_model->save('cs_cases', $case); 
 
                        //logs
                        $logData = array(
                                    'linked_id' => $cid,
                                    'table_name' => 'cs_cases',
                                    'table_field' => 'id',
                                    'subject' => 'Add New Case',
                                    'reasons' => 'Case # '.$c["case_no"].' - '.$c["name"].' was added to Inmate ID : '.$key->inmate_id,
                                    'update_by' => $this->session->userdata('user_id'),
                                    'action' => 'insert',
                                    'created_at' => now(),
                                    'status' => 'active'
                                );
                        $this->admin_model->save('cs_logs',$logData);
                    }

                    

                    $max_res = $this->db->query('
                                    SELECT id,violation_id,
                                    IF(s_max_year is not NULL, s_max_year, 0) as s_max_year,
                                    IF(s_max_month is not NULL, s_max_month, 0) as s_max_month,
                                    IF(s_max_day is not NULL, s_max_day, 0) as s_max_day,
                                    MAX(( IF(s_max_year is not NULL, s_max_year * 365, 0) + IF(s_max_month is not NULL, s_max_month * 30, 0) + IF(s_max_day is not NULL, s_max_day, 0) )) as max_penalty
                                    FROM (`cs_cases`)
                                    WHERE `reasons_id` = "'.$cs_reason_id.'" AND status="active" GROUP BY id
                                ')->result();
                    $m_id = 0;
                    $m_pen = 0;
                    $number_of_years = 0;
                    $number_of_months = 0;
                    $number_of_days = 0;
                    foreach ($max_res as $max_r) {
                        if ($max_r->max_penalty > $m_pen) {
                            $m_id = $max_r->violation_id;
                            $m_pen = $max_r->max_penalty;
                            $number_of_years = intval($max_r->s_max_year);
                            $number_of_months = intval($max_r->s_max_month);
                            $number_of_days = intval($max_r->s_max_day);
                        }
                    }
                    $max_penalty = $m_pen;

                    $data = array();
                    $data['created_on'] = now();
                    $data['modified_on'] = 0;

                    if ($key->type == 'Detainee' || $key->type == 'Pending' ) {
                        $s_date = $key->date_detained;
                    }elseif ($key->type == 'Probation') {
                        $s_date = $key->date_probation;
                    }elseif ($key->type == 'Convict') {
                        $s_date = $key->date_convicted;
                    }
                    
                    $rd = strtotime("+$number_of_days days",strtotime("+$number_of_months months",strtotime("+$number_of_years years", strtotime($s_date))));
                    $data['release_date'] = mdate("%Y-%m-%d",$rd);
                    $data['number_of_years'] = $number_of_years;
                    $data['number_of_months'] = $number_of_months;
                    $data['number_of_days'] = $number_of_days;
                    $where = array('inmate_id'=>$key->inmate_id);
                    
                    $this->admin_model->update('cs_reasons',$where,$data);

                    $ins = array(
                         'inmate_id' => $key->inmate_id,
                         'added_by' => $this->session->userdata('user_id'),
                         'img_set' => '1' );
                    $this->db->insert('file', $ins);
 
                    $temp['inmate_id'] = $key->inmate_id;
                    $temp['step'] = 3;
                    $this->cpdrc_fw->insert($temp);
                }
                return $ret;
            }else{
                return $chkr;
            }
              // echo "<pre>";
              // var_dump($array);
              // die();
        }
        return $ret;
    }
    public function check($array){
        $ret = array();

        foreach ($array as $key) {
            $get=$this->cpdrc_fw->checkinmate($key->inmate_id);
            if($get){
                 $ret[]="Inmate number Duplicate <b>".$key->inmate_id."</b>- ".$key->inmate_fname." ".$key->inmate_lname." ".$key->inmate_mi;
            }
            $cses = array();
            foreach ($key->cases as $c) {
                $cses[] = $c['case_no'];
            }
            $res = array_count_values($cses);
            foreach ($res as $k) {
                if($k > 1){
                     $ret[]="Case number Duplicate <b>".$key->inmate_id."</b>- ".$key->inmate_fname." ".$key->inmate_lname." ".$key->inmate_mi;
                }
            }
        }
        return $ret;
    }
}

/* End of file admin_model.php */
/* Location: ./application/models/admin_model.php */?>