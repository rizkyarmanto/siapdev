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
                            <label>Matapelajaran</label>
                            <select class="form-control myselect" style="width: 100%;" name="id_mapel" id="id_mapel">
                                <?php echo $mapel;?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Guru</label>
                            <select class="form-control myselect" style="width: 100%;" name="id_guru" id="id_guru">
                                <?php echo $guru;?>
                            </select>
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
                    <div class="col-md-6 col-lg-offset-3">
                        <table class="table table-bordered mytable" id="mytable">
                                <thead>
                                    <tr>
                                        <!-- <th style="width:10%;">No</th> -->
                                        <th style="width:30%;">Matapelajaran</th>
                                        <th style="width:20%;">Guru</th>
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
  
    var id_guru = $('#id_guru option:selected').val();
    var guru = $('#id_guru option:selected').text();

    var id_mapel = $('#id_mapel option:selected').val();
    var mapel = $('#id_mapel option:selected').text();

    var urutan = $('#urutan').val();

  
   
    count += 1;
    var row = ' <tr class="daftarSiswa" id="daftarSiswa" >'+
                    '<td>'+
                        '<input type="hidden" class="form-control" id="id_mapel'+count+'" name="id_mapel_pilih[]" value="'+id_mapel+'" readonly>'+
                        '<input type="text" class="form-control" id="mapel'+count+'" name="mapel_pilih[]" value="'+mapel+'" readonly>'+
                    '</td>'+
                    '<td>'+
                        '<input type="hidden" class="form-control" id="id_guru'+count+'" name="id_guru_pilih[]" value="'+id_guru+'" readonly>'+
                        '<input type="text" class="form-control" id="guru'+count+'" name="guru_pilih[]" value="'+guru+'" readonly>'+
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
    var id_mapel_pilih  =   $('input[name="id_mapel_pilih[]"]').map(function(){
        return this.value;
    }).get();
    var id_guru_pilih  =   $('input[name="id_guru_pilih[]"]').map(function(){
        return this.value;
    }).get();
   

    var url = '<?php echo base_url('kbm/kelola_guru_mapel')?>';
    // console.log(url);
    $.ajax({
        url : "<?php echo base_url('kbm/submitGuruMapel')?>",
        dataType: "json",
        data: 
            {
                id_mapel_pilih:id_mapel_pilih,
                id_guru_pilih:id_guru_pilih
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
});


</script>
