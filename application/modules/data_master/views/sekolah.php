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
              <button type="button" class="btn btn-primary btn-sm action" data-action="add"  data-toggle="tooltip" title="Tambah" data-original-title="Tambah">
                <i class="glyphicon glyphicon-plus"></i></button>
                &nbsp;
                <!-- <button type="button" class="btn btn-warning btn-sm" onClick="reload_table_SS();" data-toggle="tooltip" title="Reload" data-original-title="Reload">
                <i class="fa fa-circle-o"></i></button> -->
            </div>
          </div>
          
          <div class="box-body">
            <div style="">
                <table  class="table table-bordered table-striped mytable" style="background-color: #00c0ef30;" id="mytable">
                    <thead>
                        <tr class="bgColorCustom">
                            <th>No</th>
                            <th>Nama Sekolah</th>
                            <th>Aktif</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
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
  <div class="modal fade" tabindex="-1" role="dialog" >
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header btn-success">
                <button type="button" class="close" data-dismiss="modal" >×</button>
                <h4 class="modal-title">User</h4>
            </div>
            <div class="modal-body">
                <input name="id_sekolah" type="hidden">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="nm_sekolah" class="control-label">Nama Sekolah</label>
                            <input name="nm_sekolah" type="text" class="form-control field" id="nm_sekolah">
                        </div>
                    </div>
                </div>  
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="provinsi_id" class="control-label">Provinsi</label>
                            <?php
                                $style_provinsi='class="form-control field" id="provinsi_id" onChange="tampilKabupaten(this)" required';
                                echo form_dropdown('provinsi_id',$provinsi,'',$style_provinsi);
                            ?>
                        </div>
                    </div>
                </div>  
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="kabupaten_id" class="control-label">Kabupaten</label>
                            <?php
                                $style_kabupaten='class="form-control field" id="kabupaten_id" onChange="tampilKecamatan(this)" required';
                                echo form_dropdown("kabupaten_id",array('Pilih Kabupaten'=>'- Pilih Kabupaten -'),'',$style_kabupaten);
                            ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="kecamatan_id" class="control-label">Kecamatan</label>
                            <?php
                                $style_kabupaten='class="form-control field" id="kecamatan_id" onChange="tampilKelurahan(this)" required';
                                echo form_dropdown("kecamatan_id",array('Pilih Kecamatan'=>'- Pilih Kecamatan -'),'',$style_kabupaten);
                            ?>
                        </div>  
                    </div>
                </div>        
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="kelurahan_id" class="control-label">Kelurahan</label>
                            <?php
                                $style_kelurahan='class="form-control field" id="kelurahan_id" required';
                                echo form_dropdown("kelurahan_id",array('Pilih Kelurahan'=>'- Pilih Kelurahan -'),'',$style_kelurahan);
                            ?>
                        </div>
                    </div>
                </div> 
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="alamat" class="control-label">Alamat</label>
                            <input name="alamat" type="text" class="form-control field" id="alamat">
                        </div>
                    </div>
                </div>      
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="no_kontak" class="control-label">No Kontak</label>
                            <input name="no_kontak" type="text" class="form-control field" id="no_kontak">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="email" class="control-label">email</label>
                            <input name="email" type="email" class="form-control field" id="email">
                        </div>
                    </div>
                </div>     
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Tutup</button>
                <button type="button" data-action="simpan" class="action btn btn-info waves-effect waves-light" id="simpan">Simpan</button>
            </div>
        </div>
    </div>
  </div>
</form>

<script src="<?php echo base_url()?>berkas/plugins/label-beauty/jquery-labelauty.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript">
   // Datatables
   $(function() {
      $.extend( true, $.fn.dataTable.defaults, {
          autoWidth: false,
          dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
          language: {
              search: '<span>Filter:</span> _INPUT_',
              lengthMenu: '<span>Show:</span> _MENU_',
              paginate: { 'first': 'First', 'last': 'Last', 'next': '&rarr;', 'previous': '&larr;' }
          },
          drawCallback: function () {
              $(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').addClass('dropup');
          },
          preDrawCallback: function() {
              $(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').removeClass('dropup');
          }
      } );
  } );

  $.fn.dataTable.pipeline = function ( opts ) {
  var conf = $.extend( {
      pages: 5,     
      url: '',      
      data: null,
      method: 'GET' 
  }, opts );

  var cacheLower = -1;
  var cacheUpper = null;
  var cacheLastRequest = null;
  var cacheLastJson = null;

  return function ( request, drawCallback, settings ) {
      var ajax          = false;
      var requestStart  = request.start;
      var drawStart     = request.start;
      var requestLength = request.length;
      var requestEnd    = requestStart + requestLength;
       
      if ( settings.clearCache ) {
          ajax = true;
          settings.clearCache = false;
      }
      else if ( cacheLower < 0 || requestStart < cacheLower || requestEnd > cacheUpper ) {
          ajax = true;
      }
      else if ( JSON.stringify( request.order )   !== JSON.stringify( cacheLastRequest.order ) ||
                JSON.stringify( request.columns ) !== JSON.stringify( cacheLastRequest.columns ) ||
                JSON.stringify( request.search )  !== JSON.stringify( cacheLastRequest.search )
      ) {
          ajax = true;
      }
       
      cacheLastRequest = $.extend( true, {}, request );

      if ( ajax ) {
          if ( requestStart < cacheLower ) {
              requestStart = requestStart - (requestLength*(conf.pages-1));

              if ( requestStart < 0 ) {
                  requestStart = 0;
              }
          }
           
          cacheLower = requestStart;
          cacheUpper = requestStart + (requestLength * conf.pages);

          request.start = requestStart;
          request.length = requestLength*conf.pages;

          if ( $.isFunction ( conf.data ) ) {
              var d = conf.data( request );
              if ( d ) {
                  $.extend( request, d );
              }
          }
          else if ( $.isPlainObject( conf.data ) ) {
              $.extend( request, conf.data );
          }

          settings.jqXHR = $.ajax( {
              "type":     conf.method,
              "url":      conf.url,
              "data":     request,
              "dataType": "json",
              "cache":    false,
              "success":  function ( json ) {
                  cacheLastJson = $.extend(true, {}, json);

                  if ( cacheLower != drawStart ) {
                      json.data.splice( 0, drawStart-cacheLower );
                  }
                  if ( requestLength >= -1 ) {
                      json.data.splice( requestLength, json.data.length );
                  }
                   
                  drawCallback( json );
              }
          } );
      }
        else {
              json = $.extend( true, {}, cacheLastJson );
              json.draw = request.draw; 
              json.data.splice( 0, requestStart-cacheLower );
              json.data.splice( requestLength, json.data.length );
   
              drawCallback(json);
            }
        }
  };

  $.fn.dataTable.Api.register( 'clearPipeline()', function () {
      return this.iterator( 'table', function ( settings ) {
          settings.clearCache = true;
      } );
  } );

  // My Datatables
  var   urlDb   = "<?php echo base_url('data_master/showSekolah')?>";
  var   totalClmn;
  var   table1;
  $(document).ready(function() {
        $('.field').keypress(function(e){
            var nextArrIdx  =   $('.field').index(this) + 1;
            if(e.which == 13){
                if($('.field').index(this) + 1 > ($('.field').length - 1)){
                    $('#simpan').click();
                }else{
                    $('.field').eq(nextArrIdx).focus();
                }
            }
        });

      totalClmn = parseInt($("#mytable").find('tr:nth-child(1) th').length);
      table1  = $('#mytable').DataTable({ 
        
        "PaginationType": "bootstrap",
        responsive: true,
        //   dom: '<"tbl-top clearfix"lfr>,t,<"tbl-footer clearfix"<"tbl-info pull-left"i><"tbl-pagin pull-right"p>>',
        "sDom": '<"row view-filter"<"col-sm-12"<"pull-left"l><"pull-right"f><"clearfix">>>t<"row view-pager"<"col-sm-12"<"text-center"ip>>>',
        dom: '<"tbl-top clearfix"<"pull-left"l><"pull-right"f><"text-center"r>>,t,<"tbl-footer clearfix"<"tbl-info pull-left"i><"tbl-pagin pull-right"p>>',
        "processing": true, 
        "serverSide": true, 
        "deferRender": true,
        "order": [], 

        "ajax": {
            "url": urlDb,
            "type": "POST"
        },
        "columnDefs": [ 
            { 
                "targets": [ 0 ], 
                "orderable": false 
            }, { 
                "targets": [ totalClmn-1 ], 
                "orderable": false 
            }, { 
                "targets": [ totalClmn-2 ], 
                "orderable": false 
            }
        ],
        "fnDrawCallback": function(oSettings){
            $('.activeBtn').labelauty({ 
                label: false,
                });
        }
         
      });
  });

     var mode;
    function show_modal(data) {

        if (mode == "add") {
            $('#form-field')[0].reset();
            $('#satkers').hide();
            $('#form-field').children('.modal').find('.modal-title').text("Tambah Sekolah");
            $('#form-field').children('.modal').modal('show'); 
        } 
        else if (mode == "edit") {
            $.ajax({
                url : "<?php echo base_url('data_master/sekolahAction')?>/"+"detail",
                dataType: "json",
                data: "id_sekolah="+data,
                type: "POST",
                success: function(data) {
                    $('#form-field').find("input[name='id_sekolah']").val(data.id_sekolah);
                    $('#form-field').find("input[name='nm_sekolah']").val(data.nm_sekolah);
                    $('#form-field').find("input[name='alamat']").val(data.alamat);
                    $('#form-field').find("input[name='email']").val(data.email);
                    $('#form-field').find("input[name='no_kontak']").val(data.no_kontak);
                    $('#form-field').find("select[name='provinsi_id']").html(data.sl_prov);
                    $('#form-field').find("select[name='kabupaten_id']").html(data.sl_kab);
                    $('#form-field').find("select[name='kecamatan_id']").html(data.sl_kec);
                    $('#form-field').find("select[name='kelurahan_id']").html(data.sl_kel);

                }
            })
            
            $('#form-field').children('.modal').find('.modal-title').text("Ubah Sekolah");
            $('#form-field').children('.modal').modal('show');
            
        }
    }



    function reset_default() {
        $('#form-field')[0].reset();
        mode  = undefined;
        table1.ajax.reload(null,false);
        $('#form-field').children('.modal').modal('hide');
    }

    $(document).on('click', ".action", function() {
        var action  = $(this).attr('data-action');
        
        if (action == "aktif") {
            var check   = $(this).prop("checked");
            if (check) {
                var status  = "1";
            } else {
                var status  = "0";
            }
            var user  = $(this).attr('data-id_sekolah');
            var nama      = $(this).closest("tr").find("td:eq(2)").text();

            $.ajax({
                url : "<?php echo base_url('data_master/sekolahAction')?>/"+action,
                dataType: "json",
                data: 'id_sekolah='+user+'&status='+status,
                type: "POST",
              success: function(data) {
                    if (data.status == 1) {
                        var text    = 'aktifkan';
                    } else if (data.status == 0) {
                        var text    = 'nonaktifkan';
                    }
                    swal({
                        title: "Berhasil!",
                        text: nama+' telah di'+text,
                        icon: "success",
                        button: "OK",
                    });
                }
            })
        }else if (action == "add") {
          mode  = "add";
          show_modal();
        }else if (action == "edit") {
          mode  = "edit";
          var data  = $(this).attr('data-id');
         
          show_modal(data);
        }else if (action == "simpan") {
          var nama        = $(this).closest("tr").find("td:eq(2)").text();
          
          var dataForm    = $('#form-field').serialize();

          $.ajax({
            url : "<?php echo base_url('data_master/sekolahAction')?>/"+mode,
            dataType: "json",
            data: dataForm,
            type: "POST",
            success: function(data) {
                swal({
                    title: "Berhasil!",
                    text: nama+' telah disimpan',
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
