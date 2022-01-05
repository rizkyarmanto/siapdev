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
                <?php echo $submenu;?>
              </h4>
            </div>
            <div class="pull-right">
            </div>
          </div>
          <form action="">
            <div class="box-body">
                <div style="">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
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
                        <div class="form-group">
                            <label>Jurusan</label>
                            <select class="form-control myselect" style="width: 100%;" name="id_jurusan" id="id_jurusan">
                                <?php echo $jurusan;?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Tingkat</label>
                            <select class="form-control myselect" style="width: 100%;" name="id_tingkat" id="id_tingkat">
                                <?php echo $tingkat;?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Kelas</label>
                            <select class="form-control myselect" style="width: 100%;" name="id_kelas" id="id_kelas">
                                <option value="0">-- Pilih Kelas</option>
                            </select>
                        </div>
                    </div>
                </div>
                    <div class="row">
                        <div class="col-md-6 col-md-offset-3">
                            <div class="form-group">
                            <button type="button" id="tampil" class="btn bg-orange btn-block btn-md">Tampil</button>
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
  
<div class="row">
    <section class="content">
        <div class="row">
            <div class="col-lg-10 col-lg-offset-1 col-sm-12">
                <div class="box box-success">
                <div class="box-header with-border">
                    <div class="text-center">
                        <h4>
                            Data Siswa
                        </h4>
                    </div>
                    <div class="pull-right">
                    </div>
                </div>
                    <div id="dataShow"></div>
                </div>
            </div>
        </div>
    </section>
</div>

  <!-- /.content -->
</div>
</div>  



<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript">

$('#id_tingkat').change(function(){
    var id_tingkat = $('#id_tingkat').find(":selected").val();
    var id_jurusan = $('#id_jurusan').find(":selected").val();
    var id_ta = $('#id_ta').find(":selected").val();
    var id_jenjang = $('#id_jenjang').find(":selected").val();
    $.ajax({
    //  url: base_url+"chained/pilih_kabupaten/"+kdprop,
     url: "<?php echo base_url('pengolahan_siswa/filteredKelas');?>/"+id_tingkat+"/"+id_jurusan+"/"+id_ta+"/"+id_jenjang,
    
     success: function(response){
     $("#id_kelas").html(response);
     },
     dataType:"html"
   });
   return false;
   

})
   


$('#tampil').click(function(){
    var id_ta       =   $('#id_ta').find(":selected").val();
    var id_jenjang  =   $('#id_jenjang').find(":selected").val();
    var id_tingkat  =   $('#id_tingkat').find(":selected").val();
    var id_kelas    =   $('#id_kelas').find(":selected").val();
    var id_jurusan  =   $('#id_jurusan').find(":selected").val();

    console.log(id_ta);
    console.log(id_jenjang);
    console.log(id_tingkat);
    console.log(id_kelas);
    console.log(id_jurusan);

    $.ajax({
        url : "<?php echo base_url('pengolahan_siswa/showListSiswaBykls')?>",
        dataType: "json",
        data: 
            {
                id_kelas:id_kelas,
                id_tingkat:id_tingkat,
                id_jurusan:id_jurusan
            },
        type: "POST",
        success: function(data) {
            $('#dataShow').html(data);
        }
            
    });
})
</script>
