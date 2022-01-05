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
      <!-- Box -->
      <div class="col-lg-10 col-lg-offset-1 col-sm-12">
        <div class="box box-success">
          <div class="box-header with-border">
            <div class="pull-left">
              <h4>
                <?php echo $submenu;?>
              </h4>
            </div>
          
          </div>
          <form id="form-field">
          <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-bordered table-stripped mytable" id="mytable" style="width:100%;">
                            <tr>
                                <td style="width:30%;">Nama Siswa</td>
                                <td style="width:2%;">:</td>
                                <td><input type="text" name="nm_siswa" class="form-control" placeholder="Nama Siswa"></td>
                            </tr>
                            <tr>
                                <td style="width:30%;">Gender</td>
                                <td style="width:2%;">:</td>
                                <td>
                                    <select class="form-control myselect" style="width: 100%;" name="id_gender" id="id_gender">
                                        <?php echo $gender;?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td style="width:30%;">Agama</td>
                                <td style="width:2%;">:</td>
                                <td>
                                    <select class="form-control myselect" style="width: 100%;" name="id_agama" id="id_agama">
                                        <?php echo $agama;?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td style="width:30%;">Tempat Lahir</td>
                                <td style="width:2%;">:</td>
                                <td><input type="text" name="tempat_lahir" class="form-control" placeholder="Tempat Lahir"></td>
                            </tr>
                            <tr>
                                <td style="width:30%;">Tanggal Lahir</td>
                                <td style="width:2%;">:</td>
                                <td><input type="text" name="tgl_lahir" class="form-control myDate" placeholder="Tanggal Lahir"></td>
                            </tr>
                            <tr>
                                <td style="width:30%;">Anak Ke</td>
                                <td style="width:2%;">:</td>
                                <td><input type="number" name="anak_ke" class="form-control" placeholder="Anak Ke"></td>
                            </tr>
                            <tr>
                                <td style="width:30%;">Jumlah Saudara</td>
                                <td style="width:2%;">:</td>
                                <td><input type="number" name="jml_saudara" class="form-control" placeholder="Jumlah Saudara"></td>
                            </tr>
                            <tr>
                                <td style="width:30%;">Sekolah</td>
                                <td style="width:2%;">:</td>
                                <td>
                                    <select class="form-control myselect" style="width: 100%;" name="id_sekolah" id="id_sekolah">
                                        <?php echo $sekolah;?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td style="width:30%;">Jenjang</td>
                                <td style="width:2%;">:</td>
                                <td>
                                    <select class="form-control myselect" style="width: 100%;" name="id_jenjang" id="id_jenjang">
                                        <?php echo $jenjang;?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td style="width:30%;">Tahun Ajaran</td>
                                <td style="width:2%;">:</td>
                                <td>
                                    <select class="form-control myselect" style="width: 100%;" name="id_ta" id="id_ta">
                                        <?php echo $ta;?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td style="width:30%;">Jurusan</td>
                                <td style="width:2%;">:</td>
                                <td>
                                    <select class="form-control myselect" style="width: 100%;" name="id_jurusan" id="id_jurusan">
                                        <?php echo $jurusan;?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td style="width:30%;">Asal Sekolah</td>
                                <td style="width:2%;">:</td>
                                <td><input type="text" name="asal_sekolah" class="form-control" placeholder="Asal Sekolah"></td>
                            </tr>
                            <tr>
                                <td style="width:30%;">Nama Ibu</td>
                                <td style="width:2%;">:</td>
                                <td><input type="text" name="nm_ibu" class="form-control" placeholder="Nama Ibu"></td>
                            </tr>
                            <tr>
                                <td style="width:30%;">Nama Ayah</td>
                                <td style="width:2%;">:</td>
                                <td><input type="text" name="nm_ayah" class="form-control" placeholder="Nama Ayah"></td>
                            </tr>
                            <tr>
                                <td style="width:30%;">No Telepon Orang Tua</td>
                                <td style="width:2%;">:</td>
                                <td><input type="number" name="no_telpon_ortu" class="form-control" placeholder="No Telepon Orang Tua"></td>
                            </tr>
                            <tr>
                                <td style="width:30%;">Nama Wali</td>
                                <td style="width:2%;">:</td>
                                <td><input type="text" name="nm_wali" class="form-control" placeholder="Nama Wali"></td>
                            </tr>
                            <tr>
                                <td style="width:30%;">No Telepon Wali</td>
                                <td style="width:2%;">:</td>
                                <td><input type="number" name="no_telpon_wali" class="form-control" placeholder="No Telepon Orang Tua"></td>
                            </tr>
                            <tr>
                                <td style="width:30%;">Bulan Masuk</td>
                                <td style="width:2%;">:</td>
                                <td>
                                    <select class="form-control myselect" style="width: 100%;" name="bulan" id="bulan">
                                        <?php echo $bulan;?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td style="width:30%; border:1px solid #fff;"></td>
                                <td style="width:2%; border:1px solid #fff;"></td>
                                <td class="text-right " style="border:1px solid #fff">
                                    <button type="button" id="submit" class="btn bg-orange btn-md">Submit Data</button>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="pull-right">
                        <div class="form-group">
                        
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


$('#submit').click(function(){
    var dataForm  =   $('#form-field').serialize();
    // console.log(dataForm);
    $.ajax({
        url : "<?php echo base_url('pengolahan_siswa/submitMutasiMasuk')?>",
        dataType: "html",
        data: dataForm,
        type: "POST",
        success: function(data) {
            swal({
                title: "Berhasil!",
                text: 'Data Telah disimpan',
                icon: "success",
                button: "OK",
            }).then((value) => {
                //window.location.replace(url);
                // location.reload(true);
            });
            // reset_default();
        }
            
    });
})

</script>
