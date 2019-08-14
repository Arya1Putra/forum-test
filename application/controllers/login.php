<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	class Login extends CI_Controller {
		function __construct()
		{
			parent::__construct();
			$this->load->model('mod_login');
		}

		public function proses(){
			$usr = $this->input->post('usrname');
      		$psw = $this->input->post('psw');
      		$cek = $this->mod_login->cek($usr, $psw);
      		if ($cek->num_rows() > 0) { //login berhasil, buat session
      			$this->mod_login->setLoginData($cek);
            	redirect($this->input->server('HTTP_REFERER'));
      		} else {
       			$this->session->set_flashdata('result_login', 'Username atau Password Salah.');
        		redirect($this->input->server('HTTP_REFERER'));
      		}
		}

		public function logOut(){
			$this->session->sess_destroy();
			redirect($this->input->server('HTTP_REFERER'));
		}
	}
?>