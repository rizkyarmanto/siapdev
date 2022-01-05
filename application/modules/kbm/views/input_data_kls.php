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

            </div>
          </div>
          <form action="">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Tahun Ajaran</label>
                            <select class="form-control myselect" style="width: 100%;" name="id_ta" id="id_ta">
                                <?php echo $ta;?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Jenjang</label>
                            <select class="form-control myselect" style="width: 100%;" name="id_jenjang" id="id_jenjang">
                                <?php echo $jenjang;?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                         <div class="form-group">
                            <label>Tingkat</label>
                            <select class="form-control myselect" style="width: 100%;" name="id_tingkat" id="id_tingkat">
                                <?php echo $tingkat;?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Jurusan</label>
                            <select class="form-control myselect" style="width: 100%;" name="id_jurusan" id="id_jurusan">
                                <?php echo $jurusan;?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 col-md-offset-3">
                            <div class="form-group">
                            <label>Urutan</label>
                            <input name="urutan" type="text" class="form-control" id="urutan">
                            </div>
                        </div>
                    <div class="row">
                        <div class="col-md-6 col-md-offset-3">
                            <div class="form-group">
                            <button type="button" id="add" class="btn bg-orange btn-block btn-md">Tambah Data</button>
                            </div>
                        </div>
                    </div>

                   
                </form>
                       
                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>
  </section>

   <section class="content">
    <!-- Row -->
    <div class="row">
      <!-- Box -->
      <div class="col-lg-10 col-lg-offset-1 col-sm-12">
        <div class="box box-success">
          <div class="box-header with-border">
            <div class="pull-left">
              <h4>
                Data Terpilih
              </h4>
            </div>
            <div class="pull-right">

            </div>
          </div>
          <form id="myForm">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-bordered mytable" id="mytable">
                                <thead>
                                    <tr>
                                        <!-- <th style="width:10%;">No</th> -->
                                        <th style="width:30%;">Jenjang</th>
                                        <th style="width:20%;">Tahun Ajaran</th>
                                        <th style="width:30%;">Nama Kelas</th>
                                        <th style="width:10%;">Action</th>
                                    </tr>
                                </thead>
                            <tbody id="listPilihan">
                            
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            
          <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="form-group">
                       <button type="button" id="save" class="btn bg-orange btn-block btn-md">Submit</button>
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
<script type="text/javascript">
 var count = 0;   
$('#add').click(function(){
    var id_jenjang = $('#id_jenjang option:selected').val();
    var jenjang = $('#id_jenjang option:selected').text();

    var id_jurusan = $('#id_jurusan option:selected').val();
    var juruasan = $('#id_jurusan option:selected').text();

    var id_ta = $('#id_ta option:selected').val();
    var ta = $('#id_ta option:selected').text();

    var id_jurusan = $('#id_jurusan option:selected').val();
    var jurusan = $('#id_jurusan option:selected').text();

    var id_tingkat = $('#id_tingkat option:selected').val();
    var tingkat = $('#id_tingkat option:selected').text();

    var urutan = $('#urutan').val();

  
   
    count += 1;
    var row = ' <tr class="daftarSiswa" id="daftarSiswa" >'+
                    '<td>'+
                        '<input type="hidden" class="form-control" id="id_jenjang'+count+'" name="id_jenjang_pilih[]" value="'+id_jenjang+'" readonly>'+
                        '<input type="text" class="form-control" id="jenjang'+count+'" name="jenjang_pilih[]" value="'+jenjang+'" readonly>'+
                    '</td>'+
                    '<td>'+
                        '<input type="hidden" class="form-control" id="id_ta'+count+'" name="id_ta_pilih[]" value="'+id_ta+'" readonly>'+
                        '<input type="text" class="form-control" id="ta'+count+'" name="ta_pilih[]" value="'+ta+'" readonly>'+
                        '<input type="hidden" class="form-control" id="id_tingkat'+count+'" name="id_tingkat_pilih[]" value="'+id_tingkat+'" readonly>'+
                        '<input type="hidden" class="form-control" id="id_jurusan'+count+'" name="id_jurusan_pilih[]" value="'+id_jurusan+'" readonly>'+
                        '<input type="hidden" class="form-control" id="urutan'+count+'" name="urutan_pilih[]" value="'+urutan+'" readonly>'+
                    '</td>'+
                    '<td>'+
                        '<input type="text" class="form-control" id="nm_kelas'+count+'" name="nm_kelas_pilih[]" value="'+tingkat+' '+jurusan+' '+urutan+'" readonly>'+
                    '</td>'+
                    '<td><button type="button"   class="btn bg-red btn-block btn-md remove" id="remove">x</button></td>'+
                '</tr>';

    $('#listPilihan').append(row);
});

$("body").on('click', '#remove', function (e) {
    e.preventDefault();
 
    $(this).parents("#daftarSiswa").fadeOut();
    $(this).parents("#daftarSiswa").remove();

});


$('#save').click(function(){
    var id_jenjang_pilih  =   $('input[name="id_jenjang_pilih[]"]').map(function(){
        return this.value;
    }).get();
    var id_ta_pilih  =   $('input[name="id_ta_pilih[]"]').map(function(){
        return this.value;
    }).get();
    var nm_kelas_pilih  =   $('input[name="nm_kelas_pilih[]"]').map(function(){
        return this.value;
    }).get();

    var id_tingkat_pilih  =   $('input[name="id_tingkat_pilih[]"]').map(function(){
        return this.value;
    }).get();
    
    var id_jurusan_pilih  =   $('input[name="id_jurusan_pilih[]"]').map(function(){
        return this.value;
    }).get();

    var urutan_pilih  =   $('input[name="urutan_pilih[]"]').map(function(){
        return this.value;
    }).get();

    var url = '<?php echo base_url('kbm/data_kelas')?>';
    // console.log(url);
    $.ajax({
        url : "<?php echo base_url('kbm/submitKelas')?>",
        dataType: "json",
        data: 
            {
                id_jenjang_pilih:id_jenjang_pilih,
                id_ta_pilih:id_ta_pilih,
                nm_kelas_pilih:nm_kelas_pilih,
                id_tingkat_pilih:id_tingkat_pilih,
                id_jurusan_pilih:id_jurusan_pilih,
                urutan_pilih:urutan_pilih
            },
        type: "POST",
        success: function(data) {
            swal({
                title: "Berhasil!",
                text: 'Data telah tersimpan',
                icon: "success",
                button: "OK",
            }).then((value)=>{
               // swal(`The returned value is: ${value}`);
                //location.reload();
                window.location.replace(url);
            });
            // reset_default();
        }
            
    });
});


</script>
