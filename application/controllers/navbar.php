<?php
	class Navbar extends CI_Controller{
		 static public function loadNav () {
			$this->data['title']    = 'Manage Inmate';
			$this->data['css']      = array();
			$this->data['js_top']   = array();
			$this->data['header']   = $this->load->view('admin/header_view',$this->data,TRUE);
			$this->data['body']     = $this->load->view($this->session->flashdata('path'),$this->session->flashdata('data'),TRUE);
			$this->data['footer']   = $this->load->view('footer_view',NULL,TRUE);
			$this->data['js_bottom']= array();
			$this->data['custom_js']= '<script type="text/javascript">
				$(function(){
				});
			</script>';
			$this->load->view('templates',$this->data);
		}
	}
?>