<?php
	
	//data kolom yang akan di tampilkan
	$aColumns = array( 'id_user', 'nama', 'email', 'id_telegram', 'lvl', 'divisi', 'flag');
	
	//primary key
	$sIndexColumn = "id_user";
	
	//nama table database
	$sTable = "m_user";

	//custom by col
	$csWhere['conf'] = "";

	//informasi koneksi ke database
	include ('conn.php');
	include ('ssp.php');
?>