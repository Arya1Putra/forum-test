<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	class Posting_topik extends CI_Controller {
		function __construct()
		{
			parent::__construct();
			$this->load->model('mod_dashboard');
			if ($this->session->userdata('isLogin') != 1){
				redirect(site_url());
			}
		}

		public function index()
		{
			$this->load->view('header');
			$this->load->view('posting_topik');
			$this->load->view('footer');
		}

		public function proses(){
			$judul = $this->input->post('judul');
			$konten = $this->input->post('konten');
			$data = array(
				
				'post_judul' => $judul,
				'post_isi' => $konten,
				'user_id' => $this->session->userdata['id_user'],
				'post_kode' => '0'
			);
			$this->mod_dashboard->submit_post($data);
			redirect(site_url());
		}
	}
?>