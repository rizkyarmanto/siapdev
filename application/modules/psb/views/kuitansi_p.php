<?php
$this->session->set_flashdata("pesan_success", "Pembayaran berhasil dilakukan !");
?>
<div class="content-wrapper">
<div class="container">

  <!-- Content Header (Page header) -->
  <input type="hidden" id="paramCtrl" value="kuitansi">
  <section class="content-header">
   <h1>
     <?php echo $title;?>
     <small></small>
   </h1>
   <ol class="breadcrumb" id="dashboard-pageBar"></ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Row -->
    <div class="row">
      <div class="col-lg-10 col-lg-offset-1 col-sm-12">
              <?php if($this->session->flashdata('pesan_success') != '') { ?>
              <div class="alert alert-dismissible alert alert-info" id="alert"><i class="fa fa-check"></i> <?php echo $this->session->flashdata('pesan_success') ?><button type="button" class="close" data-dismiss="alert">&times;</button></div>
              <?php } ?>
              
              <?php if($this->session->flashdata('pesan_error') != '') { ?>
              <div class="alert alert-dismissible alert alert-warning" id="alert"><i class="fa fa-warning"></i> <?php echo $this->session->flashdata('pesan_error') ?><button type="button" class="close" data-dismiss="alert">&times;</button></div>
              <?php } ?>
      </div>

      <!-- Box -->
      <div class="col-lg-10 col-lg-offset-1 col-sm-12">
        <div class="box box-success">
          <div class="box-header with-border">
            <div style="text-align: center;">
              <h4>
                KUITANSI PEMBAYARAN
              </h4>
            </div>
          </div>
          <form action="">
          <div class="box-body">

            <div class="row">
                <div class="col-md-6">
                Telah diterima pembayaran dari : 
                </div>
            </div>
            <div class="row">
                <div style="margin-left: 30px;" class="col-md-6">
                No. Formulir : 
                </div>
            </div>
            <div class="row">
                <div  style="margin-left: 30px;" class="col-md-6">
                Nama Siswa : 
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                Untuk Pembayaran 
                </div>
            </div>
            <div class="row col-md-6">
                <table class="table table-bordered">
                  <tr>
                    <th>No</th><th>Jenis Pembayaran</th><th>Jumlah</th>
                  </tr>
                </table>
            </div>

            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="form-group">
                       <button type="button" id="tampil" class="btn bg-orange btn-block btn-md">Cetak</button>
                    </div>
                  
                </div>
            </div>
          <!-- /.row -->
            </div>
          </div>
          </form>

        </div>
      </div>
    </div>
  </section>
  <!-- /.content -->

  
</div>
</div>  



<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript">

$('#tampil').click(function(){
    var no_formulir  =   $('#no_formulir').val();
    $.ajax({
        url : "<?php echo base_url('pengolahan_siswa/showListProfilSiswa')?>",
        dataType: "json",
        data: 
            {
                no_formulir:no_formulir,
            },
        type: "POST",
        success: function(data) {
            $('#dataShow').html(data);
        }
    });
});

</script>
