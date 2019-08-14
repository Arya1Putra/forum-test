<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	class Topik extends CI_Controller {
		function __construct()
		{
			parent::__construct();
			$this->load->model('mod_dashboard');
		}

		public function view($id_post)
		{
			$data['det_topik'] = $this->mod_dashboard->get_topik($id_post)->result();
			$data['komen'] = $this->mod_dashboard->get_komen($id_post, $hasil="", 0);
			$this->load->view('header');
			$this->load->view('topik', $data);
			$this->load->view('footer');
		}

		public function submit_komen($id_post){
			$komen = $this->input->post('komen_teks');
			if ($komen == ''){
				$this->session->set_flashdata('error', 'harap isi komentar anda !');
			}else{
				$data = array(
					'post_judul' => '',
					'post_isi' => $komen,
					'user_id' => $this->session->userdata['id_user'],
					'post_kode' => $id_post
				);
				$this->mod_dashboard->submit_post($data);
			}
			redirect(site_url("topik/view/$id_post"));
		}

		public function reply_komen($id_post){
			$komen = $this->input->post('komen_reply'.$id_post);
			$data = array(
				'post_judul' => '',
				'post_isi' => $komen,
				'user_id' => $this->session->userdata['id_user'],
				'post_kode' => $id_post
			);
			$this->mod_dashboard->submit_post($data);
			redirect($this->input->server('HTTP_REFERER'));
		}
	}
?>