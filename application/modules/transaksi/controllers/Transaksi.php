<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
     
class Transaksi extends CI_Controller {

    function __construct() {
        parent::__construct();
        if(!$this->session->userdata('id_user')) {
            redirect('user');
        }
    }

    function index() {
        $d['title'] = 'Transaksi';
        $d['page']  = 'menu';
        $d['title_page'] = 'Transaksi';
        $d['menu']  = 'Transaksi';
        $this->load->view('layout', $d);
    }

    /*********************** GENERAL ************************/
    var $id_tipe_transaksi = array('psb' => 1, 'bln' => 2, 'thn' => 3, 'cu' => 4);
    var $id_siswa_status = array('daftar' => 1);
    /*********************** /GENERAL ************************/



    /************************ TOOLS *************************/
    function get_jurusan() {
        $id_jenjang = $this->input->post('id');
        
        if($id_jenjang == 4) {
            $d['jurusan'] = '<option value="0" disabled="disabled" selected="selected">- Pilih jurusan -</option>';
        } else {
            $whr = array(
                     'id_jurusan !=' => 0,
                     'id_sekolah' => $this->session->userdata('id_sekolah'),
                     'aktif' => 1
                     );
            $get_jurusan = $this->M_transaksi->get_jurusan_w($whr)->result();
            $d['jurusan'] = '<option value="0" disabled="disabled" selected="selected">- Pilih jurusan -</option>';
            foreach($get_jurusan as $gtjur) {
                $d['jurusan'] .= '<option value="'.$gtjur->id_jurusan.'">'.$gtjur->jurusan.'</option>';
            }
        }
        echo $d['jurusan'];
    }
    /*********************** /TOOLS *************************/



    /********************* GET BY NOFOR *********************/
    function get_data_siswa_by_nofor() {   
        $no_formulir = $this->input->post('no_formulir');

        if($no_formulir == '') {
            echo 'null';
        } else {
            $cek = $this->M_transaksi->get_nofor_by_nofor($no_formulir)->num_rows();
            if($cek == 0) {
                echo 'notvalid';
            } else {
                $no = 1;
                $get_formulir = $this->M_transaksi->get_nofor_by_nofor($no_formulir)->row();
                $id_siswa = $get_formulir->id_siswa;
                $whr = array('id_siswa' => $id_siswa);
                $gsis = $this->M_transaksi->get_v_siswa($whr)->row();
                        
                $d['vsiswa'] = 
                '<div class="row form-group">
                  <label class="col-lg-2 col-sm-2 text-right"><font color="red">*</font> Nomor Formulir</label>
                  <label class="col-lg-1 col-sm-1 text-right"> : </label>
                  <div class="col-lg-9 col-sm-9">
                    <div class="input-group">
                      <input type="text" name="no_formulir" class="form-control" 
                      placeholder="Masukan nomor formulir" value="'.$no_formulir.'">
                        <span class="input-group-btn">
                            <button type="button" class="btn btn-success btn-flat" onclick="get_siswa()">
                                <i class="fa fa-search"></i> Cari
                            </button>
                        </span>
                    </div>
                  </div>
                </div>
                <div class="row form-group">
                  <label class="col-lg-2 col-sm-2 text-right"><font color="red">*</font> Nama Siswa</label>
                  <label class="col-lg-1 col-sm-1 text-right"> : </label>
                  <div class="col-lg-9 col-sm-9">
                    <input type="hidden" name="id_siswa" class="form-control" value="'.$gsis->id_siswa.'" />
                    <input type="text" name="nama" class="form-control" placeholder="Masukan nama siswa" 
                    value="'.$gsis->nama.'" readonly />
                  </div>
                </div>
                <div class="row form-group">
                  <label class="col-lg-2 col-sm-2 text-right">Asal Sekolah</label>
                  <label class="col-lg-1 col-sm-1 text-right"> : </label>
                  <div class="col-lg-9 col-sm-9">
                    <input type="text" name="asal_sekolah" class="form-control" placeholder="Masukan asal sekolah" 
                    value="'.$gsis->asal_sekolah.'" readonly />
                  </div>
                </div>
                <div class="row form-group">
                  <label class="col-lg-2 col-sm-2 text-right">Tahun Ajaran</label>
                  <label class="col-lg-1 col-sm-1 text-right"> : </label>
                  <div class="col-lg-9 col-sm-9">
                  <input type="hidden" name="id_ta" class="form-control" value="'.$gsis->id_ta.'" readonly />
                    <input type="text" class="form-control" value="'.$gsis->teks_ta.'" readonly />
                  </div>
                </div>
                <div class="row form-group">
                  <label class="col-lg-2 col-sm-2 text-right">Gelombang</label>
                  <label class="col-lg-1 col-sm-1 text-right"> : </label>
                  <div class="col-lg-9 col-sm-9">
                    <input type="hidden" name="id_gelombang" class="form-control" value="'.$gsis->id_gelombang.'" readonly />
                    <input type="text" class="form-control" value="'.$gsis->gelombang.'" readonly />
                  </div>
                </div>
                <div class="row form-group">
                  <label class="col-lg-2 col-sm-2 text-right">Jenjang</label>
                  <label class="col-lg-1 col-sm-1 text-right"> : </label>
                  <div class="col-lg-9 col-sm-9">
                    <input type="hidden" name="id_jenjang" class="form-control" value="'.$gsis->id_jenjang.'" readonly />
                    <input type="text" class="form-control" value="'.$gsis->jenjang.'" readonly />
                  </div>
                </div>
                <div class="row form-group">
                  <label class="col-lg-2 col-sm-2 text-right">Jurusan</label>
                  <label class="col-lg-1 col-sm-1 text-right"> : </label>
                  <div class="col-lg-9 col-sm-9">
                    <input type="hidden" name="id_jurusan" class="form-control" value="'.$gsis->id_jurusan.'" readonly />
                    <input type="text" class="form-control" value="'.$gsis->jurusan.'" readonly />
                  </div>
                </div>';
                
                echo $d['vsiswa'];
            }
        }
    }

    function get_riwayat_by_nofor() {
        $no_formulir = $this->input->post('no_formulir');
        $id_tipe_transaksi = $this->input->post('id_tipe_transaksi');
        if($no_formulir == '') {
            echo 'null';

        } else {
            $cek = $this->M_transaksi->get_nofor_by_nofor($no_formulir)->num_rows();
            if($cek == 0) {
                echo 'notvalid';

            } else {
                $no = 1;
                $get_formulir = $this->M_transaksi->get_nofor_by_nofor($no_formulir)->row();
                $id_siswa = $get_formulir->id_siswa;
                $whr = array('id_siswa' => $id_siswa, 'id_tipe_transaksi' => $id_tipe_transaksi);
                $get_vpem = $this->M_transaksi->get_v_pembayaran($whr); 
                
                $d['riwayat'] = 
                '<ul class="timeline">';

                foreach($get_vpem->result() as $gvpm) {
                    $explode = explode(' ', $gvpm->waktu);
                    $date = $explode[0];
                    $time = $explode[1];
                    $d['riwayat'] .= 
                    '<li class="time-label">
                        <span class="bg-red">
                            '.date('d-m-Y', strtotime($date)).'
                        </span>
                    </li>';
                    
                    $whr_det = array('id_pembayaran' => $gvpm->id_pembayaran);
                    $get_vpemdet = $this->M_transaksi->get_v_pembayaran_detail($whr_det);     
                    foreach($get_vpemdet->result() as $gvpmd) {
                        $explode_det = explode(' ', $gvpmd->waktu);
                        $time_det = $explode_det[1];
                        $d['riwayat'] .=
                        '<li>
                            <i class="fa fa-money bg-green"></i>
                            <div class="timeline-item">
                                <span class="time"><i class="fa fa-clock-o"></i> '.$time_det.'</span>
                                <h3 style="font-size: 14px" class="timeline-header no-border">
                                    Bayar item <b> '.$gvpmd->nama_tarif.' </b>  
                                    <a><i> '.number_format($gvpmd->nominal).'</i></a>
                                </h3>
                            </div>
                          </li>';   
                    }
                }
                $d['riwayat'] .= 
                    '<li>
                        <i class="fa fa-clock-o bg-gray"></i>
                    </li>
                </ul>';

                echo $d['riwayat'];   
            }
        }
    }
    /********************* /GET BY NOFOR *********************/



    /************************** PSB *************************/
    function transaksi_psb() {   
        $d['title'] = 'Transaksi PSB';
        $d['page'] = 't_psb';
        $d['title_page'] = 'Daftar PSB';
        $d['menu'] = 'Transaksi';
        $d['submenu'] = 'PSB';
        $d['provinsi'] = $this->M_chained->ambil_provinsi();
        $whr = array('aktif' => 1);
        $whr_gel = array('aktif' => 1, 'id_gelombang !=' => 0);
        $get_ta = $this->M_transaksi->get_ta_w($whr)->result();
        $get_gelombang = $this->M_transaksi->get_gelombang_w($whr_gel)->result();
        $get_jenjang = $this->M_transaksi->get_jenjang_w($whr)->result();
        $get_jenis_sosmed = $this->M_transaksi->get_jenis_sosmed_w($whr)->result();

        $d['tipe_transaksi'] = '<input type="hidden" name="tipe_transaksi" value="psb">';
        $d['bulan'] = '<input type="hidden" name="id_bulan" value="0">';

        $d['ta'] = '';
        $d['ta'] = '<option value="0" disabled="disabled" selected="selected">- Pilih tahun ajaran -</option>';
        foreach($get_ta as $gta) {
            $d['ta'] .= '<option value="'.$gta->id_ta.'">'.$gta->teks_ta.'</option>';
        }

        $d['glb'] = '';
        $d['glb'] = '<option value="0" disabled="disabled" selected="selected">- Pilih gelombang -</option>';
        foreach($get_gelombang as $glb) {
            $d['glb'] .= '<option value="'.$glb->id_gelombang.'">'.$glb->gelombang.'</option>';
        }

        $d['jenjang'] = '';
        $d['jenjang'] = '<option value="0" disabled="disabled" selected="selected">- Pilih jenjang -</option>';
        foreach($get_jenjang as $jenjang) {
            $d['jenjang'] .= '<option value="'.$jenjang->id_jenjang.'">'.$jenjang->jenjang.'</option>';
        }

        $d['jenis_sosmed'] = '';
        foreach($get_jenis_sosmed as $gjsosmed) {
            $d['jenis_sosmed'] .= '<div class="row form-group">
                                    <label class="col-sm-3">'.$gjsosmed->jenis.'</label>
                                    <div class="col-sm-9">
                                      <input type="hidden" value="'.$gjsosmed->id_jenis_sosmed.'" name="id_jenis_sosmed[]" class="form-control input-sm" />
                                      <input type="text" name="sosmed[]" class="form-control input-sm" placeholder="Masukan '.$gjsosmed->jenis.' siswa"/>
                                    </div>
                                  </div>';
        }
        $this->load->view('layout', $d);
    }

    function get_tarif_psb() {
        $id_tipe_transaksi = $this->input->post('id_tipe_transaksi');
        $id_siswa = $this->input->post('id_siswa');
        $id_ta = $this->input->post('id_ta');
        $id_gelombang = $this->input->post('id_gelombang');
        $id_jenjang = $this->input->post('id_jenjang');
        $id_jurusan = $this->input->post('id_jurusan');
        $tingkat = $this->input->post('tingkat');

        $whr = array(
            'id_tipe_transaksi' => $id_tipe_transaksi,
            'id_ta' => $id_ta,
            'id_gelombang' => $id_gelombang,
            'id_jenjang' => $id_jenjang,
            'id_jurusan' => $id_jurusan,
            'tingkat' => $tingkat,
            'aktif' => 1
            );

        $get_tarnil = $this->M_transaksi->get_tarif_nilai_w($whr);
        $check_tarnil = $get_tarnil->num_rows();

        if($check_tarnil == 0) {
            $d['tarif'] = 
            '<tr>
                <td colspan="6">
                    <h5 class="text-center"><i>Tidak ada data !</i></h5>
                </td>
            </tr>';
        
        } else {
            $whr_ttr = array('id_tipe_transaksi' => $id_tipe_transaksi);
            $get_ttr = $this->M_transaksi->get_tipe_transaksi_w($whr_ttr);
            $gttr = $get_ttr->row();

            //IF ID_SISWA == 0
            if($id_siswa == 0) {
                $d['tarif'] = '';
                $no = 1;
                foreach($get_tarnil->result() as $gtar) {
                    $d['tarif'] .=            
                    '<tr>
                        <input type="hidden" name="id_tarif_nilai[]" value="'.$gtar->id_tarif_nilai.'">
                        <td class="text-center">'.$no++.'</td>
                        <td class="text-left">'.$gtar->nama_tarif.'</td>
                        <td class="text-right">'.number_format($gtar->nom_total).'</td>
                        <td class="text-right"></td>
                        <td class="text-right">
                            <input type="number" name="nominal[]" class="form-control text-right" value="0">
                        </td>
                        <td class="text-right">
                            <input type="checkbox" data-nom="'.$gtar->nom_total.'" onchange="buy_all(this)">
                        </td>
                    </tr>';
                }

            //IF ID_SISWA != 0
            } else {
                $d['tarif'] = '';
                $no = 1;
                foreach($get_tarnil->result() as $gtar) {

                    $get_sum = $this->M_transaksi->get_v_pembayaran_detail_sum($id_siswa, $gtar->id_tarif_nilai);
                    $check = $get_sum->num_rows();
                    $nominal = '';
                    $checkbox = '';  

                    //JIKA PERNAH BUY
                    if($check == 1) {
                        $gsum = $get_sum->row();
                        $nom_sisa = (int)$gsum->nominal_sisa;
                        $label_nom_sisa = '<i>'.number_format((int)$gsum->nominal_sisa).'<i>';
                        if($gsum->nominal_sisa == 0) {
                            $nominal = 'readonly';
                            $checkbox = 'disabled';
                        }
                        //IF KERINGANAN != NULL
                        if($gsum->jenis_keringanan != null) {
                            if($gsum->jenis_keringanan == 'diskon') {
                                $label_ker =
                                '<small class="label label-danger" data-toggle="tooltip" title="'.$gsum->keringanan.'">
                                    '.$gsum->nominal_keringanan.' <i class="fa fa-percent"></i>
                                </small>';
                            } else {
                                $label_ker =
                                '<small class="label label-success" data-toggle="tooltip" title="'.$gsum->keringanan.'">
                                    '.number_format($gsum->nominal_keringanan).'
                                </small>';
                            }
                        } else {
                            $label_ker = '';
                        }

                    //JIKA NEVER BUY
                    } else {
                        $whr_kerit = array('id_siswa' => $id_siswa, 'id_tarif_nilai' => $gtar->id_tarif_nilai);
                        $get_kerit = $this->M_transaksi->get_v_keringanan_item($whr_kerit);
                        $check = $get_kerit->num_rows();

                        if($check == 1) {
                            $gkr = $get_kerit->row();
                            if($gkr->jenis_keringanan == 'diskon') {
                                $nom_sisa = $gtar->nom_total - ($gkr->nominal * $gtar->nom_total /100);
                                $label_nom_sisa =
                                '<i>'.number_format($nom_sisa).'<i>';
                                $label_ker =
                                '<small class="label label-danger" data-toggle="tooltip" title="'.$gkr->keringanan.'">
                                    '.$gkr->nominal.' <i class="fa fa-percent"></i>
                                </small>';
                            } else {
                                $nom_sisa = $gtar->nom_total - $gkr->nominal;
                                $label_nom_sisa =
                                '<i>'.number_format($nom_sisa).'<i>';
                                $label_ker =
                                '<small class="label label-success" data-toggle="tooltip" title="'.$gkr->keringanan.'">
                                    '.number_format($gkr->nominal).'
                                </small>';
                            }
                        } else {
                            $nom_sisa = $gtar->nom_total;
                            $label_nom_sisa =
                            '<i>'.number_format($gtar->nom_total).'<i>';
                            $label_ker = '';
                        } 
                    }

                    $d['tarif'] .=            
                    '<tr>
                        <input type="hidden" name="id_tarif_nilai[]" value="'.$gtar->id_tarif_nilai.'">
                        <td class="text-center">'.$no++.'</td>
                        <td class="text-left">'.$gtar->nama_tarif.'</td>
                        <td class="text-right">'.$label_nom_sisa.'</td>
                        <td class="text-right">'.$label_ker.'</td>
                        <td class="text-right">
                            <input type="number" name="nominal[]" class="form-control text-right" value="0" '.$nominal.'>
                        </td>
                        <td class="text-right">
                            <input type="checkbox" data-nom="'.$nom_sisa.'" onchange="buy_all(this)" '.$checkbox.'>
                        </td>
                    </tr>';
                }
            } 
        }
        echo $d['tarif'];
    }

    function get_keringanan_psb() {
        $id_tipe_transaksi = $this->input->post('id_tipe_transaksi');
        $id_siswa = $this->input->post('id_siswa');
        $id_ta = $this->input->post('id_ta');
        $id_gelombang = $this->input->post('id_gelombang');
        $id_jenjang = $this->input->post('id_jenjang');
        $id_jurusan = $this->input->post('id_jurusan');
        $tingkat = $this->input->post('tingkat');

        $whr = array(
            'id_tipe_transaksi' => $id_tipe_transaksi,
            'id_ta' => $id_ta,
            'id_gelombang' => $id_gelombang,
            'id_jenjang' => $id_jenjang,
            'id_jurusan' => $id_jurusan,
            'tingkat' => $tingkat,
            'aktif' => 1
            );

        $get_kernil = $this->M_transaksi->get_keringanan_nilai_w($whr);
        $check_kernil = $get_kernil->num_rows();

        $get_tarnil = $this->M_transaksi->get_tarif_nilai_w($whr);
        $check_tarnil = $get_tarnil->num_rows();
        
        $d['keringanan'] = '';
        if($check_kernil == 0) {
            $d['keringanan'] .= 
            '<tr id="row_keringanan">
                <td colspan="2">
                    <h5 class="text-center">
                        <i>Tidak ada data !</i>
                    </h5>
                </td>
                <td>
                    <button type="button" class="btn btn-sm btn-danger btn-flat del_row_keringanan">
                    <i class="fa fa-minus-circle"></i> </button>
                </td>
            </tr>';
        
        } else {
            $d['keringanan'] .= 
            '<tr id="row_keringanan">
                <td>
                    <select name="id_keringanan_nilai[]" class="form-control">
                        <option value="0" selected="selected">- Pilih keringanan -</option>';
                        foreach($get_kernil->result() as $gkernil) {
                            
                            if($gkernil->jenis_keringanan == 'diskon') {
                                $nom_kernil = $gkernil->nominal.' %';
                            } else {
                                $nom_kernil = number_format($gkernil->nominal);
                            }

                            if($id_siswa != 0) {
                                $whr_vkerit = array(
                                'id_tipe_transaksi' => $id_tipe_transaksi,
                                'id_keringanan_nilai' => $gkernil->id_keringanan_nilai,
                                'id_siswa' => $id_siswa
                                );
                                $get_vkerit = $this->M_transaksi->get_v_keringanan_item($whr_vkerit);
                                $check_vkerit = $get_vkerit->num_rows();
                                if($check_vkerit != 0) {
                                    $d['keringanan'] .=
                                    '<option value="'.$gkernil->id_keringanan_nilai.'" disabled="disabled">
                                    '.$gkernil->keringanan.' ('.$nom_kernil.')</option>';  
                                } else {
                                    $d['keringanan'] .=
                                    '<option value="'.$gkernil->id_keringanan_nilai.'">
                                    '.$gkernil->keringanan.' ('.$nom_kernil.')</option>';  
                                }
                            } else {
                                $d['keringanan'] .=
                                '<option value="'.$gkernil->id_keringanan_nilai.'">'.$gkernil->keringanan.' ('.$nom_kernil.')</option>';  
                            }
                        }                        
                    $d['keringanan'] .=    
                    '</select>
                </td>
                <td>
                    <select name="id_tarif_nilai_for_keringanan[]" class="form-control">
                        <option value="0" selected="selected">- Pilih tarif -</option>';
                        foreach($get_tarnil->result() as $gtarnil) {

                            if($id_siswa != 0) {
                                $whr_vkerit = array(
                                'id_tipe_transaksi' => $id_tipe_transaksi,
                                'id_tarif_nilai' => $gtarnil->id_tarif_nilai,
                                'id_siswa' => $id_siswa
                                );
                                $get_vkerit = $this->M_transaksi->get_v_keringanan_item($whr_vkerit);
                                $check_vkerit = $get_vkerit->num_rows();
                                if($check_vkerit != 0) {
                                    $d['keringanan'] .=
                                    '<option value="'.$gtarnil->id_tarif_nilai.'" disabled="disabled">'.$gtarnil->nama_tarif.'</option>';  
                                } else {
                                    $d['keringanan'] .=
                                    '<option value="'.$gtarnil->id_tarif_nilai.'">'.$gtarnil->nama_tarif.'</option>';  
                                }
                            } else {
                                $d['keringanan'] .=
                                '<option value="'.$gtarnil->id_tarif_nilai.'">'.$gtarnil->nama_tarif.'</option>';  
                            }
                        }
                    $d['keringanan'] .=    
                    '</select>
                </td>
                <td>
                    <button type="button" class="btn btn-sm btn-danger btn-flat del_row_keringanan">
                    <i class="fa fa-minus-circle"></i> </button>
                </td>
            </tr>';
        }
        echo $d['keringanan'];
    }

    function generate_insert_no_formulir($id_jenjang,$id_siswa) {
        if($id_jenjang == 1) {
            $inisial = 'A';
        } else if($id_jenjang == 2) {
            $inisial = 'B';
        } else if($id_jenjang == 3) {
            $inisial = 'C';
        } else if($id_jenjang == 4) {
            $inisial = 'D';
        }
        
        $cek = $this->M_transaksi->get_nofor_by_id_jenjang($id_jenjang)->num_rows();
        if($cek == 0) {
            $no_formulir = $inisial.'0001';
        } else {
            $get_no_formulir = $this->M_transaksi->get_nofor_by_id_jenjang($id_jenjang)->result();
            $last_nf = $get_no_formulir[0]->no_formulir;
            $last_number = substr($last_nf, 1, 4) + 1;
            if($last_number < 10) {
                $no_formulir = $inisial.'000'.$last_number;
            } else if($last_number > 9 && $last_number <= 99) {
                $no_formulir = $inisial.'00'.$last_number;
            } else if($last_number > 99 && $last_number <= 999) {
                $no_formulir = $inisial.'0'.$last_number;
            } else {
                $no_formulir = $inisial.''.$last_number;
            }  
        }

        $data_id_sis_no_for = array(
                                'id_siswa' => $id_siswa,
                                'id_jenjang' => $id_jenjang,
                                'no_formulir' => $no_formulir
                                );

        $insert_no_formulir = $this->M_transaksi->insert_no_formulir($data_id_sis_no_for);

        return $no_formulir;
    }

    function input_transaksi_psb() {
        //Data transaksi        
        $id_tipe_transaksi = $this->input->post('id_tipe_transaksi');
        $id_siswa = $this->input->post('id_siswa');
        $id_ta = $this->input->post('id_ta');
        $id_gelombang = $this->input->post('id_gelombang');
        $id_jenjang = $this->input->post('id_jenjang');
        $id_jurusan = $this->input->post('id_jurusan');
        $tingkat = $this->input->post('tingkat');
        $id_bulan = $this->input->post('id_bulan');

        //Data siswa 
        $nama = $this->input->post('nama');
        $asal_sekolah = $this->input->post('asal_sekolah');
        
        //Batch keringanan
        $id_keringanan_nilai = $this->input->post('id_keringanan_nilai');
        $id_tarif_nilai_for_keringanan = $this->input->post('id_tarif_nilai_for_keringanan');

        //Batch tarif
        $id_tarif_nilai = $this->input->post('id_tarif_nilai');
        $nominal = $this->input->post('nominal');

        //Jika tidak ada id nilai tarif
        if($id_tarif_nilai == null) {
            $this->session->set_flashdata("pesan_error", "Pilih salah satu item yang ingin dibayar !");
            redirect('transaksi/transaksi_psb');

        //Jika nominal tidak ada yang diisini
        } else if(count(array_filter($nominal)) == 0) {
            $this->session->set_flashdata("pesan_error", "Isi nominal pada salah satu item yang ingin dibayar !");
            redirect('transaksi/transaksi_psb');
        
        //Jika sudah memenuhi syarat    
        } else {
            
            //Data Siswa
            $data_siswa = array(
                            'id_ta'                 => $id_ta,
                            'id_gelombang'          => $id_gelombang,
                            'id_jenjang'            => $id_jenjang,
                            'id_jurusan'            => $id_jurusan,
                            'nama'                  => $nama,
                            'asal_sekolah'          => $asal_sekolah,             
                            );

            //(NOTYET) NO FORMULIR 
            if($id_siswa == 0) {

                //Insert data siswa
                $insert_data_siswa = $this->M_transaksi->insert_data_siswa($data_siswa);
                if(!$insert_data_siswa) {

                    //Last id_siswa
                    $id_siswa = $this->db->insert_id();

                    //Generate + insert nomor formulir
                    $no_formulir = $this->generate_insert_no_formulir($id_jenjang,$id_siswa);

                    //Insert data pembayaran
                    $data_pembayaran = array(
                                'id_tipe_transaksi' => $id_tipe_transaksi,
                                'id_ta'             => $id_ta,
                                'id_siswa'          => $id_siswa,
                                'closed'            => 0, //0 adalah default belum disetor
                                'id_user'           => $this->session->userdata('id_user'),
                                'waktu'             => date('Y-m-d H:i:s'),         
                                );  
                    $insert_data_pembayaran = $this->M_transaksi->insert_data_pembayaran($data_pembayaran);  
                    $id_pembayaran = $this->db->insert_id();
                    
                    if(!$insert_data_pembayaran) {

                        //Insert data pembayaran detail
                        $data_pembayaran_detail = array();
                        for($i=0;$i<count($id_tarif_nilai);$i++) {         
                            if($nominal[$i] != 0) {
                                $data_pembayaran_detail[] = array(
                                                             'id_pembayaran' => $id_pembayaran,
                                                             'id_tarif_nilai' => $id_tarif_nilai[$i],
                                                             'id_bulan' => $id_bulan,
                                                             'nominal' => $nominal[$i]
                                                            );           
                                
                            }
                        }
                        $insert_data_pembayaran_detail = $this->M_transaksi->insert_data_pembayaran_detail($data_pembayaran_detail);

                        //Insert data j keringanan siswa
                        $cekarr_kernil = is_array($id_keringanan_nilai);
                        if($cekarr_kernil == false) {
                            //false array do nothing
                        } else {
                            //true array
                            $count_kernil = count(array_filter($id_keringanan_nilai));
                            $count_tarnil_f_kernil = count(array_filter($id_tarif_nilai_for_keringanan));

                            if($count_kernil == 0) {
                                //Nol do nothing
                            } else if($count_tarnil_f_kernil == 0) {
                                //Nol do nothing
                            } else {
                                $data_keringanan_siswa = array();
                                for($i=0;$i<count($id_keringanan_nilai);$i++) {         
                                    $data_keringanan_siswa[$i] = 
                                    array(
                                        'id_siswa' => $id_siswa,
                                        'id_keringanan_nilai' => $id_keringanan_nilai[$i],
                                        'aktif' => 1
                                    );  
                                    $insert_keringanan_siswa[$i] = 
                                    $this->M_transaksi->insert_data_siswa_keringanan($data_keringanan_siswa[$i]);  
                                    $id_siswa_keringanan[$i] = $this->db->insert_id(); 
                                    $data_keringanan_item[$i] = 
                                    array(
                                        'id_siswa_keringanan' => $id_siswa_keringanan[$i],
                                        'id_tipe_transaksi' => $id_tipe_transaksi,
                                        'id_tarif_nilai' => $id_tarif_nilai_for_keringanan[$i],
                                                                );
                                    $insert_keringanan_item[$i] = 
                                    $this->M_transaksi->insert_data_keringanan_item($data_keringanan_item[$i]);
                                
                                }
                            }
                        }
                        
                        //Insert data histori siswa
                        $data_siswa_histori = array(
                                                 'id_siswa' => $id_siswa,
                                                 'id_siswa_status' => $this->id_siswa_status['daftar'],
                                                 'keterangan' => 'Telah mendaftarkan diri',
                                                 'waktu' => date('Y-m-d H:i:s')
                                                );  
                        $insert_data_siswa_histori = $this->M_transaksi->insert_data_siswa_histori($data_siswa_histori);

                        //Alert jika berhasil sampai insert data pembayaran
                        $this->session->set_flashdata("pesan_success", "Pendaftaran beserta pembayaran berhasil dilakukan, harap dicatat nomor formulir anda, yaitu <b><i>".$no_formulir. "</i></b> !");
                        redirect('transaksi/transaksi_psb');
                    } else {
                        //Alert jika tidak berhasil sampai insert data pembayaran
                        $this->session->set_flashdata("pesan_error", "Terjadi kesalahan, gagal memasukan data penerimaan siswa baru");
                        redirect('transaksi/transaksi_psb');
                    }
                } else {
                    //Alert jika tidak berhasil sampai insert data siswa
                    $this->session->set_flashdata("pesan_error", "Terjadi kesalahan, gagal memasukan data siswa");
                    redirect('transaksi/transaksi_psb');
                }

            //(YES) NO FORMULIR
            } else {

                //Insert data pembayaran
                $data_pembayaran = array(
                            'id_tipe_transaksi' => $id_tipe_transaksi,
                            'id_ta'             => $id_ta,
                            'id_siswa'          => $id_siswa,
                            'closed'            => 0, //0 adalah default belum disetor
                            'id_user'           => $this->session->userdata('id_user'),
                            'waktu'             => date('Y-m-d H:i:s'),         
                            );  
                $insert_data_pembayaran = $this->M_transaksi->insert_data_pembayaran($data_pembayaran);  
                $id_pembayaran = $this->db->insert_id();

                if(!$insert_data_pembayaran) {

                    //Insert data pembayaran detail
                    $data_pembayaran_detail = array();
                    for($i=0;$i<count($id_tarif_nilai);$i++) {         
                        if($nominal[$i] != 0) {
                            $data_pembayaran_detail[] = array(
                                                         'id_pembayaran' => $id_pembayaran,
                                                         'id_tarif_nilai' => $id_tarif_nilai[$i],
                                                         'id_bulan' => $id_bulan,
                                                         'nominal' => $nominal[$i]
                                                        );           
                            
                        }
                    }
                    $insert_data_pembayaran_detail = $this->M_transaksi->insert_data_pembayaran_detail($data_pembayaran_detail);

                    //Insert data j keringanan siswa
                    $cekarr_kernil = is_array($id_keringanan_nilai);
                    if($cekarr_kernil == false) {
                        //false array do nothing
                    } else {
                        //true array
                        $count_kernil = count(array_filter($id_keringanan_nilai));
                        $count_tarnil_f_kernil = count(array_filter($id_tarif_nilai_for_keringanan));

                        if($count_kernil == 0) {
                            //Nol do nothing
                        } else if($count_tarnil_f_kernil == 0) {
                            //Nol do nothing
                        } else {
                            $data_keringanan_siswa = array();
                            for($i=0;$i<count($id_keringanan_nilai);$i++) {         
                                $data_keringanan_siswa[$i] = 
                                array(
                                    'id_siswa' => $id_siswa,
                                    'id_keringanan_nilai' => $id_keringanan_nilai[$i],
                                    'aktif' => 1
                                );  
                                $insert_keringanan_siswa[$i] = 
                                $this->M_transaksi->insert_data_siswa_keringanan($data_keringanan_siswa[$i]);  
                                $id_siswa_keringanan[$i] = $this->db->insert_id(); 
                                $data_keringanan_item[$i] = 
                                array(
                                    'id_siswa_keringanan' => $id_siswa_keringanan[$i],
                                    'id_tipe_transaksi' => $id_tipe_transaksi,
                                    'id_tarif_nilai' => $id_tarif_nilai_for_keringanan[$i],
                                );
                                $insert_keringanan_item[$i] = 
                                $this->M_transaksi->insert_data_keringanan_item($data_keringanan_item[$i]);
                            }
                        }
                    }

                    //Alert jika berhasil sampai insert data pembayaran
                    $this->session->set_flashdata("pesan_success", "Pembayaran berhasil dilakukan !");
                    redirect('transaksi/transaksi_psb');
                } else {
                    //Alert jika tidak berhasil sampai insert data pembayaran
                    $this->session->set_flashdata("pesan_error", "Terjadi kesalahan, pembayaran gagal dilakukan !");
                    redirect('transaksi/transaksi_psb');
                }
            }     
        }
    }
    

    /********************** GET BY NIS **********************/
    function get_data_siswa_by_nis() {   
        $nis = $this->input->post('nis');

        if($nis == '') {
            echo 'null';

        } else {
            $whr = array('nis' => $nis);
            $get_vsiswa = $this->M_transaksi->get_v_siswa($whr);
            if($get_vsiswa->num_rows() == 0) {
                echo 'notvalid';

            } else {
                $no = 1;
                $gvsis = $get_vsiswa->row();
                $id_siswa = $gvsis->id_siswa;
               
                $d['vsiswa'] =
                '<div class="row form-group">
                  <label class="col-lg-2 col-sm-2 text-right"><font color="red">*</font> Nama</label>
                  <label class="col-lg-1 col-sm-1 text-right"> : </label>
                  <div class="col-lg-9 col-sm-9">
                    <input type="hidden" name="id_siswa" class="form-control" value="'.$gvsis->id_siswa.'" />
                    <input type="hidden" name="nis" class="form-control" value="'.$gvsis->nis.'" />
                    <input type="text" name="nama" class="form-control" placeholder="Masukan nama siswa" 
                    value="'.$gvsis->nama.'" readonly />
                  </div>
                </div>
                <div class="row form-group">
                  <label class="col-lg-2 col-sm-2 text-right">NISN</label>
                  <label class="col-lg-1 col-sm-1 text-right"> : </label>
                  <div class="col-lg-9 col-sm-9">
                    <input type="text" name="asal_sekolah" class="form-control" placeholder="NISN" 
                    value="'.$gvsis->nisn.'" readonly />
                  </div>
                </div>
                <div class="row form-group">
                  <label class="col-lg-2 col-sm-2 text-right">Tahun Ajaran</label>
                  <label class="col-lg-1 col-sm-1 text-right"> : </label>
                  <div class="col-lg-9 col-sm-9">
                    <input type="hidden" name="last_id_ta" class="form-control" value="'.$gvsis->id_ta.'" readonly />
                    <input type="text" class="form-control" value="'.$gvsis->teks_ta.'" readonly />
                  </div>
                </div>
                <div class="row form-group">
                  <label class="col-lg-2 col-sm-2 text-right">Jenjang</label>
                  <label class="col-lg-1 col-sm-1 text-right"> : </label>
                  <div class="col-lg-9 col-sm-9">
                    <input type="hidden" name="id_jenjang" class="form-control" value="'.$gvsis->id_jenjang.'" readonly />
                    <input type="text" class="form-control" value="'.$gvsis->jenjang.'" readonly />
                  </div>
                </div>
                <div class="row form-group">
                  <label class="col-lg-2 col-sm-2 text-right">Jurusan</label>
                  <label class="col-lg-1 col-sm-1 text-right"> : </label>
                  <div class="col-lg-9 col-sm-9">
                    <input type="hidden" name="id_jurusan" class="form-control" value="'.$gvsis->id_jurusan.'" readonly />
                    <input type="text" class="form-control" value="'.$gvsis->jurusan.'" readonly />
                  </div>
                </div>
                <div class="row form-group">
                  <label class="col-lg-2 col-sm-2 text-right">Kelas</label>
                  <label class="col-lg-1 col-sm-1 text-right"> : </label>
                  <div class="col-lg-9 col-sm-9">
                    <input type="hidden" name="tingkat" class="form-control" value="'.$gvsis->tingkat.'" readonly />
                    <input type="text" class="form-control" value="'.$gvsis->tingkat.' - '.$gvsis->urutan_kelas.'" readonly />
                  </div>
                </div>';

                echo $d['vsiswa'];
            }
        }
    }

    function get_data_img_by_nis() {   
        $nis = $this->input->post('nis');

        if($nis == '') {
            echo 'null';

        } else {
            $whr = array('nis' => $nis);
            $get_vsiswa = $this->M_transaksi->get_v_siswa($whr);
            if($get_vsiswa->num_rows() == 0) {
                echo 'notvalid';

            } else {
                $no = 1;
                $gvsis = $get_vsiswa->row();
                $id_siswa = $gvsis->id_siswa;
                if($gvsis->img_url == '') {
                    $img_url = 'berkas/img/user.png';
                } else {
                    $img_url = '';
                }

                $d['data-img'] =
                '<div class="box box-success">
                    <div class="box-header with-border">
                        <div class="box-tools pull-right">
                          <button type="button" class="btn btn-warning btn-flat btn-sm" onclick="get_scan_qr()"><i class="fa fa-refresh"></i></button>
                        </div>
                    </div>

                    <div class="box-body box-profile">
                        <img class="profile-user-img img-responsive img-circle" 
                        src="'.base_url().'/'.$img_url.'" alt="User profile picture" style="width:80%">
                        <h3 class="profile-username text-center">'.$gvsis->nama.'</h3>
                        <p class="text-muted text-center">Siswa</p>
                        <ul class="list-group list-group-unbordered">
                            <li class="list-group-item">
                                <b>NIS</b> <a class="pull-right">'.$gvsis->nis.'</a>
                            </li>
                        </ul>
                    </div>
                </div>';

                echo $d['data-img'];
            }
        }
    }

    function get_riwayat_by_nis() {
        $nis = $this->input->post('nis');
        $id_tipe_transaksi = $this->input->post('id_tipe_transaksi');

        if($nis == '') {
            echo 'null';

        } else {
            $whr = array('nis' => $nis);
            $get_vsiswa = $this->M_transaksi->get_v_siswa($whr);
            if($get_vsiswa->num_rows() == 0) {
                echo 'notvalid';

            } else {
                $no = 1;
                $gvsis = $get_vsiswa->row();
                $id_siswa = $gvsis->id_siswa;
                $whr = array('id_siswa' => $id_siswa, 'id_tipe_transaksi' => $id_tipe_transaksi);
                $get_vpem = $this->M_transaksi->get_v_pembayaran($whr); 
                
                $d['riwayat'] = 
                '<ul class="timeline">';

                foreach($get_vpem->result() as $gvpm) {
                    $explode = explode(' ', $gvpm->waktu);
                    $date = $explode[0];
                    $time = $explode[1];
                    $d['riwayat'] .= 
                    '<li class="time-label">
                        <span class="bg-red">
                            '.date('d-m-Y', strtotime($date)).'
                        </span>
                    </li>';
                    
                    $whr_det = array('id_pembayaran' => $gvpm->id_pembayaran);
                    $get_vpemdet = $this->M_transaksi->get_v_pembayaran_detail($whr_det);     
                    foreach($get_vpemdet->result() as $gvpmd) {
                        $explode_det = explode(' ', $gvpmd->waktu);
                        $time_det = $explode_det[1];
                        $d['riwayat'] .=
                        '<li>
                            <i class="fa fa-money bg-green"></i>
                            <div class="timeline-item">
                                <span class="time"><i class="fa fa-clock-o"></i> '.$time_det.'</span>
                                <h3 style="font-size: 14px" class="timeline-header no-border">
                                    Bayar item <b> '.$gvpmd->nama_tarif.' </b>  
                                    <a><i> '.number_format($gvpmd->nominal).'</i></a>
                                </h3>
                            </div>
                          </li>';   
                    }
                }
                $d['riwayat'] .= 
                    '<li>
                        <i class="fa fa-clock-o bg-gray"></i>
                    </li>
                </ul>';

                echo $d['riwayat'];   
            }
        }
    }

    function get_keringanan_by_nis() {
        $nis = $this->input->post('nis');
        $id_tipe_transaksi = $this->input->post('id_tipe_transaksi');

        if($nis == '') {
            echo 'null';

        } else {
            $whr = array('nis' => $nis);
            $get_vsiswa = $this->M_transaksi->get_v_siswa($whr);
            if($get_vsiswa->num_rows() == 0) {
                echo 'notvalid';

            } else {
                $no = 1;
                $gvsis = $get_vsiswa->row();
                $id_siswa = $gvsis->id_siswa;
                $whr_klas = '(id_siswa = '.$id_siswa.')';
                $get_tklas = $this->M_transaksi->get_t_siswa_kelas($whr_klas);
                $cek_tklas = $get_tklas->num_rows();

                if($cek_tklas == 0) {
                    $d['keringanan'] = 
                    '<tr>
                        <td colspan="3">
                            <h5 class="text-center"><i>Belum terdaftar di kelas manapun !<i></h5>
                        </td>
                    </tr>';
                
                } else {
                    $whr_kertar = 
                    '(id_tipe_transaksi = '.$id_tipe_transaksi.' 
                        AND aktif = 1 
                        AND id_ta = '.$gvsis->last_id_ta.'
                        AND id_jenjang = '.$gvsis->id_jenjang.'
                        AND id_jurusan = '.$gvsis->id_jurusan.'
                        AND tingkat = '.$gvsis->tingkat.')';

                    $get_kernil = $this->M_transaksi->get_keringanan_nilai_w($whr_kertar);
                    $check_kernil = $get_kernil->num_rows();

                    $get_tarnil = $this->M_transaksi->get_tarif_nilai_w($whr_kertar);
                    $check_tarnil = $get_tarnil->num_rows();
                    
                    $d['keringanan'] = '';
                    if($check_kernil == 0) {
                        $d['keringanan'] .= 
                        '<tr id="row_keringanan">
                            <td colspan="2">
                                <h5 class="text-center">
                                    <i>Tidak ada data !</i>
                                </h5>
                            </td>
                            <td>
                                <button type="button" class="btn btn-sm btn-danger btn-flat del_row_keringanan">
                                <i class="fa fa-minus-circle"></i> </button>
                            </td>
                        </tr>';
                    
                    } else {
                        $d['keringanan'] .= 
                        '<tr id="row_keringanan">
                            <td>
                                <select name="id_keringanan_nilai[]" class="form-control">
                                    <option value="0" selected="selected">- Pilih keringanan -</option>';
                                    foreach($get_kernil->result() as $gkernil) {
                                        
                                        if($gkernil->jenis_keringanan == 'diskon') {
                                            $nom_kernil = $gkernil->nominal.' %';
                                        } else {
                                            $nom_kernil = number_format($gkernil->nominal);
                                        }

                                        if($id_siswa != 0) {
                                            $whr_vkerit = array(
                                            'id_tipe_transaksi' => $id_tipe_transaksi,
                                            'id_keringanan_nilai' => $gkernil->id_keringanan_nilai,
                                            'id_siswa' => $id_siswa
                                            );
                                            $get_vkerit = $this->M_transaksi->get_v_keringanan_item($whr_vkerit);
                                            $check_vkerit = $get_vkerit->num_rows();
                                            if($check_vkerit != 0) {
                                                $d['keringanan'] .=
                                                '<option value="'.$gkernil->id_keringanan_nilai.'" disabled="disabled">
                                                '.$gkernil->keringanan.' ('.$nom_kernil.')</option>';  
                                            } else {
                                                $d['keringanan'] .=
                                                '<option value="'.$gkernil->id_keringanan_nilai.'">
                                                '.$gkernil->keringanan.' ('.$nom_kernil.')</option>';  
                                            }
                                        } else {
                                            $d['keringanan'] .=
                                            '<option value="'.$gkernil->id_keringanan_nilai.'">'.$gkernil->keringanan.' ('.$nom_kernil.')</option>';  
                                        }
                                    }                        
                                $d['keringanan'] .=    
                                '</select>
                            </td>
                            <td>
                                <select name="id_tarif_nilai_for_keringanan[]" class="form-control">
                                    <option value="0" selected="selected">- Pilih tarif -</option>';
                                    foreach($get_tarnil->result() as $gtarnil) {

                                        if($id_siswa != 0) {
                                            $whr_vkerit = array(
                                            'id_tipe_transaksi' => $id_tipe_transaksi,
                                            'id_tarif_nilai' => $gtarnil->id_tarif_nilai,
                                            'id_siswa' => $id_siswa
                                            );
                                            $get_vkerit = $this->M_transaksi->get_v_keringanan_item($whr_vkerit);
                                            $check_vkerit = $get_vkerit->num_rows();
                                            if($check_vkerit != 0) {
                                                $d['keringanan'] .=
                                                '<option value="'.$gtarnil->id_tarif_nilai.'" disabled="disabled">'.$gtarnil->nama_tarif.'</option>';  
                                            } else {
                                                $d['keringanan'] .=
                                                '<option value="'.$gtarnil->id_tarif_nilai.'">'.$gtarnil->nama_tarif.'</option>';  
                                            }
                                        } else {
                                            $d['keringanan'] .=
                                            '<option value="'.$gtarnil->id_tarif_nilai.'">'.$gtarnil->nama_tarif.'</option>';  
                                        }
                                    }
                                $d['keringanan'] .=    
                                '</select>
                            </td>
                            <td>
                                <button type="button" class="btn btn-sm btn-danger btn-flat del_row_keringanan">
                                <i class="fa fa-minus-circle"></i> </button>
                            </td>
                        </tr>';
                    }
                }
            echo $d['keringanan'];
            }
        }
    }
    /********************** /GET BY NIS *********************/



    /************************** CU *************************/
    function t_ck() {
        $d['title'] = 'Transaksi Cicilan Khusus';
        $d['page'] = 't_cu';
        $d['menu'] = 'Transaksi';
        $d['submenu'] = 'Cicilan Khusus';

        $this->load->view('layout', $d);
    }    

    function get_tarif_cu() {
        $nis = $this->input->post('nis');
        $id_tipe_transaksi = $this->input->post('id_tipe_transaksi');

        if($nis == '') {
            echo 'null';

        } else {
            $whr = array('nis' => $nis);
            $get_vsiswa = $this->M_transaksi->get_v_siswa($whr);
            if($get_vsiswa->num_rows() == 0) {
                echo 'notvalid';

            } else {
                $no = 1;
                $gvsis = $get_vsiswa->row();
                $id_siswa = $gvsis->id_siswa;
                $whr_klas = '(id_siswa = '.$id_siswa.')';
                $get_tklas = $this->M_transaksi->get_t_siswa_kelas($whr_klas);
                $cek_tklas = $get_tklas->num_rows();

                if($cek_tklas == 0) {
                    $d['tarif'] = 
                    '<tr>
                        <td colspan="8">
                            <h5 class="text-center"><i>Belum terdaftar di kelas manapun !<i></h5>
                        </td>
                    </tr>';
                
                } else {
                    $whr_tarnil = '';
                    $whr_tarnil .= 
                    '(id_tipe_transaksi = '.$id_tipe_transaksi.' 
                        AND aktif = 1  AND (';

                    foreach ($get_tklas->result() as $gtk) {
                        $whr_tarnil .= 
                        '(id_ta = '.$gtk->id_ta.' 
                            AND id_jenjang = '.$gtk->id_jenjang.' 
                            AND id_jurusan = '.$gtk->id_jurusan.' 
                            AND tingkat = '.$gtk->tingkat.') OR ';
                    }

                    $whr_tarnil .= '1=0 ))';

                    $get_tarnil = $this->M_transaksi->get_tarif_nilai_w($whr_tarnil);
                    $check_tarnil = $get_tarnil->num_rows();

                    if($check_tarnil == 0) {
                        $d['tarif'] = 
                        '<tr>
                            <td colspan="8">
                                <h5 class="text-center"><i>Tidak ada data !</i></h5>
                            </td>
                        </tr>';
                    
                    } else {
                        $d['tarif'] = '';
                        $no = 1;
                        foreach($get_tarnil->result() as $gtar) {
                            $get_sum = $this->M_transaksi->get_v_pembayaran_detail_sum($id_siswa, $gtar->id_tarif_nilai);
                            $check = $get_sum->num_rows();
                            $nominal = '';
                            $checkbox = '';  

                            //IF PERNAH BUY
                            if($check == 1) {
                                $gsum = $get_sum->row();
                                $nom_sisa = (int)$gsum->nominal_sisa;
                                $label_nom_sisa =
                                '<i>'.number_format($nom_sisa).'<i>';
                                if($nom_sisa == 0) {
                                    $nominal = 'readonly';
                                    $checkbox = 'disabled';
                                }

                                //IF KERINGANAN != NULL
                                if($gsum->jenis_keringanan != null) {
                                    if($gsum->jenis_keringanan == 'diskon') {
                                        $label_ker =
                                        '<small class="label label-danger" data-toggle="tooltip" title="'.$gsum->keringanan.'">
                                            '.$gsum->nominal_keringanan.' <i class="fa fa-percent"></i>
                                        </small>';
                                    } else {
                                        $label_ker =
                                        '<small class="label label-success" data-toggle="tooltip" title="'.$gsum->keringanan.'">
                                            '.number_format($gsum->nominal_keringanan).'
                                        </small>';
                                    }
                                } else {
                                    $label_ker = '';
                                }

                            //IF NEVER BUY
                            } else {
                                $whr_kerit = array('id_siswa' => $id_siswa, 'id_tarif_nilai' => $gtar->id_tarif_nilai);
                                $get_kerit = $this->M_transaksi->get_v_keringanan_item($whr_kerit);
                                $check = $get_kerit->num_rows();

                                if($check == 1) {
                                    $gkr = $get_kerit->row();
                                    if($gkr->jenis_keringanan == 'diskon') {
                                        $nom_sisa = $gtar->nom_total - ($gkr->nominal * $gtar->nom_total /100);
                                        $label_nom_sisa =
                                        '<i>'.number_format($nom_sisa).'<i>';
                                        $label_ker =
                                        '<small class="label label-danger" data-toggle="tooltip" title="'.$gkr->keringanan.'">
                                            '.$gkr->nominal.' <i class="fa fa-percent"></i>
                                        </small>';
                                    } else {
                                        $nom_sisa = $gtar->nom_total - $gkr->nominal;
                                        $label_nom_sisa =
                                        '<i>'.number_format($nom_sisa).'<i>';
                                        $label_ker =
                                        '<small class="label label-success" data-toggle="tooltip" title="'.$gkr->keringanan.'">
                                            '.number_format($gkr->nominal).'
                                        </small>';
                                    }
                                } else {
                                    $nom_sisa = $gtar->nom_total;
                                    $label_nom_sisa =
                                    '<i>'.number_format($gtar->nom_total).'<i>';
                                    $label_ker = '';
                                } 
                            }

                            $d['tarif'] .=            
                            '<tr>
                                <input type="hidden" name="id_tarif_nilai[]" value="'.$gtar->id_tarif_nilai.'">
                                <td class="text-center">'.$no++.'</td>
                                <td class="text-center">'.$gtar->teks_ta.'</td>
                                <td class="text-center">'.$gtar->tingkat.'</td>
                                <td class="text-left">'.$gtar->nama_tarif.'</td>
                                <td class="text-right">'.$label_nom_sisa.'</td>
                            
                                <td class="text-right">
                                    <input type="number" name="nominal[]" class="form-control text-right" value="0" '.$nominal.'>
                                </td>
                                <td class="text-right">
                                    <input type="checkbox" data-nom="'.$nom_sisa.'" onchange="buy_all(this)" '.$checkbox.'>
                                </td>
                            </tr>';
                        }
                    }
                }
                echo $d['tarif'];
            }
        }
    }

    function input_transaksi_cu() {
        //Data transaksi        
        $id_tipe_transaksi = $this->input->post('id_tipe_transaksi');
        $id_bulan = $this->input->post('id_bulan');
        $id_siswa = $this->input->post('id_siswa');
        $id_ta = $this->input->post('last_id_ta');

        //Batch keringanan
        $id_keringanan_nilai = $this->input->post('id_keringanan_nilai');
        $id_tarif_nilai_for_keringanan = $this->input->post('id_tarif_nilai_for_keringanan');

        //Batch tarif
        $id_tarif_nilai = $this->input->post('id_tarif_nilai');
        $nominal = $this->input->post('nominal');

        //Jika tidak ada id nilai tarif
        if($id_tarif_nilai == null) {
            $this->session->set_flashdata("pesan_error", "Pilih salah satu item yang ingin dibayar !");
            redirect('transaksi/transaksi_cu');

        //Jika nominal tidak ada yang diisini
        } else if(count(array_filter($nominal)) == 0) {
            $this->session->set_flashdata("pesan_error", "Isi nominal pada salah satu item yang ingin dibayar !");
            redirect('transaksi/transaksi_cu');
        
        //Jika sudah memenuhi syarat    
        } else {
            //Insert data pembayaran
            $data_pembayaran = array(
                        'id_tipe_transaksi' => $id_tipe_transaksi,
                        'id_ta'             => $id_ta,
                        'id_siswa'          => $id_siswa,
                        'closed'            => 0, //0 adalah default belum disetor
                        'id_user'           => $this->session->userdata('id_user'),
                        'waktu'             => date('Y-m-d H:i:s'),         
                        );  
            $insert_data_pembayaran = $this->M_transaksi->insert_data_pembayaran($data_pembayaran);  
            $id_pembayaran = $this->db->insert_id();

            if(!$insert_data_pembayaran) {

                //Insert data pembayaran detail
                $data_pembayaran_detail = array();
                for($i=0;$i<count($id_tarif_nilai);$i++) {         
                    if($nominal[$i] != 0) {
                        $data_pembayaran_detail[] = array(
                                                     'id_pembayaran' => $id_pembayaran,
                                                     'id_tarif_nilai' => $id_tarif_nilai[$i],
                                                     'id_bulan' => $id_bulan,
                                                     'nominal' => $nominal[$i],
                                                     'id_siswa' => $id_siswa,
                                                     'tgl_input' => date('Y-m-d H:i:s') 
                                                    );           
                        
                    }
                }
                $insert_data_pembayaran_detail = $this->M_transaksi->insert_data_pembayaran_detail($data_pembayaran_detail);
                /*
                //Insert data j keringanan siswa
                $cekarr_kernil = is_array($id_keringanan_nilai);
                if($cekarr_kernil == false) {
                    //false array do nothing
                } else {
                    //true array
                    $count_kernil = count(array_filter($id_keringanan_nilai));
                    $count_tarnil_f_kernil = count(array_filter($id_tarif_nilai_for_keringanan));

                    if($count_kernil == 0) {
                        //Nol do nothing
                    } else if($count_tarnil_f_kernil == 0) {
                        //Nol do nothing
                    } else {
                        $data_keringanan_siswa = array();
                        for($i=0;$i<count($id_keringanan_nilai);$i++) {         
                            $data_keringanan_siswa[$i] = 
                            array(
                                'id_siswa' => $id_siswa,
                                'id_keringanan_nilai' => $id_keringanan_nilai[$i],
                                'aktif' => 1
                            );  
                            $insert_keringanan_siswa[$i] = 
                            $this->M_transaksi->insert_data_siswa_keringanan($data_keringanan_siswa[$i]);  
                            $id_siswa_keringanan[$i] = $this->db->insert_id(); 
                            $data_keringanan_item[$i] = 
                            array(
                                'id_siswa_keringanan' => $id_siswa_keringanan[$i],
                                'id_tipe_transaksi' => $id_tipe_transaksi,
                                'id_tarif_nilai' => $id_tarif_nilai_for_keringanan[$i],
                            );
                            $insert_keringanan_item[$i] = 
                            $this->M_transaksi->insert_data_keringanan_item($data_keringanan_item[$i]);
                        }
                    }
                } */

                //Alert jika berhasil sampai insert data pembayaran
                $this->session->set_flashdata("pesan_success", "Pembayaran berhasil dilakukan !");
                echo "<script>
                    window.open('transaksi/kuitansi_spp/".$id_pembayaran."', '_blank', 'toolbar=no,titlebar=no,menubar=no,scrollbars=yes,resizable=yes,top=50,left=100,width=600,height=500');
                    window.setTimeout(\"location=('".base_url()."transaksi/t_ck');\", 1000);
                </script>";
               // redirect('transaksi/transaksi_cu');
            } else {
                //Alert jika tidak berhasil sampai insert data pembayaran
                $this->session->set_flashdata("pesan_error", "Terjadi kesalahan, pembayaran gagal dilakukan !");
                redirect('transaksi/t_ck');
            }    
        }
    }
    /************************** /CU *************************/



    /******************* TARIF LIMIT **********************/
    function get_tarif_limit() {
        $nis = $this->input->post('nis');
        $id_tipe_transaksi = $this->input->post('id_tipe_transaksi');
        

        if($id_tipe_transaksi == 2) {
            $day_divide = 30;
        } else if($id_tipe_transaksi == 3) {
            $day_divide = 365;
        }

        if($nis == '') {
            echo 'null';

        } else {
            $whr = array('nis' => $nis);
            $get_vsiswa = $this->M_transaksi->get_v_siswa($whr);
            if($get_vsiswa->num_rows() == 0) {
                echo 'notvalid';

            } else {
                $no = 1;
                $gvsis = $get_vsiswa->row();
                $id_siswa = $gvsis->id_siswa;
                $whr_klas = '(id_siswa = '.$id_siswa.')';
                $get_tklas = $this->M_transaksi->get_t_siswa_kelas($whr_klas);
                $cek_tklas = $get_tklas->num_rows();

                if($cek_tklas == 0) {
                    $d['tarif'] = 
                    '<tr>
                        <td colspan="7">
                            <h5 class="text-center"><i>Belum terdaftar di kelas manapun !<i></h5>
                        </td>
                    </tr>';
                
                } else {
                    $whr_tarnil = '';
                    $whr_tarnil .= 
                    '(id_tipe_transaksi = '.$id_tipe_transaksi.' 
                        AND aktif = 1  AND (';

                    foreach ($get_tklas->result() as $gtk) {
                        $whr_tarnil .= 
                        '(id_ta = '.$gtk->id_ta.' 
                            AND id_jenjang = '.$gtk->id_jenjang.' 
                            AND id_jurusan = '.$gtk->id_jurusan.' 
                            AND tingkat = '.$gtk->tingkat.') OR ';
                    }

                    $whr_tarnil .= '1=0 ))';

                    $get_tarnil = $this->M_transaksi->get_tarif_nilai_w($whr_tarnil);
                    $check_tarnil = $get_tarnil->num_rows();

                    if($check_tarnil == 0) {
                        $d['tarif'] = 
                        '<tr>
                            <td colspan="7">
                                <h5 class="text-center"><i>Tidak ada data !</i></h5>
                            </td>
                        </tr>';
                    
                    } else {


                        //DATA ARRAY TARIF
                        $tarif = [];
                        foreach($get_tarnil->result() as $gtr) {
                            $tarif[$gtr->id_tarif_nilai] = [
                               'id_tarif_nilai' => $gtr->id_tarif_nilai,
                               'id_ta' => $gtr->id_ta, 
                               'tingkat' => $gtr->tingkat,
                               'nama_tarif' => $gtr->nama_tarif,
                               'jml_cil' => $gtr->jml_cil,
                               'nom_cil' => $gtr->nom_total, 
                               'date_start' => $gtr->date_start,
                            ];
                        }

                        //DATA ARRAY TA
                        $ta = [];
                        foreach($get_tklas->result() as $gtk) {
                            $ta[$gtk->id_ta]['teks_ta'] = $gtk->teks_ta; 
                            $ta[$gtk->id_ta]['tingkat'] = $gtk->tingkat; 
                        }

                        //DATA ARRAY TARIF GROUP BY TA 
                        $tarif_new = [];
                        foreach($tarif as $k => $v) {
                            foreach($ta as $k2 => $v2) {
                                $vta = $k2;
                                if($tarif[$k]['id_ta'] == $vta) {
                                    $tarif_new[$vta][$k]['id_tarif_nilai'] = $tarif[$k]['id_tarif_nilai'];
                                    $tarif_new[$vta][$k]['id_ta'] = $tarif[$k]['id_ta'];
                                    $tarif_new[$vta][$k]['tingkat'] = $tarif[$k]['tingkat'];
                                    $tarif_new[$vta][$k]['nama_tarif'] = $tarif[$k]['nama_tarif'];
                                    $tarif_new[$vta][$k]['jml_cil'] = $tarif[$k]['jml_cil'];
                                    $tarif_new[$vta][$k]['nom_cil'] = $tarif[$k]['nom_cil'];
                                    $tarif_new[$vta][$k]['date_start'] = $tarif[$k]['date_start'];
                                }
                            }
                        }

                        //DATE DETECTION
                        $date_now = date('Y-m-d');
                        foreach($tarif_new as $k => $v) {
                            foreach($v as $k2 => $v2) {
                                $str_now = strtotime($date_now); 
                                $str_start = strtotime($tarif_new[$k][$k2]['date_start']);
                                $str_diff = $str_now - $str_start;
                                $day_diff = floor($str_diff / (60 * 60 * 24));

                                if($day_diff < 0) {
                                    $tarif_new[$k][$k2]['bln'] = 0;
                                } else if($day_diff == 0) {
                                    $tarif_new[$k][$k2]['bln'] = 1;
                                } else {
                                    $divide = $day_diff/$day_divide;
                                    if($divide > $tarif_new[$k][$k2]['jml_cil']) {
                                        $tarif_new[$k][$k2]['bln'] = $tarif_new[$k][$k2]['jml_cil'];
                                    } else {
                                        $tarif_new[$k][$k2]['bln'] = (int)ceil($divide);
                                    }
                                }
                            }
                        }


                        //DATA ARRAY TARIF GROUP BY BLN & TA
                        $arr = [];
                        foreach($tarif_new as $k => $v) {
                            foreach($v as $k2 => $v2) {
                                for ($i=0;$i < $tarif_new[$k][$k2]['bln']; $i++) { 
                                    $arr[$k][$i][$tarif_new[$k][$k2]['id_tarif_nilai']]['id_tarif_nilai'] = 
                                    $tarif_new[$k][$k2]['id_tarif_nilai'];
                                    $arr[$k][$i][$tarif_new[$k][$k2]['id_tarif_nilai']]['id_ta'] = $tarif_new[$k][$k2]['id_ta'];
                                    $arr[$k][$i][$tarif_new[$k][$k2]['id_tarif_nilai']]['tingkat'] = $tarif_new[$k][$k2]['tingkat'];
                                    $arr[$k][$i][$tarif_new[$k][$k2]['id_tarif_nilai']]['nama_tarif'] = 
                                    $tarif_new[$k][$k2]['nama_tarif'];
                                    $arr[$k][$i][$tarif_new[$k][$k2]['id_tarif_nilai']]['nom_cil'] = $tarif_new[$k][$k2]['nom_cil'];
                                    $arr[$k][$i][$tarif_new[$k][$k2]['id_tarif_nilai']]['bln_ke'] = $i+1;
                                    $arr[$k][$i][$tarif_new[$k][$k2]['id_tarif_nilai']]['status'] = 'NOT PAID';
                                }
                            }
                        }


                        //DATA ARRAY TRANSAKSI BAYAR
                        $bayar = [];
                        $whr_pemdet = array('id_siswa' => $id_siswa, 'id_tipe_transaksi' => $id_tipe_transaksi);
                        $get_pemdet = $this->M_transaksi->get_v_pembayaran_detail($whr_pemdet);
                        foreach($get_pemdet->result() as $gpd) {
                            $bln_ke = $gpd->id_bulan - 1; //mencocokan konsep bulan dengan $arr
                            $bayar[$gpd->id_ta][$bln_ke][$gpd->id_tarif_nilai]['id_tarif_nilai'] = $gpd->id_tarif_nilai;
                            $bayar[$gpd->id_ta][$bln_ke][$gpd->id_tarif_nilai]['id_ta'] = $gpd->id_ta; //2016
                            $bayar[$gpd->id_ta][$bln_ke][$gpd->id_tarif_nilai]['tingkat'] = $gpd->tingkat;
                            $bayar[$gpd->id_ta][$bln_ke][$gpd->id_tarif_nilai]['nama_tarif'] = $gpd->nama_tarif;
                            $bayar[$gpd->id_ta][$bln_ke][$gpd->id_tarif_nilai]['bln_ke'] = $gpd->id_bulan;
                        }

                        //UNSET DATA ARR 
                        foreach($bayar as $k => $v) {
                            foreach($v as $k2 => $v2) {
                                foreach($v2 as $k3 => $v3) {
                                    /*$arr[$k][$k2][$k3]['status'] = 'PAID';*/
                                    unset($arr[$k][$k2][$k3]);
                                }
                            }
                        }


                        //CREATE TABLE TAGIHAN
                        $tbl = '';
                        $bln = 1;
                        foreach($arr as $k => $v) {
                            foreach ($v as $k2 => $v2) {
                                
                                if(sizeof($arr[$k][$k2]) != 0) {
                                    $k2_new = $k2 + 1;
                                    $tbl .= 
                                    '<tr>
                                        <td class="text-center">'.$ta[$k]['teks_ta'].'</td>
                                        <td class="text-center">'.$ta[$k]['tingkat'].'</td>
                                        <td class="text-center">'.$k2_new.'</td>
                                        <td class="text-left">';
                                    foreach ($v2 as $k3 => $v3) {
                                        $tbl .= 
                                        '<label>
                                            <input type="checkbox" class="check_tarif" name="check_tarif['.$k.']['.$k2.']['.$k3.']"> 
                                            '.$arr[$k][$k2][$k3]['nama_tarif'].' 
                                        </label>
                                        <br>';
                                        foreach($v3 as $k4 => $v4) {
                                            $tbl .= 
                                            '<input type="hidden" name="'.$k4.'['.$k.']['.$k2.']['.$k3.']" value="'.$v4.'">';
                                        }
                                    }
                                    $tbl .=
                                    '   </td>
                                        <td class="text-right">';

                                    //NOM_CIL NEW
                                    foreach ($v2 as $k3 => $v3) {
                                        $whr_kerit = array('id_siswa' => $id_siswa, 'id_tarif_nilai' => $k3);
                                        $get_kerit = $this->M_transaksi->get_v_keringanan_item($whr_kerit);
                                        $check = $get_kerit->num_rows();

                                        if($check == 1) {
                                            $gkr = $get_kerit->row();
                                            if($gkr->jenis_keringanan == 'diskon') {
                                                $nom_cil_new = 
                                                $arr[$k][$k2][$k3]['nom_cil'] - ($gkr->nominal * $arr[$k][$k2][$k3]['nom_cil'] /100);
                                                $label_nom_cil = 
                                                '<strike><i>'.number_format($arr[$k][$k2][$k3]['nom_cil']).'</strike><i>
                                                  <i>'.number_format($nom_cil_new).'</i>';
                                            } else {
                                                $nom_cil_new = 
                                                $arr[$k][$k2][$k3]['nom_cil'] - $gkr->nominal;
                                                $label_nom_cil = 
                                                '<strike><i>'.number_format($arr[$k][$k2][$k3]['nom_cil']).'</strike><i>
                                                  <i>'.number_format($nom_cil_new).'</i>';
                                            }
                                        } else {
                                            $label_nom_cil = 
                                            '<i>'.$arr[$k][$k2][$k3]['nom_cil'].'<i>';
                                        }

                                        $tbl .=
                                        '<label>
                                            '.$label_nom_cil.'
                                        </label> <br>';
                                    }
                                    $tbl .=
                                    '   </td>
                                        ';
                                    /*
                                    //KERINGANAN
                                    foreach ($v2 as $k3 => $v3) {
                                        $whr_kerit = array('id_siswa' => $id_siswa, 'id_tarif_nilai' => $k3);
                                        $get_kerit = $this->M_transaksi->get_v_keringanan_item($whr_kerit);
                                        $check = $get_kerit->num_rows();

                                        if($check == 1) {
                                            $gkr = $get_kerit->row();
                                            if($gkr->jenis_keringanan == 'diskon') {
                                                $label_ker =
                                                '<small class="label label-danger" data-toggle="tooltip" 
                                                title="'.$gkr->keringanan.'">'.$gkr->nominal.' 
                                                <i class="fa fa-percent"></i>';
                                            } else {
                                                $label_ker =
                                                '<small class="label label-success" data-toggle="tooltip" 
                                                title="'.$gkr->keringanan.'">'.number_format($gkr->nominal).'';
                                            }
                                        } else {
                                            $label_ker = '';
                                        }

                                        $tbl .=
                                        ''.$label_ker.'';
                                    } */
                                    $tbl .= 
                                        '
                                        <td><input type="checkbox" name="buy_all[]" onclick="buy_all(this)"></td>
                                    </tr>'; 
                                }
                               
                            }
                        }

                    $d['tarif'] = $tbl;
                        
                    }
                }
                echo $d['tarif'];
            }
        }
    }

    function input_transaksi_limit() {
        //Data transaksi        
        $id_tipe_transaksi = $this->input->post('id_tipe_transaksi');
        
        //Redirect
        if($id_tipe_transaksi == 2) {
            $redirect = 'transaksi/transaksi_spp_bln';
        } else if($id_tipe_transaksi == 3) {
            $redirect = 'transaksi/dftr_ulang';
        }

        $id_bulan = $this->input->post('id_bulan');
        $id_siswa = $this->input->post('id_siswa');
        $id_ta = $this->input->post('last_id_ta');

        //Batch keringanan
        $id_keringanan_nilai = $this->input->post('id_keringanan_nilai');
        $id_tarif_nilai_for_keringanan = $this->input->post('id_tarif_nilai_for_keringanan');

        //Batch tarif
        $check_tarif = $this->input->post('check_tarif');
        $id_tarif_nilai = $this->input->post('id_tarif_nilai');
        $bln_ke = $this->input->post('bln_ke');
        $nom_cil = $this->input->post('nom_cil');
        
        //Jika tidak ada tarif yang di pilih
        if($check_tarif == null) {
            $this->session->set_flashdata("pesan_error", "Pilih salah satu item yang ingin dibayar !");
            redirect($redirect);
        
        //Jika ada tarif yang dipilih   
        } else {

            //Insert data pembayaran
            $data_pembayaran = array(
                        'id_tipe_transaksi' => $id_tipe_transaksi,
                        'id_ta'             => $id_ta,
                        'id_siswa'          => $id_siswa,
                        'closed'            => 0, //0 adalah default belum disetor
                        'id_user'           => $this->session->userdata('id_user'),
                        'waktu'             => date('Y-m-d H:i:s'),         
                        );  

            $insert_data_pembayaran = $this->M_transaksi->insert_data_pembayaran($data_pembayaran);  
            $id_pembayaran = $this->db->insert_id();

            if(!$insert_data_pembayaran) {

                //Insert data pembayaran detail
                $data_pembayaran_detail = array();
                foreach($check_tarif as $k => $v) {        
                    foreach($v as $k2 => $v2) {
                        foreach($v2 as $k3 => $v3) {
                            $data_pembayaran_detail[] = array(
                                                         'id_pembayaran' => $id_pembayaran,
                                                         'id_tarif_nilai' => $id_tarif_nilai[$k][$k2][$k3],
                                                         'id_bulan' => $bln_ke[$k][$k2][$k3], //->bug<- 
                                                         'nominal' => $nom_cil[$k][$k2][$k3],
                                                         'id_siswa' => $id_siswa,
                                                         'tgl_input' => date('Y-m-d H:i:s') 
                            );           
                        }
                    } 
                }
                $insert_data_pembayaran_detail = $this->M_transaksi->insert_data_pembayaran_detail($data_pembayaran_detail);
                /*
                //Insert data j keringanan siswa
                $cekarr_kernil = is_array($id_keringanan_nilai);
                if($cekarr_kernil == false) {
                    //false array do nothing
                } else {
                    //true array
                    $count_kernil = count(array_filter($id_keringanan_nilai));
                    $count_tarnil_f_kernil = count(array_filter($id_tarif_nilai_for_keringanan));

                    if($count_kernil == 0) {
                        //Nol do nothing
                    } else if($count_tarnil_f_kernil == 0) {
                        //Nol do nothing
                    } else {
                        $data_keringanan_siswa = array();
                        for($i=0;$i<count($id_keringanan_nilai);$i++) {         
                            $data_keringanan_siswa[$i] = 
                            array(
                                'id_siswa' => $id_siswa,
                                'id_keringanan_nilai' => $id_keringanan_nilai[$i],
                                'aktif' => 1
                            );  
                            $insert_keringanan_siswa[$i] = 
                            $this->M_transaksi->insert_data_siswa_keringanan($data_keringanan_siswa[$i]);  
                            $id_siswa_keringanan[$i] = $this->db->insert_id(); 
                            $data_keringanan_item[$i] = 
                            array(
                                'id_siswa_keringanan' => $id_siswa_keringanan[$i],
                                'id_tipe_transaksi' => $id_tipe_transaksi,
                                'id_tarif_nilai' => $id_tarif_nilai_for_keringanan[$i],
                            );
                            $insert_keringanan_item[$i] = 
                            $this->M_transaksi->insert_data_keringanan_item($data_keringanan_item[$i]);
                        }
                    }
                }
                */
                //Alert jika berhasil sampai insert data pembayaran
                $this->session->set_flashdata("pesan_success", "Pembayaran berhasil dilakukan !");
                echo "<script>
                        window.open('transaksi/kuitansi_spp/".$id_pembayaran."', '_blank', 'toolbar=no,titlebar=no,menubar=no,scrollbars=yes,resizable=yes,top=50,left=100,width=600,height=500');
                        window.setTimeout(\"location=('".base_url().$redirect."');\", 1000);
                      </script>";
                //redirect($redirect);
            } else {
                //Alert jika tidak berhasil sampai insert data pembayaran
                $this->session->set_flashdata("pesan_error", "Terjadi kesalahan, pembayaran gagal dilakukan !");
                redirect($redirect);
            }    
        }
    }
    /****************** /TARIF LIMIT **********************/



    /************************** /SPP-BLN *************************/    
    function transaksi_spp_bln() {
        $d['title'] = 'Transaksi SPP Bulanan';
        $d['page'] = 't_spp_bln';
        $d['title_page'] = 'Transaksi SPP Bulanan';
        $d['menu'] = 'transaksi';
        $d['submenu'] = 'SPP Bulanan';

        $this->load->view('layout', $d);
    }    
    /************************** /SPP-BLN *************************/



    /************************** SPP-THN *************************/ 
    function transaksi_spp_thn() {
        $d['title'] = 'Transaksi SPP Tahunan';
        $d['page'] = 't_spp_thn';
        $d['title_page'] = 'Transaksi SPP Tahunan';
        $d['menu'] = 'Transaksi';
        $d['submenu'] = 'SPP Tahunan';

        $this->load->view('layout', $d);
    }
    /************************** /SPP-THN *************************/ 

    function input_t_psb() {
        //Data transaksi        
        $id_sekolah = $this->session->userdata('id_sekolah');
        $id_tipe_transaksi = $this->input->post('id_tipe_transaksi');
        $no_urut_formulir = $this->input->post('no_urut_form');
        $no_formulir = $this->input->post('no_formulir');
        $id_ta = $this->input->post('id_ta');
        $id_gelombang = $this->input->post('id_gelombang');
        $nama_siswa = $this->input->post('nama');
        $asal_sekolah = $this->input->post('asal_sekolah');
        $id_jenjang = $this->input->post('id_jenjang');
        $id_jurusan = $this->input->post('id_jurusan');
        $ortu = $this->input->post('nama_ortu');
        $telpon = $this->input->post('telpon');
        $id_keringanan = $this->input->post('id_keringanan');        
        
        if($no_formulir == null) {
            $this->session->set_flashdata("pesan_error", "Nomor formulir tidak boleh kosong !");
            redirect('psb/pendaftaran');

        //Jika sudah memenuhi syarat    
        } else {
            
            //Data Siswa
            $data_siswa = array(
                            'tgl_input'             => date('Y-m-d H:i:s'),
                            'no_urut_formulir'      => $no_urut_formulir,
                            'tahun'                 => date('Y'),
                            'no_formulir'           => $no_formulir,
                            'id_ta'                 => $id_ta,
                            'id_gelombang'          => $id_gelombang,
                            'id_jenjang'            => $id_jenjang,
                            'id_jurusan'            => $id_jurusan,
                            'id_keringanan'         => $id_keringanan,
                            'nama_siswa'            => $nama_siswa,
                            'asal_sekolah'          => $asal_sekolah,   
                            'nama_ortu'             => $ortu,
                            'no_telpon'             => $telpon,
                            'id_sekolah'            => $id_sekolah
                            );

            $insert_data_siswa = $this->M_transaksi->insert_data_siswa_psb($data_siswa);
            if(!$insert_data_siswa) {
                //Alert jika berhasil insert data 
                $this->session->set_flashdata("pesan_success", "Pendaftaran siswa baru berhasil dilakukan ");
                echo "<script>
                        window.open('transaksi/formulir_prt/".$no_formulir."', '_blank', 'toolbar=no,titlebar=no,menubar=no,scrollbars=yes,resizable=yes,top=50,left=100,width=600,height=500');
                        window.setTimeout(\"location=('".base_url()."psb/pendaftaran');\", 1000);
                      </script>";
            }else{
                //Alert jika tidak berhasil sampai insert data pembayaran
                $this->session->set_flashdata("pesan_error", "Terjadi kesalahan, gagal memasukan data siswa baru ");
                redirect('psb/pendaftaran');
            }
 
        }
    }

    /************************** SPP-THN *************************/ 
    function dftr_ulang() {
        $d['title'] = 'Transaksi Daftar Ulang';
        $d['page'] = 't_du';
        $d['title_page'] = 'Transaksi Daftar Ulang';
        $d['menu'] = 'Transaksi';
        $d['submenu'] = 'Daftar Ulang';

        $this->load->view('layout', $d);
    }

    function formulir_prt($no_formulir){
        $d['data'] = $this->M_transaksi->get_psb_daftar($no_formulir)->result();
        $this->load->view('psb/formulir_prt', $d);
    }

    function kuitansi_spp($id_pembayaran){
        $d['data'] = $this->M_transaksi->get_kuitansi_spp($id_pembayaran)->result();
        $d['nis'] = $d['data'][0]->nis;
        $d['nama'] = $d['data'][0]->nama;
        $d['tingkat'] = $d['data'][0]->tingkat;
        $d['urutan'] = $d['data'][0]->urutan_kelas;
        $this->load->view('transaksi/kuitansi_spp', $d);
    }

}