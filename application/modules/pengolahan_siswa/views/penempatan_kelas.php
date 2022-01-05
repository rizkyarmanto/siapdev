<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<div class="container">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <?php echo $title;?>
    </h1>
    <ol class="breadcrumb" id="dashboard-pageBar"></ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Row -->
    <div class="row">
      <div class="col-lg-10 col-lg-offset-1 col-sm-12">
          <?php if($this->session->flashdata('pesan_success') != '') { ?>
          <div class="alert alert-dismissible alert alert-info" id="alert"><i class="fa fa-check"></i> <?php echo $this->session->flashdata('pesan_success') ?><button type="button" class="close" data-dismiss="alert">&times;</button></div>
          <?php } ?>
          
          <?php if($this->session->flashdata('pesan_error') != '') { ?>
          <div class="alert alert-dismissible alert alert-warning" id="alert"><i class="fa fa-warning"></i> <?php echo $this->session->flashdata('pesan_error') ?><button type="button" class="close" data-dismiss="alert">&times;</button></div>
          <?php } ?>
      </div>

      <!-- Box -->
      <div class="col-lg-6 col-sm-6">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Asal</h3>
            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div>
          </div>

          <div class="box-body">
            <div class="row form-group">
              <label class="col-lg-2 col-sm-2 text-left"> TA</label>
              <label class="col-lg-1 col-sm-1 text-left"> : </label>
              <div class="col-lg-9 col-sm-9">
                <select name="id_ta" class="form-control filterData input-sm">
                  <option value="">-Pilih tahun ajaran-</option>
                  <?php foreach ($list_ta as $ta) { ?>
                    <option value="<?php echo $ta['id_ta']?>"><?php echo $ta['teks_ta']?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
            <div class="row form-group">
              <label class="col-lg-2 col-sm-2 text-left"> Jenjang</label>
              <label class="col-lg-1 col-sm-1 text-left"> : </label>
              <div class="col-lg-9 col-sm-9">
                <select name="id_jenjang" class="form-control filterData input-sm">
                  <option value="">-Pilih jenjang-</option>
                  <?php foreach ($list_jenjang as $je) { ?>
                    <option value="<?php echo $je['id_jenjang']?>"><?php echo $je['jenjang']?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
            <div class="row form-group">
              <label class="col-lg-2 col-sm-2 text-left"> Jurusan</label>
              <label class="col-lg-1 col-sm-1 text-left"> : </label>
              <div class="col-lg-9 col-sm-9">
                <select name="id_jurusan" class="form-control filterData input-sm">
                  <option value="">-Pilih jurusan-</option>
                  <?php foreach ($list_jurusan as $jr) { ?>
                    <option value="<?php echo $jr['id_jurusan']?>"><?php echo $jr['jurusan']?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
            <div class="row form-group">
              <label class="col-lg-2 col-sm-2 text-left"> Tingkat</label>
              <label class="col-lg-1 col-sm-1 text-left"> : </label>
              <div class="col-lg-9 col-sm-9">
                <select name="tingkat" class="form-control filterData input-sm">
                  <option value="">-Pilih tingkat-</option>
                  <?php foreach ($list_tingkat as $tk) { ?>
                    <option value="<?php echo $tk['tingkat']?>"><?php echo $tk['tingkat']?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
            <div class="row form-group">
              <label class="col-lg-2 col-sm-2 text-left"> Gelombang</label>
              <label class="col-lg-1 col-sm-1 text-left"> : </label>
              <div class="col-lg-9 col-sm-9">
                <select name="id_gelombang" class="form-control filterData input-sm">
                  <option value="">-Pilih gelombang-</option>
                  <?php foreach ($list_gelombang as $gl) { ?>
                    <option value="<?php echo $gl['id_gelombang']?>"><?php echo $gl['gelombang']?></option>
                  <?php } ?>
                </select>
              </div>
            </div>

            <div class="row form-group">
              <label class="col-lg-2 col-sm-2 text-left"> No. Formulir</label>
              <label class="col-lg-1 col-sm-1 text-left"> : </label>
              <div class="col-lg-9 col-sm-9">
                <input name="noform" type="text" class="form-control filterData input-sm">
              </div>
            </div>

            <div class="row form-group">
              <label class="col-lg-2 col-sm-2 text-left"> NIS</label>
              <label class="col-lg-1 col-sm-1 text-left"> : </label>
              <div class="col-lg-9 col-sm-9">
                <input name="nis" type="text" class="form-control filterData input-sm">
              </div>
            </div>

            <div class="row form-group">
              <div class="col-lg-12 col-sm-12 text-right">
                <!-- <button type="button" class="btn btn-flat btn-danger search-filter"><i class="fa fa-search"></i> Filter -->
                <button type="button" class="btn btn-flat btn-primary" style="margin-left:1%"><i class="fa fa-send"></i> Pindah
              </div>
            </div>

            <div class="row form-group">
              <div class="col-lg-12">
                <table class="table table-striped table-bordered table-hover" id="datatables-ssFR">
                  <thead>
                    <tr class="success">
                      <th class="text-center">No.</th>
                      <th class="text-center">NIS</th>
                      <th class="text-center">Nama</th>
                      <th class="text-center">
                        <input type="checkbox">
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td class="text-center">1</td>
                      <td class="text-center">1311418</td>
                      <td>Achmad Mujahir</td>
                      <td class="text-center">
                        <input type="checkbox">
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div> 
            </div>

          </div>
          <div class="box-footer">
          </div>
        </div>
      </div>

      <!-- Box -->
      <div class="col-lg-6 col-sm-6">
        <div class="box box-danger">
          <div class="box-header with-border">
            <h3 class="box-title">Tujuan</h3>
            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div>
          </div>

          <div class="box-body">
            <div class="row form-group">
              <label class="col-lg-2 col-sm-2 text-left"> Kelas</label>
              <label class="col-lg-1 col-sm-1 text-left"> : </label>
              <div class="col-lg-9 col-sm-9">
                <select name="id_ta" class="form-control input-sm">
                  <option>-Pilih tahun ajaran-</option>
                </select>
              </div>
            </div>
            <div class="row form-group">
              <label class="col-lg-2 col-sm-2 text-left"> Urutan Kelas</label>
              <label class="col-lg-1 col-sm-1 text-left"> : </label>
              <div class="col-lg-9 col-sm-9">
                <select name="id_jenjang" class="form-control input-sm">
                  <option>-Pilih jenjang-</option>
                </select>
              </div>
            </div>

            <div class="row form-group">
              <div class="col-lg-12">
                <table class="table table-striped table-bordered table-hover">
                  <thead>
                    <tr class="danger">
                      <th class="text-center">No.</th>
                      <th class="text-center">NIS</th>
                      <th class="text-center">Nama</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td class="text-center">1</td>
                      <td class="text-center">1311418</td>
                      <td>Achmad Mujahir</td>
                    </tr>
                  </tbody>
                </table>
              </div> 
            </div>

          </div>
          <div class="box-footer">
          </div>
        </div>
      </div>
      
    </div>
    
  </section>
  <!-- /.content -->
</div>
</div>

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

  var table_FR;

  var filterId_ta;
  var filterId_jenjang;
  var filterId_jurusan;
  var filterTingkat;
  var filterId_gelombang;
  var filterNoform;
  var filterNis;

  $(document).ready(function() {
    table_FR  = $("#datatables-ssFR").DataTable({ 
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
            "url": "<?php echo base_url('pengolahan_siswa/penempatan_kelas_calon')?>",
            "type": "POST",
            "data": function(param) {
                param.id_ta       = filterId_ta
                param.id_jenjang  = filterId_jenjang
                param.id_jurusan  = filterId_jurusan
                param.tingkat     = filterTingkat
                param.id_gelombang = filterId_gelombang
                param.noform      = filterNoform
                param.nis         = filterNis
            }
        },

        //Set column definition initialisation properties.
        "columnDefs": [
          { 
            "targets": [ 0 ], //first column / numbering column
            "orderable": false //set not orderable
          }
        ]
    })
              
  });

  $(document).on('change keyup', ".filterData", function() {
      filterId_ta       = $('select[name="id_ta"]').val();
      filterId_jenjang  = $('select[name="id_jenjang"]').val();
      filterId_jurusan  = $('select[name="id_jurusan"]').val();
      filterTingkat     = $('select[name="tingkat"]').val();
      filterId_gelombang  = $('select[name="id_gelombang"]').val();
      filterNoform      = $('input[name="noform"]').val();
      filterNis         = $('input[name="nis"]').val();

      table_FR.ajax.reload()
  })

  $(document).ready(function () {
    $.ajax({
      url : "<?php echo base_url('user/show_menu');?>",
      dataType: "json",
      type: "POST",
      data: "url=<?php echo str_replace(base_url(), '', base_url(uri_string()));?>",
      success: function(data) {
          $('#dashboard-pageBar').html(data.bar);
          $('#dashboard-pageMenu').html(data.menu);
      }
    })
  });

</script>
