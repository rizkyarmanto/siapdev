<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
     
class Kbm extends CI_Controller {

    function __construct() {
        parent::__construct();
        if(!$this->session->userdata('id_user')) {
            redirect('user');
        }
    }


    function index() {
        $d['title'] = 'Administrasi KBM';
        $d['page']  = 'menu';
        $d['title_page'] = 'Administrasi KBM';
        $d['menu']  = 'Administrasi KBM';
        $this->load->view('layout', $d);
    }

    public function data_kelas(){
        $d['title']     =   "Data Kelas";
        $d['page']      =   'data_kelas';
        $d['judul']     =   "Data Kelas";
        $d['menu']      =   "Data Kelas";
        $d['submenu']   =   "Data Kelas";

        $d['ta']        = $this->M_core->listSelect($this->session->userdata('id_sekolah'), 'm_ta_tbl', 'teks_ta', 'id_ta', '-- Pilih Tahun Ajaran --');
        $d['jenjang']   = $this->M_core->listSelect($this->session->userdata('id_sekolah'), 'm_jenjang_tbl', 'jenjang', 'id_jenjang', '-- Pilih Jenjang --');
        $d['tingkat']   = $this->M_core->listSelect($this->session->userdata('id_sekolah'), 'm_tingkat_tbl', 'tingkat', 'id_tingkat', '-- Pilih Tingkat --');
        $d['jurusan']   = $this->M_core->listSelect($this->session->userdata('id_sekolah'), 'm_jurusan_tbl', 'jurusan', 'id_jurusan', '-- Pilih Jurusan --');

        $this->load->view('layout', $d);
    }

    public function input_data_kls(){
        $d['title']     =   "Input Data Kelas";
        $d['page']      =   'input_data_kelas';
        $d['judul']     =   "Input Data Kelas";
        $d['menu']      =   "Input Data Kelas";
        $d['submenu']   =   "Input Data Kelas";
       
        $d['ta']        = $this->M_core->listSelect($this->session->userdata('id_sekolah'), 'm_ta_tbl', 'teks_ta', 'id_ta', '-- Pilih Tahun Ajaran --');
        $d['jurusan']   = $this->M_core->listSelect($this->session->userdata('id_sekolah'), 'm_jurusan_tbl', 'jurusan', 'id_jurusan', '-- Pilih Jurusan --');
        $d['tingkat']   = $this->M_core->listSelect($this->session->userdata('id_sekolah'), 'm_tingkat_tbl', 'tingkat', 'id_tingkat', '-- Pilih Tingkat --');
        $d['jenjang']   = $this->M_core->listSelect($this->session->userdata('id_sekolah'), 'm_jenjang_tbl', 'jenjang', 'id_jenjang', '-- Pilih Jenjang --');

        $this->load->view('layout', $d);
    }

    function data_walikelas(){
        $d['title']     =   "Walikelas";
        $d['page']      =   'walikelas';
        $d['judul']     =   "Walikelas";
        $d['menu']      =   "Walikelas";
        $d['submenu']   =   "Walikelas";

        $d['guru']      = $this->M_core->listSelect($this->session->userdata('id_sekolah'), 'm_guru', 'nm_guru', 'id_guru', '-- Pilih Guru --');
        $d['kelas']     = $this->M_core->listSelect($this->session->userdata('id_sekolah'), 'm_kelas', 'nm_kelas', 'id_kelas', '-- Pilih Kelas --');
      
        $this->load->view('layout', $d);
    }

    function input_walikelas(){
        $d['title']     =   "Input Walikelas";
        $d['page']      =   'input_walikelas';
        $d['judul']     =   "Input Walikelas";
        $d['menu']      =   "Input Walikelas";
        $d['submenu']   =   "Input Walikelas";
        
        $d['guru']      = $this->M_core->listSelect($this->session->userdata('id_sekolah'), 'm_guru', 'nm_guru', 'id_guru', '-- Pilih Guru --');
        $d['kelas']     = $this->M_core->listSelect($this->session->userdata('id_sekolah'), 'm_kelas', 'nm_kelas', 'id_kelas', '-- Pilih Kelas --');
        $d['ta']        = $this->M_core->listSelect($this->session->userdata('id_sekolah'), 'm_ta_tbl', 'teks_ta', 'id_ta', '-- Pilih Tahun Ajaran --');
        $d['jenjang']   = $this->M_core->listSelect($this->session->userdata('id_sekolah'), 'm_jenjang_tbl', 'jenjang', 'id_jenjang', '-- Pilih Jenjang --');
      
        $this->load->view('layout', $d);
    }

    function kelola_guru_mapel(){
        $d['title']     =   "Guru Mapel";
        $d['page']      =   'guru_mapel';
        $d['judul']     =   "Guru Mapel";
        $d['menu']      =   "Guru Mapel";
        $d['submenu']   =   "Guru Mapel";
        $d['guru']      = $this->M_core->listSelect($this->session->userdata('id_sekolah'), 'm_guru', 'nm_guru', 'id_guru', '-- Pilih Guru --');
        $d['mapel']     = $this->M_core->listSelect($this->session->userdata('id_sekolah'), 'm_mapel', 'nm_mapel', 'id_mapel', '-- Pilih mapel --');
        
        $this->load->view('layout', $d);
    }

    function input_guru_mapel(){
        $d['title']     =   "Input Guru Mapel";
        $d['page']      =   'input_guru_mapel';
        $d['judul']     =   "Input Guru Mapel";
        $d['menu']      =   "Input Guru Mapel";
        $d['submenu']   =   "Input Guru Mapel";
        $d['guru']      = $this->M_core->listSelect($this->session->userdata('id_sekolah'), 'm_guru', 'nm_guru', 'id_guru', '-- Pilih Guru --');
        $d['mapel']     = $this->M_core->listSelect($this->session->userdata('id_sekolah'), 'm_mapel', 'nm_mapel', 'id_mapel', '-- Pilih mapel --');

        $this->load->view('layout', $d);
    }

    function mapel_tingkat(){
        $d['title']     =   "Mapel Tingkat";
        $d['page']      =   'mapel_tingkat';
        $d['judul']     =   "Mapel Tingkat";
        $d['menu']      =   "Mapel Tingkat";
        $d['submenu']   =   "Mapel Tingkat";
        $d['jurusan']   = $this->M_core->listSelect($this->session->userdata('id_sekolah'), 'm_jurusan_tbl', 'jurusan', 'id_jurusan', '-- Pilih Jurusan --');
        $d['tingkat']   = $this->M_core->listSelect($this->session->userdata('id_sekolah'), 'm_tingkat_tbl', 'tingkat', 'id_tingkat', '-- Pilih Tingkat --');
        $d['mapel']     = $this->M_core->listSelect($this->session->userdata('id_sekolah'), 'm_mapel', 'nm_mapel', 'id_mapel', '-- Pilih mapel --');
      
        $this->load->view('layout', $d);
    }

    function jadwal_pelajaran(){
        $d['title']     =   "Jadwal Pelajaran";
        $d['page']      =   'jadwal_pelajaran';
        $d['judul']     =   "Jadwal Pelajaran";
        $d['menu']      =   "Jadwal Pelajaran";
        $d['submenu']   =   "Jadwal Pelajaran";
       
        $d['kelas']     = $this->M_core->listSelect($this->session->userdata('id_sekolah'), 'm_kelas', 'nm_kelas', 'id_kelas', '-- Pilih Kelas --');
        $d['mapel']     = $this->M_core->listSelect($this->session->userdata('id_sekolah'), 'm_mapel', 'nm_mapel', 'id_mapel', '-- Pilih Matapelajaran --');
        $d['hari']     = $this->M_core->getListSelectDefNol('m_hari', 'aktif', 1, 'nm_hari', 'nm_hari', '-- Pilih Hari --');
      
        $this->load->view('layout', $d);
    }

    function showJadwal(){
        $table          = 'v_jadwal_pelajaran';
		$id_kelas       =   $this->input->post('id_kelas');
        $hari           =   $this->input->post('hari');
     
        $column_order   = array(null, 'hari','nm_kelas', 'jam_mulai', 'jam_selesai', 'nm_mapel',  null, null); 
        $column_search  = array('hari', 'nm_kelas', 'jam_mulai', 'jam_selesai', 'nm_mapel'); 
        $order          = array('id_jadwal' => 'asc');

        $condition      =   [];
        $condition[]    =   ['id_sekolah', $this->session->userdata('id_sekolah'), 'where'];

        if($id_kelas != 0){
            $condition[]    =   ['id_kelas', $id_kelas, 'where'];
        }
    
            
        $list_data   	=   $this->M_admin->get_datatables($table, $column_order, $column_search, $order, $condition);
      
        $data           = array();
        $no             = $_POST['start'];
        foreach ($list_data as $ld) {
        	$status 	= $ld->aktif;

            if ($status == 1) {
				$html_stat 	= '<input class="action" data-action="aktif" data-id_jadwal="'.$ld->id_jadwal.'" 
								type="checkbox" id="lbl-'.$ld->nm_kelas.'" checked switch="none" >
                                    <label for="lbl-'.$ld->id_jadwal.'" data-on-label="On" data-off-label="Off"></label>';
        	} else {
				$html_stat 	= '<input class="action" data-action="aktif" data-id_jadwal="'.$ld->id_jadwal.'" 
								type="checkbox" id="lbl-'.$ld->nm_kelas.'" switch="none" >
									<label for="lbl-'.$ld->id_jadwal.'" data-on-label="On" data-off-label="Off"></label>';
        	}

            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $ld->hari;
            $row[] = $ld->nm_kelas;
            $row[] = $ld->jam_mulai;
            $row[] = $ld->jam_selesai;
            $row[] = $ld->nm_mapel;
            $row[] = $html_stat;
            $row[] = '&nbsp;<button 
                                type="button" data-id="'.$ld->id_jadwal.'" data-action="edit" 
                                class="action btn btn-xs btn-icon waves-effect btn-info m-b-5 tooltip-hover tooltipstered"
                                title="Ubah"> <i class="fa fa-pencil"></i> 
                        </button>
                        &nbsp;<button 
                                type="button" data-id="'.$ld->id_jadwal.'" data-master="m_mapel_tingkat" data-col="id_jadwal" data-action="delete" 
                                class="action btn btn-xs btn-icon waves-effect btn-danger m-b-5 tooltip-hover tooltipstered"
                                title="delete"> <i class="fa fa-remove"></i> 
                        </button>';

            $data[] = $row;
        }

        $output = array(
	            "draw" => $_POST['draw'],
	            "recordsFiltered" => $this->M_admin->count_filtered($table, $column_order, $column_search, $order, $condition),
	            "recordsTotal" => $this->M_admin->count_all($table, $condition),
	            "data" => $data,
            );
        echo json_encode($output);
    }

    function showMapelTingkat(){
        $table          = 'v_mapel_tingkat';
		
        $column_order   = array(null, 'nm_mapel', 'jurusan', 'tingkat',  null, null); 
        $column_search  = array('nm_mapel', 'jurusan', 'tingkat'); 
        $order          = array('id_mapel_tingkat' => 'asc');

        $condition      =   [];
        $condition[]    =   ['id_sekolah', $this->session->userdata('id_sekolah'), 'where'];

        $list_data   	= $this->M_admin->get_datatables($table, $column_order, $column_search, $order, $condition);
        $data           = array();
        $no             = $_POST['start'];
        foreach ($list_data as $ld) {
        	$status 	= $ld->aktif;

            if ($status == 1) {
				$html_stat 	= '<input class="action" data-action="aktif" data-id_mapel_tingkat="'.$ld->id_mapel_tingkat.'" 
								type="checkbox" id="lbl-'.$ld->nm_mapel.'" checked switch="none" >
                                    <label for="lbl-'.$ld->id_mapel_tingkat.'" data-on-label="On" data-off-label="Off"></label>';
        	} else {
				$html_stat 	= '<input class="action" data-action="aktif" data-id_mapel_tingkat="'.$ld->id_mapel_tingkat.'" 
								type="checkbox" id="lbl-'.$ld->nm_mapel.'" switch="none" >
									<label for="lbl-'.$ld->id_mapel_tingkat.'" data-on-label="On" data-off-label="Off"></label>';
        	}

            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $ld->nm_mapel;
            $row[] = $ld->jurusan;
            $row[] = $ld->tingkat;
            $row[] = $html_stat;
            $row[] = '&nbsp;<button 
                                type="button" data-id="'.$ld->id_mapel_tingkat.'" data-action="edit" 
                                class="action btn btn-xs btn-icon waves-effect btn-info m-b-5 tooltip-hover tooltipstered"
                                title="Ubah"> <i class="fa fa-pencil"></i> 
                        </button>
                        &nbsp;<button 
                                type="button" data-id="'.$ld->id_mapel_tingkat.'" data-master="m_mapel_tingkat" data-col="id_mapel_tingkat" data-action="delete" 
                                class="action btn btn-xs btn-icon waves-effect btn-danger m-b-5 tooltip-hover tooltipstered"
                                title="delete"> <i class="fa fa-remove"></i> 
                        </button>';

            $data[] = $row;
        }

        $output = array(
	            "draw" => $_POST['draw'],
	            "recordsFiltered" => $this->M_admin->count_filtered($table, $column_order, $column_search, $order, $condition),
	            "recordsTotal" => $this->M_admin->count_all($table, $condition),
	            "data" => $data,
            );
        echo json_encode($output);
    }


    function showDataKls(){
        $table          = 'm_kelas';
		
        $column_order   = array(null, 'nm_kelas', null, null); 
        $column_search  = array('nm_kelas'); 
        $order          = array('id_kelas' => 'asc');

        $condition      =   [];
        $condition[]    =   ['id_sekolah', $this->session->userdata('id_sekolah'), 'where'];

        $list_data   	= $this->M_admin->get_datatables($table, $column_order, $column_search, $order, $condition);
        $data           = array();
        $no             = $_POST['start'];
        foreach ($list_data as $ld) {
        	$status 	= $ld->aktif;

            if ($status == 1) {
				$html_stat 	= '<input class="action" data-action="aktif" data-id_kelas="'.$ld->id_kelas.'" 
								type="checkbox" id="lbl-'.$ld->nm_kelas.'" checked switch="none" >
                                    <label for="lbl-'.$ld->id_kelas.'" data-on-label="On" data-off-label="Off"></label>';
        	} else {
				$html_stat 	= '<input class="action" data-action="aktif" data-id_kelas="'.$ld->id_kelas.'" 
								type="checkbox" id="lbl-'.$ld->nm_kelas.'" switch="none" >
									<label for="lbl-'.$ld->id_kelas.'" data-on-label="On" data-off-label="Off"></label>';
        	}

            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $ld->nm_kelas;
            $row[] = $html_stat;
            $row[] = '&nbsp;<button 
                                type="button" data-id="'.$ld->id_kelas.'" data-action="edit" 
                                class="action btn btn-xs btn-icon waves-effect btn-info m-b-5 tooltip-hover tooltipstered"
                                title="Ubah"> <i class="fa fa-pencil"></i> 
                        </button>
                        &nbsp;<button 
                                type="button" data-id="'.$ld->id_kelas.'" data-master="m_kelas" data-col="id_kelas" data-action="delete" 
                                class="action btn btn-xs btn-icon waves-effect btn-danger m-b-5 tooltip-hover tooltipstered"
                                title="delete"> <i class="fa fa-remove"></i> 
                        </button>';

            $data[] = $row;
        }

        $output = array(
	            "draw" => $_POST['draw'],
	            "recordsFiltered" => $this->M_admin->count_filtered($table, $column_order, $column_search, $order, $condition),
	            "recordsTotal" => $this->M_admin->count_all($table, $condition),
	            "data" => $data,
            );
        echo json_encode($output);
    }

    
    function showDataGuruMapel(){
        $table          = 'v_guru_mapel';
		
        $column_order   = array(null, 'nm_mapel','nm_guru', null, null); 
        $column_search  = array('nm_mapel', 'nm_guru'); 
        $order          = array('id_guru_mapel' => 'asc');

        $condition      =   [];
        // $cond           =   !empty($this->session->userdata('id_sekolah')) ? ['id_sekolah', $this->session->userdata('id_sekolah'), 'where'] : '';
        
        $condition[]    =   ['id_sekolah', $this->session->userdata('id_sekolah'), 'where'];
        $list_data   	= $this->M_admin->get_datatables($table, $column_order, $column_search, $order, $condition);
        $data           = array();
        $no             = $_POST['start'];
        foreach ($list_data as $ld) {
        	$status 	= $ld->aktif;

            if ($status == 1) {
				$html_stat 	= '<input class="action" data-action="aktif" data-id_guru_mapel="'.$ld->id_guru_mapel.'" 
								type="checkbox" id="lbl-'.$ld->nm_mapel.'" checked switch="none" >
                                    <label for="lbl-'.$ld->id_guru_mapel.'" data-on-label="On" data-off-label="Off"></label>';
        	} else {
				$html_stat 	= '<input class="action" data-action="aktif" data-id_guru_mapel="'.$ld->id_guru_mapel.'" 
								type="checkbox" id="lbl-'.$ld->nm_mapel.'" switch="none" >
									<label for="lbl-'.$ld->id_guru_mapel.'" data-on-label="On" data-off-label="Off"></label>';
        	}

            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $ld->nm_mapel;
            $row[] = $ld->nm_guru;
            $row[] = $html_stat;
            $row[] = '&nbsp;<button 
                                type="button" data-id="'.$ld->id_guru_mapel.'" data-action="edit" 
                                class="action btn btn-xs btn-icon waves-effect btn-info m-b-5 tooltip-hover tooltipstered"
                                title="Ubah"> <i class="fa fa-pencil"></i> 
                        </button>
                        &nbsp;<button 
                                type="button" data-id="'.$ld->id_guru_mapel.'" data-master="m_guru_mapel" data-col="id_guru_mapel" data-action="delete" 
                                class="action btn btn-xs btn-icon waves-effect btn-danger m-b-5 tooltip-hover tooltipstered"
                                title="delete"> <i class="fa fa-remove"></i> 
                        </button>';

            $data[] = $row;
        }

        $output = array(
	            "draw" => $_POST['draw'],
	            "recordsFiltered" => $this->M_admin->count_filtered($table, $column_order, $column_search, $order, $condition),
	            "recordsTotal" => $this->M_admin->count_all($table, $condition),
	            "data" => $data,
            );
        echo json_encode($output);
    }

    function showDataWalikelas(){
        $table          = 'v_walikelas';
		
        $column_order   = array(null, 'nm_kelas','nm_guru', null, null); 
        $column_search  = array('nm_kelas', 'nm_guru'); 
        $order          = array('id_walikelas' => 'asc');

        $condition      =   [];
        $condition[]    =   ['id_sekolah', $this->session->userdata('id_sekolah'), 'where'];
        $list_data   	= $this->M_admin->get_datatables($table, $column_order, $column_search, $order, $condition);
        $data           = array();
        $no             = $_POST['start'];
        foreach ($list_data as $ld) {
        	$status 	= $ld->aktif;

            if ($status == 1) {
				$html_stat 	= '<input class="action" data-action="aktif" data-id_walikelas="'.$ld->id_walikelas.'" 
								type="checkbox" id="lbl-'.$ld->nm_kelas.'" checked switch="none" >
                                    <label for="lbl-'.$ld->id_walikelas.'" data-on-label="On" data-off-label="Off"></label>';
        	} else {
				$html_stat 	= '<input class="action" data-action="aktif" data-id_walikelas="'.$ld->id_walikelas.'" 
								type="checkbox" id="lbl-'.$ld->nm_kelas.'" switch="none" >
									<label for="lbl-'.$ld->id_walikelas.'" data-on-label="On" data-off-label="Off"></label>';
        	}

            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $ld->nm_kelas;
            $row[] = $ld->nm_guru;
            $row[] = $html_stat;
            $row[] = '&nbsp;<button 
                                type="button" data-id="'.$ld->id_walikelas.'" data-action="edit" 
                                class="action btn btn-xs btn-icon waves-effect btn-info m-b-5 tooltip-hover tooltipstered"
                                title="Ubah"> <i class="fa fa-pencil"></i> 
                        </button>
                        &nbsp;<button 
                                type="button" data-id="'.$ld->id_walikelas.'" data-master="m_walikelas" data-col="id_walikelas" data-action="delete" 
                                class="action btn btn-xs btn-icon waves-effect btn-danger m-b-5 tooltip-hover tooltipstered"
                                title="delete"> <i class="fa fa-remove"></i> 
                        </button>';

            $data[] = $row;
        }

        $output = array(
	            "draw" => $_POST['draw'],
	            "recordsFiltered" => $this->M_admin->count_filtered($table, $column_order, $column_search, $order, $condition),
	            "recordsTotal" => $this->M_admin->count_all($table, $condition),
	            "data" => $data,
            );
        echo json_encode($output);
    }

    function kelasAction($action){
        if($action == 'aktif'){

            $response = $this->actionActiveHandler('id_kelas', 'm_kelas');

        }elseif($action == 'add'){
            $id_kelas   =   $this->input->post('id_kelas');
            $id_ta      =   $this->input->post('id_ta');
            $id_jurusan =   $this->input->post('id_jurusan');
            $id_tingkat =   $this->input->post('id_tingkat');
            $urutan     =   $this->input->post('urutan_kelas');
            $nm_kelas   =   $this->input->post('nm_kelas');
          
            $data  = [
                'id_kelas'      =>  $id_kelas,
                'id_ta'         =>  $id_ta,
                'id_jurusan'    =>  $id_jurusan,
                'id_tingkat'    =>  $id_tingkat,
                'urutan_kelas'  =>  $urutan,
                'nm_kelas'      =>  $nm_kelas,
                'id_sekolah'    =>  $this->session->userdata('id_sekolah')
            ];


         
            $insertUser =  $this->M_admin->insert_data('m_kelas', $data);

            $response 	= ['status' => 'OKE'];

        }elseif($action == 'edit'){
            $id_kelas   =   $this->input->post('id_kelas');
            $id_ta      =   $this->input->post('id_ta');
            $id_jurusan =   $this->input->post('id_jurusan');
            $id_tingkat =   $this->input->post('id_tingkat');
            $urutan     =   $this->input->post('urutan_kelas');
            $nm_kelas   =   $this->input->post('nm_kelas');
        
            $data  = [
                'id_kelas'      =>  $id_kelas,
                'id_ta'         =>  $id_ta,
                'id_jurusan'    =>  $id_jurusan,
                'id_tingkat'    =>  $id_tingkat,
                'urutan_kelas'  =>  $urutan,
                'nm_kelas'      =>  $nm_kelas,
                'id_sekolah'    =>  $this->session->userdata('id_sekolah')
            ];
         
            $response = $this->actionInsertUpdateHandler($data['id_kelas'],'id_kelas', $data, 'm_kelas');
            
        }elseif($action == 'detail'){

            $id_kelas = $this->input->post('id_kelas');
           
			$condition 		= [];
			$condition[] 	= ['id_kelas', $id_kelas, 'where'];
            $response 		= $this->M_admin->get_master_spec('m_kelas', 'id_kelas, nm_kelas, id_ta, id_jenjang, id_jurusan, id_tingkat, urutan_kelas', $condition)->row_array();
           
            $response['ta']         =   $this->M_core->listSelected($this->session->userdata('id_sekolah') ,'m_ta_tbl', 'aktif', 1, 'id_ta', $response['id_ta'], 'id_ta', 'teks_ta', '-- Pilih Tahun Ajaran --');
            $response['jurusan']    =   $this->M_core->listSelected($this->session->userdata('id_sekolah') ,'m_jurusan_tbl', 'aktif', 1, 'id_jurusan', $response['id_jurusan'], 'id_jurusan', 'akronim', '-- Pilih Jurusan --');
            $response['tingkat']    =   $this->M_core->listSelected($this->session->userdata('id_sekolah') ,'m_tingkat_tbl', 'aktif', 1, 'id_tingkat', $response['id_tingkat'], 'id_tingkat', 'tingkat', '-- Pilih Tingkat --');
            $response['jenjang']    =   $this->M_core->listSelected($this->session->userdata('id_sekolah') ,'m_jenjang_tbl', 'aktif', 1, 'id_jenjang', $response['id_jenjang'], 'id_jenjang', 'jenjang', '-- Pilih Jenjang --');
        }
     

        echo json_encode($response);
    }

    function mapelTingkatAction($action){
        if($action == 'aktif'){

            $response = $this->actionActiveHandler('id_mapel_tingkat', 'm_mapel_tingkat');

        }elseif($action == 'add'){
            $id_mapel_tingkat =   $this->input->post('id_mapel_tingkat');
            $id_jurusan =   $this->input->post('id_jurusan');
            $id_tingkat =   $this->input->post('id_tingkat');
            $id_mapel   =   $this->input->post('id_mapel');
            
            $result =   [];
            for($i=0;$i<count($id_mapel);$i++){
               
                $data   =   [];
                $data['id_jurusan']     =   $id_jurusan;
                $data['id_tingkat']     =   $id_tingkat;
                $data['id_mapel']       =   $id_mapel[$i];
                $data['id_sekolah']     =   $this->session->userdata('id_sekolah');
                $result[] = $data;
            }
          
            $insertUser =  $this->M_admin->insert_data_batch('m_mapel_tingkat', $result);

            $response 	= ['status' => 'OKE'];

        }elseif($action == 'edit'){
            $id_mapel_tingkat =   $this->input->post('id_mapel_tingkat');
            $id_jurusan =   $this->input->post('id_jurusan');
            $id_tingkat =   $this->input->post('id_tingkat');
            $id_mapel   =   $this->input->post('id_mapel');
          
            $data  = [
                'id_mapel_tingkat'    =>  $id_mapel_tingkat,
                'id_jurusan'    =>  $id_jurusan,
                'id_tingkat'    =>  $id_tingkat,
                'id_mapel'    =>  $id_mapel[0],
                'id_sekolah'    =>   $this->session->userdata('id_sekolah')
            ];
           
            $response = $this->actionInsertUpdateHandler($data['id_mapel_tingkat'],'id_mapel_tingkat', $data, 'm_mapel_tingkat');
            
        }elseif($action == 'detail'){

            $id_mapel_tingkat = $this->input->post('id_mapel_tingkat');
           
			$condition 		= [];
			$condition[] 	= ['id_mapel_tingkat', $id_mapel_tingkat, 'where'];
            $response 		= $this->M_admin->get_master_spec('m_mapel_tingkat', 'id_mapel_tingkat, id_jurusan, id_tingkat, id_mapel', $condition)->row_array();
           
            $response['jurusan']    =   $this->M_core->listSelected($this->session->userdata('id_sekolah'), 'm_jurusan_tbl', 'aktif', 1, 'id_jurusan', $response['id_jurusan'], 'id_jurusan', 'akronim', '-- Pilih Jurusan --');
            $response['tingkat']    =   $this->M_core->listSelected($this->session->userdata('id_sekolah'), 'm_tingkat_tbl', 'aktif', 1, 'id_tingkat', $response['id_tingkat'], 'id_tingkat', 'tingkat', '-- Pilih Tingkat --');
            $response['mapel']      =   $this->M_core->listSelected($this->session->userdata('id_sekolah'), 'm_mapel', 'aktif', 1, 'id_mapel', $response['id_mapel'], 'id_mapel', 'nm_mapel', '-- Pilih Matapelajaran --');
        }
     

        echo json_encode($response);
    }

    function guruMapelAction($action){
       
        if($action == 'aktif'){

            $response = $this->actionActiveHandler('id_guru_mapel', 'm_guru_mapel');

        }elseif($action == 'add'){
           
            $data  = [
                'id_guru_mapel' =>  $this->input->post('id_guru_mapel'),
                'id_guru'       =>  $this->input->post('id_guru'),
                'id_mapel'      =>  $this->input->post('id_mapel')
            ];
    
            $insertUser =  $this->M_admin->insert_data('m_guru_mapel', $data);

            $response 	= ['status' => 'OKE'];

        }elseif($action == 'edit'){
            
            $data  = [
                'id_guru_mapel' =>  $this->input->post('id_guru_mapel'),
                'id_guru'       =>  $this->input->post('id_guru'),
                'id_mapel'      =>  $this->input->post('id_mapel')
            ];

            $response = $this->actionInsertUpdateHandler($data['id_guru_mapel'],'id_guru_mapel', $data, 'm_guru_mapel');
            
        }elseif($action == 'detail'){

            $id_guru_mapel = $this->input->post('id_guru_mapel');

			$condition 		= [];
			$condition[] 	= ['id_guru_mapel', $id_guru_mapel, 'where'];
			$response 		= $this->M_admin->get_master_spec('m_guru_mapel', 'id_guru_mapel, id_guru, id_mapel', $condition)->row_array();
            $response['guru']     =   $this->M_core->listSelected($this->session->userdata('id_sekolah'), 'm_guru', 'aktif', 1, 'id_guru', $response['id_guru'], 'id_guru', 'nm_guru', '-- Pilih Guru --');
            $response['mapel']    =   $this->M_core->listSelected($this->session->userdata('id_sekolah'), 'm_mapel', 'aktif', 1, 'id_mapel', $response['id_mapel'], 'id_mapel', 'nm_mapel', '-- Pilih Matapelajaran --');
          
        }

        echo json_encode($response);
    }

    function walikelasAction($action){
       
        if($action == 'aktif'){

            $response = $this->actionActiveHandler('id_walikelas', 'm_walikelas');

        }elseif($action == 'add'){
           
            $data  = [
                'id_walikelas' =>  $this->input->post('id_walikelas'),
                'id_guru'       =>  $this->input->post('id_guru'),
                'id_kelas'      =>  $this->input->post('id_kelas')
            ];
    
            $insertUser =  $this->M_admin->insert_data('m_walikelas', $data);

            $response 	= ['status' => 'OKE'];

        }elseif($action == 'edit'){
            
            $data  = [
                'id_walikelas' =>  $this->input->post('id_walikelas'),
                'id_guru'       =>  $this->input->post('id_guru'),
                'id_kelas'      =>  $this->input->post('id_kelas')
            ];

            $response = $this->actionInsertUpdateHandler($data['id_walikelas'],'id_walikelas', $data, 'm_walikelas');
            
        }elseif($action == 'detail'){

            $id_walikelas = $this->input->post('id_walikelas');

			$condition 		     =  [];
			$condition[] 	     =  ['id_walikelas', $id_walikelas, 'where'];
			$response 		     =  $this->M_admin->get_master_spec('m_walikelas', 'id_walikelas, id_guru, id_kelas', $condition)->row_array();
            $response['guru']    =  $this->M_core->listSelected($this->session->userdata('id_sekolah'), 'm_guru', 'aktif', 1, 'id_guru', $response['id_guru'], 'id_guru', 'nm_guru', '-- Pilih Guru --');
            $response['kelas']   =  $this->M_core->listSelectedDefNol($this->session->userdata('id_sekolah'), 'm_kelas', 'aktif', 1, 'id_kelas', $response['id_kelas'], 'id_kelas', 'nm_kelas', '-- Pilih Kelas --');
          
        }

        echo json_encode($response);
    }


    function jadwalAction($action){
       
        if($action == 'aktif'){

            $response = $this->actionActiveHandler('id_jadwal', 'm_jadwal_pelajaran');

        }elseif($action == 'add'){
            $id_jadwal      =   $this->input->post('id_jadwal');
            $nm_hari        =   $this->input->post('nm_hari');
            $jam_mulai      =   $this->input->post('jam_mulai');
            $jam_selesai    =   $this->input->post('jam_selesai');
            $id_kelas       =   $this->input->post('id_kelas');
            $id_mapel       =   $this->input->post('id_mapel');
             
            $result =   [];
            for($i=0;$i<count($nm_hari);$i++){
                $data   =   [];
                $data['hari']      =   $nm_hari[$i];  
                $data['jam_mulai']    =   $jam_mulai[$i];  
                $data['jam_selesai']  =   $jam_selesai[$i];  
                $data['id_kelas']     =   $id_kelas;  
                $data['id_mapel']     =   $id_mapel[$i];  
                $data['id_sekolah']   =   $this->session->userdata('id_sekolah');
                $result[]   =   $data;
            }

            $insertUser =  $this->M_admin->insert_data_batch('m_jadwal_pelajaran', $result);

            $response 	= ['status' => 'OKE'];

        }elseif($action == 'edit'){
            $id_jadwal      =   $this->input->post('id_jadwal');
            $nm_hari        =   $this->input->post('hari');
            $jam_mulai      =   $this->input->post('mulai');
            $jam_selesai    =   $this->input->post('selesai');
            $id_kelas       =   $this->input->post('id_kelas');
            $id_mapel       =   $this->input->post('mapel');

            $data  = [
                'id_jadwal'     =>  $id_jadwal,
                'hari'          =>  $nm_hari,
                'jam_mulai'     =>  $jam_mulai,
                'jam_selesai'   =>  $jam_selesai,
                'id_kelas'      =>  $id_kelas,
                'id_mapel'      =>  $id_mapel,
                'id_sekolah'    =>  $this->session->userdata('id_sekolah')
            ];

            $response = $this->actionInsertUpdateHandler($data['id_jadwal'],'id_jadwal', $data, 'm_jadwal_pelajaran');
            
        }elseif($action == 'detail'){

            $id_jadwal = $this->input->post('id_jadwal');

			$condition 		     =  [];
			$condition[] 	     =  ['id_jadwal', $id_jadwal, 'where'];
			$response 		     =  $this->M_admin->get_master_spec('m_jadwal_pelajaran', '*', $condition)->row_array();
            $response['mapel']   =  $this->M_core->listSelected($this->session->userdata('id_sekolah'), 'm_mapel', 'aktif', 1, 'id_mapel', $response['id_mapel'], 'id_mapel', 'nm_mapel', '-- Pilih Matapelajaran --');
            $response['kelas']   =  $this->M_core->listSelected($this->session->userdata('id_sekolah'), 'm_kelas', 'aktif', 1, 'id_kelas', $response['id_kelas'], 'id_kelas', 'nm_kelas', '-- Pilih Kelas --');
          
        }

        echo json_encode($response);
    }


    function submitKelas(){
        $id_jenjang =   $this->input->post('id_jenjang_pilih');
        $id_ta      =   $this->input->post('id_ta_pilih');
        $id_tingkat =   $this->input->post('id_tingkat_pilih');
        $id_jurusan =   $this->input->post('id_jurusan_pilih');
        $urutan     =   $this->input->post('urutan_pilih');
        $nm_kelas   =   $this->input->post('nm_kelas_pilih');

        $result     =   [];
        for($i=0;$i<count($id_jenjang);$i++){
            $data   =   [];
            $data['id_jenjang']     =   $id_jenjang[$i];
            $data['id_tingkat']     =   $id_tingkat[$i];
            $data['id_ta']          =   $id_ta[$i];
            $data['id_jurusan']     =   $id_jurusan[$i];
            $data['urutan_kelas']   =   $urutan[$i];
            $data['nm_kelas']       =   $nm_kelas[$i];
            $data['id_sekolah']     =   $this->session->userdata('id_sekolah');
            
            $result[] =   $data;
        }
        $insertKelas    =   $this->M_admin->insert_data_batch('m_kelas', $result);

        echo json_encode(['response' => TRUE]);
        
    }

    function submitGuruMapel(){
        $id_mapel   =   $this->input->post('id_mapel_pilih');
        $id_guru    =   $this->input->post('id_guru_pilih');
       
        $result     =   [];
        for($i=0;$i<count($id_mapel);$i++){
            $data   =   [];
            $data['id_guru']     =   $id_guru[$i];
            $data['id_mapel']    =   $id_mapel[$i];
            $Data['id_sekolah']  =   $this->session->userdata('id_sekolah');
            
            $result[] =   $data;
        }
        $insertKelas    =   $this->M_admin->insert_data_batch('m_guru_mapel', $result);

        echo json_encode(['response' => TRUE]);
        
    }


    function submitWalikelas(){
        $id_guru    =   $this->input->post('id_guru');
        $id_kelas   =   $this->input->post('id_kelas');

        $result     =   [];
        for($i=0;$i<count($id_guru);$i++){
            $data   =   [];
            $data['id_guru']     =   $id_guru[$i];
            $data['id_kelas']    =   $id_kelas[$i];
            $data['id_sekolah']  =   $this->session->userdata('id_sekolah');
            
            $result[] =   $data;
        }
      
        $insertWalikelas    =   $this->M_admin->insert_data_batch('m_walikelas', $result);
        
        echo json_encode(['response' => TRUE]); 
    }

    function showDataKelas(){
        $id_ta          =   $this->input->post('id_ta');
        $id_jenjang     =   $this->input->post('id_jenjang');
      
        $dataKelas = $this->db->query('SELECT id_kelas, id_jenjang, id_ta, id_jurusan, id_tingkat, urutan_kelas, nm_kelas FROM `m_kelas` WHERE `aktif` = 1 AND `id_ta` = '.$id_ta.' AND `id_jenjang` = '.$id_jenjang.'
        AND id_sekolah = '.$this->session->userdata('id_sekolah').' AND NOT EXISTS ( SELECT id_kelas FROM m_walikelas WHERE m_kelas.id_kelas = m_walikelas.id_kelas AND m_walikelas.aktif = 1)')->result_array();
    
        $d['dataKelas']  =   $dataKelas;
       
        $d['guru']       = $this->M_core->listSelect($this->session->userdata('id_sekolah'), 'm_guru', 'nm_guru', 'id_guru', '-- Pilih Guru --');
        $tampilSiswa     =   $this->load->view('showDataKelas', $d, TRUE);
        echo json_encode($tampilSiswa);
    }

    function showFormJadwal(){
        $id_kelas          =   $this->input->post('id_kelas');
     
        $condition    =   [];
        $condition[]  =   ['aktif', 1, 'where'];
        $listDay      =   $this->M_admin->get_master_spec('m_hari', 'id_hari, nm_hari', $condition)->result_array();

        $d['listDay']   =   $listDay;
        $d['id_kelas']   =   $id_kelas;

        $tampilFormJadwal = $this->load->view('showFormJadwal', $d, TRUE);
        echo json_encode($tampilFormJadwal);
    }

    function addRowJadwal(){
        $idKelas = $this->input->post('idKelas');
        $condition    =   [];
        $condition[]  =   ['aktif', 1, 'where'];
        $listDay      =   $this->M_admin->get_master_spec('m_hari', 'id_hari, nm_hari', $condition)->result_array();
        $condition      =   [];
        $condition[]    =   ['id_kelas', $idKelas, 'where'];
        $dataKelas      =   $this->M_admin->get_master_spec('m_kelas', 'id_ta, id_jenjang, id_tingkat, id_jurusan, nm_kelas', $condition)->row_array();
    
        $dataMapel = $this->db->query(
            'SELECT id_mapel, nm_mapel 
                FROM `m_mapel` 
                WHERE `aktif` = 1 
                AND EXISTS ( 
                    SELECT id_mapel 
                        FROM m_mapel_tingkat 
                        WHERE m_mapel.id_mapel = m_mapel_tingkat.id_mapel 
                        AND m_mapel_tingkat.id_jurusan = '.$dataKelas['id_jurusan'].' 
                        AND m_mapel_tingkat.id_tingkat = '.$dataKelas['id_tingkat'].')')->result_array();

        $d['dataMapel'] =   $dataMapel;
        $d['listDay']   =   $listDay;
        $tampilFormJadwal = $this->load->view('rowJadwal', $d, TRUE);
        echo json_encode($tampilFormJadwal);
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
	

    


    

   
}