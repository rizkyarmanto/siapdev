<?php 
include "head.php";
	

	// User
	if($page == 'menu') {
		$this->load->view('dashboard/index');
	}

	// Data Master
	elseif($page == 'dm_jenjang_pendidikan') {
		$this->load->view('data_master/jenjang_pendidikan');
	}		
	elseif($page == 'dm_jenis_sos_med') {
		$this->load->view('data_master/jenis_sos_med');
	}		
	elseif($page == 'dm_jenis_tarif') {
		$this->load->view('data_master/jenis_tarif');
	}
	elseif($page == 'dm_jenis_keringanan') {
		$this->load->view('data_master/jenis_keringanan');
	}
	elseif($page == 'dm_gelombang_pend') {
		$this->load->view('data_master/gelombang_pend');
	}
	elseif($page == 'dm_tahun_ajaran') {
		$this->load->view('data_master/tahun_ajaran');
	}
	elseif($page == 'dm_status_siswa') {
		$this->load->view('data_master/status_siswa');
	}
	elseif($page == 'dm_jurusan') {
		$this->load->view('data_master/jurusan');
	}		
	elseif($page == 'dm_user_manage') {
		$this->load->view('data_master/user_manage');
	}
	elseif($page == 'dm_siswa') {
		$this->load->view('data_master/siswa');
	}	
	elseif($page == 'dm_no_formulir') {
		$this->load->view('data_master/no_formulir_psb');
	}

	elseif($page == 'sekolah') {
		$this->load->view('data_master/sekolah');
	}

	elseif($page == 'strategi') {
		$this->load->view('data_master/strategi');
	}

	elseif($page == 'identitas') {
		$this->load->view('data_master/identitas');
	}

	elseif($page == 'mapel') {
		$this->load->view('data_master/mapel');
	}

	elseif($page == 'rubrik') {
		$this->load->view('data_master/rubrik');
	}

	elseif($page == 'nilai_rubrik') {
		$this->load->view('data_master/nilai_rubrik');
	}

	elseif($page == 'nilai_rubrik') {
		$this->load->view('data_master/nilai_rubrik');
	}

	elseif($page == 'guru') {
		$this->load->view('data_master/guru');
	}

	elseif($page == 'dm_tingkat') {
		$this->load->view('data_master/tingkat');
	}
	// User
 	elseif($page == 'us_roles') {
		$this->load->view('user/user_roles');
	}

	elseif($page == 'gen_nis') {
		$this->load->view('pengolahan_siswa/gen_nis');
	}

	elseif($page == 'penenpatan_kls') {
		$this->load->view('pengolahan_siswa/penenpatan_kls');
	}

	elseif($page == 'penempatan_kenaikan_kls') {
		$this->load->view('pengolahan_siswa/penempatan_kenaikan_kls');
	}

	elseif($page == 'absensi_siswa') {
		$this->load->view('pengolahan_siswa/absensi_siswa');
	}

	elseif($page == 'profil_siswa') {
		$this->load->view('pengolahan_siswa/profil_siswa');
	}

	elseif($page == 'detail_profil_siswa') {
		$this->load->view('pengolahan_siswa/detail_profil_siswa');
	}

	elseif($page == 'data_kelas') {
		$this->load->view('kbm/data_kls');
	}

	elseif($page == 'input_data_kelas') {
		$this->load->view('kbm/input_data_kls');
	}

	elseif($page == 'guru_mapel') {
		$this->load->view('kbm/guru_mapel');
	}

	elseif($page == 'input_guru_mapel') {
		$this->load->view('kbm/input_guru_mapel');
	}

	elseif($page == 'input_walikelas') {
		$this->load->view('kbm/input_walikelas');
	}

	elseif($page == 'walikelas') {
		$this->load->view('kbm/walikelas');
	}

	elseif($page == 'mapel_tingkat') {
		$this->load->view('kbm/mapel_tingkat');
	}

	elseif($page == 'jadwal_pelajaran') {
		$this->load->view('kbm/jadwal_pelajaran');
	}

	elseif($page == 'penempatan_kelas_baru') {
		$this->load->view('pengolahan_siswa/penempatan_kls_baru');
	}

	elseif($page == 'catatan_siswa') {
		$this->load->view('pengolahan_siswa/catatan_siswa');
	}

	elseif($page == 'kelulusan') {
		$this->load->view('pengolahan_siswa/kelulusan');
	}

	elseif($page == 'mutasi_keluar') {
		$this->load->view('pengolahan_siswa/mutasi_keluar');
	}

	elseif($page == 'mutasi_masuk') {
		$this->load->view('pengolahan_siswa/mutasi_masuk');
	}

	// Transaksi
	 elseif($page == 't_psb') {
		$this->load->view('transaksi/t_psb');
	} elseif($page == 't_psb_btl') {
		$this->load->view('transaksi/t_psb_btl');
	} elseif($page == 't_psb_formulir') {
		$this->load->view('transaksi/t_psb_formulir');
	} elseif($page == 't_spp_bln') {
		$this->load->view('transaksi/t_spp_bln');
	} elseif($page == 't_cu') {
		$this->load->view('transaksi/t_cu');
	} elseif($page == 't_du') {
		$this->load->view('transaksi/t_du');
	} elseif($page == 't_ck') {
		$this->load->view('transaksi/t_ck');
	} 

	// Pengolahan Siswa
	elseif($page == 'ps_cari_siswa') {
		$this->load->view('cari_siswa');		
	}	
	elseif($page == 'ps_penm_kelas') {
		$this->load->view('penempatan_kelas');		
	}

	// PSB
	elseif($page == 'psb_pendaftaran') {
		$this->load->view('psb/psb_pendaftaran');
	} elseif($page == 'psb_pembayaran') {
		$this->load->view('psb/psb_pembayaran');
	} elseif($page == 'psb_pelunasan') {
		$this->load->view('psb/psb_pelunasan');
	} elseif($page == 'psb_pembatalan') {
		$this->load->view('psb/psb_pembatalan');
	} elseif($page == 't_cu') {
		$this->load->view('transaksi/t_cu');
	} 
	elseif($page == 'list_psb') {
		$this->load->view('psb/psb_list');
	}
	elseif($page == 'kuitansi_psb') {
		$this->load->view('psb/kuitansi_pdf');
	}
	
	elseif($page == 'manage_user') {
		$this->load->view('usermanagement/manage_user');
	} 

	elseif($page == 'manage_role') {
		$this->load->view('usermanagement/manage_role');
	} 

	elseif($page == 'hak_akses') {
		$this->load->view('usermanagement/hak_akses');
	}

	elseif($page == 'atur_akses') {
		$this->load->view('usermanagement/atur_akses');
	}

	// Laporan
	elseif($page == 'laporan_psb'){
		$this->load->view('laporan/pendaftaran_psb');
	}

	// Laporan
	elseif($page == 'laporanPSB'){
		$this->load->view('laporan/laporan_psb');
	}
	// Nilai
	elseif($page == 'nilai_uts'){
		$this->load->view('nilai/t_nilai_utss');
	} elseif($page == 'nilai_view'){
		$this->load->view('nilai/t_nilai_view');
	}elseif($page == 'nilai_harian'){
		$this->load->view('nilai/t_nilai_harian');
	}elseif($page == 'nilai_uas'){
		$this->load->view('nilai/t_nilai_uas');
	}elseif($page == 'rekap_nilai'){
		$this->load->view('nilai/rekap_nilai');
	}
	

include "footer.php";
?>
