<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

	function index() {
		$d['title'] = 'Aplikasi Sistem Infromasi Administrasi Pendidikan';
		$d['page'] = 'page_login';
		$this->load->view('login', $d);
	}

	function user_roles() {
        $d['title'] 	= 'User Roles';
        $d['page'] 		= 'us_roles';
        $d['title_page'] = 'User Roles';
        $d['menu'] 		= 'User Role';
        $d['submenu'] 	= 'User Role';
        $this->load->view('layout', $d);
    }
	
	function masuk() {
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$where = array('username' => $username);

		$check_email = $this->M_user->get_user($where)->num_rows();
		
		if($check_email == 0) {
			$this->session->set_flashdata("pesan", 'Username tidak valid !');
			redirect('user');

		} else {
			$check_email = $this->M_user->get_user($where)->result();
			// var_dump($check_email);
			// die();
			$password_db = $this->encrypt->decode($check_email[0]->password);	
			$aktif = $check_email[0]->aktif;		

			if($password != $password_db) {
				$this->session->set_flashdata("pesan", 'Password tidak valid !');
				redirect('user');

			} else {
				if($aktif == 0) {
					$this->session->set_flashdata("pesan", 'User belum terverifikasi !');
					redirect('user');

				} else {
					foreach($check_email as $sess){
						$sess_data['id_user'] 	= $sess->id_user;
						$sess_data['username'] 	= $sess->username;
						$sess_data['password'] 	= $sess->password;
						$sess_data['nm_user'] 	= $sess->nm_user;						
						$sess_data['nm_role'] 	= $sess->nm_role;						
						$sess_data['id_role'] 	= $sess->id_role;						
						$sess_data['id_sekolah']	= $sess->id_sekolah;						
						$this->session->set_userdata($sess_data);
					}

					// var_dump($sess_data);
					// die();
					redirect('dashboard');

				}
			}
		}
	}
	
	function keluar() {
		$this->session->sess_destroy();
		redirect('user');
	}

	public function show_menu() {
		$url 		= $this->input->post('url');
		
		// $nav		= $this->M_global->list_select7('s_nav_tbl', 'url', $url, 'id_nav, id_nav_parent, url, name, icon')->row_array();	
		// $nav		= $this->M_global->list_select7('s_nav_tbl', 'url', $url, 'id_nav, id_nav_parent, url, name, icon')->row_array();

		$condition 		= [];
		$condition[] 	= ['aktif', 1, 'where'];
		$condition[] 	= ['url_siap', $url, 'where'];
		$nav 			= $this->M_admin->get_master_spec('m_menu', 'url_siap, id_menu, id_parent, nm_menu, icon_siap, icon_number', $condition)->row_array();

		// $list_menu 	= $this->M_global->list_select5('s_nav_tbl', 'id_nav_parent', $nav['id_nav'])->result_array();
		// $qty_menu 	= $this->M_global->list_select5('s_nav_tbl', 'id_nav_parent', $nav['id_nav'])->num_rows();

		// $condition 		= [];
		// $condition[] 	= ['aktif1', 1, 'where'];
		// $condition[] 	= ['aktif2', 1, 'where'];
		// $condition[] 	= ['id_nav_parent', $nav['id_nav'], 'where'];
		// $condition[] 	= ['id_role', $this->session->userdata('id_role'), 'where'];
		// $list_menu 		= $this->M_admin->get_master_spec('v_role_nav', '*', $condition)->result_array();

		$condition 		= [];
		// $condition[] 	= ['aktif1', 1, 'where'];
		// $condition[] 	= ['aktif2', 1, 'where'];
		$condition[] 	= ['id_parent', $nav['id_menu'], 'where'];
		$condition[] 	= ['id_role', $this->session->userdata('id_role'), 'where'];
		$condition[] 	= ['sort', 'asc', 'order_by'];
		$list_menu 	= $this->M_admin->get_master_spec('v_role_menu_siap', '*', $condition)->result_array();
		$qty_menu		= count($list_menu);

		// var_dump($nav);
		// var_dump($list_menu);
		// var_dump($qty_menu);
		// die();

		$data 		= array();
		$data['bar']= array(); 
		$data['menu']= array(); 


		$looping 	= 0;

		// $id_nav_parent = $this->M_global->list_select5('s_nav_tbl', 'id_nav', $nav['id_nav_parent'])->row_array();
		$id_nav_parent = $this->M_global->list_select5('m_menu', 'id_menu', $nav['id_parent'])->row_array();
		if ($id_nav_parent) {
			$looping 	= 1;
		}

		$bar 		= array();
		$num_array 	= -1;
		while($looping == 1) {
			$num_array++;
			// $bar[$num_array]['url'] 	= $id_nav_parent['url'];
			// $bar[$num_array]['name'] 	= $id_nav_parent['name'];
			// $bar[$num_array]['icon'] 	= $id_nav_parent['icon'];
			$bar[$num_array]['url_siap'] 	= $id_nav_parent['url_siap'];
			$bar[$num_array]['nm_menu'] 	= $id_nav_parent['nm_menu'];
			$bar[$num_array]['icon_siap'] 	= $id_nav_parent['icon_siap'];

			// $id_nav_parent = $this->M_global->list_select5('s_nav_tbl', 'id_nav', $id_nav_parent['id_nav_parent'])->row_array();
			$id_nav_parent = $this->M_global->list_select5('m_menu', 'id_menu', $id_nav_parent['id_parent'])->row_array();
			if (!$id_nav_parent) {
				$looping = 0;
			}
		}
		$bar 	= array_reverse($bar, true);
		$bar[$num_array+1]['url_siap'] 	= $nav['url_siap'];
		$bar[$num_array+1]['nm_menu'] 	= $nav['nm_menu'];
		$bar[$num_array+1]['icon_siap'] 	= $nav['icon_siap'];


		foreach ($bar as $br) {
			$data['bar'][]	.= '<li><a href="'.base_url().$br['url_siap'].'"><i class="'.$br['icon_siap'].'"></i> '.$br['nm_menu'].'</a></li>';
		}

		$col_class 	= 6;
		if ($qty_menu % 3==0) {
			$col_class	= 4;
		}

		foreach ($list_menu as $lm) {
			$data['menu'][]	.= '<a class="menu" href="'.base_url().$lm['url_siap'].'">
				  		  <div class="col-lg-'.$col_class.' col-sm-'.$col_class.' col-xs-12">
				            <div class="small-box '.$lm['class'].'">
				              <div class="inner">
				                <h3><i class="'.$lm['icon_siap'].'"></i>
				                </h3>
				                <h4>'.$lm['nm_menu'].'</h4>
				              </div>
				              <div class="icon">
					                	<strong style="margin-top: .3em;">'.$lm['icon_number'].'</strong>
				              </div>
				              <div class="small-box-footer">Info lengkap&nbsp;<i class="fa fa-arrow-circle-right"></i></div>
				            </div>
				          </div>
				        </a>';
		}
		// var_dump($data);
		echo json_encode($data);
	}

	function getAllUser(){
		$data = $this->db->get_where('s_user_tbl', array('aktif' => 1))->result_array();
		foreach ($data as $d) {
			echo 'Username = '.$d['email'].'<br>';
			echo 'Password = '.$this->encrypt->decode($d['password']).'<br>';
		}
	}

}

