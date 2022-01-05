<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $title?></title>
  <link rel="shortcut icon" href="<?php echo base_url();?>berkas/img/iconsiap.png">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo base_url();?>berkas/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="<?php echo base_url();?>berkas/plugins/datepicker/datepicker3.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="<?php echo base_url();?>berkas/plugins/iCheck/all.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="<?php echo base_url();?>berkas/plugins/select2u/select2.css">
  <!-- Sweetalert -->
  <link rel="stylesheet" href="<?php echo base_url();?>berkas/plugins/sweetalert/sweetalert.css">
  <!-- Pace Master -->
  <link rel="stylesheet" href="<?php echo base_url();?>berkas/plugins/pace-master/themes/red/pace-theme-loading-bar.css">  
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url();?>berkas/custom/dist/css/AdminLTE.css">
  <!-- AdminLTE Skins -->
  <link rel="stylesheet" href="<?php echo base_url();?>berkas/custom/dist/css/skins/_all-skins.min.css">
  <!-- Daterangepicker -->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>berkas/plugins/daterangepicker/daterangepicker.css" />
  <!-- Jquery -->
  <script src="<?php echo base_url();?>berkas/plugins/jQuery/jquery-2.2.3.min.js"></script>
  <!-- Sweetalert -->
  <script src="<?php echo base_url();?>berkas/plugins/sweetalert/sweetalert.min.js"></script>
  <!-- Custom -->
  <link rel="stylesheet" href="<?php echo base_url();?>berkas/custom/custom.css">  

  <!-- Datatables -->
  <script src="<?php echo base_url();?>berkas/plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="<?php echo base_url();?>berkas/plugins/datatables/dataTables.bootstrap.min.js"></script>
</head>

<style type="text/css">
  .content-wrapper,
  .right-side {
    min-height: 100%;
    background: url('<?php echo base_url()?>berkas/img/bg-siap.jpg') repeat fixed;
    /*background-color: #ecf0f5;*/
    z-index: 800;
  }
</style>

<body class="hold-transition skin-green layout-top-nav fixed">
<div class="wrapper">

  <header class="main-header">
    <nav class="navbar navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <a href="#" class="navbar-brand"><b>S I A P</b> <i>(Sistem Informasi Administrasi Pendidikan)</i></a>
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
            <i class="fa fa-bars"></i>
          </button>
        </div>

        
        <!-- /.navbar-collapse -->
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            
            <!-- User Account Menu -->
            <li class="dropdown user user-menu">
              <!-- Menu Toggle Button -->
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <span class="hidden-xs">Version 1.0.0</span>
              </a>
            </li>
          </ul>
        </div>
        <!-- /.navbar-custom-menu -->
      </div>
      <!-- /.container-fluid -->
    </nav>
  </header>

  <!-- Full Width Column -->
  <div class="content-wrapper">
    <div class="container">

      <form action="<?php echo base_url('user/masuk')?>" method="post">
      <div class="login-box">
        <div class="login-box-body">
          
          <div class="login-logo">
            <a href="#"><font color="#666">SMKN 26 JAKARTA</font></a>
          </div>
          <!-- <div class="sublogin-logo">
            <a href="#"><font color="#666">ds</font></a>
          </div> -->
          <p class="login-box-msg"><i>Silahkan isi username dan password</i></p>

            <div class="form-group has-feedback">
              <input type="text" name="username" class="form-control" placeholder="Username" autofocus>
              <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
              <input type="password" name="password" class="form-control" placeholder="Password">
              <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>

          <div class="social-auth-links text-center">
           <!--  <p>- OR -</p> -->
            <button type="submit" class="btn btn-block btn-flat btn-primary"><i class="fa fa-mail-forward"></i> Login</button>
            <button type="button" class="btn btn-block btn-flat btn-danger" data-toggle="modal" data-target="#reset_password"><i class="fa fa-question"></i> Lupa Password </button>
          </div>

          <div class="text-center">
            <i>
              <p>
                <small>
                  Jalan Balai Pustaka Baru 1, Rawamangun, Pulo Gadung, RT.2/RW.7, Rawamangun, 
                  Jakarta Timur, Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta 13220
                </small>
              </p>
            </i>
          </div>
          
          <?php if($this->session->flashdata('pesan') != '') { ?>
          <div style="text-align:center" class="btn btn-flat btn-block btn-social alert alert-dismissible alert-danger">
              <button type="button" class="close" data-dismiss="alert">x</button> <?php echo $this->session->flashdata('pesan')?>
          </div>
          <?php } ?>

        </div>
        <!-- /.login-box-body -->
      </div>
      <!-- /.login-box -->
      </form>

    </div>
  </div>

  <div id="reset_password" class="modal fade" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header btn-success">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Reset Password</h4>
        </div>
        <div class="modal-body col-lg-12">
          <div class="form-horizontal">
              <div class="row form-group">
                <label class="control-label col-md-2" style="text-align:left;">Email</label>
                <div class="col-md-10">
                  <input class="form-control" type="email" name="email">
                </div>
              </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" onClick="saving(this)" data-dismiss="modal" class="btn btn-success">Submit</button>
        </div>
      </div>
    </div>
  </div>

  <footer class="main-footer" style="background-color: #00A65A; color: white; border:none">
    <!-- <div class="text-center">
      <b>WWW.26CODER.NET</b>
    </div> -->
    <div class="text-center">
      Copyright &copy; 2016 <strong>26Coder</strong> All rights
    reserved. | www.26coder.id
    </div>
    <!-- <div class="text-center">
      wWW.26CODER.NET
    </div> -->
  </footer>
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- Bootstrap -->
<script src="<?php echo base_url();?>berkas/bootstrap/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>berkas/custom/dist/js/app.min.js"></script>
<!-- Pace loading -->
<script src="<?php echo base_url();?>berkas/plugins/pace-master/pace.js"></script>
</body>
</html>
