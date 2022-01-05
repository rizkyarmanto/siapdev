<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	 
class Pengolahan_siswa extends CI_Controller {

	function __construct() {
        parent::__construct();
        if(empty($this->session->userdata('id_user'))){
			redirect('user','refresh');
		}
        $this->load->model('M_pengolahan');
    }

    function index() {
        $d['title'] = 'Pengolahan Siswa';
        $d['page']  = 'menu';
        $d['title_page'] = 'Pengolahan Siswa';
        $d['menu']  = 'Pengolahan Siswa';
        $this->load->view('layout', $d);
    }

    function cari_siswa() {
        $d['title']     = 'Cari Siswa';
        $d['page']      = 'ps_cari_siswa';
        $d['menu']      = 'Pengolahan siswa';
        $d['submenu']   = 'Cari Siswa';
        $this->load->view('layout', $d);
    }

    function cari_siswa_action($action) {
        $nis        = $this->input->post('nis');
        $no_formulir= $this->input->post('no_formulir');


        if ($action == 'cari') {
            if ($nis || !$no_formulir) {
                $response   = $this->M_pengolahan->detail_siswa('nis', $nis)->row_array();
            } elseif (!$nis || $no_formulir) {
                $response   = $this->M_pengolahan->detail_siswa('no_formulir', $no_formulir)->row_array();            
            }
            // Modify array
            if ($response) {
                if ($response['kelamin'] == "L") {
                    $response['jenis_kelamin']  = "Laki-laki";
                } elseif ($response['kelamin'] == "P") {
                    $response['jenis_kelamin']  = "Perempuan";
                }
                $response['tanggal_lahir']  = date('d F Y', strtotime($response['tanggal_lahir']));
                $response['nama_provinsi']  = ucwords(strtolower($response['nama_provinsi']));
                $response['nama_kabupaten'] = ucwords(strtolower($response['nama_kabupaten']));
                $response['nama_kecamatan'] = ucwords(strtolower($response['nama_kecamatan']));
                $response['nama_kelurahan'] = ucwords(strtolower($response['nama_kelurahan']));
            } else {
                $response   = array("status" => "FAILURE");
            }
        }

        $response['sos_med']    = '';
        $sos_med                = $this->M_pengolahan->get_sosmed('id_siswa', 5, 'jensos.jenis as jenis_sosmed, sissos.sosmed')->result_array();
        foreach ($sos_med as $sm) {
            $response['sos_med'].= 
                                '<tr>
                                    <td>'.$sm['jenis_sosmed'].'</td>
                                    <td>'.$sm['sosmed'].'</td>
                                <tr>';
        }

        // var_dump($response);
        echo json_encode($response);
    }

    function cari_siswa_mutasi() {
        $id_siswa   = $this->input->post('id_siswa');
        $response   = $this->M_pengolahan->detail_siswa_mutasi($id_siswa)->row_array();

        $response['waktu']  = date('d-m-Y H:i:s', strtotime($response['waktu']));

        // var_dump($response);
        echo json_encode($response);
    }

    function cari_siswa_riwayat() {
        $id_siswa   = $this->input->post('id_siswa');
        $data       = $this->M_pengolahan->list_siswa_riwayat($id_siswa)->result_array();

        $response_head  = 
            '<ul class="timeline">';

        $response_body  = '';

        foreach ($data as $d) {
            if ($d['id_ta'] || $d['id_jenjang'] || $d['id_jurusan'] || $d['tingkat'] || $d['urutan_kelas']) {
                $keterangan     = $d['keterangan'] ? 
                                $d['keterangan'].'<br>' : '';
                $teks_ta        = $d['id_ta'] ? 
                                'Tahun Ajaran '.$d['teks_ta'].'<br>' : '';
                $jurusan        = $d['id_jurusan'] ? 
                                'Jurusan '.$d['jurusan'].'<br>' : '';
                $tingkat        = $d['tingkat'] ? 
                                'Tingkat '.$d['tingkat'].'<br>' : '';
                $urutan_kelas   = $d['urutan_kelas'] ? 
                                'Kelas '.$d['urutan_kelas'].'<br>' : '';                               

                $tl_body    = 
                            '<div class="timeline-body">
                                '.$keterangan.$teks_ta.$jurusan.$tingkat.$urutan_kelas.'
                            </div>';
            } else {
                $tl_body    = '';
            }

            // $keterangan     = $d['keterangan'] ? 
            //                     ', '.strtolower($d['keterangan']) : '';

            $response_body  .= 
                '<li class="time-label">
                    <span class="bg-red">
                        '.date('d-M-Y', strtotime($d['waktu'])).'
                    </span>
                </li>
                <li>
                    <i class="'.$d['stat_icon'].'"></i>
                    <div class="timeline-item">
                        <span class="time"><i class="fa fa-clock-o"></i> '.date('H:i', strtotime($d['waktu'])).'</span>
                        <h3 class="timeline-header">'.$d['status'].'</h3>
                        '.$tl_body.'
                    </div>
                </li>';
        }

        $response_foot  = 
                '<li>
                  <i class="fa fa-clock-o bg-gray"></i>
                </li>
            </ul>';

        echo $response_head.$response_body.$response_foot;
    }

    function cari_siswa_tagihan() {
        $id_siswa   = $this->input->post('id_siswa');
        $data       = $this->M_global->list_select('m_tipe_transaksi_tbl')->result_array();

        $response_body  = '';
        foreach ($data as $d) {
            $tagihan    = $this->hitung_transaksi_tagihan($id_siswa, $d['id_tipe_transaksi']);
            $response_body  .=
                '<tr>
                  <td class="text-left" style="padding-left:5%;">'.$d['tipe_transaksi'].'</td>
                  <td class="text-right" style="padding-right:10%;">'.number_format($tagihan,0,",",",").'</td>
                </tr>';
        }

        echo $response_body;
    }

    private function hitung_transaksi_tagihan($id_siswa, $id_tipe_transaksi){
        $dS             = $this->M_pengolahan->detail_siswa('id_siswa', $id_siswa)->row_array();
        $id_ta          = intval($dS['id_ta']);
        $id_jenjang     = intval($dS['id_jenjang']);
        $id_jurusan     = intval($dS['id_jurusan']);
        $id_gelombang   = intval($dS['id_gelombang']);
        $tingkat        = intval($dS['tingkat']);
        // $id_tipe_transaksi = 1;

        $condition_trf  = array(
                            array('id_ta'       => $id_ta),
                            array('id_jenjang'  => $id_jenjang),
                            array('id_jurusan'  => $id_jurusan),
                            array('id_gelombang'=> $id_gelombang),
                            array('tingkat'     => $tingkat),
                            array('id_tipe_transaksi' => $id_tipe_transaksi),
                            array('aktif'       => 1)
                        );

        $condition_ker  = array(
                            array('id_tipe_transaksi' => $id_tipe_transaksi),
                            array('id_siswa'    => $id_siswa),
                            array('jkersis_aktif' => 1),
                            array('kernil_aktif'=> 1)
                        );

        $condition_pbr  = array(
                            array('id_tipe_transaksi' => $id_tipe_transaksi),
                            array('id_siswa'    => $id_siswa),
                            array('closed'      => 1)
                        );

        $tarif_nilai_awal   = $this->M_pengolahan->tarif_nilai($condition_trf)->result_array();
        $tarif_nilai        = $this->M_pengolahan->tarif_nilai($condition_trf)->result_array();

        foreach ($tarif_nilai as $key => $tn) {
            $kr         = $this->M_pengolahan->keringanan_nilai($condition_ker,$tn['id_tarif_nilai'])->row_array();
            if ($kr) {
                if ($kr['jenis_keringanan'] == "potongan_harga") {
                    $tarif_nilai[$key]['nom_total']    = intval(intval($tn['nom_total']) - intval($kr['nominal']));
                } elseif ($kr['jenis_keringanan'] == "diskon") {
                    $tarif_nilai[$key]['nom_total']    = floatval(intval($tn['nom_total']) - (intval($tn['nom_total'])*intval($kr['nominal'])/100));
                }
            }

            $pbr        = $this->M_pengolahan->pembayaran_nilai($condition_pbr,$tn['id_tarif_nilai'])->row_array();
            if ($pbr) {
                $tarif_nilai[$key]['nom_total']    = $tn['nom_total'] - $pbr['nominal_pbr'];
            }
        }

        $total  = array_sum(array_column($tarif_nilai,'nom_total'));

        $total  = $total ?: 0; 

        return $total;
    }

    function penempatan_kelas() {
        $d['title']     = 'Penempatan Kelas';
        $d['page']      = 'ps_penm_kelas';
        $d['menu']      = 'Penempatan Kelas';
        $d['submenu']   = 'Penempatan Kelas';
        $d['list_ta']      = $this->M_global->list_select3('m_ta_tbl')->result_array();
        $d['list_jenjang'] = $this->M_global->list_select('m_jenjang_tbl')->result_array();
        $d['list_jurusan'] = $this->M_global->list_select('m_jurusan_tbl')->result_array();
        $d['list_tingkat'] = $this->M_global->list_select3('m_tingkat_tbl')->result_array();
        $d['list_gelombang'] = $this->M_global->list_select3('m_gelombang_tbl')->result_array();
        $this->load->view('layout', $d);
    }

    public function penempatan_kelas_calon() {
        $table          = 'v_siswa_tbl';
        $column_order   = array(null, 'nis', 'nama', null);
        $column_search  = array();
        $order          = array('nis' => 'asc');

        // Filter
        $id_ta          = htmlentities($this->input->post('id_ta'));
        $id_jenjang     = htmlentities($this->input->post('id_jenjang'));
        $id_jurusan     = htmlentities($this->input->post('id_jurusan'));
        $tingkat        = htmlentities($this->input->post('tingkat'));
        $id_gelombang   = htmlentities($this->input->post('id_gelombang'));
        $noform         = htmlentities($this->input->post('noform'));
        $nis            = htmlentities($this->input->post('nis'));

        $condition      = array();

        $id_ta ? array_push($condition, array('id_ta', $id_ta, 'where')) : null;
        $id_jenjang ? array_push($condition, array('id_jenjang', $id_jenjang, 'where')) : null;
        $id_jurusan ? array_push($condition, array('id_jurusan', $id_jurusan, 'where')) : null;
        $tingkat ? array_push($condition, array('tingkat', $tingkat, 'where')) : null;
        $id_gelombang ? array_push($condition, array('id_gelombang', $id_gelombang, 'where')) : null;
        $nis ? array_push($condition,  array('nis', $nis, 'like')) : null;

        $list           = $this->M_pengolahan->get_datatables($table, $column_order, $column_search, $order, $condition);
        $data           = array();
        $no             = $_POST['start'];
        foreach ($list as $l) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $l->nis;
            $row[] = $l->nama;
            $row[] = '<input data-id_siswa="'.$l->id_siswa.'" type="checkbox">';

            $data[] = $row;
        }

        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsFiltered" => $this->M_pengolahan->count_filtered($table, $column_order, $column_search, $order, $condition),
                        "recordsTotal" => $this->M_pengolahan->count_all($table, $condition),
                        "data" => $data,
                );

        echo json_encode($output);
    }

    function teser() {   
        $nis        = $this->input->get('nis');
        $no_formulir= $this->input->get('no_formulir');


        if ($nis || !$no_formulir) {
            $response   = $this->M_pengolahan->detail_siswa('nis', $nis)->row_array();
        } elseif (!$nis || $no_formulir) {
            $response   = $this->M_pengolahan->detail_siswa('no_formulir', $no_formulir)->row_array();            
        }

        var_dump($response);
    }

    function generate_nis(){
        $d['title'] = 'Generate NIS';
        $d['submenu'] = 'Generate NIS';
        $d['page']  = 'gen_nis';
        $d['title_page'] = 'Generate NIS';
        $d['menu']  = 'Generate NIS';
        $d['ta'] = $this->M_core->getListSelectDefNol('m_ta_tbl', 'aktif', 1, 'id_ta', 'teks_ta', '-- Pilih Tahun Ajaran --');
        $d['jenjang'] = $this->M_core->getListSelectDefNol('m_jenjang_tbl', 'aktif', 1, 'id_jenjang', 'jenjang', '-- Pilih Tahun Ajaran --');
        $this->load->view('layout', $d);
    }

    function executeGenerateNis(){
        $id_ta          =   $this->input->post('id_ta');
        $id_jenjang     =   $this->input->post('id_jenjang');
      
        $condition      =   [];
        $condition[]    = ['aktif', 1, 'where'];
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
            $condition[0] 	= 'id_siswa';
            $condition[1] 	= $ds['id_siswa'];
            $condition[2] 	= 'where';        

            $this->M_admin->update_data('m_siswa_tbl', $condition, $data);
            $no++;
           
        }
        echo json_encode(['reponse' => 'OKE']);
     
    }

    function penempatan_kelas_baru(){
        $d['title']         = 'Penempatan Kelas';
        $d['submenu']       = 'Penempatan Kelas';
        $d['page']          = 'penenpatan_kls';
        $d['title_page']    = 'Penempatan Kelas';
        $d['menu']          = 'Penempatan Kelas';
        $d['ta']            = $this->M_core->getListSelectDefNol('m_ta_tbl', 'aktif', 1, 'id_ta', 'teks_ta', '-- Pilih Tahun Ajaran --');
        $d['jenjang']       = $this->M_core->getListSelectDefNol('m_jenjang_tbl', 'aktif', 1, 'id_jenjang', 'jenjang', '-- Pilih Tahun Ajaran --');
        $this->load->view('layout', $d);
    }

    function showDataSiswaPenempatan(){
        $id_ta          =   $this->input->post('id_ta');
        $id_jenjang     =   $this->input->post('id_jenjang');
      
        $dataSiswa = $this->db->query('SELECT id_siswa, nama, id_jenjang, id_ta FROM `m_siswa_tbl` WHERE `aktif` = 1 AND `id_ta` = '.$id_ta.' AND `id_jenjang` = '.$id_jenjang.'
        AND NOT EXISTS ( SELECT id_siswa FROM t_siswa_kelas_tbl WHERE m_siswa_tbl.id_siswa = t_siswa_kelas_tbl.id_siswa AND t_siswa_kelas_tbl.aktif = 1)')->result_array();
       
        $d['dataSiswa']     =   $dataSiswa;
        $d['id_ta']         =   $id_ta;
        $d['id_jenjang']    =   $id_jenjang;
        $d['tingkat']       =   $this->M_core->getListSelectDefNol('m_tingkat_tbl', 'aktif', 1, 'id_tingkat', 'tingkat', '-- Pilih Tingkat --');
        $d['kelas']       =   $this->M_core->getListSelectDefNol('m_kelas', 'aktif', 1, 'id_kelas', 'nm_kelas', '-- Pilih Kelas --');
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

        if(empty($maxKode)){
            $maxKode = 'KS0001';
        }else{
            $urutan = ltrim(preg_replace("/[^0-9,.]/", "", $maxKode), '0');
            $maxKode = 'KS000'.intval($urutan) + 1;
        }

        $res    =   [];
        foreach($dataSiswa as $ds){
            $d  =   [];
            $d['id_siswa']       =   $ds['id_siswa'];
            $d['kd_siswa_kelas'] =   $maxKode;
            $d['id_kelas']       =   $id_kelas;
            $res[]  =   $d;
        }
        // var_dump($res);
        // die();


        $insert = $this->M_admin->insert_data_batch('t_siswa_kelas_tbl', $res);

        echo json_encode(['response' => 'OKE']);
    }


    function profil_siswa(){
        $d['title']         =   'Profil Siswa';
        $d['submenu']       =   'Profil Siswa';
        $d['page']          =   'profil_siswa';
        $d['title_page']    =   'Profil Siswa';
        $d['menu']          =   'Profil Siswa';
        $d['ta']            =   $this->M_core->getListSelectDefNol('m_ta_tbl', 'aktif', 1, 'id_ta', 'teks_ta', '-- Pilih Tahun Ajaran --');
        $d['jenjang']       =   $this->M_core->getListSelectDefNol('m_jenjang_tbl', 'aktif', 1, 'id_jenjang', 'jenjang', '-- Pilih Tahun Ajaran --');
        $d['tingkat']       =   $this->M_core->getListSelectDefNol('m_tingkat_tbl', 'aktif', 1, 'id_tingkat', 'tingkat', '-- Pilih Tingkat --');
        $this->load->view('layout', $d);
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
			$condition[0] 	= 'no_formula';
			$condition[1] 	= $no_formula;
            $condition[2] 	= 'where';
            $this->M_admin->update_data('m_siswa_tbl', $condition, $data);
            echo json_encode(['responseUpdate' => 'OKE']);
        }
     
    }

    
    function absensi_siswa(){
        $d['title']         =   'Absensi Siswa';
        $d['submenu']       =   'Absensi Siswa';
        $d['page']          =   'absensi_siswa';
        $d['title_page']    =   'Absensi Siswa';
        $d['menu']          =   'Absensi Siswa';
        $d['ta']            =   $this->M_core->getListSelectDefNol('m_ta_tbl', 'aktif', 1, 'id_ta', 'teks_ta', '-- Pilih Tahun Ajaran --');
        $d['jenjang']       =   $this->M_core->getListSelectDefNol('m_jenjang_tbl', 'aktif', 1, 'id_jenjang', 'jenjang', '-- Pilih Tahun Ajaran --');
        $d['tingkat']       =   $this->M_core->getListSelectDefNol('m_tingkat_tbl', 'aktif', 1, 'id_tingkat', 'tingkat', '-- Pilih Tingkat --');
        $this->load->view('layout', $d);
    }

    function data_kelas_siswa(){
        $d['title']         =   'Penempatan Kelas Baru';
        $d['submenu']       =   'Penempatan Kelas Baru';
        $d['page']          =   'penempatan_kelas_baru';
        $d['title_page']    =   'Penempatan Kelas Baru';
        $d['menu']          =   'Penempatan Kelas Baru';
        $d['siswa']         =   $this->M_core->getListSelectDefNol('m_siswa_tbl', 'aktif', 1, 'id_siswa', 'nama', '-- Pilih Siswa--');
        $d['kelas']       =   $this->M_core->getListSelectDefNol('m_kelas', 'aktif', 1, 'id_kelas', 'nm_kelas', '-- Pilih Kelas --');
        $this->load->view('layout', $d);
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
           
        
            $response['siswa']    =   $this->M_core->getListSelectedDefNol('m_siswa_tbl', 'aktif', 1, 'id_siswa', $response['id_siswa'], 'id_siswa', 'nama', '-- Pilih Siswa --');
            $response['kelas']    =   $this->M_core->getListSelectedDefNol('m_kelas', 'aktif', 1, 'id_kelas', $response['id_kelas'], 'id_kelas', 'nm_kelas', '-- Pilih Kelas --');
        }
     

        echo json_encode($response);
    }

    function showDataKelasSiswa(){
        $table          = 'v_kelas_siswa';
		
        $column_order   = array(null, 'nama','nm_kelas', null, null); 
        $column_search  = array('nama', 'nm_kelas'); 
        $order          = array('id_siswa_kelas' => 'asc');

        $list_data   	= $this->M_admin->get_datatables($table, $column_order, $column_search, $order);
        $data           = array();
        $no             = $_POST['start'];
        foreach ($list_data as $ld) {
        	$status 	= $ld->aktif;

            if ($status == 1) {
				$html_stat 	= '<input class="action" data-action="aktif" data-id_siswa_kelas="'.$ld->id_siswa_kelas.'" 
								type="checkbox" id="lbl-'.$ld->nama.'" checked switch="none" >
                                    <label for="lbl-'.$ld->id_siswa_kelas.'" data-on-label="On" data-off-label="Off"></label>';
        	} else {
				$html_stat 	= '<input class="action" data-action="aktif" data-id_siswa_kelas="'.$ld->id_siswa_kelas.'" 
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
                                class="action btn btn-xs btn-icon waves-effect btn-info m-b-5 tooltip-hover tooltipstered"
                                title="Ubah"> <i class="fa fa-pencil"></i> 
                        </button>
                        &nbsp;<button 
                                type="button" data-id="'.$ld->id_siswa_kelas.'" data-master="t_siswa_kelas_tbl" data-col="id_siswa_kelas" data-action="delete" 
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

    function showDataSiswaAbsen(){
        $id_tingkat     =   $this->input->post('id_tingkat');
        $urutan_kelas   =   $this->input->post('urutan_kelas');

        $dataSiswa      = $this->db->query('SELECT * FROM vw_kelas_siswa WHERE vw_kelas_siswa.aktif = 1 AND vw_kelas_siswa.id_tingkat = '.$id_tingkat.' AND vw_kelas_siswa.urutan_kelas = '.$urutan_kelas.' AND NOT EXISTS ( SELECT id_siswa FROM t_absen WHERE vw_kelas_siswa.id_siswa = t_absen.id_siswa AND DATE( tanggal ) = DATE(NOW()))')->result_array();
       
        $d['dataSiswa'] =   $dataSiswa;
        $d['present']   =   $this->M_core->getListSelectDefNol('m_present', 'aktif', 1, 'id_present', 'present', '-- Pilih Present --');
        $tampilSiswa = $this->load->view('showDataSiswaAbsensi', $d, TRUE);

        echo json_encode($tampilSiswa);
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
            $data['tanggal']      =   $tanggal;
           
            $res[]    =   $data;
        }
    
     
        $this->M_admin->insert_data_batch('t_absen', $res);
        echo json_encode(['responseInserAbsen' => TRUE]);
    }

    function penempatan_kenaikan_kls(){
        $d['title']         =   'Penempatan Kenaikan Kelas';
        $d['submenu']       =   'Penempatan Kenaikan Kelas';
        $d['page']          =   'penempatan_kenaikan_kls';
        $d['title_page']    =   'Penempatan Kenaikan Kelas';
        $d['menu']          =   'Penempatan Kenaikan Kelas';
        $d['ta']            =   $this->M_core->getListSelectDefNol('m_ta_tbl', 'aktif', 1, 'id_ta', 'teks_ta', '-- Pilih Tahun Ajaran --');
        $d['jenjang']       =   $this->M_core->getListSelectDefNol('m_jenjang_tbl', 'aktif', 1, 'id_jenjang', 'jenjang', '-- Pilih Tahun Ajaran --');
        $d['tingkat']       =   $this->M_core->getListSelectDefNol('m_tingkat_tbl', 'aktif', 1, 'id_tingkat', 'tingkat', '-- Pilih Tingkat --');
        $d['jurusan']       =   $this->M_core->getListSelectDefNol('m_jurusan_tbl', 'aktif', 1, 'id_jurusan', 'jurusan', '-- Pilih Jurusan --');
        $this->load->view('layout', $d);
    }

    function showListSiswaBykls(){
        $id_ta          =   $this->input->post('id_ta');
        $id_jenjang     =   $this->input->post('id_jenjang');
        $id_jurusan     =   $this->input->post('id_jurusan');
        $id_tingkat     =   $this->input->post('id_tingkat');
        $urutan         =   $this->input->post('urutan');
        
        $condition      =   [];
        $condition[]    =   ['id_ta', $id_ta, 'where'];
        $condition[]    =   ['id_jenjang', $id_jenjang, 'where'];
        $condition[]    =   ['id_jurusan', $id_jurusan, 'where'];
        $condition[]    =   ['id_tingkat', $id_tingkat, 'where'];
        $condition[]    =   ['urutan_kelas', $urutan, 'where'];
        $dataSiswa      =   $this->M_admin->get_master_spec('vw_kelas_siswa', 'id_siswa_kelas, id_siswa, nama', $condition)->result_array();

       
        $d['dataSiswa'] =   $dataSiswa;
        $d['tingkat']   =   $this->M_core->getListSelectDefNol('m_tingkat_tbl', 'aktif', 1, 'id_tingkat', 'tingkat', '-- Pilih Tingkat --');
        $tampilSiswa = $this->load->view('showDataSiswaKls', $d, TRUE);

        // var_dump($dataSiswa);
        // die();
        echo json_encode($tampilSiswa);
    }

}