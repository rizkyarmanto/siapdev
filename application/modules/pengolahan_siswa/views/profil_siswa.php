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
                        <label>No Formulir</label>
                        <input name="no_formulir" type="text" class="form-control" id="no_formulir">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="form-group">
                       <button type="button" id="tampil" class="btn bg-orange btn-block btn-md">Tampil Data</button>
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


</div>
</div>  



<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript">

$('#tampil').click(function(){
    var no_formulir  =   $('#no_formulir').val();
    $.ajax({
        url : "<?php echo base_url('pengolahan_siswa/showListProfilSiswa')?>",
        dataType: "json",
        data: 
            {
                no_formulir:no_formulir,
            },
        type: "POST",
        success: function(data) {
            $('#dataShow').html(data);
        }
    });
});

</script>
