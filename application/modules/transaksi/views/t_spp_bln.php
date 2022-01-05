<form id="form-transaksi" action="<?php echo base_url('transaksi/input_transaksi_limit')?>" method="post"> 
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  <div class="container">
    <!-- Content Header (Page header) -->
    <input type="hidden" value="2" name="id_tipe_transaksi">
    <section class="content-header">
      <h1>
        <?php echo $title;?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('dashboard')?>"><i class="fa fa-home"></i> Menu</a></li>
        <li><a href="<?php echo base_url()?><?php echo $menu?>"><?php echo $menu?></a></li>
        <li><a href="<?php echo base_url()?>"><?php echo $submenu?></a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!--Row -->
        <div class="row">
          <!-- Box -->
          <div class="col-lg-10 col-lg-offset-1 col-sm-12">
              <?php if($this->session->flashdata('pesan_success') != '') { ?>
              <div class="alert alert-dismissible alert alert-info" id="alert"><i class="fa fa-check"></i> <?php echo $this->session->flashdata('pesan_success') ?><button type="button" class="close" data-dismiss="alert">&times;</button></div>
              <?php } ?>
              
              <?php if($this->session->flashdata('pesan_error') != '') { ?>
              <div class="alert alert-dismissible alert alert-warning" id="alert"><i class="fa fa-warning"></i> <?php echo $this->session->flashdata('pesan_error') ?><button type="button" class="close" data-dismiss="alert">&times;</button></div>
              <?php } ?>
          </div>

          <div class="col-lg-3 col-lg-offset-1 col-sm-4 nav-tabs-custom">
            
            <div id="data-qr" style="display:block;">
              <div class="callout callout-success">
                <h4><i class="icon fa fa-info"></i> Info </h4>
                <p>Masukan NIS pada form dibawah ini</p>
              </div>
              <!--
              <div class="row form-group">
                  <label class="col-lg-12" NIS</label>
                  <div class="col-lg-12">
                    <div class="input-group">
                      <input id="nis-cari" type="text" class="form-control" placeholder="Masukan NIS">
                        <span class="input-group-btn">
                          <button type="button" class="search-nis btn btn-info btn-flat"><i class="fa fa-search"></i></button>
                        </span>
                    </div>
                  </div>
              </div>
              -->
                <div class="row form-group">
                <label class="col-lg-12" NIS</label>
                <div class="col-lg-12">
                  <div class="input-group">
                    <input id="no_formulir-cari" type="text" class="form-control" placeholder="Masukan NIS">
                      <span class="input-group-btn">
                        <button type="button" class="search-no_formulir btn btn-info btn-flat"><i class="fa fa-search"></i></button>
                      </span>
                  </div>
                </div>
              </div>
            </div>

          </div>

          <div class="col-lg-7 col-sm-8">
            <div class="box box-success">
              <div class="box-header with-border">
                <h3 class="box-title">Info Siswa</h3>

                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
              </div>
              
              <div class="box-body" id="data-siswa">
                <div class="row form-group">
                  <label class="col-lg-2 col-sm-2 text-right">Nama</label>
                  <label class="col-lg-1 col-sm-1 text-right"> : </label>
                  <div class="col-lg-9 col-sm-9">
                    <input type="text" name="nis" class="form-control" placeholder="" readonly />
                  </div>
                </div>
                <div class="row form-group">
                  <label class="col-lg-2 col-sm-2 text-right">NISN</label>
                  <label class="col-lg-1 col-sm-1 text-right"> : </label>
                  <div class="col-lg-9 col-sm-9">
                    <input type="text" name="nis" class="form-control" placeholder="" readonly />
                  </div>
                </div>
                <div class="row form-group">
                  <label class="col-lg-2 col-sm-2 text-right">Tahun Ajaran</label>
                  <label class="col-lg-1 col-sm-1 text-right"> : </label>
                  <div class="col-lg-9 col-sm-9">
                    <input type="text" name="nis" class="form-control" placeholder="" readonly />
                  </div>
                </div>
                <div class="row form-group">
                  <label class="col-lg-2 col-sm-2 text-right">Jenjang</label>
                  <label class="col-lg-1 col-sm-1 text-right"> : </label>
                  <div class="col-lg-9 col-sm-9">
                    <input type="text" name="nis" class="form-control" placeholder="" readonly />
                  </div>
                </div>
                <div class="row form-group">
                  <label class="col-lg-2 col-sm-2 text-right">Jurusan</label>
                  <label class="col-lg-1 col-sm-1 text-right"> : </label>
                  <div class="col-lg-9 col-sm-9">
                    <input type="text" name="nis" class="form-control" placeholder="" readonly />
                  </div>
                </div>
                <div class="row form-group">
                  <label class="col-lg-2 col-sm-2 text-right">Kelas</label>
                  <label class="col-lg-1 col-sm-1 text-right"> : </label>
                  <div class="col-lg-9 col-sm-9">
                    <input type="text" name="nis" class="form-control" placeholder="" readonly />
                  </div>
                </div>

              </div>
              <div class="box-footer">
              </div>
            </div>

          </div>

          <!--Box-->
          <div class="col-lg-10 col-lg-offset-1 col-sm-12">
            <div class="box box-danger">
              <div class="box-header with-border">
                <h3 class="box-title">Form Pembayaran</h3>
                <!--
                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-danger btn-flat" onclick="show_riwayat()">
                  <i class="fa fa-list"></i> Riwayat</button>
                </div>
                -->
              </div>
              
              <div class="box-body">
                <div class="row form-group">
                  <div class="col-lg-12">
                    <table class="table table-striped table-bordered table-hover">
                      <thead>
                        <tr class="danger">
                          <th style="width:15%" class="text-center">Tahun Ajaran</th>
                          <th style="width:10%" class="text-center">Tingkat</th>
                          <th style="width:10%" class="text-center">Bulan Ke</th>
                          <th style="width:20%" class="text-center">Tarif</th>
                          <th style="width:20%" class="text-center">Nominal</th>
                          
                          <th style="width:5%" class="text-center">Bayar semua</th>
                        </tr>
                      </thead>
                      <tbody id="data-tarif">
                        <tr>
                          <td colspan="7" class="text-center">
                            <h5><i>Isi form diatas terlebih dahulu !</i></h5>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div> 
                </div>

              </div>
              <div class="box-footer">
                <!-- Nothing -->
              </div>
            </div>

          </div>

          <div class="col-lg-10 col-lg-offset-1 col-sm-12">
            <div class="box box-primary">
            <div class="box-footer">
                <div class="pull-right">
                  <button type="button" class="btn btn-primary btn-flat clicksubmit"><i class="fa fa-send"></i> Bayar</button>
                  <!-- <button type="button" onclick="read('1')" class="btn btn-flat btn-default">Test Manual</button> -->
                </div>
              </div>
            </div>
          </div> 

          <!--Box
          <div class="col-lg-10 col-lg-offset-1 col-sm-12">
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">Form Keringanan</h3>

                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
              </div>


              <div class="box-body">
                  <!-- <h5 class="text-center"><i>Isi form data siswa terlebih dahulu !</i></h5> 
                <div style="overflow-x: auto;">
                  <table class="table table-bordered table-hover table-striped">
                      <thead>
                          <tr class="info">
                              <th>Keringanan</th>
                              <th>Item</th>
                              <th style="width:5%">Opsi</th>
                          </tr>
                      </thead>
                      <tbody id="body_row_keringanan">
                        
                      </tbody>
                      <tfoot>
                          <tr>
                              <td colspan="2"></td>
                              <td>
                                  <button type="button" class="btn btn-sm btn-primary btn-flat add_row_keringanan">
                                  <i class="fa fa-plus-circle"></i> </button>
                              </td>
                          </tr>
                      </tfoot>
                  </table>
                </div>  

              </div>
              
              <div class="box-footer">
                <div class="pull-right">
                  <button type="button" class="btn btn-primary btn-flat clicksubmit"><i class="fa fa-send"></i> Submit</button>
                  <button type="button" onclick="read('1')" class="btn btn-flat btn-default">Test Manual</button>
                </div>
              </div>
            </div>
          </div>
          -->

        </div>
      
    </section>
    <!-- /.content -->
  </div>
  </div> 
</form> 

<!-- Modal -->
<div id="riwayat" class="modal fade" role="dialog" tabindex="-1">
<form action="#" role="form" method="post" enctype="multipart/form-data">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Riwayat Pembayaran</h4>
      </div>

      <div class="modal-body">
        <div class="row form-group">
          <!-- Timeline -->
          <div class="col-lg-12 col-sm-12" id="data-riwayat">
            <h5 class="text-center">
              <i>Tidak ada data !</i>
            </h5>
          </div>
        </div>
      </div>

      <div class="modal-footer">
        <!-- Nothing -->
      </div>
      
    </div>
  </div>
</form>
</div>

<script type="text/javascript" src="<?php echo base_url()?>berkas/plugins/qrcode/qrcode-scanner/js/lib/jsqrcode/grid.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>berkas/plugins/qrcode/qrcode-scanner/js/lib/jsqrcode/version.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>berkas/plugins/qrcode/qrcode-scanner/js/lib/jsqrcode/detector.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>berkas/plugins/qrcode/qrcode-scanner/js/lib/jsqrcode/formatinf.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>berkas/plugins/qrcode/qrcode-scanner/js/lib/jsqrcode/errorlevel.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>berkas/plugins/qrcode/qrcode-scanner/js/lib/jsqrcode/bitmat.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>berkas/plugins/qrcode/qrcode-scanner/js/lib/jsqrcode/datablock.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>berkas/plugins/qrcode/qrcode-scanner/js/lib/jsqrcode/bmparser.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>berkas/plugins/qrcode/qrcode-scanner/js/lib/jsqrcode/datamask.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>berkas/plugins/qrcode/qrcode-scanner/js/lib/jsqrcode/rsdecoder.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>berkas/plugins/qrcode/qrcode-scanner/js/lib/jsqrcode/gf256poly.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>berkas/plugins/qrcode/qrcode-scanner/js/lib/jsqrcode/gf256.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>berkas/plugins/qrcode/qrcode-scanner/js/lib/jsqrcode/decoder.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>berkas/plugins/qrcode/qrcode-scanner/js/lib/jsqrcode/QRCode.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>berkas/plugins/qrcode/qrcode-scanner/js/lib/jsqrcode/findpat.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>berkas/plugins/qrcode/qrcode-scanner/js/lib/jsqrcode/alignpat.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>berkas/plugins/qrcode/qrcode-scanner/js/lib/jsqrcode/databr.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>/berkas/plugins/qrcode/qrcode-scanner/js/camera.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>/berkas/plugins/qrcode/qrcode-scanner/js/init.js"></script>

<script type="text/javascript">
var base_url = "<?php echo base_url();?>";

function get_scan_qr() {
  $('#data-qr').attr('style', 'display:block');
  $('#data-img').attr('style', 'display:none');
}

//qrcode.callback = read;
function read(a) {
  var nis = a;
  
  get_data_siswa(nis);
  get_img(nis);
  get_tarif(nis);  
  get_riwayat(nis);
}
//qrcode.callback = read;

function get_data_siswa(nis) {
  //$('#body_row_keringanan').load().html('');
  var url_control = base_url+"transaksi/get_data_siswa_by_nis";
  $.ajax({
    type : "POST",
    url : url_control,
    data : {nis : nis},
    datatype : "HTML",
    success: function(response) {
      if(response == 'null') {
        swal('Gagal !', 'Scan tidak berhasil !', 'error');
      } else if(response == 'notvalid') {
        swal('Gagal !', 'Scan tidak berhasil !', 'error');
      } else {
        //swal('Berhasil !', 'No. Formulir siswa yaitu '+nis, 'success');
        $(document).find('#data-siswa').load().html(response);
      }
    }
  });  
}

function get_img(nis) {
  var url_control = base_url+"transaksi/get_data_img_by_nis";
  $.ajax({
    type : "POST",
    url : url_control,
    data : {nis : nis},
    datatype : "HTML",
    success: function(response) {
      if(response == 'null') {
        //nothing
      } else if(response == 'notvalid') {
        //nothing
      } else {
        $(document).find('#data-img').load().html(response);
        $('#data-qr').attr('style', 'display:none');
        $('#data-img').attr('style', 'display:block');
      }
    }
  });  
}

function get_tarif(nis) {
  var loading = '<tr><td colspan="7"><h5 class="text-center"><i>Loading . . . </i></h5></td></tr>';
  var nothing = '<tr><td colspan="7"><h5 class="text-center"><i>Tidak ada data !</i></h5></td></tr>';
  $(document).find('#data-tarif').load().html(loading);
  var url_control = base_url+"transaksi/get_tarif_limit";
  var id_tipe_transaksi = $('input[name="id_tipe_transaksi"]').val();

  $.ajax({
    type : "POST",
    url : url_control,
    data : {id_tipe_transaksi : id_tipe_transaksi,
            nis : nis},
    datatype : "html",
    success: function(response) {
      if(response == 'null') {
        $(document).find('#data-tarif').load().html(nothing);
      } else if(response == 'notvalid') {
        $(document).find('#data-tarif').load().html(nothing);
      } else {
        $(document).find('#data-tarif').load().html(response);
      }
    }
  });
}

function get_riwayat(nis) {
  var url_control = base_url+"transaksi/get_riwayat_by_nis";
  var id_tipe_transaksi = $('input[name="id_tipe_transaksi"]').val();
  $.ajax({
    type : "POST",
    url : url_control,
    data : {id_tipe_transaksi : id_tipe_transaksi,
            nis : nis},
    datatype : "html",
    success: function(response) {
      if(response == 'null') {
        //nothing
      } else if(response == 'notvalid') {
        //nothing
      } else {
        $(document).find('#data-riwayat').load().html(response);
      }
    }
  });
}

function show_riwayat() {
  $('#riwayat').modal('show');
}

function buy_all(e) {
  var check_tarif = $(e).closest('tr').find('input:checkbox[class="check_tarif"]');
  var checked = $(e).is(':checked');

  if(checked) {
    check_tarif.prop('checked', true);                       
  } else {
    check_tarif.prop('checked', false);                       
  }
}

$(function() {
  //KERINGANAN
  $(document).on('click', '.add_row_keringanan', function() {
    var loading = '<tr><td colspan="3"><h5 class="text-center"><i>Loading . . . </i></h5></td></tr>';
    var nothing = '<tr><td colspan="3"><h5 class="text-center"><i>Tidak ada data !</i></h5></td></tr>';

    var id_tipe_transaksi = $('input[name="id_tipe_transaksi"]').val();
    var nis = $('input[name="nis"]').val();
    var url_control = base_url+"transaksi/get_keringanan_by_nis";

    $.ajax({
      type : "POST",
      url : url_control,
      data : {id_tipe_transaksi : id_tipe_transaksi,
              nis : nis},
      datatype : "html",
      success: function(response) {
        if(response == 'null') {
          $(document).find('#body_row_keringanan').load().html(nothing);
        } else if(response == 'notvalid') {
          $(document).find('#body_row_keringanan').load().html(nothing);
        } else {
          $('#body_row_keringanan').append(response);
        }
      }
    });    
  });

  $(document).on('click', '.del_row_keringanan', function(e) {
    e.preventDefault();
    $(this).parent().parent().remove();
  });


  //SUBMIT ALL DATA
  $(document).on('click', '.clicksubmit', function(e) {
      var form = $('#form-transaksi');
      swal({
        title: "Apakah anda yakin ?",
        text: "Harap untuk cek kembali data pembayaran !",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: '#DD6B55',
        confirmButtonText: 'Ya, saya yakin',
        cancelButtonText: "Tidak, Batal",
        closeOnConfirm: false,
        closeOnCancel: false
      },
      function(isConfirm) {
        if (isConfirm) {
            $('#form-transaksi').submit();
        } else {
            swal("Batal!", "Transaksi dibatalkan !", "error");
        }
      });    
  });

});

$(document).on('click', ".search-nis", function() {
      action  = 'cari';
      var nis = $('#nis-cari').val();
      var data= "nis="+nis;

      cari_siswa(data);
})

$(document).on('click', ".search-no_formulir", function() {
    action  = 'cari';
    var no_formulir = $('#no_formulir-cari').val();
    
    get_data_siswa(no_formulir);
    get_tarif(no_formulir);  
    get_riwayat(nis);
})



</script>


