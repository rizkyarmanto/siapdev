<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_chained extends CI_Model {

var $tabel_provinsi='m_provinsi_tbl';
var $tabel_kabupaten='m_kabupaten_tbl';
var $tabel_kecamatan='m_kecamatan_tbl';
var $tabel_kelurahan='m_kelurahan_tbl';

	public function __construct(){
	parent::__construct();
	}
	
	public function ambil_provinsi() {
	$sql_prov=$this->db->get($this->tabel_provinsi);	
	if($sql_prov->num_rows()>0){
		foreach ($sql_prov->result_array() as $row)
			{
				$result['0']= '- Pilih Provinsi -';
				$result[$row['id_provinsi']]= ucwords(strtolower($row['nama_provinsi']));
			}
			return $result;
		}
	}
	
	public function ambil_kabupaten($kode_prop){
	$this->db->where('id_provinsi',$kode_prop);
	$this->db->order_by('nama_kabupaten','asc');
	$sql_kabupaten=$this->db->get($this->tabel_kabupaten);
	if($sql_kabupaten->num_rows()>0){

		foreach ($sql_kabupaten->result_array() as $row)
        {
            $result[$row['id_kabupaten']]= ucwords(strtolower($row['nama_kabupaten']));
        }
		} else {
		   $result['0']= '- Belum Ada Kabupaten -';
		}
        return $result;
	}
	
	public function ambil_kecamatan($kode_kab){
	$this->db->where('id_kabupaten',$kode_kab);
	$this->db->order_by('nama_kecamatan','asc');
	$sql_kecamatan=$this->db->get($this->tabel_kecamatan);
	if($sql_kecamatan->num_rows()>0){

		foreach ($sql_kecamatan->result_array() as $row)
        {
            $result[$row['id_kecamatan']]= ucwords(strtolower($row['nama_kecamatan']));
        }
		} else {
		   $result['0']= '- Belum Ada Kecamatan -';
		}
        return $result;
	}

	public function ambil_kelurahan($kode_kec){
	$this->db->where('id_kecamatan',$kode_kec);
	$this->db->order_by('nama_kelurahan','asc');
	$sql_kelurahan=$this->db->get($this->tabel_kelurahan);
	if($sql_kelurahan->num_rows()>0){

		foreach ($sql_kelurahan->result_array() as $row)
        {
            $result[$row['id_kelurahan']]= ucwords(strtolower($row['nama_kelurahan']));
        }
		} else {
		   $result['0']= '- Belum Ada Kelurahan -';
		}
        return $result;
	}



}
