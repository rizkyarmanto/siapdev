<style>
    .dataTables_filter {
   width: 100%;
   float: right;
   text-align: right;
}

td.dataTables_empty{
    text-align: center;
}
</style>
<section class="content">
    <div class="row">
        <div class="col-lg-10 col-lg-offset-1 col-sm-12">
            <div class="box box-success">
                <div class="box-header with-border">
                    <div class="pull-left">
                        <h4>
                            Data Catatan <?php echo $nm_siswa?>
                        </h4>
                    </div>
                    <div class="pull-right">
                    <button type="button" class="btn btn-primary btn-sm action" data-toggle="tooltip" data-action="add" title="Tambah" data-original-title="Tambah">
                        <i class="glyphicon glyphicon-plus"></i></button>
                      
                    </div>
                </div>
                <form action="">
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table" id="myTable">
                                    <thead>
                                        <tr class="bgColorCustom">
                                            <th>No</th>
                                            <th>Nama Siswa</th>
                                            <th>Tanggal</th>
                                            <th>Kategori</th>
                                            <th>Catatan</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no=1; foreach($dataCatatan as $dc){?>
                                            <tr>
                                                <td><?php echo $no++?></td>
                                                <td><?php echo $dc['nama']?></td>
                                                <td><?php echo $dc['tanggal']?></td>
                                                <td><?php echo $dc['kategori']?></td>
                                                <td><?php echo $dc['catatan']?></td>
                                                <td>
                                                &nbsp;<button 
                                                            type="button" data-id="<?php echo $dc['id_catatan_siswa'];?>" data-action="edit" 
                                                            class="action btn btn-xs btn-icon waves-effect btn-info m-b-5 tooltip-hover tooltipstered"
                                                            title="Ubah"> <i class="fa fa-pencil"></i> 
                                                    </button>
                                                    &nbsp;<button 
                                                            type="button" data-id="<?php echo $dc['id_catatan_siswa'];?>" data-master="m_catatan_siswa" data-col="id_catatan_siswa" data-action="delete" 
                                                            class="action btn btn-xs btn-icon waves-effect btn-danger m-b-5 tooltip-hover tooltipstered"
                                                            title="delete"> <i class="fa fa-remove"></i> 
                                                    </button>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6 col-md-offset-3">
                                <div class="form-group">
                                    <!-- <button type="button" id="" class="btn bg-orange btn-block btn-md">Submit</button> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<form id="form-field">
  <div class="modal fade" tabindex="-1" role="dialog" >
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header btn-success">
                <button type="button" class="close" data-dismiss="modal" >×</button>
                <h4 class="modal-title">Catatan Siswa</h4>
            </div>
            <div class="modal-body">
                <input name="id_siswa" value="<?php echo $id_siswa?>" type="hidden">
                <input name="id_catatan_siswa" type="hidden">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="tanggal" class="control-label">Tanggal</label>
                            <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" class="form-control pull-right myDate" name="tanggal">
                            </div>
                        </div>
                    </div>
                </div>  
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="catatan" class="control-label">Catatan</label>
                            <input name="catatan" type="text" class="form-control" id="catatan">
                        </div>
                    </div>
                </div>  
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="id_kat_catatan" class="control-label">Keterangan</label>
                            <select class="form-control myselect" style="width: 100%;" name="id_kat_catatan" id="id_kat_catatan">
                                <?php echo $listKat;?>
                            </select>
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


<script>

$(document).ready( function () {
    $('#myTable').DataTable({
        "sDom": '<"row view-filter"<"col-sm-12"<"pull-left"l><"pull-right"f><"clearfix">>>t<"row view-pager"<"col-sm-12"<"text-center"ip>>>'
    });
});
     var mode;
    function show_modal(data) {

        if (mode == "add") {
            $('#form-field')[0].reset();
            $('#form-field').children('.modal').find('.modal-title').text("Tambah Catatan Siswa");
            $('#form-field').children('.modal').modal('show'); 
        } 
        else if (mode == "edit") {
            $.ajax({
                url : "<?php echo base_url('pengolahan_siswa/catatanSiswaAction')?>/"+"detail",
                dataType: "json",
                data: "id_catatan_siswa="+data,
                type: "POST",
                success: function(data) {
                    $('#form-field').find("input[name='id_catatan_siswa']").val(data.id_catatan_siswa);
                    $('#form-field').find("input[name='catatan']").val(data.catatan);
                    $('#form-field').find("input[name='tanggal']").val(data.tanggal);
                    $('#form-field').find("select[name='id_kat_catatan']").html(data.kategori);

                }
            })
            
            $('#form-field').children('.modal').find('.modal-title').text("Ubah Catatan Siswa");
            $('#form-field').children('.modal').modal('show');
            
        }
    }

    $( ".myDate" ).datepicker({
      autoclose : true
    });

    function reset_default() {
        $('#form-field')[0].reset();
        mode  = undefined;
        // table1.ajax.reload(null,false);
        $('#show').click();
        $('#form-field').children('.modal').modal('hide');
    }

    $(document).on('click', ".action", function() {
        var action  = $(this).attr('data-action');
        
        if (action == "add") {
          mode  = "add";
          show_modal();
        }else if (action == "edit") {
          mode  = "edit";
          var data  = $(this).attr('data-id');
         
          show_modal(data);
        }else if (action == "simpan") {
        
          var dataForm    = $('#form-field').serialize();

          $.ajax({
            url : "<?php echo base_url('pengolahan_siswa/catatanSiswaAction')?>/"+mode,
            dataType: "json",
            data: dataForm,
            type: "POST",
            success: function(data) {
                swal({
                    title: "Berhasil!",
                    text: 'Catatan telah disimpan',
                    icon: "success",
                    button: "OK",
                  });
                reset_default();
            }
          });
        }else if(action == "delete"){
            var paramTable   = $(this).attr('data-master');
            var paramCol   = $(this).attr('data-col');
            var paramId   = $(this).attr('data-id');
            console.log(paramTable);
            console.log(paramCol);
            console.log(paramId);
            deleteAction(paramTable, paramCol, paramId);
           
        }
     
    });

function deleteAction(paramDelete, paramCol, paramId){
    swal({
            title: "Yakin Akan dihapus ?",
            text: "Data Akan Terhapus",
            icon: "warning",
            buttons: true,
            buttons: ["Tidak", "Ya"],
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    url : "<?php echo base_url('data_master/deleteAction');?>/"+paramDelete+"/"+paramCol+"/"+paramId,
                    type: "POST",
                    data: "id="+paramId,
                    dataType: "JSON",
                    success: function(data) {
                            swal("Data Berhasil dihapus", {
                                icon: "success",
                            });
                            table1.ajax.reload(null,false);
                        },
                    error: function(jqXHR, textStatus, errorThrown) {
                        swal({
                            title: "Terjadi Kesalahan",
                            text: "",
                            icon: "error",
                        });
                    }
                }); 
            } else {
                swal("Data Batal dihapus");
            }
        });
}
</script>