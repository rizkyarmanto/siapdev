<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	 
class Pengolahan_siswa extends CI_Controller {

	function __construct() {
        parent::__construct();
        if(empty($this->session->userdata('id_user'))){
			redirect('user','refresh');
		}
       
    }

    function index() {
        $d['title'] = 'Pengolahan Siswa';
        $d['page']  = 'menu';
        $d['title_page'] = 'Pengolahan Siswa';
        $d['menu']  = 'Pengolahan Siswa';
        $this->load->view('layout', $d);
    }

    function penempatan_kelas_baru(){
        $d['title']         = 'Penempatan Kelas';
        $d['submenu']       = 'Penempatan Kelas';
        $d['page']          = 'penenpatan_kls';
        $d['title_page']    = 'Penempatan Kelas';
        $d['menu']          = 'Penempatan Kelas';
        $d['ta']            = $this->M_core->listSelect($this->session->userdata('id_sekolah'), 'm_ta_tbl', 'teks_ta', 'id_ta', '-- Pilih Tahun Ajaran --');
        $d['jenjang']       = $this->M_core->listSelect($this->session->userdata('id_sekolah'), 'm_jenjang_tbl', 'jenjang', 'id_jenjang', '-- Pilih Jenjang --');

        $this->load->view('layout', $d);
    }

    function generate_nis(){
        $d['title'] = 'Generate NIS';
        $d['submenu'] = 'Generate NIS';
        $d['page']  = 'gen_nis';
        $d['title_page'] = 'Generate NIS';
        $d['menu']  = 'Generate NIS';

        $d['ta']   = $this->M_core->listSelect($this->session->userdata('id_sekolah'), 'm_ta_tbl', 'teks_ta', 'id_ta', '-- Pilih Tahun Ajaran --');
        $d['jenjang']       = $this->M_core->listSelect($this->session->userdata('id_sekolah'), 'm_jenjang_tbl', 'jenjang', 'id_jenjang', '-- Pilih Jenjang --');
        $this->load->view('layout', $d);
    }

    function profil_siswa(){
        $d['title']         =   'Profil Siswa';
        $d['submenu']       =   'Profil Siswa';
        $d['page']          =   'profil_siswa';
        $d['title_page']    =   'Profil Siswa';
        $d['menu']          =   'Profil Siswa';
       
        $d['ta']            = $this->M_core->listSelect($this->session->userdata('id_sekolah'), 'm_ta_tbl', 'teks_ta', 'id_ta', '-- Pilih Tahun Ajaran --');
        $d['jenjang']       = $this->M_core->listSelect($this->session->userdata('id_sekolah'), 'm_jenjang_tbl', 'jenjang', 'id_jenjang', '-- Pilih Jenjang --');
        $d['tingkat']       = $this->M_core->listSelect($this->session->userdata('id_sekolah'), 'm_tingkat_tbl', 'tingkat', 'id_tingkat', '-- Pilih Tingkat --');
        $this->load->view('layout', $d);
    }

      
    function absensi_siswa(){
        $d['title']         =   'Absensi Siswa';
        $d['submenu']       =   'Absensi Siswa';
        $d['page']          =   'absensi_siswa';
        $d['title_page']    =   'Absensi Siswa';
        $d['menu']          =   'Absensi Siswa';
        
        $d['kelas']         = $this->M_core->listSelect($this->session->userdata('id_sekolah'), 'm_kelas', 'nm_kelas', 'id_kelas', '-- Pilih Kelas --');
        $d['ta']            = $this->M_core->listSelect($this->session->userdata('id_sekolah'), 'm_ta_tbl', 'teks_ta', 'id_ta', '-- Pilih Tahun Ajaran --');
        $d['jenjang']       = $this->M_core->listSelect($this->session->userdata('id_sekolah'), 'm_jenjang_tbl', 'jenjang', 'id_jenjang', '-- Pilih Jenjang --');
        $d['tingkat']       = $this->M_core->listSelect($this->session->userdata('id_sekolah'), 'm_tingkat_tbl', 'tingkat', 'id_tingkat', '-- Pilih Tingkat --');
        $d['jurusan']       = $this->M_core->listSelect($this->session->userdata('id_sekolah'), 'm_jurusan_tbl', 'jurusan', 'id_jurusan', '-- Pilih Jurusan --');
        

        $this->load->view('layout', $d);
    }

    function data_kelas_siswa(){
        $d['title']         =   'Penempatan Kelas Baru';
        $d['submenu']       =   'Penempatan Kelas Baru';
        $d['page']          =   'penempatan_kelas_baru';
        $d['title_page']    =   'Penempatan Kelas Baru';
        $d['menu']          =   'Penempatan Kelas Baru';
        $d['siswa']         = $this->M_core->listSelect($this->session->userdata('id_sekolah'), 'm_siswa', 'nm_siswa', 'id_siswa', '-- Pilih Siswa --');
        $d['kelas']         = $this->M_core->listSelect($this->session->userdata('id_sekolah'), 'm_kelas', 'nm_kelas', 'id_kelas', '-- Pilih Kelas --');
        $this->load->view('layout', $d);
    }

    function penempatan_kenaikan_kls(){
        $d['title']         =   'Penempatan Kenaikan Kelas';
        $d['submenu']       =   'Penempatan Kenaikan Kelas';
        $d['page']          =   'penempatan_kenaikan_kls';
        $d['title_page']    =   'Penempatan Kenaikan Kelas';
        $d['menu']          =   'Penempatan Kenaikan Kelas';

        $d['ta']            = $this->M_core->listSelect($this->session->userdata('id_sekolah'), 'm_ta_tbl', 'teks_ta', 'id_ta', '-- Pilih Tahun Ajaran --');
        $d['jenjang']       = $this->M_core->listSelect($this->session->userdata('id_sekolah'), 'm_jenjang_tbl', 'jenjang', 'id_jenjang', '-- Pilih Jenjang --');
        $d['tingkat']       = $this->M_core->listSelect($this->session->userdata('id_sekolah'), 'm_tingkat_tbl', 'tingkat', 'id_tingkat', '-- Pilih Tingkat --');
        $d['jurusan']       = $this->M_core->listSelect($this->session->userdata('id_sekolah'), 'm_jurusan_tbl', 'jurusan', 'id_jurusan', '-- Pilih Jurusan --');

        $this->load->view('layout', $d);
    }

    function catatan_siswa(){
        $d['title']         =   'Catatan Siswa';
        $d['submenu']       =   'Catatan Siswa';
        $d['page']          =   'catatan_siswa';
        $d['title_page']    =   'Catatan Siswa';
        $d['menu']          =   'Catatan Siswa';
        
        $d['siswa']         = $this->M_core->listSelect($this->session->userdata('id_sekolah'), 'm_siswa', 'nm_siswa', 'id_siswa', '-- Pilih Siswa --');
        $d['kelas']         = $this->M_core->listSelect($this->session->userdata('id_sekolah'), 'm_kelas', 'nm_kelas', 'id_kelas', '-- Pilih Kelas --');

        $this->load->view('layout', $d);
    }

    function kelulusan(){
        $d['title']         =   'Kelulusan';
        $d['submenu']       =   'Kelulusan';
        $d['page']          =   'kelulusan';
        $d['title_page']    =   'Kelulusan';
        $d['menu']          =   'Kelulusan';
        $d['kelas']         =   $this->M_core->listSelectSiswa($this->session->userdata('id_sekolah'));
        $d['ta']            =   $this->M_core->listSelectTA($this->session->userdata('id_sekolah'));
        $d['jenjang']       =   $this->M_core->listSelectJenjang($this->session->userdata('id_sekolah'));

        $condition          =   [];
        $condition[]        =   ['aktif', 1, 'where'];
        $condition[]        =   ['id_sekolah', $this->session->userdata('id_sekolah'), 'where'];
        $getMaxTingkat      =   $this->M_admin->get_max_number('m_tingkat_tbl', 'id_tingkat', $condition);
        
        $d['tingkat']       =   $this->M_core->getListSelectDefNol('m_tingkat_tbl', 'id_tingkat', $getMaxTingkat, 'id_tingkat', 'tingkat', '-- Pilih Tingkat --');

        $d['jurusan']       = $this->M_core->listSelect($this->session->userdata('id_sekolah'), 'm_jurusan_tbl', 'jurusan', 'id_jurusan', '-- Pilih Jurusan --');
        $this->load->view('layout', $d);
    }

    function mutasi_keluar(){
        $d['title']         =   'Mutasi Keluar';
        $d['submenu']       =   'Mutasi Keluar';
        $d['page']          =   'mutasi_keluar';
        $d['title_page']    =   'Mutasi Keluar';
        $d['menu']          =   'Mutasi Keluar';

        $d['kelas']         = $this->M_core->listSelect($this->session->userdata('id_sekolah'), 'm_kelas', 'nm_kelas', 'id_kelas', '-- Pilih Kelas --');
        $d['ta']            = $this->M_core->listSelect($this->session->userdata('id_sekolah'), 'm_ta_tbl', 'teks_ta', 'id_ta', '-- Pilih Tahun Ajaran --');
        $d['jenjang']       = $this->M_core->listSelect($this->session->userdata('id_sekolah'), 'm_jenjang_tbl', 'jenjang', 'id_jenjang', '-- Pilih Jenjang --');
        $d['tingkat']       = $this->M_core->listSelect($this->session->userdata('id_sekolah'), 'm_tingkat_tbl', 'tingkat', 'id_tingkat', '-- Pilih Tingkat --');
        $d['jurusan']       = $this->M_core->listSelect($this->session->userdata('id_sekolah'), 'm_jurusan_tbl', 'jurusan', 'id_jurusan', '-- Pilih Jurusan --');
        $this->load->view('layout', $d);
    }

    function mutasi_masuk(){
        $d['title']         =   'Mutasi Masuk';
        $d['submenu']       =   'Mutasi Masuk';
        $d['page']          =   'mutasi_masuk';
        $d['title_page']    =   'Mutasi Masuk';
        $d['menu']          =   'Mutasi Masuk';

        $d['sekolah']       = $this->M_core->getListSelectDefNol('m_sekolah', 'aktif', 1, 'id_sekolah', 'nm_sekolah', '-- Pilih Sekolah --');
        $d['ta']            = $this->M_core->listSelect($this->session->userdata('id_sekolah'), 'm_ta_tbl', 'teks_ta', 'id_ta', '-- Pilih Tahun Ajaran --');
        $d['jenjang']       = $this->M_core->listSelect($this->session->userdata('id_sekolah'), 'm_jenjang_tbl', 'jenjang', 'id_jenjang', '-- Pilih Jenjang --');
        $d['jurusan']       = $this->M_core->listSelect($this->session->userdata('id_sekolah'), 'm_jurusan_tbl', 'jurusan', 'id_jurusan', '-- Pilih Jurusan --');

        $d['bulan']         = $this->M_core->getListSelectDefNol('m_bulan_tbl', 'aktif', 1, 'bulan', 'bulan', '-- Pilih Bulan Masuk --');
        $d['gender']        = $this->M_core->getListSelectDefNol('m_gender', 'aktif', 1, 'id_gender', 'gender', '-- Pilih Gender --');
        $d['agama']         = $this->M_core->getListSelectDefNol('m_agama', 'aktif', 1, 'id_agama', 'agama', '-- Pilih Agama --');
       

        $this->load->view('layout', $d);
    }


    function submitMutasiMasuk(){
        $nm_siswa       =   $this->input->post('nm_siswa');
        $id_gender      =   $this->input->post('id_gender');
        $id_agama       =   $this->input->post('id_agama');
        $tempat_lahir   =   $this->input->post('tempat_lahir');
        $tgl_lahir      =   $this->input->post('tgl_lahir');
        $anak_ke        =   $this->input->post('anak_ke');
        $jml_saudara    =   $this->input->post('jml_saudara');
        $id_sekolah     =   $this->input->post('id_sekolah');
        $id_jenjang     =   $this->input->post('id_jenjang');
        $id_ta          =   $this->input->post('id_ta');
        $id_jurusan     =   $this->input->post('id_jurusan');
        $asal_sekolah   =   $this->input->post('asal_sekolah');
        $nm_ibu         =   $this->input->post('nm_ibu');
        $nm_ayah        =   $this->input->post('nm_ayah');
        $no_telpon_ortu =   $this->input->post('no_telpon_ortu');
        $nm_wali        =   $this->input->post('nm_wali');
        $no_telpon_wali =   $this->input->post('no_telpon_wali');
        $bulan          =   $this->input->post('bulan');
       
        $dataSiswa      =   [
          'nama'            =>  $nm_siswa,
          'id_ta'           =>  $id_ta,  
          'id_jenjang'      =>  $id_jenjang,  
          'id_ta'           =>  $id_ta,  
          'id_jurusan'      =>  $id_jurusan,  
          'id_sekolah'      =>  $id_sekolah,  
          'id_agama'        =>  $id_agama,  
          'id_gender'       =>  $id_gender,  
          'asal_sekolah'    =>  $asal_sekolah,  
          'tempat_lahir'    =>  $tempat_lahir,  
          'tanggal_lahir'   =>  date('Y-m-d', strtotime($tgl_lahir)),  
          'nama_ibu'        =>  $nm_ibu,  
          'nama_ayah'       =>  $nm_ayah,  
          'nama_wali'       =>  $nm_wali,  
          'no_telp_ortu'    =>  $no_telpon_ortu,  
          'no_telp_wali'    =>  $no_telpon_wali,  
          'anak_ke'         =>  $anak_ke,  
          'jml_saudara'     =>  $jml_saudara,
          'id_status_siswa' =>  4
        ];

        $idSiswa    =   $this->M_admin->insert_data('m_siswa_tbl', $dataSiswa);

        $dataMutasiMasuk    =   [
            'id_sekolah'    =>  $id_sekolah,
            'id_ta'         =>  $id_ta,
            'id_jenjang'    =>  $id_jenjang,
            'id_jurusan'    =>  $id_jurusan,
            'id_siswa'      =>  $idSiswa,
            'nm_siswa'      =>  $nm_siswa,
            'id_gender'     =>  $id_gender,
            'id_agama'      =>  $id_agama,
            'asal_sekolah'  =>  $asal_sekolah
        ];

        $this->M_admin->insert_data('m_mutasi_masuk', $dataMutasiMasuk);

        echo json_encode(['response' => TRUE]);
    }



    function executeGenerateNis(){
        $id_ta          =   $this->input->post('id_ta');
        $id_jenjang     =   $this->input->post('id_jenjang');
      
        $condition      =   [];
        $condition[]    = ['aktif', 1, 'where'];
        $condition[]    = ['id_sekolah', $this->session->userdata('id_sekolah'), 'where'];
        $condition[]    = ['id_ta', $id_ta, 'where'];
        $condition[]    = ['id_jenjang', $id_jenjang, 'where'];
        $dataSiswa      = $this->M_admin->get_master_spec('m_siswa_tbl', 'id_siswa', $condition)->result_array();
        
        $condition      =   [];
        $condition[]    =   ['aktif', 1, 'where'];
        $dataformula    =   $this->M_admin->get_master_spec('m_formula_nis', '*', $condition)->row_array();
      
        $no  = 1;
      
        foreach($dataSiswa as $ds){
            $data = [];
            $data = ['nis' => str_replace('#',$no,$dataformula['formula_nis'])];
            $condition 		= [];
        
            $condition[]    =   ['id_siswa', $ds['id_siswa'], 'where'];
            $condition[]    =   ['id_sekolah', $this->session->userdata('id_sekolah'), 'where'];

            $this->M_admin->update_master_spec('m_siswa_tbl', $data, $condition);
            $no++;
           
        }
        echo json_encode(['reponse' => 'OKE']);
     
    }



    function showDataSiswaPenempatan(){
        $id_ta          =   $this->input->post('id_ta');
        $id_jenjang     =   $this->input->post('id_jenjang');
      
        $dataSiswa = $this->db->query('SELECT id_siswa, nama, id_jenjang, id_ta FROM `m_siswa_tbl` WHERE `aktif` = 1 AND `id_ta` = '.$id_ta.' AND `id_jenjang` = '.$id_jenjang.' AND id_sekolah = '.$this->session->userdata('id_sekolah').' AND NOT EXISTS ( SELECT id_siswa FROM t_siswa_kelas_tbl WHERE m_siswa_tbl.id_siswa = t_siswa_kelas_tbl.id_siswa AND t_siswa_kelas_tbl.aktif = 1)')->result_array();
       
        $d['dataSiswa']     =   $dataSiswa;
        $d['id_ta']         =   $id_ta;
        $d['id_jenjang']    =   $id_jenjang;

        $d['tingkat']       = $this->M_core->listSelect($this->session->userdata('id_sekolah'), 'm_tingkat_tbl', 'tingkat', 'id_tingkat', '-- Pilih Tingkat --');
        $d['kelas']         = $this->M_core->listSelect($this->session->userdata('id_sekolah'), 'm_kelas', 'nm_kelas', 'id_kelas', '-- Pilih Kelas --');

       
        $tampilSiswa = $this->load->view('showDataSiswaPenempatan', $d, TRUE);
        echo json_encode($tampilSiswa);
    }

    function executeSubmitKelas(){
        
        $id_siswa_pilih =   $this->input->post('id_siswa_pilih');
        $id_kelas     =   $this->input->post('id_kelas');
       
        $condition      =   [];
        $condition[]    = ['aktif', 1, 'where'];
        $condition[]    = ['id_siswa', $id_siswa_pilih, 'where_in'];
        $dataSiswa      = $this->M_admin->get_master_spec('m_siswa_tbl', 'id_siswa', $condition)->result_array();

        $this->db->select_max('kd_siswa_kelas');
        $this->db->from('t_siswa_kelas_tbl');
        $this->db->where('aktif', 1);
        $maxKode    =   $this->db->get()->row_array()['kd_siswa_kelas'];
        
        $genMaxKode = null;
        $urutan = null;
        if(empty($maxKode)){
            $genMaxKode = 'KS0001';
        }else{
            $urutan = ltrim(preg_replace("/[^0-9,.]/", "", $maxKode), '0');
            $tambahUrutan = intval($urutan) + 1;
            $genMaxKode = 'KS000'.$tambahUrutan;
        }

        $res    =   [];
        foreach($dataSiswa as $ds){
            $d  =   [];
            $d['id_siswa']       =   $ds['id_siswa'];
            $d['kd_siswa_kelas'] =   $genMaxKode;
            $d['id_kelas']       =   $id_kelas;
            $d['id_sekolah']     =  $this->session->userdata('id_sekolah');
            $res[]  =   $d;
            $genMaxKode++;
        }

        $insert = $this->M_admin->insert_data_batch('t_siswa_kelas_tbl', $res);

        echo json_encode(['response' => 'OKE']);
    }

    function showListProfilSiswa(){
        $no_formulir    =   $this->input->post('no_formulir');

        $condition      =   [];
        // $condition[]    = ['status', 1, 'where'];
        $condition[]    = ['no_formulir', $no_formulir, 'where'];
        $dataSiswa      = $this->M_admin->get_master_spec('v_psb', 'no_formulir, jurusan, asal_sekolah, id_jenjang, id_jurusan, id_ta, teks_ta, nama', $condition)->result_array();
        $d['dataSiswa'] =   $dataSiswa;
        $tampilSiswa = $this->load->view('showDataSiswaListProfil', $d, TRUE);

        echo json_encode($tampilSiswa);
    }

    function detail_profil($no_formulir){

        $condition      =   [];
        $condition[]    =   ['no_formulir', $no_formulir, 'where'];
        $dataSiswaPSB   =   $this->M_admin->get_master_spec('v_psb', 'no_formulir, jurusan, asal_sekolah, id_jenjang, id_jurusan, id_gelombang, id_ta, teks_ta, nama', $condition)->row_array();
        $dataSiswatbl      =   $this->M_admin->get_master_spec('m_siswa_tbl', 'no_formulir, asal_sekolah, id_jenjang, id_jurusan, id_gelombang, id_ta, nama', $condition)->row_array();

        $dataSiswa = '';
        if(empty($dataSiswatbl)){
            $dataSiswa = $dataSiswaPSB;
        }else{
            $dataSiswa = $dataSiswatbl;
        }
        $d['title']         =   'Detail Profil '.$dataSiswa['nama'];
        $d['submenu']       =   'Detail Profil '.$dataSiswa['nama'];
        $d['page']          =   'detail_profil_siswa';
        $d['title_page']    =   'Detail Profil '.$dataSiswa['nama'];
        $d['menu']          =   'Detail Profil '.$dataSiswa['nama'];
        $d['dataSiswa']     =   $dataSiswa;

        $d['provinsi']      =   $this->M_core->getListSelectDefNol('m_provinsi_tbl', 'aktif', 1, 'id_provinsi', 'nama_provinsi', '-- Pilih Provinsi --');
        $d['agama']         =   $this->M_core->getListSelectDefNol('m_agama', 'aktif', 1, 'id_agama', 'agama', '-- Pilih Agama --');
        $d['gender']        =   $this->M_core->getListSelectDefNol('m_gender', 'aktif', 1, 'id_gender', 'gender', '-- Pilih gender --');
        

        $this->load->view('layout', $d);
       
    }

    function dataDetailProfil(){
        $no_formulir    =   $this->input->post('no_formulir');
        $condition      =   [];
        $condition[]    =   ['no_formulir', $no_formulir, 'where'];
        $dataSiswaPSB   =   $this->M_admin->get_master_spec('v_psb', 'no_formulir, jurusan, asal_sekolah, id_jenjang, id_jurusan, id_gelombang, id_ta, teks_ta, nama', $condition)->row_array();
        $dataSiswatbl   =   $this->M_admin->get_master_spec('m_siswa_tbl', '*', $condition)->row_array();
        
        $response = '';
        if(empty($dataSiswatbl)){
            $response = $dataSiswaPSB;
            $response['provinsi']   =   $this->M_core->getListSelectDefNol('m_provinsi_tbl', 'aktif', 1, 'id_provinsi', 'nama_provinsi', '-- Pilih Provinsi --');
            $response['agama']      =   $this->M_core->getListSelectDefNol('m_agama', 'aktif', 1, 'id_agama', 'agama', '-- Pilih Agama --');
            $response['gender']     =   $this->M_core->getListSelectDefNol('m_gender', 'aktif', 1, 'id_gender', 'gender', '-- Pilih gender --');
        }else{
            $response = $dataSiswatbl;
            $response['agama']      =   $this->M_core->getListSelectedDefNol('m_agama', 'aktif', 1, 'id_agama', $response['id_agama'], 'id_agama', 'agama', '-- Pilih Agama --');
            $response['gender']     =   $this->M_core->getListSelectedDefNol('m_gender', 'aktif', 1, 'id_gender', $response['id_gender'], 'id_gender', 'gender', '-- Pilih Gender --');
            $response['provinsi']   =   $this->M_core->getListSelectedDefNol('m_provinsi_tbl', 'aktif', 1, 'id_provinsi', $response['id_provinsi'], 'id_provinsi', 'nama_provinsi', '-- Pilih Provinsi --');

            $response['kabupaten']  =   $this->M_core->getSelectedOne('m_kabupaten_tbl', 'aktif', 1, 'id_kabupaten', $response['id_kabupaten'], 'id_kabupaten', 'nama_kabupaten', '-- Pilih Kabupaten --');
            $response['kecamatan']  =   $this->M_core->getSelectedOne('m_kecamatan_tbl', 'aktif', 1, 'id_kecamatan', $response['id_kecamatan'], 'id_kecamatan', 'nama_kecamatan', '-- Pilih kecamatan --');
            $response['kelurahan']  =   $this->M_core->getSelectedOne('m_kelurahan_tbl', 'aktif', 1, 'id_kelurahan', $response['id_kelurahan'], 'id_kelurahan', 'nama_kelurahan', '-- Pilih kelurahan --');
            $response['fotoSiswa']  =   '<img src="'.$response['foto_locate'].'/'.$response['foto_hash'].'" width="100%">';
            $response['tanggal']    =   date('Y-m-d', strtotime($response['tanggal_lahir']));

        }

        echo json_encode($response);
    }

    function submitProfil(){
        $no_formulir    =   $this->input->post('no_formulir');
        $id_gelombang   =   $this->input->post('id_gelombang');
        $id_jenjang     =   $this->input->post('id_jenjang');
        $nama           =   $this->input->post('nama');
        $id_jurusan     =   $this->input->post('id_jurusan');
        $id_ta          =   $this->input->post('id_ta');
        $tempat_lahir   =   $this->input->post('tempat_lahir');
        $tgl_lahir      =   $this->input->post('tgl_lahir');
        $id_gender      =   $this->input->post('id_gender');
        $anak_ke        =   $this->input->post('anak_ke');
        $jml_saudara    =   $this->input->post('jml_saudara');
        $provinsi_id    =   $this->input->post('provinsi_id');
        $kabupaten_id   =   $this->input->post('kabupaten_id');
        $kecamatan_id   =   $this->input->post('kecamatan_id');
        $kelurahan_id   =   $this->input->post('kelurahan_id');
        $alamat         =   $this->input->post('alamat');
        $asal_sekolah   =   $this->input->post('asal_sekolah');
        $id_agama       =   $this->input->post('id_agama');
        $nm_ayah        =   $this->input->post('nm_ayah');
        $nm_ibu         =   $this->input->post('nm_ibu');
        $no_telp_ortu   =   $this->input->post('no_telp_ortu');
        $no_telp_wali   =   $this->input->post('no_telp_wali');
        $catatan        =   $this->input->post('catatan');

        $dataFile = $this->M_admin->uploadFileHandler('/berkas/foto_siswa', 'foto', 'png|jpg|jpeg', '8000');

        $data   =   [
            'id_sekolah'    =>  $this->session->userdata('id_sekolah'),
            'no_formulir'   =>  $no_formulir,
            'id_gelombang'  =>  $id_gelombang,
            'id_jurusan'    =>  $id_jurusan,
            'id_ta'         =>  $id_ta,
            'id_jenjang'    =>  $id_jenjang,
            'nama'          =>  $nama,
            'tempat_lahir'  =>  $tempat_lahir,
            'tanggal_lahir' =>  date('Y-m-d', strtotime($tgl_lahir)),
            'id_gender'     =>  $id_gender,
            'anak_ke'       =>  $anak_ke,
            'jml_saudara'   =>  $jml_saudara,
            'id_provinsi'   =>  $provinsi_id,
            'id_kabupaten'  =>  $kabupaten_id,
            'id_kecamatan'  =>  $kecamatan_id,
            'id_kelurahan'  =>  $kelurahan_id,
            'alamat'        =>  $alamat,
            'asal_sekolah'  =>  $asal_sekolah,
            'id_agama'      =>  $id_agama,
            'nama_ayah'     =>  $nm_ayah,
            'nama_ibu'      =>  $nm_ibu,
            'no_telp_ortu'  =>  $no_telp_ortu,
            'no_telp_wali'  =>  $no_telp_wali,
            'catatan'       =>  $catatan,
            'foto_name'     =>  $dataFile['file_asli'][0],
            'foto_hash'     =>  $dataFile['file_hash'][0],
            'foto_locate'   =>  $dataFile['file_lokasi'][0],

        ];
        
        $condition      =   [];
        $condition []   =   ['aktif', 1, 'where'];
        $condition []   =   ['no_formulir', $no_formulir, 'where'];
        $dataSiswa      =   $this->M_admin->get_master_spec('m_siswa_tbl', 'id_siswa', $condition)->row_array();
        
        if(empty($dataSiswa)){
            $this->M_admin->insert_data('m_siswa_tbl', $data);
            echo json_encode(['responseInsert' => 'OKE']);
        }else{
            $condition 		= [];
			$condition[0] 	= 'no_formulir';
			$condition[1] 	= $no_formulir;
            $condition[2] 	= 'where';
            $this->M_admin->update_data('m_siswa_tbl', $condition, $data);
            echo json_encode(['responseUpdate' => 'OKE']);
        }
     
    }

  
    function siswaKelasAction($action){
        if($action == 'aktif'){

            $response = $this->actionActiveHandler('id_siswa_kelas', 't_siswa_kelas_tbl');

        }elseif($action == 'add'){
            $id_siswa_kelas =   $this->input->post('id_siswa_kelas');
            $id_siswa       =   $this->input->post('id_siswa');
            $id_kelas       =   $this->input->post('id_kelas');
        
            $data  = [
                'id_siswa_kelas'    =>  $id_siswa_kelas,
                'id_siswa'    =>  $id_siswa,
                'id_kelas'    =>  $id_kelas,
            ];
         
            $insertUser =  $this->M_admin->insert_data('t_siswa_kelas_tbl', $result);

            $response 	= ['status' => 'OKE'];

        }elseif($action == 'edit'){
            $id_siswa_kelas =   $this->input->post('id_siswa_kelas');
            $id_siswa       =   $this->input->post('id_siswa');
            $id_kelas       =   $this->input->post('id_kelas');
          
            $data  = [
                'id_siswa_kelas'    =>  $id_siswa_kelas,
                'id_siswa'    =>  $id_siswa,
                'id_kelas'    =>  $id_kelas,
            ];
           
            $response = $this->actionInsertUpdateHandler($data['id_siswa_kelas'],'id_siswa_kelas', $data, 't_siswa_kelas_tbl');
            
        }elseif($action == 'detail'){

            $id_siswa_kelas = $this->input->post('id_siswa_kelas');
           
			$condition 		= [];
			$condition[] 	= ['id_siswa_kelas', $id_siswa_kelas, 'where'];
            $response 		= $this->M_admin->get_master_spec('t_siswa_kelas_tbl', 'id_siswa_kelas, id_kelas, id_siswa', $condition)->row_array();
           
        
            $response['kelas']    =   $this->M_core->listSelectedKelas($response['id_kelas'], $this->session->userdata('id_sekolah'));
            $response['siswa']    =   $this->M_core->listSelectedSiswa($response['id_siswa'], $this->session->userdata('id_sekolah'));
        }
     

        echo json_encode($response);
    }

    function showDataKelasSiswa(){
        $table          = 'v_kelas_siswa';
		
        $column_order   = array(null, 'nama','nm_kelas', null, null); 
        $column_search  = array('nama', 'nm_kelas'); 
        $order          = array('id_siswa_kelas' => 'asc');

        $condition      =   [];
        $condition[]    =   ['id_sekolah', $this->session->userdata('id_sekolah'), 'where'];
        $list_data   	= $this->M_admin->get_datatables($table, $column_order, $column_search, $order, $condition);
        $data           = array();
        $no             = $_POST['start'];
        foreach ($list_data as $ld) {
        	$status 	= $ld->aktif;

            if ($status == 1) {
				$html_stat 	= '<input class="action activeBtn" data-action="aktif" data-id_siswa_kelas="'.$ld->id_siswa_kelas.'" 
								type="checkbox" id="lbl-'.$ld->nama.'" checked switch="none" >
                                    <label for="lbl-'.$ld->id_siswa_kelas.'" data-on-label="On" data-off-label="Off"></label>';
        	} else {
				$html_stat 	= '<input class="action activeBtn" data-action="aktif" data-id_siswa_kelas="'.$ld->id_siswa_kelas.'" 
								type="checkbox" id="lbl-'.$ld->nama.'" switch="none" >
									<label for="lbl-'.$ld->id_siswa_kelas.'" data-on-label="On" data-off-label="Off"></label>';
        	}

            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $ld->nama;
            $row[] = $ld->nm_kelas;
            $row[] = $html_stat;
            $row[] = '&nbsp;<button 
                                type="button" data-id="'.$ld->id_siswa_kelas.'" data-action="edit" 
                                class="activeBtn action btn btn-xs btn-icon waves-effect btn-info m-b-5 tooltip-hover tooltipstered"
                                title="Ubah"> <i class="fa fa-pencil"></i> 
                        </button>
                        &nbsp;<button 
                                type="button" data-id="'.$ld->id_siswa_kelas.'" data-master="t_siswa_kelas_tbl" data-col="id_siswa_kelas" data-action="delete" 
                                class="activeBtn action btn btn-xs btn-icon waves-effect btn-danger m-b-5 tooltip-hover tooltipstered"
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

    function showDataSiswaAbsen(){
        $id_kelas     =   $this->input->post('id_kelas');
       
        $dataSiswa      = $this->db->query('SELECT * FROM v_kelas_siswa WHERE v_kelas_siswa.aktif = 1 
        AND v_kelas_siswa.id_kelas = '.$id_kelas.' 
        AND id_sekolah = '.$this->session->userdata('id_sekolah').' AND NOT EXISTS ( SELECT id_siswa FROM t_absen WHERE v_kelas_siswa.id_siswa = t_absen.id_siswa AND DATE( tanggal ) = DATE(NOW()))')->result_array();
        // var_dump($dataSiswa);
        // die();
        $d['dataSiswa'] =   $dataSiswa;
        $d['present']   =   $this->M_core->getListSelectDefNol('m_present', 'aktif', 1, 'id_present', 'present', '-- Pilih Present --');
        $tampilSiswa = $this->load->view('showDataSiswaAbsensi', $d, TRUE);

        echo json_encode($tampilSiswa);
    }

    function showDataSiswaMutasiKeluar(){
        $id_siswa   =   $this->input->post('id_siswa');

        $condition      =   [];
        $condition[]    =   ['id_siswa', $id_siswa, 'where'];

        $dataSiswa      =   $this->M_admin->get_master_spec('v_siswa_tbl', 'id_siswa, nama, nis, nisn, teks_ta, jenjang, jurusan, gender, agama, tempat_lahir, tanggal_lahir, foto_hash, foto_locate, nm_kelas, status' ,$condition)->row_array();   
        $d['data'] =   $dataSiswa;
        $tampilSiswa    =   $this->load->view('showDataSiswaMutasiKeluar', $d, TRUE);
        
        echo $tampilSiswa;
    }

    function showDataSiswaLulus(){
        $id_kelas     =   $this->input->post('id_kelas');
       
        $dataSiswa      = $this->db->query('SELECT * FROM v_kelas_siswa WHERE v_kelas_siswa.id_kelas = '.$id_kelas)->result_array();
      
        $d['dataSiswa'] =   $dataSiswa;
        
        $tampilSiswa = $this->load->view('showDataSiswaLulus', $d, TRUE);

        echo json_encode($tampilSiswa);
    }

    function submitLulus(){
        $id_siswa   =   $this->input->post('id_siswa');
        $id_status      =   $this->input->post('id_status');
      
        for($i=0;$i<count($id_siswa);$i++){
            $data                         =   [];
            $data['id_siswa']             =   $id_siswa[$i];
            $data['id_status_siswa']      =   ($id_status[$i] == 1) ? 2 :  1;

            
            $condition      =   ['id_siswa', $data['id_siswa'], 'where'];
            $this->M_admin->update_data('m_siswa_tbl', $condition, $data);
        }
        

        echo json_encode(['response' => TRUE]);
       
    }

    function submitAbsen(){
        $id_siswa   =   $this->input->post('id_siswa');
        $id_present =   $this->input->post('id_present');
        $keterangan =   $this->input->post('keterangan');
        $tanggal    =   date('Y-m-d');

        $res    =   [];
        for($i = 0; $i < count($id_siswa);$i++){

            $data   =   [];
            $data['id_siswa']     =   $id_siswa[$i];
            $data['id_present']   =   $id_present[$i];
            $data['keterangan']   =   $keterangan[$i];
            $data['id_sekolah']   =   $this->session->userdata('id_sekolah');
            $data['tanggal']      =   $tanggal;
           
            $res[]    =   $data;
        }
        
        $this->M_admin->insert_data_batch('t_absen', $res);
        echo json_encode(['responseInsertAbsen' => TRUE]);
    }


    function showListSiswaBykls(){
     
        $id_kelas       =   $this->input->post('id_kelas');
        $id_tingkat     =   $this->input->post('id_tingkat');
        $id_jurusan     =   $this->input->post('id_jurusan');
       
        $condition      =   [];

        $condition[]    =   ['id_kelas', $id_kelas, 'where'];
        $condition[]    =   ['id_sekolah', $this->session->userdata('id_sekolah'), 'where'];
        $dataSiswa      =   $this->M_admin->get_master_spec('v_kelas_siswa', 'id_siswa_kelas, id_siswa, nama', $condition)->result_array();
       
       
        $d['dataSiswa'] =   $dataSiswa;
        
        $condition      =   [];
        $condition[]    =   ['id_tingkat !=', $id_tingkat, 'where'];
        $condition[]    =   ['id_jurusan', $id_jurusan, 'where'];
        $condition[]    =   ['id_sekolah', $this->session->userdata('id_sekolah'), 'where'];
        $d['kelas']     =   $this->M_core->list_bootstrap_select_def_nol('m_kelas', 'id_kelas', 'nm_kelas', $condition,  '-- Pilih Kelas --', $id=null);
      
        $tampilSiswa = $this->load->view('showDataSiswaKls', $d, TRUE);

        echo json_encode($tampilSiswa);
    }


    function filteredKelas($id_tingkat, $id_jurusan){
        $condition      =   [];
        $condition[]    =   ['id_sekolah', $this->session->userdata('id_sekolah'), 'where'];
        $condition[]    =   ['id_tingkat', $id_tingkat, 'where'];
        $condition[]    =   ['id_jurusan', $id_jurusan, 'where'];
        $value          =   'id_kelas';
        $name 			=   'nm_kelas';
        $table          =   'm_kelas';
        $subject        =   '-- Pilih Kelas --';
        $data           =   $this->M_core->list_bootstrap_select_def_nol($table, $value, $name, $condition, $subject, $id=null);
        echo $data;
    }

    function executeKenaikanKelas(){
        $id_siswa_pilih =   $this->input->post('id_siswa_pilih');
        $id_kelas_pilih =   $this->input->post('id_kelas_pilih');

        for($i=0;$i<count($id_siswa_pilih);$i++){
            $data   =   [];
            $data['id_kelas']   =   $id_kelas_pilih;
            $data['id_siswa']   =   $id_siswa_pilih[$i];
            $condition  =   [];
            $condition = ['id_siswa', $data['id_siswa'], 'where'];
            $this->M_admin->update_data('t_siswa_kelas_tbl', $condition, $data);
           
        }

        echo json_encode(['response' => TRUE]);
   
    }

    function filteredSiswaByKelas($id_kelas){
        $condition      =   [];
        $condition[]    =   ['id_kelas', $id_kelas, 'where'];
        $getListSiswa   =   $this->M_admin->get_master_spec('t_siswa_kelas_tbl', 'id_siswa, id_kelas', $condition)->result_array();
        
        $arrIdSiswa     =   array_column($getListSiswa, 'id_siswa');
        
        if(empty($arrIdSiswa)){
            $data       =   '<option> -- Pilih Siswa -- </option>';
        }else{
            
            $Lcondition     =   [];
            $Lcondition[]   =   ['id_siswa', $arrIdSiswa, 'where_in'];
            $data           =   $this->M_core->list_bootstrap_select_def_nol('m_siswa_tbl', 'id_siswa', 'nama', $Lcondition,  '-- Pilih Siswa --', $id=null);
        }

        echo $data;
     
    }

    function dataSiswaMutasi($id_siswa){
        $condition      =   [];
        $condition[]    =   ['id_siswa', $id_siswa, 'where'];
        
    }

    function showListCatatanSiswa(){
        $id_siswa   =   $this->input->post('id_siswa');
        $nm_siswa   =   $this->input->post('nm_siswa');
     
        $condition          =   [];
        $condition[]        =   ['id_siswa', $id_siswa, 'where'];
        $dataCatatanSiswa   =   $this->M_admin->get_master_spec('v_catatan_siswa', 'id_siswa, id_catatan_siswa, id_kat_catatan, tanggal, nama, kategori, catatan', $condition)->result_array();

        $d['dataCatatan']   =   $dataCatatanSiswa;
        $d['nm_siswa']      =   $nm_siswa;
        $d['id_siswa']      =   $id_siswa;
        $d['listKat']       =   $this->M_core->getListSelectDefNol('m_kategori_catatan', 'aktif', 1, 'id_kat_catatan', 'nm_kategori', '-- Pilih Kategori --');
        $viewListCatatan    =   $this->load->view('listCatatanSiswa', $d, TRUE);

        echo $viewListCatatan;
       
    }

    function catatanSiswaAction($action){
       if($action == 'add'){
            $id_catatan_siswa   =   $this->input->post('id_catatan_siswa');
            $id_siswa           =   $this->input->post('id_siswa');
            $catatan            =   $this->input->post('catatan');
            $tanggal            =   $this->input->post('tanggal');
            $id_kat_catatan     =   $this->input->post('id_kat_catatan');
        
            $data  = [
                'id_catatan_siswa'    =>  $id_catatan_siswa,
                'id_siswa'            =>  $id_siswa,
                'catatan'             =>  $catatan,
                'id_kat_catatan'      =>  $id_kat_catatan,
                'tanggal'             =>  date('Y-m-d', strtotime($tanggal)),
            ];
         
            $insertUser =  $this->M_admin->insert_data('m_catatan_siswa', $data);

            $response 	= ['status' => 'OKE'];

        }elseif($action == 'edit'){
            $id_catatan_siswa   =   $this->input->post('id_catatan_siswa');
            $id_siswa           =   $this->input->post('id_siswa');
            $catatan            =   $this->input->post('catatan');
            $tanggal            =   $this->input->post('tanggal');
            $id_kat_catatan     =   $this->input->post('id_kat_catatan');
          
            $data  = [
                'id_catatan_siswa'    =>  $id_catatan_siswa,
                'id_siswa'            =>  $id_siswa,
                'catatan'             =>  $catatan,
                'id_kat_catatan'      =>  $id_kat_catatan,
                'tanggal'             =>  date('Y-m-d', strtotime($tanggal)),
            ];
           
            $response = $this->actionInsertUpdateHandler($data['id_catatan_siswa'],'id_catatan_siswa', $data, 'm_catatan_siswa');
            
        }elseif($action == 'detail'){

            $id_catatan_siswa = $this->input->post('id_catatan_siswa');
           
			$condition 		= [];
			$condition[] 	= ['id_catatan_siswa', $id_catatan_siswa, 'where'];
            $response 		= $this->M_admin->get_master_spec('m_catatan_siswa', 'id_catatan_siswa, id_siswa, catatan, tanggal, id_kat_catatan', $condition)->row_array();
           
            $response['kategori']    =   $this->M_core->getListSelectedDefNol('m_kategori_catatan', 'aktif', 1, 'id_kat_catatan', $response['id_kat_catatan'], 'id_kat_catatan', 'nm_kategori', '-- Pilih Kategori --');
        }
     

        echo json_encode($response);
    }

    function showListKelas($id_ta, $id_jenjang, $id_jurusan, $id_tingkat){
       
        $condition  =   [];
        $condition[]  =   ['id_ta', $id_ta, 'where'];
        $condition[]  =   ['id_jenjang', $id_jenjang, 'where'];
        $condition[]  =   ['id_jurusan', $id_jurusan, 'where'];
        $condition[]  =   ['id_tingkat', $id_tingkat, 'where'];
        $condition[]  =   ['id_sekolah', $this->session->userdata('id_sekolah'), 'where'];
      
        
        $data           =   $this->M_core->list_bootstrap_select_def_nol('m_kelas', 'id_kelas', 'nm_kelas', $condition,  '-- Pilih Kelas --', $id=null);
        echo $data;

    }

    function submitMutasiKeluar(){
        $id_siswa       =   $this->input->post('id_siswa');
        $alasan_mutasi  =   $this->input->post('alasan_mutasi');
        $mutasi_ke      =   $this->input->post('mutasi_ke');

        $dataMutasi     =   [
            'id_siswa'      =>  $id_siswa,
            'alasan_mutasi' =>  $alasan_mutasi,
            'mutasi_ke'     =>  $mutasi_ke
        ];
        $this->M_admin->insert_data('m_mutasi_keluar', $dataMutasi);

        $dataSiswaMutasi    =   ['id_status_siswa' => 3];

        $condition          =   [];
        $condition          =   ['id_siswa', $id_siswa, 'where'];
        $updateStatusSiswa  =   $this->M_admin->update_data('m_siswa_tbl', $condition, $dataSiswaMutasi);

        echo json_encode(['response' => TRUE]);
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