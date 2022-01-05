<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<div class="container">
  <!-- Content Header (Page header) -->
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

      <!--Box-->
      <div class="col-lg-3 col-lg-offset-1 col-sm-4">
        <!-- Jika belum di scan/masukan nis -->
        <div class="qr-box callout callout-success">
          <h4><i class="icon fa fa-info"></i> Info</h4>
          <p>Lakukan scan kartu pelajar atau masukan NIS/No.formulir pada form dibawah ini</p>
        </div>

        <div class="qr-box nav-tabs-custom tab-success">
          <ul class="nav nav-tabs">
            <li class="active"><a href="#tab_1" data-toggle="tab"> Scan</a></li>
            <li><a href="#tab_2" data-toggle="tab"> NIS/No. Formulir</a></li>
          </ul>
          <div class="tab-content">
            <div class="tab-pane active text-center" id="tab_1">
              <video  id="camsource" autoplay width="90%" height="90%">Put your fallback message here.</video>
              <canvas id="qr-canvas" width="300" height="250" style="display:none"></canvas>
              <h3 id="qr-value" style="display:none"></h3> 
            </div>

            <div class="tab-pane" id="tab_2">
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
              <div class="row form-group">
                <label class="col-lg-12" No. Formulir</label>
                <div class="col-lg-12">
                  <div class="input-group">
                    <input id="no_formulir-cari" type="text" class="form-control" placeholder="Masukan nomor formulir">
                      <span class="input-group-btn">
                        <button type="button" class="search-no_formulir btn btn-info btn-flat"><i class="fa fa-search"></i></button>
                      </span>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>

        <div class="qr-result box box-success" style="display: none;">
          <div class="box-header with-border">
            <div class="box-tools pull-right">
              <button id="reset-qrcode" type="button" class="btn btn-info btn-flat btn-sm"><i class="fa fa-refresh"></i></button>
            </div>
          </div>
          <div class="box-body box-profile">
            <img data-set="img_url" class="profile-user-img img-responsive img-circle" src="<?php echo base_url();?>berkas/img/user.png" alt="User profile picture" style="width:80%">
            <h3 data-set="nama" class="profile-username text-center">Finding ..</h3>
            <p class="text-muted text-center">Siswa</p>
            <ul class="list-group list-group-unbordered">
              <li class="list-group-item">
                <b>NIS</b> <a data-set="nis" class="pull-right">Finding ..</a>
              </li>
              <li class="list-group-item">
                <b>No. Formulir</b> <a data-set="noform" class="pull-right">Finding ..</a>
              </li>
            </ul>
          </div>
        </div>
        
      </div>

      <div class="col-lg-7 col-sm-8">
        <div class="box box-success">
          <div class="box-header with-border">
            <h3 class="box-title">Informasi Umum</h3>
            <div class="box-tools pull-right">
              <button dataattr-set="id_siswa" data-id_siswa="" type="button" class="btn btn-danger btn-flat btn-sm mod_mutasi"><i class="fa fa-random"></i> Mutasi</button>
              <button dataattr-set="id_siswa" data-id_siswa="" type="button" class="btn btn-primary btn-flat btn-sm mod_riwayat"><i class="fa fa-list"></i> Riwayat</button>
              <button dataattr-set="id_siswa" data-id_siswa="" type="button" class="btn btn-success btn-flat btn-sm mod_tagihan"><i class="fa fa-money"></i> Tagihan</button>
            </div>
          </div>

          <div class="box-body">
            <div class="row form-group">
              <label class="col-lg-2 col-sm-2 text-right"> Nama Siswa</label>
              <label class="col-lg-1 col-sm-1 text-right"> : </label>
              <div class="col-lg-9 col-sm-9">
                <input dataval-set="nama" type="text" class="form-control" placeholder="Nama siswa" readonly>
              </div>
            </div>
            <div class="row form-group">
              <label class="col-lg-2 col-sm-2 text-right">Asal Sekolah</label>
              <label class="col-lg-1 col-sm-1 text-right"> : </label>
              <div class="col-lg-9 col-sm-9">
                <input dataval-set="asal_sekolah" type="text" class="form-control" placeholder="Asal sekolah" readonly>
              </div>
            </div>
            <div class="row form-group">
              <label class="col-lg-2 col-sm-2 text-right"> Tahun Ajaran</label>
              <label class="col-lg-1 col-sm-1 text-right"> : </label>
              <div class="col-lg-9 col-sm-9">
                <input dataval-set="teks_ta" type="text" class="form-control" placeholder="Tahun ajaran" readonly>
              </div>
            </div>
            <div class="row form-group">
              <label class="col-lg-2 col-sm-2 text-right"> Gelombang Pendaftaran</label>
              <label class="col-lg-1 col-sm-1 text-right"> : </label>
              <div class="col-lg-9 col-sm-9">
                <input dataval-set="gelombang" type="text" class="form-control" placeholder="Gelombang pendaftaran" readonly>
              </div>
            </div>
            <div class="row form-group">
              <label class="col-lg-2 col-sm-2 text-right"> Jenjang</label>
              <label class="col-lg-1 col-sm-1 text-right"> : </label>
              <div class="col-lg-9 col-sm-9">
                <input dataval-set="jenjang" type="text" class="form-control" placeholder="Jenjang pendidikan" readonly>
              </div>
            </div>
            <div class="row form-group">
              <label class="col-lg-2 col-sm-2 text-right"> Jurusan</label>
              <label class="col-lg-1 col-sm-1 text-right"> : </label>
              <div class="col-lg-9 col-sm-9">
                <input dataval-set="jurusan" type="text" class="form-control" placeholder="Jurusan" readonly>
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
              <label class="col-sm-3">Nama Lengkap</label>
              <div class="col-sm-9">
                <input dataval-set="nama" type="text" class="form-control" placeholder="Nama lengkap" readonly>
              </div>
            </div>
            <div class="row form-group">
              <label class="col-sm-3">NISN</label>
              <div class="col-sm-9">
                <input dataval-set="nisn" type="text" class="form-control" placeholder="NISN(Nomor Induk Siswa Nasional)" readonly>
              </div>
            </div>
            <div class="row form-group">
              <label class="col-sm-3">Jenis Kelamin</label>
              <div class="col-sm-9">
                <input dataval-set="jenis_kelamin" type="text" class="form-control" placeholder="Jenis kelamin" readonly>
              </div>
            </div>
            <div class="row form-group">
              <label class="col-sm-3">Agama</label>
              <div class="col-sm-9">
                <input dataval-set="agama" type="text" class="form-control" placeholder="Agama" readonly>
              </div>
            </div>
            <div class="row form-group">
              <label class="col-sm-3">Tempat, Tanggal Lahir</label>
              <div class="col-sm-6">
                <input dataval-set="tempat_lahir" type="text" class="form-control" placeholder="Tempat lahir" readonly>
              </div>
              <div class="col-sm-3">
                <input dataval-set="tanggal_lahir" type="text" class="form-control" placeholder="Tanggal lahir" readonly>
              </div>
            </div>
            <div class="row form-group">
              <label class="col-sm-3">Anak Ke</label>
              <div class="col-sm-9">
                <input dataval-set="anak_ke" type="text" class="form-control" placeholder="Anak ke" readonly>
              </div>
            </div>
            <div class="row form-group">
              <label class="col-sm-3">Jumlah Saudara</label>
              <div class="col-sm-9">
                <input dataval-set="jml_saudara" type="text" class="form-control" placeholder="Jumlah saudara" readonly>
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
              <label class="col-sm-3">Provinsi</label>
              <div class="col-sm-9">
                <input dataval-set="nama_provinsi" type="text" class="form-control" placeholder="Provinsi" readonly>
              </div>
            </div>
            <div class="row form-group">
              <label class="col-sm-3">Kabupaten</label>
              <div class="col-sm-9">
                <input dataval-set="nama_kabupaten" type="text" class="form-control" placeholder="Kabupaten" readonly>
              </div>
            </div>
            <div class="row form-group">
              <label class="col-sm-3">Kecamatan</label>
              <div class="col-sm-9">
                <input dataval-set="nama_kecamatan" type="text" class="form-control" placeholder="Kecamatan" readonly>
              </div>
            </div>
            <div class="row form-group">
              <label class="col-sm-3">Kelurahan</label>
              <div class="col-sm-9">
                <input dataval-set="nama_kelurahan" type="text" class="form-control" placeholder="Kelurahan" readonly>
              </div>
            </div>
            <div class="row form-group">
              <label class="col-sm-3">Alamat</label>
              <div class="col-sm-9">
                <input dataval-set="alamat" type="text" class="form-control" placeholder="Alamat" readonly>
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
                <input dataval-set="nama_ibu" type="text" class="form-control" placeholder="Nama ibu" readonly>
              </div>
            </div>
            <div class="row form-group">
              <label class="col-sm-3">Nama Ayah</label>
              <div class="col-sm-9">
                <input dataval-set="nama_ayah" type="text" class="form-control" placeholder="Nama ayah" readonly>
              </div>
            </div>
            <div class="row form-group">
              <label class="col-sm-3">No. telp orang tua</label>
              <div class="col-sm-9">
                <input dataval-set="no_telp_ortu" type="text" class="form-control" placeholder="No. Telp orang tua" readonly>
              </div>
            </div>
            <div class="row form-group">
              <label class="col-sm-3">Nama wali</label>
              <div class="col-sm-9">
                <input dataval-set="nama_wali" type="text" class="form-control" placeholder="Nama wali" readonly>
              </div>
            </div>
            <div class="row form-group">
              <label class="col-sm-3">No. telp wali</label>
              <div class="col-sm-9">
                <input dataval-set="no_telp_wali" type="text" class="form-control" placeholder="No. Telp wali" readonly>
              </div>
            </div>
            <div class="row form-group">
              <label class="col-sm-3">Keterangan</label>
              <div class="col-sm-9">
                <input dataval-set="keterangan" type="text" class="form-control" placeholder="Keterangan" readonly>
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
            <table class="table table-striped table-bordered table-hover">
              <thead>
                <tr class="info">
                  <th class="text-center">Jenis Sosial Media</th>
                  <th class="text-center">Sosial Media</th>
                </tr>
              </thead>
              <tbody id="sosmed-body">
              </tbody>
            </table>
          </div>
          <div class="box-footer">
            <div class="pull-right">
              <button type="button" class="btn btn-success btn-flat"><i class="fa fa-save"></i> Simpan</button>
            </div>
          </div>
        </div>
      </div>

    </div>
    
  </section>
  <!-- /.content -->
</div>
</div> 

<!-- mod_mutasi -->
<div id="mod_mutasi" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header btn-danger">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Mutasi</h4>
      </div>
      <div class="modal-body">
        <div class="row form-group">
          <label class="col-lg-3 col-sm-3">Tahun Ajaran</label>
          <div class="col-lg-9 col-sm-9">
            <input dataval-mod="teks_ta" type="text" class="form-control" placeholder="Tahun ajaran" readonly>
          </div>
        </div>
        <div class="row form-group">
          <label class="col-lg-3 col-sm-3">Jenjang</label>
          <div class="col-lg-9 col-sm-9">
            <input dataval-mod="jenjang" type="text" class="form-control" placeholder="Jenjang" readonly>
          </div>
        </div>
        <div class="row form-group">
          <label class="col-lg-3 col-sm-3">Jurusan</label>
          <div class="col-lg-9 col-sm-9">
            <input dataval-mod="jurusan" type="text" class="form-control" placeholder="Jurusan" readonly>
          </div>
        </div>
        <div class="row form-group">
          <label class="col-lg-3 col-sm-3">Tingkat</label>
          <div class="col-lg-9 col-sm-9">
            <input dataval-mod="tingkat" type="text" class="form-control" placeholder="Tingkat" readonly>
          </div>
        </div>
        <div class="row form-group">
          <label class="col-lg-3 col-sm-3">Urutan Kelas</label>
          <div class="col-lg-9 col-sm-9">
            <input dataval-mod="urutan_kelas" type="text" class="form-control" placeholder="Urutan Kelas" readonly>
          </div>
        </div>
        <div class="row form-group">
          <label class="col-lg-3 col-sm-3">Tgl Histori</label>
          <div class="col-lg-9 col-sm-9">
            <input dataval-mod="waktu" type="text" class="form-control" placeholder="Tanggal Histori" readonly>
          </div>
        </div>
        <div class="row form-group">
          <label class="col-lg-3 col-sm-3">Status</label>
          <div class="col-lg-9 col-sm-9">
            <input dataval-mod="status" type="text" class="form-control" placeholder="Status" readonly>
          </div>
        </div>
        <div class="row form-group">
          <label class="col-lg-3 col-sm-3">Keterangan</label>
          <div class="col-lg-9 col-sm-9">
            <input dataval-mod="keterangan" type="text" class="form-control" placeholder="Keterangan" readonly>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
        <!-- <button type="button" class="btn btn-danger btn-flat">Save</button> -->
      </div>
    </div>
  </div>
</div>

<!-- mod_riwayat -->
<div id="mod_riwayat" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header btn-primary">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Riwayat</h4>
      </div>
      <div class="modal-body">
        <div class="row form-group">
          <div class="col-lg-12 col-sm-12" id="mod_riwayat_body">
            <!-- <table class="table table-striped table-bordered table-hover">
              <thead>
                <tr class="info">
                  <th class="text-center">Tgl Histori</th>
                  <th class="text-center">TA</th>
                  <th class="text-center">Jenjang</th>
                  <th class="text-center">Jurusan</th>
                  <th class="text-center">Tingkat</th>
                  <th class="text-center">Urutan</th>
                  <th class="text-center">Status</th>
                  <th class="text-center">Keterangan</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td class="text-center">1-1-2016</td>
                  <td class="text-center">-</td>
                  <td class="text-center">-</td>
                  <td class="text-center">-</td>
                  <td class="text-center">-</td>
                  <td class="text-center">-</td>
                  <td class="text-center">Daftar</td>
                  <td class="text-center">-</td>
                </tr>
                <tr>
                  <td class="text-center">26-1-2016</td>
                  <td class="text-center">2016-2017</td>
                  <td class="text-center">SMK</td>
                  <td class="text-center">Teknik Komputer Jaringan</td>
                  <td class="text-center">1</td>
                  <td class="text-center">1</td>
                  <td class="text-center">Naik Kelas</td>
                  <td class="text-center">-</td>
                </tr>
              </tbody>
            </table> -->
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- mod_tagihan -->
<div id="mod_tagihan" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header btn-success">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Tagihan</h4>
      </div>
      <div class="modal-body">
        <div class="row form-group">
          <div class="col-lg-12 col-sm-12">
            <table class="table table-striped table-bordered table-hover">
              <thead>
                <tr class="success">
                  <th class="text-center">Jenis transaksi</th>
                  <th class="text-center">Total Tagihan</th>
                </tr>
              </thead>
              <tbody id="mod_tagihan_body">
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
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

<script type="text/javascript" src="<?php echo base_url()?>/berkas/plugins/qrcode/qrcode-scanner/js/qr.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>berkas/plugins/qrcode/qrcode-scanner/js/camera.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>berkas/plugins/qrcode/qrcode-scanner/js/init.js"></script>

<script type="text/javascript">
    $(document).on('click', ".mod_mutasi", function() {
        var id_siswa    = $(this).attr('data-id_siswa');
        $.ajax({
            url : "<?php echo base_url();?>pengolahan_siswa/cari_siswa_mutasi",
            type: "POST",
            data: "id_siswa="+id_siswa,
            dataType: "JSON",
            success: function(data) {
                var column_mod  = ['teks_ta', 'jenjang', 'jurusan', 'tingkat', 'urutan_kelas', 'waktu', 'status', 'keterangan'];
                $.each(column_mod, function (index, value) {
                    $('[dataval-mod="'+value+'"]').val(data[value]);
                })
                $("#mod_mutasi").modal('show'); 
            },
            error: function (jqXHR, textStatus, errorThrown) {
              console.log('Error get data from ajax');
            }
        })
    })

    $(document).on('click', ".mod_riwayat", function() {
        var id_siswa    = $(this).attr('data-id_siswa');
        $.ajax({
            url : "<?php echo base_url();?>pengolahan_siswa/cari_siswa_riwayat",
            type: "POST",
            data: "id_siswa="+id_siswa,
            dataType: "HTML",
            success: function(data) {
                $('#mod_riwayat_body').html(data);
                $("#mod_riwayat").modal('show'); 
            },
            error: function (jqXHR, textStatus, errorThrown) {
              console.log('Error get data from ajax');
            }
        })
    })

    $(document).on('click', ".mod_tagihan", function() {
        var id_siswa    = $(this).attr('data-id_siswa');
        $.ajax({
            url : "<?php echo base_url();?>pengolahan_siswa/cari_siswa_tagihan",
            type: "POST",
            data: "id_siswa="+id_siswa,
            dataType: "HTML",
            success: function(data) {
                $('#mod_tagihan_body').html(data);
                $("#mod_tagihan").modal('show'); 
            },
            error: function (jqXHR, textStatus, errorThrown) {
              console.log('Error get data from ajax');
            }
        })
    })

    // Cari siswa
    $(document).on('click', "#reset-qrcode", function() {
        $('.qr-box').css("display", "block");
        $('.qr-result').css("display", "none");
    });

    var action;
    function read(a) {
        action  = 'cari';
        var data= "nis="+a;

        cari_siswa(data);
    }
    qrcode.callback = read;

    $(document).on('click', ".search-nis", function() {
        action  = 'cari';
        var nis = $('#nis-cari').val();
        var data= "nis="+nis;

        cari_siswa(data);
    })

    $(document).on('click', ".search-no_formulir", function() {
        action  = 'cari';
        var no_formulir = $('#no_formulir-cari').val();
        var data= "no_formulir="+no_formulir;

        cari_siswa(data);
    })

    function cari_siswa(data) {
        $.ajax({
            url : "<?php echo base_url();?>pengolahan_siswa/cari_siswa_action/"+action,
            type: "POST",
            data: data,
            dataType: "JSON",
            success: function(data) {
                var column_set  = ['nis', 'nama', 'img_url'];
                $.each(column_set, function (index, value) {
                    $('[data-set="'+value+'"]').text(data[value]);
                })

                var column_val  = ['nama','asal_sekolah','teks_ta','gelombang','jenjang',
                            'jurusan','nama','nisn','jenis_kelamin','agama',
                            'tempat_lahir','tanggal_lahir','anak_ke','jml_saudara',
                            'nama_provinsi','nama_kabupaten','nama_kecamatan','nama_kelurahan','alamat',
                            'nama_ibu','nama_ayah','no_telp_ortu','nama_wali','no_telp_wali','keterangan'];
                $.each(column_val, function(index, value) {
                    $('[dataval-set="'+value+'"]').val(data[value]);  
                });

                var column_attr  = ['id_siswa'];
                $.each(column_attr, function (index, value) {
                    $('[dataattr-set="'+value+'"]').attr("data-id_siswa", data[value]);
                })

                $('#sosmed-body').html(data.sos_med);

                $('.qr-box').css("display", "none");
                $('.qr-result').css("display", "block"); 
            },
            error: function (jqXHR, textStatus, errorThrown) {
              console.log('Error get data from ajax');
            }
        });
    }

</script>
