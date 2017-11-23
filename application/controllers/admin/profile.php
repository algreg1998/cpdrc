<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->helper('date');
	}
	
	public function index()
	{
		$user_id = $this->session->userdata('user_id');
		$profile_info = $this->admin_model->get('user_account',array('user_id'=>$user_id),TRUE);
		// $query = $this->db->get_where('file',array("inmate_id"));

		// 	    	$data['courts'] = $query->result();

		$this->data['profile_info'] = $profile_info;

		$this->data['title']	= 'Profile';
		$this->data['css']		= array();
		$this->data['js_top']	= array();
		$this->data['header'] 	= $this->load->view('admin/header_view',$this->data,TRUE);
		$this->data['body'] 	= $this->load->view('admin/profile_view',NULL,TRUE);
		$this->data['footer'] 	= $this->load->view('footer_view',NULL,TRUE);
		$this->data['js_bottom']= array();
		$this->data['custom_js']= '<script type="text/javascript">
										$(function(){
										});
									</script>';
		$this->load->view('templates',$this->data);
	}

	public function edit()
	{
		$user_id = $this->session->userdata('user_id');
		$profile_info = $this->admin_model->get('user_account',array('user_id'=>$user_id),TRUE);

		$this->data['profile_info'] = $profile_info;

		$this->form_validation->set_rules('user_fname','first name','trim|xss_clean|strip_tags|required');
		$this->form_validation->set_rules('user_mi','middle name','trim|xss_clean|strip_tags');
		$this->form_validation->set_rules('user_lname','last name','trim|xss_clean|strip_tags|required');
		$this->form_validation->set_rules('username','username','trim|xss_clean|strip_tags|required');
		$this->form_validation->set_rules('email','email','required|valid_email');

		if ($this->form_validation->run() !== FALSE) {
			$arr_data = $this->admin_model
						->array_from_post(
							array('user_fname',
								'user_mi',
								'user_lname',
								'username',
								'email'
							)
						);

			$user_id = $this->session->userdata('user_id');
			$where = array('user_id' => $user_id);
			$update = $this->admin_model->update('user_account',$where,$arr_data);
			$this->session->set_flashdata('success_msg','Profile was successfully updated.');
			redirect(current_url_full());
		}

		$this->data['title']	= 'Profile';
		$this->data['css']		= array();
		$this->data['js_top']	= array();
		$this->data['header'] 	= $this->load->view('admin/header_view',$this->data,TRUE);
		$this->data['body'] 	= $this->load->view('admin/profile_edit_view',NULL,TRUE);
		$this->data['footer'] 	= $this->load->view('footer_view',NULL,TRUE);
		$this->data['js_bottom']= array();
		$this->data['custom_js']= '<script type="text/javascript">
										$(function(){
										});
									</script>';
		$this->load->view('templates',$this->data);
	}

	public function changepassword()
	{
		$this->form_validation->set_rules('current_password','current password','required');
		$this->form_validation->set_rules('new_password','new password','required');
		$this->form_validation->set_rules('confirm_new_password','confirm new password','required|matches[new_password]');
		//dump($this->admin_model->hash('admin')); die();
		if ($this->form_validation->run() != FALSE)
		{
			$current_password = $this->admin_model->hash($this->input->post('current_password'));
			$chkr = $this->admin_model->get('user_account',array('password'=>$current_password),TRUE);
			if (empty($chkr)) {
				$this->session->set_flashdata('error_msg','Current password is incorrect.');
				redirect(base_url('admin/profile/changepassword'));
			}

			$new_password = $this->admin_model->hash($this->input->post('new_password'));
			$userid = $this->session->userdata('user_id');
			$update = $this->admin_model->update('user_account',array('user_id'=>$userid),array('password'=>$new_password));
			
			$this->session->set_flashdata('success_msg','Password was successfully changed.');
			redirect(base_url('admin/profile/changepassword'));
		}

		$this->data['title']	= 'Profile';
		$this->data['css']		= array();
		$this->data['js_top']	= array();
		$this->data['header'] 	= $this->load->view('admin/header_view',$this->data,TRUE);
		$this->data['body'] 	= $this->load->view('admin/profile_changepassword_view',NULL,TRUE);
		$this->data['footer'] 	= $this->load->view('footer_view',NULL,TRUE);
		$this->data['js_bottom']= array();
		$this->data['custom_js']= '<script type="text/javascript">
										$(function(){
										});
									</script>';
		$this->load->view('templates',$this->data);
	}

	public function changepicture()
	{
		$admin_id = $this->session->userdata('user_id');
        
        // $this->load->library('form_validation');
        $this->form_validation->set_rules('img_x','Please make a selection','required');
        $this->form_validation->set_rules('img_y','Please make a selection','required');
        $this->form_validation->set_rules('img_w','Please make a selection','required');
        $this->form_validation->set_rules('img_h','Please make a selection','required');

        if ($this->form_validation->run() !== FALSE) {
            //upload first the image
            $img_x = $this->input->post('img_x');
            $img_y = $this->input->post('img_y');
            $img_w = $this->input->post('img_w');
            $img_h = $this->input->post('img_h');
            
            //make required directories...
            $date_dir = mdate("%Y-%m-%d",now());
            if (!file_exists('./uploads/temp/')){
                mkdir('./uploads/temp',0777,true);
            }
            if (!file_exists('./uploads/temp/'.$date_dir)){
                mkdir('./uploads/temp/'.$date_dir,0777,true);
            }
            if (!file_exists('./uploads/cropped/')){
                mkdir('./uploads/cropped',0777,true);
            }
            if (!file_exists('./uploads/cropped/')){
                mkdir('./uploads/temp',0777,true);
            }
            
            $temp_img = './uploads/temp/'.$date_dir.'/';
            $config['upload_path'] = $temp_img;
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size'] = '5920'; //5MB
            $config['max_width']  = '4096';
            $config['max_height']  = '4096';
            $config['encrypt_name']  = TRUE;

            $this->load->library('upload', $config);
            
            $temp_info = array();
            
            if ( ! $this->upload->do_upload('photo'))
            {
                $error = $this->upload->display_errors();
                $this->session->set_flashdata('error_msg',$error);
                $r = isset( $_GET['redirect'] ) ? $this->a_encrypt->decode( $_GET['redirect'] ) : current_url_full();
                redirect($r);
            }
            else
            {
                $temp_info = array('upload_data' => $this->upload->data());
            }
            
            //crop...
            if (!file_exists('./uploads/admin/')){
                mkdir('./uploads/admin',0777,true);
            }
            if (!file_exists('./uploads/admin/'.$admin_id)){
                mkdir('./uploads/admin/'.$admin_id,0777,true);
            }
            
            $img_name = $temp_info['upload_data']['file_name'];
            $config['x_axis'] = $this->input->post('img_x');
            $config['y_axis'] = $this->input->post('img_y');
            
            $cropped_pic = './uploads/cropped/'.$img_name;
            $config['image_library'] = 'gd2';
            $config['source_image'] = $temp_info['upload_data']['full_path'];
            $config['new_image'] = $cropped_pic;
            $config['width'] = $this->input->post('img_w');
            $config['height'] = $this->input->post('img_h');
            $config['maintain_ratio'] = FALSE;
            
            
            $this->load->library('image_lib', $config);
            $this->image_lib->clear();
            $this->image_lib->initialize($config);
            
            if ( ! $this->image_lib->crop())
            {
                $error = $this->image_lib->display_errors();
                $this->session->set_flashdata('error_msg',$error);
                $r = isset( $_GET['redirect'] ) ? $this->a_encrypt->decode( $_GET['redirect'] ) : current_url_full();
                redirect($r);

            }
            else
            {
                
                $large_img = './uploads/admin/'.$admin_id.'/'.$img_name;
                $config['image_library'] = 'gd2';
                $config['source_image'] = $cropped_pic;
                $config['create_thumb'] = TRUE;
                $config['maintain_ratio'] = FALSE;
                $config['new_image'] = $large_img;
                $config['width']     = 256;
                $config['height']   = 256;

                $this->image_lib->clear();
                $this->image_lib->initialize($config);
                
                if ( ! $this->image_lib->resize())
                {
                    $error = $this->image_lib->display_errors();
                    $this->session->set_flashdata('error_msg',$error);
                    $r = isset( $_GET['redirect'] ) ? $this->a_encrypt->decode( $_GET['redirect'] ) : current_url_full();
                    redirect($r);

                }
                else
                {
                    $this->session->set_flashdata('success_msg','Profile picture was successfully saved!');

                    //remove temp photos
                    unlink($cropped_pic);
                    unlink($temp_info['upload_data']['full_path']);
                    //update admin photo...
                    $where = array('user_id' => $admin_id);
                    $data = array('user_filename' => $img_name);
                    $this->admin_model->update('user_account',$where,$data);
                    
                    
                    $r = isset( $_GET['redirect'] ) ? $this->a_encrypt->decode( $_GET['redirect'] ) : base_url('admin/profile');
                    redirect($r);

                }
            }
        }

		$this->data['title']	= 'Profile';
		$this->data['css']		= array('css/cropper.css');
		$this->data['js_top']	= array();
		$this->data['header'] 	= $this->load->view('admin/header_view',$this->data,TRUE);
		$this->data['body'] 	= $this->load->view('admin/profile_changepicture_view',NULL,TRUE);
		$this->data['footer'] 	= $this->load->view('footer_view',NULL,TRUE);
		$this->data['js_bottom']= array('js/cropper.js','js/changepicture.js');
		$this->data['custom_js']= '<script type="text/javascript">
										$(function(){
										});
									</script>';
		$this->load->view('templates',$this->data);
	}

	public function logout()
	{
		$sess_data = array(
				'is_logged_in' 	=> '',
				'user_type' 	=> '',
				'user_id'		=> ''
			);

		$this->session->set_userdata($sess_data);
		$this->session->sess_destroy();
		redirect(base_url('login'));
	}
}

/* End of file profile.php */
/* Location: ./application/controllers/profile.php */