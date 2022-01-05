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
                    <select class="form-control" onChange="window.document.location.href=this.options[this.selectedIndex].value;" value="GO">
                        <option selected="selected">-Pilih Role-</option>
                        <?php foreach ($dataRole as $g) { ?>
                            <option value="<?php echo base_url().'usermanagement/atur_akses/'.$g['id_role'];?>">
                        <?php echo $g['nm_role'];?>
                            </option>
                        <?php } ?>
                    </select>
                </div>

                 <div class="col-lg-6 col-sm-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">List Menu</h3>
                        </div>
                        <div class="box-header text-right">
                            <button class="btn btn-md btn-danger cek action" data-action="add">Tambah Data</button>
                        </div>

                        <div class="box-body" style="margin-left:20px;  ">
                            <?php echo $treeMenu;?>
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer text-left">

                        </div>
                    </div>
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


 <form id="form-field">
    <div class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h4 class="modal-title">Menu</h4>
                </div>
                <div class="modal-body">
                    <input name="id_menu" type="hidden">

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nm_menu" class="control-label">Nama Menu</label>
                                <input name="nm_menu" type="text" class="form-control" id="nm_menu">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="kd_menu" class="control-label">Kode Menu</label>
                                <input name="kd_menu" type="text" class="form-control" id="kd_menu">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="teks_menu" class="control-label">Teks Menu</label>
                                <input name="teks_menu" type="text" class="form-control" id="teks_menu">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="sort" class="control-label">Sort</label>
                                <input name="sort" type="text" class="form-control" id="sort">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="id_parent" class="control-label">Parent Menu</label>
                                <select name="id_parent" class="form-control myselect" id="id_parent" style="width: 100%;">
                                    <?php echo $ListMenuParent?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="url_siap" class="control-label">URL SIAP</label>
                                <input name="url_siap" type="text" class="form-control" id="url_siap" >
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="url_porto" class="control-label">URL Porto</label>
                                <input name="url_porto" type="text" class="form-control" id="url_porto">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="icon_siap" class="control-label">Icon SIAP</label>
                                <input name="icon_siap" type="text" class="form-control" id="icon_siap" placeholder="fa fa-database">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="icon_porto" class="control-label">Icon Porto</label>
                                <input name="icon_porto" type="text" class="form-control" id="icon_porto" placeholder="mdi-view-dashboard">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="attribut" class="control-label">Attribut</label>
                                <input name="attribut" type="text" class="form-control" id="attribut">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="class" class="control-label">Class</label>
                                <input name="class" type="text" class="form-control" id="class" placeholder="bg-orange">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="type_siap" class="control-label">Type SIAP</label>
                                <input name="type_siap" type="text" class="form-control" id="type_siap" placeholder="parent">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="type_porto" class="control-label">Type Porto</label>
                                <input name="type_porto" type="text" class="form-control" id="type_porto" placeholder="out">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="show_siap" class="control-label">Show SIAP</label>
                                <input name="show_siap" type="number" class="form-control" id="show_siap" placeholder="1 atau 0">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="show_porto" class="control-label">Show Porto</label>
                                <input name="show_porto" type="number" class="form-control" id="show_porto" placeholder="1 atau 0">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Tutup</button>
                    <button type="button" data-action="simpan" class="action btn btn-info waves-effect waves-light">Simpan</button>
                </div>
            </div>
        </div>
    </div>
</form>

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
  var mode;
    function show_modal(data) {

        if (mode == "add") {
            $('#form-field')[0].reset();
            $('#form-field').children('.modal').find('.modal-title').text("Tambah Menu");
            $('#form-field').children('.modal').modal('show'); 
        } 
        else if (mode == "edit") {
        $.ajax({
            url : "<?php echo base_url('usermanagement/hakAksesAction')?>/"+"detail",
            dataType: "json",
            data: "id_menu="+data,
            type: "POST",
            success: function(data) {
                $('#form-field').find('input[name="id_menu"]').val(data.id_menu);
                $('#form-field').find('input[name="kd_menu"]').val(data.kd_menu);
                $('#form-field').find('input[name="nm_menu"]').val(data.nm_menu);
                $('#form-field').find('input[name="url_siap"]').val(data.url_siap);
                $('#form-field').find('input[name="url_porto"]').val(data.url_porto);
                $('#form-field').find('input[name="icon_siap"]').val(data.icon_siap);
                $('#form-field').find('input[name="icon_porto"]').val(data.icon_porto);
                $('#form-field').find('input[name="class"]').val(data.class);
                $('#form-field').find('input[name="type_siap"]').val(data.type_siap);
                $('#form-field').find('input[name="type_porto"]').val(data.type_porto);
                $('#form-field').find('input[name="sort"]').val(data.sort);
                $('#form-field').find('input[name="show_siap"]').val(data.show_siap);
                $('#form-field').find('input[name="show_porto"]').val(data.show_porto);
                // $('#form-field').find("select[name='id_parent']").html(data.sl_parent);
                var test = $('#form-field').find('select[name="id_parent"]').html(data.sl_parent);
                if ( test == 0) {
                    $('#form-field').find('select[name="id_parent"]').html(data.id_parent);

                }else{
                    $('#form-field').find('select[name="id_parent"]').html(data.sl_parent);
                   
                }
         
            }
        })
        
        $('#form-field').children('.modal').find('.modal-title').text("Ubah Menu");
        $('#form-field').children('.modal').modal('show');
            
        }
    }

    function reset_default() {
        $('#form-field')[0].reset();
        mode  = undefined;
        // table1.ajax.reload(null,false);
        $('#form-field').children('.modal').modal('hide');
        location.reload();
    }

     $(document).on('click', ".action", function() {
        var self        = this;

        var action  = $(this).attr('data-action');

       if (action == "add") {
          mode  = "add";
          show_modal();

        } else if (action == "edit") {
          mode  = "edit";
          var data  = $(this).attr('data-id');
          show_modal(data);

        } else if (action == "simpan") {
        
          var dataForm    = $('#form-field').serialize();

          $.ajax({
            url : "<?php echo base_url('usermanagement/hakAksesAction')?>/"+mode,
            dataType: "json",
            data: dataForm,
            type: "POST",
            success: function(data) {
                swal({
                    title: "Berhasil!",
                    text: 'Data telah di simpan',
                    icon: "success",
                    button: "OK",
                });
                reset_default();
            }
          })
        }
    })


</script>
