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
              <button type="button" class="btn btn-primary btn-sm" onClick="add();" data-toggle="tooltip" title="Tambah" data-original-title="Tambah">
                <i class="glyphicon glyphicon-plus"></i></button>
                &nbsp;
                <button type="button" class="btn btn-warning btn-sm" onClick="reload_table_SS();" data-toggle="tooltip" title="Reload" data-original-title="Reload">
                <i class="fa fa-circle-o"></i></button>
            </div>
          </div>
          
          <div class="box-body">
            <div style="">
              <table class="table table-bordered table-striped mytable" style="background-color: #00c0ef30;"  id="datatables-ss">
                <thead>
                  <tr class="bgColorCustom">
                    <th>No</th>
                    <th>Jenjang</th>
                    <th>Aktif</th>
                    <th class="text-center">Actions</th>
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


<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header btn-success">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Jenjang Pendidikan</h4>
      </div>
      <div class="modal-body">
        <form action="#" class="formModal form-horizontal">
            <input type="hidden" name="id_jenjang">
            <div class="form-group">
                <label class="control-label col-md-3" style="text-align:left;">Jenjang</label>
                <div class="col-md-9">
                    <input name="jenjang" onkeypress="return enterScript(event)" class="form-control form-control-inline input-medium" size="16" type="text" value="">
                </div>
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
        <button type="button" onClick="saving(this)" class="btn btn-success">Save</button>
      </div>
    </div>
  </div>
</div>

<script src="<?php echo base_url()?>berkas/plugins/label-beauty/jquery-labelauty.js"></script>
<script type="text/javascript">
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
    // Configuration options
    var conf = $.extend( {
        pages: 5,     // number of pages to cache
        url: '',      // script url
        data: null,   // function or object with parameters to send to the server
                      // matching how `ajax.data` works in DataTables
        method: 'GET' // Ajax HTTP method
    }, opts );
 
    // Private variables for storing the cache
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
            // API requested that the cache be cleared
            ajax = true;
            settings.clearCache = false;
        }
        else if ( cacheLower < 0 || requestStart < cacheLower || requestEnd > cacheUpper ) {
            // outside cached data - need to make a request
            ajax = true;
        }
        else if ( JSON.stringify( request.order )   !== JSON.stringify( cacheLastRequest.order ) ||
                  JSON.stringify( request.columns ) !== JSON.stringify( cacheLastRequest.columns ) ||
                  JSON.stringify( request.search )  !== JSON.stringify( cacheLastRequest.search )
        ) {
            // properties changed (ordering, columns, searching)
            ajax = true;
        }
         
        // Store the request for checking next time around
        cacheLastRequest = $.extend( true, {}, request );
 
        if ( ajax ) {
            // Need data from the server
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
 
            // Provide the same `data` options as DataTables.
            if ( $.isFunction ( conf.data ) ) {
                // As a function it is executed with the data object as an arg
                // for manipulation. If an object is returned, it is used as the
                // data object to submit
                var d = conf.data( request );
                if ( d ) {
                    $.extend( request, d );
                }
            }
            else if ( $.isPlainObject( conf.data ) ) {
                // As an object, the data given extends the default
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
                json.draw = request.draw; // Update the echo for each response
                json.data.splice( 0, requestStart-cacheLower );
                json.data.splice( requestLength, json.data.length );
     
                drawCallback(json);
              }
          }
    };
 
    // Register an API method that will empty the pipelined data, forcing an Ajax
    // fetch on the next draw (i.e. `table.clearPipeline().draw()`)
    $.fn.dataTable.Api.register( 'clearPipeline()', function () {
        return this.iterator( 'table', function ( settings ) {
            settings.clearCache = true;
        } );
    } );

    // Server side processing
    var   paramCtrl   = $("#paramCtrl").val();
    var   paramName   = '<?php if (!empty($submenu)) {echo $submenu;}?>';

    var   table_SS;
    $(document).ready(function() {
        $('input[name=nominal], input[name=tahun_mulai], input[name=tahun_selesai], input[name=gelombang] ').keyup(function () { 
           this.value = this.value.replace(/[^0-9\+]/g,'');
        });    

        $('.select2').select2();
        //datatables
        var last_column   = $("#datatables-ss").find("tr:first td").length - 1;
        table_SS = $('#datatables-ss').DataTable({ 
            // Styling
            // "PaginationType": "bootstrap",
            // responsive: true,
            // "dom": '<"top"fl>rt<"bottom"ip><"clear">',

            "PaginationType": "bootstrap",
            "sDom": '<"row view-filter"<"col-sm-12"<"pull-left"l><"pull-right"f><"clearfix">>>t<"row view-pager"<"col-sm-12"<"text-center"ip>>>',
            responsive: true,
            dom: '<"tbl-top clearfix"<"pull-left"l><"pull-right"f><"text-center"r>>,t,<"tbl-footer clearfix"<"tbl-info pull-left"i><"tbl-pagin pull-right"p>>',
            // Process
            "processing": true, //Feature control the processing indicator.
            "serverSide": true, //Feature control DataTables' server-side processing mode.
            "deferRender": true,
            "order": [], //Initial no order.

            // Load data for the table's content from an Ajax source
            "ajax": {
                "url": "<?php echo base_url('data_master/show_"+paramCtrl+"')?>",
                "type": "POST"
            },

            //Set column definition initialisation properties.
            "columnDefs": [
            { 
                "targets": 0, //first column / numbering column
                "orderable": false //set not orderable
            },
            { 
                "targets": [ last_column ], //first column / numbering column
                "orderable": false, //set not orderable
                "className" : "text-center"
            }
            ],
            "fnDrawCallback": function(oSettings){
                $('.activeBtn').labelauty({ 
                    label: false,
                    });
            }
        });

    });

    var table_MD;
    var save_methodNilai;
    var G_paramCtrlN;
    var G_id;
    var filterColumn;    
    var filterColumn2;    
    var filterId;
    var filterId2;
    var paramColumn;
    var paramId;

    function dataTables_MD(paramCtrlN, id) {
        G_paramCtrlN    = paramCtrlN;
        G_id            = id;

        if (paramId && !filterId) {
            var url     = "<?php echo base_url('data_master/show_"+paramCtrlN+"_nilai/"+id+"/"+paramColumn+"/"+paramId+"')?>";
        } else if (paramId && filterId && !filterId2) {
            var url     = "<?php echo base_url('data_master/show_"+paramCtrlN+"_nilai/"+id+"/"+paramColumn+"/"+paramId+"/"+filterColumn+"/"+filterId+"')?>";
        } else if (paramId && filterId2 && !filterId) {
            var url     = "<?php echo base_url('data_master/show_"+paramCtrlN+"_nilai/"+id+"/"+paramColumn+"/"+paramId+"/"+filterColumn2+"/"+filterId2+"')?>";
        } else if (paramId && filterId && filterId2) {
            var url     = "<?php echo base_url('data_master/show_"+paramCtrlN+"_nilai/"+id+"/"+paramColumn+"/"+paramId+"/"+filterColumn+"/"+filterId+"/"+filterColumn2+"/"+filterId2+"')?>";
        } else if (!paramId && filterId) {
            var url     = "<?php echo base_url('data_master/show_"+paramCtrlN+"_nilai/"+id+"/"+filterColumn+"/"+filterId+"')?>";
        } else {
            var url     = "<?php echo base_url('data_master/show_"+paramCtrlN+"_nilai/"+id+"')?>";
        }

        $('.addNilai').attr("disabled", false);
        try {
            set = table_MD.ajax.url(url).load(
                function() {
                    $('.saveNilai').removeClass('saveNilai').addClass('addNilai').html('<i style="margin-right:1%;" class="fa fa-plus"></i>Tambah');
                    // $('#datatables-ssMD').children('tbody').children('tr:last').hide();
                    // $('#datatables-ssMD').children('tbody').children('tr:last').find('td').slice(1, 5).css("padding", "0").css("height", "39");
                });
        } catch (err) {
            var last_column = $("#datatables-ssMD").find("tr:first td").length - 1;
            table_MD    = $("#datatables-ssMD").DataTable({ 
                "initComplete": function(settings) {
                    // $('#datatables-ssMD').children('tbody').children('tr:last').hide();
                    // $('#datatables-ssMD').children('tbody').children('tr:last').find('td').slice(1, 5).css("padding", "0").css("height", "39");
                },
                // Styling
                "PaginationType": "bootstrap",
                responsive: true,
                dom: '<"tbl-top clearfix"<"pull-left"l><"pull-right"f><"text-center"r>>,t,<"tbl-footer clearfix"<"tbl-info pull-left"i><"tbl-pagin pull-right"p>>',

                // Process
                // "destroy": true,
                "processing": true, //Feature control the processing indicator.
                "serverSide": true, //Feature control DataTables' server-side processing mode.
                "deferRender": true,
                "order": [], //Initial no order.

                // Load data for the table's content from an Ajax source
                "ajax": {
                    "url": url,
                    "type": "POST"
                },

                //Set column definition initialisation properties.
                "columnDefs": [
                { 
                    "targets": [ 0 ], //first column / numbering column
                    "orderable": false //set not orderable
                },
                { 
                    "targets": [ last_column-1 ], //first column / numbering column
                    "className" : "editAble"
                },
                { 
                    "targets": [ last_column ], //first column / numbering column
                    "orderable": false, //set not orderable
                    "className" : "text-center"
                }
                ],
                "fnDrawCallback": function(oSettings){
                    $('.activeBtn').labelauty({ 
                        label: false,
                        });
                }
            });
        } 
                
    };

    $("#myModalEdit").on("hidden.bs.modal", function() {
        $('.reset').attr("data-aktif", '0');
    });


    
    
    

    $(document).on("click", ".addNilai", function() {
        $(this).attr("disabled", true);
        try {
            $('.dataTables_empty').parent().remove();
        } catch (err) {
            return false;
        }

        save_methodNilai    = "addNilai";

        if (paramCtrl == "jenis_tarif" || paramCtrl == "jenis_keringanan" ) {
            var data    = "id="+G_id+"&"+paramColumn+"="+paramId;
        } else {
            var data    = "id="+G_id;
        }
        if ($('.input-addNilai').length == 0) {
            $.ajax({
                url : "<?php echo base_url('data_master/"+paramCtrl+"_action');?>/getFormNilai",
                type: "POST",
                dataType: "JSON",
                data: data,
                success: function(data) {
                    $('#datatables-ssMD').children('tbody').append(data);
                }
            });
            $('#datatables-ssMD').children('tbody').children('tr:last').children('td:eq(1)').focus();
        } else {
            $('#datatables-ssMD').children('tbody').children('tr:last').children('td:eq(1)').focus();
        }

        $('input[name=nominal]').keyup(function () { 
           this.value = this.value.replace(/[^0-9\+]/g,'');
        });   

        $('input[name=nominal]').click(function () { 
           this.value = this.value.replace(/[^0-9\+]/g,'');
        });   

    });

    $(document).on("click", ".deladdNilai", function() {
        dataTables_MD(G_paramCtrlN, G_id);
    });



    $(document).on("blur", 'td[contenteditable="true"]', function() {
        var value   = $(this).text();
        $(this).children('input').val(value);
    })

    $(document).on("click", ".saveNilai", function() {
        var data = $('#formNilai').serialize();
       $.ajax({
            url : "<?php echo base_url('data_master/"+paramCtrl+"_action');?>/"+save_methodNilai,
            type: "POST",
            data: data,
            dataType: "JSON",
            success: function(data) {
                dataTables_MD(G_paramCtrlN, G_id);
                $('.addNilai').attr("disabled", false);
                $('.editNilai').attr("disabled", false);
            }
       });
    })

    $(document).on("change", ".filterData", function() {
        filterColumn    = $(this).attr("data-column");
        filterId        = $(this).val();        
        filterColumn2   = $(this).parent().siblings('div').children('.filterData').attr("data-column");
        filterId2       = $(this).parent().siblings('div').children('.filterData').val();
        dataTables_MD(G_paramCtrlN, G_id);
    })

    var   save_method = "add"; //save_method as global variable for add and edit

    $(document).on("click", ".delNilai", function() { 
        save_method     = "delete";
        var id          = $(this).data("id");
        var paramText   = $(this).closest("tr").find("td:eq(5)").text(); // get current row 6th TD value
        dm_swal_delete(id, paramText, 'delNilai');
    });
    
    $(document).on("click", ".editNilai", function() {
        $(this).parent().parent().find('.editNilai').attr('disabled', true);
        save_methodNilai    = "editNilai"
        var nilai   = $(this).parent().siblings('td.editAble').text();
        var id      = $(this).attr("data-id");
        $(this).parent().siblings('td.editAble').replaceWith('<td style="padding:0px;height:39px;">' +
                                                                '<input type="hidden" name="id" value="'+id+'">' +
                                                                '<input style="height:100%;width:100%;" name="nominal" type="text" value="'+nilai+'"></td>');

        $(this).parent().html('<a class="saveNilai text-primary" href="javascript:;">' +
                                    '<i class="fa fa-save"></i>'+
                                '</a>&nbsp;&nbsp;'+
                                '<a class="deladdNilai text-danger" href="javascript:;">'+
                                    '<i class="fa fa-times-circle"></i>'+
                                '</a>');

        $('input[name=nominal]').click(function () { 
           this.value = this.value.replace(/[^0-9\+]/g,'');
           $(this).select();
        });   

        $('input[name=nominal]').keyup(function () { 
           this.value = this.value.replace(/[^0-9\+]/g,'');
        });   
    });

    function aktif(e) {
        // $('input[type="checkbox"]').attr('disabled',true); //set button disable 
        var aktif;
        var id_aktif    = $(e).parent().find('.paramId').val();
        if($(e)[0].checked)  {
            var aktif   = 1;
        } else {
            var aktif   = 0;
        }
        $.ajax({
            url : "<?php echo site_url('data_master/"+paramCtrl+"_action')?>/aktif",
            type: "POST",
            data: "id="+id_aktif+"&aktif="+aktif,
            dataType: "JSON",
            success: function(data) {
                data;
                // $('input[type="checkbox"]').attr('disabled',false); //set button disable 
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log('Error get data from ajax');
            }
        });
    };

    function add() {
        save_method = 'add';
        $('#myModal').find('.formModal')[0].reset(); // reset form on modals
        // $('.form-group').removeClass('has-error'); // clear error class
        // $('.help-block').empty(); // clear error string
        $('#myModal').modal('show'); // show bootstrap modal
        $('.modal-title').text('Add '+paramName); // Set Title to Bootstrap modal title
    }

    function edit(id, e) {
        save_method = 'edit';

        $('#myModal').find('.formModal')[0].reset();

        
        $.ajax({
            url : "<?php echo base_url('data_master/"+paramCtrl+"_detail');?>/"+id,
            type: "POST",
            dataType : "JSON",
            success: function(data)
            {
              if (paramCtrl == 'gelombang_pend') {
                $('input[name="id_gelombang"]').val(id);
                $('input[name="gelombang"]').val(data.gelombang);
                $('#myModal').modal('show'); // show bootstrap modal
              } else if (paramCtrl == 'jenjang_pendidikan') {
                $('input[name="id_jenjang"]').val(id);
                $('input[name="jenjang"]').val(data.jenjang); 
                $('#myModal').modal('show'); // show bootstrap modal
              } else if (paramCtrl == 'jenis_sosmed') {
                $('input[name="id_jenis_sosmed"]').val(id);
                $('input[name="jenis"]').val(data.jenis); 
                $('#myModal').modal('show'); // show bootstrap modal
              } else if (paramCtrl == 'jurusan') {
                $('input[name="id_jurusan"]').val(id);
                $('input[name="jurusan"]').val(data.jurusan); 
                $('#myModal').modal('show'); // show bootstrap modal
              } else if (paramCtrl == 'siswa_status') {
                $('input[name="id_siswa_status"]').val(id);
                $('input[name="status"]').val(data.status);
                $('#myModal').modal('show'); // show bootstrap modal
              } else if (paramCtrl == 'jenis_keringanan') {
                $('input[name="id_keringanan"]').val(id);
                $('input[name="keringanan"]').val(data.detail.keringanan);
                $('select[name="id_tipe_transaksi"]').html(data.option);
                $('#myModal').modal('show');
              } else if (paramCtrl == 'jenis_tarif') {
                $('input[name="id_tarif"]').val(id);
                $('input[name="nama_tarif"]').val(data.detail.nama_tarif);
                $('select[name="id_tipe_transaksi"]').html(data.option);
                $('#myModal').modal('show');
              } else if (paramCtrl == 'tahun_ajaran') {
                $('input[name="id_ta"]').val(id);
                $('input[name="tahun_mulai"]').val(data.tahun_mulai); 
                $('input[name="tahun_selesai"]').val(data.tahun_selesai);
                $('#myModal').modal('show'); // show bootstrap modal
              } else if (paramCtrl == 'user_manage') {
                $('input[name="id_user"]').val(id);
                $('input[name="nama"]').val(data.nama);
                $('input[name="email"]').val(data.email); 
                $('input[name="id_telegram"]').val(data.id_telegram);
                $('input[name="password"]').val(data.password);
                $('input[name="level"]').val(data.lvl);
                $('input[name="divisi"]').val(data.divisi);
                $('#myModal').modal('show'); // show bootstrap modal
              } else {
                return false;
              }

              $('.modal-title').text('Edit '+paramName); // Set Title to Bootstrap modal title
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                console.log('Error get data from ajax');
            }
        });
    }

    function del(id, e) {
        var paramText   = $(e).closest("tr").find("td:eq(1)").text(); // get current row 2nd TD value
        dm_swal_delete(id, paramText, 'del');
    }

    function enterScript(e) {
        if (e.keyCode == 13) {
            // saving(e);    
            e.preventDefault();
        }
    }

    function saving(e) {
        $(e).text('saving...');
        $(e).attr('disabled',true);


        var data    = $('#myModal').find('.formModal').serialize();

        $.ajax({
            url : "<?php echo site_url('data_master/"+paramCtrl+"_action')?>/"+save_method,
            type: "POST",
            data: data,
            dataType: "JSON",
            success: function(data) {
                if(data.status=="SUCCESS") {
                    $('#myModal').modal('hide');
                    $('#myModalEdit').modal('hide');
                }

                $(e).text('save'); //change button text
                $(e).attr('disabled',false); //set button enable 
                reload_table_SS(); //reload datatable ajax 
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log('Error get data from ajax');
                $(e).text('save'); //change button text
                $(e).attr('disabled',false); //set button enable 

            }
        });
    };

    function showNilai(e) {
        var id      = $(e).data("id");
        paramId     = $(e).attr("data-filterId");
        paramColumn = $(e).attr("data-filterColumn");
        // filterId    = undefined;
        // filterColumn= undefined;

        dataTables_MD(paramCtrl, id);
        $('#myModalNilai').modal('show');

    }

    function reload_table_SS() {
        table_SS.ajax.reload(null,false); //reload datatable ajax 
    }        

    // Sample, dm_swal_delete('<?php echo base_url('data_master/project_name');?>/tbl_m_project/3', 'PTP')
    function dm_swal_delete(paramId, paramText, paramDelete) {
      swal({
            title: "Apakah anda yakin?",
            text: "Anda akan menghapus "+paramText+" dari list!",
            type: "info",
            showCancelButton: true,
            confirmButtonColor: "#EF5350",
            confirmButtonText: "Ya, saya yakin!",
            cancelButtonText: "Tidak, batalkan!",
            closeOnConfirm: false,
            closeOnCancel: false
        },
        function(isConfirm){
            if (isConfirm) {
                    $.ajax({
                      url : "<?php echo base_url('data_master/"+paramCtrl+"_action');?>/"+paramDelete,
                      type: "POST",
                      data: "id="+paramId,
                      dataType: "JSON",
                      success: function(data) {
                            if (data.status == "SUCCESS") {
                              if (save_method == "edit" || save_method == "add") {
                                  reload_table_SS();
                              } else {
                                  dataTables_MD(G_paramCtrlN, G_id);
                                  save_method = "edit";
                              }
                              swal({
                                  title: "Terhapus!",
                                  text: paramText+" telah dihapus dari list.",
                                  confirmButtonColor: "#66BB6A",
                                  type: "success"
                              });
                            } else if (data.status == "CANNOT") {
                              swal({
                                  title: "Perhatian!",
                                  text: "Data ini sedang digunakan, gagal menghapus!",
                                  confirmButtonColor: "#2196F3",
                                  type: "warning"
                              });
                            } else {
                              swal({
                                  title: "Error!",
                                  text: "Terjadi kesalahan, tolong hubungi administrator.",
                                  confirmButtonColor: "#2196F3",
                                  type: "warning"
                              });
                            }
                          },
                        error: function(jqXHR, textStatus, errorThrown) {
                              swal({
                                  title: "Perhatian!",
                                  text: "Data ini sedang digunakan, gagal menghapus!",
                                  confirmButtonColor: "#2196F3",
                                  type: "warning"
                              });
                        }
                    }); 
              
            }
            else {
                swal({
                    title: "Cancelled",
                    text: "Tidak jadi menghapus "+paramText+" is still in the list.",
                    confirmButtonColor: "#2196F3",
                    type: "error"
                });
            }
        });
    }

    // $(document).on("click", '.list_ta', function() {
    //     $.ajax({
    //         url : "<?php echo base_url('data_master/list_ta');?>",
    //         type: "POST",
    //         dataType: "JSON",
    //         success: function(data) {
    //             // console.log(data);
    //             $(this).html(data);
    //         },
    //         error: function (jqXHR, textStatus, errorThrown) {
    //             console.log('Error get data from ajax');
    //             $(e).text('save'); //change button text
    //             $(e).attr('disabled',false); //set button enable 

    //         }
    //     });
    // })

    // function list_ta(e) {
    //     $(e).select2({
    //           ajax: {
    //             url: "<?php echo base_url('data_master/list_ta')?>",
    //             dataType: 'json',
    //             type: "GET",
    //             quietMillis: 100,
    //               data: function (term) {
    //                   return {
    //                       term: term
    //                   };
    //               },
    //               results: function (data) {
    //                 var results = [];
    //                 $.each(data, function(index, item){
    //                   results.push({
    //                     id: item.id_ta,
    //                     text: item.teks_ta
    //                   });
    //                 });
    //                 return {
    //                     results: results
    //                 };
    //               }
    //           }
    //       });
    // }

    // function list_jenjang(e) {
    //     $(e).select2({
    //           ajax: {
    //             url: "<?php echo base_url('data_master/list_jenjang')?>",
    //             dataType: 'json',
    //             type: "GET",
    //             quietMillis: 100,
    //               data: function (term) {
    //                   return {
    //                       term: term
    //                   };
    //               },
    //               results: function (data) {
    //                 var results = [];
    //                 $.each(data, function(index, item){
    //                   results.push({
    //                     id: item.id_jenjang,
    //                     text: item.jenjang
    //                   });
    //                 });
    //                 return {
    //                     results: results
    //                 };
    //               }
    //           }
    //       });
    // }

</script>
