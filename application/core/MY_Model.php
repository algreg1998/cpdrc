<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Model extends CI_Model{
	
	function __construct(){
		parent::__construct();
	} 

	
	/**
	* Convert array of fields' name and store it into an array
	*
	* @access	public
	* @param	array
	* @return	array
	*/
	public function array_from_post($fields)
	{
		$data = array();

		foreach ($fields as $field) 
			$data[$field] = $this->input->post($field);

		return $data;
	}
	

	/**
	* Select data from database using the given parameters
	*
	* @access	public
	* @param	string
	* @param	array/string/null
	* @param	bool
	* @param	array/string/null
	* @param	array/string/null
	* @param	integer/null
	* @param	integer
	* @return	object_array/array
	*/
	public function get($table_name,$where=NULL,$single=FALSE,$order_by=NULL,$group_by=NULL,$limit=NULL,$offset=0)
	{
		($where !== NULL) ? $this->db->where($where) : '';

		($order_by !== NULL) ? $this->db->order_by($order_by) : '';

		($group_by !== NULL) ? $this->db->group_by($group_by) : '';

		if($single == TRUE)

			return $this->db->limit(1)->get($table_name)->row();

		else

			$limit != NULL ? $this->db->limit($limit,$offset) : '';
			return $this->db->get($table_name)->result();
	}

	/**
	* @access	public
	* @param	string
	* @param	array/string/null
	*/
	public function get_count($table_name,$where=NULL)
	{
        ($where !== NULL) ? $this->db->where($where) : '';
        $this->db->from($table_name);
        return $this->db->count_all_results();
	}

	/**
	* Select data from database using the given parameters with select features.
	*
	* @access	public
	* @param	string
	* @param	array/string
	* @param	string
	* @param	bool
	* @param	array/string
	* @param	array/string
	* @param	integer
	* @param	integer
	* @return	object_array/array
	*/
	public function get_select($table_name,$where=NULL,$select=NULL,$single=FALSE,$order_by=NULL,$group_by=NULL,$limit=NULL,$offset=0)
	{
		($select !== NULL) ? $this->db->select($select) : '';

		($where !== NULL) ? $this->db->where($where) : '';

		($order_by !== NULL) ? $this->db->order_by($order_by) : '';

		($group_by !== NULL) ? $this->db->group_by($group_by) : '';
		
		if($single == TRUE)

			return $this->db->limit(1)->get($table_name)->row();
		
		else

			$limit != NULL ? $this->db->limit($limit,$offset) : '';
			return $this->db->get($table_name)->result();
	}
	

	/**
	* Insert single row of data into database and return the inserted id.
	*
	* @access	public
	* @param	string
	* @param	array
	* @return	int
	*/
	public function save($table_name, $data)
	{
		$this->db->insert($table_name,$data);

		return $this->db->insert_id();
	}


	/**
	* Insert multiple rows of data into database and return the inserted id.
	*
	* @access	public
	* @param	string
	* @param	2D-array
	* @return	bool
	*/
	public function save_batch($table_name,$data)
	{
		return $this->db->insert_batch($table_name,$data);
	}


	/**
	* Update single row of data into database and return the inserted id.
	*
	* @access	public
	* @param	string
	* @param	array/string
	* @param	2D-array
	* @return	int
	*/
	public function update ($table_name,$where,$data)
	{
		return $this->db->where($where)->update($table_name,$data);
	}
	

	/**
	* Update multiple row of data into database and return the inserted id. 
	* Note: $where_field is equal the name of the field
	* 
	* @access	public
	* @param	string
	* @param	2D-array
	* @param	array/string
	* @return	bool
	*/
	public function update_batch($table_name,$data,$where_field)
	{
		return $this->db->update_batch($table_name,$data,$where_field);
	}


	/**
	* Delete data from database 
	* 
	* @access	public
	* @param	string
	* @param	array/string
	* @return	bool
	*/
	public function delete($table_name,$where)
	{
		return $this->db->where($where)->delete($table_name);
	}


	/**
	* Encryp string into 128bit
	* 
	* @access	public
	* @param	string
	* @return	string
	*/
	public function hash ($string)
	{
		return hash('sha512',$string.config_item('encryption_key'));
	}


	/**
	* Generate a page title of a website
	* 
	* @access	public
	* @return	object_array
	*/
	public function page_title(){
		
		if($this->uri->segment(1)){
		
			($this->uri->segment(1) != '') ? $segment1 = ' | '.$this->uri->segment(1): $segment1 = '';
			($this->uri->segment(2) != '') ? $segment2 = ' | '.$this->uri->segment(2) : $segment2 = '';
		
		}else{
		
			$segment1 = config_item('site_name');
			$segment2 = '';
		
		}
		
		$title = str_replace('_', ' ', $segment1.$segment2);
		
		return ucwords($title);
	}

	/**
	* Joint Tables
	*
	* @access	public
	* @param	string
	* @param	string
	* @param	array
	* @param	array/multidimentional array
	* @param	bool
	* @param	string
	* @param	string/array
	* @param	integer
	* @param	integer
	* @return	object_array/array
	*/
	public function join_table($select="*",$from="",$where=NULL,$join_conditional = array(),$single=FALSE,$order_by=NULL,$group_by=NULL,$limit=NULL,$offset=0){
		
		($where !== NULL) ? $this->db->where($where) : '';
		
		$this->db->select("*");

		$this->db->from($from);

		foreach ($join_conditional as $tbl => $cond){

			if (is_array($cond)) {
				foreach ($cond as $_cond => $type) {
					$this->db->join($tbl,$_cond,$type);
				}
			}else{
				$this->db->join($tbl,$cond);
			}
			
		}
		
		($order_by !== NULL) ? $this->db->order_by($order_by) : '';

		($group_by !== NULL) ? $this->db->group_by($group_by) : '';

		if($single == TRUE)
			return $this->db->limit(1)->get()->row();
		else
			$limit != NULL ? $this->db->limit($limit,$offset) : '';

		return $this->db->get()->result();
	}


	/**
	* Get single user info (sample join)
	* 
	* @access	public
	* @param	array/string
	* @return	object_array
	*/
	public function get_sel_user_info ($where){
		$query = $this->db->where($where)
						->select('
							user_types.user_type,
							user_types.user_type_id,
							employee_types.employment_type,
							employee_types.employment_type_id,
							users.user_id,
							users.first_name,
							users.middle_name,
							users.last_name')
						->from('user_types,employee_types')
						->join('users','users.user_type_id = user_types.user_type_id AND users.employment_type_id = employee_types.employment_type_id')
						->limit(1)
						->get();

		return $query->row();
	}


	/**
	* Get multiple users info (sample join)
	* 
	* @access	public
	* @param	array/string
	* @return	object_array
	*/
	public function get_user_info (){
		$query = $this->db
						->select('
							user_types.user_type,
							employee_types.employment_type,
							users.user_id,
							users.first_name,
							users.middle_name,
							users.last_name')
						->from('user_types,employee_types')
						->join('users','users.user_type_id = user_types.user_type_id AND users.employment_type_id = employee_types.employment_type_id')
						->get();

		return $query->result();
	}


	
}