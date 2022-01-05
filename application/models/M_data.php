<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_data extends CI_Model {
	private function _get_datatables_query($table, $column_order, $column_search, $order, $second_id=null) {

		if ($second_id != null) {
			foreach ($second_id as $si) {
				$this->db->where($si[0], $si[1]);
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

	function get_datatables($table, $column_order, $column_search, $order, $second_id=null) {
		$this->_get_datatables_query($table, $column_order, $column_search, $order, $second_id);
		if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result();
	}

	function count_filtered($table, $column_order, $column_search, $order, $second_id=null) {
		$this->_get_datatables_query($table, $column_order, $column_search, $order, $second_id);
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all($table, $second_id=null) {
		if ($second_id != null) {
			foreach ($second_id as $si) {
				$this->db->where($si[0], $si[1]);
			}
		}
		$this->db->from($table);
		return $this->db->count_all_results();
	}

	// Mine

	// function get_tarif_pivot() {
	// 	$table 		= 'v_tarif_tbl';
	// 	$header 	= "CREATE OR REPLACE VIEW ".$table." 
	// 					AS SELECT 
	// 						trf.id_tarif,
	// 						trf.nama_tarif,";
	// 	$body 		= "";
	// 		$jenjang 	= $this->db->get_where('m_jenjang_tbl', array('aktif' => 1))->result_array();
	// 		foreach ($jenjang as $je) {
	// 			$body 		.= "sum( if(trf.id_tarif=trn.id_tarif AND trn.id_jenjang=".$je['id_jenjang']." AND trn.aktif=1, 1, 0  ))  AS  ".$je['jenjang'].",";
	// 		}
	// 	$footer 	= "		tpt.tipe_transaksi
	// 					FROM
	// 						m_tarif trf
	// 					LEFT JOIN
	// 						m_tarif_nilai trn
	// 					ON
	// 						trf.id_tarif=trn.id_tarif
	// 					LEFT JOIN
	// 						m_tipe_transaksi tpt
	// 					ON 
	// 						trf.id_tipe_transaksi=tpt.id_tipe_transaksi
	// 					GROUP BY
	// 						trf.id_tarif";
	// 	$this->db->query($header.$body.$footer);
	// 	return $table;
	// }	

	function get_tarif_pivot() {
		$table 		= 'v_tarif_tbl';
		$header 	= "CREATE OR REPLACE VIEW ".$table." 
						AS SELECT 
							trf.id_tarif,
							trf.nama_tarif,";
		$body 		= "";
			$jenjang 	= $this->db->get_where('m_jenjang_tbl', array('aktif' => 1, 'id_sekolah' => $this->session->userdata('id_sekolah')))->result_array();
			foreach ($jenjang as $je) {
				$body 		.= "sum( if(trf.id_tarif=trn.id_tarif AND trn.id_jenjang=".$je['id_jenjang']." AND trn.aktif=1, 1, 0  ))  AS  ".$je['jenjang'].",";
			}
		$footer 	= "		tpt.tipe_transaksi
						FROM
							m_tarif_tbl trf
						LEFT JOIN
							m_tarif_nilai_tbl trn
						ON
							trf.id_tarif=trn.id_tarif
						LEFT JOIN
							m_tipe_transaksi_tbl tpt
						ON 
							trf.id_tipe_transaksi=tpt.id_tipe_transaksi
						GROUP BY
							trf.id_tarif";
		$this->db->query($header.$body.$footer);
		return $table;
	}	

	function get_keringanan_pivot() {
		$table 		= 'v_keringanan_tbl';
		$header 	= "CREATE OR REPLACE VIEW ".$table." 
						AS SELECT 
							krf.id_keringanan, krf.keringanan, krf.id_sekolah, ";
		$body 		= "";
			$jenjang 	= $this->db->get_where('m_jenjang_tbl', array('aktif' => 1, 'id_sekolah' => $this->session->userdata('id_sekolah')))->result_array();
			foreach ($jenjang as $je) {
				$body 		.= "sum( if(krf.id_keringanan=krn.id_keringanan AND krn.id_jenjang=".$je['id_jenjang']." AND krn.aktif=1, 1, 0  ))  AS  ".$je['jenjang'].",";
			}
		$footer 	= "	tpt.id_tipe_transaksi, tpt.tipe_transaksi
						FROM
							m_keringanan_tbl krf
						LEFT JOIN
							m_keringanan_nilai_tbl krn
						ON
							krf.id_keringanan=krn.id_keringanan
						LEFT JOIN
							m_tipe_transaksi_tbl tpt
						ON 
							krf.id_tipe_transaksi=tpt.id_tipe_transaksi
						GROUP BY
							krf.id_keringanan";
		$this->db->query($header.$body.$footer);
		return $table;
	}

	function get_master($paramTable, $paramColumn, $id) {
		$this->db->where($paramColumn, $id);
		return $this->db->get($paramTable)->row_array();
	}	

	function get_master_direct($paramTable, $paramColumn, $id, $select) {
		$this->db->select($select);
		$this->db->where($paramColumn, $id);
		return $this->db->get($paramTable)->row_array();
	}

	function insert_master($paramTable, $data) {
		$this->db->insert($paramTable, $data);
	}

	function update_master($paramTable, $paramColumn, $paramId, $data) {
		$this->db->where($paramColumn, $paramId);
		$this->db->update($paramTable, $data);
	}

	function update_master_advance($paramTable, $paramUpdate, $paramColumn, $paramId) {
		$get_update 	= $this->db->get_where($paramTable, array($paramColumn => $paramId))->row_array();
		foreach ($paramUpdate as $q) {
			$this->db->where($q, $get_update[$q]);
		}
		$this->db->update($paramTable, array('aktif' => 0));

		$this->db->where($paramColumn, $paramId);
		$this->db->update($paramTable, array('aktif' => 1));
	}

	function delete_master($paramTable, $paramColumn, $paramId) {
		$this->db->where($paramColumn, $paramId);
		$this->db->delete($paramTable);
	}

	function count_rows_nilai($paramTable, $paramColumn, $id) {
		$this->db->where($paramColumn, $id);
		return $this->db->get($paramTable)->num_rows();
	}

	function check_constraint($stat) {
		$this->db->query("SET FOREIGN_KEY_CHECKS =".$stat);
	}

	function get_no_formulir_awal($thn) {
		$this->db->where('tahun_ajaran', $thn);
		return $this->db->get('m_no_formulir');
	}
	/*
	function get_mulai_no_formulir($thn){
		$this->db->select('a.id_psb, a.no_urut_formulir, a.no_formulir, b.id_ta, b.tahun_mulai');
		$this->db->where('b.tahun_mulai', $thn);
		$this->db->join('m_ta_tbl b', 'a.id_ta=b.id_ta');
		$this->db->order_by('a.no_urut_formulir', 'desc');
		$this->db->limit(1);
		return $this->db->get('t_psb a');
	}
	*/

	function get_mulai_no_formulir($thn){
		$this->db->select('max(no_urut_formulir) as no_urut_formulir');
		$this->db->where('tahun', $thn);
		return $this->db->get('t_psb');
	}

	function get_all_psb($id_ta){
		$this->db->where('id_ta', $id_ta);
		return $this->db->get('v_psb');
	}
	
	function tampilMenuTree(){
		$this->db->distinct();
		$this->db->select('a.id_role, a.id_menu, b.nm_menu, 
			b.url_siap, b.url_porto, a.aktif as aktif1, b.aktif as aktif2, b.id_parent' );
		$this->db->from('m_role_menu a');
		$this->db->join('m_menu b' , 'a.id_menu = b.id_menu', 'LEFT');
		$this->db->group_by('id_menu');
		$query = $this->db->get();

		$menu = array(
			'menu' => array(),
			'parents' => array() 
			);

		foreach ($query->result() as $row ) {
			$menu['menus'][$row->id_menu] = $row;
			$menu['parents'][$row->id_parent][] = $row->id_menu;
		}
		// var_dump($menu);
		// die();

		if ($menu) {
			$result = $this->build_parent_menu(0, $menu);
			return $result;

		}else{
			return FALSE;
		}

	}


	function build_parent_menu($parent, $menu)
	{
		$html = "";

		if (isset($menu['parents'][$parent])) {
			
			$html .= '<ul class="collapsibleList">';

			foreach ($menu['parents'][$parent] as $itemId) 
			{
				
				if (!isset($menu['parents'][$itemId])) {
					
					$html .= '<li class = "">';
                    $html .= '<a class = "" >';
                    $html .= $menu['menus'][$itemId]->nm_menu.'</a>';
                    $html .= '&nbsp;&nbsp;&nbsp;<button type="button" data-id="'.$menu['menus'][$itemId]->id_menu.'"  data-action="edit" class="action btn btn-xs btn-icon waves-effect btn-success m-b-5 tooltip-hover tooltipstered" title="edit"> 
											<i class="fa fa-pencil"></i> 
										</button>';
                    $html .= '</li>';

				}

				if (isset($menu['parents'][$itemId])) {
					$html .= '<li class="">';
					$html .= '<a class="" >
							 '.$menu['menus'][$itemId]->nm_menu.'</a>';
					 $html .= '&nbsp;&nbsp;&nbsp;<button type="button" data-id="'.$menu['menus'][$itemId]->id_menu.'"  data-action="edit" class="action btn btn-xs btn-icon waves-effect btn-success m-b-5 tooltip-hover tooltipstered" title="edit"> 
											<i class="fa fa-pencil"></i> 
										</button>';
					$html .= $this->build_parent_menu($itemId, $menu);
					$html .= '</li>';
				}

			}

			$html .= '</ul>';
		}

		return $html;
	}


	public function getMenuByRole()
	{	
		$this->db->select('a.id_role, a.id_menu, b.nm_menu, 
			a.aktif as aktif1, b.aktif as aktif2, b.id_parent' );
		$this->db->from('m_role_menu a');
		$this->db->join('m_menu b' , 'a.id_menu = b.id_menu', 'LEFT');
		$this->db->where('id_role' , $this->uri->segment(3));
		
		$query = $this->db->get();


		$menu = array(
			'menu' => array(),
			'parents' => array() 
			);

		foreach ($query->result() as $row ) {
			
			$menu['menus'][$row->id_menu] = $row;

			$menu['parents'][$row->id_parent][] = $row->id_menu;

		}

		if ($menu) {
		
			$result = $this->build_parent_menu2(0, $menu);
		
			return $result;

		}	else{

			return FALSE;
		}

	}

	function build_parent_menu2($parent, $menu)
	{
		$html = "";

		if (isset($menu['parents'][$parent])) {
			
			$html .= '<ul class="collapsibleList" style="font-size:20px;">';

			foreach ($menu['parents'][$parent] as $itemId) 
			{
				
				if (!isset($menu['parents'][$itemId])) {
					
					$html .= '<li class = "">';
                    $html .= '<a class = "" >';
                    $html .= $menu['menus'][$itemId]->nm_menu.'</a>';

                     if ($menu['menus'][$itemId]->aktif1 == 1) {

                    	$html .= ' &nbsp;&nbsp;&nbsp;<input type="checkbox"  class="action" data-action="aktif" data-id_role="'.$menu['menus'][$itemId]->id_role.'" name="select_update[]"  checked data-id_menu="'.$menu['menus'][$itemId]->id_menu.'"> ';
                    	
                    }elseif($menu['menus'][$itemId]->aktif1 == 0){

                    	$html .= ' &nbsp;&nbsp;&nbsp;<input type="checkbox"  class="action" data-action="aktif" data-id_role="'.$menu['menus'][$itemId]->id_role.'" name="select_update[]" data-id_menu="'.$menu['menus'][$itemId]->id_menu.'"> ';
                    }
                   
                    $html .= '</li>';

				}

				if (isset($menu['parents'][$itemId])) {

					$html .= '<li class="">';
					$html .= '<a class="" >
							 '.$menu['menus'][$itemId]->nm_menu.'</a>';
					
					 if ($menu['menus'][$itemId]->aktif1 == 1) {

                    	$html .= ' &nbsp;&nbsp;&nbsp;<input type="checkbox"  class="action" data-action="aktif" data-id_role="'.$menu['menus'][$itemId]->id_role.'" name="select_update[]"  checked data-id_menu="'.$menu['menus'][$itemId]->id_menu.'"> ';

                    }elseif($menu['menus'][$itemId]->aktif1 == 0){

                    	$html .= ' &nbsp;&nbsp;&nbsp;<input type="checkbox"  class="action" data-action="aktif" data-id_role="'.$menu['menus'][$itemId]->id_role.'" name="select_update[]" data-id_menu="'.$menu['menus'][$itemId]->id_menu.'" > ';

                    }

					$html .= $this->build_parent_menu2($itemId, $menu);
					$html .= '</li>';
					
				}

			}

			$html .= '</ul>';
		}

		return $html;
	}

	function get_ta($id_ta) {
		$this->db->where('id_ta', $id_ta);
		return $this->db->get('m_ta_tbl');
	}

	function get_siswa_psb($id_siswa) {
		$this->db->where('id_psb', $id_siswa);
		return $this->db->get('t_psb');
	}

	function insert_siswa_keringanan($paramTable, $data) {
		$this->db->insert($paramTable, $data);
	}

	function insert_keringanan_item($paramTable, $data) {
		$this->db->insert($paramTable, $data);
	}

}

