 <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url();?>berkas/img/user.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $this->session->nama?></p>
          <a href="#"><?php echo $this->session->email?></a>
        </div>
      </div>

      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">Menu Utama</li>
        <li class="#">
          <a href="<?php echo base_url('dashboard');?>">
            <i class="fa fa-home"></i> <span>Beranda</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
        
        <li class="#">
          <a href="#">
            <i class="fa fa-database"></i>
            <span>Data Master</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('data_master/jenjang_pendidikan');?>"><i class="fa fa-circle-o"></i> Jenjang Pendidikan </a></li>
            <li><a href="<?php echo base_url('data_master/jenis_tarif');?>"><i class="fa fa-circle-o"></i> Jenis Tarif </a></li>
            <li><a href="<?php echo base_url('data_master/jenis_keringanan');?>"><i class="fa fa-circle-o"></i> Jenis Keringanan </a></li>
            <li><a href="<?php echo base_url('data_master/gelombang_pend');?>"><i class="fa fa-circle-o"></i> Gelombang </a></li>
            <li><a href="<?php echo base_url('data_master/tahun_ajaran');?>"><i class="fa fa-circle-o"></i> Tahun Ajaran </a></li>
            <li><a href="<?php echo base_url('data_master/jurusan');?>"><i class="fa fa-circle-o"></i> Jurusan </a></li>
            <li><a href="<?php echo base_url('data_master/jenis_sosmed');?>"><i class="fa fa-circle-o"></i> Jenis Sosmed </a></li>
            <li><a href="<?php echo base_url('data_master/siswa_status');?>"><i class="fa fa-circle-o"></i> Siswa Status </a></li>
            <!-- <li><a href="<?php echo base_url('data_master/user_manage');?>"><i class="fa fa-circle-o"></i> User Management </a></li> -->
          </ul>
        </li>
      </ul>

      <ul class="sidebar-menu">
        <li class="header">Pengolahan</li>        
        <li class="#">
          <a href="#">
            <i class="fa fa-graduation-cap"></i>
            <span>Pengolahan Siswa</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="#">
              <a href="#"><i class="fa fa-circle-o"></i> PSB
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu" style="display: none;">
                <li><a href="<?php echo base_url('pengolahan_siswa/cari_calon_siswa');?>"><i class="fa fa-circle-o"></i> Cari Calon Siswa</a></li>
                <li><a href="#"><i class="fa fa-circle-o"></i> List Siswa</a></li>
              </ul>
            </li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Penempatan Kelas</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Cari Siswa</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Histori Siswa</a></li>
          </ul>
        </li>
      </ul>

      <ul class="sidebar-menu">
        <li class="header">Transaksi</li>        
        <li class="#">
          <a href="#">
            <i class="fa fa-money"></i>
            <span>Transaksi</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('transaksi/transaksi_psb')?>"><i class="fa fa-circle-o"></i> PSB</a></li>
            <li><a href="<?php echo base_url('transaksi/transaksi_spp_bln')?>"><i class="fa fa-circle-o"></i> SPP Bulanan</a></li>
            <li><a href="javascript:;"><i class="fa fa-circle-o"></i> SPP Tahunan</a></li>
            <li><a href="javascript:;"><i class="fa fa-circle-o"></i> Cicilan Unit</a></li>
          </ul>
        </li>
      </ul>

      
    </section>
    <!-- /.sidebar -->
  </aside>