
   <div class="box-body">
    <div style="">
        <div class="row">

            <div class="col-md-8 col-md-offset-2">
                <?php if($this->session->flashdata('psn') != '') {?>
                    <div class="alert alert-<?php echo $this->session->flashdata('type_alert')?> alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true" style="margin-top: 10px;">&times;</button>
                        <h4 style="margin-top: 10px;"><i class="icon fa fa-ban"></i></h4>
                    </div>
                    <?php } ?>
            </div>
            <form id="form-field">
                <div class="col-md-12">
                    <table class="table table-bordered mytable" id="mytable" style="width:100%;">
                        <tr style="width:100%;">
                            <th>No</th>
                            <th>NIS</th>
                            <th>Nama Siswa</th>
                            <th>Gender</th>
                            <th>Lulus</th>
                            <!-- <th>Keterangan</th> -->
                        </tr>
                        <?php if(empty(count($dataSiswa))){?>
                            <tr style="width:100%;">
                                <td colspan="6" style="text-align: center;">Data Tidak Ditemukan</td>
                            </tr>
                        <?php }else{ ?>
                            <?php $no=1;foreach($dataSiswa as $ds){?>
                                <tr>
                                    <td  style="width: 2%; text-align:center; vertical-align:center;"><?php echo $no++;?></td>
                                    <td  style="width: 10%; vertical-align:center;">
                                        <?php echo $ds['nis']?>
                                    </td>
                                    <td  style="width: 20%">
                                        <input type="hidden" class="form-control" id="id_siswa" name="id_siswa[]" value=" <?php echo $ds['id_siswa']?>" readonly>
                                        <?php echo $ds['nama']?>
                                    </td>
                                    <td  style="width: 15%">
                                        <?php echo $ds['nm_gender']?>
                                    </td>
                                    <td  style="width: 20%">
                                        <input type="checkbox" class="minimal lulus" name="lulus[]" checked>
                                    </td>
                                    <!-- <td  style="width: 20%">
                                        <input type="text" class="form-control" id="keterangan" name="keterangan[]">
                                    </td> -->
                                </tr>
                            <?php } ?>
                        <?php }?>
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


<script>

 $('#submit').click(function(){
    var dataForm    = $('#form-field').serialize();
    var checkArr  = [];
    var siswaArr = [];
    var mychekbox   =   $('input[name="lulus[]"]');
    var idsiswa   =   $('input[name="id_siswa[]"]');

    var valueCheck  = 0;
    for(var i = 0; i < mychekbox.length; i++){
        if(mychekbox.eq(i).is(':checked')){
            valueCheck = 1;
            checkArr.push(valueCheck);
            siswaArr.push(idsiswa.eq(i).val());
        }else{
            valueCheck = 0;
            checkArr.push(valueCheck);
            siswaArr.push(idsiswa.eq(i).val());
        }
        // newArr.push(mychekbox.eq(i).val());
        console.log(checkArr);
        console.log(siswaArr);
    }
   
    $.ajax({
        url : "<?php echo base_url('pengolahan_siswa/submitLulus')?>",
        dataType: "json",
        data: 
        {
            id_siswa : siswaArr,
            id_status : checkArr
        },
        type: "POST",
        success: function(data) {
            swal({
                title: "Berhasil!",
                text: 'Data Telah disimpan',
                icon: "success",
                button: "OK",
            }).then((value) => {
                //window.location.replace(url);
                location.reload(true);
            });
            // reset_default();
        }
    });
  
  
});
  
  



// });

                                
</script>