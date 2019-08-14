<?php
	class Mod_regis extends CI_Model
	{
		function register($data)
		{
			$this->db->insert('tb_user', $data);
		}

		function cek($uname){
			$this->db->select('*');
			$this->db->from('tb_user');
			$this->db->where('user_id', $uname);
			return $this->db->get(); 
		}
	}
?>