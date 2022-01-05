<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<div class="container">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <?php echo $title;?>
    </h1>
    <ol class="breadcrumb" id="dashboard-pageBar"></ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Row -->
    <div class="row">
      <div class="col-lg-10 col-lg-offset-1 col-sm-10">
          <?php if($this->session->flashdata('pesan_success') != '') { ?>
          <div class="alert alert-dismissible alert alert-info" id="alert"><i class="fa fa-check"></i> <?php echo $this->session->flashdata('pesan_success') ?><button type="button" class="close" data-dismiss="alert">&times;</button></div>
          <?php } ?>
          
          <?php if($this->session->flashdata('pesan_error') != '') { ?>
          <div class="alert alert-dismissible alert alert-warning" id="alert"><i class="fa fa-warning"></i> <?php echo $this->session->flashdata('pesan_error') ?><button type="button" class="close" data-dismiss="alert">&times;</button></div>
          <?php } ?>
      </div>

      <!-- Box -->
      <div class="col-lg-4 col-sm-6">
        <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Pilih Kelas</h3>
                    <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div>
                </div>

                <div class="box-body">
                    <div class="row form-group">
                        <label class="col-lg-3 col-sm-3 text-left"> TA</label>
                        <label class="col-lg-1 col-sm-1 text-left"> : </label>
                            <div class="col-lg-8 col-sm-8">
                            <select name="id_ta" id="id_ta" class="form-control">
                                <?php echo $ta?>
                            </select>
                            </div>
                    </div>
                    <div class="row form-group">
                    <label class="col-lg-3 col-sm-3 text-left"> Jenjang</label>
                    <label class="col-lg-1 col-sm-1 text-left"> : </label>
                    <div class="col-lg-8 col-sm-8">
                        <select name="id_jenjang" id="id_jenjang" class="form-control" onchange="get_jurusan(this)">
                        <?php echo $jenjang?>
                        </select>
                    </div>
                    </div>
                    <div class="row form-group">
                      <label class="col-lg-3 col-sm-3 text-left">Jurusan</label>
                      <label class="col-lg-1 col-sm-1 text-left"> : </label>
                      <div class="col-lg-8 col-sm-8">
                        <select name="id_jurusan" id="id_jurusan" class="form-control">
                          <option value="0" disabled="disabled" selected="selected">- Pilih jurusan -</option>
                        </select>
                      </div>
                    </div>

                    <div class="row form-group">
                    <label class="col-lg-3 col-sm-3 text-left"> Kelas</label>
                    <label class="col-lg-1 col-sm-1 text-left"> : </label>
                    <div class="col-lg-8 col-sm-8">
                        <select name="id_tingkat" id="id_tingkat" class="form-control" >
                            <?php echo $tingkat?>
                        </select>
                    </div>
                    </div>
                    <div class="row form-group">
                    <label class="col-lg-3 col-sm-3 text-left"> Urutan Kelas</label>
                    <label class="col-lg-1 col-sm-1 text-left"> : </label>
                    <div class="col-lg-8 col-sm-8">
                        <select name="urutkelas" id="urutkelas" class="form-control">
                        <option>-Pilih urutan kelas-</option>
                        <?php
                            for($urut=1; $urut < 10; $urut++){
                                echo "<option value='".$urut."'>".$urut."</option>";
                            }
                        ?>
                        
                        </select>
                    </div>
                  </div>
                  <div class="row form-group">
                    <label class="col-lg-3 col-sm-3 text-left"> Mata Pelajaran</label>
                    <label class="col-lg-1 col-sm-1 text-left"> : </label>
                    <div class="col-lg-8 col-sm-8">
                      <select name="id_mapel" id="id_mapel" class="form-control" onchange="get_mapel(this)">
                      <?php echo $mapel?>
                      </select>
                    </div>
                  </div>

            <div class="row form-group">
              <div class="col-lg-12 col-sm-12 text-right">
                <!-- <button type="button" class="btn btn-flat btn-danger search-filter"><i class="fa fa-search"></i> Filter -->
                <button type="button" class="btn btn-flat btn-primary get-data-kelas" style="margin-left:1%"><i class="fa fa-send"></i> Ambil Data
              </div>
            </div>
          
          </div>
        </div>
      </div>

      <!-- Box -->
      <form id="form-transaksi" action="<?php echo base_url('nilai/input_nilai_uas')?>" method="post"> 
      <div class="col-lg-8 col-sm-6">
        <div class="box box-danger">
              <div class="box-header with-border">
                <h3 class="box-title">Form Isian Nilai</h3>
              </div>
              
              <div class="box-body">
                <div class="row form-group">
                  <div class="col-lg-12">
                    <table class="table table-striped table-bordered table-hover">
                      <thead>
                        <tr class="danger">
                          <th style="width:10%" rowspan="2" class="text-center">No</th>
                          <th rowspan="2" class="text-center">Nama Siswa</th>
                          <th colspan="2" class="text-center">UAS</th>
                        </tr>
                        <tr class="danger">
                          
                          <th style="width:15%" class="text-center">Tulis</th>
                          <th style="width:15%" colspan="2" class="text-center">Praktek</th>
                        </tr>
                      </thead>
                      <tbody id="data-tarif">
                        <tr>
                          <td colspan="7" class="text-center">
                            <h5><i>Isi form disamping terlebih dahulu !</i></h5>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div> 
                </div>

              </div>
              
        </div>
            <div class="box box-danger">
                <div class="box-footer">
                    <div class="pull-right">
                    <input type="hidden" id="id_mapel_txt" name="id_mapel_txt">
                    <button type="button" class="btn btn-primary btn-flat clicksubmit"><i class="fa fa-send"></i> Simpan Nilai</button>
                    <!-- <button type="button" onclick="read('1')" class="btn btn-flat btn-default">Test Manual</button> -->
                    </div>
                </div>
            </div>
      </div>
      </form>
    </div>
    
  </section>
  <!-- /.content -->
</div>
</div>

<script type="text/javascript">
  var base_url = "<?php echo base_url();?>";

  $(document).on('click', ".get-data-kelas", function() {
    action  = 'cari';
    var id_ta = $('#id_ta').val();
    var id_jenjang = $('#id_jenjang').val();
    var id_jurusan = $('#id_jurusan').val();
    var id_kelas = $('#id_tingkat').val();
    var urutankelas = $('#urutkelas').val();
    var id_mapel = $('#id_mapel').val();

    var loading = '<tr><td colspan="4"><h5 class="text-center"><i>Loading . . . </i></h5></td></tr>';
    var nothing = '<tr><td colspan="4"><h5 class="text-center"><i>Tidak ada data !</i></h5></td></tr>';
    $(document).find('#data-tarif').load().html(loading);
    var url_control = base_url+"nilai/get_nilai_uas";
   

   // var id_tipe_transaksi = $('input[name="id_tipe_transaksi"]').val();

    $.ajax({
        type : "POST",
        url : url_control,
        data : {id_ta : id_ta, id_jenjang : id_jenjang, id_jurusan : id_jurusan, id_kelas : id_kelas, urutankelas : urutankelas, id_mapel : id_mapel},
        datatype : "html",
        success: function(response) {
        //alert(response);
            if(response == 'null') {
                $(document).find('#data-tarif').load().html(nothing);
            } else if(response == 'notvalid') {
                $(document).find('#data-tarif').load().html(nothing);
            } else {
                $(document).find('#data-tarif').load().html(response);
            }
        
        }
    });  
    
  })

    function get_tarif(nis) {
    var loading = '<tr><td colspan="7"><h5 class="text-center"><i>Loading . . . </i></h5></td></tr>';
    var nothing = '<tr><td colspan="7"><h5 class="text-center"><i>Tidak ada data !</i></h5></td></tr>';
    $(document).find('#data-tarif').load().html(loading);
    var url_control = base_url+"nilai/get_tarif_limit";
   // var id_tipe_transaksi = $('input[name="id_tipe_transaksi"]').val();

    $.ajax({
        type : "POST",
        url : url_control,
        data : {id_ta : id_ta, id_jenjang : id_jenjang, id_kelas : id_kelas, urutankelas : urutankelas},
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

  //SUBMIT ALL DATA
  $(document).on('click', '.clicksubmit', function(e) {
        var form = $('#form-transaksi');
        swal({
          title: "Apakah anda yakin ?",
          text: "Harap untuk cek kembali data isian nilai !",
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

    function get_jurusan(e) {
      var id = $(e).val();
      var url_control1 = base_url+"nilai/get_jurusan";
    
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

    function get_mapel(e) {
      var id_mapel = $(e).val();
      $('#id_mapel_txt').val(id_mapel);
    } 

</script>
