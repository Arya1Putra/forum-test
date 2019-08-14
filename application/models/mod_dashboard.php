<?php
   class Mod_dashboard extends CI_Model {
      function view_topik() {
         $this->db->select('*');
         $this->db->from('tb_post');
         $this->db->join('tb_user', 'tb_post.user_id = tb_user.user_id');
         $this->db->where('post_kode', '0');
         $this->db->order_by('post_id', 'desc');
         $q = $this->db->get();
         $qr = $q->result();

         $arr_count = array();
         foreach ($qr as $k) {
            $arr_count[$k->post_id] = $this->count_komen($k->post_id, 0);
         }
         
         return array(
            'topik' => $q,
            'komen' => $arr_count
         );
      }

      function count_komen($id_parent, $hasil){
         $this->db->select('post_id');
         $this->db->from('tb_post');
         $this->db->where('post_kode', $id_parent);
         $result = $this->db->get();
         $hasil = $hasil + $result->num_rows();

         foreach ($result->result() as $r) {
            $hasil = $this->count_komen($r->post_id, $hasil);
         }

         return $hasil;
      }

      function get_topik($id_post) {
         $this->db->select('*');
         $this->db->from('tb_post');
         $this->db->join('tb_user', 'tb_post.user_id = tb_user.user_id');
         $this->db->where('tb_post.post_id', $id_post);
         return $this->db->get();
      }

      function get_komen($id_parent, $hasil, $margin) {
         $this->db->select('*');
         $this->db->from('tb_post');
         $this->db->join('tb_user', 'tb_post.user_id = tb_user.user_id');
         $this->db->where('tb_post.post_kode', $id_parent);
         $this->db->order_by('tb_post.post_id', 'desc');
         $result = $this->db->get();

         foreach ($result->result() as $r) {
            $hasil .= "<div class='well well-sm clearfix' style='margin-bottom: 7px; margin-left: ".$margin."px;'>";
            $hasil .= "<div class='bordered'><p><b>".$r->user_id."</b> mengatakan...</p></div>";
            $hasil .= "<div class='row'>";
            $hasil .= "<div class='col-lg-11'>";
            $hasil .= "<div><p>".$r->post_isi."</p></div>";
            $hasil .= "</div>";
            $hasil .= "<div class='col-lg-1'>";
            $hasil .= "<div class='pull-right'><button class='btn btn-sm btn-success btn-reply' onclick='click_reply(".$r->post_id.")'>Reply</button></div>"; 
            $hasil .= "</div>";
            $hasil .= "</div>"; //end div row
            $hasil .= "</div>"; //end div well
            
            //kolom utk reply komen
            $hasil .= "<div class='rep-comm-sect clearfix' id='rep-comm-sect".$r->post_id."' style='margin-bottom: 7px; margin-left: ".$margin."px;'>";
            $hasil .= "<div class='form-group'>";
            $hasil .= "<form method='post' action='../reply_komen/".$r->post_id."'>";
            $hasil .= "<textarea class='form-control' name='komen_reply".$r->post_id."' rows='2' required></textarea>";
            $hasil .= "<div class='pull-right' style='margin-top: 5px;'><button type='submit' class='btn btn-sm btn-success btn-submit-reply'>Submit</button></div>";
            $hasil .= "</form>";
            $hasil .= "</div>"; //end div form-group
            $hasil .= "</div>"; //
            
            $hasil = $this->get_komen($r->post_id, $hasil, $margin+25);
         }

         return $hasil;
      }

      function submit_post($data){
         $this->db->insert('tb_post', $data);
      }
   }
?>