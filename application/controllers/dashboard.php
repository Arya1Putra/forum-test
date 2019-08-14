<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	class Dashboard extends CI_Controller {
		function __construct()
		{
			parent::__construct();
			$this->load->model('mod_dashboard');
		}

		public function index()
		{
			$get_topik = $this->mod_dashboard->view_topik();
			if ($get_topik['topik']->num_rows() == 0){
				$data['topik'] = 0;
			} else {
				$data['topik'] = $get_topik['topik']->result();
				$data['komen'] = $get_topik['komen'];
			}
			$this->load->view('header');
			$this->load->view('dashboard', $data);
			$this->load->view('footer');
		}
	}
?>