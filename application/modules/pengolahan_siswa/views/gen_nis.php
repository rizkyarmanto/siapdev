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
                  
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="form-group">
                       <button type="button" id="generate" class="btn bg-orange btn-block btn-md">Generate</button>
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


$('#generate').click(function(){
    var id_ta       =   $('#id_ta').val();
    var id_jenjang  =   $('#id_jenjang').val();
    // console.log(id_ta);
    // console.log(id_jenjang);
    $.ajax({
        url : "<?php echo base_url('pengolahan_siswa/executeGenerateNis')?>",
        dataType: "json",
        data: 
            {
                id_ta:id_ta,
                id_jenjang:id_jenjang
            },
        type: "POST",
        success: function(data) {
            swal({
                title: "Berhasil!",
                text: 'data NIS telah tergenerate',
                icon: "success",
                button: "OK",
                });
            reset_default();
        }
            
    });
})
</script>
