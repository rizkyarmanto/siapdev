<?php if(!defined('BASEPATH')) exit('No direct script allowed');

class M_global extends CI_Model{

	function list_select($paramTable) {
		$this->db->where('aktif', 1);
		return $this->db->get($paramTable);
	}
	
	function list_select2($paramTable, $paramColumn, $search) {
		$this->db->like($paramColumn, $search);
		$this->db->limit('20');
		return $this->db->get($paramTable);
	}

	function list_select3($paramTable) {
		return $this->db->get($paramTable);
	}	

	function list_select4($paramTable, $paramColumn, $paramId) {
		$this->db->where($paramColumn.' !=', $paramId);
		return $this->db->get($paramTable);
	}

	function list_select5($paramTable, $paramColumn, $paramId) {
		$this->db->where($paramColumn, $paramId);
		return $this->db->get($paramTable);
	}

	function list_select6($paramTable, $paramColumn) {
		$sql 	= $this->db->query("
			SELECT DISTINCT $paramColumn
			FROM $paramTable");
		return $sql;
	}

	function list_select7($paramTable, $paramColumn, $paramId, $paramGet) {
		$this->db->select($paramGet);
		$this->db->where($paramColumn, $paramId);
		return $this->db->get($paramTable);
	}	

	function list_select8($paramTable, $id_sekolah) {
		$this->db->where('aktif', 1);
		$this->db->where('id_sekolah', $id_sekolah);
		return $this->db->get($paramTable);
	}
}