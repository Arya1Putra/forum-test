<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
  <link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>
<body>
  <div id="wrapper" style="background:black;">
    <div class="wrp">
      <img style="position: relative; margin-left: 310px; margin-top: 20px;" src="assets/img/a.jpg">
      <h3 class="contact100-form-title-1">Sign Up Form</h3><br /><br />
      <form action="<?php echo site_url('signup/proses'); ?>" class="contact100-form" method="POST">

              <div class="wrap-input100" data-validate="Masukkan Username Anda">
                <span class="label-input100">Username *</span>
                <input class="input100" type="text" name="username1" placeholder="Masukkan Username Anda" required>
              </div>
              <div class="wrap-input100" data-validate="Masukkan Password Anda">
                <span class="label-input100">Password *</span>
                <input class="input100" type="password" name="password1" placeholder="Masukkan Password Anda" required>
              </div>
              <div class="wrap-input100" data-validate="Masukkan Email Anda">
                <span class="label-input100">Email *</span>
                <input class="input100" type="email" name="email" placeholder="Masukkan Email Anda" required>
              </div>
    
              <input align="center" style="width: 100%; padding: 5px;" type="Submit" name="login" value="Submit" class="tombol_login"> 
      </form>
    </div>
    
  </div>
</body>


</html>

