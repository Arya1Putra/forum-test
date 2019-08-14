<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Forum</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="<?php echo base_url('assets/template/back/dist/css/AdminLTE.min.css')?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/template/back/dist/css/skins/_all-skins.min.css')?>">
  <script type="text/javascript" src="<?php echo base_url('assets/js/jquery.min.js')?>"></script>
  <script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap.min.js')?>"></script>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css')?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/customs.css')?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/style.css')?>">
<body class="hold-transition skin-green layout-top-nav boxed-layout">
  <div class="wrapper">
    <header class="main-header">
      <!-- Header Navbar: style can be found in header.less -->
      <nav class="navbar navbar-inverse navbar-static-top" style="background: black;">
        <div class="navbar-header" style="background: red;">
          <a href="<?php echo(site_url()); ?>" style="background: #b30000;" class="navbar-brand logo">
            <span  class="logo-lg">OSHIETE FORUMU</span>
          </a>
        </div>
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <?php if ($this->session->userdata('isLogin') == 0) { ?>
              <div class="navbar-form">
                <button class="btn btn-default" id="login_btn">Login Here</button>
              </div>
            <?php } else { ?>
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="<?php echo base_url('assets/img/a.png')?>" class="user-image" alt="User Image">
                  <span class="hidden-xs" style="color:white;"><?php echo $this->session->userdata('id_user') ?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">                  
                      <img src="<?php echo base_url('assets/img/a.png')?>" class="img-circle" alt="User Image">

                      <?php echo '<p>Hai, Selamat Datang  '.$this->session->userdata('id_user').' '?>
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-right">
                      <a href="<?php echo site_url('login/logOut') ?>" class="btn btn-default btn-flat">Log out</a>
                    </div>
                  </li>
                </ul>
              </li>
            <?php } ?>
          </ul>
        </div>
      </nav>
    </header>
