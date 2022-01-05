<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_admin extends CI_Model {

	private function _get_datatables_query($table, $column_order, $column_search, $order, $condition=null) {
		if ($condition) {
	        foreach ($condition as $c) {
	            $this->db->$c[2]($c[0], $c[1]);
	        }
        }
		
		$this->db->from($table);

		$i = 0;
	
		foreach ($column_search as $item)
		{
			if($_POST['search']['value'])
			{
				
				if($i===0)
				{
					$this->db->group_start();
					$this->db->like($item, $_POST['search']['value']);
				}
				else
				{
					$this->db->or_like($item, $_POST['search']['value']);
				}

				if(count($column_search) - 1 == $i)
					$this->db->group_end();
			}
			$i++;
		}
		
		if(isset($_POST['order']))
		{
			$this->db->order_by($column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} 
		else if(isset($order))
		{
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

	function count_all($table, $condition=null) {
		if ($condition) {
            foreach ($condition as $c) {
                $this->db->$c[2]($c[0], $c[1]);
            }
        }
		$this->db->from($table);
		return $this->db->count_all_results();
	}

	function update_data($paramTable, $c, $data) {
        $this->db->$c[2]($c[0], $c[1]);
		$this->db->update($paramTable, $data);
	}

	function delete_data($paramTable, $paramColumn, $paramId) {
		$this->db->where($paramColumn, $paramId);
		$this->db->delete($paramTable);
	}

	function update_data_batch($paramTable, $c, $data) {
		$this->db->update_batch($paramTable, $data, $c);
	}	

	function insert_data($paramTable, $data) {
		$this->db->insert($paramTable, $data);
		return $this->db->insert_id();
	}

	function insert_data_batch($paramTable, $data) {
			$this->db->insert_batch($paramTable, $data);
	}	

	function update_master_spec($paramTable, $data, $condition) {
		if ($condition) {
            foreach ($condition as $c) {
                $this->db->$c[2]($c[0], $c[1]);
            }
        }
        return $this->db->update($paramTable, $data);
	}	


	function get_data($paramTable, $condition=null) {
		if ($condition) {
            foreach ($condition as $c) {
                $this->db->$c[2]($c[0], $c[1]);
            }
        }
        return $this->db->get($paramTable);
	}

	function get_master_spec($paramTable, $paramSelect, $condition) {
		$this->db->select($paramSelect);
		if ($condition) {
            foreach ($condition as $c) {
                if (($c['2']) == null) {
                    $this->db->$c[0]($c[1]);
                } else {
                    $this->db->$c[2]($c[0], $c[1]);
                }
            }
        }
        return $this->db->get($paramTable);
	}

	
	function get_max_number($paramTable, $paramColumn, $condition=null) {
		$this->db->select($paramColumn);
		if ($condition) {
            foreach ($condition as $c) {
                $this->db->$c[2]($c[0], $c[1]);
            }
        }
        $data 	= $this->db->get($paramTable)->result_array();
        if ($data) {	
        	return $max_value 	= max($data)[$paramColumn];
        } else {
        	return null;
        }
	}

	function getMenuByRole($id_role){
		$this->db->select('a.id_role, a.id_menu, b.nm_menu, 
			b.url, b.aktif, b.id_parent, b.icon as icon' );
		$this->db->from('m_role_menu a');
		$this->db->join('m_menu b' , 'a.id_menu = b.id_menu', 'LEFT');
		// $this->db->where('id_role', $this->session->userdata('id_role'));
		$this->db->where('id_role', $id_role);
		$this->db->where('a.aktif', 1);
		$this->db->where('b.aktif', 1);
		$this->db->order_by("b.urutan",'ASC');
		// $get =  $this->db->get_compiled_select();
		$query =  $this->db->get();

		$menu = [
			'menu' => [],
			'parents' => [] 
		];

		foreach ($query->result() as $row ) {
			$menu['menus'][$row->id_menu] = $row;
			$menu['parents'][$row->id_parent][] = $row->id_menu;
		}
		
	
		if ($menu) {
			
			$result = $this->build_parent_menu(0, $menu);
			
			return $result;
		}else{
			return FALSE;
		}
		
	}


	function build_parent_menu($parent, $menu){
		$html = '';
	
		if(isset($menu['parents'][$parent])){
			
			$html .= '<ul class="sidebar-menu" data-widget="tree">';

			
			foreach($menu['parents'][$parent] as $itemId){
				
				if(!isset($menu['parents'][$itemId]))
				{
					$html .= '<li>';
					if($menu['menus'][$itemId]->url == "#"){
						$html .= '<a href="#">';
					}else{
						$html .= '<a href="'.base_url().$menu['menus'][$itemId]->url.'">';
					}
					
					$html .= '<i class="'.$menu['menus'][$itemId]->icon.'"></i>';
					$html .= '<span>'.$menu['menus'][$itemId]->nm_menu.'</span></a>';
					$html .= '</li>';
					
				}
				
				if(isset($menu['parents'][$itemId])){
					
					$html .= '<li class="treeview">';

					if($menu['menus'][$itemId]->url == "#"){
						$html .= '<a href="#">';
					}else{
						$html .= '<a href="'.base_url().$menu['menus'][$itemId]->url.'">';
					}
				
					$html .= '<i class="'.$menu['menus'][$itemId]->icon.'"></i> <span>'.$menu['menus'][$itemId]->nm_menu.'</span>';
					$html .= '<span class="pull-right-container">';
					$html .= '<i class="fa fa-angle-left pull-right"></i>';
					$html .= '</span>';
					$html .= '</a>';
					
					$html .= $this->build_parent_menu2($itemId, $menu);
					$html .= '</li>';
				}
				
			}
			$html .= '</ul>';
			
		}
		
		return $html;
	}



	function build_parent_menu2($parent, $menu){
		$html = '';
	
		if(isset($menu['parents'][$parent])){
			
			$html .= '<ul class="treeview-menu">';

			
			foreach($menu['parents'][$parent] as $itemId){
				
				if(!isset($menu['parents'][$itemId]))
				{
					$html .= '<li>';
					if($menu['menus'][$itemId]->url == "#"){
						$html .= '<a href="#">';
					}else{
						$html .= '<a href="'.base_url().$menu['menus'][$itemId]->url.'">';
					}
					
					$html .= '<i class="'.$menu['menus'][$itemId]->icon.'"></i>';
					$html .= '<span>'.$menu['menus'][$itemId]->nm_menu.'</span></a>';
					$html .= '</li>';
					
				}
				
				if(isset($menu['parents'][$itemId])){
					
					$html .= '<li class="treeview-menu">';

					if($menu['menus'][$itemId]->url == "#"){
						$html .= '<a href="#">';
					}else{
						$html .= '<a href="'.base_url().$menu['menus'][$itemId]->url.'">';
					}
				
					$html .= '<i class="'.$menu['menus'][$itemId]->icon.'"></i> <span>'.$menu['menus'][$itemId]->nm_menu.'</span>';
					$html .= '<span class="pull-right-container">';
					$html .= '<i class="fa fa-angle-left pull-right"></i>';
					$html .= '</span>';
					$html .= '</a>';
					
					$html .= $this->build_parent_menu2($itemId, $menu);
					$html .= '</li>';
				}
				
			}
			$html .= '</ul>';
			
		}
		
		return $html;
	}

	function returnPathToDirectory($folder){
		$path =  str_replace("/","\\", $folder);
		
		$directory = ltrim($path, '\\');
		return $directory;
	 }


	// $path = '/berkas/foto_guru';
	// $path = '/berkas/foto_guru';
	// $this->load->library('upload');
	// $filename = $_FILES['foto']['name'];
	// $config = [
	// 	'upload_path' 	=> '.'.$path,
	// 	'allowed_types' => 'png|jpg|jpeg',
	// 	'max_size' 		=> '8000',				
	// 	'file_name' 	=> $filename,
	// 	'encrypt_name' 	=> TRUE
	// ];
	function uploadFileHandler($path, $fileName, $allowerTypes, $maxSize ){
	
		$filename = $_FILES[$fileName]['name'];
		

		$config = [
			'upload_path' 	=> '.'.$path,
			'allowed_types' => $allowerTypes,
			'max_size' 		=> $maxSize,				
			'file_name' 	=> $filename,
			'encrypt_name' 	=> TRUE
		];

		$dataImg = [];
		if(is_dir(FCPATH.$this->returnPathToDirectory($path))){
			
			$this->upload->initialize($config);
			$this->upload->do_upload($fileName);
			$upload_data 		= $this->upload->data();
			$file_lokasi 		= base_url().substr($path, 1);
			$file_name_asli 	= $upload_data['orig_name'];
			$file_name_hash 	= $upload_data['file_name'];
			$err 				= $this->upload->display_errors();

		}else{
			mkdir(FCPATH.$this->returnPathToDirectory($path), 0755, true);

			$this->upload->initialize($config);
			$this->upload->do_upload($fileName);
			$upload_data 		= $this->upload->data();
			$file_lokasi 		= base_url().substr($path, 1);
			$file_name_asli 	= $upload_data['orig_name'];
			$file_name_hash 	= $upload_data['file_name'];
			$err 				= $this->upload->display_errors();
			
		}

		$dataImg['file_asli'] = [$file_name_asli];
		$dataImg['file_hash'] = [$file_name_hash];
		$dataImg['file_lokasi'] = [$file_lokasi];

		return $dataImg;

	}

	/**
	 * $nameIdWilayah 	=> 'id_kabupaten
	 * $valIdWilayah	=>	$id_kabupaten
	 * $tblName			=> 'm_kabupaten'
	 * $nameNamaWilayah => 'nama_kabupaten'
	 */
	function getWilayahName($nameIdWilayah, $valIdWilayah, $tblName, $nameNamaWilayah){
		$condition		= [];
		$condition[]		= ['aktif', 1, 'where'];
		$condition[]		= [$nameIdWilayah, $valIdWilayah, 'where'];
		$dataWilayah	= $this->get_master_spec($tblName, $nameNamaWilayah, $condition)->row_array();

		return $dataWilayah;
	}
}