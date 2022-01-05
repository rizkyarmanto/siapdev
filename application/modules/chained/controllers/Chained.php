<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Chained extends CI_Controller {
	function __construct() {
		parent:: __construct();
		if(!$this->session->userdata('id_user')) {
            redirect('user');
		}	
	}	

	public function pilih_provinsi() {
	    $data['provinsi']=$this->M_chained->ambil_provinsi();
	}

	// dijalankan saat provinsi di klik
	public function pilih_kabupaten($kode){
		$data['kabupaten']=$this->M_chained->ambil_kabupaten($kode);
		$this->load->view('v_drop_down_kabupaten',$data);
	}

	// dijalankan saat kabupaten di klik
	public function pilih_kecamatan($kode){
		$data['kecamatan']=$this->M_chained->ambil_kecamatan($kode);
		$this->load->view('v_drop_down_kecamatan',$data);
	}
	
	// dijalankan saat kecamatan di klik
	public function pilih_kelurahan($kode){
		$data['kelurahan']=$this->M_chained->ambil_kelurahan($kode);
		$this->load->view('v_drop_down_kelurahan',$data);
	}
}
?>
