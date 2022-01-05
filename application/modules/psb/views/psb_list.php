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
                <?php echo $submenu;?>
              </h4>
            </div>
            <!--
            <div class="pull-right">
              <button type="button" class="btn btn-primary btn-sm action" data-action="add"  data-toggle="tooltip" title="Tambah" data-original-title="Tambah">
                <i class="glyphicon glyphicon-plus"></i></button>
            </div>
            -->
          </div>
          
          <div class="box-body">
            <div style="">
                <table class="table table-bordered table-striped mytable" style="background-color: #00c0ef30;"  id="mytable">
                    <thead>
                        <tr class="bgColorCustom">
                            <th>No</th>
                            <th>No Formulir</th>
                            <th>Nama Siswa</th>
                            <th>Jenjang</th>
                            <th>Jurusan</th>
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
                <h4 class="modal-title">Kelas</h4>
            </div>
            <div class="modal-body">
                <form action="#" class="formModal form-horizontal">
                
                    <div class="form-group">
                        <label class="control-label col-md-3" style="text-align:left;">Nomor Formulir</label>
                        <div class="col-md-9">
                            <input name="no_formulir" class="form-control form-control-inline input-medium" size="16" type="text" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3" style="text-align:left;">Nama Siswa</label>
                        <div class="col-md-9">
                            <input name="nm_siswa" class="form-control form-control-inline input-medium" size="16" type="text" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3" style="text-align:left;">Asal Sekolah</label>
                        <div class="col-md-9">
                            <input name="asal_sekolah" class="form-control form-control-inline input-medium" size="16" type="text" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3" style="text-align:left;">Nama Orang Tua</label>
                        <div class="col-md-9">
                            <input name="nm_ortu" class="form-control form-control-inline input-medium" size="16" type="text" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3" style="text-align:left;">Nomor Telpon</label>
                        <div class="col-md-9">
                            <input name="no_tlp" class="form-control form-control-inline input-medium" size="16" type="text" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3" style="text-align:left;">Jenjang</label>
                        <div class="col-md-9">
                            <select class="form-control myselect2" name="id_tingkat" style="width: 100%;" >
                                <?php echo $tingkat?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3" style="text-align:left;">Jurusan</label>
                        <div class="col-md-9">
                            <select class="form-control myselect2" name="id_jurusan" style="width: 100%;" >
                                <?php echo $jurusan?>
                            </select>
                        </div>
                    </div>

                </form>
            </div>
            
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal"  style="margin-top:20px;">Tutup</button>
            </div>
        </div>
    </div>
  </div>
</form>

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
  var   urlDb   = "<?php echo base_url('psb/showListPsb')?>";
  var   totalClmn;
  var   table1;
  $(document).ready(function() {
      totalClmn = parseInt($("#mytable").find('tr:nth-child(1) th').length);
      table1  = $('#mytable').DataTable({ 
          
        "PaginationType": "bootstrap",
        responsive: true,
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
         
      });
  });

     var mode;
    function show_modal(data) {

        if (mode == "add") {
            $('#form-field')[0].reset();
            $('#form-field').children('.modal').find('.modal-title').text("Tambah Mapel Tingkat");
            $('#form-field').find("select[name='id_mapel[]']").select2({
                multiple:true,
            });
            $('#form-field').find(".select2-search__field").attr('style', 'width:100%');
            $('#form-field').find('.select2-container--default .select2-selection--multiple .select2-selection__rendered').css("height","200px");
            $('#form-field').find(".select2-dropdown .select2-search__field:focus, .select2-search--inline .select2-search__field").attr('style', 'border: 0px solid #3c8dbc');
            $('#form-field').children('.modal').modal('show'); 
        } 
        else if (mode == "edit") {
            $('#form-field').find("select[name='id_mapel[]']").select2({
                multiple:false
            });
            $.ajax({
                url : "<?php echo base_url('psb/psbListAction')?>/"+"detail",
                dataType: "json",
                data: "id_mapel_tingkat="+data,
                type: "POST",
                success: function(data) {
                   // $('#form-field').find("input[name='id_mapel_tingkat']").val(data.id_mapel_tingkat);
                    $('#form-field').find("input[name='no_formulir']").val(data.no_formulir);
                    $('#form-field').find("input[name='nm_siswa']").val(data.nama);
                    $('#form-field').find("input[name='asal_sekolah']").val(data.asal_sekolah);
                    $('#form-field').find("input[name='nm_ortu']").val(data.nama_ortu);
                    $('#form-field').find("input[name='no_tlp']").val(data.no_telpon);
                    $('#form-field').find("select[name='id_jurusan']").html(data.jurusan);
                    $('#form-field').find("select[name='id_tingkat']").html(data.jenjang);

                }
            })
            
            $('#form-field').children('.modal').find('.modal-title').text("Data Siswa PSB");
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
            var id  = $(this).attr('data-id_mapel_tingkat');
            var nama  = $(this).closest("tr").find("td:eq(2)").text();

            $.ajax({
                url : "<?php echo base_url('kbm/mapelTingkatAction')?>/"+action,
                dataType: "json",
                data: 'id_mapel_tingkat='+id+'&status='+status,
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
        }else if (action == "detail") {
          mode  = "detail";
          var data  = $(this).attr('data-id');
         
          show_modal(data);
        }else if (action == "simpan") {
          var nama        = $(this).closest("tr").find("td:eq(2)").text();
          
          var dataForm    = $('#form-field').serialize();

          $.ajax({
            url : "<?php echo base_url('kbm/mapelTingkatAction')?>/"+mode,
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
                    url : "<?php echo base_url('kbm/deleteAction');?>/"+paramDelete+"/"+paramCol+"/"+paramId,
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

 $(document).on('click', ".print", function() {
    var data  = $(this).attr('data-id');
    
    window.open('<?php echo base_url()?>transaksi/formulir_prt/'+data, '_blank', 'toolbar=no,titlebar=no,menubar=no,scrollbars=yes,resizable=yes,top=50,left=100,width=600,height=500');
 });
 
</script>
