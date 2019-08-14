  <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper" style="background-color: #d9d9d9;">
         
         <section class="content-header" align="center">
            <img src="<?php echo base_url('assets/img/a.png')?>" class="user-image" alt="User Image">
         </section>
         <section class="content wrapper" ">
            <?php if ($this->session->flashdata('success')) { ?>
               <div class="alert alert-success animated fadeInDown" role="alert">
                  <button type="button" class="close" data-dismiss="alert">&times;</button>
                  <strong>Sukses!</strong>
                  <?php echo $this->session->flashdata('success'); ?>
               </div>
            <?php } ?>
            <div class="box box-default wrapper">
               <div class="box-header with-border">
                  <button class="btn btn-success" id="posting_topik"><span class="glyphicon glyphicon-plus"></span> Posting Topik</button>
               </div>
               <div class="box-body">
                  <?php if ($topik == 0) { ?>
                     <p><strong>Tidak Ada Topik</strong></p>
                  <?php } else { ?>
                     <?php foreach ($topik as $t) { ?>
                        <div class="panel panel-default" style="margin-bottom: 10px;">
                              <div class="panel-body">
                                 <div class="row">
                                    <div class="col-lg-10">
                                       <div class="panel-info pull-left">
                                          <a href="<?php echo site_url("topik/view/$t->post_id"); ?>">
                                             <p><strong><?php echo $t->post_judul; ?></strong></p>
                                          </a>
                                          <p>Oleh : <?php echo $t->user_id; ?></p>
                                       </div>
                                    </div>
                                    <div class="col-lg-2">
                                       <div class="panel-more pull-right">
                                          <br/><span><?php echo $komen[$t->post_id]; ?> Komentar</span>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                        </div>   
                     <?php } ?>
                  <?php } ?>
               </div>
            </div> 
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
         <?php if($this->session->flashdata('result_login')) { ?>
            $('#modalLogin').modal();
         <?php } ?>

         $('#posting_topik').click(function(){
            <?php if ($this->session->userdata('isLogin') == 1) { ?>
               window.location.href = "<?php echo site_url('posting_topik'); ?>";
            <?php } else { ?>
               $('#modalLogin').modal();
            <?php } ?>
         });
         $('#login_btn').click(function(){
            $('#modalLogin').modal();
         });
      });
   </script>