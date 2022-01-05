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
                Filtering
              </h4>
            </div>
            <div class="pull-right">

            </div>
          </div>
          
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="id_kelas" class="control-label">Kelas</label>
                            <select class="form-control myselect" name="id_kelas" style="width: 100%;" id="id_kelas" required>
                                <?php echo $kelas?>
                            </select>
                        </div>
                    </div>
                </div>  
            </div>
            <div class="box-footer text-center" style="padding-left:32%;">
               <button type="submit" class="btn btn-block bg-maroon" id="filter" style="width:50%;"><i class="fa fa-filter"></i>&nbsp;&nbsp; Filter</button>
            </div>
            
        </div>
      </div>
    </div>
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

            </div>
          </div>
          
          <div class="box-body">
            <div style="">
                <table class="table table-bordered mytable" id="mytable">
                    <thead>
                        <tr class="bgColorCustom">
                            <th>No</th>
                            <th>Hari</th>
                            <th>Kelas</th>
                            <th>Jam Mulai</th>
                            <th>Jam Selesai</th>
                            <th>Mapel</th>
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
    <div class="modal-dialog modal-lg" style="width:90%;">
        <div class="modal-content">
            <div class="modal-header btn-success">
                <button type="button" class="close" data-dismiss="modal" >×</button>
                <h4 class="modal-title">Kelas</h4>
            </div>
            <div class="modal-body">
                <input name="id_jadwal" type="hidden">
                <div class="row">
                    <div class="col-lg-10 col-lg-offset-1 col-sm-12">
                        <div class="form-group">
                            <label for="id_kelas" class="control-label">Kelas</label>
                            <select class="form-control myselect2" name="id_kelas" style="width: 100%;" >
                                <?php echo $kelas?>
                            </select>
                        </div>
                    </div>
                </div>  
                <div class="row single">
                    <div class="col-lg-5 col-lg-offset-1 col-sm-6">
                        <div class="form-group">
                            <label for="hari" class="control-label">Hari</label>
                            <input name="hari" type="text" class="form-control" id="hari">
                        </div>
                    </div>
                    <div class="col-lg-5 col-sm-6">
                        <div class="form-group">
                            <label for="mapel" class="control-label">Matapelajaran</label>
                            <select class="form-control myselect2" name="mapel" style="width: 100%;" >
                                <?php echo $mapel?>
                            </select>
                        </div>
                    </div>
                </div>  
                <div class="row single">
                    <div class="col-lg-5 col-lg-offset-1 col-sm-6">
                        <div class="form-group">
                            <label for="mulai" class="control-label">mulai</label>
                            <input name="mulai" type="text" class="form-control time" id="mulai" placeholder="Jam Mulai">
                        </div>
                    </div>
                    <div class="col-lg-5 col-sm-6">
                        <div class="form-group">
                            <label for="selesai" class="control-label">selesai</label>
                            <input name="selesai" type="text" class="form-control time" id="mulai" placeholder="Jam Selesai">
                        </div>
                    </div>
                </div>  
                
                <div class="row double">
                    <div class="col-lg-10 col-lg-offset-1 col-sm-12">
                        <button type="button" id="tampilForm" class="btn btn-warning waves-effect waves-light" >Tampilkan</button>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group">
                        <div id="showForm"></div>
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
    var   urlDb   = "<?php echo base_url('kbm/showJadwal')?>";
    var   totalClmn;
    var   table1;
    var hari   =   null;
    var kelas        =   null;
    $('#filter').click(function(){
        kelas = $('#id_kelas').find(':selected').val();

        console.log(kelas);
        console.log(hari);
        table1.ajax.reload(null, false); 
    });

  $(document).ready(function() {
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
            "type": "POST",
            "data":function(param){
                param.id_kelas    = kelas;
            }
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

$('#tampilForm').click(function(){
 
    var id_kelas  =   $('#form-field').find("select[name='id_kelas'] option:selected").val();

    var url = '<?php echo base_url('kbm/data_kelas')?>';
    // console.log(url);
    $.ajax({
        url : "<?php echo base_url('kbm/showFormJadwal')?>",
        dataType: "json",
        data: 
            {
                id_kelas:id_kelas,
            },
        type: "POST",
        success: function(data) {
           $('#showForm').html(data);
        }
    });
});

     var mode;
    function show_modal(data) {

        if (mode == "add") {
            $('#form-field')[0].reset();
            $('.single').hide();
            $('#form-field').children('.modal').find('.modal-title').text("Tambah Mapel Tingkat");
          
            $('#form-field').children('.modal').modal('show'); 
        } 
        else if (mode == "edit") {
            $('.single').show();
            $('.double').hide();
            $.ajax({
                url : "<?php echo base_url('kbm/jadwalAction')?>/"+"detail",
                dataType: "json",
                data: "id_jadwal="+data,
                type: "POST",
                success: function(data) {
                    $('#form-field').find("input[name='id_jadwal']").val(data.id_jadwal);
                    $('#form-field').find("input[name='mulai']").val(data.jam_mulai);
                    $('#form-field').find("input[name='selesai']").val(data.jam_selesai);
                    $('#form-field').find("input[name='hari']").val(data.hari);
                    $('#form-field').find("select[name='mapel']").html(data.mapel);
                    $('#form-field').find("select[name='id_kelas']").html(data.kelas);

                }
            })
            
            $('#form-field').children('.modal').find('.modal-title').text("Ubah Mapel Tingkat");
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
            var id  = $(this).attr('data-id_jadwal');
            var nama  = $(this).closest("tr").find("td:eq(2)").text();

            $.ajax({
                url : "<?php echo base_url('kbm/jadwalAction')?>/"+action,
                dataType: "json",
                data: 'id_jadwal='+id+'&status='+status,
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
            url : "<?php echo base_url('kbm/jadwalAction')?>/"+mode,
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

</script>
