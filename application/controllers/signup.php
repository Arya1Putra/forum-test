<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class signup extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	function __construct()
		{
			parent::__construct();
			$this->load->model('mod_regis');
		}

	public function index()
	{
		$this->load->view('signup');
	}

	public function proses(){
			$usr = $this->input->post('username1');
      		$psw = $this->input->post('password1');
      		$mail = $this->input->post('email');
      		$data = array(
					'user_id' => $usr,
					'user_pass' => $psw,
					'user_email' => $mail
				);
      		$cek = $this->mod_regis->cek($usr)->result();
      		if ($cek==NULL) {
      			$this->mod_regis->register($data);
      			redirect(site_url('dashboard'),'refresh');
      		}else{
      			log_message('error','Username Telah Digunakan');
      		}
	}
}