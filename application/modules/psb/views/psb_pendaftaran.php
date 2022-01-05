<form id="form-transaksi" action="<?php echo base_url('transaksi/input_t_psb')?>" method="post"> 
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  <div class="container">
    <!-- Content Header (Page header) -->
    <input type="hidden" value="1" name="id_tipe_transaksi">
    <input type="hidden" value="0" name="tingkat">
    <input type="hidden" value="0" name="id_bulan">
    <section class="content-header">
      <h1>
        <?php echo $title;?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('dashboard')?>"><i class="fa fa-home"></i> Menu</a></li>
        <li><a href="<?php echo base_url($submenu)?>"><?php echo $menu?></a></li>
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

          <!--Box-->
          <div class="col-lg-10 col-lg-offset-1 col-sm-12">
            <div class="box box-success">
              <div class="box-header with-border">
                <h3 class="box-title">Formulir Pendaftaran</h3>

                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
              </div>

              <div class="box-body" id="data-siswa">
                <div class="row form-group">
                  <label class="col-lg-2 col-sm-2 text-right"><font color="red">*</font> Nomor Formulir</label>
                  <label class="col-lg-1 col-sm-1 text-right"> : </label>
                  <div class="col-lg-9 col-sm-9">
                    <div class="input-group">
                      <input type="hidden" name="no_urut_form" size="5" value="<?php echo $no_urut?>">
                      <input type="text" name="no_formulir" class="form-control" placeholder="Nomor formulir" value="<?php echo $no_formulir?>" readonly>
                        <!--
                        <span class="input-group-btn">
                          <button type="button" class="btn btn-success btn-flat" onclick="get_siswa()">
                            <i class="fa fa-search"></i> Cari
                          </button>
                        </span>
                        -->
                    </div>
                  </div>
                </div>
                <div class="row form-group">
                  <label class="col-lg-2 col-sm-2 text-right"><font color="red">*</font> Tahun Ajaran</label>
                  <label class="col-lg-1 col-sm-1 text-right"> : </label>
                  <div class="col-lg-9 col-sm-9">
                    <select name="id_ta" class="form-control">
                      <?php echo $ta?>
                    </select>
                  </div>
                </div>
                <div class="row form-group">
                  <label class="col-lg-2 col-sm-2 text-right"><font color="red">*</font> Gelombang</label>
                  <label class="col-lg-1 col-sm-1 text-right"> : </label>
                  <div class="col-lg-9 col-sm-9">
                    <?php echo $glb?>
                  <!--
                    <select name="id_gelombang" class="form-control" onchange="get_tarif(this)">
                      <?php echo $glb?>
                    </select> -->
                  </div>
                </div>
                <div class="row form-group">
                  <label class="col-lg-2 col-sm-2 text-right"><font color="red">*</font> Nama Siswa</label>
                  <label class="col-lg-1 col-sm-1 text-right"> : </label>
                  <div class="col-lg-9 col-sm-9">        
                    <input type="text" name="nama" class="form-control" placeholder="Masukan nama siswa" />
                  </div>
                </div>
                <div class="row form-group">
                  <label class="col-lg-2 col-sm-2 text-right">Asal Sekolah</label>
                  <label class="col-lg-1 col-sm-1 text-right"> : </label>
                  <div class="col-lg-9 col-sm-9">
                    <input type="text" name="asal_sekolah" class="form-control" placeholder="Masukan asal sekolah" />
                  </div>
                </div>
                <div class="row form-group">
                  <label class="col-lg-2 col-sm-2 text-right">Nama Orang Tua</label>
                  <label class="col-lg-1 col-sm-1 text-right"> : </label>
                  <div class="col-lg-9 col-sm-9">
                    <input type="text" name="nama_ortu" class="form-control" placeholder="Masukan nama orang tua" />
                  </div>
                </div>
                <div class="row form-group">
                  <label class="col-lg-2 col-sm-2 text-right">No. Telpon</label>
                  <label class="col-lg-1 col-sm-1 text-right"> : </label>
                  <div class="col-lg-9 col-sm-9">
                    <input type="text" name="telpon" class="form-control" placeholder="Masukan nomor telpon" />
                  </div>
                </div>
                <div class="row form-group">
                  <label class="col-lg-2 col-sm-2 text-right"><font color="red">*</font> Jenjang</label>
                  <label class="col-lg-1 col-sm-1 text-right"> : </label>
                  <div class="col-lg-9 col-sm-9">
                    <select name="id_jenjang" class="form-control" onchange="get_tarif(this); get_jurusan(this)">
                      <?php echo $jenjang?>
                    </select>
                  </div>
                </div>
                <div class="row form-group">
                  <label class="col-lg-2 col-sm-2 text-right"><font color="red">*</font> Jurusan</label>
                  <label class="col-lg-1 col-sm-1 text-right"> : </label>
                  <div class="col-lg-9 col-sm-9">
                    <select name="id_jurusan" class="form-control" onchange="get_tarif(this)">
                      <option value="0" disabled="disabled" selected="selected">- Pilih jurusan -</option>
                    </select>
                  </div>
                </div>
                <div class="row form-group">
                  <label class="col-lg-2 col-sm-2 text-right">Jenis Keringanan</label>
                  <label class="col-lg-1 col-sm-1 text-right"> : </label>
                  <div class="col-lg-9 col-sm-9">
                    <select name="id_keringanan" class="form-control" onchange="get_tarif(this)">
                      <?php echo $keringanan?>
                    </select>
                  </div>
                </div>
                
              </div>
              <div class="box-footer">
              </div>
            </div>
          </div>

          <!--Box
          <div class="col-lg-10 col-lg-offset-1 col-sm-12">
            <div class="box box-danger">
              <div class="box-header with-border">
                <h3 class="box-title">Form Pembayaran</h3>

                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-danger btn-flat" onclick="show_riwayat()"><i class="fa fa-list"></i> Riwayat</button>
                </div>
              </div>
              
              <div class="box-body">
                <div class="row form-group">
                  <div class="col-lg-12">
                    <table class="table table-striped table-bordered table-hover">
                      <thead>
                        <tr class="danger">
                          <th class="text-center">No.</th>
                          <th class="text-center">Tarif</th>
                          <th class="text-right">Kekurangan</th>
                          <th class="text-right">Keringanan</th>
                          <th class="text-right">Bayar sebagian</th>
                          <th class="text-right">Bayar semua</th>
                        </tr>
                      </thead>
                      <tbody id="data-tarif">
                        <tr>
                          <td colspan="6" class="text-center">
                            <h5><i>Isi form diatas terlebih dahulu !</i></h5>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div> 
                </div>

              </div>
              <div class="box-footer">
                <!-- Nothing 
              </div>
            </div>

          </div>
          -->
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
                </div>
              </div>
            </div>
          </div>
          -->
          <div class="col-lg-10 col-lg-offset-1 col-sm-12">
            <div class="box box-primary">


              <div class="box-footer">
                <div class="pull-right">
                  <button type="button" class="btn btn-primary btn-flat clicksubmit"><i class="fa fa-send"></i> Simpan dan Cetak Formulir</button>
                </div>
              </div>
            </div>
          </div>

        </div>
      
    </section>
    <!-- /.content -->
  </div>
  </div> 
</form> 

<!-- Modal 
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
          <!-- Timeline 
          <div class="col-lg-12 col-sm-12" id="data-riwayat">
            <h5 class="text-center">
              <i>Tidak ada data !</i>
            </h5>
          </div>
        </div>
      </div>

      <div class="modal-footer">
        <!-- Nothing here 
      </div>
      
    </div>
  </div>
</form>
</div>
-->

<!-- Scripting -->
<script>
var base_url = "<?php echo base_url();?>";

function get_jurusan(e) {
  var id = $(e).val();
  var url_control1 = base_url+"transaksi/get_jurusan";
  
  $.ajax({
    type : "POST",
    url : url_control1,
    data : {id : id},
    datatype : "html",
    success: function(d) {
      $(document).find('select[name="id_jurusan"]').load().html(d);

    }
  });
} 

function get_tarif() {
  $(document).find('#data-tarif').load()
  .html('<tr><td colspan="6"><h5 class="text-center"><i>Loading . . . </i></h5></td></tr>');
  
  $('#body_row_keringanan').load().html('');

  var id_tipe_transaksi = $('input[name="id_tipe_transaksi"]').val();
  var id_siswa = $('input[name="id_siswa"]').val();  
  var tingkat = $('input[name="tingkat"]').val();
  var url_control1 = base_url+"transaksi/get_tarif_psb";
  
  if(id_siswa == 0) {
    var id_ta = $('select[name="id_ta"]').val();
    var id_gelombang = $('select[name="id_gelombang"]').val();
    var id_jenjang = $('select[name="id_jenjang"]').val();
    var id_jurusan = $('select[name="id_jurusan"]').val();
  } else {
    var id_ta = $('input[name="id_ta"]').val();
    var id_gelombang = $('input[name="id_gelombang"]').val();
    var id_jenjang = $('input[name="id_jenjang"]').val();
    var id_jurusan = $('input[name="id_jurusan"]').val();
  }
 
  $.ajax({
    type : "POST",
    url : url_control1,
    data : {id_tipe_transaksi : id_tipe_transaksi,
            id_siswa : id_siswa,
            id_ta : id_ta,
            id_gelombang : id_gelombang,
            id_jenjang : id_jenjang,
            id_jurusan : id_jurusan,
            tingkat : tingkat},
    datatype : "html",
    success: function(d) {
      $(document).find('#data-tarif').load().html(d);
    }
  });
}

function buy_all(e) {
  var nom_buy = $(e).closest('tr').find('input[name="nominal[]"]');
  var nom_all = $(e).data("nom");
  var checked = $(e).is(':checked');          
  
  if(checked) {
    nom_buy.val(nom_all);
    nom_buy.attr('readonly', 'true');
  } else {
    nom_buy.val(0);
    nom_buy.removeAttr('readonly');
  }
}

function get_riwayat() {
  var no_formulir = $('input[name="no_formulir"]').val();
  var id_tipe_transaksi = $('input[name="id_tipe_transaksi"]').val();
  var url_control1 = base_url+"transaksi/get_riwayat_by_nofor";
  $.ajax({
    type : "POST",
    url : url_control1,
    data : {no_formulir : no_formulir,
            id_tipe_transaksi : id_tipe_transaksi},
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

//GET DATA SISWA BY NO FORMULIR
function get_siswa() {
  var no_formulir = $('input[name="no_formulir"]').val();
  var url_control1 = base_url+"transaksi/get_data_siswa_by_nofor";
  Pace.restart();
  $.ajax({
    type : "POST",
    url : url_control1,
    data : {no_formulir : no_formulir},
    datatype : "html",
    success: function(response) {
      if(response == 'null') {
        swal("Gagal !", "No Formulir tidak boleh kosong !", "error");
      } else if(response == 'notvalid') {
        swal("Gagal !", "No Formulir tidak valid !", "error");
        $('input[name="no_formulir"]').val('');
      } else {
        $(document).find('#data-siswa').load().html(response);
        get_tarif();
        get_riwayat();
      }
    }
  });
}

function show_riwayat() {
  $('#riwayat').modal('show');
}


$(function() {
  //KERINGANAN
  $(document).on('click', '.add_row_keringanan', function() {
    var id_tipe_transaksi = $('input[name="id_tipe_transaksi"]').val();
    var id_siswa = $('input[name="id_siswa"]').val();
    var tingkat = $('input[name="tingkat"]').val();
    var url_control1 = base_url+"transaksi/get_keringanan_psb";
    
    if(id_siswa == 0) {
      var id_ta = $('select[name="id_ta"]').val();
      var id_gelombang = $('select[name="id_gelombang"]').val();
      var id_jenjang = $('select[name="id_jenjang"]').val();
      var id_jurusan = $('select[name="id_jurusan"]').val();
      var id_keringanan = $('select[name="id_keringanan"]').val();
    } else {
      var id_ta = $('input[name="id_ta"]').val();
      var id_gelombang = $('input[name="id_gelombang"]').val();
      var id_jenjang = $('input[name="id_jenjang"]').val();
      var id_jurusan = $('input[name="id_jurusan"]').val();
      var id_keringanan = $('select[name="id_keringanan"]').val();
    }

    $.ajax({
      type : "POST",
      url : url_control1,
      data : {id_tipe_transaksi : id_tipe_transaksi,
              id_siswa : id_siswa,
              id_ta : id_ta,
              id_gelombang : id_gelombang,
              id_jenjang : id_jenjang,
              id_jurusan : id_jurusan,
              tingkat : tingkat},
      datatype : "html",
      success: function(d) {
        $('#body_row_keringanan').append(d);
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
        text: "Harap untuk cek kembali data yang akan dimasukan !",
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

</script>