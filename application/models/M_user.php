<?php if(!defined('BASEPATH')) exit('No direct script allowed');

class M_user extends CI_Model{

	function get_user($where) {
		return $this->db->get_where('v_user_role', $where);
	}

	function update_password($id_user, $data) {
		$this->db->where('id_user', $id_user);
		$this->db->update('m_user', $data);
	}
}