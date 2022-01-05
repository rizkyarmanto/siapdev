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
            <div class="row">
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
                                    <div class="col-md-6 col-md-offset-3">
                                        <div class="form-group">
                                            <label>Kelas</label>
                                            <select class="form-control myselect" style="width: 100%;" name="id_kelas" id="id_kelas">
                                                <?php echo $kelas;?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Siswa</label>
                                            <select class="form-control myselect" style="width: 100%;" name="id_siswa" id="id_siswa">
                                                <option value="0">-- Pilih Siswa --</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-6 col-md-offset-3">
                                        <div class="form-group">
                                            <button type="button" id="show" class="btn bg-orange btn-block btn-md">Tampil Data Catatan</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

        <div id="listCatatan"></div>
        <!-- /.content -->
    </div>
</div>



<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript">
$('#id_kelas').change(function(){
    var id_kelas = $('#id_kelas').find(":selected").val();
    $.ajax({
     url: "<?php echo base_url('pengolahan_siswa/filteredSiswaByKelas');?>/"+id_kelas,
     dataType:"html",
     success: function(response){
        $("#id_siswa").html(response);
     },
    
   });
   return false;
   

})
   

$('#show').click(function(){
  
    var id_siswa = $('#id_siswa').find(":selected").val();
    var nm_siswa = $('#id_siswa').find(":selected").text();
    // console.log(id_ta);
    // console.log(id_jenjang);
    $.ajax({
        url : "<?php echo base_url('pengolahan_siswa/showListCatatanSiswa')?>",
        dataType: "html",
        data: 
            {
                id_siswa:id_siswa,
                nm_siswa:nm_siswa
            },
        type: "POST",
        success: function(data) {
            $("#listCatatan").html(data);
           
        }     
    });
})
</script>
