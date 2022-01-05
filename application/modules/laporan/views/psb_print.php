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
  <link rel="stylesheet" href="<?php echo base_url();?>berkas/plugins/pace-master/themes/red/pace-theme-material.css">
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
    z-index: 800;
  }
</style>

<body style="background-color: #ffffff: " onload="window.print()">
<div>
<div class="container">

 

<section class="content">
<div class="box-body">
<div class="col-lg-12" style="overflow-x: auto; padding:0;">
            <h4 class="box-title pull-left">
              <?php echo $judul?>
            </h4>
              <table class="table table-bordered table-hover table-striped"  width="100%">
                <thead>
                  <tr class="bgColorBlue">
                    <th>No</th>
                    <th>No. Formulir</th>
                    <th>Nama Siswa</th>
                    <th>Asal Sekolah</th>
                    
                    <th>Gelombang</th>
                    <th>Jenjang</th>
                    <th>Jurusan</th>
                    <th>Tgl. Daftar</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                    $no=1;
                    foreach($data_psb as $data){
                ?>
                    <tr>
                        <td><?php echo $no?></td>
                        <td><?php echo $data->no_formulir?></td>
                        <td><?php echo $data->nama?></td>
                        <td><?php echo $data->asal_sekolah?></td>
                        
                        <td><?php echo $data->gelombang?></td>
                        <td><?php echo $data->jenjang?></td>
                        <td><?php echo $data->jurusan?></td>
                        <td><?php echo $data->tgl_input?></td>
                    </tr>
                <?php
                    $no++;
                    }            
                ?>
                </tbody>
              </table>
</div>
</div>
</secton>

</div>
</div>
  
</body>
</html>