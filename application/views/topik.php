  <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper" style="background-color: #d9d9d9;">
         <!-- Content Header (Page header) -->
         <section class="content-header"></section>
         <section class="content wrapper">
            <?php foreach ($det_topik as $dt) { ?>
               <div class="box box-default">
                  <div class="box-header with-border" style="font-size: 20px; font-weight: bold;">
                     <?php echo $dt->post_judul; ?>
                     <br>
                     <span style="font-size: 15px; font-weight: normal;">Oleh : <?php echo $dt->user_id; ?></span>
                  </div>
                  <div class="box-body">
                     <span style="white-space: pre-line;"><?php echo $dt->post_isi; ?></span>
                  </div>
               </div> 
               <div class="box box-default no-border">
                  <div class="box-header with-border">
                     <div class="form-group">
                        <label for="Textarea">Berikan Komentarmu</label>
                        <?php if ($this->session->flashdata('error')) { ?>
                           <div class="alert alert-danger animated fadeInDown" role="alert">
                              <button type="button" class="close" data-dismiss="alert">&times;</button>
                              <strong>Error!</strong>
                              <?php echo $this->session->flashdata('error'); ?>
                           </div>
                        <?php } ?>
                        <form id="form_komen" method="post" action="<?php echo site_url("topik/submit_komen/$dt->post_id") ?>">
                           <textarea class="form-control" name="komen_teks" rows="3"></textarea>
                           <button id="submit_komen" class="btn btn-success pull-right" style="margin-top: 1%;">Submit</button>
                        </form>
                     </div>
                  </div>
                  <div class="box-body"> 
                     <label>Komentar Mereka</label>
                     <?php echo $komen; ?>
                  </div>
               </div>
            <?php } ?>
         </section>
         <!-- Main content -->
      </div>
      <!-- /.content-wrapper -->

      <div class="modal fade" id="modalLogin" role="dialog">
         <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
               <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4><span class="glyphicon glyphicon-log-in"></span> Login User</h4>
               </div>
               <div class="modal-body">
                  <?php if ($this->session->flashdata('result_login')) { ?>
                     <div class="alert alert-danger animated fadeInDown" role="alert">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong>Error!</strong>
                        <?php echo $this->session->flashdata('result_login'); ?>
                     </div>
                  <?php } ?>
                  <form action="<?php echo site_url('login/proses'); ?>" method="post">
                     <div class="form-group">
                        <label for="usrname"><span class="glyphicon glyphicon-user"></span> Username</label>
                        <input type="text" class="form-control" name="usrname" placeholder="Masukkan username">
                     </div>
                     <div class="form-group">
                        <label for="psw"><span class="glyphicon glyphicon-lock"></span> Password</label>
                        <input type="password" class="form-control" name="psw" placeholder="Masukkan password">
                     </div>
                     <button type="submit" class="btn btn-success btn-block">Login</button>
                  </form>
               </div>
               <div class="modal-footer">
                  <span class="pull-right">Belum Punya Akun ? <a href="<?php echo site_url('signup') ?>">Registrasi Disini</a></span>
               </div>
            </div>
         </div>
      </div>

   <script type="text/javascript">
      $('document').ready(function(){
         $('.rep-comm-sect').hide();

         <?php if($this->session->flashdata('result_login')) { ?>
            $('#modalLogin').modal();
         <?php } ?>

         // <?php if($this->session->userdata('isLogin') != 1) { ?>
         //    $('#submit_komen').attr('disabled', 'disabled');
         //    $('.btn-reply').attr('disabled', 'disabled');
         // <?php } ?>

         $('#login_btn').click(function(){
            $('#modalLogin').modal();
         });

         $('#submit_komen').click(function(){
            <?php if ($this->session->userdata('isLogin') != 1) { ?>
               $('#modalLogin').modal();
            <?php } else { ?>
              $('#form_komen').submit();
            <?php } ?>
         });
      });

      function click_reply(id_post){
         <?php if ($this->session->userdata('isLogin') != 1) { ?>
            $('#modalLogin').modal();
         <?php } else { ?>
            $('#rep-comm-sect'+id_post).slideToggle();
         <?php } ?>
      }
   </script>