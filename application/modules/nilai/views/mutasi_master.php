<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<div class="container">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <?php echo $title;?>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url('dashboard')?>"><i class="fa fa-home"></i> Menu</a></li>
      <li><a href="<?php echo base_url('dashboard')?>/<?php echo $menu?>"><?php echo $menu?></a></li>
      <li><a href="<?php echo base_url()?>"><?php echo $submenu?></a></li>
    </ol>
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
                <select name="id_ta" class="form-control input-sm">
                  <option>-Pilih tahun ajaran-</option>
                </select>
              </div>
            </div>
            <div class="row form-group">
              <label class="col-lg-2 col-sm-2 text-left"> Jenjang</label>
              <label class="col-lg-1 col-sm-1 text-left"> : </label>
              <div class="col-lg-9 col-sm-9">
                <select name="id_jenjang" class="form-control input-sm">
                  <option>-Pilih jenjang-</option>
                </select>
              </div>
            </div>
            <div class="row form-group">
              <label class="col-lg-2 col-sm-2 text-left"> Jurusan</label>
              <label class="col-lg-1 col-sm-1 text-left"> : </label>
              <div class="col-lg-9 col-sm-9">
                <select name="id_jurusan" class="form-control input-sm">
                  <option>-Pilih jurusan-</option>
                </select>
              </div>
            </div>
            <div class="row form-group">
              <label class="col-lg-2 col-sm-2 text-left"> Gelombang</label>
              <label class="col-lg-1 col-sm-1 text-left"> : </label>
              <div class="col-lg-9 col-sm-9">
                <select name="id_gelombang" class="form-control input-sm">
                  <option>-Pilih gelombang-</option>
                </select>
              </div>
            </div>

            <div class="row form-group">
              <label class="col-lg-2 col-sm-2 text-left"> No. Formulir</label>
              <label class="col-lg-1 col-sm-1 text-left"> : </label>
              <div class="col-lg-9 col-sm-9">
                <input type="text" class="form-control input-sm">
              </div>
            </div>

            <div class="row form-group">
              <label class="col-lg-2 col-sm-2 text-left"> NIS</label>
              <label class="col-lg-1 col-sm-1 text-left"> : </label>
              <div class="col-lg-9 col-sm-9">
                <input type="text" class="form-control input-sm">
              </div>
            </div>

            <div class="row form-group">
              <div class="col-lg-12 col-sm-12 text-right">
                <button type="button" class="btn btn-flat btn-danger"><i class="fa fa-search"></i> Filter
                <button type="button" class="btn btn-flat btn-primary" style="margin-left:1%"><i class="fa fa-send"></i> Pindah
              </div>
            </div>

            <div class="row form-group">
              <div class="col-lg-12">
                <table class="table table-striped table-bordered table-hover">
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
                      <td>M.Cholis Malik</td>
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
                      <td>M.Cholis Malik</td>
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

<!-- mod_mutasi -->
<div id="mod_mutasi" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header btn-danger">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Mutasi</h4>
      </div>
      <div class="modal-body">
        <div class="row form-group">
          <label class="col-lg-3 col-sm-3">Tahun Ajaran</label>
          <div class="col-lg-9 col-sm-9">
            <input name="name" type="text" class="form-control">
          </div>
        </div>
        <div class="row form-group">
          <label class="col-lg-3 col-sm-3">Jenjang</label>
          <div class="col-lg-9 col-sm-9">
            <input name="name" type="text" class="form-control">
          </div>
        </div>
        <div class="row form-group">
          <label class="col-lg-3 col-sm-3">Jurusan</label>
          <div class="col-lg-9 col-sm-9">
            <input name="name" type="text" class="form-control">
          </div>
        </div>
        <div class="row form-group">
          <label class="col-lg-3 col-sm-3">Tingkat</label>
          <div class="col-lg-9 col-sm-9">
            <input name="name" type="text" class="form-control">
          </div>
        </div>
        <div class="row form-group">
          <label class="col-lg-3 col-sm-3">Urutan Kelas</label>
          <div class="col-lg-9 col-sm-9">
            <input name="name" type="text" class="form-control">
          </div>
        </div>
        <div class="row form-group">
          <label class="col-lg-3 col-sm-3">Tgl Histori</label>
          <div class="col-lg-9 col-sm-9">
            <input name="name" type="date" class="form-control">
          </div>
        </div>
        <div class="row form-group">
          <label class="col-lg-3 col-sm-3">Status</label>
          <div class="col-lg-9 col-sm-9">
            <select class="form-control">
              <option>-Pilih status-</option>
            </select>
          </div>
        </div>
        <div class="row form-group">
          <label class="col-lg-3 col-sm-3">Keterangan</label>
          <div class="col-lg-9 col-sm-9">
            <textarea name="name" type="text" class="form-control"></textarea>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-danger btn-flat">Save</button>
      </div>
    </div>
  </div>
</div>

<!-- mod_riwayat -->
<div id="mod_riwayat" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header btn-primary">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Riwayat</h4>
      </div>
      <div class="modal-body">
        <div class="row form-group">
          <div class="col-lg-12 col-sm-12">
            <table class="table table-striped table-bordered table-hover">
              <thead>
                <tr class="info">
                  <th class="text-center">Tgl Histori</th>
                  <th class="text-center">TA</th>
                  <th class="text-center">Jenjang</th>
                  <th class="text-center">Jurusan</th>
                  <th class="text-center">Tingkat</th>
                  <th class="text-center">Urutan</th>
                  <th class="text-center">Status</th>
                  <th class="text-center">Keterangan</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td class="text-center">1-1-2016</td>
                  <td class="text-center">-</td>
                  <td class="text-center">-</td>
                  <td class="text-center">-</td>
                  <td class="text-center">-</td>
                  <td class="text-center">-</td>
                  <td class="text-center">Daftar</td>
                  <td class="text-center">-</td>
                </tr>
                <tr>
                  <td class="text-center">26-1-2016</td>
                  <td class="text-center">2016-2017</td>
                  <td class="text-center">SMK</td>
                  <td class="text-center">Teknik Komputer Jaringan</td>
                  <td class="text-center">1</td>
                  <td class="text-center">1</td>
                  <td class="text-center">Naik Kelas</td>
                  <td class="text-center">-</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary btn-flat">Save</button>
      </div>
    </div>
  </div>
</div>

<!-- mod_tagihan -->
<div id="mod_tagihan" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header btn-success">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Tagihan</h4>
      </div>
      <div class="modal-body">
        <div class="row form-group">
          <div class="col-lg-12 col-sm-12">
            <table class="table table-striped table-bordered table-hover">
              <thead>
                <tr class="success">
                  <th class="text-center">Jenis transaksi</th>
                  <th class="text-center">Total Tagihan</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td class="text-left">PSB</td>
                  <td class="text-right">300,000</td>
                </tr>
                <tr>
                  <td class="text-left">SPP Bulanan</td>
                  <td class="text-right">8,000,000</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
