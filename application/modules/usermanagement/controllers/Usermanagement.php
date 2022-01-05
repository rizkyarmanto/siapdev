<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usermanagement extends CI_Controller {

	function index() {
		$d['title'] = 'User Management';
        $d['page']  = 'menu';
        $d['title_page'] = 'User Management';
        $d['menu']  = 'User Management';
        $this->load->view('layout', $d);
	}

	function user(){
		$d['title']     = "Data User";
        $d['page']      = 'manage_user';
        $d['judul']     = "Data User";
        $d['menu']      = "Data User";
		$d['submenu']   = "Data User";
		$d['roles']         = $this->M_core->getListSelectDefNol('m_role', 'aktif', 1, 'id_role', 'nm_role', '-- Pilih Role --');
		$d['identitas']     = $this->M_core->getListSelectDefNol('m_identitas', 'aktif', 1, 'id_identitas', 'nm_identitas', '-- Pilih Identitas --');
        $this->load->view('layout', $d);
	}

	function role(){
		$d['title']     = "Data Role";
        $d['page']      = 'manage_role';
        $d['judul']     = "Data Role";
        $d['menu']      = "Data Role";
		$d['submenu']   = "Data Role";
        $this->load->view('layout', $d);
	}

	public function hakAkses(){
        $d['page']      = 'hak_akses';
		$d['judul']     = "Hak Akses";
        $d['menu']      = "Hak Akses";
		$d['submenu']   = "Hak Akses";
		$d['title']     = "Hak Akses";


        $condition 		= [];
        $condition[] 	= ['aktif', 1, 'where'];
        $dataRole 		= $this->M_admin->get_master_spec('m_role', 'id_role, nm_role', $condition)->result_array();
        $d['dataRole']  = $dataRole;
		$d['treeMenu']		= $this->M_data->tampilMenuTree();
		
        $Lcondition			= [];
        $Lcondition[]		= ['aktif', 1, 'where'];
        // $Lcondition[]		= ['id_parent', 0, 'where'];
        // $Lcondition[]		= ['url', '#', 'or_where'];
        $value				= 'id_menu';
        $name 				= 'nm_menu';
        $d['ListMenuParent']= $this->M_core->list_bootstrap_select('m_menu', $value, $name, $Lcondition, '-- Pilih Parent Menu --');

        $this->load->view('layout', $d);

    }

    function atur_akses(){
		$d['page']      = 'atur_akses';
        $d['menu']      = 'Pengaturan Hak Akses';
        $d['title']		= 'Pengaturan Hak Akses';
		$d['submenu']   = "Pengaturan Hak Akses";
		$d['title']     = "Pengaturan Hak Akses";

        $id_role 			= $this->uri->segment(3);
        $d['id_role']		= $id_role;

        $condition 		= [];
        $condition[] 	= ['aktif', 1, 'where'];
        $dataRole 		= $this->M_admin->get_master_spec('m_role', 'id_role, nm_role', $condition)->result_array();
        $d['dataRole']  = $dataRole;

        $condition 		= [];
        $condition[] 	= ['aktif', 1, 'where'];
        $condition[] 	= ['id_role', $id_role, 'where'];
        $dataRoleById 	= $this->M_admin->get_master_spec('m_role', 'id_role, nm_role', $condition)->row_array();
        $d['dataRoleById'] = $dataRoleById;

        $d['getMenuTree']	= $this->M_data->getMenuByRole($id_role);

        $this->load->view('layout', $d);
	}

    function atur_akses_action($action){

		if ($action == "aktif") {
			$id_role 	= $this->input->post('id_role');
			$status		= $this->input->post('status');
			$id_menu 	= $this->input->post('id_menu');

			$data 			= ['aktif' => $status];

			$array = array('id_role' => $id_role, 'id_menu' => $id_menu);

			$this->db->where($array);
			$this->db->update('m_role_menu', $data);

			$response		= ['status' => $status];

		}else{
			$response		= ['status' => 'FAIL'];
		}

		echo json_encode($response);

	}

	function showUser(){
		$table = 'v_user_role';
		$column_order   = array(null, 'id_user', 'nm_role', 'nm_user', 'username', null, null); 
        $column_search  = array('id_user', 'nm_role', 'nm_user', 'username'); 
        $order          = array('id_user' => 'asc');

        $condition      =   [];
        $condition[]    =   ['id_sekolah', $this->session->userdata('id_sekolah'), 'where'];

        $list_data		= $this->M_admin->get_datatables($table, $column_order, $column_search, $order, $condition);
        $data           = array();
        $no             = $_POST['start'];

        foreach ($list_data as $ld) {
        	$status 	= $ld->aktif;

        	if ($status == 1) {
				$html_stat 	= '<input class="action" data-action="aktif" data-id_user="'.$ld->id_user.'" 
								type="checkbox" id="lbl-'.$ld->nm_user.'" checked switch="none" >
                                            <label for="lbl-'.$ld->id_user.'" data-on-label="On"
                                                   data-off-label="Off"></label>';
               
        	} else {
				$html_stat 	= '<input class="action" data-action="aktif" data-id_user="'.$ld->id_user.'" 
								type="checkbox" id="lbl-'.$ld->nm_user.'" switch="none" >
									<label for="lbl-'.$ld->id_user.'" data-on-label="On"
											data-off-label="Off"></label>';
              
        	}
         
            $no++;
            $row = array();
			$row[] = $ld->id_user;
			$row[] = $ld->nm_role;
			$row[] = $ld->nm_user;
			$row[] = $ld->username;
            $row[] = $html_stat;
			$row[] = '&nbsp;<button 
							type="button" data-id="'.$ld->id_user.'" data-action="edit" 
							class="action btn btn-xs btn-icon waves-effect btn-info m-b-5 tooltip-hover tooltipstered"
					  		title="Ubah"> <i class="fa fa-pencil"></i> 
                    </button>
                    &nbsp;<button 
							type="button" data-id="'.$ld->id_user.'" data-master="m_user" data-col="id_user" data-action="delete" 
							class="action btn btn-xs btn-icon waves-effect btn-danger m-b-5 tooltip-hover tooltipstered"
					  		title="delete"> <i class="fa fa-remove"></i> 
                    </button>';


            $data[] = $row;
        }

        $output = array(
	            "draw" => $_POST['draw'],
	            "recordsFiltered" => $this->M_admin->count_filtered($table, $column_order, $column_search, $order),
	            "recordsTotal" => $this->M_admin->count_all($table),
	            "data" => $data,
            );
        echo json_encode($output);
	}

	function showRole(){
		$table = 'm_role';
		$column_order   = array(null, 'id_role', 'nm_role', 'kd_role', 'keterangan', null, null); 
        $column_search  = array('id_role', 'nm_role', 'kd_role', 'keterangan'); 
        $order          = array('id_role' => 'asc');

        $list_data		= $this->M_admin->get_datatables($table, $column_order, $column_search, $order);
        $data           = array();
        $no             = $_POST['start'];

        foreach ($list_data as $ld) {
        	$status 	= $ld->aktif;

        	if ($status == 1) {
				$html_stat 	= '<input class="action" data-action="aktif" data-id_role="'.$ld->id_role.'" 
								type="checkbox" id="lbl-'.$ld->nm_role.'" checked switch="none" >
                                    <label for="lbl-'.$ld->id_role.'" data-on-label="On" data-off-label="Off"></label>';
        	} else {
				$html_stat 	= '<input class="action" data-action="aktif" data-id_role="'.$ld->id_role.'" 
								type="checkbox" id="lbl-'.$ld->nm_role.'" switch="none" >
									<label for="lbl-'.$ld->id_role.'" data-on-label="On" data-off-label="Off"></label>';
        	}
         
            $no++;
            $row = array();
			$row[] = $ld->id_role;
			$row[] = $ld->kd_role;
            $row[] = $ld->nm_role;
            $row[] = $ld->keterangan;
            $row[] = $html_stat;
			$row[] = '&nbsp;<button 
							type="button" data-id="'.$ld->id_role.'" data-action="edit" 
							class="action btn btn-xs btn-icon waves-effect btn-info m-b-5 tooltip-hover tooltipstered"
					  		title="Ubah"> <i class="fa fa-pencil"></i> 
                    </button>
                    &nbsp;<button 
							type="button" data-id="'.$ld->id_role.'" data-master="m_role" data-col="id_role" data-action="delete" 
							class="action btn btn-xs btn-icon waves-effect btn-danger m-b-5 tooltip-hover tooltipstered"
					  		title="delete"> <i class="fa fa-remove"></i> 
                    </button>';

            $data[] = $row;
        }

        $output = array(
	            "draw" => $_POST['draw'],
	            "recordsFiltered" => $this->M_admin->count_filtered($table, $column_order, $column_search, $order),
	            "recordsTotal" => $this->M_admin->count_all($table),
	            "data" => $data,
            );
        echo json_encode($output);
	}

	function userAction($action){
        if($action == 'aktif'){

            $response = $this->actionActiveHandler('id_user', 'm_user');

        }elseif($action == 'add'){

            $id_user    	=   $this->input->post('id_user');
            $id_role    	=   $this->input->post('id_role');
            $id_identitas   =   $this->input->post('id_identitas');
            $nm_user    	=   $this->input->post('nm_user');
            $password   	=   $this->encrypt->encode($this->input->post('password'));
            $username   	=   $this->input->post('username');

            $dataUser       =   [
                'id_user'   	=>  $id_user,
                'id_role'   	=>  $id_role,
                'id_identitas'  =>  $id_identitas,
                'nm_user'   	=>  $nm_user,
                'username'  	=>  $username,
                'password'  	=>  $password
			];
			
            $insertUser =  $this->M_admin->insert_data('m_user', $dataUser);

            $response 	= ['status' => 'OKE'];

        }elseif($action == 'edit'){
			$id_user    	=   $this->input->post('id_user');
            $id_role    	=   $this->input->post('id_role');
            $id_identitas   =   $this->input->post('id_identitas');
            $nm_user    	=   $this->input->post('nm_user');
            $password   	=   $this->encrypt->encode($this->input->post('password'));
            $username   	=   $this->input->post('username');	
			
            $data       =   [
				'id_user'   	=>  $id_user,
                'id_role'   	=>  $id_role,
                'id_identitas'  =>  $id_identitas,
                'nm_user'   	=>  $nm_user,
                'username'  	=>  $username,
                'password'  	=>  $password
			];
			

            $response = $this->actionInsertUpdateHandler($data['id_user'],'id_user', $data, 'm_user');
            
        }elseif($action == 'detail'){

            $id_user = $this->input->post('id_user');

			$condition 		= [];
			$condition[] 	= ['id_user', $id_user, 'where'];
			
			$response 		= $this->M_admin->get_master_spec('m_user', 'id_user, id_role, id_identitas, email, nm_user, username, password', $condition)->row_array();

			$response['passUser'] = $this->encrypt->decode($response['password']);

			$response['sl_role'] = $this->M_core->getListSelectedDefNol('m_role', 'aktif', 1, 'id_role', $response['id_role'], 'id_role', 'nm_role', '-- Pilih Role --');
			$response['sl_identitas'] = $this->M_core->getListSelectedDefNol('m_identitas', 'aktif', 1, 'id_identitas', $response['id_identitas'], 'id_identitas', 'nm_identitas', '-- Pilih Identitas --');
            
        }

        echo json_encode($response);
	}
	
	function roleAction($action){
        if($action == 'aktif'){

            $response = $this->actionActiveHandler('id_role', 'm_role');

        }elseif($action == 'add'){
			$data = [
                'id_role' => $this->input->post('id_role'),
                'kd_role' => $this->input->post('kd_role'),
                'nm_role' => $this->input->post('nm_role'),
                'keterangan' => $this->input->post('keterangan'),
            ];
           
            $insertRole     =   $this->M_admin->insert_data('m_role', $data);
            
            $condition 		= [];
            $condition[] 	= ['aktif', 1, 'where'];
			$dataMenus 		= $this->M_admin->get_master_spec('m_menu', 'id_menu', $condition)->result_array();
			
	

            for ($i=1; $i < count($dataMenus)+1; $i++) { 
                $dataRoleMenu  =   [
                    'id_role'     =>  $insertRole,
                    'id_menu'     =>  $i,
                    'aktif'       =>  0,
                ];

                $this->M_admin->insert_data('m_role_menu', $dataRoleMenu);
			}

			// for($j=1; $j < count($dataNavs)+1; $j++){
			// 	$dataRoleNav   =   [
            //         'id_role'    =>  $insertRole,
            //         'id_nav'     =>  $i,
            //         'aktif'      =>  0,
			// 	];
			// 	$this->M_admin->insert_data('m_role_nav', $dataRoleNav);
			// }
			
            $response		= ['InsertRole' => 'SUCCESS'];

        }elseif($action == 'edit'){
            
			$data = [
                'id_role' => $this->input->post('id_role'),
                'kd_role' => $this->input->post('kd_role'),
                'nm_role' => $this->input->post('nm_role'),
                'keterangan' => $this->input->post('keterangan'),
               
            ];

            $response = $this->actionInsertUpdateHandler($data['id_role'],'id_role', $data, 'm_role');
            
        }elseif($action == 'detail'){

            $id_role = $this->input->post('id_role');

			$condition 		= [];
			$condition[] 	= ['id_role', $id_role, 'where'];
			
			$response 		= $this->M_admin->get_master_spec('m_role', 'id_role, nm_role, kd_role, keterangan', $condition)->row_array();
            
        }

        echo json_encode($response);
	}
	

	function actionActiveHandler($id, $tableName){
        $id_ 	= $this->input->post($id);
        $status = $this->input->post('status');
		$data 	= ['aktif' => $status];
		
        $condition 		= [];
        $condition[0] 	= $id;
        $condition[1] 	= $id_;
        $condition[2] 	= 'where';

        $this->M_admin->update_data($tableName, $condition, $data);
        $response 	= ['status' => $status];
        return $response;
    }

	function actionInsertUpdateHandler($id=null, $idName=null, $data, $tableName){
        if($id == null){
            $this->M_admin->insert_data($tableName, $data);
            $response 	= ['statusInsert' => "OK!"];
        }else{
            $condition 		= [];
			$condition[0] 	= $idName;
			$condition[1] 	= $id;
			$condition[2] 	= 'where';
            $this->M_admin->update_data($tableName, $condition, $data);
            $response 	= ['statusUpdate' => "OK!"];
        }
       
        return $response;
	}
	
	public function deleteAction($paramTable, $paramColumn, $paramId){
        $deleteReq  =   $this->M_admin->delete_data($paramTable, $paramColumn, $paramId);
        if(!$deleteReq){
            $response   =   ['Response' => 'OKE'];
        }else{
            $response   =   ['Response' => 'FAIL'];
        }

        echo json_encode($response);
	}
	
	public function hakAksesAction($action){
        if ($action == "add") {
            $id_menu     =  $this->input->post('id_menu');
			$nm_menu     =  $this->input->post('nm_menu');
			$kd_menu     =  $this->input->post('kd_menu');
			$url_porto   =  $this->input->post('url_porto');
			$url_siap    =  $this->input->post('url_siap');
			$icon_porto  =  $this->input->post('icon_porto');
			$icon_siap   =  $this->input->post('icon_siap');
            $id_parent   =  $this->input->post('id_parent');
            $class       =  $this->input->post('class');
            $type_porto  =  $this->input->post('type_porto');
            $type_siap   =  $this->input->post('type_siap');
            $attribut    =  $this->input->post('attribut');
            $sort        =  $this->input->post('sort');
            $show_siap   =  $this->input->post('show_siap');
            $show_porto  =  $this->input->post('show_porto');

			$data = [
                'id_menu' 		=>  $id_menu,
                'nm_menu' 		=>  $nm_menu,
                'kd_menu' 		=>  $kd_menu,
                'url_porto'	  	=>  $url_porto,
                'url_siap'	  	=>  $url_siap,
                'icon_porto'	=>  $icon_porto,
                'icon_siap'	  	=>  $icon_siap,
                'id_parent'     =>  $id_parent != '' ? $id_parent : '0',
                'class'   	    =>  $class,
                'type_porto'    =>  $type_porto,
                'type_siap'    	=>  $type_siap,
                'attr'    	    =>  $attribut,
                'sort'    	    =>  $sort,
                'show_siap'     =>  $show_siap,
                'show_porto'    =>  $show_porto
                
            ];
			// var_dump($data);
			// die();
			$id_menu = $this->M_admin->insert_data('m_menu', $data);

			$this->db->select("id_role, nm_role");
			$this->db->from('m_role');
			$this->db->order_by('id_role','asc');
			$dataRole = $this->db->get();
                
            $getFirstIdRole = $dataRole->row_array()['id_role'];

			$jumlahId = $dataRole->num_rows();
          
			for ($i=$getFirstIdRole; $i <= $jumlahId ; $i++) { 
				$data1 = [

						'id_menu'   =>  $id_menu,
						'aktif'	    =>  0,
						'id_role'   =>  $i

					];
				$this->M_admin->insert_data('m_role_menu', $data1);
			}

			$response 	= ['status' => "OK"];

		}

		elseif ($action == "detail") {
			$id_menu 	= $this->input->post('id_menu');

			$condition 		= [];
			$condition[]	= ['id_menu', $id_menu, 'where'];

			$response 		= $this->M_admin->get_master_spec('m_menu', '*' , $condition)->row_array();
			// var_dump($response);
			// die();
			$Lcondition		= [];
        	$Lcondition[]	= ['aktif', 1, 'where'];
        	// $Lcondition[]	= ['id_nav_parent', 0, 'where'];
        	// $Lcondition[]	= ['url', '#', 'or_where'];
        	$value			= 'id_menu';
        	$name 			= 'nm_menu';

        	$response['sl_parent']= $this->M_core->list_bootstrap_select('m_menu', $value, $name, $Lcondition, '-- Pilih Parent Menu --', $response['id_parent']);

			
		}

		elseif ($action == "edit") {
            $id_menu     =  $this->input->post('id_menu');
			$nm_menu     =  $this->input->post('nm_menu');
			$kd_menu     =  $this->input->post('kd_menu');
			$url_porto   =  $this->input->post('url_porto');
			$url_siap    =  $this->input->post('url_siap');
			$icon_porto  =  $this->input->post('icon_porto');
			$icon_siap   =  $this->input->post('icon_siap');
            $id_parent   =  $this->input->post('id_parent');
            $class       =  $this->input->post('class');
            $type_porto  =  $this->input->post('type_porto');
            $type_siap   =  $this->input->post('type_siap');
            $attribut    =  $this->input->post('attribut');
            $sort        =  $this->input->post('sort');
            $show_siap   =  $this->input->post('show_siap');
            $show_porto  =  $this->input->post('show_porto');


			$data = [
                'id_menu' 		=>  $id_menu,
                'nm_menu' 		=>  $nm_menu,
                'kd_menu' 		=>  $kd_menu,
                'url_porto'	  	=>  $url_porto,
                'url_siap'	  	=>  $url_siap,
                'icon_porto'	=>  $icon_porto,
                'icon_siap'	  	=>  $icon_siap,
                'id_parent'     =>  $id_parent != '' ? $id_parent : '0',
                'class'   	    =>  $class,
                'type_porto'    =>  $type_porto,
                'type_siap'    	=>  $type_siap,
                'attr'    	    =>  $attribut,
                'sort'    	    =>  $sort,
                'show_siap'     =>  $show_siap,
                'show_porto'    =>  $show_porto
                
            ];
          
			$condition 		= [];
			$condition[0] 	= 'id_menu';
			$condition[1] 	= $id_menu;
			$condition[2] 	= 'where';
			$this->M_admin->update_data('m_menu', $condition, $data);
			
			$response 	= ['status' => "OK!"];

		}


		echo json_encode($response);
    }


	
}

