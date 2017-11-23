<?php
session_start();
      class Userupdate extends Admin_Controller
      {
            public function __construct()
            {
                  parent::__construct();
                  $this->load->model('cpdrc/cpdrc_fw','',TRUE);
            }

            public function index()
            {
            	$id = $this->input->post('dbid');
            	$upd = array('username' => $this->input->post('username'),
            				 'user_lname' => $this->input->post('user_lname'),
            				 'user_fname' => $this->input->post('user_fname'),
            				 'user_mi' => $this->input->post('user_mi'),
            				 'user_address' => $this->input->post('user_add'),
            				 'user_contact' => $this->input->post('user_contact') );
            	$this->db->where('user_id', $id);
            	$this->db->update('user_account', $upd);

					echo "<div class='alert alert-warning alert-dismissible' role='alert'>
					  <button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button>
					  <strong>Success!</strong> information successfully updated.
					</div>";

            }

            public function changepass()
            {
            	$id = $this->input->post('dbid');
            	$new = $this->input->post('password');
            	$confirm = $this->input->post('confirm');

            	$array = array('password' => $new );

            	if(strcmp($new, $confirm) != 0){
					echo "<div class='alert alert-danger alert-dismissible' role='alert'>
					  <button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button>
					  <strong>Warning!</strong> password didn't match. <a href='".base_url()."index.php/cpdrc/pages/settings'>Try again.</a>
					</div>";
            	}
            	else{

            		$this->db->where('user_id', $id);
            		$this->db->update('user_account', $array);

					echo "<div class='alert alert-warning alert-dismissible' role='alert'>
					  <button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button>
					  <strong>Success!</strong> password successfully updated.
					</div>";
            	}
            }
      }