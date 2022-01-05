
<style>
    .content {
    min-height: 50px;
    padding: 15px;
    margin-right: auto;
    margin-left: auto;
    padding-left: 15px;
    padding-right: 15px;
}

.dataTables_empty{
    text-align:center;
}

</style>
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
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="id_ta" class="control-label">Tahun Ajaran</label>
                            <select class="form-control myselect" name="id_ta" style="width: 100%;" id="id_ta" required>
                                <?php echo $ta?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="id_jenjang" class="control-label">Jenjang</label>
                            <select class="form-control myselect" name="id_jenjang" style="width: 100%;" id="id_jenjang" required>
                                <?php echo $jenjang?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="id_gelombang" class="control-label">Gelombang</label>
                            <select class="form-control myselect" name="id_gelombang" style="width: 100%;" id="id_gelombang" required>
                                <?php echo $gelombang?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="id_jurusan" class="control-label">Jurusan</label>
                            <select class="form-control myselect" name="id_jurusan" style="width: 100%;" id="id_jurusan" required>
                                <?php echo $jurusan?>
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
            <div class="pull-right">
              <button type="button" class="btn btn-primary btn-sm action" data-action="add"  data-toggle="tooltip" title="Tambah" data-original-title="Tambah">
                <i class="glyphicon glyphicon-plus"></i></button>
                &nbsp;
            </div>
          </div>
          
            <div class="box-body">
                <div style="">
                    <table class="table table-bordered table-striped mytable" style="background-color: #00c0ef30;" id="mytable">
                        <thead class="bgColorCustom">
                            <tr>
                                <th>No</th>
                                <th>Nama Siswa</th>
                                <th>NIS</th>
                                <th>Tahun Ajaran</th>
                                <th>Jenjang</th>
                                <th>Jurusan</th>
                                <th>Kelas</th>
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


<form id="form-field" enctype="multipart/form-data">
  <div class="modal fade" role="dialog" >
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header btn-success">
                <button type="button" class="close" data-dismiss="modal" >×</button>
                <h4 class="modal-title">User</h4>
            </div>
            <div class="modal-body">
                <input name="id_siswa" type="hidden">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="nama" class="control-label">Nama Siswa</label>
                            <input name="nama" type="text" class="form-control field" id="nama">
                        </div>
                    </div>
                </div>  
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nis" class="control-label">NIS</label>
                            <input name="nis" type="text" class="form-control field" id="nis">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nisn" class="control-label">NISN</label>
                            <input name="nisn" type="text" class="form-control field" id="nisn">
                        </div>
                    </div>
                </div>  
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="id_agama" class="control-label">Agama</label>
                            <select class="form-control myselect field" name="id_agama" style="width: 100%;" id="id_agama">
                                <?php echo $agama?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="id_gender" class="control-label">Gender</label>
                            <select class="form-control myselect field" name="id_gender" style="width: 100%;" id="id_gender">
                                <?php echo $gender?>
                            </select>
                        </div>
                    </div>
                </div>  
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="tempat_lahir" class="control-label">Tempat Lahir</label>
                            <input name="tempat_lahir" type="text" class="form-control field" id="tempat_lahir">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="tgl_lahir" class="control-label">Tanggal Lahir</label>
                            <input name="tgl_lahir" type="text" class="form-control field myDate" id="tgl_lahir">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="asal_sekolah" class="control-label">Asal Sekolah</label>
                            <input name="asal_sekolah" type="text" class="form-control field" id="asal_sekolah">
                        </div>
                    </div>
                </div>  
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="nama_ayah" class="control-label">Nama Ayah</label>
                            <input name="nama_ayah" type="text" class="form-control field" id="nama_ayah">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="nama_ibu" class="control-label">Nama Ibu</label>
                            <input name="nama_ibu" type="text" class="form-control field" id="nama_ibu">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="no_telp_ortu" class="control-label">No Telpon Orangtua</label>
                            <input name="no_telp_ortu" type="text" class="form-control field myDate" id="no_telp_ortu">
                        </div>
                    </div>
                </div> 
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="anak_ke" class="control-label">Anak ke</label>
                            <input name="anak_ke" type="number" class="form-control field" id="anak_ke">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="jml_saudara" class="control-label">Jumlah Saudara</label>
                            <input name="jml_saudara" type="number" class="form-control field" id="jml_saudara">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nama_wali" class="control-label">Nama Wali</label>
                            <input name="nama_wali" type="text" class="form-control field" id="nama_wali">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="no_telp_wali" class="control-label">No Telpon Wali</label>
                            <input name="no_telp_wali" type="text" class="form-control field myDate" id="no_telp_wali">
                        </div>
                    </div>
                </div> 
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="provinsi_id" class="control-label">Provinsi</label>
                            <select class="form-control myselect field" name="provinsi_id" style="width: 100%;" id="provinsi_id"  onChange="tampilKabupaten(this)" required>
                                <?php echo $provinsi?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="kabupaten_id" class="control-label">Kabupaten</label>
                            <?php
                                $style_kabupaten='class="form-control field myselect" id="kabupaten_id" style="width:100%;" onChange="tampilKecamatan(this)" required';
                                echo form_dropdown("kabupaten_id",array('Pilih Kabupaten'=>'- Pilih Kabupaten -'),'',$style_kabupaten);
                            ?>
                        </div>
                    </div>
                </div>  
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="kecamatan_id" class="control-label">Kecamatan</label>
                            <?php
                                $style_kabupaten='class="form-control field myselect" id="kecamatan_id" style="width:100%;" onChange="tampilKelurahan(this)" required';
                                echo form_dropdown("kecamatan_id",array('Pilih Kecamatan'=>'- Pilih Kecamatan -'),'',$style_kabupaten);
                            ?>
                        </div>  
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="kelurahan_id" class="control-label">Kelurahan</label>
                            <?php
                                $style_kelurahan='class="form-control field myselect" id="kelurahan_id" style="width:100%;" required';
                                echo form_dropdown("kelurahan_id",array('Pilih Kelurahan'=>'- Pilih Kelurahan -'),'',$style_kelurahan);
                            ?>
                        </div>
                    </div>
                </div>      
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="id_ta" class="control-label">Tahun Ajaran</label>
                            <select class="form-control myselect field" name="id_ta" style="width: 100%;" required>
                                <?php echo $ta?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="id_jenjang" class="control-label">Jenjang</label>
                            <select class="form-control myselect field" name="id_jenjang" style="width: 100%;" required>
                                <?php echo $jenjang?>
                            </select>
                        </div>
                    </div>
                </div>  
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="id_jurusan" class="control-label">Jurusan</label>
                            <select class="form-control myselect field" name="id_jurusan" style="width: 100%;" required>
                                <?php echo $jurusan?>
                            </select>
                        </div>  
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="id_gelombang" class="control-label">Gelombang</label>
                            <select class="form-control myselect field" name="id_gelombang" style="width: 100%;"  required>
                                <?php echo $gelombang?>
                            </select>
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
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="foto" class="control-label">Foto</label>
                            <input name="foto" type="file" class="form-control fotos" id="foto">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <div id="foto_siswa"></div>
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

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="<?php echo base_url()?>berkas/plugins/label-beauty/jquery-labelauty.js"></script>

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
  var   urlDb   = "<?php echo base_url('data_master/show_siswa')?>";
  var   totalClmn;
  var   table1;

    var jenjang   =   null;
    var ta        =   null;
    var gelombang =   null;
    var jurusan   =   null;
    $('#filter').click(function(){
            jenjang   =   $('#id_jenjang').find(':selected').val();
            ta        = $('#id_ta').find(':selected').val();
            gelombang = $('#id_gelombang').find(':selected').val();
            jurusan   = $('#id_jurusan').find(':selected').val();
            table1.ajax.reload(null, false); 
    });

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
            "type": "POST",
            "data":function(param){
                param.id_jenjang    = jenjang;
                param.id_ta         = ta;
                param.id_gelombang  = gelombang;
                param.id_jurusan    = jurusan;
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
            $(".myselect").select2("val", "0");
            $('#form-field').children('.modal').find('.modal-title').text("Tambah Siswa");
            $('#form-field').children('.modal').modal('show'); 
        } 
        else if (mode == "edit") {
            $.ajax({
                url : "<?php echo base_url('data_master/siswaAction')?>/"+"detail",
                dataType: "json",
                data: "id_siswa="+data,
                type: "POST",
                success: function(data) {
                    $('#form-field').find("input[name='id_siswa']").val(data.id_siswa);
                    $('#form-field').find("input[name='nama']").val(data.nama);
                    $('#form-field').find("input[name='nis']").val(data.nis);
                    $('#form-field').find("input[name='nisn']").val(data.nisn);
                    $('#form-field').find("input[name='tempat_lahir']").val(data.tempat_lahir);
                    $('#form-field').find("input[name='tgl_lahir']").val(data.tanggal_lahir);
                    $('#form-field').find("input[name='nama_ibu']").val(data.nama_ibu);
                    $('#form-field').find("input[name='nama_ayah']").val(data.nama_ayah);
                    $('#form-field').find("input[name='anak_ke']").val(data.anak_ke);
                    $('#form-field').find("input[name='jml_saudara']").val(data.jml_saudara);
                    $('#form-field').find("input[name='nama_wali']").val(data.nama_wali);
                    $('#form-field').find("input[name='no_telp_wali']").val(data.no_telp_wali);
                    $('#form-field').find("input[name='no_telp_ortu']").val(data.no_telp_ortu);
                    $('#form-field').find("input[name='alamat']").val(data.alamat);
                    $('#form-field').find("input[name='asal_sekolah']").val(data.asal_sekolah);

                    $('#form-field').find("select[name='provinsi_id']").html(data.prov);
                    $('#form-field').find("select[name='kabupaten_id']").html(data.kab);
                    $('#form-field').find("select[name='kecamatan_id']").html(data.kec);
                    $('#form-field').find("select[name='kelurahan_id']").html(data.kel);
                    $('#form-field').find("select[name='id_gender']").html(data.gender);
                    $('#form-field').find("select[name='id_gelombang']").html(data.gelombang);
                    $('#form-field').find("select[name='id_jurusan']").html(data.jurusan);
                    $('#form-field').find("select[name='id_jenjang']").html(data.jenjang);
                    $('#form-field').find("select[name='id_ta']").html(data.ta);
                    $('#form-field').find("select[name='id_agama']").html(data.agama);
                    $('#foto_siswa').html(data.fotoSiswa);

                }
            })
            
            $('#form-field').children('.modal').find('.modal-title').text("Ubah Siswa");
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
            var user  = $(this).attr('data-id_siswa');
            var nama      = $(this).closest("tr").find("td:eq(2)").text();

            $.ajax({
                url : "<?php echo base_url('data_master/siswaAction')?>/"+action,
                dataType: "json",
                data: 'id_siswa='+user+'&status='+status,
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
          
          var dataForm    = new FormData($('#form-field')[0]);

          $.ajax({
            url : "<?php echo base_url('data_master/siswaAction')?>/"+mode,
            dataType: "json",
            data: dataForm,
            type: "POST",
            processData : false,
            contentType:false,
            cache:false,
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
