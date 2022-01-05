<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-design/0.5.10/css/ripples.min.css"/>

<link rel="stylesheet" href="<?php echo base_url();?>berkas/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css">
   <div class="box-body">
    <div style="">
        <div class="row">

            <form>
                <?php if(empty(count($dataKelas))){?>
                    <div class="col-md-10 col-md-offset-1">
                        <table class="table table-bordered mytable" id="mytable">
                            <tr>
                                <th colspan="3" style="text-align:center;">Data Tidak Ada</th>
                            </tr>
                        </table>
                    </div>
                <?php }else{ ?>
                <div class="col-md-12">
                    <table class="table table-bordered mytable" id="mytable">
                        <tr>
                            <th>No</th>
                            <th>Nama Siswa</th>
                            <th>Guru</th>
                        </tr>
                        <?php $no=1;foreach($dataKelas as $ds){?>
                            <tr class="list" id="sis-<?php echo $ds['id_kelas']?>">
                                <td><?php echo $no++;?></td>
                                <td>
                                    <input type="hidden" class="form-control" id="id_kelas" name="id_kelas[]" value=" <?php echo $ds['id_kelas']?>" readonly>
                                    <input type="text" class="form-control" id="nm_kelas" name="nm_kelas[]" value=" <?php echo $ds['nm_kelas']?>" readonly>
                                </td>
                                <td>
                                    <select class="form-control myselect" style="width: 100%;" name="id_guru[]" id="id_guru">
                                        <?php echo $guru;?>
                                    </select>
                                </td>
                            </tr>
                        <?php } ?>
                    </table>
                </div>
            <?php } ?>
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

<script src="<?php echo base_url();?>berkas/plugins/select2/dist/js/select2.min.js"></script>
<script>
var count = 0;    
$(document).ready(function(){
    $(".myselect").select2();
});


$('#submit').click(function(){
   
    var id_kelas  =   $('input[name="id_kelas[]"]').map(function(){
        return this.value;
    }).get();

    var id_guru  =   $('select[name="id_guru[]"] option:selected').map(function(){
        return this.value;
    }).get();
    
    console.log(id_kelas);
    console.log(id_guru);
  
    var url = '<?php echo base_url('kbm/data_walikelas')?>'
    $.ajax({
        url : "<?php echo base_url('kbm/submitWalikelas')?>",
        dataType: "json",
        data: 
            {
                id_kelas:id_kelas,
                id_guru:id_guru,
            },
        type: "POST",
        success: function(data) {
            swal({
                title: "Berhasil!",
                text: 'Data telah tersimpan',
                icon: "success",
                button: "OK",
            }).then((value)=>{
                
                window.location.replace(url);
            });
            
        }
            
    });
})





</script>