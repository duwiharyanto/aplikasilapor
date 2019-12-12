<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Kegiatan | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php  echo base_url();?>asset/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php  echo base_url();?>asset/fontawesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php  echo base_url();?>asset/ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php  echo base_url();?>asset/dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php  echo base_url();?>asset/plugins/iCheck/square/blue.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <?php if(!empty($this->session->flashdata('error'))):?>
    <div class="alert alert-danger alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <h4><i class="icon fa fa-ban"></i> Perhatian !</h4>
        <?= $this->session->flashdata('error')?>
    </div>    
  <?php endif;?>
  <div class="login-logo">
    <a href="<?= site_url()?>"><b>Registrasi </b>User</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
   <p class="login-box-msg">Daftar user</p>
    <form action="<?php  echo base_url('Login/prosesdaftar');?>" method="post">
      <div class="form-group">
        <label>Email</label>
        <input type="email" name="user_email" class="form-control">
      </div>      
      <div class="form-group">
        <label>Username</label>
        <input required type="text" name="user_username" class="form-control">
      </div>
      <div class="form-group">
        <label>Password</label>
        <input required type="password" name="user_password" class="form-control">
      </div> 
      <div class="form-group">
            <label>
              <input required type="checkbox"> Setuju</a>
            </label>
      </div>      
      <div class="form-group">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Daftar</button>
      </div> 
      <div class="row">
        <div class="col-sm-12">
          <div class="form-group">
            <a href="<?= site_url('login')?>" class="pull-left">Sudah punya akun, silahkan login</a>
          </div>          
        </div>
      </div>          
    </form>
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 2.2.3 -->
<script src="<?php  echo base_url();?>asset/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php  echo base_url();?>asset/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
