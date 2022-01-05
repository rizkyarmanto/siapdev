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
              <button type="button" class="btn btn-primary btn-sm action" data-action="add"  data-toggle="tooltip" title="Tambah" data-original-title="Tambah">
                <i class="glyphicon glyphicon-plus"></i></button>
                &nbsp;
                <!-- <button type="button" class="btn btn-warning btn-sm" onClick="reload_table_SS();" data-toggle="tooltip" title="Reload" data-original-title="Reload">
                <i class="fa fa-circle-o"></i></button> -->
            </div>
          </div>
          
          <div class="box-body">
            <div style="overflow-x: auto;">
                <div class="col-lg-6 col-sm-12">
                    <form class="form-field">
                        <input type="text" name="id_role" value="<?php echo $id_role;?>">
                        <?php echo $getMenuTree;?>
                        <div class="col-md-11"></div>
                        <div class="col-md-1"> 
                        <button type="button" class="btn btn-xl btn-info" id="myButton">Simpan</button>
                        </div>
                    </form>
                </div>

            </div>
          </div>

        </div>
      </div>
    </div>
  </section>
  <!-- /.content -->
</div>
</div>  



<style type="text/css">
  .dd3-handle {
    background : white !important;
  }
  .dd3-content {
    background : white !important;
  }

  .collapsibleList li{
    list-style-image : url('<?php echo base_url();?>berkas/plugins/collapsiblelists/img/button.png');
    cursor : auto;
  }

  li.collapsibleListOpen{
    list-style-image : url('<?php echo base_url();?>berkas/plugins/collapsiblelists/img/button-open.png');
    cursor : pointer;
  }

  li.collapsibleListClosed{
    list-style-image : url('<?php echo base_url();?>berkas/plugins/collapsiblelists/img/button-closed.png');
    cursor : pointer;
  }

  ul.collapsibleList {
    padding-left:15px;
  }
</style>


<script src="<?php echo base_url()?>berkas/plugins/collapsiblelists/CollapsibleLists.js"></script>

<script type="text/javascript">
  CollapsibleLists.apply();
</script>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript">
 $(document).on('click', ".action", function() {
     var self        = this;

     var action  = $(this).attr('data-action');

     if (action == "aktif") {
         var check   = $(this).prop("checked");
         if (check) {
             var status  = "1";
         } else {
             var status  = "0";
         }
         var id_role     = $(this).attr('data-id_role');
         var id_menu  = $(this).attr('data-id_menu');
         var nama        = $(this).closest("tr").find("td:eq(1)").text();

         $.ajax({
           url : "<?php echo base_url('usermanagement/atur_akses_action')?>/"+action,
           dataType: "json",
           data: 'id_role='+id_role+'&status='+status+'&id_menu='+id_menu,
           type: "POST",
           success: function(data) {
             if (data.status == 1) {
               var text    = 'aktifkan';

             } else if (data.status == 0) {
               var text    = 'nonaktifkan';

             }
            //    swal({
            //      title: "Berhasil!",
            //      text: 'Data telah disimpan',
            //      type: "success",
            //    });
           }
         })
         
     }
 })

 $('#myButton').click(function(){   
    swal({
        title: "Berhasil!",
        text: 'Data telah di simpan',
        icon: "success",
        button: "OK",
    }).then((value) => {
        var url = '<?php echo base_url();?>usermanagement/hakAkses';
        window.location.replace(url);
    });
 })


</script>
