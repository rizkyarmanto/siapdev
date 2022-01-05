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
                <h3 class="box-title">Informasi Umum</h3>

                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
              </div>

              <div class="box-body">
                <div class="row form-group">
                  <label class="col-lg-2 col-sm-2 text-right"><font color="red">*</font> Nomor Formulir</label>
                  <label class="col-lg-1 col-sm-1 text-right"> : </label>
                  <div class="col-lg-9 col-sm-9">
                    <input type="text" class="form-control" placeholder="Masukan nomor formulir">
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
            <div class="box box-success">
              <div class="box-header with-border">
                <h3 class="box-title">Biodata Siswa</h3>

                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
              </div>

              <div class="box-body">
                <div class="row form-group">
                  <label class="col-sm-3">Nama Lengkap <font color="red">*</font></label>
                  <div class="col-sm-9">
                    <!-- Here id_siswa -->
                    <input type="hidden" name="id_siswa" value="0" class="form-control" /> 
                    <input type="text" name="nama" class="form-control" placeholder="Masukan nama siswa" required/>
                  </div>
                </div>
                <div class="row form-group">
                  <label class="col-sm-3">NISN</label>
                  <div class="col-sm-9">
                    <input type="text" name="nisn" class="form-control" placeholder="Masukan NISN(Nomor Induk Siswa Nasional) "/>
                  </div>
                </div>
                <div class="row form-group">
                  <label class="col-sm-3">Jenis Kelamin <font color="red">*</font></label>
                  <div class="col-sm-9">
                    <select name="kelamin" class="form-control" required>
                      <option value="" disabled="disabled" selected="selected">- Pilih Jenis Kelamin -</option> 
                      <option value="L">Laki-laki</option> 
                      <option value="P">Perempuan</option> 
                    </select>
                  </div>
                </div>
                <div class="row form-group">
                  <label class="col-sm-3">Agama <font color="red">*</font></label>
                  <div class="col-sm-9">
                    <select name="agama" class="form-control" required>
                      <option value="" disabled="disabled" selected="selected">- Pilih Agama -</option> 
                      <option value="islam">Islam</option> 
                      <option value="kristen">Kristen</option> 
                    </select>
                  </div>
                </div>
                <div class="row form-group">
                  <label class="col-sm-3">Tempat, Tanggal Lahir <font color="red">*</font></label>
                  <div class="col-sm-6">
                    <input type="text" name="tempat_lahir" class="form-control" placeholder="Masukan tampat lahir" required/>
                  </div>
                  <div class="col-sm-3">
                    <input type="date" name="tanggal_lahir" class="form-control" required/>
                  </div>
                </div>
                <div class="row form-group">
                  <label class="col-sm-3">Anak Ke</label>
                  <div class="col-sm-9">
                    <input type="text" name="anak_ke" class="form-control" placeholder="Masukan anak ke" />
                  </div>
                </div>
                <div class="row form-group">
                  <label class="col-sm-3">Jumlah Saudara</label>
                  <div class="col-sm-9">
                    <input type="text" name="jml_saudara" class="form-control" placeholder="Masukan jumlah saudara" />
                  </div>
                </div>

              </div>
              <div class="box-footer">
              </div>
            </div>
          </div>

          <div class="col-lg-10 col-lg-offset-1 col-sm-12">
            <div class="box box-success">
              <div class="box-header with-border">
                <h3 class="box-title">Alamat Siswa</h3>

                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
              </div>

              <div class="box-body">
                <div class="row form-group">
                  <label class="col-sm-3">Provinsi <font color="red">*</font></label>
                  <div class="col-sm-9">
                    <?php
                    $style_provinsi='class="form-control" id="provinsi_id" onChange="tampilKabupaten(this)" required';
                    echo form_dropdown('provinsi_id',$provinsi,'',$style_provinsi);
                    ?>
                  </div>
                </div>
                <div class="row form-group">
                  <label class="col-sm-3">Kabupaten <font color="red">*</font></label>
                  <div class="col-sm-9">
                    <?php
                    $style_kabupaten='class="form-control" id="kabupaten_id" onChange="tampilKecamatan(this)" required';
                    echo form_dropdown("kabupaten_id",array('Pilih Kabupaten'=>'- Pilih Kabupaten -'),'',$style_kabupaten);
                    ?>
                  </div>
                </div>
                <div class="row form-group">
                  <label class="col-sm-3">Kecamatan <font color="red">*</font></label>
                  <div class="col-sm-9">
                    <?php
                    $style_kabupaten='class="form-control" id="kecamatan_id" onChange="tampilKelurahan(this)" required';
                    echo form_dropdown("kecamatan_id",array('Pilih Kecamatan'=>'- Pilih Kecamatan -'),'',$style_kabupaten);
                    ?>
                  </div>
                </div>
                <div class="row form-group">
                  <label class="col-sm-3">Kelurahan <font color="red">*</font></label>
                  <div class="col-sm-9">
                    <?php
                    $style_kelurahan='class="form-control" id="kelurahan_id" required';
                    echo form_dropdown("kelurahan_id",array('Pilih Kelurahan'=>'- Pilih Kelurahan -'),'',$style_kelurahan);
                    ?>
                  </div>
                </div>
                <div class="row form-group">
                  <label class="col-sm-3">Alamat <font color="red">*</font></label>
                  <div class="col-sm-9">
                    <textarea class="form-control" name="alamat" placeholder="masukan alamat lengkap" required></textarea>
                  </div>
                </div>

              </div>
              <div class="box-footer">
              </div>
            </div>
          </div>

          <div class="col-lg-10 col-lg-offset-1 col-sm-12">
            <div class="box box-success">
              <div class="box-header with-border">
                <h3 class="box-title">Biodata OrangTua</h3>

                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
              </div>

              <div class="box-body">
                <div class="row form-group">
                  <label class="col-sm-3">Nama Ibu</label>
                  <div class="col-sm-9">
                    <input type="text" name="nama_ibu" placeholder="masukan nama panjang ibu" class="form-control">
                  </div>
                </div>
                <div class="row form-group">
                  <label class="col-sm-3">Nama Ayah</label>
                  <div class="col-sm-9">
                    <input type="text" name="nama_ayah" placeholder="masukan nama panjang ayah" class="form-control">
                  </div>
                </div>
                <div class="row form-group">
                  <label class="col-sm-3">No. telp orang tua</label>
                  <div class="col-sm-9">
                    <input type="text" name="no_telp_ortu" placeholder="masukan no telp orang tua" class="form-control">
                  </div>
                </div>
                <div class="row form-group">
                  <label class="col-sm-3">Nama wali</label>
                  <div class="col-sm-9">
                    <input type="text" name="nama_wali" placeholder="masukan nama panjang wali" class="form-control">
                  </div>
                </div>
                <div class="row form-group">
                  <label class="col-sm-3">No. telp wali</label>
                  <div class="col-sm-9">
                    <input type="text" name="no_telp_wali" placeholder="masukan no telp wali" class="form-control">
                  </div>
                </div>
                <div class="row form-group">
                  <label class="col-sm-3">Keterangan</label>
                  <div class="col-sm-9">
                    <textarea class="form-control" placeholder="keterangan tambahan untuk siswa" name="keterangan"></textarea>
                  </div>
                </div>

              </div>
              <div class="box-footer">
              </div>
            </div>
          </div>

          <div class="col-lg-10 col-lg-offset-1 col-sm-12">
            <div class="box box-success">
              <div class="box-header with-border">
                <h3 class="box-title">Sosial Media</h3>

                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
              </div>

              <div class="box-body">
                <?php echo $jenis_sosmed ?>
              </div>
              <div class="box-footer">
                <div class="pull-right">
                  <button type="button" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
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