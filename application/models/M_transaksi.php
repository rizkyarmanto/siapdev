<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_transaksi extends CI_Model {

	/**** PSB ****/
	function get_tipe_transaksi_w($where) {
		$this->db->where($where);
		return $this->db->get('m_tipe_transaksi_tbl');
	}

	function get_ta_w($where) {
		$this->db->where($where);
		return $this->db->get('m_ta_tbl');
	}

	function get_gelombang_w($where) {
		$this->db->where($where);
		return $this->db->get('m_gelombang_tbl');
	}

	function get_jenjang_w($where) {
		$this->db->where($where);
		return $this->db->get('m_jenjang_tbl');
	}

	function get_jenis_sosmed_w($where) {
		$this->db->where($where);
		return $this->db->get('m_jenis_sosmed_tbl');
	}

	function get_jurusan() {
		return $this->db->get('m_jurusan_tbl');
	}

	function get_jurusan_w($where) {
		$this->db->where($where);
		return $this->db->get('m_jurusan_tbl');
	}
	
	function get_tarif_nilai_w($where) {
		$this->db->where($where);
		return $this->db->get('v_tarif_nilai_tbl');
	}

	function get_keringanan_nilai_w($where) {
		$this->db->where($where);
		return $this->db->get('v_keringanan_nilai_tbl');
	}

	function get_v_siswa($where) {
		$this->db->where($where);
		return $this->db->get('v_siswa_tbl');
	}

	function get_t_siswa_kelas($where) {
		$this->db->where($where);
		return $this->db->get('v_siswa_kelas_tbl');
	}

	function get_nofor_by_id_jenjang($id_jenjang) {
		return $this->db->query("SELECT * 
								 FROM j_no_formulir_tbl 
									WHERE aktif = 1 
									AND id_jenjang = $id_jenjang 
								 ORDER BY no_formulir DESC LIMIT 1");
	}

	function get_nofor_by_nofor($no_formulir) {
		return $this->db->query("SELECT * 
									FROM j_no_formulir_tbl 
									WHERE aktif = 1 
									AND no_formulir = \"$no_formulir\" ");
	}

	function get_v_pembayaran($where) {
		$this->db->where($where);
		$this->db->order_by('id_pembayaran', 'asc');
		return $this->db->get('v_pembayaran_tbl');
	}

	function get_v_pembayaran_detail($where) {
		$this->db->where($where);
		$this->db->order_by('id_pembayaran_detail', 'asc');
		return $this->db->get('v_pembayaran_detail_tbl');
	}

	function get_v_pembayaran_detail_sum($id_ta, $id_jenjang, $id_jurusan, $tingkat, $id_tarif_nilai) {
		$query = "SELECT
		tar.nama_tarif AS `nama_tarif`,
		tarnil.id_tarif_nilai AS `id_tarif_nilai`,
		tarnil.nom_total AS `nom_total`,

		IF(vkerit.jenis_keringanan = \"potongan harga\",(tarnil.nom_total - vkerit.nominal),
				tarnil.nom_total) as `nom_total_new`,

		tarnil.nom_cil AS `nom_cil`,
		tarnil.jml_cil AS `jml_cil`,
		tarnil.nom_cil AS `nom_cil`,
		tarnil.id_ta AS `id_ta`,
		tarnil.id_ta AS `tingkat`,
		tarnil.id_jenjang AS `id_jenjang`,
		tarnil.id_jurusan AS `id_jurusan`,
		tarnil.aktif AS `aktif`,

		vsum.*,
		vkerit.id_keringanan_nilai,
		vkerit.jenis_keringanan,
		vkerit.nominal AS `nominal_keringanan`,
		vkerit.keringanan,

		IF(vkerit.jenis_keringanan = \"potongan harga\", (tarnil.nom_total - vkerit.nominal) - vsum.nominal_bayar, 
		tarnil.nom_total)  AS `nominal_sisa`
		
	FROM 
		m_tarif_nilai_tbl tarnil 

	LEFT JOIN m_tarif_tbl tar
		ON tar.id_tarif = tarnil.id_tarif
	
	LEFT JOIN 
		(SELECT
		pem.id_siswa,
		pem.id_tipe_transaksi,
		dpem.id_tarif_nilai,
		sum(dpem.nominal) AS `nominal_bayar`
		FROM t_pembayaran_detail_tbl dpem 
		LEFT JOIN t_pembayaran_tbl pem ON pem.id_pembayaran = dpem.id_pembayaran 
		GROUP BY pem.id_siswa, dpem.id_tarif_nilai) vsum 
		
		ON vsum.id_tarif_nilai = tarnil.id_tarif_nilai
	
	LEFT JOIN v_keringanan_item_tbl vkerit  
		ON vkerit.id_tarif_nilai = vsum.id_tarif_nilai 
		AND vkerit.id_siswa = vsum.id_siswa";

		/*
		if($id_siswa != 0) {
			$where = " WHERE vsum.id_siswa = $id_siswa";	
		}
		*/
		$where = " where tarnil.id_ta=$id_ta and tarnil.id_jenjang=$id_jenjang and tarnil.id_jurusan=$id_jurusan and tarnil.tingkat=$tingkat and vkerit.keringanan='Anak Guru' ";

		if($id_tarif_nilai != 0) {
			$where .= " AND vsum.id_tarif_nilai = $id_tarif_nilai";
		}

		return $this->db->query($query.$where);
	}

	function get_v_pembayaran_detail2_sum($id_siswa, $id_tarif_nilai) {
		$query = "SELECT
		tar.nama_tarif AS `nama_tarif`,
		tarnil.id_tarif_nilai AS `id_tarif_nilai`,
		tarnil.nom_total AS `nom_total`,

		IF(vkerit.jenis_keringanan = \"potongan harga\",(tarnil.nom_total - vkerit.nominal),
				tarnil.nom_total) as `nom_total_new`,

		tarnil.nom_cil AS `nom_cil`,
		tarnil.jml_cil AS `jml_cil`,
		tarnil.nom_cil AS `nom_cil`,
		tarnil.id_ta AS `id_ta`,
		tarnil.id_ta AS `tingkat`,
		tarnil.id_jenjang AS `id_jenjang`,
		tarnil.id_jurusan AS `id_jurusan`,
		tarnil.aktif AS `aktif`,

		vsum.*, 
		vkerit.id_keringanan_nilai,
		vkerit.jenis_keringanan,
		vkerit.nominal AS `nominal_keringanan`,
		vkerit.keringanan, 
		CASE 
			WHEN vkerit.jenis_keringanan=\"potongan harga\" THEN (tarnil.nom_total - vkerit.nominal) - vsum.nominal_bayar 
			WHEN vkerit.nominal IS NULL THEN (tarnil.nom_total - 0) - vsum.nominal_bayar
		END 
		AS nominal_sisa  
		
	FROM 
		m_tarif_nilai_tbl tarnil 

	LEFT JOIN m_tarif_tbl tar
		ON tar.id_tarif = tarnil.id_tarif
	
	LEFT JOIN 
		(SELECT
		pem.id_siswa,
		pem.id_tipe_transaksi,
		dpem.id_tarif_nilai,
		sum(dpem.nominal) AS `nominal_bayar`
		FROM t_pembayaran_detail_tbl dpem 
		LEFT JOIN t_pembayaran_tbl pem ON pem.id_pembayaran = dpem.id_pembayaran 
		GROUP BY pem.id_siswa, dpem.id_tarif_nilai) vsum 
		
		ON vsum.id_tarif_nilai = tarnil.id_tarif_nilai
	
	LEFT JOIN v_keringanan_item2_tbl vkerit  
		ON vkerit.id_tarif_nilai = vsum.id_tarif_nilai 
		AND vkerit.id_siswa = vsum.id_siswa";

		if($id_siswa != 0) {
			$where = " WHERE vsum.id_siswa = $id_siswa";	
		}

		if($id_tarif_nilai != 0) {
			$where .= " AND vsum.id_tarif_nilai = $id_tarif_nilai";
		}

		return $this->db->query($query.$where);
	}

	function get_v_keringanan_item($where) {
		$this->db->where($where);
		$this->db->order_by('id_keringanan_item', 'asc');
		return $this->db->get('v_keringanan_item_tbl');
	}

	function get_v_keringanan_item2($where) {
		$this->db->where($where);
		$this->db->order_by('id_keringanan_item', 'asc');
		return $this->db->get('v_keringanan_item2_tbl');
	}

	function insert_data_siswa($d) {
		$this->db->insert('m_siswa_tbl', $d);
	}

	function insert_data_siswa_sosmed($d) {
		$this->db->insert_batch('m_siswa_sosmed_tbl', $d);
	}

	function insert_no_formulir($d) {
		$this->db->insert('j_no_formulir_tbl', $d);
	}
		
	function insert_data_pembayaran($d) {
		$this->db->insert('t_pembayaran_tbl', $d);
	}

	function insert_data_pembayaran_detail($d) {
		$this->db->insert_batch('t_pembayaran_detail_tbl', $d);
	}

	function insert_data_siswa_keringanan($d) {
		$this->db->insert('j_siswa_keringanan2_tbl', $d);
	}

	function insert_data_keringanan_item($d) {
		$this->db->insert('t_keringanan_item2_tbl', $d);
	}

	function insert_data_siswa_histori($d) {
		$this->db->insert('t_siswa_histori_tbl', $d);
	}

	function insert_data_siswa_psb($data_siswa) {
		$this->db->insert('t_psb', $data_siswa);
	}

	
	function get_siswa_by_nofor($no_formulir, $thn) {
		$this->db->where('no_formulir', $no_formulir);
		$this->db->where('tahun', $thn);
		$this->db->where('status', 1);
		return $this->db->get('v_psb');
	}

	function cek_pambayaran($id_tarnil, $id_siswa){
		 $this->db->where("id_tarif_nilai", $id_tarnil);
		 $this->db->where("id_siswa", $id_siswa);
		return $this->db->get('t_pembayaran_detail_tbl');
	}

	function insert_data_pembatalan($d) {
		$this->db->insert('t_batal_psb', $d);
	}

	function update_sts_psb($id_siswa){
		$this->db->where('id_psb', $id_siswa);
		$this->db->set('status', 0);
		$this->db->update('t_psb');
	}

	function delPembayaran($id_tipe_transaksi, $id_siswa){
		$this->db->where('id_tipe_transaksi', $id_tipe_transaksi);
		$this->db->where('id_siswa', $id_siswa);
		$this->db->delete('t_pembayaran_tbl');
	}

	function delPembayaranDetail($id_tarnil, $id_siswa){
		$this->db->where('id_tarif_nilai', $id_tarnil);
		$this->db->where('id_siswa', $id_siswa);
		$this->db->delete('t_pembayaran_detail_tbl');
	}


	function get_tingkat($whr) {
		$this->db->where($whr);
		return $this->db->get('m_tingkat_tbl');
	}

	function get_kuitansi_spp($id_pembayaran){
		$this->db->select('a.nama_tarif, a.nominal, b.nama, b.nis, b.tingkat,b.urutan_kelas');
		$this->db->where('id_pembayaran', $id_pembayaran);
		$this->db->join('v_siswa_tbl b', 'a.id_siswa=b.id_siswa');
		return $this->db->get('v_pembayaran_detail_tbl a');
	}

	function get_ta_whr($where) {
		$this->db->where($where);
		return $this->db->get('m_ta_tbl');
	}

	function get_psb_daftar($no_formulir){
		$this->db->where('no_formulir', $no_formulir);
		$this->db->order_by('no_formulir', 'ASC');
		return $this->db->get('v_psb');
	}

	function get_keringanan($d) {
		$this->db->where('id_sekolah', $d);
		return $this->db->get('m_keringanan_tbl');
	}

	function get_data_nilai_harian($where, $id_mapel){
		$this->db->select('a.id_siswa, a.id_ta, a.id_jenjang, a.id_jurusan, a.tingkat, a.urutan_kelas, a.nama, b.*');
		$this->db->where($where);
		$this->db->where('id_mapel', $id_mapel);
		$this->db->join('t_nilai_harian b', 'b.id_siswa=a.id_siswa');
		return $this->db->get('v_siswa_tbl a');
	}

	function get_mapel_w($where) {
		$this->db->where($where);
		return $this->db->get('m_mapel');
	}

	function insert_nilai_harian($d) {
		$this->db->insert_batch('t_nilai_harian', $d);
	}

	function update_nilai_harian($data)
	{
		$this->db->update_batch('t_nilai_harian', $data, 'id_nilai');
	}

	function insert_data_nilai($d) {
		$this->db->insert_batch('t_nilai_uts', $d);
	}

	function get_data_nilai_uts($where, $id_mapel){
		$this->db->select('a.id_siswa, a.id_ta, a.id_jenjang, a.id_jurusan, a.tingkat, a.urutan_kelas, a.nama, b.*');
		$this->db->where($where);
		$this->db->where('id_mapel', $id_mapel);
		$this->db->join('t_nilai_uts b', 'b.id_siswa=a.id_siswa');
		return $this->db->get('v_siswa_tbl a');
	}

	function update_nilai_uts($data)
	{
		$this->db->update_batch('t_nilai_uts', $data, 'id_nilai');
	}

	function get_data_nilai_uas($where, $id_mapel){
		$this->db->select('a.id_siswa, a.id_ta, a.id_jenjang, a.id_jurusan, a.tingkat, a.urutan_kelas, a.nama, b.*');
		$this->db->where($where);
		$this->db->where('id_mapel', $id_mapel);
		$this->db->join('t_nilai_uas b', 'b.id_siswa=a.id_siswa');
		return $this->db->get('v_siswa_tbl a');
	}

	function insert_nilai_uas($d) {
		$this->db->insert_batch('t_nilai_uas', $d);
	}

	function update_nilai_uas($data)
	{
		$this->db->update_batch('t_nilai_uas', $data, 'id_nilai');
	}

	function get_kuitansi_psb($siswa, $id_pembayaran){
		$this->db->select('id_pembayaran_detail, id_siswa, teks_ta, nama_tarif, nominal');
		$this->db->where('id_siswa', $siswa);
		$this->db->where('id_pembayaran', $id_pembayaran);
		return $this->db->get('v_pembayaran_detail_tbl');
	}

	function get_idTarnil($where) {
		$this->db->where($where);
		$this->db->order_by('id_tarif_nilai', 'asc');
		return $this->db->get('m_tarif_nilai_tbl');
	}

	function get_sum_siswa_keringanan2($id_siswa) {
		$this->db->where('id_siswa', $id_siswa);
		return $this->db->get('j_siswa_keringanan2_tbl');
	}

	function cek_sum_siswa_keringanan2($id_siswa, $id_keringanan_nilai) {
		$this->db->where('id_siswa', $id_siswa);
		$this->db->where('id_keringanan_nilai', $id_keringanan_nilai);
		return $this->db->get('j_siswa_keringanan2_tbl');
	}

	function getJFormulir($id_siswa) {
		$this->db->where('id_siswa', $id_siswa);
		$this->db->order_by('id_siswa', 'asc');
		return $this->db->get('j_no_formulir_tbl');
	}

	function getRekapNilai($whr){
		$this->db->where($whr);
		return $this->db->get('v_rekap_nilai');
	}
	
}