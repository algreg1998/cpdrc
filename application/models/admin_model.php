<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_model extends MY_Model {
	
    public function lastquery () {
        echo $this->db->last_query();
    }
   
    public function getEditReqStatus($reqBy ,$inmateId){
        $res = $this->db->query('
                SELECT status
                FROM editrequest as er 
                WHERE er.requestedBy = $reqBy and  er.inmateId = $inmateId
            ');

        return $res->result();
    }
    public function getAllEditReqs(){
        $res = $this->db->query('
                SELECT er.reason, DATE_FORMAT(er.addedOn, "%d-%b-%y %h:%i %p") as "addedOn" ,er.editRequestID, Concat(ua.user_fname," ", ua.user_lname) as requestedByName,concat(i.inmate_fname," ",i.inmate_lname) as inmateName,i.inmate_id,er.status
                FROM editrequest as er, user_account as ua, inmate as i
                WHERE ua.user_id = er.requestedBy AND i.inmate_id = er.inmateId
            ');

        return $res->result();
    }

	public function search($table_name,$where=NULL,$like = "", $filter="", $fields=NULL,$single=FALSE,$order_by=NULL,$limit=NULL,$offset=0)
	{
		
        ($where !== NULL) ? $this->db->where($where) : '';
        
		if ($like != "" && is_array($like))
        {
			if($filter == "")
            {
                foreach($like as $keyword)
                {
                    if ($fields != NULL && is_array($fields)) {
                        
                        $ctr = 0;
                        $total = count($fields);
                        
                        foreach ($fields as $key => $field) {
                            //$this->db->or_like($key,$keyword);
                            $ctr++;
                            if($ctr == $total)
                            {
                                if ($ctr == 1) {
                                    $this->db->where("($key LIKE '%$keyword%')");
                                }else{
                                    $this->db->or_where("$key LIKE '%$keyword%')");
                                }
                                
                            }elseif ($ctr == 1) {
                               
                                $this->db->where("($key LIKE '%$keyword%'");
                            }else{
                                $this->db->or_where("$key LIKE '%$keyword%'");
                            }
                            
                        }
                    }
                }
            }
            else
            {
                foreach($like as $val)
                {
                    $this->db->or_like($filter,$val);
                }
            }
		}

		($order_by !== NULL) ? $this->db->order_by($order_by) : '';

		if($single == TRUE)
        {
			return $this->db->limit(1)->get($table_name)->row();
        }
        else
        {
			$limit != NULL ? $this->db->limit($limit,$offset) : '';
			return $this->db->get($table_name)->result();
        }
	}

	public function search_count($table_name,$where=NULL,$like = NULL, $filter="", $fields=NULL, $single=FALSE,$order_by=NULL,$limit=NULL,$offset=0)
	{
		($where !== NULL) ? $this->db->where($where) : '';

		if ($like != "" && is_array($like))
        {
			if($filter == "")
            {
                foreach($like as $keyword)
                {
                    if ($fields != NULL && is_array($fields)) {
                        
                        $ctr = 0;
                        $total = count($fields);
                        
                        foreach ($fields as $key => $field) {
                            //$this->db->or_like($key,$keyword);
                            $ctr++;

                            if($ctr == $total){
                                
                                if ($ctr == 1) {
                                    $this->db->where("($key LIKE '%$keyword%')");
                                }else{
                                    $this->db->or_where("$key LIKE '%$keyword%')");
                                }
                                
                            }elseif ($ctr == 1) {
                               
                                $this->db->where("($key LIKE '%$keyword%'");
                            }else{
                                $this->db->or_where("$key LIKE '%$keyword%'");
                            }
                            
                        }
                    }
                }
            }
            else
            {
                foreach($like as $val)
                {
                    $this->db->or_like($filter,$val);
                }
            }
		}

		($order_by !== NULL) ? $this->db->order_by($order_by) : '';

		if($single == TRUE)
        {
			$this->db->from($table_name);
            return $this->db->count_all_results();
		}
        else
        {
			$limit != NULL ? $this->db->limit($limit,$offset) : '';
			$this->db->from($table_name);
            return $this->db->count_all_results();
        }
	}


    public function get_wherein($table_name,$where=NULL,$wherein=NULL,$ids,$single=FALSE,$order_by=NULL,$group_by=NULL,$limit=NULL,$offset=0)
    {

        ($where !== NULL) ? $this->db->where($where) : '';

        ($wherein !== NULL) ? $this->db->where_in($wherein,$ids) : '';

        ($order_by !== NULL) ? $this->db->order_by($order_by) : '';

        ($group_by !== NULL) ? $this->db->group_by($group_by) : '';

        if($single == TRUE)

            return $this->db->limit(1)->get($table_name)->row();

        else

            $limit != NULL ? $this->db->limit($limit,$offset) : '';
            return $this->db->get($table_name)->result();
    }

    public function getPopulationConvict(){
        $res = $this->db->query('
                SELECT * from inmates_full WHERE 1
            ');

        return $res->result();
    }

    public function getPopulationDetainee(){
        $res = $this->db->query('
                SELECT * from inmates_full WHERE 1
            ');

        return $res->result();
    }

    public function getPopulationReport($year){
        $res = $this->db->query("
                SELECT
                MONTH(IF(inmate_type = 'Detainee' ,date_detained, IF(inmate_type = 'Convict' ,date_convicted, date_probation))) as month,
                DATE_FORMAT(IF(inmate_type = 'Detainee' ,date_detained, IF(inmate_type = 'Convict' ,date_convicted, date_probation)),'%Y-%m') as yr_mon,
                DATE_FORMAT(IF(inmate_type = 'Detainee' ,date_detained, IF(inmate_type = 'Convict' ,date_convicted, date_probation)),'%M') as monthname,
                SUM(IF(inmate_type = 'Detainee',1,0)) as detainee,
                SUM(IF(inmate_type = 'Convict',1,0)) as convict,
                SUM(IF(inmate_type = 'Probation',1,0)) as probation,
                SUM(IF(inmate_type = 'Detainee' or inmate_type = 'Probation' or inmate_type = 'Convict',1,0)) as total
                from inmates_full
                WHERE YEAR(IF(inmate_type = 'Detainee' ,date_detained, IF(inmate_type = 'Convict' ,date_convicted, date_probation)))=$year AND inmates_full.status = 'Active' GROUP BY yr_mon ORDER BY yr_mon ASC
            ");

        return $res->result();
    }

    public function getCurrentMonthPopulationGraph($year,$month){
        $res = $this->db->query("
               SELECT
                MONTH(IF(inmate_type = 'Detainee' ,date_detained, IF(inmate_type = 'Convict' ,date_convicted, date_probation))) as month,
                DATE_FORMAT(IF(inmate_type = 'Detainee' ,date_detained, IF(inmate_type = 'Convict' ,date_convicted, date_probation)),'%Y-%m-%d') as yr_mon_day,
                DATE_FORMAT(IF(inmate_type = 'Detainee' ,date_detained, IF(inmate_type = 'Convict' ,date_convicted, date_probation)),'%M') as monthname,
                SUM(IF(inmate_type = 'Detainee',1,0)) as detainee,
                SUM(IF(inmate_type = 'Convict',1,0)) as convict,
                SUM(IF(inmate_type = 'Probation',1,0)) as probation,
                SUM(IF(inmate_type = 'Detainee' or inmate_type = 'Probation' or inmate_type = 'Convict',1,0)) as total
                from inmates_full
                WHERE MONTH(IF(inmate_type = 'Detainee' ,date_detained, IF(inmate_type = 'Convict' ,date_convicted, date_probation)))=".$month." AND YEAR(IF(inmate_type = 'Detainee' ,date_detained, IF(inmate_type = 'Convict' ,date_convicted, date_probation)))=".$year." AND inmates_full.status='Active' GROUP BY yr_mon_day ORDER BY yr_mon_day ASC
            ");

        return $res->result();
    }

    public function getViolationReport($year){
        $res = $this->db->query("
                SELECT
                MONTH(IF(inmate_type = 'Detainee' ,date_detained, IF(inmate_type = 'Convict' ,date_convicted, date_probation))) as month,
                DATE_FORMAT(IF(inmate_type = 'Detainee' ,date_detained, IF(inmate_type = 'Convict' ,date_convicted, date_probation)),'%Y-%m') as yr_mon,
                DATE_FORMAT(IF(inmate_type = 'Detainee' ,date_detained, IF(inmate_type = 'Convict' ,date_convicted, date_probation)),'%M') as monthname,
                SUM(IF(inmate_type = 'Detainee',1,0)) as detainee,
                SUM(IF(inmate_type = 'Convict',1,0)) as convict,
                SUM(IF(inmate_type = 'Probation',1,0)) as probation,
                SUM(IF(inmate_type = 'Detainee' or inmate_type = 'Probation' or inmate_type = 'Convict',1,0)) as total
                from inmates_full
                WHERE YEAR(IF(inmate_type = 'Detainee' ,date_detained, IF(inmate_type = 'Convict' ,date_convicted, date_probation)))=$year GROUP BY yr_mon ORDER BY yr_mon ASC
            ");

        return $res->result();
    }

    public function getCrimeIndex($year){
        $res = $this->db->query("
                    SELECT
                        *,
                        r.*,
                        v.name,
                        v.id as violation_id,
                        SUM(IF(type = 'Detainee',1,0)) as detainee,
                        SUM(IF(type = 'Convict',1,0)) as convict,
                        SUM(IF(type = 'Probation',1,0)) as probation

                        FROM cs_cases c
                            LEFT JOIN cs_violations v
                                ON v.id = c.violation_id
                            LEFT JOIN cs_reasons r
                                ON r.id = c.reasons_id
                            INNER JOIN inmate i
                                ON i.inmate_id = r.inmate_id

                        WHERE YEAR(IF(type = 'Detainee' ,date_detained, IF(type = 'Convict' ,date_convicted, date_probation)))=$year AND i.status='Active' GROUP BY v.id
                ");

        return $res->result();
    }

    public function getCrimeIndexCurrentMonthGraph($year,$month){
        $res = $this->db->query("
                    SELECT
                        *,
                        r.*,
                        v.name,
                        v.id as violation_id,
                        SUM(IF(type = 'Detainee',1,0)) as detainee,
                        SUM(IF(type = 'Probation',1,0)) as probation,
                        SUM(IF(type = 'Convict',1,0)) as convict

                        FROM cs_cases c
                            LEFT JOIN cs_violations v
                                ON v.id = c.violation_id
                            LEFT JOIN cs_reasons r
                                ON r.id = c.reasons_id
                            INNER JOIN inmate i
                                ON i.inmate_id = r.inmate_id

                        WHERE YEAR(IF(type = 'Detainee' ,date_detained, IF(type = 'Convict' ,date_convicted, date_probation)))=$year
                        AND MONTH(IF(type = 'Detainee' ,date_detained, IF(type = 'Convict' ,date_convicted, date_probation)))=$month
                        GROUP BY v.id
                ");

        return $res->result();
    }

    public function getInmatesCrinme($status,$violation_id){
        $res = $this->db->query("
                    SELECT
                        *
                        FROM cs_cases c
                            LEFT JOIN cs_violations v
                                ON v.id = c.violation_id
                            LEFT JOIN cs_reasons r
                                ON r.id = c.reasons_id
                            INNER JOIN inmate i
                                ON i.inmate_id = r.inmate_id
                            INNER JOIN file f
                                ON f.inmate_id = i.inmate_id

                        WHERE type='".$status."' AND v.id='".$violation_id."' AND i.status ='Active'
                ");

        return $res->result();
    }

    public function getViolationReportGraph($year,$violation){
        $res = $this->db->query("
                    SELECT
                        *,
                        r.*,
                        v.name,
                        v.id as violation_id,
                        v.name as violation_name,
                        DATE_FORMAT(IF(type = 'Detainee' ,date_detained, IF(type = 'Convict' ,date_convicted, date_probation)),'%Y-%m') as yr_month,
                        DATE_FORMAT(IF(type = 'Detainee' ,date_detained, IF(type = 'Convict' ,date_convicted, date_probation)),'%m') as month,
                        
                        SUM(IF(type = 'Detainee',1,0)) as detainee,
                        SUM(IF(type = 'Convict',1,0)) as convict,
                        SUM(IF(type = 'Probation',1,0)) as probation,
                        SUM(IF(type != 'Pending',1,0)) as total

                        FROM cs_cases c
                            LEFT JOIN cs_violations v
                                ON v.id = c.violation_id
                            LEFT JOIN cs_reasons r
                                ON r.id = c.reasons_id
                            INNER JOIN inmate i
                                ON i.inmate_id = r.inmate_id

                        WHERE DATE_FORMAT(IF(type = 'Detainee' ,date_detained, IF(type = 'Convict' ,date_convicted, date_probation)),'%Y')=$year
                        AND v.name = '$violation' AND i.status != 'Released'
                        GROUP BY yr_month
                "); 

        return $res->result();
    }

    public function getPopulationReportGraph($year){
        $res = $this->db->query("
                    SELECT
                        *,
                        r.*,
                        DATE_FORMAT(IF(type = 'Detainee' ,date_detained, IF(type = 'Convict' ,date_convicted, date_probation)),'%Y-%m') as yr_month,
                        DATE_FORMAT(IF(type = 'Detainee' ,date_detained, IF(type = 'Convict' ,date_convicted, date_probation)),'%m') as month,
                        
                        SUM(IF(type = 'Detainee',1,0)) as detainee,
                        SUM(IF(type = 'Convict',1,0)) as convict,
                        SUM(IF(type = 'Probation',1,0)) as probation,
                        SUM(IF(type != 'Pending',1,0)) as total

                        FROM cs_reasons r
                            LEFT JOIN inmate i
                                ON i.inmate_id = r.inmate_id

                        WHERE DATE_FORMAT(IF(type = 'Detainee' ,date_detained, IF(type = 'Convict' ,date_convicted, date_probation)),'%Y')=$year AND i.status ='Active' 
                        GROUP BY yr_month
                "); 

        return $res->result();
    }

    public function getReleaseMonth($year,$month){
        $res = $this->db->query("
                    SELECT
                        *,
                        i.is_read as iis_read,
                        r.is_read as ris_read,
                        r.*
                        FROM cs_reasons r
                            LEFT JOIN inmate i
                                ON i.inmate_id = r.inmate_id

                        WHERE
                        r.type = 'Convict' AND
                        release_date is not NULL AND
                        YEAR(release_date)=$year AND
                        MONTH(release_date)=$month
                        ORDER BY release_date ASC
                "); 

        return $res->result();
    }

    public function getReleaseMonthCount($year,$month){
        $res = $this->db->query("
                    SELECT
                        *,
                        r.*
                        FROM cs_reasons r
                            LEFT JOIN inmate i
                                ON i.inmate_id = r.inmate_id

                        WHERE
                        r.type = 'Convict' AND
                        release_date is not NULL AND
                        YEAR(release_date)=$year AND
                        MONTH(release_date)=$month AND
                        i.is_read = 0
                        ORDER BY release_date ASC
                "); 

        return $res->result();
    }

    public function getAppearanceSchedule($year,$month){
        $res = $this->db->query("
                    SELECT
                        *,
                        i.is_read as iis_read,
                        aps.is_read as ais_read,
                        r.*,
                        aps.id as schedule_id
                        FROM cs_appearance_schedules aps
                            LEFT JOIN cs_reasons r
                                ON r.id = aps.reason_id
                            LEFT JOIN inmate i
                                ON i.inmate_id = r.inmate_id

                        WHERE
                        aps.status='Pending' AND
                        YEAR(date)=$year AND
                        MONTH(date)=$month AND
                        i.status != 'Released'
                        GROUP BY i.inmate_id
                        ORDER BY date ASC
                "); 

        return $res->result();
    }

    public function getAppearanceScheduleCount($year,$month){
        $res = $this->db->query("
                    SELECT
                        *,
                        i.is_read as iis_read,
                        aps.is_read as ais_read,
                        r.*,
                        aps.id as schedule_id
                        FROM cs_appearance_schedules aps
                            LEFT JOIN cs_reasons r
                                ON r.id = aps.reason_id
                            LEFT JOIN inmate i
                                ON i.inmate_id = r.inmate_id

                        WHERE
                        aps.status='Pending' AND
                        YEAR(date)=$year AND
                        MONTH(date)=$month AND
                        i.status != 'Released' AND
                        aps.is_read = 0
                        GROUP BY i.inmate_id
                        ORDER BY date ASC
                "); 

        return $res->result();
    }

    public function getNearEndofStay($year,$month,$day){
        $res = $this->db->query("
                    SELECT
                        *,
                        i.is_read as iis_read,
                        r.is_read as ris_read,
                        r.*
                        FROM cs_reasons r
                            LEFT JOIN inmate i
                                ON i.inmate_id = r.inmate_id

                        WHERE
                        ( r.type = 'Detainee' OR r.type = 'Probation' ) AND
                        release_date is not NULL AND
                        YEAR(release_date)=$year AND
                        MONTH(release_date)=$month AND
                        DATE(release_date) >= '".$year.'-'.$month.'-'.$day."'
                        ORDER BY release_date ASC
                "); 

        return $res->result();
    }

    public function getNearEndofStayCount($year,$month,$day){
        $res = $this->db->query("
                    SELECT
                        *,
                        r.*
                        FROM cs_reasons r
                            LEFT JOIN inmate i
                                ON i.inmate_id = r.inmate_id

                        WHERE
                        ( r.type = 'Detainee' OR r.type = 'Probation' ) AND
                        release_date is not NULL AND
                        YEAR(release_date)=$year AND
                        MONTH(release_date)=$month AND
                        DATE(release_date) >= '".$year.'-'.$month.'-'.$day."' AND
                        i.is_read <= 2
                        ORDER BY release_date ASC
                "); 

        return $res->result();
    }
    public function getAllApprovedAndReject(){
       
        $res = $this->db->query("
                    SELECT
                    er.*,i.inmate_id,concat(i.inmate_fname,' ', i.inmate_mi , ' ', i.inmate_lname) as inmateName,er.status as 'erStat', DATE_FORMAT(er.judgedOn, '%d-%b-%y %h:%i %p') as 'judgedOn' ,Concat(ua.user_fname,' ', ua.user_lname) as judgedByName
                        FROM user_account as ua,editrequest  as er
                            LEFT JOIN inmate as i
                                ON i.inmate_id = er.inmateId
                        WHERE
                        er.requestedBy=".$this->session->userdata('user_id')." AND ua.user_id = er.judgedBy AND MONTH(er.judgedOn)=".mdate("%m",now())." AND YEAR(er.judgedOn)= ".mdate("%Y",now())."
                        ORDER BY er.judgedOn DESC

                "); 
       // echo $this->db->last_query();

        return $res->result();
    }
    public function getOverStayingMonth($year,$month,$day){
        $now = mdate("%Y-%m-%d",now());
        $res = $this->db->query("
                    SELECT
                        *,
                        i.is_read as iis_read,
                        r.is_read as ris_read,
                        r.*,
                        DATEDIFF('$now', DATE(release_date)) as overstayingday,
                        LAST_DAY('".$year.'-'.$month.'-'.$day."') as last_day

                        FROM cs_reasons r
                            LEFT JOIN inmate i
                                ON i.inmate_id = r.inmate_id

                        WHERE
                        ( r.type = 'Detainee' OR r.type = 'Probation' ) AND
                        release_date is not NULL AND
                        i.status != 'Released' AND
                        DATE(release_date) < '".$year.'-'.$month.'-'.$day."'
                        GROUP BY i.inmate_id
                        ORDER BY release_date ASC

                "); 
       // echo $this->db->last_query();

        return $res->result();
    }

    public function getOverStayingMonthCount($year,$month,$day){
        $now = mdate("%Y-%m-%d",now());
        $res = $this->db->query("
                    SELECT
                        *,
                        r.*,
                        DATEDIFF('$now', DATE(release_date)) as overstayingday,
                        LAST_DAY('".$year.'-'.$month.'-'.$day."') as last_day

                        FROM cs_reasons r
                            LEFT JOIN inmate i
                                ON i.inmate_id = r.inmate_id

                        WHERE
                        ( r.type = 'Detainee' OR r.type = 'Probation' ) AND
                        release_date is not NULL AND
                        i.status != 'Released' AND
                        DATE(release_date) < '".$year.'-'.$month.'-'.$day."' AND
                        i.is_read <= 4
                        ORDER BY release_date ASC
                "); 

        return $res->result();
    }

    public function getLogs($limit, $offset){

        $res = $this->db->query("
                    SELECT
                        *,
                        cl.*,
                        ua.*,
                        cl.status as cl_status

                        FROM cs_logs cl
                            LEFT JOIN user_account ua
                                ON ua.user_id = cl.update_by

                        WHERE cl.status='active'
                        ORDER BY created_at DESC
                        LIMIT $offset, $limit
                "); 

        return $res->result();
    }
    public function getCourts($limit, $offset){

        $res = $this->db->query("
                    SELECT *
                        FROM court cl
                        LIMIT $offset, $limit
                "); 

        return $res->result();
    }

    public function getLogsCount(){

    }
}

/* End of file admin_model.php */
/* Location: ./application/models/admin_model.php */