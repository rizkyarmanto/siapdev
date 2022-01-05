<form action="<?php echo base_url('transaksi/input_transaksi_spp')?>" method="post"> 
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  <div class="container">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo $title_page;?>
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-money"></i> <?php echo $menu;?></a></li>
        <li class="active"><?php echo $submenu;?></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">

        <div class="col-md-3 col-sm-3">
          <!-- Profile Image -->
          <div class="callout callout-info">
            <h4><i class="icon fa fa-info"></i> Info </h4>
            <p>Lakukan scan kartu pelajar terlebih dahulu, dibawah ini</p>
          </div>

          <div class="box box-success">
            <video  id="camsource" autoplay width="100%" height="100%">Put your fallback message here.</video>
            <canvas id="qr-canvas" width="300" height="250" style="display:none"></canvas>
            <h3 id="qr-value" style="display:none"></h3>
            
            <!-- <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" 
              src="<?php echo base_url();?>berkas/img/user.png" alt="User profile picture">

              <h3 class="profile-username text-center">M. Cholis Malik</h3>

              <p class="text-muted text-center">Siswa</p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>NIS</b> <a class="pull-right">1311418</a>
                </li>
                <li class="list-group-item">
                  <b>Jenjang</b> <a class="pull-right">SMK (Sekolah Menengah Kejuruan)</a>
                </li>
                <li class="list-group-item">
                  <b>Jurusan</b> <a class="pull-right">TKJ (Teknik Komputer Jaringan)</a>
                </li>
              </ul>

              <a href="#" class="btn btn-danger btn-block"><b>Detail</b></a>
            </div> -->
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->

        <div class="col-md-9 col-sm-9">
          <div class="nav-tabs-custom tab-success">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab1" data-toggle="tab"><h4>Bayar SPP Bulanan</h4></a></li>
              <li><a href="#tab2" data-toggle="tab"><h4>Riwayat Pembayaran</h4></a></li>
            </ul>
            <div class="tab-content">

              <div class="active tab-pane" id="tab1">
                <div class="row">

                  <div class="col-lg-6">
                    <!-- box -->
                    <div class="box box-success">
                      <div class="box-header with-border">
                        <h3 class="box-title">Info Umum</h3>
                      </div>
                      <div class="box-body">
                        <div class="row form-group">
                          <input type="hidden" name="id_siswa" value="0">
                          <label class="col-sm-3">Tahun Ajaran</label>
                          <div class="col-sm-9">
                            <select name="id_ta" class="form-control input-sm jurusan">
                              <option value="" disabled="disabled" selected="selected">- Pilih tahun ajaran -</option>
                            </select>
                          </div>
                        </div>
                        <div class="row form-group">
                          <label class="col-sm-3">Jenjang</label>
                          <div class="col-sm-9">
                            <select name="id_jenjang" class="form-control input-sm jurusan">
                              <option value="" disabled="disabled" selected="selected">- Pilih jenjang -</option>
                            </select>
                          </div>
                        </div>
                        <div class="row form-group">
                          <label class="col-sm-3">Jurusan</label>
                          <div class="col-sm-9">
                            <select name="id_jurusan" class="form-control input-sm jurusan">
                              <option value="" disabled="disabled" selected="selected">- Pilih tahun ajaran -</option>
                            </select>
                          </div>
                        </div>
                        <div class="row form-group">
                          <label class="col-sm-3">Tingkat</label>
                          <div class="col-sm-9">
                            <select name="tingkat" class="form-control input-sm jurusan">
                              <option value="" disabled="disabled" selected="selected">- Pilih tingkat -</option>
                            </select>
                          </div>
                        </div>
                        <div class="row form-group">
                          <label class="col-sm-3">Bulan Ke</label>
                          <div class="col-sm-9">
                            <select name="id_bulan" class="form-control input-sm jurusan">
                              <option value="" disabled="disabled" selected="selected">- Pilih bulan ke -</option>
                            </select>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- /box -->
                  </div>

                  <div class="col-lg-6">
                    <!-- box -->
                    <div class="box box-success">
                      <div class="box-header with-border">
                        <h3 class="box-title">Item</h3>
                      </div>
                      <div class="box-body">
                        <div class="row form-group">
                          <label class="col-lg-4">
                            <input type="checkbox" name=""> Pendaftaran
                          </label>
                          <div class="col-lg-8">
                             <input style="text-align:right" type="text" class="form-control input-sm" required readonly/>
                          </div>
                        </div>
                        <div class="row form-group">
                          <label class="col-lg-4">
                            <input type="checkbox" name=""> OSIS
                          </label>
                          <div class="col-lg-8">
                             <input style="text-align:right" type="text" class="form-control input-sm" required readonly/>
                          </div>
                        </div>
                        <div class="row form-group">
                          <label class="col-lg-4">
                            <input type="checkbox" name=""> Gedung
                          </label>
                          <div class="col-lg-8">
                             <input style="text-align:right" type="text" class="form-control input-sm" required readonly/>
                          </div>
                        </div>
                        <div class="row form-group">
                          <div class="col-lg-12">
                          <button style="width:100%;" type="button" class="btn btn-md btn-success"><i class="fa fa-send"></i> Bayar</button>
                          </div>                          
                        </div>
                      </div>
                    </div>
                    <!-- /box -->
                  </div>

                </div>
              </div>
                
              <style>
                .rwyt {
                  vertical-align:top;text-align:center;
                }
              </style>
              <div class="tab-pane" id="tab2">
                <div class="row">
                  <div class="col-lg-12">
                    <table class="table table-striped table-bordered table-hover">
                      <thead>
                        <tr>
                          <th class="rwyt" rowspan="2"><span>No</span></th>
                          <th class="rwyt" rowspan="2"><span>Tahun Ajaran</span></th>
                          <th class="rwyt" colspan="10"><span>Bulan Ke</span></th>
                        </tr>
                        <tr>
                          <th class="rwyt"><span>1</span></th>
                          <th class="rwyt"><span>2</span></th>
                          <th class="rwyt"><span>3</span></th>
                          <th class="rwyt"><span>4</span></th>
                          <th class="rwyt"><span>5</span></th>
                          <th class="rwyt"><span>6</span></th>
                          <th class="rwyt"><span>7</span></th>
                          <th class="rwyt"><span>8</span></th>
                          <th class="rwyt"><span>9</span></th>
                          <th class="rwyt"><span>10</span></th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td class="rwyt">1</td>
                          <td class="rwyt">2016 - 2017</td>
                          <td class="rwyt"><i class="fa fa-check"></i></td>
                          <td class="rwyt"><i class="fa fa-uncheck"></i></td>
                          <td class="rwyt"><i class="fa fa-check"></i></td>
                          <td class="rwyt"><i class="fa fa-check"></i></td>
                          <td class="rwyt"><i class="fa fa-check"></i></td>
                          <td class="rwyt"><i class="fa fa-check"></i></td>
                          <td class="rwyt"><i class="fa fa-check"></i></td>
                          <td class="rwyt"><i class="fa fa-check"></i></td>
                          <td class="rwyt"><i class="fa fa-check"></i></td>
                          <td class="rwyt"><i class="fa fa-check"></i></td>
                        </tr>
                        <tr>
                          <td class="rwyt">2</td>
                          <td class="rwyt">2018 - 2019</td>
                          <td class="rwyt"><i class="fa fa-check"></i></td>
                          <td class="rwyt"><i class="fa fa-uncheck"></i></td>
                          <td class="rwyt"><i class="fa fa-check"></i></td>
                          <td class="rwyt"><i class="fa fa-check"></i></td>
                          <td class="rwyt"><i class="fa fa-check"></i></td>
                          <td class="rwyt"><i class="fa fa-check"></i></td>
                          <td class="rwyt"><i class="fa fa-check"></i></td>
                          <td class="rwyt"><i class="fa fa-check"></i></td>
                          <td class="rwyt"><i class="fa fa-check"></i></td>
                          <td class="rwyt"><i class="fa fa-check"></i></td>
                        </tr>
                      </tbody>
                    </table>

                  </div> 
                </div>
              </div>

            </div>
          </div>
        </div>


    </section>
  </div>  
</form>

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
<!-- 
<script type="text/javascript" src="<?php echo base_url()?>/berkas/plugins/qrcode/qrcode-scanner/js/qr.js"></script> -->
<script type="text/javascript" src="<?php echo base_url()?>/berkas/plugins/qrcode/qrcode-scanner/js/camera.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>/berkas/plugins/qrcode/qrcode-scanner/js/init.js"></script>

<script>
function read(a) {
    var base_url = "<?php echo base_url();?>";
    var url_control = base_url+"transaksi/get_nis";
    /*$("#qr-value").text(a);
    swal("Sukses !", a, "success");*/
    var nis = a;
    $.ajax({
      type : "POST",
      url : url_control,
      data : {nis : nis},
      datatype : "HTML",
      success: function(response) {
        var d = JSON.parse(response);
        if(d.status == 'valid') {
          swal("Valid !", d.nis, "success");
        } else {
          swal("Not Valid !", d.nis, "error");
        }
        
      }
    });  
}    
qrcode.callback = read;
</script>

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
</script>