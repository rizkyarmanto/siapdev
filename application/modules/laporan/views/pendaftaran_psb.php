<div class="content-wrapper">
<div class="container">
  <!-- Content Header (Page header) -->
  <input type="hidden" id="paramCtrl" value="siswa">
  <input type="hidden" class="reset" data-aktif="0">
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
            <h3 class="box-title pull-left">
              List Pendaftaran Siswa Baru Tahun <?php echo date('Y')?>
            </h3>
            <div class="pull-right">
               <button type="button" class="btn btn-primary btn-sm cetakPSB" data-toggle="tooltip" title="Cetak" data-original-title="Cetak">
                <i class="glyphicon glyphicon-print"></i></button>
                &nbsp; 
                <button type="button" class="btn btn-warning btn-sm" onClick="reload_table_MD();" data-toggle="tooltip" title="Reload" data-original-title="Reload">
                <i class="fa fa-circle-o"></i></button>
            </div>
          </div>
          
          <div class="box-body">
          <!--
            <div class="col-lg-12" style="padding:0; margin-bottom: 1%">
              <div class="form-horizontal">
                <div class="row form-group">
                  <div class="col-lg-3 col-md-3">
                    <label class="control-label col-md-5" style="text-align:right;">Tahun Ajaran</label>
                    <div class="col-md-7">
                      <select onkeypress="return enterScript(event)" class="form-control input-medium filterData" data-column="id_ta">
                            <option value="">All</option>
                        <?php foreach ($list_ta as $lta) { ?>
                          <option value="<?php echo $lta['id_ta'];?>"><?php echo $lta['tahun_mulai'];?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-lg-2 col-md-2">
                    <label class="control-label col-md-5" style="text-align:right;">Kelas</label>
                    <div class="col-md-7">
                      <select onkeypress="return enterScript(event)" class="form-control input-medium filterData" data-column="urutan_kelas">
                            <option value="">All</option>
                        <?php foreach ($list_kelas as $lka) { ?>
                          <option value="<?php echo $lka['urutan_kelas'];?>"><?php echo $lka['urutan_kelas'];?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-lg-3 col-md-3">
                    <label class="control-label col-md-5" style="text-align:right;">Jurusan</label>
                    <div class="col-md-7">
                      <select onkeypress="return enterScript(event)" class="form-control input-medium filterData" data-column="id_jurusan">
                            <option value="">All</option>
                        <?php foreach ($list_jurusan as $lju) { ?>
                          <option value="<?php echo $lju['id_jurusan'];?>"><?php echo $lju['jurusan'];?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-lg-2 col-md-2">
                    <label class="control-label col-md-5" style="text-align:right;">Jenjang</label>
                    <div class="col-md-7">
                      <select onkeypress="return enterScript(event)" class="form-control input-medium filterData" data-column="id_jenjang">
                            <option value="">All</option>
                        <?php foreach ($list_jenjang as $lje) { ?>
                          <option value="<?php echo $lje['id_jenjang'];?>"><?php echo $lje['jenjang'];?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-lg-2 col-md-2">
                    <label class="control-label col-md-5" style="text-align:right;">Tingkat</label>
                    <div class="col-md-7">
                      <select onkeypress="return enterScript(event)" class="form-control input-medium filterData" data-column="tingkat">
                            <option value="">All</option>
                        <?php foreach ($list_tingkat as $lti) { ?>
                          <option value="<?php echo $lti['tingkat'];?>"><?php echo $lti['tingkat'];?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                </div>
              </div>    

            </div>
            -->
            <div class="col-lg-12" style="overflow-x: auto; padding:0;">
              <table class="table table-bordered table-hover table-striped" id="datatables-ssMD" width="100%">
                <thead>
                  <tr class="bgColorBlue">
                    <th>No</th>
                    <th>No. Formulir</th>
                    <th>Nama Siswa</th>
                    <th>Asal Sekolah</th>
                    <th>Gelombang</th>
                    <th>Jenjang</th>
                    <th>Jurusan</th>
                    <th>Tgl. Daftar</th>
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
<!--
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header btn-success">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Cetak</h4>
      </div>
      <div class="modal-body">
        <table class="table table-bordered table-hover table-striped" width="100%">
                <thead>
                  <tr class="bgColorBlue">
                    <th>No</th>
                    <th>No. Formulir</th>
                    <th>Nama Siswa</th>
                    <th>Asal Sekolah</th>
                    <th>Tahun Ajaran</th>
                    <th>Gelombang</th>
                    <th>Jenjang</th>
                    <th>Jurusan</th>
                    
                  </tr>
                </thead>
                <tbody>
                </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
-->
<script type="text/javascript">
    $(document).on('click', '.btn', function() {
      console.log($(this).css("z-index"));
      console.log("this");
    });

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

    var table_MD;
    var save_methodNilai;
    var G_paramCtrlN;
    var G_id;
    var paramColumn;
    var paramId;

    var filterId_ta;
    var filterId_jenjang;
    var filterId_jurusan;
    var filter_gelombang;
    var filterUrutan_kelas;

    $(document).ready(function() {
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
              "url": "<?php echo base_url('data_master/show_psb_"+paramCtrl+"')?>",
              "type": "POST",
              "data": function(param) {
                  param.id_ta         = filterId_ta
                  param.id_jenjang    = filterId_jenjang
                  param.id_jurusan    = filterId_jurusan
                  param.gelombang     = filter_gelombang
                  
              } 
          },

          //Set column definition initialisation properties.
          "columnDefs": [
          { 
              "targets": [ 0 ], //first column / numbering column
              "orderable": false //set not orderable
          },
          {
              "targets": [4],
              "orderable": false,
              "className": "text-center" 
          },
          {
              "targets": [5],
              "orderable": false,
              "className": "text-center"
          },
          { 
              "targets": [ last_column ], //first column / numbering column
              "orderable": false, //set not orderable
              "className" : "text-left"
          }
          ]
      })
                
    });

    $("#myModalEdit").on("hidden.bs.modal", function() {
        $('.reset').attr("data-aktif", '0');
    });

    $(document).on("click", ".addNilai", function() {
        save_methodNilai    = "addNilai";

        $('#myModalNilai').find('#formNilai')[0].reset(); // reset form on modals
        // $('.form-group').removeClass('has-error'); // clear error class
        // $('.help-block').empty(); // clear error string
        $('#myModalNilai').modal('show'); // show bootstrap modal
        $('.modal-title').text('Tambah Nilai'); // Set Title to Bootstrap modal title        

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

    $(document).on("click", ".saveNilai", function() {
        var self  = this;
        $(this).text('saving...');
        $(this).attr('disabled', true);

        if (save_methodNilai == 'editNilai') {
          var data = $('#formNilaiEdit').serialize();
        } else {
          var data = $('#formNilai').serialize();
        }
       $.ajax({
            url : "<?php echo base_url('data_master/"+paramCtrl+"_action');?>/"+save_methodNilai,
            type: "POST",
            data: data,
            dataType: "JSON",
            success: function(data) {
              $(self).text('Save');
              $(self).attr('disabled', false);
              table_MD.ajax.reload(null,false);
              $('#myModalNilai').modal('hide'); // show bootstrap modal
              $('#myModalNilaiEdit').modal('hide'); // show bootstrap modal
            }
       });
    })

    $(document).on("change", ".filterData", function() {
        filterId_ta       = $('select[data-column="id_ta"]').val();
        filterId_jenjang  = $('select[data-column="id_jenjang"]').val();
        filterId_jurusan  = $('select[data-column="id_jurusan"]').val();
        filterTingkat     = $('select[data-column="tingkat"]').val();
        filterUrutan_kelas  = $('select[data-column="urutan_kelas"]').val();
        // table_MD.ajax.url("<?php echo base_url('data_master/show_"+paramCtrl+"')?>").load();
        table_MD.ajax.reload()


    })

    var   save_method = "add"; //save_method as global variable for add and edit

    $(document).on("click", ".delNilai", function() { 
        var id          = $(this).attr("data-id");
        var paramText   = $(this).closest("tr").find("td:eq(7)").text(); // get current row 6th TD value
        dm_swal_delete(id, paramText, 'delNilai');
    });
    
    $(document).on("click", ".showDetail", function() {
        var id    = $(this).attr("data-id");
        $('#myModal').find('#formModal')[0].reset();

        $.ajax({
            url : "<?php echo base_url('data_master/"+paramCtrl+"_detail');?>/"+id,
            type: "POST",
            dataType : "JSON",
            success: function(data) {
              $('#formModal').find('.nama').val(data.nama);
              $('#formModal').find('.nis').val(data.nis);
              $('#formModal').find('.nisn').val(data.nisn);
              $('#formModal').find('.teks_ta').val(data.teks_ta);
              $('#formModal').find('.jenjang').val(data.jenjang);
              $('#formModal').find('.kelas').val(data.kelas);
              $('#formModal').find('.status').val(data.status);
              $('#formModal').find('.agama').val(data.agama);
              $('#formModal').find('.ttl').val(data.ttl);
              $('#formModal').find('.anak_ke').val(data.anak_ke);
              $('#formModal').find('.alamat').val(data.alamat);
              $('#formModal').find('.asal_sekolah').val(data.asal_sekolah);

              if(data.nama_ayah) {
                $('#formModal').find('.ortu_label').text("Nama Ayah");
                $('#formModal').find('.ortu_ayah').val(data.nama_ayah);
                $('#formModal').find('.ortu_ibu').val(data.nama_ibu);
                $('#formModal').find('.ortu_no_telp_label').text("No. Telp Orang Tua");
                $('#formModal').find('.ortu_no_telp').val(data.no_telp_ortu);           
                $('#formModal').find('.ortu_ibu').parent().parent().css("display", "block");
              } else {
                $('#formModal').find('.ortu_label').text("Nama Wali");
                $('#formModal').find('.ortu_ayah').val(data.nama_wali);
                $('#formModal').find('.ortu_no_telp_label').text("No. Telp Wali");
                $('#formModal').find('.ortu_no_telp').val(data.no_telp_wali);           
                $('#formModal').find('.ortu_ibu').parent().parent().css("display", "none");
              }
              $('#formModal').find('.keterangan').text(data.keterangan);           
              // $('#formModal').find('.asal_sekolah').val(data.asal_sekolah);

              $('#myModal').modal('show'); // show bootstrap modal
              $('.modal-title').text(data.nama); // Set Title to Bootstrap modal title
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log('Error get data from ajax');
            }
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
              } else if (paramCtrl == 'siswa') {
                // $('input[name="id_user"]').val(id);
                // $('#myModal').modal('show'); // show bootstrap modal
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

    // function showNilai(e) {
    //     var id      = $(e).data("id");
    //     paramId     = $(e).attr("data-filterId");
    //     paramColumn = $(e).attr("data-filterColumn");
    //     // filterId    = undefined;
    //     // filterColumn= undefined;

    //     dataTables_MD(paramCtrl, id);
    //     $('#myModalNilai').modal('show');

    // }

    function reload_table_SS() {
        table_SS.ajax.reload(null,false); //reload datatable ajax 
    }  

    function reload_table_MD() {
        table_MD.ajax.reload(null,false); //reload datatable ajax 
    }        

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
                              table_MD.ajax.reload(null,false); //reload datatable ajax 
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

    $(document).on("click", ".cetakPSB", function() {
        window.open('laporan/psb_print', '_blank', 'location=yes,height=570,width=800,scrollbars=yes,status=yes');
    });
</script>


