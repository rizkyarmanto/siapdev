<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Laporan extends CI_Controller {

    function __construct() {
        parent::__construct();
        if(!$this->session->userdata('id_user')) {
            redirect('user');
        }
    }

    function laporan_psb(){
        $d['title'] = 'Laporan PSB';
        $d['submenu'] = 'Laporan';
        $d['page']  = 'laporanPSB';
        $d['title_page'] = 'Laporan psb';
        $d['menu']  = 'Laporan';
        $d['ta'] = $this->M_core->listSelectTA($this->session->userdata('id_sekolah'));
        $d['laporan'] = $this->M_core->listLaporan_psb();
        $this->load->view('layout', $d);
    }

    function pendaftaran_psb(){
        $d['title'] = 'Laporan';
        $d['page'] = 'laporan_psb';
        $d['title_page'] = 'Laporan Pendaftaran';
        $d['menu'] = 'Laporan';
        $d['submenu'] = 'Laporan';
        $d['list_ta']      = $this->M_global->list_select3('m_ta_tbl')->result_array();
        $d['list_jenjang'] = $this->M_global->list_select('m_jenjang_tbl')->result_array();
        $d['list_jurusan'] = $this->M_global->list_select('m_jurusan_tbl')->result_array();
        $d['list_tingkat'] = $this->M_global->list_select3('m_tingkat_tbl')->result_array();        
        $d['list_kelas']   = $this->M_global->list_select6('t_siswa_kelas_tbl', 'urutan_kelas')->result_array();  

        $this->load->view('layout', $d);
    }

    function psb_print($id_ta){
        $get_ta = $this->M_data->get_ta($id_ta)->row();
        $teks_ta = $get_ta->teks_ta;
        $d['title'] = 'Laporan Cetak PSB';
        $d['judul'] = 'Laporan PSB Tahun Ajaran '.$teks_ta;
        $d['data_psb'] = $this->M_data->get_all_psb($id_ta)->result();
        $this->load->view('psb_print', $d);
    }

    function pembayaran_psb(){
        $d['title'] = 'Laporan Pembayaran';
        $d['page'] = 'pembayaran_psb';
        $d['title_page'] = 'Laporan Pendaftaran';
        $d['menu'] = 'Laporan';
        $d['submenu'] = 'Laporan';
        $d['list_jenjang'] = $this->M_global->list_select('m_jenjang_tbl')->result_array();
        $d['list_jurusan'] = $this->M_global->list_select('m_jurusan_tbl')->result_array();
        $this->load->view('layout', $d);
    }

    function pembayaran_print(){
        $thn = date('Y');

        $d['title'] = 'Laporan Cetak Pembayaran PSB';
        $d['judul'] = 'Laporan Pembayaran PSB Tahun '.date('Y');
        $d['jml_data_bayar'] = $this->M_data->get_data_bayar($thn)->num_rows();
        $d['data_bayar'] = $this->M_data->get_data_bayar($thn)->result();
        $d['data_psb'] = $this->M_data->get_pembayaran_psb($thn)->result();
        $this->load->view('pembayaran_print', $d);
    }

    function pelunasan_psb(){
        $d['title'] = 'Laporan Pelunasan';
        $d['page'] = 'pelunasan_psb';
        $d['title_page'] = 'Laporan Pelunasan';
        $d['menu'] = 'Laporan';
        $d['submenu'] = 'Laporan';

        $this->load->view('layout', $d);
    }

    function pelunasan_print(){
        $thn = date('Y');
        $d['title'] = 'Laporan Cetak Pelunasan PSB';
        $d['judul'] = 'Laporan Pelunasan Pembayaran PSB Tahun '.date('Y');
        $d['data_psb'] = $this->M_data->get_all_pelunasan($thn)->result();
        $this->load->view('pelunasan_print', $d);
    }

    function pembatalan_psb(){
        $d['title'] = 'Laporan Pelunasan';
        $d['page'] = 'batal_psb';
        $d['title_page'] = 'Laporan Pembatalan';
        $d['menu'] = 'Laporan';
        $d['submenu'] = 'Laporan';

        $this->load->view('layout', $d);
    }

    function pembatalan_print(){
        $thn = date('Y');
        $d['title'] = 'Laporan Cetak Pembatalan PSB';
        $d['judul'] = 'Laporan Pembatalan PSB Tahun '.date('Y');
        $d['data_psb'] = $this->M_data->get_all_pembatalan($thn)->result();
        $this->load->view('pembatalan_print', $d);
    }
}