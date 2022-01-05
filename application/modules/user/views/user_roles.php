<form action="<?php echo base_url('transaksi/input_transaksi_spp')?>" method="post"> 
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <div class="container">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          <?php echo $title_page;?>
          <small></small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-money"></i> <?php echo $menu;?></a></li>
          <li class="active"><?php echo $submenu;?></li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-lg-10 col-lg-offset-1 col-sm-12">
            <div class="col-md-5 col-sm-12">
              <div class="box box-success collapsed-box">
                <div class="box-header with-border">
                  <div class="pull-left">
                    <h4>
                      List Module
                    </h4>
                  </div>
                  <div class="pull-right">
                      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                  </div>
                </div>
                
                <div class="box-body">
                  <div style="overflow-x: auto;">
                    <table class="table table-bordered table-hover table-striped text-center" id="datatables-ss">
                      <thead>
                        <tr class="">
                          <th>Module</th>
                          <th>Nama</th>
                        </tr>
                        <tr class="">
                          <td>MOO1</td>
                          <td>Transaksi PSB</td>
                        </tr>                    
                      </thead>
                      <tbody>
                                                              
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-7 col-sm-12">
              <div class="box box-success collapsed-box">
                <div class="box-header with-border">
                  <div class="pull-left">
                    <h4>
                      List Submodule
                    </h4>
                  </div>
                  <div class="pull-right">
                      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                  </div>
                </div>
                
                <div class="box-body">
                  <div style="overflow-x: auto;">
                    <table class="table table-bordered table-hover table-striped text-center" id="datatables-ss">
                      <thead>
                        <tr class="">
                          <th>Module</th>
                          <th>Submodul</th>
                          <th>Nama</th>
                          <th>Deskripsi</th>
                        </tr>
                        <tr class="">
                          <td>MOO1</td>
                          <td>M0101</td>
                          <td>Pendaftaran</td>
                          <td></td>
                        </tr>  
                        <tr class="">
                          <td>MOO1</td>
                          <td>M0102</td>
                          <td>Pembatalan</td>
                          <td></td>
                        </tr> 
                        <tr class="">
                          <td>MOO1</td>
                          <td>M0103</td>
                          <td>Pelunasan</td>
                          <td></td>
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
        </div>      

        <div class="row">
          <div class="col-lg-10 col-lg-offset-1 col-sm-12">
            <div class="box box-success">
              <div class="box-header with-border">
                <div class="pull-left">
                  <h4>
                    List <?php echo $submenu;?>
                  </h4>
                </div>
                <div class="pull-right">
                  <button type="button" class="btn btn-primary btn-sm" data-toggle="tooltip" title="Tambah" data-original-title="Tambah">
                    <i class="glyphicon glyphicon-plus"></i></button>
                    &nbsp;
                    <button type="button" class="btn btn-warning btn-sm" data-toggle="tooltip" title="Reload" data-original-title="Reload">
                    <i class="fa fa-circle-o"></i></button>
                </div>
              </div>
              
              <div class="box-body">
                <div style="overflow-x: auto;">
                  <table class="table table-bordered table-hover table-striped text-center" id="datatables-ss">
                    <thead>
                      <tr class="">
                        <th rowspan="2">No</th>
                        <th rowspan="2">Role</th>
                        <th rowspan="2">Deskripsi</th>
                        <th colspan="4">Cakupan Data</th>
                        <th colspan="3">Menu/Modul</th>
                      </tr>
                      <tr class="">
                        <th>TK</th>
                        <th>SD</th>
                        <th>SMP</th>
                        <th>SMK</th>
                        <th>MO1</th>
                        <th>MO2</th>
                        <th>MO3</th>
                      </tr>                    
                    </thead>
                    <tbody>
                      <tr>
                        <td>1</td>
                        <td>RO1</td>
                        <td>Ketua Yayasan</td>
                        <td><i class="fa fa-check"></td>
                        <td><i class="fa fa-check"></td>
                        <td><i class="fa fa-check"></td>
                        <td><i class="fa fa-check"></td>
                        <td></td>
                        <td></td>
                        <td></td>
                      </tr>
                      <tr>                      
                        <td>2</td>
                        <td>RO2</td>
                        <td>Ketua Unit</td>
                        <td><i class="fa fa-check"></td>
                        <td><i class="fa fa-check"></td>
                        <td><i class="fa fa-check"></td>
                        <td><i class="fa fa-check"></td>
                        <td></td>
                        <td></td>
                        <td></td>
                      </tr>
                      <tr>                      
                        <td>3</td>
                        <td>RO3</td>
                        <td>Bendahara Yayasan</td>
                        <td><i class="fa fa-check"></td>
                        <td><i class="fa fa-check"></td>
                        <td><i class="fa fa-check"></td>
                        <td><i class="fa fa-check"></td>
                        <td></td>
                        <td></td>
                        <td></td>
                      </tr>
                      <tr>                      
                        <td>4</td>
                        <td>RO4</td>
                        <td>Bendahara Unit</td>
                        <td><i class="fa fa-check"></td>
                        <td><i class="fa fa-check"></td>
                        <td><i class="fa fa-check"></td>
                        <td><i class="fa fa-check"></td>
                        <td></td>
                        <td></td>
                        <td></td>
                      </tr>                   
                      <tr>                      
                        <td>5</td>
                        <td>RO5</td>
                        <td>Kasir Yayasan</td>
                        <td><i class="fa fa-check"></td>
                        <td><i class="fa fa-check"></td>
                        <td><i class="fa fa-check"></td>
                        <td><i class="fa fa-check"></td>
                        <td></td>
                        <td></td>
                        <td></td>
                      </tr>                   
                      <tr>                      
                        <td>6</td>
                        <td>RO6</td>
                        <td>Kasir Unit</td>
                        <td><i class="fa fa-check"></td>
                        <td><i class="fa fa-check"></td>
                        <td><i class="fa fa-check"></td>
                        <td><i class="fa fa-check"></td>
                        <td></td>
                        <td></td>
                        <td></td>
                      </tr>                   
                      <tr>                      
                        <td>7</td>
                        <td>RO7</td>
                        <td>Admin Yayasan</td>
                        <td><i class="fa fa-check"></td>
                        <td><i class="fa fa-check"></td>
                        <td><i class="fa fa-check"></td>
                        <td><i class="fa fa-check"></td>
                        <td></td>
                        <td></td>
                        <td></td>
                      </tr>
                      <tr>                      
                        <td>8</td>
                        <td>RO8</td>
                        <td>Admin Unit</td>
                        <td><i class="fa fa-check"></td>
                        <td><i class="fa fa-check"></td>
                        <td><i class="fa fa-check"></td>
                        <td><i class="fa fa-check"></td>
                        <td></td>
                        <td></td>
                        <td></td>
                      </tr>                                      
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>  
  </div>  
</form>