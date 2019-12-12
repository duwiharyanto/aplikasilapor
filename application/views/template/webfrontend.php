<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?= ucwords($global->headline)?> | Administrator</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="<?= base_url();?>asset/plugins/select2/select2.min.css">  
  <link rel="stylesheet" href="<?= base_url();?>asset/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?= base_url();?>asset/fontawesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?= base_url();?>asset/plugins/datatables/dataTables.bootstrap.css"> 
  <link rel="stylesheet" href="<?= base_url();?>asset/plugins/datepicker/datepicker3.css">  
  <link rel="stylesheet" href="<?= base_url();?>asset/plugins/animate-css/animate.css">   
  <link rel="stylesheet" href="<?= base_url();?>asset/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="<?= base_url();?>asset/dist/css/sweetalert.css">
  <link rel="stylesheet" href="<?= base_url();?>asset/dist/css/skins/_all-skins.min.css">
  
  <!--JAVASCRIPT CORE-->
  <script src="<?= base_url();?>asset/plugins/jQuery/jquery-2.2.3.min.js"></script>
  <script src="<?= base_url();?>asset/bootstrap/js/bootstrap.min.js"></script>  
  <script src="<?= base_url()?>asset/plugins/chartjs/Chart.bundle.js"></script>
  <script src="<?= base_url()?>asset/plugins/chartjs/utils.js"></script>
  <script src="<?= base_url();?>asset/plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="<?= base_url();?>asset/plugins/datatables/dataTables.bootstrap.min.js"></script>
  <script src="<?= base_url();?>asset/plugins/select2/select2.full.min.js"></script> 
  <script src="<?= base_url();?>asset/plugins/datepicker/bootstrap-datepicker.js"></script>
  <script src="<?= base_url();?>asset/plugins/ckeditor/ckeditor.js"></script>  
  <script src="<?= base_url();?>asset/dist/js/sweetalert.min.js"></script>
  <script src="<?= base_url();?>asset/dist/js/jquery.priceformat.min.js"></script>  
  <script src="<?= base_url();?>asset/dist/js/jquery.validate.js"></script>
  <script src="<?= base_url();?>asset/plugins/bootstrap-notify/bootstrap-notify.js"></script>
</head>
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">
  <header class="main-header">
    <nav class="navbar navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <a href="<?= site_url()?>" class="navbar-brand"><i class="fa fa-compass"></i><b> BukuTamu</b></a>
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
            <i class="fa fa-bars"></i>
          </button>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
          <ul class="nav navbar-nav">
          <!--SCRIP MELOAD MENU-->
          <?php foreach ($menu as $menu):?>
            <?php if($menu->status==1):?>
              <li class="<?php if($global->menu==$menu->menu_nama){echo 'active';}?> treeview">
                <a href="#">
                  <i class="<?= $menu->menu_ikon?>"></i> <span><?= ucwords($menu->menu_nama)?></span>
                  <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu">
                  <?php foreach($menu->submenu AS $submenu):?>
                     <li class="<?php if($global->submenu_menu==$submenu->menu_nama){echo 'active';}?>"><a href="<?= site_url($submenu->menu_link)?>"><i class="<?= $submenu->menu_ikon?>"></i> <?= ucwords($submenu->menu_nama)?></a></li>
                  <?php endforeach;?>
                </ul>
              </li>            
            <?php else:?>
              <li class="<?php if($global->menu==$menu->menu_nama){echo 'active';}?>"><a href="<?= site_url($menu->menu_link)?>"><i class="<?= $menu->menu_ikon?>"></i> <span><?= ucwords($menu->menu_nama)?></span></a></li>
            <?php endif;?>
          <?php endforeach;?> 
          </ul>
        </div>
      </div>
      <!-- /.container-fluid -->
    </nav>
  </header>
  <!-- Full Width Column -->
  <div class="content-wrapper">
    <div class="container">
      <section class="content-header">
        <h1>
          <span class="<?= $global->ikon?>"></span>
          <?php echo ucwords($global->headline)?>
        </h1>
        <ol class="breadcrumb">
          <li><a href="<?= site_url()?>"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active"><a href="<?= site_url($global->url)?>"><?= ucwords($global->headline)?></a></li>
        </ol>
      </section>
      <section class="content">
      <div class="row">
        <div class="col-sm-12">
            <?php if($this->session->flashdata('success')):?>
              <script type="text/javascript">
                  $.notify({
                    title: '<strong>Informasi</strong>',
                    message: '<?= $this->session->flashdata('success')?>'
                  },{
                    type: 'success'
                  });
              </script>       
            <?php elseif($this->session->flashdata('error')):?>
              <script type="text/javascript">
                  $.notify({
                    title: '<strong>Perhatian </strong>',
                    message: '<?= $this->session->flashdata('error')?>'
                  },{
                    type: 'danger'
                  });
              </script>            
            <?php endif;?>  
          </div>
        </div>      
        <?php
          //KONTEN
          if(file_exists(APPPATH.$global->view)){
             include(APPPATH.$global->view);
          }else{
            echo "halaman view tidak ditemukan";
          }
        ?>
      </section>
      <!-- /.content -->
    </div>
    <!-- /.container -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
    </div>
    <span class="fa fa-question"></span> email : <strong><a href="mailto:haryanto.duwi@gmail.com">haryanto.duwi@gmail.com</a></strong>
  </footer>
</div>
<!-- ./wrapper -->
<!--=============================FOOTER====================================-->
<!-- SlimScroll -->
<script src="<?= base_url();?>asset/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?= base_url();?>asset/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url();?>asset/dist/js/adminlte.min.js"></script>
<script src="<?= base_url();?>asset/dist/js/app.min.js"></script>
<script src="<?= base_url();?>asset/dist/js/demo.js"></script>
</body>
</html>

