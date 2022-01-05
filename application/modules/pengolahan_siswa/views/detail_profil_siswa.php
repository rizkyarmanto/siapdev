<div class="content-wrapper">
    <div class="container">

        <!-- Content Header (Page header) -->
        <input type="hidden" id="paramCtrl" value="jenjang_pendidikan">
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
                List <?php echo $submenu;?>
              </h4>
                            </div>
                            <div class="pull-right">
                                <!-- <button type="button" class="btn btn-primary btn-sm action" data-action="add"  data-toggle="tooltip" title="Tambah" data-original-title="Tambah">
                <i class="glyphicon glyphicon-plus"></i></button> -->
                                &nbsp;
                                <!-- <button type="button" class="btn btn-warning btn-sm" onClick="reload_table_SS();" data-toggle="tooltip" title="Reload" data-original-title="Reload">
                <i class="fa fa-circle-o"></i></button> -->
                            </div>
                        </div>
                        <form id="form-field" enctype="multipart/form-data">
                            <div class="box-body">
                                <div style="">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <!-- Custom Tabs -->
                                            <div class="nav-tabs-custom">
                                                <ul class="nav nav-tabs">
                                                    <li class="active"><a href="#tab_1" data-toggle="tab">Siswa</a></li>
                                                    <li><a href="#tab_2" data-toggle="tab">Orang Tua / Wali</a></li>
                                                    <li><a href="#tab_3" data-toggle="tab">Catatan</a></li>

                                                    <!-- <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li> -->
                                                </ul>
                                                <div class="tab-content">
                                                    <div class="tab-pane active" id="tab_1">
                                                        <div class="row">
                                                            <table class="table table-condensed" style="margin-left:30px; margin-right:40px; margin-top:30px;" >
                                                                <tr>
                                                                    <td style="width: 40%">No Formulir</td>
                                                                    <td>
                                                                        <div class="form-group">
                                                                            <input type="text" class="form-control" name="no_formulir" id="no_formulir" value="<?php echo $dataSiswa['no_formulir']?>" style="width: 90%;" readonly> 
                                                                            <input type="hidden" class="form-control" name="id_gelombang" id="id_gelombang" style="width: 90%;"> 
                                                                            <input type="hidden" class="form-control" name="id_jurusan" id="id_jurusan" style="width: 90%;"> 
                                                                            <input type="hidden" class="form-control" name="id_ta" id="id_ta"  style="width: 90%;"> 
                                                                            <input type="hidden" class="form-control" name="id_jenjang" id="id_jenjang" style="width: 90%;"> 
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="width: 40%">Nama</td>
                                                                    <td>
                                                                        <div class="form-group">
                                                                            <input type="text" class="form-control" name="nama" id="nama" style="width: 90%;" readonly> 
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="width: 40%">Tempat Lahir</td>
                                                                    <td>
                                                                        <div class="form-group">
                                                                            <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" value="" style="width: 90%;" required> 
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="width: 40%">Tanggal Lahir</td>
                                                                    <td>
                                                                        <div class="form-group">
                                                                            <input type="text" class="form-control myDate" name="tgl_lahir" id="tgl_lahir" value="" style="width: 90%;" readonly required> 
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="width: 40%">Jenis Kelamin</td>
                                                                    <td>
                                                                        <div class="form-group">
                                                                            <select class="form-control myselect" id="id_gender" name="id_gender" style="width: 90%;" required>
                                                                                <?php echo $gender?>
                                                                            </select>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="width: 40%">Anak Ke</td>
                                                                    <td>
                                                                        <div class="form-group">
                                                                            <input type="text" class="form-control" name="anak_ke" id="anak_ke" value="" style="width: 90%;" required> 
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="width: 40%">Jumlah Saudara</td>
                                                                    <td>
                                                                        <div class="form-group">
                                                                            <input type="text" class="form-control" name="jml_saudara" id="jml_saudara" value="" style="width: 90%;" required> 
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="width: 40%">Alamat</td>
                                                                    <td>
                                                                        <div class="form-group">
                                                                            <textarea name="alamat" class="form-control" id="alamat" rows="3" placeholder="Masukkan Alamat" style="width: 90%;"></textarea>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="width: 40%">Provinsi</td>
                                                                    <td>
                                                                        <div class="form-group">
                                                                        <?php
                                                                            $style_provinsi='class="form-control myselect" id="provinsi_id" onChange="tampilKabupaten(this)" required style="width: 90%;"';
                                                                            echo form_dropdown('provinsi_id',$provinsi,'',$style_provinsi);
                                                                        ?> 
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="width: 40%">Kabupaten</td>
                                                                    <td>
                                                                        <div class="form-group">
                                                                        <?php
                                                                            $style_kabupaten='class="form-control myselect" id="kabupaten_id" onChange="tampilKecamatan(this)" required style="width: 90%;"';
                                                                            echo form_dropdown("kabupaten_id",array('0'=>'- Pilih Kabupaten -'),'',$style_kabupaten);
                                                                        ?>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="width: 40%">Kecamatan</td>
                                                                    <td>
                                                                        <div class="form-group">
                                                                        <?php
                                                                            $style_kabupaten='class="form-control myselect" id="kecamatan_id" onChange="tampilKelurahan(this)" required style="width: 90%;"';
                                                                            echo form_dropdown("kecamatan_id",array('0'=>'- Pilih Kecamatan -'),'',$style_kabupaten);
                                                                        ?>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="width: 40%">Kelurahan</td>
                                                                    <td>
                                                                        <div class="form-group">
                                                                        <?php
                                                                            $style_kelurahan='class="form-control myselect" id="kelurahan_id" required style="width: 90%;"';
                                                                            echo form_dropdown("kelurahan_id",array('0'=>'- Pilih Kelurahan -'),'',$style_kelurahan);
                                                                        ?>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="width: 40%">Asal Sekolah</td>
                                                                    <td>
                                                                        <div class="form-group">
                                                                            <input type="text" class="form-control" name="asal_sekolah" id="asal_sekolah" value="" style="width: 90%;" required> 
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="width: 40%">Agama</td>
                                                                    <td>
                                                                        <div class="form-group">
                                                                            <select class="form-control myselect required" id="id_agama" name="id_agama" style="width: 90%;" required >
                                                                                <?php echo $agama?>
                                                                            </select>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                </tr>
                                                                <tr>
                                                                    <td style="width: 30%">Foto</td>
                                                                    <td>
                                                                        <div class="form-group" style="width:90%; float:left;">
                                                                            <input type="file" id="foto" class="myFile required" name="foto" accept="image/*"> 
                                                                        </div>
                                                                        <div class="col-md-3">
                                                                            <div class="form-group">
                                                                                <div id="foto_siswa"></div>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <!-- /.tab-pane -->
                                                    <div class="tab-pane" id="tab_2">
                                                        <table class="table table-condensed" style="margin-left:30px; margin-right:40px; margin-top:30px;" >
                                                            <tr>
                                                                <td style="width: 40%">Nama Ayah</td>
                                                                <td>
                                                                    <div class="form-group">
                                                                        <input type="text" class="form-control" name="nm_ayah" id="nm_ayah" value="" style="width: 90%;"> 
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td style="width: 40%">Nama Ibu</td>
                                                                <td>
                                                                    <div class="form-group">
                                                                        <input type="text" class="form-control" name="nm_ibu" id="nm_ibu" value="" style="width: 90%;"> 
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td style="width: 40%">No Telepon Orang Tua</td>
                                                                <td>
                                                                    <div class="form-group">
                                                                        <input type="text" class="form-control" name="no_telp_ortu" id="no_telp_ortu" value="" style="width: 90%;"> 
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td style="width: 40%">Nama Wali</td>
                                                                <td>
                                                                    <div class="form-group">
                                                                        <input type="text" class="form-control" name="nm_wali" id="nm_wali" value="" style="width: 90%;"> 
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td style="width: 40%">No Telepon Wali</td>
                                                                <td>
                                                                    <div class="form-group">
                                                                        <input type="text" class="form-control" name="no_telp_wali" id="no_telp_wali" value="" style="width: 90%;"> 
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                    <!-- /.tab-pane -->
                                                    <div class="tab-pane" id="tab_3">
                                                    <table class="table table-condensed" style="margin-left:30px; margin-right:40px; margin-top:30px;" >
                                                            <tr>
                                                                <td style="width: 30%">Catatan</td>
                                                                <td>
                                                                    <div class="form-group">
                                                                        <textarea class="form-control" rows="3" name="catatan" id="catatan" placeholder="Enter ..." style="width: 90%;"></textarea>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                    <!-- /.tab-pane -->
                                                </div>
                                                <!-- /.tab-content -->
                                            </div>
                                            <!-- nav-tabs-custom -->
                                        </div>
                                        <!-- /.col -->

                                    </div>
                                    <!-- /.row -->


                                      <div class="row">
                                            <div class="col-md-6 col-md-offset-3">
                                                <div class="form-group">
                                                <button type="button" id="submit" class="btn bg-orange btn-block btn-md" >Submit</button>
                                                </div>
                                            
                                            </div>
                                        </div>
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
<script src="<?php echo base_url();?>berkas/plugins/filestyle/src/bootstrap-filestyle.min.js"></script>
<script src="<?php echo base_url();?>berkas/plugins/jquery-validate/jquery.validate.min.js"></script>
<script src="<?php echo base_url();?>berkas/plugins/jquery-validate/additional.js"></script>

<script type="text/javascript">
    $('#foto').filestyle('btnClass', 'btn-info');
    $(document).ready(function() {
        Pace.start();
        var no_formulir = $('#form-field').find("input[name='no_formulir']").val();
        $.ajax({
            url : "<?php echo base_url('pengolahan_siswa/dataDetailProfil')?>",
            dataType: "json",
            data: {no_formulir:no_formulir},
            type: "POST",
            success: function(data) {
              
                $('#form-field').find("input[name='id_gelombang']").val(data.id_gelombang);
                $('#form-field').find("input[name='id_jurusan']").val(data.id_jurusan);
                $('#form-field').find("input[name='id_ta']").val(data.id_ta);
                $('#form-field').find("input[name='id_jenjang']").val(data.id_jenjang);
                $('#form-field').find("input[name='nama']").val(data.nama);
                $('#form-field').find("input[name='tempat_lahir']").val(data.tempat_lahir);
                $('#form-field').find("input[name='anak_ke']").val(data.anak_ke);
                $('#form-field').find("input[name='jml_saudara']").val(data.jml_saudara);
                $('#form-field').find("textarea[name='alamat']").val(data.alamat);
                $('#form-field').find("input[name='asal_sekolah']").val(data.asal_sekolah);
                $('#form-field').find("input[name='tgl_lahir']").val(data.tanggal);
                $('#form-field').find("input[name='nm_ayah']").val(data.nama_ayah);
                $('#form-field').find("input[name='nm_ibu']").val(data.nama_ibu);
                $('#form-field').find("input[name='no_telp_ortu']").val(data.no_telp_ortu);
                $('#form-field').find("input[name='nm_wali']").val(data.nama_wali);
                $('#form-field').find("input[name='no_telp_wali']").val(data.no_telp_wali);
                $('#form-field').find("textarea[name='catatan']").val(data.catatan);
                $('#form-field').find("select[name='id_agama']").html(data.agama);
                $('#form-field').find("select[name='id_gender']").html(data.gender);
                $('#form-field').find("select[name='provinsi_id']").html(data.provinsi);
                $('#form-field').find("select[name='kabupaten_id']").html(data.kabupaten);
                $('#form-field').find("select[name='kecamatan_id']").html(data.kecamatan);
                $('#form-field').find("select[name='kelurahan_id']").html(data.kelurahan);
                $('#foto_siswa').html(data.fotoSiswa);
                // reset_default();
            }
        });
    });
    
    
    var validator = $("#form-field").validate();
    $('#submit').click(function(){
        if( $("#form-field").valid()){
            var dataForm    = new FormData($('#form-field')[0]);
            $.ajax({
                url : "<?php echo base_url('pengolahan_siswa/submitProfil')?>",
                dataType: "json",
                data: dataForm,
                type: "POST",
                processData : false,
                contentType:false,
                cache:false,
                success: function(data) {
                    swal({
                        title: "Berhasil!",
                        text: 'Data Telah disimpan',
                        icon: "success",
                        button: "OK",
                    }).then((value) => {

                        window.top.close();
                    });
                    // reset_default();
                }
            });

        }else{
            swal({
                title: "Failed!",
                text: 'Harap Mengisi Data Yang Benar',
                icon: "warning",
                button: "OK",
            });
        }
     
    });

</script>