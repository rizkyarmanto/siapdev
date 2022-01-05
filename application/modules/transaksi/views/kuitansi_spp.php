<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Kuitansi</title>
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
<div class="col-lg-8 box-body" style="border:1px solid;">
    <div class="col-lg-12 text-center">
        <h4>KUITANSI PEMBAYARAN SPP</h4>
    </div>
    <table border="0" width="100%">
        <tr><td colspan="3">Telah diterima pembayaran dari : </td></tr>
        <tr><td style="width: 150px; padding-left:10px;">NIS </td>
            <td style="width: 5px;">:</td>
            <td>&nbsp;<?php echo $nis?></td>
        </tr>
        <tr><td style="width: 150px; padding-left:10px;">Nama Siswa </td>
            <td>:</td>
            <td>&nbsp;<?php echo $nama?></td>
        </tr>        
        <tr><td style="width: 150px; padding-left:10px;">Kelas </td>
            <td>:</td>
            <td>&nbsp;<?php echo $tingkat?> - <?php echo $urutan?></td>
        </tr>
        <tr><td colspan="3">&nbsp;</td></tr>
        <tr><td colspan="3">Untuk pembayaran </td></tr>
        <tr>
            <td colspan="3">
            <table border="1" width="100%" class="table table-bordered" cellspacing="2">
                <tr>
                    <th width="6%" class="text-center">No</th>
                    <th class="text-center">Jenis Pembayaran</th>
                    <th class="text-center">Jumlah</th>
                </tr>
                <?php
                    $no=1;
                    $tot=0;
                    foreach($data as $data){
                    $tot = $tot + $data->nominal;
                ?>
                <tr>
                    <td class="text-center"><?php echo $no?></td>
                    <td><?php echo $data->nama_tarif?></td>
                    <td class="text-right"><?php echo number_format($data->nominal, 0,",",".");?></td>
                </tr>
                <?php 
                    $no++;
                    }
                ?>
                <tr>
                    <td colspan="2" class="text-center">Total</td><td class="text-right"><?php echo number_format($tot, 0,",",".");?></td>
                </tr>
                
            </table>
            </td>
        </tr>
        <tr><td colspan="3">&nbsp;</td></tr>
        <tr><td colspan="3">
                Jakarta, &nbsp;<?php echo date('d M Y');?> <br />
                
                <br />
                <br />
                (Bendahara)
            </td>
        </tr>
    </table>

</div>
</secton>

</div>
</div>
  
</body>
</html>