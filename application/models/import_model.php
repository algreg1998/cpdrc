<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Import_model extends MY_Model {
    public function __construct()
        {
            parent::__construct();
            $this->load->model('cpdrc/cpdrc_fw','',TRUE);
        }
    public function saveData(){
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
                    $info['inmate_id']= $values[1];
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

}

/* End of file admin_model.php */
/* Location: ./application/models/admin_model.php */?>