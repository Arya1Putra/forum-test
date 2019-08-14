<?php
   class Mod_login extends CI_Model {
      function cek($usr, $psw) {
         $this->db->select('*');
         $this->db->from('tb_user');
         $this->db->where('user_id', $usr);
         $this->db->where('user_pass', $psw);
         return $this->db->get();
      }

      function setLoginData($cek) {
         foreach ($cek->result() as $qad) {
            $sess_data['id_user'] = $qad->user_id;
            $sess_data['isLogin'] = 1;
         }
         $this->session->set_userdata($sess_data);
      }
   }
?>