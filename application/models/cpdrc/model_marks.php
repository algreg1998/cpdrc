<?php
class model_marks extends CI_Model
{
//-------------------------------------------------------------------------------//

// 	CEBU PROVINCIAL DETENTION ADN REHABILITATION CENTER INMATE PROF SYSTEM
//	ALL RIGHTS RESERVED 2015 
//  A CAPSTONE PROJECT OF THE UNIVERSITY OF SAN CARLOS

//-------------------------------------------------------------------------------//

	//THIS MODEL IS ONLY RETRIEVING WHETHER THE BODY PART HAS A CONTENT OR NOT.
        public function __construct()
	 	{
	   		parent::__construct();

	 	}
	 	public function display($id, $type)
	 	{	
	 		$this->db->select('*')->from('inmate_2d')->where('inmate_id', $id)->where('mark_type', $type);
	 		$get = $this->db->get();
	 		$res = array();

	 		foreach ($get->result() as $key) {
	 			$res[] = array('id' => $key->id,
	 						   'name' => $key->mark_name,
	 						   'desc' => $key->mark_desc,
	 						   'type' => $key->mark_type,
	 						   'filename' => $key->mark_filename);
	 		}
	 		return $res;

	 	}
	 	public function gender($id) //checking of the gender...
	 	{
	 		$this->db->select('*')->from('inmate_info')->where('inmate_id', $id);
	 		$get = $this->db->get();

	 		foreach ($get->result() as $key) {
	 			return $gender = $key->gender;
	 		}
	 	}
	 	public function headF($id, $gender)
		{
			if($gender == 'Male'){
				$g = "B1F";
			}
			else{
				$g= "G1F";
			}

			$this->db->select('*')->from('inmate_2d')->where('mark_type', $g)->where('inmate_id', $id);
			$get = $this->db->get();

			if($get->num_rows() > 0){
				return $res = 1;
			}
			else{
				return $res = 0;
			}
		}
		public function bodyF($id, $gender)
		{
			if($gender == 'Male'){
				$g = "B2F";
			}
			else{
				$g = "G2F";
			}

			$this->db->select('*')->from('inmate_2d')->where('mark_type', $g)->where('inmate_id', $id);
			$get = $this->db->get();

			if($get->num_rows() > 0){
				return $res = 1;
			}
			else{
				return $res = 0;
			}
		}
		public function leftarmF($id, $gender)
		{
			if($gender == 'Male'){
				$g = "B3F";
			}
			else{
				$g = "G3F";
			}

			$this->db->select('*')->from('inmate_2d')->where('mark_type', $g)->where('inmate_id', $id);
			$get = $this->db->get();

			if($get->num_rows() > 0){
				return $res = 1;
			}
			else{
				return $res = 0;
			}
		}
		public function rightarmF($id, $gender)
		{
			if($gender == 'Male'){
				$g = "B4F";
			}
			else{
				$g = "G4F";
			}

			$this->db->select('*')->from('inmate_2d')->where('mark_type', $g)->where('inmate_id', $id);
			$get = $this->db->get();

			if($get->num_rows() > 0){
				return $res = 1;
			}
			else{
				return $res = 0;
			}
		}
		public function leftlegF($id, $gender)
		{
			if($gender == 'Male'){
				$g = "B5F";
			}
			else{
				$g = "G5F";
			}

			$this->db->select('*')->from('inmate_2d')->where('mark_type', $g)->where('inmate_id', $id);
			$get = $this->db->get();

			if($get->num_rows() > 0){
				return $res = 1;
			}
			else{
				return $res = 0;
			}
		}
		public function rightlegF($id, $gender)
		{
			if($gender == 'Male'){
				$g = "B6F";
			}
			else{
				$g = "G6F";
			}

			$this->db->select('*')->from('inmate_2d')->where('mark_type', $g)->where('inmate_id', $id);
			$get = $this->db->get();

			if($get->num_rows() > 0){
				return $res = 1;
			}
			else{
				return $res = 0;
			}
		}
		//end of FRONT b&G //
		public function headB($id, $gender)
		{
			if($gender == 'Male'){
				$g = "B1B";
			}
			else{
				$g = "G1B";
			}

			$this->db->select('*')->from('inmate_2d')->where('mark_type', $g)->where('inmate_id', $id);
			$get = $this->db->get();

			if($get->num_rows() > 0){
				return $res = 1;
			}
			else{
				return $res = 0;
			}
		}
		public function bodyB($id, $gender)
		{
			if($gender == 'Male'){
				$g = "B2B";
			}
			else{
				$g = "G2B";
			}

			$this->db->select('*')->from('inmate_2d')->where('mark_type', $g)->where('inmate_id', $id);
			$get = $this->db->get();

			if($get->num_rows() > 0){
				return $res = 1;
			}
			else{
				return $res = 0;
			}
		}
		public function leftarmB($id, $gender)
		{
			if($gender == 'Male'){
				$g = "B3B";
			}
			else{
				$g = "G3B";
			}

			$this->db->select('*')->from('inmate_2d')->where('mark_type', $g)->where('inmate_id', $id);
			$get = $this->db->get();

			if($get->num_rows() > 0){
				return $res = 1;
			}
			else{
				return $res = 0;
			}
		}
		public function rightarmB($id, $gender)
		{
			if($gender == 'Male'){
				$g = "B4B";
			}
			else{
				$g = "G4B";
			}

			$this->db->select('*')->from('inmate_2d')->where('mark_type', $g)->where('inmate_id', $id);
			$get = $this->db->get();

			if($get->num_rows() > 0){
				return $res = 1;
			}
			else{
				return $res = 0;
			}
		}
		public function leftlegB($id, $gender)
		{
			if($gender == 'Male'){
				$g = "B5B";
			}
			else{
				$g = "G5B";
			}

			$this->db->select('*')->from('inmate_2d')->where('mark_type', $g)->where('inmate_id', $id);
			$get = $this->db->get();

			if($get->num_rows() > 0){
				return $res = 1;
			}
			else{
				return $res = 0;
			}
		}
		public function rightlegB($id, $gender)
		{
			if($gender == 'Male'){
				$g = "B6B";
			}
			else{
				$g = "G6B";
			}

			$this->db->select('*')->from('inmate_2d')->where('mark_type', $g)->where('inmate_id', $id);
			$get = $this->db->get();

			if($get->num_rows() > 0){
				return $res = 1;
			}
			else{
				return $res = 0;
			}
		}
		//end of BACK
		public function headL($id, $gender)
		{
			if($gender == 'Male'){
				$g = "B1L";
			}
			else{
				$g = "G1L";
			}

			$this->db->select('*')->from('inmate_2d')->where('mark_type', $g)->where('inmate_id', $id);
			$get = $this->db->get();

			if($get->num_rows() > 0){
				return $res = 1;
			}
			else{
				return $res = 0;
			}
		}
		public function bodyL($id, $gender)
		{
			if($gender == 'Male'){
				$g = "B2L";
			}
			else{
				$g = "G2L";
			}

			$this->db->select('*')->from('inmate_2d')->where('mark_type', $g)->where('inmate_id', $id);
			$get = $this->db->get();

			if($get->num_rows() > 0){
				return $res = 1;
			}
			else{
				return $res = 0;
			}
		}
		public function legL($id, $gender)
		{
			if($gender == 'Male'){
				$g = "B3L";
			}
			else{
				$g = "G3L";
			}

			$this->db->select('*')->from('inmate_2d')->where('mark_type', $g)->where('inmate_id', $id);
			$get = $this->db->get();

			if($get->num_rows() > 0){
				return $res = 1;
			}
			else{
				return $res = 0;
			}
		}
		//end of LEFT
		public function headR($id, $gender)
		{
			if($gender == 'Male'){
				$g = "B1R";
			}
			else{
				$g = "G1R";
			}

			$this->db->select('*')->from('inmate_2d')->where('mark_type', $g)->where('inmate_id', $id);
			$get = $this->db->get();

			if($get->num_rows() > 0){
				return $res = 1;
			}
			else{
				return $res = 0;
			}
		}
		public function bodyR($id, $gender)
		{
			if($gender == 'Male'){
				$g = "B2R";
			}
			else{
				$g = "G2R";
			}

			$this->db->select('*')->from('inmate_2d')->where('mark_type', $g)->where('inmate_id', $id);
			$get = $this->db->get();

			if($get->num_rows() > 0){
				return $res = 1;
			}
			else{
				return $res = 0;
			}
		}
		public function legR($id, $gender)
		{
			if($gender == 'Male'){
				$g = "B3R";
			}
			else{
				$g = "G3R";
			}

			$this->db->select('*')->from('inmate_2d')->where('mark_type', $g)->where('inmate_id', $id);
			$get = $this->db->get();

			if($get->num_rows() > 0){
				return $res = 1;
			}
			else{
				return $res = 0;
			}
		}
		//end of RIGHT


}