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
                    $arrObj['inmate_id']= $values[1];
                    $get=$this->cpdrc_fw->checkinmate($info['inmate_id']);
                 
                    if($get){
                         $eval = TRUE;
                         $ret[]="<b>".$values[1]."</b>- ".ucwords($values[3])." ".ucwords($values[5])." ".ucwords($values[4]);
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
                         echo $values[1]."<br>";
                         $info['ref_formid'] = null;
                         $info['inmate_id']= $values[1];
                         $info['cell_no']=$values[2];
                         $info['inmate_fname']= ucwords($values[3]);
                         $info['inmate_lname']= ucwords($values[5]);
                         $info['inmate_mi']= ucwords($values[4]);
                         $info['inmate_alias']= ucwords($values[6]);
                         $info['added_by']=$this->session->userdata('user_id');
     
                         $this->db->insert('inmate', $info);
                         $inmateId = $info['inmate_id'];
                         
                         $inmate_info['inmate_id']=$inmateId;
                         $inmate_info['status']=$values[7];
                         $inmate_info['nationality']= ucwords($values[8]);
                         $bday = explode('/',$values[9]);
                         $inmate_info['birthdate']=$bday[2]."-".$bday[0]."-".$bday[1];
                         // echo $bday[2]."-".$bday[1]."-".$bday[0];
                         // die();
                         $inmate_info['age']=$values[10];
                         $inmate_info['gender']=$values[11];
                         $inmate_info['born_in']=$values[11];
                         $inmate_info['home_add']=$values[14].', '.$values[13].', '.$values[12];
                         $inmate_info['place'] = $values[12];
                         $inmate_info['province_add']=$values[16];
                         $inmate_info['occupation']=$values[17];
                         $inmate_info['father']=$values[18];
                         $inmate_info['mother']=$values[19];
                         $inmate_info['relative']=$values[20];
                         $inmate_info['relation']=$values[21];
                         $inmate_info['address']=$values[24].', '.$values[23].', '.$values[22];
                         $this->db->insert('inmate_info', $inmate_info);
                         // echo $this->db->last_query();
                         // die();
                         $inmate_build['inmate_id']=$inmateId;
                         $inmate_build['height']=$values[25];
                         $inmate_build['weight']=$values[26];
                         $inmate_build['complexion']=$values[28];
                         $inmate_build['build']=$values[27];
                         $inmate_build['hair']=$values[29];
                         $inmate_build['hair_peculiarities']=$values[30];
     
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
                                'name' => trim($values[0]),
                                'status' => 'active'
                            );
                    $this->admin_model->db->query("SET collation_connection = 'utf8_general_ci';");
                    $chkr = $this->admin_model->get('cs_violations',$where,TRUE);
                    if (!empty($chkr)) {
                        $eval = TRUE;
                        $ret[]="<b>".$values[0]."</b>";
                    }else{
                        echo "<br>".$values[0]."</br>";
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
                        $vio_data['name'] = $values[0];
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

                    }
                }
            }
            fclose($file);  
        }
        return $ret;

     }

    public function filterCases(){
        $fields;            /** columns names retrieved after parsing */ 
        $separator = ';';    /** separator used to explode each line */
        $enclosure = '"';    /** enclosure used to decorate each field */

        
        $max_row_size = 4096;    /** maximum row size to be used for decoding */
 
        $file =  fopen($_FILES['file']['tmp_name'], 'r');
        
        $eval = FALSE;
        $ret = null;
        $data = null;
        if($file){
            $i  =   1;
            while( ($row = fgetcsv($file, $max_row_size, $separator, $enclosure)) != false ) {
                if( $row != null ) {
                    $data[] = $row[0];
                }
            }   
            
            fclose($file);  
            foreach ($data as $d) {
             $values =   explode('/',$d);
                
                if(count($values) > 1){
                    foreach ($values as $key) {
                        $ret[]= "<b>".$key."<b>";
                    }    
                }else{
                   $ret[]= "<b>".$values[0]."<b>";
                }
            }

            for ($i=0; $i <count($ret) ; $i++) { 
                $values = explode('-',$ret[$i] );
                $l = count($values)- 2;
                $r = count($values) - 1;
                echo "<br>".$values[$l]."||".$values[$r];
                echo "<br>";
                if(is_numeric($values[$l]) || is_numeric($values[$r])){
                    // echo strlen($values[$l]);
                    echo is_numeric($values[$r]);
                    echo "<br>";
                    $index = strlen($values[$l])-2;
                    if($values[$l][$index] == $values[$r][0]){
                        
                        echo $values[$l][strlen($values[$l])-2]."++" .$values[$r][0];
                    }
                }
                echo "<br>";



                foreach ($values as $key ) {
                    echo $key."||";
                }
                echo "<br>";
                echo "--------------------------------";
            }

            // foreach ($ret as $key) {
            //     echo "<br>".$key;
            // }
            die();
             
        }
        return $ret;
     }

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
                     $arrObj->inmate_id= $values[1];
                     $arrObj->cell_no=$values[2];
                     $arrObj->inmate_fname= ucwords($values[3]);
                     $arrObj->inmate_lname= ucwords($values[5]);
                     $arrObj->inmate_mi= ucwords($values[4]);
                     $arrObj->inmate_alias= ucwords($values[6]);
                     $arrObj->added_by=$this->session->userdata('user_id');
 
                     $arrObj->status=$values[7];
                     $arrObj->nationality= ucwords($values[8]);
                     $bday = explode('/',$values[9]);
                     $arrObj->birthdate=$bday[2]."-".$bday[0]."-".$bday[1];
                     
                    // INMATE_INFO
                     $arrObj->age=$values[10];
                     $arrObj->gender=$values[11];
                     $arrObj->born_in=$values[11];
                     $arrObj->home_add=$values[14].', '.$values[13].', '.$values[12];
                     $arrObj->place = $values[12];
                     $arrObj->province_add=$values[16];
                     $arrObj->occupation=$values[17];
                     $arrObj->father=$values[18];
                     $arrObj->mother=$values[19];
                     $arrObj->relative=$values[20];
                     $arrObj->relation=$values[21];
                     $arrObj->address=$values[24].', '.$values[23].', '.$values[22];
                     
                     $inmateId = $arrObj->inmate_id;


                    // INMATE_BUILD
                     $arrObj->inmate_id=$inmateId;
                     $arrObj->height=$values[25];
                     $arrObj->weight=$values[26];
                     $arrObj->complexion=$values[28];
                     $arrObj->build=$values[27];
                     $arrObj->hair=$values[29];
                     $arrObj->hair_peculiarities=$values[30];
                        


                    // CS_REASON
                     $arrObj->inmate_id=$inmateId;
                     $arrObj->start_date        = $values[31];
                     $arrObj->type              = $values[32];
                     $arrObj->created_on        = time();
                     
                     // $arrObj->cs_reason_id = ;
                     
                     $v = explode('||', $values[34]);
                     $c = explode('||', $values[35]);

                     
                     
                     $cases = array();

                     for ($i=0; $i < count($v) ; $i++) { 
                         $arrObj->cs_reason_id = $i;

                         $cs_cases = array();
                         $cs_cases['case_no']       = trim($c[$i]);
                         $name                      = trim($v[$i]);
                         // echo $cs_cases['name'] ;
                         $violation_info            = $this->admin_model->get('cs_violations',array('name'=>$name),TRUE);
                        
                         $cs_cases['crime']   = $violation_info->id;

                         $cs_cases['s_min_year']    = $violation_info->min_year;
                         $cs_cases['s_min_month']   = $violation_info->min_month;
                         $cs_cases['s_min_day']     = $violation_info->min_day;
                         $cs_cases['s_max_year']    = $violation_info->max_year;
                         $cs_cases['s_max_month']   = $violation_info->max_month;
                         $cs_cases['s_max_day']     = $violation_info->max_day;
                         $cs_cases['created_on']    = time();

                         $cases[$arrObj->cs_reason_id] = $cs_cases;
                     }
                    

                     $arrObj->cases = $cases;


                    $array[] = $arrObj;
                }
            }   
            fclose($file);  
              $chkr = $this->check($array);
            if(!$chkr){
                foreach ($array as $key) {
                    $inmate = array("ref_formid " => $key->ref_formid, 
                                    "inmate_id" => $key->inmate_id, 
                                    "cell_no" => $key->cell_no,
                                    "inmate_fname" => $key->inmate_fname, 
                                    "inmate_lname" => $key->inmate_lname, 
                                    "inmate_mi" => $key->inmate_mi, 
                                    "inmate_alias" => $key->inmate_alias, 
                                    "added_by" => $key->added_by,
                                    "status" => $key->status,
                                    "nationality" => $key->nationality, 
                                    "birthdate" => $key->birthdate,
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
                    $query = $this->admin_model->insert('cs_reasons',$cs_reasons);
                    $cs_reason_id = $this->admin_model->insert_id();
                    
                    foreach ($key->cases as $c) {
                    
                    }
                    
                }
            }else{
                return $chkr;
            }
              // echo "<pre>";
              // var_dump($array);
              die();
        }
        return $ret;
    }
    public function check($array){
        $ret = array();

        foreach ($array as $key) {
            $data = array("ref_formid " => $key, 
                            "inmate_id" => $key, 
                            "cell_no" => $key,
                            "inmate_fname" => $key, 
                            "inmate_lname" => $key, 
                            "inmate_mi" => $key, 
                            "inmate_alias" => $key, 
                            "added_by" => $key,
                            "status" => $key,
                            "nationality" => $key, 
                            "birthdate" => $key,
                        );
            $get=$this->cpdrc_fw->checkinmate($key->inmate_id);
            


            if($get){
                 $ret[]="Inmate number Duplicate<b>".$key->inmate_id."</b>- ".$key->inmate_fname." ".$key->inmate_lname." ".$key->inmate_mi;
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
            // echo "<pre>";
            // var_dump($res);
        }
        return $ret;
    }
}

/* End of file admin_model.php */
/* Location: ./application/models/admin_model.php */?>