<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_core extends CI_Model {

	// Core
	function get_tbl($paramTable, $paramSelect, $condition) {
		$this->db->select($paramSelect);
		if ($condition) {
            foreach ($condition as $c) {
                if(is_array($c[1])) {
                    $this->db->$c[2]($c[1]);
                } else {
                    $this->db->$c[2]($c[0], $c[1]);
                }
            }
        }
        return $this->db->get($paramTable);
	}

    function update_tbl($paramTable, $data, $condition) {
        if ($condition) {
            foreach ($condition as $c) {
                $this->db->$c[2]($c[0], $c[1]);
            }
        }
        return $this->db->update($paramTable, $data);
    }

    function update_tbl_batch($paramTable, $data, $id) {
        $this->db->update_batch($paramTable, $data, $id);
    }   

    function insert_tbl_normal($paramTable, $data) {
        $this->db->insert($paramTable, $data);
    }

    function insert_tbl_batch($paramTable, $data) {
        $this->db->insert_batch($paramTable, $data);
    }

    function get_master_spec($paramTable, $paramSelect, $condition) {
        $this->db->select($paramSelect);
        if ($condition) {
            foreach ($condition as $c) {
                $this->db->$c[2]($c[0], $c[1]);
            }
        }
        return $this->db->get($paramTable);
    }

    function list_bootstrap_select($table, $value, $name, $Lcondition, $subject=null, $id=null) {
        $list_data 	= $this->M_admin->get_master_spec($table, $value.' ,'.$name, $Lcondition)->result_array();
        
        $option 	= '';
        $option 	.= '<option selected value="">'.$subject.'</option>';
		if ($id) {
			$condition 	= [];
			$condition[]= ['aktif', 1, 'where'];			
			$condition[]= [$value, $id, 'where'];		
			$ld 		= $this->M_admin->get_master_spec($table, $value.' ,'.$name, $condition)->row_array();
			$option 	.= '<option selected value="'.$ld[$value].'">'.$ld[$name].'</option>';
		}

		foreach ($list_data as $ld) {
			$option 	.= '<option value="'.$ld[$value].'">'.$ld[$name].'</option>';
		}

		if ($id) {
			// $option 	.= '</option>';
		}
        // var_dump($option);
        // exit();
		return $option;
    }

    function getListSelect($table, $rowCondition, $valueCondition, $value, $name, $subject){
        $Lcondition		= [];
        $Lcondition[]	= [$rowCondition, $valueCondition, 'where'];
        $data        	= $this->list_bootstrap_select($table, $value, $name, $Lcondition, $subject, $id=null);
        return $data;
    }

    
    function getListSelectDefNol($table, $rowCondition, $valueCondition, $value, $name, $subject){
        $Lcondition		= [];
        $Lcondition[]	= [$rowCondition, $valueCondition, 'where'];
        $data        	= $this->list_bootstrap_select_def_nol($table, $value, $name, $Lcondition, $subject, $id=null);
        return $data;
    }

    function getListSelectWhereIn($table, $rowCondition, $valueCondition, $value, $name, $subject){
        $Lcondition		= [];
        $Lcondition[]	= [$rowCondition, $valueCondition, 'where_in'];
        $data        	= $this->list_bootstrap_select_def_nol($table, $value, $name, $Lcondition, $subject, $id=null);
        return $data;
    }

    function list_bootstrap_select_def_nol($table, $value, $name, $Lcondition, $subject=null, $id=null) {
        $list_data 	= $this->M_admin->get_master_spec($table, $value.' ,'.$name, $Lcondition)->result_array();
        // var_dump($list_data);
        // exit();
        $option 	= '';
        if($subject != null){
            $option 	.= '<option selected value="0">'.$subject.'</option>';
        }
       
		if ($id) {
			$condition 	= [];
			$condition[]= ['aktif', 1, 'where'];			
			$condition[]= [$value, $id, 'where'];		
			$ld 		= $this->M_admin->get_master_spec($table, $value.' ,'.$name, $condition)->row_array();
			$option 	.= '<option selected value="'.$ld[$value].'">'.$ld[$name].'</option>';
		}

		foreach ($list_data as $ld) {
			$option 	.= '<option value="'.$ld[$value].'">'.$ld[$name].'</option>';
		}

		if ($id) {
			// $option 	.= '</option>';
		}
        // var_dump($option);
        // exit();
		return $option;
    }
    //'m_kabupaten_tbl', 'aktif', 1, 'id_kabupaten', $response['id_kabupaten'], 'id_kabupaten', 'nama_kabupaten', '-- Pilih Kabupaten --'
    function getSelectedOne($table, $rowCondition, $valueCondition, $rowComparison, $id_table, $value, $name, $subject){
        $Lcondition		= [];
        $Lcondition[]	= [$rowCondition, $valueCondition, 'where'];
        $Lcondition[] 	= [$rowComparison, $id_table, 'where'];
        $data        	= $this->bootstrap_selected($table, $value, $name, $Lcondition, $subject, $id_table);
        return $data;
    }

  

    function bootstrap_selected($table, $value, $name, $Lcondition, $subject=null, $id=null) {
        $list_data 	= $this->M_admin->get_master_spec($table, $value.' ,'.$name, $Lcondition)->row_array();

        $option 	= '';
        if($subject != null){
            $option 	.= '<option value="0">'.$subject.'</option>';
        }
       
		$option 	.= '<option  selected value="'.$list_data[$value].'">'.$list_data[$name].'</option>';
	
		return $option;
    }

   
    // $value	= 'symbol';
    // $name 	= 'description';
    // $subject = '-- Pilih Operator --';
    
    public function getListJenjangSelected($id_jenjang){
        $Lcondition		= [];
        $Lcondition[]	= ['aktif', 1, 'where'];
        $Lcondition[] 	= ['id_jenjang !=', $id_jenjang, 'where'];
        $value			= 'id_jenjang';
        $name 			= 'nm_jenjang';
        $test 			= '-- Pilih Jenjang --';
        $data        	= $this->list_bootstrap_select('m_jenjang', $value, $name, $Lcondition, $test, $id_jenjang);
        return $data;
    }

    public function getListPilihanSelected($id_pilihan){
        $Lcondition		= [];
        $Lcondition[]	= ['aktif', 1, 'where'];
        $Lcondition[] 	= ['id_pilihan !=', $id_pilihan, 'where'];
        $value			= 'id_pilihan';
        $name 			= 'pilihan';
        $subject 			= '-- Pilih --';
        $data        	= $this->list_bootstrap_select('m_pilihan', $value, $name, $Lcondition, $subject, $id_pilihan);
        return $data;
    }

    function getListSelected($table, $rowCondition, $valueCondition, $rowComparison, $id_table, $value, $name, $subject){
        $Lcondition		= [];
        $Lcondition[]	= [$rowCondition, $valueCondition, 'where'];
        $Lcondition[] 	= [$rowComparison.'!=', $id_table, 'where'];
        $data        	= $this->list_bootstrap_select($table, $value, $name, $Lcondition, $subject, $id_table);
        return $data;
    }

    function getListSelectedDefNol($table, $rowCondition, $valueCondition, $rowComparison, $id_table, $value, $name, $subject){
        $Lcondition		= [];
        $Lcondition[]	= [$rowCondition, $valueCondition, 'where'];
        $Lcondition[] 	= [$rowComparison.'!=', $id_table, 'where'];
        $data        	= $this->list_bootstrap_select_def_nol($table, $value, $name, $Lcondition, $subject, $id_table);
        return $data;
    }

    public function indonesian_date($timestamp = '', $date_format = 'j F Y', $suffix = '') {
		if (trim ($timestamp) == '') {
			// $timestamp = time ();
			$timestamp = '';
		} elseif (!ctype_digit ($timestamp)) {
			$timestamp = strtotime ($timestamp);
		}

		# remove S (st,nd,rd,th) there are no such things in indonesia :p
		$date_format = preg_replace ("/S/", "", $date_format);
		$pattern = [
			'/Mon[^day]/','/Tue[^sday]/','/Wed[^nesday]/','/Thu[^rsday]/',
			'/Fri[^day]/','/Sat[^urday]/','/Sun[^day]/','/Monday/','/Tuesday/',
			'/Wednesday/','/Thursday/','/Friday/','/Saturday/','/Sunday/',
			'/Jan[^uary]/','/Feb[^ruary]/','/Mar[^ch]/','/Apr[^il]/','/May/',
			'/Jun[^e]/','/Jul[^y]/','/Aug[^ust]/','/Sep[^tember]/','/Oct[^ober]/',
			'/Nov[^ember]/','/Dec[^ember]/','/January/','/February/','/March/',
			'/April/','/June/','/July/','/August/','/September/','/October/',
			'/November/','/December/',
		];
		$replace = [ 
			'Sen','Sel','Rab','Kam','Jum','Sab','Min',
			'Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu',
			'Jan','Feb','Mar','Apr','Mei','Jun','Jul','Ags','Sep','Okt','Nov','Des',
			'Januari','Februari','Maret','April','Juni','Juli','Agustus','September',
			'Oktober','November','Desember',
		];

		if($timestamp == '') {
			$date = '';

		} else {
			$date = date ($date_format, $timestamp);
			$date = preg_replace ($pattern, $replace, $date);
			$date = "{$date} {$suffix}";
		}

		return $date;
    }


    function listSelect($idSekolah, $nmTable, $showName, $showValue, $subject){
        $condition[]    =   ['aktif', 1, 'where'];
        $condition[]    =   ['id_sekolah', $idSekolah, 'where'];
        return $this->M_core->list_bootstrap_select_def_nol($nmTable, $showValue, $showName, $condition,  $subject, $id=null);
    }

    function listSelected($idSekolah, $table, $rowCondition, $valueCondition, $rowComparison, $id_table, $value, $name, $subject){
        $Lcondition		= [];
        $Lcondition[]	= ['id_sekolah', $idSekolah, 'where'];
        $Lcondition[]	= [$rowCondition, $valueCondition, 'where'];
        $Lcondition[] 	= [$rowComparison.'!=', $id_table, 'where'];
        $data        	= $this->list_bootstrap_select_def_nol($table, $value, $name, $Lcondition, $subject, $id_table);
        return $data;
    }
    
    function listLaporan_psb(){
        $condition[]    =   '';
        return $this->M_core->list_bootstrap_select_def_nol('m_laporan_psb', 'idLaporan', 'namaLaporan', '',  '-- Pilih Laporan --', $id=null);
    }

    function listSelectTA($idSekolah){
        $condition[]    =   ['aktif', 1, 'where'];
        $condition[]    =   ['id_sekolah', $idSekolah, 'where'];
        return $this->M_core->list_bootstrap_select_def_nol('m_ta_tbl', 'id_ta', 'teks_ta', $condition,  '-- Pilih Tahun Ajaran --', $id=null);
    }

}