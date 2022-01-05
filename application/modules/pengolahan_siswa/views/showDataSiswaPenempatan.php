
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
            <form>
                <?php if(empty(count($dataSiswa))){?>
                    <div class="col-md-10 col-md-offset-1">
                        <table class="table table-bordered mytable" id="mytable">
                            <tr>
                                <th colspan="3" style="text-align:center;">Data Tidak Ada</th>
                            </tr>
                        </table>
                    </div>
                <?php }else{ ?>
                <div class="col-md-6">
                    <table class="table table-bordered mytable" id="mytable">
                        <tr>
                            <th>Nama Siswa</th>
                            <th>Pilih</th>
                        </tr>
                        <?php $no=1;foreach($dataSiswa as $ds){?>
                            <tr class="list" id="sis-<?php echo $ds['id_siswa']?>">
                                <td>
                                    <input type="hidden" class="form-control" id="id_siswa" name="id_siswa[]" value=" <?php echo $ds['id_siswa']?>" readonly>
                                    <input type="text" class="form-control" id="nama" name="nama[]" value=" <?php echo $ds['nama']?>" readonly>
                                </td>
                                <td><button type="button"  class="btn bg-orange btn-block btn-md pilih">Pilih</button></td>
                            </tr>
                        <?php } ?>
                            <tr>
                                <td colspan="3"><button type="button"  class="btn bg-maroon btn-block btn-md all">Pilih Semua</button></td>
                            </tr>
                    </table>
                </div>
                <div class="col-md-6">
                    <div class="col-md-12">
                        <div class="form-group">
                            <select class="form-control myselect" name="id_kelas" style="width: 100%;" >
                                <?php echo $kelas?>
                            </select>
                        </div>
                    </div>
                    
                    <table class="table table-bordered mytable" id="mytable">
                            <thead>
                                <tr>
                                    <th>Nama Siswa</th>
                                    <th>Pilih</th>
                                </tr>
                            </thead>
                        <tbody id="listPilihan">
                          
                        </tbody>
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

<script src="<?php echo base_url();?>berkas/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>berkas/plugins/datatables/dataTables.bootstrap.min.js"></script>
<script>
  var count = 0;    
$('.pilih').click(function(){
    var id_siswa = $(this).closest("tr").find("td:eq(0)").find('#id_siswa').val();
    var nm_siswa = $(this).closest("tr").find("td:eq(0)").find('#nama').val();
    console.log(id_siswa);
    console.log(nm_siswa);
    count += 1;
    var row = ' <tr class="daftarSiswa" id="daftarSiswa" >'+
                '<td>'+
                    '<input type="hidden" class="form-control" id="id_siswa'+count+'" name="id_siswa_pilih[]" value="'+id_siswa+'" readonly>'+
                    '<input type="text" class="form-control" id="nama'+count+'" name="nm_siswa_pilih[]" value="'+nm_siswa+'" readonly>'+
                '</td>'+
                '<td><button type="button" data-id='+id_siswa+'  class="btn bg-red btn-block btn-md remove" id="remove">x</button></td>'+
            '</tr>';

   $('#listPilihan').append(row);
   $(this).parents(".list").fadeOut();
   $(this).parents(".list").addClass('hidden');

   $( ".list" ).each(function( i ) {
    if ( $('.list').hasClass('hidden').length == $('.list').length ) {
    //   this.style.color = "blue";
        $('.all').attr('disabled', true);
    } else {
    //   this.style.color = "";
        $('.all').attr('disabled', true);
    }
  });
});




$("body").on('click', '#remove', function (e) {
    e.preventDefault();
 
    $(this).parents("#daftarSiswa").fadeOut();
    $(this).parents("#daftarSiswa").remove();
    var siswa = $(this).attr('data-id');
    $('#sis-'+siswa).fadeIn();
    $('#sis-'+siswa).removeClass('hidden');
    //alert($(".list").length);
    $( ".list" ).each(function( i ) {
        if ( $('.list').hasClass('hidden').length == $('.list').length ) {
        //   this.style.color = "blue";
            $('.all').attr('disabled', true);
        } else {
        //   this.style.color = "";
            $('.all').attr('disabled', false);
        }
    });
   
});

$('.all').click(function(){
    var id_siswaAll =   $('input[name="id_siswa[]"]');
    var nm_siswaAll =   $('input[name="nama[]"]');
    // console.log(id_siswaAll.length);
    // console.log(nm_siswaAll.length);
    for(var i=0; i < id_siswaAll.length; i++){
     
        var idSiswa =   id_siswaAll.eq(i).val();
        var nmSiswa =   nm_siswaAll.eq(i).val();
        count += 1;
        var row = ' <tr class="daftarSiswa" id="daftarSiswa" >'+
                    '<td>'+
                        '<input type="hidden" class="form-control" id="id_siswa'+count+'" name="id_siswa_pilih[]" value="'+idSiswa+'" readonly>'+
                        '<input type="text" class="form-control" id="nama'+count+'" name="nm_siswa_pilih[]" value="'+nmSiswa+'" readonly>'+
                    '</td>'+
                    '<td><button type="button" data-id='+idSiswa+'  class="btn bg-red btn-block btn-md remove" id="remove">x</button></td>'+
                '</tr>';

        $('#listPilihan').append(row);

        $(".list").fadeOut();
        $(".list").hide();
        $('.all').attr('disabled', true);
    }

});

$('#submit').click(function(){
    var id_kelas    =   $('select[name="id_kelas"]').find(":selected").val();
    var urutan_kelas    =   $('input[name="urutan"]').val();
   
    var id_siswa_pilih  =   $('input[name="id_siswa_pilih[]"]').map(function(){
        return this.value;
    }).get();
    // console.log(id_siswa_pilih);
    // console.log(urutan_kelas);
    // console.log(id_tingkat);
    var url = '<?php echo base_url('pengolahan_siswa/data_kelas_siswa')?>';
    $.ajax({
        url : "<?php echo base_url('pengolahan_siswa/executeSubmitKelas')?>",
        dataType: "json",
        data: 
            {
                id_siswa_pilih:id_siswa_pilih,
                id_kelas:id_kelas
            },
        type: "POST",
        success: function(data) {
            swal({
                title: "Berhasil!",
                text: 'Data telah tersimpan',
                icon: "success",
                button: "OK",
            }).then((value) => {
                window.location.replace(url);
            });
            // reset_default();
        }
            
    });
    // location.reload(true);
})





</script>