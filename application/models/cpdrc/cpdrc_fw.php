<?php
class cpdrc_fw extends CI_Model
{
//-------------------------------------------------------------------------------//

// 	CEBU PROVINCIAL DETENTION ADN REHABILITATION CENTER INMATE PROF SYSTEM
//	ALL RIGHTS RESERVED 2015 
//  A CAPSTONE PROJECT OF THE UNIVERSITY OF SAN CARLOS

//-------------------------------------------------------------------------------//
        public function __construct()
	 	{
	   		parent::__construct();

	 	}
	 	
	 	public function getCrimeName($id){
	 		$query = $this->db->query("SELECT name
	 									FROM cs_violations as cs
	 									WHERE cs.id = '".$id."'");
	 		foreach ($query->result() as $key) {
	 			
	 			return $key->name;
	 		}
	 		//return $query->result_array();
	 	}
	 	public function getCrimeIndex($crime) {
	 		$query = $this->db->query("SELECT * ,inmate.inmate_id,inmate_lname,inmate_fname,case_no,inmate_info.place as 'place',DATE_FORMAT(inmate.datetime_added, '%d-%b-%y') as da ,cs_appearance_schedules.place as 'casp'
						from inmate , cs_reasons,cs_cases,inmate_info,cs_appearance_schedules
	 			  WHERE cs_reasons.inmate_id = inmate.inmate_id AND
	 			  cs_reasons.id = cs_cases.reasons_id AND
	 			  inmate_info.inmate_id = inmate.inmate_id AND
	 			 cs_appearance_schedules.reason_id =  cs_reasons.id AND
	 				 cs_cases.violation_id = '".$crime."' AND
	 			 	   inmate.status != 'Released'
                      GROUP by inmate.inmate_id ");
	 		//echo $this->db->last_query();
	 		
	 		$ins = array();
	 		foreach ($query->result() as $key) {
	 			$ret = $this->getCrimeCases($key->inmate_id);
	 			//echo json_encode($ret);

				// $ins[] = array(
				// 	'nameOfInmate' => $key->inmate_lname.", ".$key->inmate_fname,
				// 	'crime' => $ret['vio'],
				// 	'case_no' => $ret['case'],
				// 	'court' => $ret['court'],
				// 	'dateCommitted' =>$key->d,
				// 	'place' => $key->place,
				// 	'inmateGender' => "$key->gender"
				// );
				$ins[] = array(
					'nameOfInmate' => $key->inmate_lname.", ".$key->inmate_fname,
					// 'crime' => $key->name,
					'crime' =>  $ret['vio'],
					// 'case_no' => $key->case_no,
					'case_no' => $ret['case'],
					// 'court' =>$key->casp,
					'court' =>$ret['court'],
					'dateCommitted' => $key->da,
					'place' => $key->place,
					'qty' => 1
				);
			}
				
			return $ins;
	 	}
	 	public function getCrimeIndexPrinting($crime) {
	 		$query = $this->db->query("SELECT * ,inmate.inmate_id,inmate_lname,inmate_fname,case_no,inmate_info.place as 'place',DATE_FORMAT(inmate.datetime_added, '%d-%b-%y') as da ,cs_appearance_schedules.place as 'casp'
						from inmate , cs_reasons,cs_cases,inmate_info,cs_appearance_schedules
	 			  WHERE cs_reasons.inmate_id = inmate.inmate_id AND
	 			  cs_reasons.id = cs_cases.reasons_id AND
	 			  inmate_info.inmate_id = inmate.inmate_id AND
	 			 cs_appearance_schedules.reason_id =  cs_reasons.id AND
	 				 cs_cases.violation_id = '".$crime."' AND
	 			 	   inmate.status != 'Released'
                      GROUP by inmate.inmate_id ");
	 		//echo $this->db->last_query();
	 		
	 		$ins = array();
	 		foreach ($query->result() as $key) {
	 			$ret = $this->getCrimeCases1($key->inmate_id);
	 			//echo json_encode($ret);

				// $ins[] = array(
				// 	'nameOfInmate' => $key->inmate_lname.", ".$key->inmate_fname,
				// 	'crime' => $ret['vio'],
				// 	'case_no' => $ret['case'],
				// 	'court' => $ret['court'],
				// 	'dateCommitted' =>$key->d,
				// 	'place' => $key->place,
				// 	'inmateGender' => "$key->gender"
				// );
				$ins[] = array(
					'nameOfInmate' => $key->inmate_lname.", ".$key->inmate_fname,
					// 'crime' => $key->name,
					'crime' =>  $ret['vio'],
					// 'case_no' => $key->case_no,
					'case_no' => $ret['case'],
					// 'court' =>$key->casp,
					'court' =>$ret['court'],
					'dateCommitted' => $key->da,
					'place' => $key->place,
					'qty' => 1
				);
			}
				
			return $ins;
	 	}
	 	public function getCrimeIndexGeo($place) {
	 		// $query = $this->db->query("SELECT * ,inmate.inmate_id,inmate_lname,inmate_fname,case_no,inmate_info.place as 'place',DATE_FORMAT(inmate.datetime_added, '%d-%b-%y') as da ,cs_appearance_schedules.place as 'casp'
	 		// 	from inmate , cs_reasons,cs_cases,inmate_info,cs_appearance_schedules
	 		// 	WHERE cs_reasons.inmate_id = inmate.inmate_id AND
	 		// 	cs_reasons.id = cs_cases.reasons_id AND
	 		// 	inmate_info.inmate_id = inmate.inmate_id AND
	 		// 	cs_appearance_schedules.reason_id =  cs_reasons.id AND
	 		// 	cs_cases.violation_id = '".$crime."' AND
	 		// 	inmate.status != 'Released'
	 		// 	GROUP by inmate.inmate_id ");

	 		$query = $this->db->query("SELECT * ,inmate.inmate_id,inmate_lname,inmate_fname, cs_violations.name as name,case_no,inmate_info.place as 'place',DATE_FORMAT(inmate.datetime_added, '%d-%b-%y') as da ,cs_appearance_schedules.place as 'casp'
	 			FROM inmate,cs_violations , cs_reasons,cs_cases,inmate_info,cs_appearance_schedules
	 			WHERE inmate_info.place = '{$place}' AND 
	 			cs_reasons.inmate_id = inmate.inmate_id AND
	 			cs_reasons.id = cs_cases.reasons_id AND
	 			inmate_info.inmate_id = inmate.inmate_id AND
	 			cs_appearance_schedules.reason_id =  cs_reasons.id AND
	 			inmate.status != 'Released' AND 
	 			cs_violations.id = cs_cases.violation_id
	 			GROUP by inmate.inmate_id ");
	 		//echo $this->db->last_query();
	 		
	 		$ins = array();
	 		$crimeCount = 1;
	 		foreach ($query->result() as $key) {

				$ins[] = array(
					'nameOfInmate' => $key->inmate_lname.", ".$key->inmate_fname,
					'crime' => $key->name,
					'case_no' => $key->case_no,
					'court' =>$key->casp,
					'dateCommitted' => $key->da,
					'place' => $key->place,
					'qty' => 1,
					'crimeCount'=> $crimeCount++
				);
			}
				
			return $ins;
	 	}

	 	public function getMasterListByGender($gender) {
	 		switch($gender)
	 		{
	 			case 'both':
				 			$query = $this->db->query("SELECT *,inmate.inmate_id,IFNull(court_name,'None') as court_name ,DATE_FORMAT(inmate.datetime_added, '%d-%b-%y') as 'd' from inmate
				 				LEFT JOIN inmate_info on inmate.inmate_id = inmate_info.inmate_id
				 				LEFT JOIN cs_reasons on cs_reasons.inmate_id = inmate.inmate_id
				 				LEFT JOIN cs_cases on cs_reasons.id = cs_cases.reasons_id
				 				LEFT JOIN cs_violations on cs_cases.violation_id = cs_violations.id
				 				LEFT JOIN inmate_case_info on inmate_case_info.case_no = cs_cases.case_no
				 				WHERE inmate.status != 'Released' AND inmate.status = 'Active' AND inmate_info.gender IS NOT NULL                	
				 				GROUP by inmate.inmate_id");
			                break;

			    case 'female':
			    			$query = $this->db->query("SELECT *,inmate.inmate_id,IFNull(court_name,'None') as court_name ,DATE_FORMAT(inmate.datetime_added, '%d-%b-%y') as 'd' from inmate
			    				LEFT JOIN inmate_info on inmate.inmate_id = inmate_info.inmate_id
			    				LEFT JOIN cs_reasons on cs_reasons.inmate_id = inmate.inmate_id
			    				LEFT JOIN cs_cases on cs_reasons.id = cs_cases.reasons_id
			    				LEFT JOIN cs_violations on cs_cases.violation_id = cs_violations.id
			    				LEFT JOIN inmate_case_info on inmate_case_info.case_no = cs_cases.case_no
			    				WHERE inmate.status != 'Released' AND inmate.status = 'Active' AND inmate_info.gender = 'Female'                	
			    				GROUP by inmate.inmate_id");
			    			break;

			    case 'male':
			    			$query = $this->db->query("SELECT *,inmate.inmate_id,IFNull(court_name,'None') as court_name ,DATE_FORMAT(inmate.datetime_added, '%d-%b-%y') as 'd' from inmate
			    				LEFT JOIN inmate_info on inmate.inmate_id = inmate_info.inmate_id
			    				LEFT JOIN cs_reasons on cs_reasons.inmate_id = inmate.inmate_id
			    				LEFT JOIN cs_cases on cs_reasons.id = cs_cases.reasons_id
			    				LEFT JOIN cs_violations on cs_cases.violation_id = cs_violations.id
			    				LEFT JOIN inmate_case_info on inmate_case_info.case_no = cs_cases.case_no
			    				WHERE inmate.status != 'Released' AND inmate.status = 'Active' AND inmate_info.gender = 'Male'                	
			    				GROUP by inmate.inmate_id");
			    			break;
	 		}

	 		$ins = array();
	 		foreach ($query->result() as $key) {
	 			//echo $key->inmate_id;
	 			$ret = $this->getCrimeCases($key->inmate_id);
	 			//echo json_encode($ret);

				$ins[] = array(
					'nameOfInmate' => $key->inmate_lname.", ".$key->inmate_fname,
					'crime' => $ret['vio'],
					'case_no' => $ret['case'],
					'cellNumber' =>$key->cell_no,
					'court' => $ret['court'],
					'dateCommitted' =>$key->d,
					'place' => $key->place,
					'inmateGender' => "$key->gender"
				);
			}				
			return $ins;
	 	}
	 	public function getMasterListByGenderPrinting($gender) {
	 		switch($gender)
	 		{
	 			case 'both':
				 			$query = $this->db->query("SELECT *,inmate.inmate_id,IFNull(court_name,'None') as court_name ,DATE_FORMAT(inmate.datetime_added, '%d-%b-%y') as 'd' from inmate
				 				LEFT JOIN inmate_info on inmate.inmate_id = inmate_info.inmate_id
				 				LEFT JOIN cs_reasons on cs_reasons.inmate_id = inmate.inmate_id
				 				LEFT JOIN cs_cases on cs_reasons.id = cs_cases.reasons_id
				 				LEFT JOIN cs_violations on cs_cases.violation_id = cs_violations.id
				 				LEFT JOIN inmate_case_info on inmate_case_info.case_no = cs_cases.case_no
				 				WHERE inmate.status != 'Released' AND inmate.status = 'Active' AND inmate_info.gender IS NOT NULL                	
				 				GROUP by inmate.inmate_id");
			                break;

			    case 'female':
			    			$query = $this->db->query("SELECT *,inmate.inmate_id,IFNull(court_name,'None') as court_name ,DATE_FORMAT(inmate.datetime_added, '%d-%b-%y') as 'd' from inmate
			    				LEFT JOIN inmate_info on inmate.inmate_id = inmate_info.inmate_id
			    				LEFT JOIN cs_reasons on cs_reasons.inmate_id = inmate.inmate_id
			    				LEFT JOIN cs_cases on cs_reasons.id = cs_cases.reasons_id
			    				LEFT JOIN cs_violations on cs_cases.violation_id = cs_violations.id
			    				LEFT JOIN inmate_case_info on inmate_case_info.case_no = cs_cases.case_no
			    				WHERE inmate.status != 'Released' AND inmate.status = 'Active' AND inmate_info.gender = 'Female'                	
			    				GROUP by inmate.inmate_id");
			    			break;

			    case 'male':
			    			$query = $this->db->query("SELECT *,inmate.inmate_id,IFNull(court_name,'None') as court_name ,DATE_FORMAT(inmate.datetime_added, '%d-%b-%y') as 'd' from inmate
			    				LEFT JOIN inmate_info on inmate.inmate_id = inmate_info.inmate_id
			    				LEFT JOIN cs_reasons on cs_reasons.inmate_id = inmate.inmate_id
			    				LEFT JOIN cs_cases on cs_reasons.id = cs_cases.reasons_id
			    				LEFT JOIN cs_violations on cs_cases.violation_id = cs_violations.id
			    				LEFT JOIN inmate_case_info on inmate_case_info.case_no = cs_cases.case_no
			    				WHERE inmate.status != 'Released' AND inmate.status = 'Active' AND inmate_info.gender = 'Male'                	
			    				GROUP by inmate.inmate_id");
			    			break;
	 		}

	 		$ins = array();
	 		foreach ($query->result() as $key) {
	 			//echo $key->inmate_id;
	 			$ret = $this->getCrimeCases1($key->inmate_id);
	 			//echo json_encode($ret);

				$ins[] = array(
					'nameOfInmate' => $key->inmate_lname.", ".$key->inmate_fname,
					'crime' => $ret['vio'],
					'case_no' => $ret['case'],
					'cellNumber' =>$key->cell_no,
					'court' => $ret['court'],
					'dateCommitted' =>$key->d,
					'place' => $key->place,
					'inmateGender' => "$key->gender"
				);
			}				
			return $ins;
	 	}
	 	public function getCrimeCases($id)
	 	{
	 		$query = $this->db->query("SELECT cs_cases.case_no, cs_violations.name ,cas.place 
										from inmate as i, cs_appearance_schedules as cas , inmate_info 
										LEFT JOIN cs_reasons as cr on cr.inmate_id = inmate_info.inmate_id
										LEFT JOIN cs_cases on cr.id = cs_cases.reasons_id
										LEFT JOIN cs_violations on cs_cases.violation_id = cs_violations.id
										WHERE i.status != 'Released' AND
										      cs_violations.id is not null AND
										      cr.id is not null AND
										      i.inmate_id = inmate_info.inmate_id AND
										      cr.inmate_id = i.inmate_id AND
										       i.inmate_id =   '".$id."'
										  GROUP BY cs_cases.id ASC");
	 		$case ="";
	 		$vio ="";
	 		$court ="";
	 		$cnt =1;
	 		
	 		foreach ($query->result() as $key) {
	 			
				if($cnt < count($query->result()) ){
					$case .= $key->case_no." / ";
					$vio .= $key->name." / ";
					$court .= $key->place." / ";
				}else{
					$case .= $key->case_no." ";
					$vio .= $key->name." ";
					$court .= $key->place." ";
				}
				$cnt++;
			}	
			$ins = array(
					'case'=>$case,
					'vio'=>$vio,
					'court'=>$court
				);		
			return $ins;
	 	}
	 	public function getCrimeCases1($id)
	 	{
	 		$query = $this->db->query("SELECT cs_cases.case_no, cs_violations.name ,cas.place 
										from inmate as i, cs_appearance_schedules as cas , inmate_info 
										LEFT JOIN cs_reasons as cr on cr.inmate_id = inmate_info.inmate_id
										LEFT JOIN cs_cases on cr.id = cs_cases.reasons_id
										LEFT JOIN cs_violations on cs_cases.violation_id = cs_violations.id
										WHERE i.status != 'Released' AND
										      cs_violations.id is not null AND
										      cr.id is not null AND
										      i.inmate_id = inmate_info.inmate_id AND
										      cr.inmate_id = i.inmate_id AND
										       i.inmate_id =   '".$id."'
										  GROUP BY cs_cases.id ASC");

	 		
	 		$case ="";
	 		$vio ="";
	 		$court ="";
	 		$cnt =1;
	 		
	 		foreach ($query->result() as $key) {
	 			
				if($cnt < count($query->result()) ){
					$case .= $key->case_no." | ";
					$vio .= $key->name." | ";
					$court .= $key->place." | ";
				}else{
					$case .= $key->case_no." ";
					$vio .= $key->name." ";
					$court .= $key->place." ";
				}
				$cnt++;
			}	
			$ins = array(
					'case'=>$case,
					'vio'=>$vio,
					'court'=>$court
				);		
			return $ins;
	 	}


	 	public function getAllCrime() {
	 		$query = $this->db->query("
	 			SELECT name , id
	 			FROM cs_violations 
	 			WHERE name IS NOT NULL 
	 			GROUP BY name
	 			");

	 		$ins = array();
	 		foreach ($query->result() as $key) {
				$ins[] = array(					
					'crime' => $key->name,
					'id' => $key->id
				);
			}				
			return $ins;
	 	}

	 	public function getCrimeIndexTabulated(){
	 		
	 		$query = $this->db->query("
	 				SELECT name, id
					FROM cs_violations
	 			");

			$ins = array();

				foreach ($query->result() as $key) {
					$ins[] = array(
					'name' => $key->name,
					'count' => $this->getCrimeCount($key->id)
					);
				}
				
			return $ins;
	 	}
	 	public function getCrimeCount($vioId){
	 		
	 		$query = $this->db->query("
	 				SELECT COUNT(i.inmate_id) as count
					FROM cs_cases,cs_reasons  cr ,inmate i
					WHERE cr.id = cs_cases.reasons_id AND
					 i.inmate_id = cr.inmate_id AND
					 cs_cases.violation_id= '".$vioId."' AND
						i.status != 'Released'
	 			");
	 		
				foreach ($query->result() as $key) {
					$ins = array(
					'count' => $key->count
					);
				}

			return $ins['count'];
	 	}
	 	public function getMunicipalityReport($where,$gender){
	 		if($gender != "both"){
	 			$query = $this->db->query("
	 				SELECT IFNULL(place,'') AS place, COUNT(inmate.inmate_id) as count
	 				FROM inmate
	 				LEFT JOIN inmate_info on inmate.inmate_id = inmate_info.inmate_id
	 				WHERE inmate.status != 'Released' AND inmate.status = 'Active' AND 
	 				place = '".$where."' AND inmate_info.gender ='".$gender."'
	 			");
	 		}else{
	 			$query = $this->db->query("
	 				SELECT IFNULL(place,'') AS place, COUNT(inmate.inmate_id) as count
	 				FROM inmate
	 				LEFT JOIN inmate_info on inmate.inmate_id = inmate_info.inmate_id
	 				WHERE inmate.status != 'Released' AND inmate.status = 'Active' AND 
	 				place = '".$where."'
	 			");
	 		}
	 		
	 		$ins = array();

				foreach ($query->result() as $key) {
					if($key->place == ''){
						$place = $where;
					}else{
						$place = $key->place;
					}
					$ins[] = array(
					'place' => $place,
					'count' => $key->count
					);
				}

			return $ins;
	 	}
	 	public function getReportsmonthly($year,$month){
	 		
	 		$query=$this->db->query("
	 			SELECT 	COUNT(inmate.inmate_id) as 'cnt' , MONTHNAME(STR_TO_DATE('".$month."', '%m')) as 'month'
	 			FROM inmate
	 			WHERE month(inmate.datetime_added) = ".$month." AND
	 				  year(inmate.datetime_added) = ".$year." AND
	 				 	inmate.status='Active' AND
	 				  inmate.inmate_id NOT IN (SELECT inmate_released.inmate_id FROM inmate_released )
	 			");
	 		// $inmates=$this->db->q();
	 		$ins = array();

				foreach ($query->result() as $key) {
					$ins[] = array(
					'cnt' => $key->cnt,
					'month' => $key->month
					);
				}

			return $ins;
	 	}
	 	public function getHighestMonthOfYear($year){
	 		

	 		$query=$this->db->query("
	 			SELECT MONTH(datetime_added) as 'month'
				FROM `inmate` 
				WHERE YEAR(datetime_added) = 2017
				ORDER BY `datetime_added` desc 
				LIMIT 1
	 			");
	 		// $inmates=$this->db->q();
	 		$ins = array();

				foreach ($query->result() as $key) {
					$ins[] = array(
					'month' => $key->month
					);
				}

			return $ins;
	 	}
	 	public function getReportsDaily($year,$month,$day){
	 		
	 		$query=$this->db->query("
	 			SELECT 	COUNT(inmate.inmate_id) as 'cnt' , ".$day." as 'day'
	 			FROM inmate
	 			WHERE month(inmate.datetime_added) =".$month." AND
	 				  year(inmate.datetime_added) = ".$year." AND
	 				   day(inmate.datetime_added) = ".$day." AND
	 				   AND inmate.status ='Active' 
	 				  inmate.inmate_id NOT IN (SELECT inmate_released.inmate_id FROM inmate_released ) 
	 			");
	 		// $inmates=$this->db->q();
	 		$ins = array();

				foreach ($query->result() as $key) {
					$ins[] = array(
					'cnt' => $key->cnt,
					'day' => $key->day
					);
				}

			return $ins;
	 	}
	 	public function getReportsDailyPreviousPStren($year,$month,$day){
	 		$query=$this->db->query('
	 			SELECT cast(inmate.datetime_added as DATE) as datetime_added FROM inmate WHERE inmate.status !="Pending"  ORDER by inmate.datetime_added asc LIMIT 1
				');
	 		$a = $query->result();
	 		
	 		$a = json_decode(json_encode($a));
	 		if(isset($a[0])){
	 			if($a[0]->datetime_added != "'.$year.'-'.$month.'-'.$day.'"){
		 			$day -=1;
		 		}
	 		}
	 		if(isset($a[0])){
	 			$query=$this->db->query('
	 			SELECT MONTH(inmate.datetime_added) as "month" , DAY(inmate.datetime_added) "day", YEAR(inmate.datetime_added) "year", COUNT(inmate.inmate_id) "count"
				FROM inmate 
				WHERE ( CAST(inmate.datetime_added AS DATE) BETWEEN ('.$a[0]->datetime_added .') AND "'.$year.'-'.$month.'-'.$day.'") AND inmate.status !="Pending" 
				GROUP by MONTH(inmate.datetime_added) , DAY(inmate.datetime_added), YEAR(inmate.datetime_added) asc
				');
	 		
	 		}else{
	 			$query=$this->db->query('
	 			SELECT MONTH(inmate.datetime_added) as "month" , DAY(inmate.datetime_added) "day", YEAR(inmate.datetime_added) "year", COUNT(inmate.inmate_id) "count"
				FROM inmate 
				WHERE ( CAST(inmate.datetime_added AS DATE) BETWEEN ("'.$year.'-'.$month.'-'.$day.'") AND "'.$year.'-'.$month.'-'.$day.'") AND inmate.status !="Pending"
				GROUP by MONTH(inmate.datetime_added) , DAY(inmate.datetime_added), YEAR(inmate.datetime_added) asc
				');
	 		}
	 		
	 		$ins = array();

				foreach ($query->result() as $key) {
					$ins[] = array(
					'month'=> $key->month,
					'day' => $key->day,
					'year' => $key->year,
					'count' => $key->count
					);
				}

			return $ins;
	 	}
	 	public function getReportsDailyPreviousReleased($year,$month,$day){
	 		$day -=1;
	 		$query=$this->db->query('
	 			SELECT MONTH(inmate_released.date_released) as "month" , DAY(inmate_released.date_released) as "day", YEAR(inmate_released.date_released) "year" , COUNT(inmate_released.date_released) "count"
				FROM inmate_released 
				WHERE (CAST(inmate_released.date_released  AS DATE) BETWEEN (SELECT inmate.datetime_added FROM inmate ORDER by inmate.datetime_added asc LIMIT 1) AND "'.$year.'-'.$month.'-'.$day.'") 
				GROUP by MONTH(inmate_released.date_released) , DAY(inmate_released.date_released), YEAR(inmate_released.date_released) asc
				');
	 		
	 		$ins = array();

				foreach ($query->result() as $key) {
					$ins[] = array(
					'month'=> $key->month,
					'day' => $key->day,
					'year' => $key->year,
					'count' => $key->count
					);
				}

			return $ins;
	 	}
	 	public function getReportsDailyCurrentRecieved($year,$month,$day){
	 		
	 		$query=$this->db->query('
	 			SELECT 	COUNT(inmate.inmate_id) as "prisonersReceived" 
				FROM `inmate` 
				WHERE month(inmate.datetime_added) = '.$month.' AND
						day(inmate.datetime_added) = '.$day.' AND
				        year(inmate.datetime_added)= '.$year.' AND
				        status !="Pending"
				');
	 		
	 		$ins = array();

				foreach ($query->result() as $key) {
					$ins[] = array(
					'prisonersReceived'=> $key->prisonersReceived
					);
				}

			return $ins;
	 	}
	 	public function getReportsDailyCurrentReleased($year,$month,$day){
	 		
	 		$query=$this->db->query('
	 			SELECT COUNT(inmate_released.inmate_id) as "prisonersReleased" ,
	 				   IFNULL(SUM(IF(inmate_released.type_released="SERVED",1,null)),"") as "served",
	 				   IFNULL(SUM(IF(inmate_released.type_released="PROBATION",1,null)),"") as "probation",
	 				   IFNULL(SUM(IF(inmate_released.type_released="SHIPPED",1,null)),"") as "shipped",
	 				   IFNULL(SUM(IF(inmate_released.type_released="BONDED",1,null)),"") as "bonded",
	 				   IFNULL(SUM(IF(inmate_released.type_released="ACQUITTED",1,null)),"") as "acquitted",
	 				   IFNULL(SUM(IF(inmate_released.type_released="DISMISSED",1,null)),"") as "dismissed",
	 				   IFNULL(SUM(IF(inmate_released.type_released="DEAD",1,null)),"") as "dead",
	 				   IFNULL(SUM(IF(inmate_released.type_released="GCTA",1,null)),"") as "gcta",
	 				   IFNULL(SUM(IF(inmate_released.type_released="OTHERS",1,null)),"") as "others"
				FROM `inmate_released` 
				WHERE month(inmate_released.date_released) = '.$month.' AND
						day(inmate_released.date_released) = '.$day.' AND
				         year(inmate_released.date_released)='.$year.'
				');
	 		
	 		$ins = array();

				foreach ($query->result() as $key) {
					$ins[] = array(
					'prisonersReleased'=> $key->prisonersReleased,
					'served'=>  $key->served,
					'probation'=>  $key->probation,
					'shipped'=>  $key->shipped,
					'bonded'=>  $key->bonded,
					'acquitted'=>  $key->acquitted,
					'dismissed'=>  $key->dismissed,
					'dead'=>  $key->dead,
					'gcta'=>  $key->gcta,
					'others'=>  $key->others
					);
				}

			return $ins;
	 	}
	 	public function getTotalReportsDaily($year,$month){
	 		$rec=$this->db->query('
	 			SELECT COUNT(inmate.inmate_id) as cnt
				FROM inmate
				WHERE MONTH(inmate.datetime_added) = '.$month.' AND
					  YEAR(inmate.datetime_added) = '.$year.'  AND
					  inmate.status != "Pending"
				');
	 		
	 		$ins = array();

				foreach ($rec->result() as $key) {
					$ins[] = array(
					'prisonersReceivedWMonth'=> $key->cnt
					);
				}
			$rec=$this->db->query('
	 			SELECT COUNT(inmate_released.inmate_id) as cnt
				FROM inmate_released
				WHERE MONTH(inmate_released.date_released) = '.$month.' AND
					  YEAR(inmate_released.date_released) = '.$year.' 

				');
	 	

				foreach ($rec->result() as $key) {
					$ins[] = array(
					'prisonersReleasedWMonth'=> $key->cnt
					);
				}

			return $ins;
	 	}
	 	
	 	public function getHighestDayOfMonth($year,$month){
	 		
	 		// $query=$this->db->query('
	 		// 	SELECT day(inmate.datetime_added) as "day"
				// FROM inmate 
				// WHERE month(inmate.datetime_added) = '.$month.' AND 
				// 	  year(inmate.datetime_added)  = '.$year.'
				// ORDER BY inmate.datetime_added DESC
				// LIMIT 1
				// ');
	 		
	 		$ins = array();

	 	// 	$a = $query->result();	 		
	 	// 	if(count($a)==1){
			// 	foreach ($query->result() as $key) {
			// 		$ins[] = array(
			// 		'day'=> $key->day
			// 		);
			// 	}
			// }else if(count($a)==0){

			// 	$ins[] = array(
			// 		'day'=> cal_days_in_month(CAL_GREGORIAN,$month,$year)
			// 		);
			// }

			$ins[] = array(
					'day'=> cal_days_in_month(CAL_GREGORIAN,$month,$year)
					);

			return $ins;
	 	}
	 	public function getReleasesForMonth($year,$month){
	 		
	 		$query=$this->db->query('
		 			SELECT ir.inmate_id as "inmateId", concat(i.inmate_fname,i.inmate_lname) as "inmateName" , DATE_FORMAT(i.datetime_added, "%d-%b-%y") AS "doc", ii.place as "place",ir.released_info as "natureOfRel", DATE_FORMAT(ir.date_released, "%d-%b-%y") as "dateRel"
					FROM cs_reasons as cr
					LEFT JOIN inmate as i
						ON cr.inmate_id = i.inmate_id
					LEFT JOIN inmate_info as ii 
						ON cr.inmate_id= ii.inmate_id
					LEFT JOIN inmate_released as ir
						ON ir.inmate_id = cr.inmate_id
					WHERE ir.inmate_id IS NOT NULL AND
						  MONTH(ir.date_released) = '.$month.' AND
					      YEAR(ir.date_released) = '.$year.'
					GROUP BY ir.inmate_id
					ORDER BY ir.date_released ASC
				');
	 		
	 		$ins = array();

				foreach ($query->result() as $key) {
					$a=$this->getCasesOf($key->inmateId);
					$ins[] = array(
					'inmateId'=> $key->inmateId,
					'inmateName'=> $key->inmateName,
					'crime'=> $a['crime'],
					'case'=> $a['case'],
					'court'=> $a['court'],
					'doc'=> $key->doc,
					'place'=> $key->place,
					'natureOfRel'=> $key->natureOfRel,
					'dateRel'=> $key->dateRel
					);

				}

			return $ins;
	 	}
	 	public function getCasesOf($inmateid)
	 	{
	 		$query=$this->db->query('
		 			SELECT CONCAT(i.inmate_fname," ",i.inmate_lname) , ccf.name as "crime", ccf.case_no as "cases", cas.place as "place"
					FROM cs_cases as cc
					LEFT JOIN cs_cases_full as ccf
						ON cc.id = ccf.case_id
					LEFT JOIN cs_reasons as cr 
						ON cc.reasons_id = cr.id
					LEFT JOIN inmate as i
						ON i.inmate_id = cr.inmate_id
					LEFT JOIN cs_appearance_schedules as cas 
                       		ON cas.reason_id = cr.id
					WHERE cr.inmate_id = '.$inmateid.'
				');
	 		
	 		$crime ='';
	 		$cases ='';
	 		$court ='';
	 		$cnt = 1;
				foreach ($query->result() as $key) {
					if($cnt < count($query->result()) ){
						$crime.=$key->crime.' / ';
						$cases.=$key->cases.' / ';
						$court.=$key->place.' / ';
					}else{
						$crime.=$key->crime.' ';
						$cases.=$key->cases.' ';
						$court.=$key->place.' ';
					}
					$cnt++;
					
				}
			

			$a = array("crime"=>$crime,"case"=>$cases,"court"=>$court);
			return $a;
	 	}
	 	

	 	public function getAvailableCells(){
	 		$this->db->select('cellId,cellNumber,capacity,Count(inmate.inmate_id) as total');
	 		$this->db->from('cell');
	 		$this->db->where('cell.status = "Active"');
	 	$this->db->join('inmate',"inmate.cell_no = cell.cellId","left");
	 	$this->db->group_by('cell.cellId');

	 	
	 		$count=$this->db->get();
	 		$case = array();

				foreach ($count->result() as $key) {
					
					$case[] = array(
						'cellId' => $key->cellId,
						'cellNumber' => $key->cellNumber,
						'cellCap' => $key->capacity,
						'total' =>$key->total
					);
				
				}
				return $case;
	 	}

	 	/****************TEMPORARY*****/
	 	public function insert($data){
	 		return $this->db->insert('temp',$data);
	 	}
	 	public function update($id,$affectedfields){
	 		return $this->db->update('temp',$affectedfields,array('inmate_id'=>$id));
	 	}
	 	public function updateinmateStatus($id,$affectedfields){
	 		return $this->db->update('inmate',$affectedfields,array('inmate_id'=>$id));
	 	}
	 	public function updatecsReasonStatus($id,$affectedfields){
	 		return $this->db->update('cs_reasons',$affectedfields,array('inmate_id'=>$id));
	 	}
	 	public function login($username, $password, $agent)
	 	{
	 		$this->db->select('*');
	 		$this->db->from('user_account');
	 		$this->db->where('username', $username);
	 		$this->db->where('password', $password);
	 		$this->db->where('status', 'Active');
	 		$query = $this->db-> get();

	 		if($query->num_rows()==1)
	 		{
                foreach($query->result() as $row)
                {
                    $sess_array = array(
                      'username' => $row->username,
                      'password' => $row->password,
                      'fname' => $row->user_fname,
                      'lname' => $row->user_lname,
                      'type' => $row->type,
                      'user_id' =>$row->user_id
                    );
                }
      			$actor=$sess_array['user_id']; 
      			$this->logbook_signin("Log in", $actor,$agent);
                return $sess_array;
	 		}
	 		else
	 		{
	 			return false;
	 		}
	 	}

        public function logbook($action,$actor)
        { 
            $data = array('action' => $action,'actor' =>$actor);  
            $this->db->insert('logs', $data);
        }

        public function logbook_signin($action,$actor,$agent)
        {
            $data = array('action' => $action,'actor' =>$actor,'agent'=>$agent);  
            $this->db->insert('logs', $data);
        }

	 	public function checkinmate($user_id)
	 	{
	 		$this->db->select('*');
	 		$this->db->from('inmate');
	 		$this->db->where('inmate_id', $user_id);
	 		$xmp=$this->db->get();

	 		if($xmp->num_rows() == 1)
	 		{
	 			return TRUE;
	 		}
	 		else
	 		{
	 			return FALSE;
	 		}
	 	}
	 	public function checkformid($form)
	 	{
	 		$this->db->select('*')->from('inmate')->where('ref_formid', $form);
	 		$data = $this->db->get();
	 		
	 		if($data->num_rows() == 1){
	 			return TRUE;
	 		}
	 		else{
	 			return FALSE;
	 		}
	 	}
	 	public function checkmunicipality($municipality)
	 	{
	 		$this->db->select('*');
	 		$this->db->from('municipality');
	 		$this->db->where('mun_name', $municipality);
	 		$xmp=$this->db->get();

	 		if($xmp->num_rows() == 1)
	 		{
	 			return TRUE;
	 		}
	 		else
	 		{
	 			return FALSE;
	 		}
	 	}
	 	public function checkcaseinfo($e)
	 	{
	 		/* Original
	 		$arr = array('inmate_id' => $e['inmate_id'],
	 					 'case_no' => $e['case_no'],
	 					 'court_name' => $e['court_name'],
	 					 'date_confinment' => $e['date_confinment'],
	 					 'crime' => $e['crime'],
	 					 'sentence' => $e['sentence'],
	 					 'commencing' => $e['commencing'],
	 					 'expire_good' => $e['expire_good'],
	 					 'expire_bad' => $e['expire_bad'] );
			*/
	 		/* Original query
			$arr = array(
				'inmate_id' => $e['inmate_id'],
				'case_no' => $e['case_no']
			);
	 		$this->db->select('*')->from('cs_reasons')->like($arr);
	 		$data = $this->db->get();*/

	 		$data = $this->db->query('
	 			SELECT cs_reasons.inmate_id,cs_cases.case_no FROM cs_reasons
				INNER JOIN cs_cases
				ON cs_reasons.id = cs_cases.reasons_id
				WHERE cs_reasons.`inmate_id` LIKE \'%'.$e['inmate_id'].'%\'
				AND cs_cases.case_no LIKE \'%'.$e['case_no'].'%\'');

	 		$result = 0;
	 		if($data->num_rows() == 1){
	 			$result = 1;
	 		}

	 		 //echo  $this->db->last_query();
	 		return $result;
	 	}
	 	public function updateinmate($a, $b, $c, $d, $dbid)
	 	{
	
	 			$this->db->where('inmate_id', $dbid);
	 			$this->db->update('inmate', $a);

	 			$this->db->where('inmate_id', $b['inmate_id']);
	 			$this->db->update('inmate_info', $b);

	 			$this->db->where('inmate_id', $c['inmate_id']);
	 			$this->db->update('inmate_build', $c);

	 			$this->db->where('inmate_id', $d['inmate_id']);
	 			$this->db->where('cid', $d['cid']);
	 			$this->db->update('inmate_case_info', $d);
	 			//DONE JAN 16 11:20PM mk
	 		 
	 	}
	 	//-------------------------------------------
	 	//VIEWING OF THE INMATE INFO BASICALLY
	 	//-------------------------------------------
	 	public function myinmate($id)
	 	{
	 		$this->db->select('*')->from('inmate')->join('file', 'inmate.inmate_id=file.inmate_id')->join('user_account', 'user_account.user_id=inmate.added_by')->where('inmate.inmate_id', $id);
	 		$res = $this->db->get();

	 			foreach ($res->result() as $key) {
	 				$rec[] = array(
	 							'id' => $key->inmate_id,
	 							'cell' => $key->cell_no,
	 							'fname' => $key->inmate_fname,
	 							'lname' => $key->inmate_lname,
	 							'mi' => $key->inmate_mi,
	 							'alias' => $key->inmate_alias,
	 							'status' => $key->status,
	 							'filename' => $key->filename,

	 							'user_lname' => $key->user_lname,
	 							'user_fname' => $key->user_fname,
	 							'user_mi' => $key->user_mi
	 							 );
	 			}
	 			return $rec;

	 	}
	 	public function getFilename($user_id)
	 	{
	 		$this->db->select('*')->from('file')->where('inmate_id', $user_id);
			$var= $this->db->get();
			foreach ($var->result() as $key) {
				$res = $key->filename;
			}
			return $res;
	 	}
	 	public function inmateinfo($id)
	 	{
	 		//query
	 		$this->db->select('*');
	 		$this->db->from('inmate');
	 		$this->db->join('file', 'inmate.inmate_id=file.inmate_id');
	 		$this->db->join('user_account', 'inmate.added_by=user_account.user_id');
	 		//$this->db->join('inmate_case_info', 'inmate.inmate_id=inmate_case_info.inmate_id');
	 		$this->db->join('inmate_build', 'inmate.inmate_id=inmate_build.inmate_id');
	 		$this->db->join('inmate_info', 'inmate.inmate_id=inmate_info.inmate_id');
	 		$this->db->where('inmate.inmate_id', $id);
	 		//$this->db->where('inmate.status', 'Active');

	 		$get = $this->db->get();
	 		$res=array();

	 		foreach ($get->result() as $key) 
	 		{
	 			$res[] = array(
	 				'formid' => $key->ref_formid,
		 			'id' => $key->inmate_id,
		 			'cell' =>$key->cell_no,
		 			'fname' => $key->inmate_fname,
		 			'lname' => $key->inmate_lname,
		 			'mi' => $key->inmate_mi, 
		 			'alias' => $key->inmate_alias,
		 			'status' => $key->status,
		 			'date_added' =>$key->datetime_added,
		 			'user_fname' => $key->user_fname,
		 			'user_lname' => $key->user_lname,
		 			'user_mi' => $key->user_mi,
		 			
		 			'height' => $key->height,
		 			'weight' => $key->weight,
		 			'complexion' => $key->complexion,
		 			'build' => $key->build,
		 			'hair' => $key->hair,
		 			'hairp' => $key->hair_peculiarities,
		 			
		 			'nationality' => $key->nationality,
		 			'status' => $key->status,
		 			'bday' => $key->birthdate,
		 			'age' => $key->age,
		 			'gender' => $key->gender,
		 			'born' => $key->born_in,
		 			'home' => $key->home_add,
		 			'province' => $key->province_add,
		 			'occupation' => $key->occupation,
		 			'father' => $key->father,
		 			'mother' => $key->mother,
		 			'relative' => $key->relative,
		 			'relation' => $key->relation,
		 			'contactpersonnum' => $key->contactpersonnum,
		 			'address' => $key->address,

		 			'filename' =>$key->filename
	 				); 
				return $res;
	 		}
	 		
	 	} 	
	 	//for the table in manage inmate view
	 	//autho. visitors for the inmate also
	 	public function manageInmate()
	 	{
	    	$this->db->select('*');
	    	$this->db->from('inmate');
	    	$this->db->where('status', 'Active');
	    	$cnt=$this->db->get();
	    	$result=array();

	    	foreach ($cnt->result() as $key) {
	    	 	$result[] = array('id' => $key->inmate_id,
	    	 					'fname' => $key->inmate_fname,
	    	 					'lname' => $key->inmate_lname,
	    	 					'mi' => $key->inmate_mi,
	    	 					'alias' => $key->inmate_alias
	    	 	);			
	    	 }

	    	 return $result; 		
	 	}
	 	//for editing the case info
	 	public function editingcase($id)
	 	{
	 		$this->db->select('*')->from('inmate_case_info')->where('cid', $id)->limit(1);
	 		$get=$this->db->get();

			foreach ($get->result() as $key) {
						$arr = array(
							'cid' => $key->cid,
							'id' => $key->inmate_id,
			 				'case_no' => $key->case_no,
				 			'court' => $key->court_name,
				 			'confine' => $key->date_confinment,
				 			'crime' => $key->crime,
				 			'sentence' => $key->sentence,
				 			'commencing' => $key->commencing,
				 			'expireg' => $key->expire_good,
				 			'expireb' => $key->expire_bad
						);	
			}
			return $arr;	 		
	 	}
	 	//getting the case info
	 	public function getcaseinfo($id)
	 	{

	 		$this->db->select('*')->from('inmate_case_info')->where('inmate_id', $id)->where('case_status', '0');
	 		$count=$this->db->get();
	 		$case = array();

				foreach ($count->result() as $key) {
					$ret = $this->getCrimeCases($key->inmate_id);
	 			//echo json_encode($ret);
					// 'crime' => $ret['vio'],
					// 'case_no' => $ret['case'],
					// 'court' => $ret['court'],
					
						$case[] = array(
							'cid' => $key->cid,
							'id' => $key->inmate_id,
			 				// 'case_no' => $key->case_no,
			 				'case_no' =>$ret['case'],
				 			// 'court' => $key->court_name,
				 			'court' => $ret['court'],
				 			'confine' => $key->date_confinment,
				 			// 'crime' => $key->crime,
				 			'crime' => $ret['vio'],
				 			'sentence' => $key->sentence,
				 			'commencing' => $key->commencing,
				 			'expireg' => $key->expire_good,
				 			'expireb' => $key->expire_bad
						);	
				}
				return $case;

	 	}
	 	public function getcaseinfoPrinting($id)
	 	{

	 		$this->db->select('*')->from('inmate_case_info')->where('inmate_id', $id)->where('case_status', '0');
	 		$count=$this->db->get();
	 		$case = array();

				foreach ($count->result() as $key) {
					$ret = $this->getCrimeCases1($key->inmate_id);
	 			//echo json_encode($ret);
					// 'crime' => $ret['vio'],
					// 'case_no' => $ret['case'],
					// 'court' => $ret['court'],
					
						$case[] = array(
							'cid' => $key->cid,
							'id' => $key->inmate_id,
			 				// 'case_no' => $key->case_no,
			 				'case_no' =>$ret['case'],
				 			// 'court' => $key->court_name,
				 			'court' => $ret['court'],
				 			'confine' => $key->date_confinment,
				 			// 'crime' => $key->crime,
				 			'crime' => $ret['vio'],
				 			'sentence' => $key->sentence,
				 			'commencing' => $key->commencing,
				 			'expireg' => $key->expire_good,
				 			'expireb' => $key->expire_bad
						);	
				}
				return $case;

	 	}
	 	//for case info viewing.. limit to 4 cases only
	 	public function getcaseinfolimit($id)
	 	{
	 		$this->db->select('*')->from('inmate_case_info as i')->from("cs_violations v")->
	 		where('inmate_id', $id)->where('case_status', '0')->where("v.id = i.crime")->order_by('time_added', "desc");
	 		$count=$this->db->get();

	 		$case = array();
	 		//echo $this->db->last_query();
	 		if($count->num_rows() > 0){
				foreach ($count->result() as $key) {
						$case[] = array(
			 				'case_no' => $key->case_no,
				 			'court' => $key->court_name,
				 			'confine' => $key->date_confinment,
				 			'crime' => $key->crime,
				 			'sentence' => $key->sentence,
				 			'commencing' => $key->commencing,
				 			'expireg' => $key->expire_good,
				 			'expireb' => $key->expire_bad,
				 			'name' => $key->name,
				 			'counts' => $key->counts
						);	
				}
				return $case;
			}
			else{
				return $case = NULL;
			}
	 	}

	 	public function addedcaseinfo($id)
	 	{
	 		$this->db->select('*')->from('inmate_case_info')->where('inmate_id', $id)->join('cs_violations cv', 'cv.id = inmate_case_info.crime', 'left')->where('case_status', '1')->order_by('time_added', "desc");
	 		$count=$this->db->get();
	 		$case = array();

	 		if($count->num_rows() > 0){
				foreach ($count->result() as $key) {
						$case[] = array(
			 				'case_no' => $key->case_no,
				 			'court' => $key->court_name,
				 			'confine' => $key->date_confinment,
				 			'crime' => $key->crime,
				 			'sentence' => $key->sentence,
				 			'commencing' => $key->commencing,
				 			'expireg' => $key->expire_good,
				 			'expireb' => $key->expire_bad,
				 			'counts' => $key->counts,
				 			'vioName' => $key->name,
						);	
				}
				return $case;
			}
			else{
				return $case = NULL;
			}
	 	}
	 	public function getOldCase($id)
	 	{
	 		$this->db->select('*')->from('inmate_case_info')->where('inmate_id', $id)->where('case_status', '1')->order_by('time_added', "desc");
	 		$count=$this->db->get();
	 		$case = array();


				foreach ($count->result() as $key) {
						$case[] = array(
							'cid' => $key->cid,
			 				'case_no' => $key->case_no,
				 			'court' => $key->court_name,
				 			'confine' => $key->date_confinment,
				 			'crime' => $key->crime,
				 			'sentence' => $key->sentence,
				 			'commencing' => $key->commencing,
				 			'expireg' => $key->expire_good,
				 			'expireb' => $key->expire_bad
						);	
				}
				return $case;

 		
	 	}

	 	public function userAccnt()
	 	{
	 		$data=$this->session->userdata('logged_in');
	 		$this->db->select('*')->from('user_account')->where('user_id !=', $data['user_id']);
	 		$get=$this->db->get();
	 		$user = array();

	 		foreach ($get->result() as $key) {
	 			$user[] = array('user_id' => $key->user_id,
	 							'username' => $key->username,
	 							'user_fname' => $key->user_fname,
	 							'user_lname' => $key->user_lname,
	 							'user_mi' => $key->user_mi,
	 							'user_add' => $key->user_address,
	 							'user_contact' => $key->user_contact,
	 							'type' => $key->type,
	 							'status' => $key->status
	 							);
	 		}
	 		return $user;
	 	}
	 	//check whether username is ok for adding in the db
	 	public function checkusername($un)
	 	{
	 		$this->db->select('*')->from('user_account')->where('username', $un);
	 		$cnt=$this->db->get();

	 		if ($cnt->num_rows() == 1) {
	 			return TRUE;
	 		}
	 		else
	 		{
	 			return FALSE;
	 		}
	 	}
	 	//get all users for viewing
	 	public function getUsers($id)
	 	{
	 		$this->db->select('*')->from('user_account')->where('user_id', $id);
	 		$get=$this->db->get();
	 		$view = array();

	 		foreach ($get->result() as $key) {
	 			$view[] = array('user_id' => $key->user_id,
	 							'username' => $key->username,
	 							'user_fname' => $key->user_fname,
	 							'user_lname' => $key->user_lname,
	 							'user_mi' => $key->user_mi,
	 							'user_add' => $key->user_address,
	 							'user_contact' => $key->user_contact,
	 							'type' => $key->type,
	 							'status' => $key->status,
	 							'filename' => $key->user_filename
	 							);
	 		}
	 		return $view;
	 	}
	 	//user login act.
	 	public function getUserlog($id)
	 	{
	 		$this->db->select('*')->from('logs')->where('actor', $id)->where('action', 'Log in');
	 		$get=$this->db->get();

	 		$logs = array();


		 		foreach ($get->result() as $key) {
		 			$logs[] = array('action' => $key->action,
		 							'time' => $key->time,
		 							'agent' => $key->agent );
		 		}
		 		return $logs;
	 	}
	 	//getting the activity
	 	public function getUserAct($id)
	 	{
	 		$this->db->select('*')->from('inmate')->where('added_by', $id);
	 		$get=$this->db->get();
	 		$act = array();

		 		foreach ($get->result() as $key) {
		 			$act[] = array('id' => $key->inmate_id,
		 							'fname' => $key->inmate_fname,
		 							'lname' => $key->inmate_lname,
		 							'mi' => $key->inmate_mi,
		 							'date' => $key->datetime_added
		 				);
		 		}
		 		return $act;
	 	}
	 	//get the user act on visitors
	 	public function getVisitorLog($id)
	 	{
	 		$this->db->select('*')->from('inmate_auth_visitor')->join('inmate', 'inmate.inmate_id=inmate_auth_visitor.inmate_id')->where('inmate_auth_visitor.added_by', $id);
	 		$get=$this->db->get();
	 		$act2 = array();

		 		foreach ($get->result() as $key) {
		 			$act2[] = array('date' => $key->datetime,
		 							'id' => $key->inmate_id,
		 							'name' => $key->fullname,
		 							'relation' => $key->relation,
		 							'ifname' => $key->inmate_fname,
		 							'ilname' => $key->inmate_lname,
		 							'imi' => $key->inmate_mi
		 				);
		 		}
		 		return $act2;	 
	 	}
	 	//get the conduct record added by the user
	 	public function getRecordLog($id)
	 	{
	 		$this->db->select('*')->from('inmate_conduct_rec')->join('inmate', 'inmate.inmate_id=inmate_conduct_rec.inmate_id')->where('inmate_conduct_rec.warden_id', $id);
	 		$get=$this->db->get();
	 		$act3 = array();

		 		foreach ($get->result() as $key) {
		 			$act3[] = array('date' => $key->date_occur,
		 							'id' => $key->inmate_id,
		 							'punish' => $key->punishment,
		 							'cause' => $key->cause,
		 							'ifname' => $key->inmate_fname,
		 							'ilname' => $key->inmate_lname,
		 							'imi' => $key->inmate_mi
		 				);
		 		}
		 		return $act3;		 		
	 	}
	 	//checking of the auth visitors
	 	public function checkVisitor($name)
	 	{
	 		$this->db->select('*')->from('inmate_auth_visitor')->where('fullname', $name);
	 		$get=$this->db->get();

	 		if ($get->num_rows() == 1) {
	 			return TRUE;
	 		}
	 		else{
	 			return FALSE;
	 		}
	 	}
	 	//all visitors that are not deleted
	 	public function allVisitor()
	 	{
	 		$this->db->select('*')->from('inmate_auth_visitor')->join('inmate', 'inmate_auth_visitor.inmate_id=inmate.inmate_id')->join('user_account', 'inmate_auth_visitor.added_by=user_account.user_id');
	 		$get=$this->db->get();
	 		$auth = array();

	 		foreach ($get->result() as $key) {
	 			$auth[] = array('id' => $key->id,
	 							'inmate_id' => $key->inmate_id,
	 							'inmate_fname' => $key->inmate_fname,
	 							'inmate_lname' => $key->inmate_lname,
	 							'full_name' => $key->fullname,
	 							'relation' => $key->relation,
	 							'address'=> $key->address,
	 							'contact_number' => $key->contact_number,
	 							'user_fname' => $key->user_fname,
	 							'user_lname' => $key->user_lname,
	 							'filename' => $key->visit_filename
	 							);
	 		}
	 		return $auth;
	 	}
	 	//for the view-table list of all visitors of a inmate
	 	public function visitPerInmate($id)
	 	{
	 		$this->db->select('*')->from('inmate_auth_visitor')->join('inmate', 'inmate.inmate_id=inmate_auth_visitor.inmate_id')->where('inmate_auth_visitor.inmate_id', $id);
	 		$get=$this->db->get();
	 		$per=array();

	 		foreach ($get->result() as $key) {
	 			$per[] = array('id' => $key->id,
	 						    'fullname' => $key->fullname,
	 						    'relation' => $key->relation,
	 						    'address' => $key->address,
	 						    'contact_number' => $key->contact_number,
	 						    'filename' => $key->visit_filename
	 						    );
	 		}
	 		return $per;
	 	}
	 	//for the details of the visitor... view mode
	 	public function visitordetails($id)
	 	{
	 		$this->db->select('*')->from('inmate_auth_visitor')->join('inmate', 'inmate_auth_visitor.inmate_id=inmate.inmate_id')->join('user_account', 'inmate_auth_visitor.added_by=user_account.user_id')->where('inmate_auth_visitor.id', $id);
	 		$get=$this->db->get();

	 		$data = array();

	 		foreach ($get->result() as $key) {
	 			$data[] = array('id' => $key->id,
	 							'inmate_id' => $key->inmate_id,
	 							'datetime' => $key->datetime,
	 							'inmate_fname' => $key->inmate_fname,
	 							'inmate_lname' => $key->inmate_lname,
	 							'full_name' => $key->fullname,
	 							'relation' => $key->relation,
	 							'address'=> $key->address,
	 							'contact_number' => $key->contact_number,
	 							'user_id' => $key->user_id,
	 							'user_fname' => $key->user_fname,
	 							'user_lname' => $key->user_lname,
	 							'filename' => $key->visit_filename
	 							);
	 				}
	 		return $data;		
	 	}
	 	/*------------------------------------------
	 	 VIEW CONDUCT RECORD OF AN INMATE
	 	/------------------------------------------*/
	 	public function viewconrec($id)
	 	{
	 		$this->db->select('*')->from('inmate_conduct_rec')->join('user_account', 'inmate_conduct_rec.warden_id=user_account.user_id')->where('inmate_conduct_rec.inmate_id', $id)->where('inmate_conduct_rec.status = "1"');
	 		$getall = $this->db->get();

	 		if($getall->num_rows() > 0)
	 		{
	 			foreach ($getall->result() as $key2) {
	 					$array[] = array('id' => $key2->id,
	 									'date' => $key2->date_occur,
	 									'type' => $key2->rec_type,
	 									'punish' => $key2->punishment,
	 									'cause' => $key2->cause,
	 									'u_lname' => $key2->user_lname,
	 									'u_fname' => $key2->user_fname,
	 									'u_mi' => $key2->user_mi,
	 									
	 									'pointValue' => $key2->pointValue.' '.$key2->pointUnit
	 						);
	 				}
	 				return $array;	
	 		}
	 		else{
	 			return $array = array('id' => NULL );
	 		}

	 	}
	 	public function viewconrec2($id)
	 	{	$this->db->select('*')->from('inmate_conduct_rec')->where('inmate_conduct_rec.id ="'.$id.'"');
	 		$getall = $this->db->get();
			$getall = $getall->result();
	 		
	 		$this->db->select('*')->from('inmate_conduct_rec')->join('user_account', 'inmate_conduct_rec.warden_id=user_account.user_id')->where('inmate_conduct_rec.status = "1"')->where('inmate_conduct_rec.inmate_id = "'.$getall[0]->inmate_id.'"');
	 		$getall = $this->db->get();
	 		
	 		if($getall->num_rows() > 0)
	 		{
	 			foreach ($getall->result() as $key2) {
	 					$array[] = array('id' => $key2->id,
	 									'date' => $key2->date_occur,
	 									'punish' => $key2->punishment,
	 									'cause' => $key2->cause,
	 									'u_lname' => $key2->user_lname,
	 									'u_fname' => $key2->user_fname,
	 									'u_mi' => $key2->user_mi,
	 									'type' => $key2->rec_type
	 						);
	 				}
	 				return $array;	
	 		}
	 		else{
	 			return $array = array('id' => NULL );
	 		}

	 	}
	 	//-----------------------------------------------
		//		FOR THE ARCHIVE VIEWING ONLY
		//-----------------------------------------------
		public function getPending()
		{
	 		//query
	 		$this->db->select('*,inmate.status as "iStat"');
	 		$this->db->from('inmate');
	 		$this->db->join('file', 'inmate.inmate_id=file.inmate_id');
	 		$this->db->join('user_account', 'inmate.added_by=user_account.user_id');
	 		//$this->db->join('inmate_case_info', 'inmate.inmate_id=inmate_case_info.inmate_id');
	 		$this->db->join('inmate_build', 'inmate.inmate_id=inmate_build.inmate_id');
	 		$this->db->join('inmate_info', 'inmate.inmate_id=inmate_info.inmate_id');
	 		$this->db->where('inmate.status', 'Active');

	 		$get = $this->db->get();
	 		$res=array();

	 		foreach ($get->result() as $key) 
	 		{
	 			$res[] = array(
		 			'id' => $key->inmate_id,
		 			'cell' =>$key->cell_no,
		 			'fname' => $key->inmate_fname,
		 			'lname' => $key->inmate_lname,
		 			'mi' => $key->inmate_mi, 
		 			'alias' => $key->inmate_alias,
		 			'status' => $key->iStat,
		 			'date_added' =>$key->datetime_added,
		 			'user_fname' => $key->user_fname,
		 			'user_lname' => $key->user_lname,
		 			'user_mi' => $key->user_mi,
		 			
		 			'height' => $key->height,
		 			'weight' => $key->weight,
		 			'complexion' => $key->complexion,
		 			'build' => $key->build,
		 			'hair' => $key->hair,
		 			'hairp' => $key->hair_peculiarities,
		 			
		 			'nationality' => $key->nationality,
		 			'Rstatus' => $key->status,
		 			'bday' => $key->birthdate,
		 			'age' => $key->age,
		 			'gender' => $key->gender,
		 			'born' => $key->born_in,
		 			'home' => $key->home_add,
		 			'province' => $key->province_add,
		 			'occupation' => $key->occupation,
		 			'father' => $key->father,
		 			'mother' => $key->mother,
		 			'relative' => $key->relative,
		 			'relation' => $key->relation,
		 			'address' => $key->address,

		 			'filename' =>$key->filename
	 				); 
				
	 		}
	 		return $res;
		}
		public function getTransfer()
		{
	 		//query
	 		$this->db->select('* , inmate.status as "iStat"');
	 		$this->db->from('inmate');
	 		$this->db->join('file', 'inmate.inmate_id=file.inmate_id');
	 		$this->db->join('user_account', 'inmate.added_by=user_account.user_id');
	 		//$this->db->join('inmate_case_info', 'inmate.inmate_id=inmate_case_info.inmate_id');
	 		$this->db->join('inmate_build', 'inmate.inmate_id=inmate_build.inmate_id');
	 		$this->db->join('inmate_info', 'inmate.inmate_id=inmate_info.inmate_id');
	 		$this->db->where('inmate.status', 'Transfer');

	 		$get = $this->db->get();
	 		$res=array();

	 		foreach ($get->result() as $key) 
	 		{
	 			$res[] = array(
		 			'id' => $key->inmate_id,
		 			'cell' =>$key->cell_no,
		 			'fname' => $key->inmate_fname,
		 			'lname' => $key->inmate_lname,
		 			'mi' => $key->inmate_mi, 
		 			'alias' => $key->inmate_alias,
		 			'status' => $key->iStat,
		 			'date_added' =>$key->datetime_added,
		 			'user_fname' => $key->user_fname,
		 			'user_lname' => $key->user_lname,
		 			'user_mi' => $key->user_mi,
		 			
		 			'height' => $key->height,
		 			'weight' => $key->weight,
		 			'complexion' => $key->complexion,
		 			'build' => $key->build,
		 			'hair' => $key->hair,
		 			'hairp' => $key->hair_peculiarities,
		 			
		 			'nationality' => $key->nationality,
		 			'Rstatus' => $key->status,
		 			'bday' => $key->birthdate,
		 			'age' => $key->age,
		 			'gender' => $key->gender,
		 			'born' => $key->born_in,
		 			'home' => $key->home_add,
		 			'province' => $key->province_add,
		 			'occupation' => $key->occupation,
		 			'father' => $key->father,
		 			'mother' => $key->mother,
		 			'relative' => $key->relative,
		 			'relation' => $key->relation,
		 			'address' => $key->address,

		 			'filename' =>$key->filename
	 				); 
				
	 		}
	 		return $res;
		}
		public function getReleased()
		{
	 		//query
	 		$this->db->select('*, inmate.status as "iStat"');
	 		$this->db->from('inmate');
	 		$this->db->join('file', 'inmate.inmate_id=file.inmate_id');
	 		$this->db->join('user_account', 'inmate.added_by=user_account.user_id');
	 		//$this->db->join('inmate_case_info', 'inmate.inmate_id=inmate_case_info.inmate_id');
	 		$this->db->join('inmate_build', 'inmate.inmate_id=inmate_build.inmate_id');
	 		$this->db->join('inmate_info', 'inmate.inmate_id=inmate_info.inmate_id');
	 		$this->db->where('inmate.status', 'Released');

	 		$get = $this->db->get();
	 		$res=array();

	 		foreach ($get->result() as $key) 
	 		{
	 			$res[] = array(
		 			'id' => $key->inmate_id,
		 			'cell' =>$key->cell_no,
		 			'fname' => $key->inmate_fname,
		 			'lname' => $key->inmate_lname,
		 			'mi' => $key->inmate_mi, 
		 			'alias' => $key->inmate_alias,
		 			'status' => $key->iStat,
		 			'date_added' =>$key->datetime_added,
		 			'user_fname' => $key->user_fname,
		 			'user_lname' => $key->user_lname,
		 			'user_mi' => $key->user_mi,
		 			
		 			'height' => $key->height,
		 			'weight' => $key->weight,
		 			'complexion' => $key->complexion,
		 			'build' => $key->build,
		 			'hair' => $key->hair,
		 			'hairp' => $key->hair_peculiarities,
		 			
		 			'nationality' => $key->nationality,
		 			'Rstatus' => $key->status,
		 			'bday' => $key->birthdate,
		 			'age' => $key->age,
		 			'gender' => $key->gender,
		 			'born' => $key->born_in,
		 			'home' => $key->home_add,
		 			'province' => $key->province_add,
		 			'occupation' => $key->occupation,
		 			'father' => $key->father,
		 			'mother' => $key->mother,
		 			'relative' => $key->relative,
		 			'relation' => $key->relation,
		 			'address' => $key->address,

		 			'filename' =>$key->filename
	 				); 
				
	 		}
	 		return $res;
		}
		public function getMarks($id)
		{
			$this->db->select('*')->from('inmate_2d')->where('inmate_id', $id);
			$get = $this->db->get();
			$res = array();

			foreach ($get->result() as $key) {
				$res[] = array('id' => $key->id,
								'inmate' => $key->inmate_id,
								'name' => $key->mark_name,
								'desc' => $key->mark_desc,
								'type' => $key->mark_type,
								'filename' => $key->mark_filename 
				);
			
			}
			return $res;
		}
		public function allmarks()
		{
			$this->db->select('*')->from('inmate_2d')->join('inmate', 'inmate_2d.inmate_id=inmate.inmate_id');
			$get = $this->db->get();
			$arr = array();

			foreach ($get->result() as $key) {
				$arr[] = array('inmate_id' => $key->inmate_id,
							   'id' => $key->id,
							   'fname' => $key->inmate_fname,
							   'lname' => $key->inmate_lname,
							   'mi' => $key->inmate_mi,
							   'mname' => $key->mark_name,
							   'mdesc' => $key->mark_desc,
							   'type' => $key->mark_type,
							   'mfilename' => $key->mark_filename,
							   'status' => $key->status
				 );
			}
			return $arr;

		}
		public function get2d($id2)
		{
			$this->db->select('*')->from('inmate_2d')->where('id', $id2)->limit(1);
			$get = $this->db->get();

			foreach ($get->result() as $key) {
				return $inmate = $key->inmate_id;
			}
		}
		//////////////////////////////////////////////////////
		// FOR THE REPORTS ... 
		/////////////////////////////////////////////////////
		public function report_all()
		{
			$this->db->select('*')->from('inmate');
			return $res = $this->db->count_all_results();
		}
		public function report_active()
		{
			$this->db->select('*')->from('inmate')->where('status', 'Active');
			return $res = $this->db->count_all_results();
		}
		public function report_transfer()
		{
			$this->db->select('*')->from('inmate')->where('status', 'Transfer');
			return $res = $this->db->count_all_results();
		}
		public function report_released()
		{
			$this->db->select('*')->from('inmate')->where('status', 'Released');
			return $res = $this->db->count_all_results();
		}
		public function report_cases()
		{
			$this->db->select('*')->from('inmate_case_info');
			return $res = $this->db->count_all_results();
		}
		public function report_visitors()
		{
			$this->db->select('*')->from('inmate_auth_visitor');
			return $res = $this->db->count_all_results();
		}
		public function report_latestcase()
		{
			$this->db->select('*')->from('inmate_case_info')->where('case_status', '0');
			return $res = $this->db->count_all_results();
		}
		public function report_prevcase()
		{
			$this->db->select('*')->from('inmate_case_info')->where('case_status', '1');
			return $res = $this->db->count_all_results();
		}
		public function report_records()
		{
			$this->db->select('*')->from('inmate_conduct_rec');
			return $res = $this->db->count_all_results();
		}
		public function report_marks()
		{
			$this->db->select('*')->from('inmate_2d');
			return $res = $this->db->count_all_results();
		}
		public function report_users()
		{
			$this->db->select('*')->from('user_account');
			return $res = $this->db->count_all_results();
		}
}	
?>