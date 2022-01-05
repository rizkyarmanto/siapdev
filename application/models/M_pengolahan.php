<?php if(!defined('BASEPATH')) exit('No direct script allowed');

class M_pengolahan extends CI_Model{

	function detail_siswa($paramColumn, $paramId) {
		$this->db->where($paramColumn, $paramId);
		return $this->db->get('v_siswa_tbl');
	}

	function detail_siswa_mutasi($id_siswa) {
		$this->db->where('aktif', 1);
		$this->db->where('id_siswa', $id_siswa);
		return $this->db->get('v_siswa_klshis_tbl');
	}

	function list_siswa_riwayat($id_siswa) {
		$this->db->where('id_siswa', $id_siswa);
		return $this->db->get('v_siswa_klshis_tbl');
	}

	function list_select7($paramTable, $paramColumn, $paramId, $paramGet) {
		$this->db->select($paramGet);
		$this->db->where($paramColumn, $paramId);
		return $this->db->get($paramTable);
	}	

	function tarif_nilai($condition) {
		$this->db->select('
							id_tarif_nilai,
							nom_total
						');
		foreach ($condition as $cd) {
			$this->db->where($cd);
		}
		return $this->db->get('v_tarif_nilai_tbl');
	}

	function keringanan_nilai($condition,$id_tarif_nilai) {
		$this->db->select('
							id_tarif_nilai,
							jenis_keringanan,
							nominal
						');
		foreach ($condition as $cd) {
			$this->db->where($cd);
		}
		$this->db->where('id_tarif_nilai', $id_tarif_nilai);
		return $this->db->get('v_keringanan_item_tbl');
	}

	function pembayaran_nilai($condition,$id_tarif_nilai) {
		$this->db->select('
							id_tarif_nilai,
							sum(nominal) as nominal_pbr
						');
		foreach ($condition as $cd) {
			$this->db->where($cd);
		}
		$this->db->where('id_tarif_nilai', $id_tarif_nilai);
		$this->db->group_by('id_tarif_nilai');
		return $this->db->get('v_pembayaran_detail_tbl');
	}


	function get_sosmed($paramColumn, $paramId, $paramGet) {
		$this->db->select($paramGet);
		$this->db->where($paramColumn, $paramId);
		$this->db->from('m_siswa_sosmed_tbl sissos');
		$this->db->join('m_jenis_sosmed_tbl jensos', 'sissos.id_jenis_sosmed=jensos.id_jenis_sosmed', 'right');
		return $this->db->get();
	}

	private function _get_datatables_query($table, $column_order, $column_search, $order, $condition=null) {

		if ($condition) {
			foreach ($condition as $ci) {
				$this->db->$ci[2]($ci[0], $ci[1]);
			}
		}

		$this->db->from($table);

		$i = 0;
		foreach ($column_search as $item) {
			if($_POST['search']['value']) {
				if($i===0) {
					$this->db->group_start();
					$this->db->like($item, $_POST['search']['value']);
				} else {
					$this->db->or_like($item, $_POST['search']['value']);
				}
				if(count($column_search) - 1 == $i)
					$this->db->group_end();
			}
			$i++;
		}
		
		if(isset($_POST['order'])) {
			$this->db->order_by($column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} else if(isset($order)) {
			$order = $order;
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}

	function get_datatables($table, $column_order, $column_search, $order, $condition=null) {
		$this->_get_datatables_query($table, $column_order, $column_search, $order, $condition);
		if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result();
	}

	function count_filtered($table, $column_order, $column_search, $order, $condition=null) {
		$this->_get_datatables_query($table, $column_order, $column_search, $order, $condition);
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all($table, $condition=null) {
		if ($condition) {
			foreach ($condition as $ci) {
				$this->db->$ci[2]($ci[0], $ci[1]);
			}
		}
		$this->db->from($table);
		return $this->db->count_all_results();
	}

	public function teser($condition=null) {
		if ($condition) {
			foreach ($condition as $ci) {
				$this->db->$ci[2]($ci[0], $ci[1]);
			}
		}
		return $this->db->get_compiled_select('v_siswa_tbl');
	}
}