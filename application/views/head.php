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
  <link rel="stylesheet" href="<?php echo base_url();?>berkas/plugins/timepicker/bootstrap-timepicker.min.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="<?php echo base_url();?>berkas/plugins/iCheck/all.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="<?php echo base_url();?>berkas/plugins/select2/dist/css/select2.min.css">
  
  <!-- Sweetalert -->
  <link rel="stylesheet" href="<?php echo base_url();?>berkas/plugins/sweetalert/sweetalert.css">
  <!-- Pace Master -->
  <link rel="stylesheet" href="<?php echo base_url();?>berkas/plugins/pace-master/themes/red/pace-theme-material.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url();?>berkas/custom/dist/css/AdminLTE.css">
  <!-- AdminLTE Skins -->
  <link rel="stylesheet" href="<?php echo base_url();?>berkas/custom/dist/css/skins/_all-skins.min.css">
  <!-- Daterangepicker -->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>berkas/plugins/daterangepicker/daterangepicker.css" />

  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>berkas/plugins/clockpicker/dist/bootstrap-clockpicker.min.css" />
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>berkas/plugins/label-beauty/jquery-labelauty.css" />

  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>berkas/plugins/jRoll/src/jRoll.css" />



  
  <!-- Jquery -->
  <script src="<?php echo base_url();?>berkas/plugins/jQuery/jquery-2.2.3.min.js"></script>
  <script src="<?php echo base_url();?>berkas/bootstrap/js/bootstrap.min.js"></script>
  <!-- Sweetalert -->
  <script src="<?php echo base_url();?>berkas/plugins/sweetalert/sweetalert.min.js"></script>
  <!-- Custom -->
  <link rel="stylesheet" href="<?php echo base_url();?>berkas/custom/custom.css">  
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>berkas/plugins/datetimepicker/css/bootstrap-datetimepicker.min.css" />
  <!-- Datatables -->
  <script src="<?php echo base_url();?>berkas/plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="<?php echo base_url();?>berkas/plugins/datatables/dataTables.bootstrap.min.js"></script>



  


</head>

<style type="text/css">
  .content-wrapper,
  .right-side {
    min-height: 100%;
    background-color: #ecf0f5;
    z-index: 800;
  }
  .error{
    color:red;
  }

  
</style>
<script>
  // $(document).ready(function(){
  //   $("#loading").jRoll({
  //     radius: 48,
  //     animation: "heartbeat",
  //     height:'500px'
  //   });
  // });
</script>
<body class="hold-transition skin-green layout-top-nav fixed">
<div class="wrapper">
  <div style="background-color:#384047; color:#fff;">
    <div id="loading"></div>
  </div>
  <header class="main-header">
    <nav class="navbar navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <a href="<?php echo base_url('dashboard')?>" class="navbar-brand"><b>S I A P</b> <i><small>(Sistem Informasi Administrasi Pendidikan)</small></i></a>
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
            <i class="fa fa-bars"></i>
          </button>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
          
        </div>
        <!-- /.navbar-collapse -->
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            
            <!-- User Account Menu -->
            <li class="dropdown user user-menu">
              <!-- Menu Toggle Button -->
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <!-- The user image in the navbar-->
                <img src="<?php echo base_url()?>berkas/img/user.png" class="user-image" alt="User Image">
                <!-- hidden-xs hides the username on small devices so only the image appears. -->
                <span class="hidden-xs"><?php echo $this->session->userdata('nm_user')?> </span>
              </a>
              <ul class="dropdown-menu">
                <!-- The user image in the menu -->
                <li class="user-header">
                  <img src="<?php echo base_url()?>berkas/img/user.png" class="img-circle" alt="User Image">

                  <p>
                    <?php echo $this->session->userdata('nm_user')?> 
                    <small><?php echo $this->session->userdata('nm_role')?></small>
                  </p>
                </li>
               
                <!-- Menu Footer-->
                <li class="user-footer">
                  <div class="pull-left">
                    <!-- <a href="#" class="btn btn-default btn-flat">Profile</a> -->
                  </div>
                  <div class="pull-right">
                    <a href="<?php echo base_url('user/keluar')?>" class="btn btn-default btn-flat">Sign out</a>
                  </div>
                </li>
              </ul>
            </li>
          </ul>
        </div>
        <!-- /.navbar-custom-menu -->
      </div>
      <!-- /.container-fluid -->
    </nav>
  </header>