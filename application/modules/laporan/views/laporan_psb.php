<div class="content-wrapper">
<div class="container">

  <!-- Content Header (Page header) -->
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
                        <label>Laporan</label>
                        <select class="form-control myselect" style="width: 100%;" name="idLaporan" id="idLaporan">
                            <?php echo $laporan;?>
                        </select>
                    </div>
                  
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="form-group">
                       <button type="button" id="cetak" class="btn bg-orange btn-block btn-md">Cetak</button>
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




<script type="text/javascript">


$('#cetak').click(function(){
    var id_ta       =   $('#id_ta').val();
    var idLaporan  =   $('#idLaporan').val();
    // console.log(id_ta);
    
    if(idLaporan == 1){
        window.open('laporan/psb_print/'+id_ta, '_blank', 'location=yes,height=570,width=520,scrollbars=yes,status=yes');
    }
});
    
</script>
