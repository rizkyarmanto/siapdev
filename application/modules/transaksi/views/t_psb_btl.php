<form id="form-transaksi" action="<?php echo base_url('transaksi/input_transaksi_psb')?>" method="post"> 
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  <div class="container">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo $title_page;?>
        <small><?php echo $menu?> > <?php echo $submenu?></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('dashboard')?>"><i class="fa fa-home"></i> Menu</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-10 col-lg-offset-1 col-sm-12">
              <?php if($this->session->flashdata('pesan_success') != '') { ?>
              <div class="alert alert-dismissible alert alert-info" id="alert"><i class="fa fa-check"></i> <?php echo $this->session->flashdata('pesan_success') ?><button type="button" class="close" data-dismiss="alert">&times;</button></div>
              <?php } ?>
              
              <?php if($this->session->flashdata('pesan_error') != '') { ?>
              <div class="alert alert-dismissible alert alert-warning" id="alert"><i class="fa fa-warning"></i> <?php echo $this->session->flashdata('pesan_error') ?><button type="button" class="close" data-dismiss="alert">&times;</button></div>
              <?php } ?>

              <!-- <div class="alert alert-dismissible alert alert-danger" id="alert"> 
                <h4><i class="icon fa fa-info"></i> Info </h4><button type="button" class="close" data-dismiss="alert">&times;</button>
                <p>Apabila siswa sebelumnya sudah mendaftarkan diri, dan akan melakukan pelunasan, anda bisa memasukan nisn siswa pada form cari siswa untuk mencari siswa. Tetapi apabila siswa baru akan mendaftarkan diri untuk pertama kali, anda bisa abaikan form cari siswa, dan isi form data siswa.</p>
              </div> -->
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

              <div class="box-body">
                <div class="row form-group">
                  <label class="col-lg-2 col-sm-2 text-right"><font color="red">*</font> Nomor Formulir</label>
                  <label class="col-lg-1 col-sm-1 text-right"> : </label>
                  <div class="col-lg-9 col-sm-9">
                    <div class="input-group">
                      <input type="text" class="form-control" placeholder="Masukan nomor formulir">
                        <span class="input-group-btn">
                          <button type="button" class="btn btn-warning btn-flat"><i class="fa fa-search"></i> Cari</button>
                        </span>
                    </div>
                  </div>
                </div>
                <div class="row form-group">
                  <label class="col-lg-2 col-sm-2 text-right"><font color="red">*</font> Nama Siswa</label>
                  <label class="col-lg-1 col-sm-1 text-right"> : </label>
                  <div class="col-lg-9 col-sm-9">
                    <input type="text" name="nama_siswa" class="form-control" placeholder="Masukan nama siswa" />
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
                    <select name="id_gelombang" class="form-control">
                      <?php echo $glb?>
                    </select>
                  </div>
                </div>
                <div class="row form-group">
                  <label class="col-lg-2 col-sm-2 text-right"><font color="red">*</font> Jenjang</label>
                  <label class="col-lg-1 col-sm-1 text-right"> : </label>
                  <div class="col-lg-9 col-sm-9">
                    <select name="id_jenjang" class="form-control">
                      <?php echo $jenjang?>
                    </select>
                  </div>
                </div>
                <div class="row form-group">
                  <label class="col-lg-2 col-sm-2 text-right"><font color="red">*</font> Jurusan</label>
                  <label class="col-lg-1 col-sm-1 text-right"> : </label>
                  <div class="col-lg-9 col-sm-9">
                    <select name="id_jurusan" class="form-control">
                      <option value="0" disabled="disabled" selected="selected">- Pilih jurusan -</option>
                    </select>
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

                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
              </div>


              <div class="box-body tarif">
                <!-- <h5 class="text-center"><i>Isi form data siswa terlebih dahulu !</i></h5> -->
                <div class="row form-group">
                  <label class="col-lg-4 col-sm-4" style="">
                    Formulir
                  </label>
                  <div class="col-lg-4 col-sm-4">
                    <input name="id_tarif_nilai[]" type="hidden" value="1">
                    <input name="nominal[]" type="number" min="1000" max="500000000" 
                    class="form-control input-sm text-right" style="margin:0" placeholder="300,000"/>
                  </div>
                  <div class="col-lg-4 col-sm-4">
                     <input style="text-align:right" type="text" class="form-control input-sm" style="margin:0"
                     value="300,000" required readonly/>
                  </div>
                </div>
                <div class="row form-group">
                  <label class="col-lg-4 col-sm-4" style="">
                    Pendaftaran
                  </label>
                  <div class="col-lg-4 col-sm-4">
                    <input name="id_tarif_nilai[]" type="hidden" value="1">
                    <input name="nominal[]" type="number" min="1000" max="500000000" 
                    class="form-control input-sm text-right" style="margin:0" placeholder="5,000,000"/>
                  </div>
                  <div class="col-lg-4 col-sm-4">
                     <input style="text-align:right" type="text" class="form-control input-sm" style="margin:0"
                     value="5,000,000" required readonly/>
                  </div>
                </div>
                <div class="row form-group">
                  <label class="col-lg-4 col-sm-4" style="">
                    Gedung
                  </label>
                  <div class="col-lg-4 col-sm-4">
                    <input name="id_tarif_nilai[]" type="hidden" value="1">
                    <input name="nominal[]" type="number" min="1000" max="500000000" 
                    class="form-control input-sm text-right" style="margin:0" placeholder="10,000,000"/>
                  </div>
                  <div class="col-lg-4 col-sm-4">
                     <input style="text-align:right" type="text" class="form-control input-sm" style="margin:0"
                     value="10,000,000" required readonly/>
                  </div>
                </div>
                <div class="row form-group">
                  <label class="col-lg-4 col-sm-4">
                  </label>
                  <label class="col-lg-4 col-sm-4">
                    Total Harga
                  </label>
                  <div class="col-lg-4 col-sm-4">
                    <input style="text-align:right" type="text" class="form-control input-sm vtotalharga" 
                    value="15,300,000" readonly>
                    <input type="hidden" name="totalharga" class="form-control input-sm totalharga" 
                    value="15300000" readonly>
                  </div>
                </div>

              </div>

              <div class="box-footer">
                
              </div>
            </div>
          </div>

          <!--Box-->
          <div class="col-lg-10 col-lg-offset-1 col-sm-12">
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">Form Keringanan</h3>

                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
              </div>


              <div class="box-body tarif">
                  <!-- <h5 class="text-center"><i>Isi form data siswa terlebih dahulu !</i></h5> -->
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
                        <tr id="row_keringanan">
                          <td>
                            <select name="id_keringanan_nilai[]" class="form-control input-sm">
                              <option value="0" selected="selected">- Pilih keringanan -</option>
                            </select>
                          </td>
                          <td>
                            <select name="id_tarif_nilai_for_keringanan[]" class="form-control input-sm">
                              <option value="0" selected="selected">- Pilih tarif -</option>
                            </select>
                          </td>
                          <td>
                              <button type="button" class="btn btn-sm btn-danger del_row_keringanan">
                              <i class="fa fa-minus-circle"></i> </button>
                          </td>
                        </tr>
                      </tbody>
                      <tfoot>
                          <tr>
                              <td colspan="2"></td>
                              <td>
                                  <button type="button" class="btn btn-sm btn-primary add_row_keringanan">
                                  <i class="fa fa-plus-circle"></i> </button>
                              </td>
                          </tr>
                      </tfoot>
                  </table>
                </div>  

              </div>
              <div class="box-footer">
                <div class="pull-right">
                  <button type="button" class="btn btn-danger"><i class="fa fa-send"></i> Hangus</button>
                  <button type="button" class="btn btn-primary"><i class="fa fa-send"></i> Batal</button>
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


<!-- Scripting -->
<script>
var base_url = "<?php echo base_url();?>";

function get_tarif() {
  $('.boxtarif').find('.tarif').load().html('<h4 class="text-center"><i>Loading . . .</i></h4>');
  $('#body_row_keringanan').load().html('');

  var tipe_transaksi = 'psb';
  var id_siswa = $('input[name="id_siswa"]').val();
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
  var tingkat = 0;
  var url_control1 = base_url+"transaksi/get_tarif";

  if((id_ta || id_gelombang || id_jenjang) != 0) {
    if(id_jenjang == 3 && id_jurusan == 0) {
      swal("Maaf !", "Harap pilih jurusan terlebih dahulu !", "error");
    } else {
      $.ajax({
        type : "POST",
        url : url_control1,
        data : {tipe_transaksi : tipe_transaksi,
                id_siswa : id_siswa,
                id_ta : id_ta,
                id_gelombang : id_gelombang,
                id_jenjang : id_jenjang,
                id_jurusan : id_jurusan,
                tingkat : tingkat},
        datatype : "html",
        success: function(d) {
          $('.boxtarif').find('.tarif').load().html(d);
        }
      });
    }
  }
}

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

function find_siswa() {
  var tipe_transaksi = 'psb';
  var tingkat = 0;
  var no_formulir = $('input[name="no_formulir"]').val();
  var url_control1 = base_url+"transaksi/get_data_by_no_formulir";
  Pace.restart();
  $.ajax({
    type : "POST",
    url : url_control1,
    data : {tipe_transaksi : tipe_transaksi, 
            no_formulir : no_formulir,
            tingkat : tingkat},
    datatype : "html",
    success: function(response) {
      if(response == 'null') {
        swal("Gagal !", "No Formulir tidak boleh kosong !", "error");
      } else if(response == 'notvalid') {
        swal("Gagal !", "No Formulir tidak valid !", "error");
        $('input[name="no_formulir"]').val('');
      } else {
        $(document).find('.data-siswa').load().html(response);
        get_tarif();
      }
    }
  });
}


$(function() {
  $(document).on('click', '.add_row_keringanan', function() {
    /*$("#body_row_keringanan").append($("#row_keringanan").clone());*/
    var tipe_transaksi = 'psb';
    var id_siswa = $('input[name="id_siswa"]').val();
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
    var tingkat = 0;
    var url_control1 = base_url+"transaksi/get_keringanan";

    if((id_ta || id_gelombang || id_jenjang) != 0) {
      if(id_jenjang == 3 && id_jurusan == 0) {
        swal("Maaf !", "Harap pilih jurusan terlebih dahulu !", "error");
      } else {
        $.ajax({
          type : "POST",
          url : url_control1,
          data : {tipe_transaksi : tipe_transaksi,
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
      }
    }    
  });

  $(document).on('click', '.del_row_keringanan', function(e) {
    e.preventDefault();
    $(this).parent().parent().remove();
  });

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