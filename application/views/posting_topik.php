  <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
         <!-- Content Header (Page header) -->
         <section class="content-header" align="center">
            <img src="<?php echo base_url('assets/img/a.png')?>" class="user-image" alt="User Image">
         </br>
            <label><h2>POSTING TOPIK</h2></label>
         </section>
         <section class="content">
            <?php if ($this->session->flashdata('error')) { ?>
               <div class="alert alert-danger animated fadeInDown" role="alert">
                  <button type="button" class="close" data-dismiss="alert">&times;</button>
                  <strong>Error!</strong>
                  <?php echo $this->session->flashdata('error'); ?>
               </div>
            <?php } ?>
            <div class="box box-default">
               <div class="box-body">
                  <form method="post" action="<?php echo site_url('posting_topik/proses'); ?>">
                     <div class="form-group">
                        <label for="judul">Judul Postingan</label>
                        <input class="form-control" type="text" name="judul" required>
                     </div>
                     <div class="form-group">
                        <label for="konten">Konten Postingan</label>
                        <textarea class="form-control" rows="10" name="konten" required></textarea>
                     </div>
                     <div class="form-group pull-right">
                        <button class="btn btn-lg btn-success">Submit Post</button>
                     </div>
                  </form>
               </div>
            </div> 
         </section>
         <!-- Main content -->
      </div>
      <!-- /.content-wrapper -->