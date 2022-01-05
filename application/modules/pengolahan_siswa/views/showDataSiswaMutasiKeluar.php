
   <div class="box-body">
    <div style="">
        <div class="row">

            <form id="form-field">
                <div class="col-md-12">
                    <table class="table table-bordered mytable" id="mytable" style="width:100%;">
                        <tr style="width:100%;">
                            <td style="width:30%;">NISN</td>
                            <input type="hidden" name="id_siswa" value="<?php echo $data['id_siswa'];?>">
                            <td><?php echo $data['nisn']?></td>
                        </tr>
                        <tr style="width:100%;">
                            <td style="width:30%;">NIS</td>
                            <td><?php echo $data['nis']?></td>
                        </tr>
                        <tr style="width:100%;">
                            <td style="width:30%;">Nama Siswa</td>
                            <td><?php echo $data['nama']?></td>
                        </tr>
                        <tr style="width:100%;">
                            <td style="width:30%;">Kelas</td>
                            <td><?php echo $data['nm_kelas']?></td>
                        </tr>
                        <tr style="width:100%;">
                            <td style="width:30%;">Jenis Kelamin</td>
                            <td><?php echo $data['gender']?></td>
                        </tr>
                        <tr style="width:100%;">
                            <td style="width:30%;">Agama</td>
                            <td><?php echo $data['agama']?></td>
                        </tr>
                        <tr style="width:100%;">
                            <td style="width:30%;">Tempat Lahir</td>
                            <td><?php echo $data['tempat_lahir']?></td>
                        </tr>
                        <tr style="width:100%;">
                            <td style="width:30%;">Tanggal Lahir</td>
                            <td><?php echo $data['tanggal_lahir']?></td>
                        </tr>
                        <tr style="width:100%;">
                            <td style="width:30%;">Foto</td>
                            <td><img src="<?php echo $data['foto_locate'].'/'.$data['foto_hash']?>" ></td>
                        </tr>
                        <tr style="width:100%;">
                            <td style="width:30%;">Alasan Mutasi</td>
                            <td><input type="text" name="alasan_mutasi" class="form-control" required></td>
                        </tr>
                        <tr style="width:100%;">
                            <td style="width:30%;">Mutasi Ke</td>
                            <td><input type="text" name="mutasi_ke" class="form-control"></td>
                        </tr>

                    </table>
                </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="form-group">
                    <button type="button" id="submit" class="btn bg-green btn-block btn-md">Submit</button>
                </div>
            </div>
        </div>
    </div>
</div>
</form>

<script src="<?php echo base_url();?>berkas/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>berkas/plugins/datatables/dataTables.bootstrap.min.js"></script>
<script>

 $('#submit').click(function(){
// if( $("#form-field").valid()){
    var dataForm    = $('#form-field').serialize();
    // var 
    $.ajax({
        url : "<?php echo base_url('pengolahan_siswa/submitMutasiKeluar')?>",
        dataType: "json",
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
  



});

                                
</script>