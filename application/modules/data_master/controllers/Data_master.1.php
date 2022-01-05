<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
     
class Data_master extends CI_Controller {
    function __construct() {
        parent::__construct();
        if(empty($this->session->userdata('id_user'))){
			redirect('user','refresh');
		}
    }

    function index() {
        $d['title'] = 'Data Master';
        $d['page']  = 'menu';
        $d['title_page'] = 'Data Master';
        $d['menu']  = 'Data Master';
        $this->load->view('layout', $d);
    }

    // Jenjang Pendidikan
    function jenjang_pendidikan() {
        $d['title']     = "Jenjang Pendidikan";
        $d['page']      = 'dm_jenjang_pendidikan';
        $d['judul']     = "Jenjang Pendidikan";
        $d['menu']      = "Data Master";
        $d['submenu']   = "Jenjang Pendidikan";
        $this->load->view('layout', $d);
    }

    public function jenjang_pendidikan_detail($id) {
        $detail = $this->M_data->get_master('m_jenjang_tbl', 'id_jenjang', $id);
        echo json_encode($detail);
    }

    public function jenjang_pendidikan_action($action) {
        $id             = htmlentities($this->input->post('id'));
        $id_jenjang     = htmlentities($this->input->post('id_jenjang'));
        $jenjang        = htmlentities($this->input->post('jenjang'));
        $aktif          = htmlentities($this->input->post('aktif'));


        $data = array(
                'jenjang'     => $jenjang
            );

        if ($action == "add") {
            $is_success = $this->M_data->insert_master('m_jenjang_tbl', $data);
            if (!$is_success) {
                echo json_encode(array("status" => "SUCCESS"));
            } else {
                echo json_encode(array("status" => "FAILURE"));
            }
        } elseif ($action == "edit") {
            $is_success = $this->M_data->update_master('m_jenjang_tbl', 'id_jenjang', $id_jenjang, $data);
            if (!$is_success) {
                echo json_encode(array("status" => "SUCCESS"));
            } else {
                echo json_encode(array("status" => "FAILURE"));
            }
        } elseif ($action == "del") {
            $is_success = $this->M_data->delete_master('m_jenjang_tbl', 'id_jenjang', $id);
            if (!$is_success) {
                echo json_encode(array("status" => "SUCCESS"));
            } else {
                echo json_encode(array("status" => "FAILURE"));
            }
        } elseif ($action == "aktif") {
            $is_success = $this->M_data->update_master('m_jenjang_tbl', 'id_jenjang', $id, array('aktif' => $aktif));
            if (!$is_success) {
                echo json_encode(array("status" => $aktif));
            } else {
                echo json_encode(array("status" => "FAILURE"));
            }
        }
    }

    public function show_jenjang_pendidikan() {
        $table          = 'm_jenjang_tbl';
        $column_order   = array(null, 'jenjang', null, null); //set column field database for datatable orderable
        $column_search  = array('jenjang'); //set column field database for datatable searchable 
        $order          = array('id_jenjang' => 'asc'); // default order 

        $list           = $this->M_data->get_datatables($table, $column_order, $column_search, $order);
        $data           = array();
        $no             = $_POST['start'];
        foreach ($list as $l) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $l->jenjang;
                    if($l->aktif == '1') {
                        $status='checked="checked"';
                    } else {
                        $status='';
                    }
            $row[] = '<input type="hidden" class="paramId " value="'.$l->id_jenjang.'"><input class="kuy" onChange="aktif(this)" type="checkbox" '.$status.'>';
            // $row[] = '<input value="" type="checkbox" class="switch" data-on-text="On" data-off-text="Off" data-on-color="primary" data-off-color="default" checked="checked">';
            // $row[] = "test";
            $row[] = '<a class="text-primary" href="javascript:;" onClick="edit('."'".$l->id_jenjang."'".', this)" data-toggle="tooltip" title="Ubah" data-original-title="Ubah"><i class="fa fa-edit"></i></a>&nbsp;
                      <a class="text-danger" href="javascript:;" onClick="del('."'".$l->id_jenjang."'".', this)" data-toggle="tooltip" title="Hapus" data-original-title="Hapus"><i class="fa fa-trash-o"></i></a>';


            $data[] = $row;
        }

        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsFiltered" => $this->M_data->count_filtered($table, $column_order, $column_search, $order),
                        "recordsTotal" => $this->M_data->count_all($table),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }


    // Jenis Sosial Media
    function jenis_sosmed() {
        $d['title']     = "Jenis Sosial Media";
        $d['page']      = 'dm_jenis_sos_med';
        $d['judul']     = "Jenis Sosial Media";
        $d['menu']      = "Data Master";
        $d['submenu']   = "Jenis Sosial Media";
        $this->load->view('layout', $d);
    }

    public function jenis_sosmed_detail($id) {
        $detail = $this->M_data->get_master('m_jenis_sosmed_tbl', 'id_jenis_sosmed', $id);
        echo json_encode($detail);
    }

    public function jenis_sosmed_action($action) {
        $id             = htmlentities($this->input->post('id'));
        $id_jenis_sosmed = htmlentities($this->input->post('id_jenis_sosmed'));
        $jenis          = htmlentities($this->input->post('jenis'));
        $aktif          = htmlentities($this->input->post('aktif'));


        $data = array(
                'jenis'             => $jenis
            );

        if ($action == "add") {
            $is_success = $this->M_data->insert_master('m_jenis_sosmed_tbl', $data);
            if (!$is_success) {
                echo json_encode(array("status" => "SUCCESS"));
            } else {
                echo json_encode(array("status" => "FAILURE"));
            }
        } elseif ($action == "edit") {
            $is_success = $this->M_data->update_master('m_jenis_sosmed_tbl', 'id_jenis_sosmed', $id_jenis_sosmed, $data);;
            if (!$is_success) {
                echo json_encode(array("status" => "SUCCESS"));
            } else {
                echo json_encode(array("status" => "FAILURE"));
            }
        } elseif ($action == "del") {
            $is_success = $this->M_data->delete_master('m_jenis_sosmed_tbl', 'id_jenis_sosmed', $id);
            if (!$is_success) {
                echo json_encode(array("status" => "SUCCESS"));
            } else {
                echo json_encode(array("status" => "FAILURE"));
            }
        } elseif ($action == "aktif") {
            $is_success = $this->M_data->update_master('m_jenis_sosmed_tbl', 'id_jenis_sosmed', $id, array('aktif' => $aktif));
            if (!$is_success) {
                echo json_encode(array("status" => $aktif));
            } else {
                echo json_encode(array("status" => "FAILURE"));
            }
        }
    }

    public function show_jenis_sosmed() {
        $table          = 'm_jenis_sosmed_tbl';
        $column_order   = array(null, 'jenis', null, null); //set column field database for datatable orderable
        $column_search  = array('jenis'); //set column field database for datatable searchable 
        $order          = array('jenis' => 'asc'); // default order 

        $list           = $this->M_data->get_datatables($table, $column_order, $column_search, $order);
        $data           = array();
        $no             = $_POST['start'];
        foreach ($list as $l) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $l->jenis;
                    if($l->aktif == '1') {
                        $status='checked="checked"';
                    } else {
                        $status='';
                    }
            $row[] = '<input type="hidden" class="paramId" value="'.$l->id_jenis_sosmed.'"><input onChange="aktif(this)" type="checkbox" '.$status.'>';
            // $row[] = '<input value="" type="checkbox" class="switch" data-on-text="On" data-off-text="Off" data-on-color="primary" data-off-color="default" checked="checked">';
            // $row[] = "test";
            $row[] = '<a class="text-primary" href="javascript:;" onClick="edit('."'".$l->id_jenis_sosmed."'".', this)" data-toggle="tooltip" title="Ubah" data-original-title="Ubah"><i class="fa fa-edit"></i></a>&nbsp;
                      <a class="text-danger" href="javascript:;" onClick="del('."'".$l->id_jenis_sosmed."'".', this)" data-toggle="tooltip" title="Hapus" data-original-title="Hapus"><i class="fa fa-trash-o"></i></a>';


            $data[] = $row;
        }

        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsFiltered" => $this->M_data->count_filtered($table, $column_order, $column_search, $order),
                        "recordsTotal" => $this->M_data->count_all($table),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }


    // Jenis Tarif
    function jenis_tarif() {
        $d['title']     = "Jenis Tarif";
        $d['page']      = 'dm_jenis_tarif';
        $d['judul']     = "Jenis Tarif";
        $d['menu']      = "Data Master";
        $d['submenu']   = "Jenis Tarif";
        $d['list_tarif']   = $this->M_global->list_select3('m_tarif_tbl')->result_array();
        $d['list_ta']      = $this->M_global->list_select3('m_ta_tbl')->result_array();
        $d['list_jenjang'] = $this->M_global->list_select('m_jenjang_tbl')->result_array();
        $d['list_jurusan'] = $this->M_global->list_select('m_jurusan_tbl')->result_array();
        $d['list_tingkat'] = $this->M_global->list_select3('m_tingkat_tbl')->result_array();
        $d['list_gelombang'] = $this->M_global->list_select3('m_gelombang_tbl')->result_array();
        $d['list_tipe_transaksi'] = $this->M_global->list_select('m_tipe_transaksi_tbl')->result_array();

        // var_dump($d);
        // die();
        $this->load->view('layout', $d);
    }

    public function jenis_tarif_detail($id) {
        $detail         = $this->M_data->get_master('m_tarif_tbl', 'id_tarif', $id);
        $tipe_transaksi = $this->M_data->get_master_direct('m_tipe_transaksi_tbl', 'id_tipe_transaksi', $detail['id_tipe_transaksi'], 'id_tipe_transaksi, tipe_transaksi');
        $list_transaksi = $this->M_global->list_select4('m_tipe_transaksi_tbl', 'id_tipe_transaksi', $detail['id_tipe_transaksi'])->result_array();
        $option = '';
            $option .= '<option value="'.$tipe_transaksi['id_tipe_transaksi'].'">'.$tipe_transaksi['tipe_transaksi'].'</option>';
        foreach ($list_transaksi as $ltrans) {
            $option .= '<option value="'.$ltrans['id_tipe_transaksi'].'">'.$ltrans['tipe_transaksi'].'</option>';
        }

        $data   = array(
            "detail" => $detail, 
            "option" => $option);

        echo json_encode($data);
    }

    public function jenis_tarif_nilai_detail($id) {
        $data           = $this->M_data->get_master('v_tarif_nilai_tbl', 'id_tarif_nilai', $id);
        echo json_encode($data);
    }    

    public function jenis_tarif_action($action) {
        $id             = htmlentities($this->input->post('id'));
        $id_tarif       = htmlentities($this->input->post('id_tarif'));
        $id_tarif_nilai = htmlentities($this->input->post('id_tarif_nilai'));
        $id_ta          = htmlentities($this->input->post('id_ta'));
        $id_jenjang     = htmlentities($this->input->post('id_jenjang'));
        $id_jurusan     = htmlentities($this->input->post('id_jurusan'));
        $id_gelombang   = htmlentities($this->input->post('id_gelombang'));
        $id_parent      = htmlentities($this->input->post('id_parent'));
        $id_tipe_transaksi = htmlentities($this->input->post('id_tipe_transaksi'));
        $nama_tarif     = htmlentities($this->input->post('nama_tarif'));
        $tingkat        = htmlentities($this->input->post('tingkat'));
        $nominal        = htmlentities($this->input->post('nominal'));

        $aktif          = htmlentities($this->input->post('aktif'));

        $paramColumn    = htmlentities($this->input->post('paramColumn'));
        $value          = htmlentities($this->input->post('value'));

        
        $data = array(
                'id_tipe_transaksi' => $id_tipe_transaksi,
                'nama_tarif'        => $nama_tarif
            );
        // var_dump($data);
        // die();
        if ($action == "add") {
            $is_success = $this->M_data->insert_master('m_tarif_tbl', $data);
            if (!$is_success) {
                echo json_encode(array("status" => "SUCCESS"));
            } else {
                echo json_encode(array("status" => "FAILURE"));
            }
        } elseif ($action == "edit") {
            $is_success     = $this->M_data->update_master('m_tarif_tbl', 'id_tarif', $id_tarif, $data);
            if (!$is_success) {
                echo json_encode(array("status" => "SUCCESS"));
            } else {
                echo json_encode(array("status" => "FAILURE"));
            }
        } elseif ($action == "del") {
            $is_success = $this->M_data->delete_master('m_tarif_tbl', 'id_tarif', $id);
            if (!$is_success) {
                echo json_encode(array("status" => "SUCCESS"));
            } else {
                echo json_encode(array("status" => "FAILURE"));
            }
        } elseif ($action == "aktif") {
            $is_success = $this->M_data->update_master('m_tarif_nilai_tbl', 'id_tarif_nilai', $id, array('aktif' => $aktif));
            if (!$is_success) {
                echo json_encode(array("status" => "SUCCESS"));
            } else {
                echo json_encode(array("status" => "FAILURE"));
            }
        } elseif ($action == "addNilai") {
            $data   = array(
                    'id_ta'             => $id_ta,
                    'id_tarif'          => $id_tarif,
                    'id_gelombang'      => $id_gelombang,
                    'id_jenjang'        => $id_jenjang,
                    'id_jurusan'        => $id_jurusan,
                    'tingkat'           => $tingkat,
                    'nom_total'           => $nominal
                );
            // var_dump($data);
            // die();
            $is_success = $this->M_data->insert_master('m_tarif_nilai_tbl', $data);
            if (!$is_success) {
                echo json_encode(array("status" => "SUCCESS"));
            } else {
                echo json_encode(array("status" => "FAILURE"));
            }
        } elseif ($action == "editNilai") {
            unset($data);
            $data   = array(
                    'nom_total'           => $nominal
                );
            $is_success     = $this->M_data->update_master('m_tarif_nilai_tbl', 'id_tarif_nilai', $id_tarif_nilai, $data);
            if (!$is_success) {
                echo json_encode(array("status" => $id));
            } else {
                echo json_encode(array("status" => "FAILURE"));
            }
        } elseif ($action == "delNilai") {
            $cek_used_pem   = $this->M_global->list_select5('t_pembayaran_detail_tbl', 'id_tarif_nilai', $id)->row();
            $cek_used_peng  = $this->M_global->list_select5('t_pengembalian_detail_tbl', 'id_tarif_nilai', $id)->row();

            if ($cek_used_pem || $cek_used_peng) {
                echo json_encode(array("status" => "CANNOT"));
            } else {
                $is_success = $this->M_data->update_master('m_tarif_nilai_tbl', 'id_tarif_nilai', $id, array('aktif' => 0));
                if (!$is_success) {
                    echo json_encode(array("status" => "SUCCESS"));
                } else {
                    echo json_encode(array("status" => "FAILURE"));
                }
            }
        }

    }

    public function show_jenis_tarif() {
        $table          = $this->M_data->get_tarif_pivot();
        $column_order   = array(null, null, 'nama_tarif'); //set column field database for datatable orderable

        $list_jenjang   = $this->M_global->list_select('m_jenjang_tbl')->result_array();
        foreach ($list_jenjang as $lj) {
            array_push($column_order, $lj['jenjang']);
        }
            array_push($column_order, null);

        $column_search  = array('nama_tarif'); //set column field database for datatable searchable 
        $order          = array('id_tarif' => 'asc'); // default order 

        $list           = $this->M_data->get_datatables($table, $column_order, $column_search, $order);
        $data           = array();
        $no             = $_POST['start'];
        foreach ($list as $l) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $l->nama_tarif;
            $row[] = $l->tipe_transaksi;
            $row[] = '<a class="text-primary" href="javascript:;" onClick="edit('."'".$l->id_tarif."'".', this)" data-toggle="tooltip" title="Ubah" data-original-title="Ubah"><i class="fa fa-edit"></i></a>&nbsp
                      <a class="text-danger"href="javascript:;" onClick="del('."'".$l->id_tarif."'".', this)" data-toggle="tooltip" title="Hapus" data-original-title="Hapus"><i class="fa fa-trash-o"></i></a>';


            $data[] = $row;
        }

        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsFiltered" => $this->M_data->count_filtered($table, $column_order, $column_search, $order),
                        "recordsTotal" => $this->M_data->count_all($table),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }

    public function show_jenis_tarif_nilai() {
        $id_ta          = $this->input->post('id_ta');
        $id_jenjang     = $this->input->post('id_jenjang');
        $id_jurusan     = $this->input->post('id_jurusan');
        $tingkat        = $this->input->post('tingkat');
        $id_gelombang   = $this->input->post('id_gelombang');
        $id_tarif       = $this->input->post('id_tarif');



        $table          = 'v_tarif_nilai_tbl';
        $column_order   = array(null, 'teks_ta', 'gelombang', 'jenjang', 'jurusan', 'tingkat', 'nom_total', null, null); //set column field database for datatable orderable
        $column_search  = array('teks_ta', 'gelombang', 'jenjang', 'jurusan', 'tingkat', 'nom_total'); //set column field database for datatable searchable 
        $order          = array('id_tarif_nilai' => 'asc'); // default order 

        $second_id      = array();
        $second_id[]    = array('aktif', 1);
        if ($id_ta) {
            $second_id[]    = array('id_ta', $id_ta);
        }
        if ($id_jenjang) {
            $second_id[]    = array('id_jenjang', $id_jenjang);
        }        
        if ($id_jurusan) {
            $second_id[]    = array('id_jurusan', $id_jurusan);
        }        
        if ($tingkat) {
            $second_id[]    = array('tingkat', $tingkat);
        }        
        if ($id_gelombang) {
            $second_id[]    = array('id_gelombang', $id_gelombang);
        }          
        if ($id_tarif) {
            $second_id[]    = array('id_tarif', $id_tarif);
        }        

        $list           = $this->M_data->get_datatables($table, $column_order, $column_search, $order, $second_id);
        $data           = array();
        $no             = $_POST['start'];

        foreach ($list as $l) {
            $row = array();
            $no++;
            $row[] = $no;
            $row[] = $l->teks_ta;
            $row[] = $l->jenjang;
            $row[] = $l->nama_tarif;
            $row[] = $l->gelombang;
            $row[] = $l->jurusan;
            $row[] = $l->tingkat;
            $row[] = number_format($l->nom_total,0,",",",");
            if($l->aktif == '1') {
                        $status='checked="checked" readonly';
                    } else {
                        $status='';
                    }
            $row[]  = '<a class="editNilai text-primary" data-id="'.$l->id_tarif_nilai.'" href="javascript:;" data-toggle="tooltip" title="Ubah" data-original-title="Ubah"><i class="fa fa-pencil"></i></a>&nbsp;
                        <a class="text-danger delNilai" data-id="'.$l->id_tarif_nilai.'" href="javascript:;" data-toggle="tooltip" title="Hapus" data-original-title="Hapus"><i class="fa fa-minus-circle"></i></a>&nbsp';

            $data[] = $row;
        }

        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsFiltered" => $this->M_data->count_filtered($table, $column_order, $column_search, $order, $second_id),
                        "recordsTotal" => $this->M_data->count_all($table, $second_id),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }


    // Jenis Keringanan
    function jenis_keringanan() {
        $d['title']     = "Jenis Keringanan";
        $d['page']      = 'dm_jenis_keringanan';
        $d['judul']     = "Jenis Keringanan";
        $d['menu']      = "Data Master";
        $d['submenu']   = "Jenis Keringanan";
        $d['list_jenjang'] = $this->M_global->list_select('m_jenjang_tbl')->result_array();
        $d['list_jurusan'] = $this->M_global->list_select('m_jurusan_tbl')->result_array();
        $d['list_tingkat'] = $this->M_global->list_select3('m_tingkat_tbl')->result_array();
        $d['list_tipe_transaksi'] = $this->M_global->list_select('m_tipe_transaksi_tbl')->result_array();
        $this->load->view('layout', $d);
    }

    public function jenis_keringanan_detail($id) {
        $detail         = $this->M_data->get_master('m_keringanan_tbl', 'id_keringanan', $id);
        $tipe_transaksi = $this->M_data->get_master_direct('m_tipe_transaksi_tbl', 'id_tipe_transaksi', $detail['id_tipe_transaksi'], 'id_tipe_transaksi, tipe_transaksi');
        $list_transaksi = $this->M_global->list_select4('m_tipe_transaksi_tbl', 'id_tipe_transaksi', $detail['id_tipe_transaksi'])->result_array();
        $option = '';
            $option .= '<option value="'.$tipe_transaksi['id_tipe_transaksi'].'">'.$tipe_transaksi['tipe_transaksi'].'</option>';
        foreach ($list_transaksi as $ltrans) {
            $option .= '<option value="'.$ltrans['id_tipe_transaksi'].'">'.$ltrans['tipe_transaksi'].'</option>';
        }

        $data   = array(
            "detail" => $detail, 
            "option" => $option);

        echo json_encode($data);
    }

    public function jenis_keringanan_action($action) {
        $id             = htmlentities($this->input->post('id'));
        $id_keringanan  = htmlentities($this->input->post('id_keringanan'));
        $id_ta          = htmlentities($this->input->post('id_ta'));
        $id_jenjang     = htmlentities($this->input->post('id_jenjang'));
        $id_gelombang   = htmlentities($this->input->post('id_gelombang'));
        $id_jurusan     = htmlentities($this->input->post('id_jurusan'));
        $id_parent      = htmlentities($this->input->post('id_parent'));
        $id_tipe_transaksi = htmlentities($this->input->post('id_tipe_transaksi'));
        $keringanan     = htmlentities($this->input->post('keringanan'));
        $tingkat        = htmlentities($this->input->post('tingkat'));
        $nominal        = htmlentities($this->input->post('nominal'));

        $aktif          = htmlentities($this->input->post('aktif'));

        $paramColumn    = htmlentities($this->input->post('paramColumn'));
        $value          = htmlentities($this->input->post('value'));

        $data = array(
                'id_tipe_transaksi' => $id_tipe_transaksi,
                'keringanan'        => $keringanan
            );

        if ($action == "add") {
            $is_success = $this->M_data->insert_master('m_keringanan_tbl', $data);
            if (!$is_success) {
                echo json_encode(array("status" => "SUCCESS"));
            } else {
                echo json_encode(array("status" => "FAILURE"));
            }
        } elseif ($action == "edit") {
            $is_success     = $this->M_data->update_master('m_keringanan_tbl', 'id_keringanan', $id_keringanan, $data);
            if (!$is_success) {
                echo json_encode(array("status" => "SUCCESS"));
            } else {
                echo json_encode(array("status" => "FAILURE"));
            }
        } elseif ($action == "del") {
            $is_success = $this->M_data->delete_master('m_keringanan_tbl', 'id_keringanan', $id);
            if (!$is_success) {
                echo json_encode(array("status" => "SUCCESS"));
            } else {
                echo json_encode(array("status" => "FAILURE"));
            }
        } elseif ($action == "aktif") {
            $is_success = $this->M_data->update_master('m_keringanan_nilai_tbl', 'id_keringanan_nilai', $id, array('aktif' => $aktif));
            if (!$is_success) {
                echo json_encode(array("status" => "SUCCESS"));
            } else {
                echo json_encode(array("status" => "FAILURE"));
            }
        } elseif ($action == "addNilai") {
            $data   = array(
                    'id_ta'             => $id_ta,
                    'id_keringanan'     => $id_keringanan,
                    'id_gelombang'      => $id_gelombang,
                    'id_jenjang'        => $id_jenjang,
                    'id_jurusan'        => $id_jurusan,
                    'tingkat'           => $tingkat,
                    'nominal'           => $nominal
                );
            $is_success = $this->M_data->insert_master('m_keringanan_nilai_tbl', $data);
            if (!$is_success) {
                echo json_encode(array("status" => "SUCCESS"));
            } else {
                echo json_encode(array("status" => "FAILURE"));
            }
        } elseif ($action == "editNilai") {
            unset($data);
            $data   = array(
                    'nominal'           => $nominal
                );
            $is_success     = $this->M_data->update_master('m_keringanan_nilai_tbl', 'id_keringanan_nilai', $id, $data);
            if (!$is_success) {
                echo json_encode(array("status" => "SUCCESS"));
            } else {
                echo json_encode(array("status" => "FAILURE"));
            }
        } elseif ($action == "delNilai") {
            $cek_used_pem   = $this->M_global->list_select5('t_pembayaran_detail_tbl', 'id_tarif_nilai', $id);
            $cek_used_peng  = $this->M_global->list_select5('t_pengembalian_detail_tbl', 'id_tarif_nilai', $id);
            if (!($cek_used_pem && $cek_used_peng)) {
                $is_success = $this->M_data->update_master('m_tarif_nilai_tbl', 'id_tarif_nilai', $id, array('aktif' => 0));
                if (!$is_success) {
                    echo json_encode(array("status" => "SUCCESS"));
                } else {
                echo json_encode(array("status" => "FAILURE"));
                }
            } else {
                echo json_encode(array("status" => "CANNOT"));
            }
        } elseif ($action == "getFormNilai") {
            $row        = '';
            $row        .= '<td class="input-addNilai"><input name="id_keringanan" type="hidden" value="'.$id.'"><input type="hidden" name="id_jenjang" value="'.$id_jenjang.'"></td>';
            $row        .= '<td style="padding:0px;height:39px;">'.$this->list_ta().'</td>';
            $row        .= '<td style="padding:0px;height:39px;">'.$this->list_gelombang().'</td>';
            $row        .= '<td style="padding:0px;height:39px;">'.$this->list_jurusan().'</td>';
            $row        .= '<td style="padding:0px;height:39px;">'.$this->list_tingkat().'</td>';
            $row        .= '<td style="padding:0px;height:39px;"><input style="height:100%;width:100%;" name="nominal" type="text" value=""></td>';
            $row        .= '<td class="text-center">
                                <a class="saveNilai text-primary" href="javascript:;">
                                    <i class="fa fa-save"></i>
                                </a>&nbsp;&nbsp;
                                <a class="deladdNilai text-danger" href="javascript:;">
                                    <i class="fa fa-times-circle"></i>
                                </a>
                            </td>';
            echo json_encode($row);
        }

    }

    public function show_jenis_keringanan() {
        $table          = $this->M_data->get_keringanan_pivot();
        $column_order        = array(null, null, 'keringanan'); //set column field database for datatable orderable

        $list_jenjang   = $this->M_global->list_select('m_jenjang_tbl')->result_array();
        foreach ($list_jenjang as $lj) {
            array_push($column_order, $lj['jenjang']);
        }
            array_push($column_order, null);

        $column_search  = array('keringanan'); //set column field database for datatable searchable 
        $order          = array('id_keringanan' => 'asc'); // default order 

        $list           = $this->M_data->get_datatables($table, $column_order, $column_search, $order);
        $data           = array();
        $no             = $_POST['start'];
        foreach ($list as $l) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $l->keringanan;
            $row[] = $l->tipe_transaksi;
            foreach ($list_jenjang as $lj) {
                    $row[] = '<a class="text-warning" href="javascript:;" onClick="showNilai(this)" data-id="'.$l->id_keringanan.'" data-filterId="'.$lj['id_jenjang'].'" data-filterColumn="id_jenjang"><i class="fa fa-search-plus"></i>&nbsp;<sup>('.$l->$lj['jenjang'].')</sup></a>';
            }

            $row[] = '<a class="text-primary" href="javascript:;" onClick="edit('."'".$l->id_keringanan."'".', this)" data-toggle="tooltip" title="Ubah" data-original-title="Ubah"><i class="fa fa-edit"></i></a>&nbsp
                      <a class="text-danger"href="javascript:;" onClick="del('."'".$l->id_keringanan."'".', this)" data-toggle="tooltip" title="Hapus" data-original-title="Hapus"><i class="fa fa-trash-o"></i></a>';


            $data[] = $row;
        }

        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsFiltered" => $this->M_data->count_filtered($table, $column_order, $column_search, $order),
                        "recordsTotal" => $this->M_data->count_all($table),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }

    public function show_jenis_keringanan_nilai($id, $paramColumn=null, $paramId=null, $filterColumn=null, $filterId=null, $filterColumn2=null, $filterId2=null) {

        $table          = 'v_keringanan_nilai_tbl';
        $column_order   = array(null, 'teks_ta', 'jenjang','jurusan', 'nominal', null, null); //set column field database for datatable orderable
        $column_search  = array('teks_ta', 'jenjang', 'nominal'); //set column field database for datatable searchable 
        $order          = array('id_jenjang' => 'asc'); // default order 

        if ($paramId != null && $filterId == null && $filterId2 == null) {
            $second_id      = array(array('id_keringanan', $id),array($paramColumn, $paramId),array('aktif', 1));
        } elseif ($paramId != null && $filterId != null && $filterId2 == null) {
            $second_id      = array(array('id_keringanan', $id),array($paramColumn, $paramId),array($filterColumn, $filterId),array('aktif', 1));
        } elseif ($paramId != null && $filterId == null && $filterId2 != null) {
            $second_id      = array(array('id_keringanan', $id),array($paramColumn, $paramId),array($filterColumn2, $filterId2),array('aktif', 1));
        } elseif ($paramId != null && $filterId != null && $filterId2 != null) {
            $second_id      = array(array('id_keringanan', $id),array($paramColumn, $paramId),array($filterColumn, $filterId),array($filterColumn2, $filterId2),array('aktif', 1));
        } else {
            $second_id      = array(array('id_keringanan', $id),array('aktif', 1));
        }

        $list           = $this->M_data->get_datatables($table, $column_order, $column_search, $order, $second_id);
        $data           = array();
        $no             = $_POST['start'];

        foreach ($list as $l) {
            $row = array();
            $no++;
            $row[] = $no;
            $row[] = $l->teks_ta;
            $row[] = $l->gelombang;
            $row[] = $l->jurusan;
            $row[] = $l->tingkat;
            $row[] = number_format($l->nominal,0,",",",");
            if($l->aktif == '1') {
                        $status='checked="checked" readonly';
                    } else {
                        $status='';
                    }
            $row[]  = '<a class="editNilai text-primary" data-id="'.$l->id_keringanan_nilai.'" href="javascript:;" data-toggle="tooltip" title="Ubah" data-original-title="Ubah"><i class="fa fa-pencil"></i></a>&nbsp;
                        <a class="text-danger delNilai" data-id="'.$l->id_keringanan_nilai.'" href="javascript:;" data-toggle="tooltip" title="Hapus" data-original-title="Hapus"><i class="fa fa-trash-o"></i></a>&nbsp';

            $data[] = $row;
        }

        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsFiltered" => $this->M_data->count_filtered($table, $column_order, $column_search, $order, $second_id),
                        "recordsTotal" => $this->M_data->count_all($table, $second_id),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }

    // Gelombang Pendaftaran
    function gelombang_pend() {
        $d['title']     = "Gelombang Pendaftaran";
        $d['page']      = 'dm_gelombang_pend';
        $d['judul']     = "Gelombang Pendaftaran";
        $d['menu']      = "Data Master";
        $d['submenu']   = "Gelombang Pendaftaran";
        $this->load->view('layout', $d);
    }

    public function gelombang_pend_detail($id) {
        $detail = $this->M_data->get_master('m_gelombang_tbl', 'id_gelombang', $id);
        echo json_encode($detail);
    }

    public function gelombang_pend_action($action) {
        $id             = htmlentities($this->input->post('id'));
        $id_gelombang   = htmlentities($this->input->post('id_gelombang'));
        $gelombang      = htmlentities($this->input->post('gelombang'));
        $aktif          = htmlentities($this->input->post('aktif'));


        $data = array(
                'gelombang'     => $gelombang
            );

        if ($action == "add") {
            $is_success = $this->M_data->insert_master('m_gelombang_tbl', $data);
            if (!$is_success) {
                echo json_encode(array("status" => "SUCCESS"));
            } else {
                echo json_encode(array("status" => "FAILURE"));
            }
        } elseif ($action == "edit") {
            $is_success = $this->M_data->update_master('m_gelombang_tbl', 'id_gelombang', $id_gelombang, $data);;
            if (!$is_success) {
                echo json_encode(array("status" => "SUCCESS"));
            } else {
                echo json_encode(array("status" => "FAILURE"));
            }
        } elseif ($action == "del") {
            $is_success = $this->M_data->delete_master('m_gelombang_tbl', 'id_gelombang', $id);
            if (!$is_success) {
                echo json_encode(array("status" => "SUCCESS"));
            } else {
                echo json_encode(array("status" => "FAILURE"));
            }
        } elseif ($action == "aktif") {
            $is_success = $this->M_data->update_master('m_gelombang_tbl', 'id_gelombang', $id, array('aktif' => $aktif));
            if (!$is_success) {
                echo json_encode(array("status" => $aktif));
            } else {
                echo json_encode(array("status" => "FAILURE"));
            }
        }
    }

    public function show_gelombang_pend() {
        $table          = 'm_gelombang_tbl';
        $column_order   = array(null, 'gelombang', null, null, null); //set column field database for datatable orderable
        $column_search  = array('gelombang'); //set column field database for datatable searchable 
        $order          = array('gelombang' => 'asc'); // default order 

        $list           = $this->M_data->get_datatables($table, $column_order, $column_search, $order);
        $data           = array();
        $no             = $_POST['start'];
        foreach ($list as $l) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $l->gelombang;
                    if($l->aktif == '1') {
                        $status='checked="checked"';
                    } else {
                        $status='';
                    }
            $row[] = '<input type="hidden" class="paramId" value="'.$l->id_gelombang.'"><input onChange="aktif(this)" type="checkbox" '.$status.'>';
            $row[] = '<a class="text-primary" href="javascript:;" onClick="edit('."'".$l->id_gelombang."'".', this)" data-toggle="tooltip" title="Ubah" data-original-title="Ubah"><i class="fa fa-edit"></i></a>&nbsp;
                      <a class="text-danger" href="javascript:;" onClick="del('."'".$l->id_gelombang."'".', this)" data-toggle="tooltip" title="Hapus" data-original-title="Hapus"><i class="fa fa-trash-o"></i></a>';


            $data[] = $row;
        }

        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsFiltered" => $this->M_data->count_filtered($table, $column_order, $column_search, $order),
                        "recordsTotal" => $this->M_data->count_all($table),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }

    // Tahun Ajaran
    function tahun_ajaran() {
        $d['title']     = "Tahun Ajaran";
        $d['page']      = 'dm_tahun_ajaran';
        $d['judul']     = "Tahun Ajaran";
        $d['menu']      = "Data Master";
        $d['submenu']   = "Tahun Ajaran";
        $this->load->view('layout', $d);
    }

    public function tahun_ajaran_detail($id) {
        $detail = $this->M_data->get_master('m_ta_tbl', 'id_ta', $id);
        echo json_encode($detail);
    }

    public function tahun_ajaran_action($action) {
        $id             = htmlentities($this->input->post('id'));
        $id_ta          = htmlentities($this->input->post('id_ta'));
        $tahun_mulai    = htmlentities($this->input->post('tahun_mulai'));
        $tahun_selesai  = htmlentities($this->input->post('tahun_selesai'));
        $percent_batal  = htmlentities($this->input->post('percent_batal'));
        // $tahun_mulai    = date('Y', strtotime($tahun_mulai_raw));
        // $tahun_selesai  = date('Y', strtotime($tahun_selesai_raw));

        $aktif          = htmlentities($this->input->post('aktif'));
        $teks_ta        = $tahun_mulai." - ".$tahun_selesai;



        $data = array(
                'tahun_mulai'   => $tahun_mulai,
                'tahun_selesai' => $tahun_selesai,
                'percent_batal' => $percent_batal,
                'teks_ta'       => $teks_ta
            );

        if ($action == "add") {
            $is_success = $this->M_data->insert_master('m_ta_tbl', $data);
            if (!$is_success) {
                echo json_encode(array("status" => "SUCCESS"));
            } else {
                echo json_encode(array("status" => "FAILURE"));
            }
        } elseif ($action == "edit") {
            $is_success = $this->M_data->update_master('m_ta_tbl', 'id_ta', $id_ta, $data);;
            if (!$is_success) {
                echo json_encode(array("status" => "SUCCESS"));
            } else {
                echo json_encode(array("status" => "FAILURE"));
            }
        } elseif ($action == "del") {
            $is_success = $this->M_data->delete_master('m_ta_tbl', 'id_ta', $id);
            if (!$is_success) {
                echo json_encode(array("status" => "SUCCESS"));
            } else {
                echo json_encode(array("status" => "FAILURE"));
            }
        } elseif ($action == "aktif") {
            $is_success = $this->M_data->update_master('m_ta_tbl', 'id_ta', $id, array('aktif' => $aktif));
            if (!$is_success) {
                echo json_encode(array("status" => $aktif));
            } else {
                echo json_encode(array("status" => "FAILURE"));
            }
        }
    }

    public function show_tahun_ajaran() {
        $table          = 'm_ta_tbl';
        $column_order   = array(null, 'tahun_mulai', 'tahun_selesai', 'percent_batal', 'teks_ta', null); //set column field database for datatable orderable
        $column_search  = array('tahun_mulai', 'tahun_selesai', 'teks_ta'); //set column field database for datatable searchable 
        $order          = array('tahun_mulai' => 'asc'); // default order 

        $list           = $this->M_data->get_datatables($table, $column_order, $column_search, $order);
        $data           = array();
        $no             = $_POST['start'];
        foreach ($list as $l) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $l->tahun_mulai;
            $row[] = $l->tahun_selesai;
            $row[] = $l->percent_batal;
            $row[] = $l->teks_ta;
            // $row[] = '<input value="" type="checkbox" class="switch" data-on-text="On" data-off-text="Off" data-on-color="primary" data-off-color="default" checked="checked">';
            // $row[] = "test";
            $row[] = '<a class="text-primary" href="javascript:;" onClick="edit('."'".$l->id_ta."'".', this)" data-toggle="tooltip" title="Ubah" data-original-title="Ubah"><i class="fa fa-edit"></i></a>&nbsp;
                      <a class="text-danger" href="javascript:;" onClick="del('."'".$l->id_ta."'".', this)" data-toggle="tooltip" title="Hapus" data-original-title="Hapus"><i class="fa fa-trash-o"></i></a>';


            $data[] = $row;
        }

        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsFiltered" => $this->M_data->count_filtered($table, $column_order, $column_search, $order),
                        "recordsTotal" => $this->M_data->count_all($table),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }


    // Status Siswa
    function siswa_status() {
        $d['title']     = "Status Siswa";
        $d['page']      = 'dm_status_siswa';
        $d['judul']     = "Status Siswa";
        $d['menu']      = "Data Master";
        $d['submenu']   = "Status Siswa";
        $this->load->view('layout', $d);
    }

    public function siswa_status_detail($id) {
        $detail = $this->M_data->get_master('m_siswa_status_tbl', 'id_siswa_status', $id);
        echo json_encode($detail);
    }

    public function siswa_status_action($action) {
        $id             = htmlentities($this->input->post('id'));
        $id_siswa_status= htmlentities($this->input->post('id_siswa_status'));
        $status_s       = htmlentities($this->input->post('status'));
        $aktif          = htmlentities($this->input->post('aktif'));


        $data = array(
                'status'            => $status_s
            );

        if ($action == "add") {
            $is_success = $this->M_data->insert_master('m_siswa_status_tbl', $data);
            if (!$is_success) {
                echo json_encode(array("status" => "SUCCESS"));
            } else {
                echo json_encode(array("status" => "FAILURE"));
            }
        } elseif ($action == "edit") {
            $is_success = $this->M_data->update_master('m_siswa_status_tbl', 'id_siswa_status', $id_siswa_status, $data);;
            if (!$is_success) {
                echo json_encode(array("status" => "SUCCESS"));
            } else {
                echo json_encode(array("status" => "FAILURE"));
            }
        } elseif ($action == "del") {
            $is_success = $this->M_data->delete_master('m_siswa_status_tbl', 'id_siswa_status', $id);
            if (!$is_success) {
                echo json_encode(array("status" => "SUCCESS"));
            } else {
                echo json_encode(array("status" => "FAILURE"));
            }
        } elseif ($action == "aktif") {
            $is_success = $this->M_data->update_master('m_siswa_status_tbl', 'id_siswa_status', $id, array('aktif' => $aktif));
            if (!$is_success) {
                echo json_encode(array("status" => $aktif));
            } else {
                echo json_encode(array("status" => "FAILURE"));
            }
        }
    }

    public function show_siswa_status() {
        $table          = 'm_siswa_status_tbl';
        $column_order   = array(null, 'status', null, null); //set column field database for datatable orderable
        $column_search  = array('status'); //set column field database for datatable searchable 
        $order          = array('status' => 'asc'); // default order 

        $list           = $this->M_data->get_datatables($table, $column_order, $column_search, $order);
        $data           = array();
        $no             = $_POST['start'];
        foreach ($list as $l) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $l->status;
                    if($l->aktif == '1') {
                        $status='checked="checked"';
                    } else {
                        $status='';
                    }
            $row[] = '<input type="hidden" class="paramId" value="'.$l->id_siswa_status.'"><input onChange="aktif(this)" type="checkbox" '.$status.'>';
            // $row[] = '<input value="" type="checkbox" class="switch" data-on-text="On" data-off-text="Off" data-on-color="primary" data-off-color="default" checked="checked">';
            // $row[] = "test";
            $row[] = '<a class="text-primary" href="javascript:;" onClick="edit('."'".$l->id_siswa_status."'".', this)" data-toggle="tooltip" title="Ubah" data-original-title="Ubah"><i class="fa fa-edit"></i></a>&nbsp;
                      <a class="text-danger" href="javascript:;" onClick="del('."'".$l->id_siswa_status."'".', this)" data-toggle="tooltip" title="Hapus" data-original-title="Hapus"><i class="fa fa-trash-o"></i></a>';


            $data[] = $row;
        }

        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsFiltered" => $this->M_data->count_filtered($table, $column_order, $column_search, $order),
                        "recordsTotal" => $this->M_data->count_all($table),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }

    // Jurusan
    function jurusan() {
        $d['title']     = "Jurusan";
        $d['page']      = 'dm_jurusan';
        $d['judul']     = "Jurusan";
        $d['menu']      = "Data Master";
        $d['submenu']   = "Jurusan";
        $this->load->view('layout', $d);
    }

    public function jurusan_detail($id) {
        $detail = $this->M_data->get_master('m_jurusan_tbl', 'id_jurusan', $id);
        echo json_encode($detail);
    }

    public function jurusan_action($action) {
        $id             = htmlentities($this->input->post('id'));
        $id_jurusan     = htmlentities($this->input->post('id_jurusan'));
        $jurusan        = htmlentities($this->input->post('jurusan'));
        $akronim        = htmlentities($this->input->post('akronim'));
        $aktif          = htmlentities($this->input->post('aktif'));


        $data = array(
                'jurusan'     => $jurusan,
                'akronim'     => $akronim,
            );

        if ($action == "add") {
            $is_success = $this->M_data->insert_master('m_jurusan_tbl', $data);
            if (!$is_success) {
                echo json_encode(array("status" => "SUCCESS"));
            } else {
                echo json_encode(array("status" => "FAILURE"));
            }
        } elseif ($action == "edit") {
            $is_success = $this->M_data->update_master('m_jurusan_tbl', 'id_jurusan', $id_jurusan, $data);;
            if (!$is_success) {
                echo json_encode(array("status" => "SUCCESS"));
            } else {
                echo json_encode(array("status" => "FAILURE"));
            }
        } elseif ($action == "del") {
            $is_success = $this->M_data->delete_master('m_jurusan_tbl', 'id_jurusan', $id);
            if (!$is_success) {
                echo json_encode(array("status" => "SUCCESS"));
            } else {
                echo json_encode(array("status" => "FAILURE"));
            }
        } elseif ($action == "aktif") {
            $is_success = $this->M_data->update_master('m_jurusan_tbl', 'id_jurusan', $id, array('aktif' => $aktif));
            if (!$is_success) {
                echo json_encode(array("status" => $aktif));
            } else {
                echo json_encode(array("status" => "FAILURE"));
            }
        }
    }

    public function show_jurusan() {
        $table          = 'm_jurusan_tbl';
        $column_order   = array(null, 'jurusan', null, null); //set column field database for datatable orderable
        $column_search  = array('jurusan'); //set column field database for datatable searchable 
        $order          = array('id_jurusan' => 'asc'); // default order 

        $list           = $this->M_data->get_datatables($table, $column_order, $column_search, $order);
        $data           = array();
        $no             = $_POST['start'];
        foreach ($list as $l) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $l->jurusan;
                    if($l->aktif == '1') {
                        $status='checked="checked"';
                    } else {
                        $status='';
                    }
            $row[] = '<input type="hidden" class="paramId" value="'.$l->id_jurusan.'"><input onChange="aktif(this)" type="checkbox" '.$status.'>';
            // $row[] = '<input value="" type="checkbox" class="switch" data-on-text="On" data-off-text="Off" data-on-color="primary" data-off-color="default" checked="checked">';
            // $row[] = "test";
            $row[] = '<a class="text-primary" href="javascript:;" onClick="edit('."'".$l->id_jurusan."'".', this)" data-toggle="tooltip" title="Ubah" data-original-title="Ubah"><i class="fa fa-edit"></i></a>&nbsp;
                      <a class="text-danger" href="javascript:;" onClick="del('."'".$l->id_jurusan."'".', this)" data-toggle="tooltip" title="Hapus" data-original-title="Hapus"><i class="fa fa-trash-o"></i></a>';


            $data[] = $row;
        }

        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsFiltered" => $this->M_data->count_filtered($table, $column_order, $column_search, $order),
                        "recordsTotal" => $this->M_data->count_all($table),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }

    // Jenis Sosial Media
    function user_manage() {
        $d['title']     = "User Management";
        $d['page']      = 'dm_user_manage';
        $d['judul']     = "User Management";
        $d['menu']      = "Data Master";
        $d['submenu']   = "User Management";
        $this->load->view('layout', $d);
    }

    public function user_manage_detail($id) {
        $detail = $this->M_data->get_master('m_user_tbl', 'id_user', $id);
        echo json_encode($detail);
    }

    public function user_manage_action($action) {
        $id             = htmlentities($this->input->post('id'));
        $id_user        = htmlentities($this->input->post('id_user'));
        $nama           = htmlentities($this->input->post('nama'));
        $email          = htmlentities($this->input->post('email'));
        $id_telegram    = htmlentities($this->input->post('id_telegram'));
        $password       = htmlentities($this->input->post('password'));
        $level          = htmlentities($this->input->post('level'));
        $divisi         = htmlentities($this->input->post('divisi'));
        $aktif          = htmlentities($this->input->post('aktif'));
        


        $data = array(
                'nama'      => $nama,
                'email'     => $email,
                'id_telegram'=> $id_telegram,
                'password'  => $password,
                'lvl'       => $level,
                'divisi'    => $divisi,
                'aktif'     => $aktif
            );

        if ($action == "add") {
            $is_success = $this->M_data->insert_master('m_user_tbl', $data);
            if (!$is_success) {
                echo json_encode(array("status" => "SUCCESS"));
            } else {
                echo json_encode(array("status" => "FAILURE"));
            }
        } elseif ($action == "edit") {
            $is_success = $this->M_data->update_master('m_user_tbl', 'id_user', $id_user, $data);;
            if (!$is_success) {
                echo json_encode(array("status" => "SUCCESS"));
            } else {
                echo json_encode(array("status" => "FAILURE"));
            }
        } elseif ($action == "del") {
            $is_success = $this->M_data->delete_master('m_user_tbl', 'id_user', $id);
            if (!$is_success) {
                echo json_encode(array("status" => "SUCCESS"));
            } else {
                echo json_encode(array("status" => "FAILURE"));
            }
        } elseif ($action == "aktif") {
            $is_success = $this->M_data->update_master('m_user_tbl', 'id_user', $id, array('aktif' => $aktif));
            if (!$is_success) {
                echo json_encode(array("status" => $aktif));
            } else {
                echo json_encode(array("status" => "FAILURE"));
            }
        }
    }

    public function show_user_manage() {
        $table          = 'm_user_tbl';
        $column_order   = array(null, 'nama', 'email', 'id_telegram', 'password', 'lvl', 'divisi', null, null); //set column field database for datatable orderable
        $column_search  = array('nama', 'email', 'id_telegram', 'lvl', 'divisi'); //set column field database for datatable searchable 
        $order          = array('id_user' => 'asc'); // default order 

        $list           = $this->M_data->get_datatables($table, $column_order, $column_search, $order);
        $data           = array();
        $no             = $_POST['start'];
        foreach ($list as $l) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $l->nama;
            $row[] = $l->email;
            $row[] = $l->id_telegram;
            $row[] = '';
            // $row[] = $l->password;
            $row[] = $l->lvl;
            $row[] = $l->divisi;
                    if($l->aktif == '1') {
                        $status='checked="checked"';
                    } else {
                        $status='';
                    }
            $row[] = '<input type="hidden" class="paramId" value="'.$l->id_user.'"><input onChange="aktif(this)" type="checkbox" '.$status.'>';
            // $row[] = '<input value="" type="checkbox" class="switch" data-on-text="On" data-off-text="Off" data-on-color="primary" data-off-color="default" checked="checked">';
            // $row[] = "test";
            $row[] = '<a class="text-primary" href="javascript:;" onClick="edit('."'".$l->id_user."'".', this)"><i class="fa fa-pencil"></i></a>
                      <a class="text-danger" href="javascript:;" onClick="del('."'".$l->id_user."'".', this)"><i class="fa fa-trash-o"></i></a>';


            $data[] = $row;
        }

        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsFiltered" => $this->M_data->count_filtered($table, $column_order, $column_search, $order),
                        "recordsTotal" => $this->M_data->count_all($table),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }

// Jenis Tarif
    function siswa() {
        $d['title']     = "Siswa";
        $d['page']      = 'dm_siswa';
        $d['judul']     = "Siswa";
        $d['menu']      = "Data Master";
        $d['submenu']   = "Siswa";
        $d['list_ta']      = $this->M_global->list_select3('m_ta_tbl')->result_array();
        $d['list_jenjang'] = $this->M_global->list_select('m_jenjang_tbl')->result_array();
        $d['list_jurusan'] = $this->M_global->list_select('m_jurusan_tbl')->result_array();
        $d['list_tingkat'] = $this->M_global->list_select3('m_tingkat_tbl')->result_array();        
        $d['list_kelas']   = $this->M_global->list_select6('m_kelas', 'urutan_kelas')->result_array();        
        $this->load->view('layout', $d);
    }

    public function siswa_detail($id) {
        $ls     = $this->M_data->get_master('v_siswa_tbl', 'id_siswa', $id);
        $data   = array();
            $data['nama']           = $ls['nama'];
            $data['nis']            = $ls['nis'];
            $data['nisn']           = $ls['nisn'];
            $data['teks_ta']        = $ls['teks_ta'];
            $data['jenjang']        = $ls['jenjang'];
            $data['kelas']          = $ls['tingkat']." ".$ls['jurusan']." ".$ls['urutan_kelas'];
            $data['status']         = $ls['status'];
            $data['agama']          = $ls['agama'];
            if ($ls['kelamin'] == "L") {
                $data['kelamin']    = "Laki-laki";
            } elseif ($ls['kelamin'] == "P") {
                $data['kelamin']    = "Perempuan";
            }
            $data['ttl']            = $ls['tempat_lahir'].", ".date('d F Y', strtotime($ls['tanggal_lahir']));
            $data['anak_ke']        = $ls['anak_ke']." dari ".$ls['jml_saudara']." bersaudara";
            $data['alamat']         = $ls['alamat'];
            $data['asal_sekolah']   = $ls['asal_sekolah'];
            $data['nama_ayah']      = $ls['nama_ayah'];
            $data['nama_wali']      = $ls['nama_wali'];
            $data['nama_ibu']       = $ls['nama_ibu'];
            $data['no_telp_ortu']   = $ls['no_telp_ortu'];
            $data['no_telp_wali']   = $ls['no_telp_wali'];
            $data['keterangan']     = $ls['keterangan'];

        echo json_encode($data);
    }    

    public function siswa_action($action) {

        $data = array();

        if ($action == "add") {
            $is_success = $this->M_data->insert_master('m_tarif_tbl', $data);
            if (!$is_success) {
                echo json_encode(array("status" => "SUCCESS"));
            } else {
                echo json_encode(array("status" => "FAILURE"));
            }
        } elseif ($action == "edit") {
            $is_success     = $this->M_data->update_master('m_tarif_tbl', 'id_tarif', $id_tarif, $data);
            if (!$is_success) {
                echo json_encode(array("status" => "SUCCESS"));
            } else {
                echo json_encode(array("status" => "FAILURE"));
            }
        } elseif ($action == "del") {
            $is_success = $this->M_data->update_master('m_tarif_nilai_tbl', 'id_tarif_nilai', $id, array('aktif' => $aktif));
            if (!$is_success) {
                echo json_encode(array("status" => "SUCCESS"));
            } else {
                echo json_encode(array("status" => "FAILURE"));
            }
        }

    }

    public function show_siswa() {
        $id_ta          = $this->input->post('id_ta');
        $id_jenjang     = $this->input->post('id_jenjang');
        $id_jurusan     = $this->input->post('id_jurusan');
        $tingkat        = $this->input->post('tingkat');
        $urutan_kelas   = $this->input->post('urutan_kelas');



        $table          = 'v_siswa_tbl';
        $column_order   = array(null, 'nama', 'nis', 'teks_ta', 'jenjang', 'jurusan', 'nm_kelas', 'id_status_siswa', null); //set column field database for datatable orderable
        $column_search  = array('nama', 'nis', 'teks_ta', 'jenjang', 'jurusan', 'nm_kelas', 'id_status_siswa'); //set column field database for datatable searchable 
        $order          = array('id_siswa' => 'asc'); // default order 

        $second_id      = array();
        if ($id_ta) {
            $second_id[]    = array('id_ta', $id_ta);
        }
        if ($id_jenjang) {
            $second_id[]    = array('id_jenjang', $id_jenjang);
        }        
        if ($id_jurusan) {
            $second_id[]    = array('id_jurusan', $id_jurusan);
        }        
        if ($tingkat) {
            $second_id[]    = array('id_tingkat', $tingkat);
        }        
        if ($urutan_kelas) {
            $second_id[]    = array('urutan_kelas', $urutan_kelas);
        }      

        $list           = $this->M_data->get_datatables($table, $column_order, $column_search, $order, $second_id);
        $data           = array();
        $no             = $_POST['start'];

        foreach ($list as $l) {
            $row = array();
            $no++;
            $row[] = $no;
            $row[] = $l->nama;
            $row[] = $l->nis;
            $row[] = $l->teks_ta;
            $row[] = $l->jenjang;
            $row[] = $l->jurusan;
            $row[] = $l->nm_kelas;
            $row[] = $l->id_status_siswa;
            $row[]  = '<a class="showDetail text-primary" data-id="'.$l->id_siswa.'" href="javascript:;" data-toggle="tooltip" title="Detaail" data-original-title="Detaail"><i class="fa fa-search-plus"></i></a>';

            $data[] = $row;
        }

        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsFiltered" => $this->M_data->count_filtered($table, $column_order, $column_search, $order, $second_id),
                        "recordsTotal" => $this->M_data->count_all($table, $second_id),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }    
    

    private function dm_delete($paramTable, $paramColumn, $paramId) {
        $action     = $this->M_data->delete_master($paramTable, $paramColumn, $paramId);
        if (!$action) {
            return "SUCCESS";
        } else {
            return "FAILURE";
        }
    }   

    private function list_ta() {
        $list           = $this->M_global->list_select('m_ta_tbl')->result_array();
            $header     = '<select style="height:100%;width:100%;" name="id_ta">';
            $data       = '';
            foreach ($list as $l) {
                $data   .= '<option value="'.$l['id_ta'].'">'.$l['teks_ta'].'</option>';
            }
            $footer     = '</select>';

        return $header.$data.$footer;
    }

    private function list_jenjang() {   
        $list           = $this->M_global->list_select('m_jenjang_tbl')->result_array();
            $header     = '<select style="height:100%;width:100%;" name="id_jenjang">';
            $data       = '';
            foreach ($list as $l) {
                $data   .= '<option value="'.$l['id_jenjang'].'">'.$l['jenjang'].'</option>';
            }
            $footer     = '</select>';

        return $header.$data.$footer;
    }    

    private function list_jurusan() {   
        $list           = $this->M_global->list_select('m_jurusan_tbl')->result_array();
            $header     = '<select style="height:100%;width:100%;" name="id_jurusan">';
            $data       = '';
            foreach ($list as $l) {
                $data   .= '<option value="'.$l['id_jurusan'].'">'.$l['jurusan'].'</option>';
            }
            $footer     = '</select>';

        return $header.$data.$footer;
    }

    private function list_tingkat() {   
        $list           = $this->M_global->list_select3('m_tingkat_tbl')->result_array();
            $header     = '<select style="height:100%;width:100%;" name="tingkat">';
            $data       = '';
            foreach ($list as $l) {
                $data   .= '<option value="'.$l['tingkat'].'">'.$l['tingkat'].'</option>';
            }
            $footer     = '</select>';

        return $header.$data.$footer;
    }    

    private function list_gelombang() {   
        $list           = $this->M_global->list_select('m_gelombang_tbl')->result_array();
            $header     = '<select style="height:100%;width:100%;" name="id_gelombang">';
            $data       = '';
            // var_dump($list);
            foreach ($list as $l) {
                $data   .= '<option value="'.$l['id_gelombang'].'">'.$l['gelombang'].'</option>';
            }
            $footer     = '</select>';

        return $header.$data.$footer;
    }

    // No Formulir psb
    function no_formulir_psb() {
        $d['title']     = "Nomor Formulir";
        $d['page']      = 'dm_no_formulir';
        $d['judul']     = "Nomor Formulir";
        $d['menu']      = "Data Master";
        $d['submenu']   = "No. Formulir";
        $this->load->view('layout', $d);
    }

    public function no_formulir_detail($id) {
        $detail = $this->M_data->get_master('m_no_formulir', 'id', $id);
        echo json_encode($detail);
    }

    public function no_formulir_action($action) {
        $id             = htmlentities($this->input->post('id'));
        $tahun_ajaran   = htmlentities($this->input->post('tahun_ajaran'));
        $infix          = htmlentities($this->input->post('infixy'));
        $prefix         = htmlentities($this->input->post('prefix'));
        $sufix          = htmlentities($this->input->post('sufix'));
        $count_start    = htmlentities($this->input->post('count_start'));
        // $tahun_mulai    = date('Y', strtotime($tahun_mulai_raw));
        // $tahun_selesai  = date('Y', strtotime($tahun_selesai_raw));

        $aktif          = htmlentities($this->input->post('aktif'));
       // $teks_ta        = $tahun_mulai." - ".$tahun_selesai;



        $data = array(
                'tahun_ajaran'   => $tahun_ajaran,
                'infix' => $infix,
                'prefix' => $prefix,
                'sufix'       => $sufix,
                'count_start' => $count_start
            );

        if ($action == "add") {
            $is_success = $this->M_data->insert_master('m_no_formulir', $data);
            if (!$is_success) {
                echo json_encode(array("status" => "SUCCESS"));
            } else {
                echo json_encode(array("status" => "FAILURE"));
            }
        } elseif ($action == "edit") {
            $is_success = $this->M_data->update_master('m_no_formulir', 'id', $id, $data);;
            if (!$is_success) {
                echo json_encode(array("status" => "SUCCESS"));
            } else {
                echo json_encode(array("status" => "FAILURE"));
            }
        } elseif ($action == "del") {
            $is_success = $this->M_data->delete_master('m_no_formulir', 'id', $id);
            if (!$is_success) {
                echo json_encode(array("status" => "SUCCESS"));
            } else {
                echo json_encode(array("status" => "FAILURE"));
            }
        } elseif ($action == "aktif") {
            $is_success = $this->M_data->update_master('m_no_formulir', 'id', $id, array('aktif' => $aktif));
            if (!$is_success) {
                echo json_encode(array("status" => $aktif));
            } else {
                echo json_encode(array("status" => "FAILURE"));
            }
        }
    }

    public function show_no_formulir() {
        $table          = 'm_no_formulir';
        $column_order   = array(null, 'tahun_ajaran', 'infix', 'prefix', 'count_start', null); //set column field database for datatable orderable
        $column_search  = array('tahun_ajaran', 'infix'); //set column field database for datatable searchable 
        $order          = array('tahun_ajaran' => 'asc'); // default order 

        $list           = $this->M_data->get_datatables($table, $column_order, $column_search, $order);
        $data           = array();
        $no             = $_POST['start'];
        foreach ($list as $l) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $l->tahun_ajaran;
            $row[] = $l->infix;
            $row[] = $l->prefix;
            $row[] = $l->sufix;
            $row[] = $l->count_start;
            // $row[] = '<input value="" type="checkbox" class="switch" data-on-text="On" data-off-text="Off" data-on-color="primary" data-off-color="default" checked="checked">';
            // $row[] = "test";
            $row[] = '<a class="text-primary" href="javascript:;" onClick="edit('."'".$l->id."'".', this)" data-toggle="tooltip" title="Ubah" data-original-title="Ubah"><i class="fa fa-edit"></i></a>&nbsp;
                      <a class="text-danger" href="javascript:;" onClick="del('."'".$l->id."'".', this)" data-toggle="tooltip" title="Hapus" data-original-title="Hapus"><i class="fa fa-trash-o"></i></a>';


            $data[] = $row;
        }

        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsFiltered" => $this->M_data->count_filtered($table, $column_order, $column_search, $order),
                        "recordsTotal" => $this->M_data->count_all($table),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }

    // public function list_ta() {
    //     $ta     = $this->M_global->list_select('m_ta_tbl')->result_array();
    //     $header = '<select style="height:100%;width:100%;" name="id_jenjang" class="list_ta">';
    //     $data   = '';
    //     foreach ($ta as $t) {
    //         $data   .= '<option value="'.$t['id_ta'].'">'.$t['teks_ta'].'</option>';
    //     }
    //     $footer = '</select>';

    //     echo json_encode($header.$data.$footer);
    // }
    // public function list_ta() {
    //     // strip tags may not be the best method for your project to apply extra layer of security but fits needs for this tutorial 
    //     // $search = strip_tags(trim($_GET['q']));
    //     $search = $this->input->get('term');
    //     $list   = $this->M_global->list_select2('m_ta_tbl', 'teks_ta', $search)->result_array();

    //     if(count($list) > 0){
    //        foreach ($list as $key => $value) {
    //         $data[] = array('id_ta' => $value['id_ta'], 'teks_ta' => $value['teks_ta']);                
    //        } 
    //     } else {
    //        $data[] = array('id_ta' => '', 'teks_ta' => 'Key words not found ..');
    //     }

    //     echo json_encode($data);
    // } 

    // public function list_jenjang() {
    //     // strip tags may not be the best method for your project to apply extra layer of security but fits needs for this tutorial 
    //     // $search = strip_tags(trim($_GET['q']));
    //     $search = $this->input->get('term');
    //     $list   = $this->M_global->list_select2('m_jenjang_tbl', 'jenjang', $search)->result_array();

    //     if(count($list) > 0){
    //        foreach ($list as $key => $value) {
    //         $data[] = array('id_jenjang' => $value['id_jenjang'], 'jenjang' => $value['jenjang']);                
    //        } 
    //     } else {
    //        $data[] = array('id_jenjang' => '', 'jenjang' => 'Key words not found ..');
    //     }

    //     echo json_encode($data);
    // } 

    function test_aja() {
        echo $this->session->userdata('test_var');
        echo $this->session->userdata('test_vars');
    }

    public function show_psb_siswa() {
        $id_ta          = $this->input->post('id_ta');
        $id_jenjang     = $this->input->post('id_jenjang');
        $id_jurusan     = $this->input->post('id_jurusan');
        $tahun          = date('Y');
            

        $table          = 'v_psb';
        $column_order   = array(null, 'no_formulir', 'nama', 'asal_sekolah', 'gelombang', 'jenjang', 'jurusan', 'tgl_input'); //set column field database for datatable orderable
        $column_search  = array('nama', 'gelombang', 'jenjang', 'jurusan'); //set column field database for datatable searchable 
        $order          = array('id_psb' => 'asc'); // default order 

        $second_id      = array();
        if ($id_ta) {
            $second_id[]    = array('id_ta', $id_ta);
        }
        if ($id_jenjang) {
            $second_id[]    = array('id_jenjang', $id_jenjang);
        }        
        if ($id_jurusan) {
            $second_id[]    = array('id_jurusan', $id_jurusan);
        }        
        if ($tahun) {
            $second_id[]    = array('tahun_mulai', $tahun);
        }
            


        $list           = $this->M_data->get_datatables($table, $column_order, $column_search, $order, $second_id);
        $data           = array();
        $no             = $_POST['start'];

        foreach ($list as $l) {
            $row = array();
            $no++;
            $row[] = $no;
            $row[] = $l->no_formulir;
            $row[] = $l->nama;
            $row[] = $l->asal_sekolah;
            $row[] = $l->gelombang;
            $row[] = $l->jenjang;
            $row[] = $l->jurusan;
            $row[] = $l->tgl_input;
           
            // $row[] = '';
            $row[]  = '<a class="showDetail text-primary" data-id="'.$l->id_psb.'" href="javascript:;" data-toggle="tooltip" title="Detaail" data-original-title="Detaail"><i class="fa fa-search-plus"></i></a>';

            $data[] = $row;
        }

        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsFiltered" => $this->M_data->count_filtered($table, $column_order, $column_search, $order, $second_id),
                        "recordsTotal" => $this->M_data->count_all($table, $second_id),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }   

    function sekolah(){
		$d['title']     = "Data Sekolah";
        $d['page']      = 'sekolah';
        $d['judul']     = "Data Sekolah";
        $d['menu']      = "Data Sekolah";
        $d['submenu']   = "Data Sekolah";
        $d['provinsi'] = $this->M_chained->ambil_provinsi();
	
        $this->load->view('layout', $d);
    }
    
    public function showSekolah(){
        $table          = 'm_sekolah';
		
        $column_order   = array(null, 'id_sekolah', 'nm_sekolah', null, null); 
        $column_search  = array('id_sekolah', 'nm_sekolah'); 
        $order          = array('id_sekolah' => 'asc');

        $list_data   	= $this->M_admin->get_datatables($table, $column_order, $column_search, $order);
        $data           = array();
        $no             = $_POST['start'];
        foreach ($list_data as $ld) {
        	$status 	= $ld->aktif;

            if ($status == 1) {
				$html_stat 	= '<input class="action" data-action="aktif" data-id_sekolah="'.$ld->id_sekolah.'" 
								type="checkbox" id="lbl-'.$ld->nm_sekolah.'" checked switch="none" >
                                    <label for="lbl-'.$ld->id_sekolah.'" data-on-label="On" data-off-label="Off"></label>';
        	} else {
				$html_stat 	= '<input class="action" data-action="aktif" data-id_sekolah="'.$ld->id_sekolah.'" 
								type="checkbox" id="lbl-'.$ld->nm_sekolah.'" switch="none" >
									<label for="lbl-'.$ld->id_sekolah.'" data-on-label="On" data-off-label="Off"></label>';
        	}

            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $ld->nm_sekolah;
            $row[] = $html_stat;
            $row[] = '&nbsp;<button 
                                type="button" data-id="'.$ld->id_sekolah.'" data-action="edit" 
                                class="action btn btn-xs btn-icon waves-effect btn-info m-b-5 tooltip-hover tooltipstered"
                                title="Ubah"> <i class="fa fa-pencil"></i> 
                        </button>
                        &nbsp;<button 
                                type="button" data-id="'.$ld->id_sekolah.'" data-master="m_sekolah" data-col="id_sekolah" data-action="delete" 
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


    function sekolahAction($action){
        if($action == 'aktif'){

            $response = $this->actionActiveHandler('id_sekolah', 'm_sekolah');

        }elseif($action == 'add'){
            $id_sekolah     =   $this->input->post('id_sekolah');
            $nama_sekolah   =   $this->input->post('nama_sekolah');
            $alamat         =   $this->input->post('alamat');
            $provinsi_id    =   $this->input->post('provinsi_id');
            $kabupaten_id   =   $this->input->post('kabupaten_id');
            $kecamatan_id   =   $this->input->post('kecamatan_id');
            $kelurahan_id   =   $this->input->post('kelurahan_id');
            $email          =   $this->input->post('email');
            $kontak         =   $this->input->post('kontak');
            $no_kontak      =   $this->input->post('no_kontak');
    
            $data  = [
                'id_sekolah'    =>  $id_sekolah,
                'nm_sekolah'    =>  $nama_sekolah,
                'alamat'        =>  $alamat,
                'id_provinsi'   =>  $provinsi_id ,
                'id_kabupaten'  =>  $kabupaten_id,
                'id_kecamatan'  =>  $kecamatan_id,
                'id_kelurahan'  =>  $kelurahan_id,
                'email'         =>  $email,
                'kontak'        =>  $kontak,
                'no_kontak'     =>  $no_kontak,
            ];

            $insertUser =  $this->M_admin->insert_data('m_sekolah', $data);

            $response 	= ['status' => 'OKE'];

        }elseif($action == 'edit'){
            $id_sekolah     =   $this->input->post('id_sekolah');
            $nm_sekolah   =   $this->input->post('nm_sekolah');
            $alamat         =   $this->input->post('alamat');
            $provinsi_id    =   $this->input->post('provinsi_id');
            $kabupaten_id   =   $this->input->post('kabupaten_id');
            $kecamatan_id   =   $this->input->post('kecamatan_id');
            $kelurahan_id   =   $this->input->post('kelurahan_id');
            $email          =   $this->input->post('email');
            $no_kontak      =   $this->input->post('no_kontak');
        
            $data  = [
                'id_sekolah'    =>  $id_sekolah,
                'nm_sekolah'    =>  $nm_sekolah,
                'alamat'        =>  $alamat,
                'id_provinsi'   =>  $provinsi_id ,
                'id_kabupaten'  =>  $kabupaten_id,
                'id_kecamatan'  =>  $kecamatan_id,
                'id_kelurahan'  =>  $kelurahan_id,
                'email'         =>  $email,
                'no_kontak'     =>  $no_kontak,
            ];
			
            $response = $this->actionInsertUpdateHandler($data['id_sekolah'],'id_sekolah', $data, 'm_sekolah');
            
        }elseif($action == 'detail'){

            $id_sekolah = $this->input->post('id_sekolah');

			$condition 		= [];
			$condition[] 	= ['id_sekolah', $id_sekolah, 'where'];
			$response 		= $this->M_admin->get_master_spec('m_sekolah', 'id_sekolah, nm_sekolah, alamat, id_kelurahan, id_kecamatan, id_kabupaten, id_provinsi, no_kontak, email', $condition)->row_array();

			$response['sl_prov']    =   $this->M_core->getListSelectedDefNol('m_provinsi_tbl', 'aktif', 1, 'id_provinsi', $response['id_provinsi'], 'id_provinsi', 'nama_provinsi', '-- Pilih Provinsi --');
			$response['sl_kab']     =   $this->M_core->getSelectedOne('m_kabupaten_tbl', 'aktif', 1, 'id_kabupaten', $response['id_kabupaten'], 'id_kabupaten', 'nama_kabupaten', '-- Pilih Kabupaten --');
			$response['sl_kec']     =   $this->M_core->getSelectedOne('m_kecamatan_tbl', 'aktif', 1, 'id_kecamatan', $response['id_kecamatan'], 'id_kecamatan', 'nama_kecamatan', '-- Pilih Kecamatan --');
			$response['sl_kel']     =   $this->M_core->getSelectedOne('m_kelurahan_tbl', 'aktif', 1, 'id_kelurahan', $response['id_kelurahan'], 'id_kelurahan', 'nama_kelurahan', '-- Pilih Kelurahan --');
            
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
    
    function strategi(){
		$d['title']     = "Data Strategi";
        $d['page']      = 'strategi';
        $d['judul']     = "Data Strategi";
        $d['menu']      = "Data Strategi";
        $d['submenu']   = "Data Strategi";
       
        $this->load->view('layout', $d);
    }

    public function showStrategi(){
        $table          = 'm_strategi';
		
        $column_order   = array(null, 'kd_strategi', 'nm_strategi', 'keterangan', null, null); 
        $column_search  = array('kd_strategi', 'nm_strategi'); 
        $order          = array('id_strategi' => 'asc');

        $list_data   	= $this->M_admin->get_datatables($table, $column_order, $column_search, $order);
        $data           = array();
        $no             = $_POST['start'];
        foreach ($list_data as $ld) {
        	$status 	= $ld->aktif;

            if ($status == 1) {
				$html_stat 	= '<input class="action" data-action="aktif" data-id_strategi="'.$ld->id_strategi.'" 
								type="checkbox" id="lbl-'.$ld->nm_strategi.'" checked switch="none" >
                                    <label for="lbl-'.$ld->id_strategi.'" data-on-label="On" data-off-label="Off"></label>';
        	} else {
				$html_stat 	= '<input class="action" data-action="aktif" data-id_strategi="'.$ld->id_strategi.'" 
								type="checkbox" id="lbl-'.$ld->nm_strategi.'" switch="none" >
									<label for="lbl-'.$ld->id_strategi.'" data-on-label="On" data-off-label="Off"></label>';
        	}


            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $ld->kd_strategi;
            $row[] = $ld->nm_strategi;
            $row[] = $ld->keterangan;
            $row[] = $html_stat;
            $row[] = '&nbsp;<button 
                                type="button" data-id="'.$ld->id_strategi.'" data-action="edit" 
                                class="action btn btn-xs btn-icon waves-effect btn-info m-b-5 tooltip-hover tooltipstered"
                                title="Ubah"> <i class="fa fa-pencil"></i> 
                        </button>
                        &nbsp;<button 
                                type="button" data-id="'.$ld->id_strategi.'" data-master="m_strategi" data-col="id_strategi" data-action="delete" 
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

    function strategiAction($action){
        if($action == 'aktif'){

            $response = $this->actionActiveHandler('id_strategi', 'm_strategi');

        }elseif($action == 'add'){
            $id_strategi     =   $this->input->post('id_strategi');
            $kd_strategi     =   $this->input->post('kd_strategi');
            $nm_strategi     =   $this->input->post('nm_strategi');
            $keterangan      =   $this->input->post('keterangan');
            
    
            $data  = [
                'id_strategi'    =>  $id_strategi,
                'kd_strategi'    =>  $kd_strategi,
                'nm_strategi'    =>  $nm_strategi,
                'keterangan'        =>  $keterangan
            ];

            $insertUser =  $this->M_admin->insert_data('m_strategi', $data);

            $response 	= ['status' => 'OKE'];

        }elseif($action == 'edit'){
            $id_strategi     =   $this->input->post('id_strategi');
            $kd_strategi     =   $this->input->post('kd_strategi');
            $nm_strategi     =   $this->input->post('nm_strategi');
            $keterangan      =   $this->input->post('keterangan');
    
            $data  = [
                'id_strategi'    =>  $id_strategi,
                'kd_strategi'    =>  $kd_strategi,
                'nm_strategi'    =>  $nm_strategi,
                'keterangan'        =>  $keterangan
            ];

			
            $response = $this->actionInsertUpdateHandler($data['id_strategi'],'id_strategi', $data, 'm_strategi');
            
        }elseif($action == 'detail'){

            $id_strategi = $this->input->post('id_strategi');

			$condition 		= [];
			$condition[] 	= ['id_strategi', $id_strategi, 'where'];
			$response 		= $this->M_admin->get_master_spec('m_strategi', 'id_strategi, nm_strategi, kd_strategi, keterangan', $condition)->row_array();

			   
        }

        echo json_encode($response);
    }
    
    function identitas(){
		$d['title']     = "Data Identitas";
        $d['page']      = 'identitas';
        $d['judul']     = "Data Identitas";
        $d['menu']      = "Data Identitas";
        $d['submenu']   = "Data Identitas";
      
        $this->load->view('layout', $d);
    }

    public function showIdentitas(){
        $table          = 'm_identitas';
		
        $column_order   = array(null, 'nm_identitas', 'keterangan', null, null); 
        $column_search  = array('nm_identitas'); 
        $order          = array('id_identitas' => 'asc');

        $list_data   	= $this->M_admin->get_datatables($table, $column_order, $column_search, $order);
        $data           = array();
        $no             = $_POST['start'];
        foreach ($list_data as $ld) {
        	$status 	= $ld->aktif;

            if ($status == 1) {
				$html_stat 	= '<input class="action" data-action="aktif" data-id_identitas="'.$ld->id_identitas.'" 
								type="checkbox" id="lbl-'.$ld->nm_identitas.'" checked switch="none" >
                                    <label for="lbl-'.$ld->id_identitas.'" data-on-label="On" data-off-label="Off"></label>';
        	} else {
				$html_stat 	= '<input class="action" data-action="aktif" data-id_identitas="'.$ld->id_identitas.'" 
								type="checkbox" id="lbl-'.$ld->nm_identitas.'" switch="none" >
									<label for="lbl-'.$ld->id_identitas.'" data-on-label="On" data-off-label="Off"></label>';
        	}

            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $ld->nm_identitas;
            $row[] = $ld->keterangan;
            $row[] = $html_stat;
            $row[] = '&nbsp;<button 
                                type="button" data-id="'.$ld->id_identitas.'" data-action="edit" 
                                class="action btn btn-xs btn-icon waves-effect btn-info m-b-5 tooltip-hover tooltipstered"
                                title="Ubah"> <i class="fa fa-pencil"></i> 
                        </button>
                        &nbsp;<button 
                                type="button" data-id="'.$ld->id_identitas.'" data-master="m_identitas" data-col="id_identitas" data-action="delete" 
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


    function identitasAction($action){
        if($action == 'aktif'){

            $response = $this->actionActiveHandler('id_identitas', 'm_identitas');

        }elseif($action == 'add'){
            $id_identitas     =   $this->input->post('id_identitas');
            $nm_identitas     =   $this->input->post('nm_identitas');
            $keterangan      =   $this->input->post('keterangan');
            
    
            $data  = [
                'id_identitas'    =>  $id_identitas,
                'nm_identitas'    =>  $nm_identitas,
                'keterangan'        =>  $keterangan
            ];

            $insertUser =  $this->M_admin->insert_data('m_identitas', $data);

            $response 	= ['status' => 'OKE'];

        }elseif($action == 'edit'){
            $id_identitas     =   $this->input->post('id_identitas');
            $nm_identitas     =   $this->input->post('nm_identitas');
            $keterangan      =   $this->input->post('keterangan');
    
            $data  = [
                'id_identitas'    =>  $id_identitas,
                'nm_identitas'    =>  $nm_identitas,
                'keterangan'        =>  $keterangan
            ];

			
            $response = $this->actionInsertUpdateHandler($data['id_identitas'],'id_identitas', $data, 'm_identitas');
            
        }elseif($action == 'detail'){

            $id_identitas = $this->input->post('id_identitas');

			$condition 		= [];
			$condition[] 	= ['id_identitas', $id_identitas, 'where'];
			$response 		= $this->M_admin->get_master_spec('m_identitas', 'id_identitas, nm_identitas, keterangan', $condition)->row_array();

			   
        }

        echo json_encode($response);
    }

    
    
    function mapel(){
		$d['title']     = "Data Matapelajaran";
        $d['page']      = 'mapel';
        $d['judul']     = "Data Matapelajaran";
        $d['menu']      = "Data Matapelajaran";
        $d['submenu']   = "Data Matapelajaran";
      
        $this->load->view('layout', $d);
    }

    public function showMapel(){
        $table          = 'm_mapel';
		
        $column_order   = array(null, 'nm_mapel', 'keterangan', null, null); 
        $column_search  = array('nm_mapel'); 
        $order          = array('id_mapel' => 'asc');

        $list_data   	= $this->M_admin->get_datatables($table, $column_order, $column_search, $order);
        $data           = array();
        $no             = $_POST['start'];
        foreach ($list_data as $ld) {
        	$status 	= $ld->aktif;

            if ($status == 1) {
				$html_stat 	= '<input class="action kuy" data-action="aktif" data-id_mapel="'.$ld->id_mapel.'" 
								type="checkbox" id="lbl-'.$ld->nm_mapel.'" checked switch="none" >';
        	} else {
				$html_stat 	= '<input class="action kuy" data-action="aktif" data-id_mapel="'.$ld->id_mapel.'" 
								type="checkbox" id="lbl-'.$ld->nm_mapel.'" switch="none" >';
        	}

            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $ld->nm_mapel;
            $row[] = $ld->keterangan;
            $row[] = $html_stat;
            $row[] = '&nbsp;<button 
                                type="button" data-id="'.$ld->id_mapel.'" data-action="edit" 
                                class="action btn btn-xs btn-icon waves-effect btn-info m-b-5 tooltip-hover tooltipstered"
                                title="Ubah"> <i class="fa fa-pencil"></i> 
                        </button>
                        &nbsp;<button 
                                type="button" data-id="'.$ld->id_mapel.'" data-master="m_mapel" data-col="id_mapel" data-action="delete" 
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

    function mapelAction($action){
        if($action == 'aktif'){

            $response = $this->actionActiveHandler('id_mapel', 'm_mapel');

        }elseif($action == 'add'){
            $id_mapel     =   $this->input->post('id_mapel');
            $nm_mapel     =   $this->input->post('nm_mapel');
            $keterangan      =   $this->input->post('keterangan');
            
    
            $data  = [
                'id_mapel'    =>  $id_mapel,
                'nm_mapel'    =>  $nm_mapel,
                'keterangan'        =>  $keterangan
            ];

            $insertUser =  $this->M_admin->insert_data('m_mapel', $data);

            $response 	= ['status' => 'OKE'];

        }elseif($action == 'edit'){
            $id_mapel     =   $this->input->post('id_mapel');
            $nm_mapel     =   $this->input->post('nm_mapel');
            $keterangan   =   $this->input->post('keterangan');
    
            $data  = [
                'id_mapel'    =>  $id_mapel,
                'nm_mapel'    =>  $nm_mapel,
                'keterangan'        =>  $keterangan
            ];

            $response = $this->actionInsertUpdateHandler($data['id_mapel'],'id_mapel', $data, 'm_mapel');
            
        }elseif($action == 'detail'){

            $id_mapel = $this->input->post('id_mapel');

			$condition 		= [];
			$condition[] 	= ['id_mapel', $id_mapel, 'where'];
			$response 		= $this->M_admin->get_master_spec('m_mapel', 'id_mapel, nm_mapel, keterangan', $condition)->row_array();

			   
        }

        echo json_encode($response);
    }

    function rubrik(){
		$d['title']     = "Data Rubrik";
        $d['page']      = 'rubrik';
        $d['judul']     = "Data Rubrik";
        $d['menu']      = "Data Rubrik";
        $d['submenu']   = "Data Rubrik";
        $d['strategi']  = $this->M_core->getListSelectDefNol('m_strategi', 'aktif', 1, 'id_strategi', 'nm_strategi', '-- Pilih Strategi --');
        $this->load->view('layout', $d);
    }

    public function showRubrik(){
        $table          = 'v_rubrik_strategi';
		
        $column_order   = array(null, 'nm_strategi', 'nm_rubrik', 'kriteria', 'bobot', 'banyak_nilai', null, null); 
        $column_search  = array('nm_strategi', 'nm_rubrik', 'kriteria', 'bobot', 'banyak_nilai'); 
        $order          = array('id_rubrik' => 'asc');

        $list_data   	= $this->M_admin->get_datatables($table, $column_order, $column_search, $order);
        $data           = array();
        $no             = $_POST['start'];
        foreach ($list_data as $ld) {
        	$status 	= $ld->aktif;

            if ($status == 1) {
				$html_stat 	= '<input class="action" data-action="aktif" data-id_rubrik="'.$ld->id_rubrik.'" 
								type="checkbox" id="lbl-'.$ld->nm_rubrik.'" checked switch="none" >
                                    <label for="lbl-'.$ld->id_rubrik.'" data-on-label="On" data-off-label="Off"></label>';
        	} else {
				$html_stat 	= '<input class="action" data-action="aktif" data-id_rubrik="'.$ld->id_rubrik.'" 
								type="checkbox" id="lbl-'.$ld->nm_rubrik.'" switch="none" >
									<label for="lbl-'.$ld->id_rubrik.'" data-on-label="On" data-off-label="Off"></label>';
        	}

            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $ld->nm_strategi;
            $row[] = $ld->nm_rubrik;
            $row[] = $ld->kriteria;
            $row[] = $ld->bobot;
            $row[] = $html_stat;
            $row[] = '&nbsp;<button 
                                type="button" data-id="'.$ld->id_rubrik.'" data-action="edit" 
                                class="action btn btn-xs btn-icon waves-effect btn-info m-b-5 tooltip-hover tooltipstered"
                                title="Ubah"> <i class="fa fa-pencil"></i> 
                        </button>
                        &nbsp;<button 
                                type="button" data-id="'.$ld->id_rubrik.'" data-master="m_rubrik" data-col="id_rubrik" data-action="delete" 
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

    function rubrikAction($action){
        if($action == 'aktif'){

            $response = $this->actionActiveHandler('id_rubrik', 'm_rubrik');

        }elseif($action == 'add'){
            $id_rubrik      =   $this->input->post('id_rubrik');
            $nm_rubrik      =   $this->input->post('nm_rubrik');
            $id_strategi    =   $this->input->post('id_strategi');
            $kriteria       =   $this->input->post('kriteria');
            $bobot          =   $this->input->post('bobot');
            $banyak_nilai   =   $this->input->post('banyak_nilai');
            
    
            $data  = [
                'id_rubrik'     =>  $id_rubrik,
                'nm_rubrik'     =>  $nm_rubrik,
                'id_strategi'   =>  $id_strategi,
                'kriteria'      =>  $kriteria,
                'bobot'         =>  $bobot,
                'banyak_nilai'  =>  $banyak_nilai,
            ];

            $insertUser =  $this->M_admin->insert_data('m_rubrik', $data);

            $response 	= ['status' => 'OKE'];

        }elseif($action == 'edit'){
            $id_rubrik      =   $this->input->post('id_rubrik');
            $nm_rubrik      =   $this->input->post('nm_rubrik');
            $id_strategi    =   $this->input->post('id_strategi');
            $kriteria       =   $this->input->post('kriteria');
            $bobot          =   $this->input->post('bobot');
            $banyak_nilai   =   $this->input->post('banyak_nilai');
    
            $data  = [
                'id_rubrik'     =>  $id_rubrik,
                'nm_rubrik'     =>  $nm_rubrik,
                'id_strategi'   =>  $id_strategi,
                'kriteria'      =>  $kriteria,
                'bobot'         =>  $bobot,
                'banyak_nilai'  =>  $banyak_nilai,
            ];


            $response = $this->actionInsertUpdateHandler($data['id_rubrik'],'id_rubrik', $data, 'm_rubrik');
            
        }elseif($action == 'detail'){

            $id_rubrik = $this->input->post('id_rubrik');

			$condition 		= [];
			$condition[] 	= ['id_rubrik', $id_rubrik, 'where'];
			$response 		= $this->M_admin->get_master_spec('m_rubrik', 'id_rubrik, nm_rubrik, id_strategi, bobot, banyak_nilai, kriteria', $condition)->row_array();
            $response['sl_strategi']    =   $this->M_core->getListSelectedDefNol('m_strategi', 'aktif', 1, 'id_strategi', $response['id_strategi'], 'id_strategi', 'nm_strategi', '-- Pilih Strategi --');
			   
        }

        echo json_encode($response);
    }


    function nilai_rubrik(){
		$d['title']     = "Data Nilai Rubrik";
        $d['page']      = 'nilai_rubrik';
        $d['judul']     = "Data Nilai Rubrik";
        $d['menu']      = "Data Nilai Rubrik";
        $d['submenu']   = "Data Nilai Rubrik";
        $d['rubrik']  = $this->M_core->getListSelectDefNol('m_rubrik', 'aktif', 1, 'id_rubrik', 'nm_rubrik', '-- Pilih Rubrik --');
        $this->load->view('layout', $d);
    }


    public function showNilaiRubrik(){
        $table          = 'v_nilai_rubrik';
		
        $column_order   = array(null, 'nm_rubrik', 'nilai', 'indikasi', null, null); 
        $column_search  = array('nm_rubrik', 'nilai', 'indikasi'); 
        $order          = array('id_nilai_rubrik' => 'asc');

        $list_data   	= $this->M_admin->get_datatables($table, $column_order, $column_search, $order);
        $data           = array();
        $no             = $_POST['start'];
        foreach ($list_data as $ld) {
        	$status 	= $ld->aktif;

            if ($status == 1) {
				$html_stat 	= '<input class="action" data-action="aktif" data-id_nilai_rubrik="'.$ld->id_nilai_rubrik.'" 
								type="checkbox" id="lbl-'.$ld->nm_rubrik.'" checked switch="none" >
                                    <label for="lbl-'.$ld->id_nilai_rubrik.'" data-on-label="On" data-off-label="Off"></label>';
        	} else {
				$html_stat 	= '<input class="action" data-action="aktif" data-id_nilai_rubrik="'.$ld->id_nilai_rubrik.'" 
								type="checkbox" id="lbl-'.$ld->nm_rubrik.'" switch="none" >
									<label for="lbl-'.$ld->id_rubrik.'" data-on-label="On" data-off-label="Off"></label>';
        	}

            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $ld->nm_rubrik;
            $row[] = $ld->nilai;
            $row[] = $ld->indikasi;
            $row[] = $html_stat;
            $row[] = '&nbsp;<button 
                                type="button" data-id="'.$ld->id_nilai_rubrik.'" data-action="edit" 
                                class="action btn btn-xs btn-icon waves-effect btn-info m-b-5 tooltip-hover tooltipstered"
                                title="Ubah"> <i class="fa fa-pencil"></i> 
                        </button>
                        &nbsp;<button 
                                type="button" data-id="'.$ld->id_nilai_rubrik.'" data-master="m_nilai_rubrik" data-col="id_nilai_rubrik" data-action="delete" 
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

    function nilaiRubrikAction($action){
        if($action == 'aktif'){

            $response = $this->actionActiveHandler('id_rubrik', 'm_rubrik');

        }elseif($action == 'add'){
            $id_nilai_rubrik    =   $this->input->post('id_nilai_rubrik');
            $id_rubrik          =   $this->input->post('id_rubrik');
            $nilai              =   $this->input->post('nilai');
            $indikasi           =   $this->input->post('indikasi');
    
            $data  = [
                'id_nilai_rubrik'   =>  $id_nilai_rubrik,
                'id_rubrik'         =>  $id_rubrik,
                'nilai'             =>  $nilai,
                'indikasi'          =>  $indikasi,
            ];

            $insertUser =  $this->M_admin->insert_data('m_nilai_rubrik', $data);

            $response 	= ['status' => 'OKE'];

        }elseif($action == 'edit'){
            $id_nilai_rubrik    =   $this->input->post('id_nilai_rubrik');
            $id_rubrik          =   $this->input->post('id_rubrik');
            $nilai              =   $this->input->post('nilai');
            $indikasi           =   $this->input->post('indikasi');
    
            $data  = [
                'id_nilai_rubrik'   =>  $id_nilai_rubrik,
                'id_rubrik'         =>  $id_rubrik,
                'nilai'             =>  $nilai,
                'indikasi'          =>  $indikasi,
            ];


            $response = $this->actionInsertUpdateHandler($data['id_nilai_rubrik'],'id_nilai_rubrik', $data, 'm_nilai_rubrik');
            
        }elseif($action == 'detail'){

            $id_rubrik = $this->input->post('id_rubrik');

			$condition 		= [];
			$condition[] 	= ['id_rubrik', $id_rubrik, 'where'];
			$response 		= $this->M_admin->get_master_spec('m_nilai_rubrik', 'id_nilai_rubrik, id_rubrik, nilai, indikasi', $condition)->row_array();
            $response['sl_rubrik']    =   $this->M_core->getListSelectedDefNol('m_rubrik', 'aktif', 1, 'id_rubrik', $response['id_rubrik'], 'id_rubrik', 'nm_rubrik', '-- Pilih Rubrik --');
			   
        }

        echo json_encode($response);
    }

    function guru(){
		$d['title']     = "Data Guru";
        $d['page']      = 'guru';
        $d['judul']     = "Data Guru";
        $d['menu']      = "Data Guru";
        $d['submenu']   = "Data Guru";
        $d['gender']    = $this->M_core->getListSelectDefNol('m_gender', 'aktif', 1, 'id_gender', 'gender', '-- Pilih Gender --');
        $d['sekolah']   = $this->M_core->getListSelectDefNol('m_sekolah', 'aktif', 1, 'id_sekolah', 'nm_sekolah', '-- Pilih Sekolah --');
        $d['provinsi']   = $this->M_core->getListSelectDefNol('m_provinsi_tbl', 'aktif', 1, 'id_provinsi', 'nama_provinsi', '-- Pilih Provinsi --');
        $this->load->view('layout', $d);
    }

    public function showGuru(){
        $table          = 'v_guru';
		
        $column_order   = array(null, 'nm_sekolah', 'nign', 'nm_guru', null, null); 
        $column_search  = array('nm_sekolah', 'nign', 'nm_guru'); 
        $order          = array('id_guru' => 'asc');

        $list_data   	= $this->M_admin->get_datatables($table, $column_order, $column_search, $order);
        $data           = array();
        $no             = $_POST['start'];
        foreach ($list_data as $ld) {
        	$status 	= $ld->aktif;

            if ($status == 1) {
				$html_stat 	= '<input class="action" data-action="aktif" data-id_guru="'.$ld->id_guru.'" 
								type="checkbox" id="lbl-'.$ld->nm_guru.'" checked switch="none" >
                                    <label for="lbl-'.$ld->id_guru.'" data-on-label="On" data-off-label="Off"></label>';
        	} else {
				$html_stat 	= '<input class="action" data-action="aktif" data-id_guru="'.$ld->id_guru.'" 
								type="checkbox" id="lbl-'.$ld->nm_guru.'" switch="none" >
									<label for="lbl-'.$ld->id_rubrik.'" data-on-label="On" data-off-label="Off"></label>';
        	}

            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $ld->nm_sekolah;
            $row[] = $ld->nign;
            $row[] = $ld->nm_guru;
            $row[] = $html_stat;
            $row[] = '&nbsp;<button 
                                type="button" data-id="'.$ld->id_guru.'" data-action="edit" 
                                class="action btn btn-xs btn-icon waves-effect btn-info m-b-5 tooltip-hover tooltipstered"
                                title="Ubah"> <i class="fa fa-pencil"></i> 
                        </button>
                        &nbsp;<button 
                                type="button" data-id="'.$ld->id_guru.'" data-master="m_guru" data-col="id_guru" data-action="delete" 
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

    function guruAction($action){
        if($action == 'aktif'){

            $response = $this->actionActiveHandler('id_guru', 'm_guru');

        }elseif($action == 'add'){
            $id_guru        =   $this->input->post('id_guru');
            $nm_guru        =   $this->input->post('nm_guru');
            $nign           =   $this->input->post('nign');
            $id_gender      =   $this->input->post('id_gender');
            $id_sekolah     =   $this->input->post('id_sekolah');
            $motto          =   $this->input->post('motto');
            $email          =   $this->input->post('email');
            $alamat         =   $this->input->post('alamat');
            $no_hp          =   $this->input->post('no_hp');
            $tgl_lahir      =   $this->input->post('tgl_lahir');
            $tempat_lahir      =   $this->input->post('tempat_lahir');
            $provinsi_id    =   $this->input->post('provinsi_id');
            $kabupaten_id   =   $this->input->post('kabupaten_id');
            $kecamatan_id   =   $this->input->post('kecamatan_id');
            $kelurahan_id   =   $this->input->post('kelurahan_id');


            $dataFile = $this->M_admin->uploadFileHandler('/berkas/foto_guru', 'foto', 'png|jpg|jpeg', '8000');
           
    
            $dataGuru = [
                'nm_guru'       =>  $nm_guru,
                'nign'		    =>  $nign,
                'id_gender'	    =>  $id_gender,
                'id_sekolah'	=>  $id_sekolah,
                'motto'		    =>  $motto,
                'email'         =>  $email,
                'alamat'        =>  $alamat,
                'no_hp'         =>  $no_hp,
                'tempat_lahir'  =>  $tempat_lahir,
                'tgl_lahir'     =>  date('Y-m-d', strtotime($tgl_lahir)),
                'foto_name'     =>  $dataFile['file_asli'][0],
                'foto_hash'     =>  $dataFile['file_hash'][0],
                'foto_locate'   =>  $dataFile['file_lokasi'][0],
                'id_guru'       =>  $id_guru,
                'id_provinsi'   =>  $provinsi_id ,
                'id_kabupaten'  =>  $kabupaten_id,
                'id_kecamatan'  =>  $kecamatan_id,
                'id_kelurahan'  =>  $kelurahan_id
            ];
            $dataGuruNonFile = [
                'nm_guru'       =>  $nm_guru,
                'nign'		    =>  $nign,
                'id_gender'	    =>  $id_gender,
                'id_sekolah'	=>  $id_sekolah,
                'motto'		    =>  $motto,
                'tempat_lahir'  =>  $tempat_lahir,
                'email'         =>  $email,
                'alamat'        =>  $alamat,
                'no_hp'         =>  $no_hp,
                'tgl_lahir'     =>  date('Y-m-d', strtotime($tgl_lahir)),
                'id_guru'       =>  $id_guru,
                'id_provinsi'   =>  $provinsi_id ,
                'id_kabupaten'  =>  $kabupaten_id,
                'id_kecamatan'  =>  $kecamatan_id,
                'id_kelurahan'  =>  $kelurahan_id
            ];
            
            if($dataFile['file_asli'][0] == '' || $dataFile['file_hash'][0] == ''){
                $data = $dataGuruNonFile;
            }else{
                $data = $dataGuru;
            }

            // var_dump($data);
            // die();
        
            $insertGuru =  $this->M_admin->insert_data('m_guru', $data);

            $response 	= ['status' => 'OKE'];

        }elseif($action == 'edit'){
            $id_guru        =   $this->input->post('id_guru');
            $nm_guru        =   $this->input->post('nm_guru');
            $nign           =   $this->input->post('nign');
            $id_gender      =   $this->input->post('id_gender');
            $id_sekolah     =   $this->input->post('id_sekolah');
            $motto          =   $this->input->post('motto');
            $email          =   $this->input->post('email');
            $alamat         =   $this->input->post('alamat');
            $no_hp          =   $this->input->post('no_hp');
            $tgl_lahir      =   $this->input->post('tgl_lahir');
            $tempat_lahir   =   $this->input->post('tempat_lahir');
            $provinsi_id    =   $this->input->post('provinsi_id');
            $kabupaten_id   =   $this->input->post('kabupaten_id');
            $kecamatan_id   =   $this->input->post('kecamatan_id');
            $kelurahan_id   =   $this->input->post('kelurahan_id');


            $dataFile = $this->M_admin->uploadFileHandler('/berkas/foto_guru', 'foto', 'png|jpg|jpeg', '8000');
           
    
            $dataGuru = [
                'nm_guru'       =>  $nm_guru,
                'nign'		    =>  $nign,
                'id_gender'	    =>  $id_gender,
                'id_sekolah'	=>  $id_sekolah,
                'motto'		    =>  $motto,
                'email'         =>  $email,
                'alamat'        =>  $alamat,
                'no_hp'         =>  $no_hp,
                'tempat_lahir'  =>  $tempat_lahir,
                'tgl_lahir'     =>  date('Y-m-d', strtotime($tgl_lahir)),
                'foto_name'     =>  $dataFile['file_asli'][0],
                'foto_hash'     =>  $dataFile['file_hash'][0],
                'foto_locate'   =>  $dataFile['file_lokasi'][0],
                'id_guru'       =>  $id_guru,
                'id_provinsi'   =>  $provinsi_id ,
                'id_kabupaten'  =>  $kabupaten_id,
                'id_kecamatan'  =>  $kecamatan_id,
                'id_kelurahan'  =>  $kelurahan_id
            ];
            $dataGuruNonFile = [
                'nm_guru'       =>  $nm_guru,
                'nign'		    =>  $nign,
                'id_gender'	    =>  $id_gender,
                'id_sekolah'	=>  $id_sekolah,
                'motto'		    =>  $motto,
                'email'         =>  $email,
                'alamat'        =>  $alamat,
                'tempat_lahir'  =>  $tempat_lahir,
                'no_hp'         =>  $no_hp,
                'tgl_lahir'     =>  date('Y-m-d', strtotime($tgl_lahir)),
                'id_guru'       =>  $id_guru,
                'id_provinsi'   =>  $provinsi_id ,
                'id_kabupaten'  =>  $kabupaten_id,
                'id_kecamatan'  =>  $kecamatan_id,
                'id_kelurahan'  =>  $kelurahan_id
            ];
            
            if($dataFile['file_asli'][0] == '' || $dataFile['file_hash'][0] == ''){
                $data = $dataGuruNonFile;
            }else{
                $data = $dataGuru;
            }

            $response = $this->actionInsertUpdateHandler($data['id_guru'],'id_guru', $data, 'm_guru');
            
        }elseif($action == 'detail'){

            $id_guru = $this->input->post('id_guru');

			$condition 		        =   [];
			$condition[] 	        =   ['id_guru', $id_guru, 'where'];
			$response 		        =   $this->M_admin->get_master_spec('m_guru', '*', $condition)->row_array();
            $response['sl_gender']  =   $this->M_core->getListSelectedDefNol('m_gender', 'aktif', 1, 'id_gender', $response['id_gender'], 'id_gender', 'gender', '-- Pilih Gender --');
            $response['sl_sekolah'] =   $this->M_core->getListSelectedDefNol('m_sekolah', 'aktif', 1, 'id_sekolah', $response['id_sekolah'], 'id_sekolah', 'nm_sekolah', '-- Pilih Gender --');
            $response['sl_prov']    =   $this->M_core->getListSelectedDefNol('m_provinsi_tbl', 'aktif', 1, 'id_provinsi', $response['id_provinsi'], 'id_provinsi', 'nama_provinsi', '-- Pilih Provinsi --');
			$response['sl_kab']     =   $this->M_core->getSelectedOne('m_kabupaten_tbl', 'aktif', 1, 'id_kabupaten', $response['id_kabupaten'], 'id_kabupaten', 'nama_kabupaten', '-- Pilih Kabupaten --');
			$response['sl_kec']     =   $this->M_core->getSelectedOne('m_kecamatan_tbl', 'aktif', 1, 'id_kecamatan', $response['id_kecamatan'], 'id_kecamatan', 'nama_kecamatan', '-- Pilih Kecamatan --');
			$response['sl_kel']     =   $this->M_core->getSelectedOne('m_kelurahan_tbl', 'aktif', 1, 'id_kelurahan', $response['id_kelurahan'], 'id_kelurahan', 'nama_kelurahan', '-- Pilih Kelurahan --');
        }

        echo json_encode($response);
    }

    function tingkat() {
        $d['title']     = "Tingkat";
        $d['page']      = 'dm_tingkat';
        $d['judul']     = "Tingkat";
        $d['menu']      = "Data Master";
        $d['submenu']   = "Tingkat";
        $this->load->view('layout', $d);
    }

    public function showTingkat(){
        $table          = 'm_tingkat_tbl';
		
        $column_order   = array(null, 'tingkat', null, null); 
        $column_search  = array('tingkat'); 
        $order          = array('id_tingkat' => 'asc');

        $list_data   	= $this->M_admin->get_datatables($table, $column_order, $column_search, $order);
        $data           = array();
        $no             = $_POST['start'];
        foreach ($list_data as $ld) {
        	$status 	= $ld->aktif;

            if ($status == 1) {
				$html_stat 	= '<input class="action" data-action="aktif" data-id_tingkat="'.$ld->id_tingkat.'" 
								type="checkbox" id="lbl-'.$ld->tingkat.'" checked switch="none" >
                                    <label for="lbl-'.$ld->id_tingkat.'" data-on-label="On" data-off-label="Off"></label>';
        	} else {
				$html_stat 	= '<input class="action" data-action="aktif" data-id_tingkat="'.$ld->id_tingkat.'" 
								type="checkbox" id="lbl-'.$ld->tingkat.'" switch="none" >
									<label for="lbl-'.$ld->id_rubrik.'" data-on-label="On" data-off-label="Off"></label>';
        	}

            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $ld->tingkat;
            $row[] = $html_stat;
            $row[] = '&nbsp;<button 
                                type="button" data-id="'.$ld->id_tingkat.'" data-action="edit" 
                                class="action btn btn-xs btn-icon waves-effect btn-info m-b-5 tooltip-hover tooltipstered"
                                title="Ubah"> <i class="fa fa-pencil"></i> 
                        </button>
                        &nbsp;<button 
                                type="button" data-id="'.$ld->id_tingkat.'" data-master="m_tingkat_tbl" data-col="id_tingkat" data-action="delete" 
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
    
    function tingkatAction($action){
        if($action == 'aktif'){

            $response = $this->actionActiveHandler('id_tingkat', 'm_tingkat_tbl');

        }elseif($action == 'add'){
            $id_tingkat  =   $this->input->post('id_tingkat');
            $tingkat     =   $this->input->post('tingkat');
        
            $data  = [
                'id_tingkat'   =>  $id_tingkat,
                'tingkat'    =>  $tingkat,
            ];
         
            $insertUser =  $this->M_admin->insert_data('m_tingkat_tbl', $data);

            $response 	= ['status' => 'OKE'];

        }elseif($action == 'edit'){
            $id_tingkat  =   $this->input->post('id_tingkat');
            $tingkat     =   $this->input->post('tingkat');
        
            $data  = [
                'id_tingkat'   =>  $id_tingkat,
                'tingkat'    =>  $tingkat,
            ];
            
            $response = $this->actionInsertUpdateHandler($data['id_tingkat'],'id_tingkat', $data, 'm_tingkat_tbl');
            
        }elseif($action == 'detail'){

            $id_tingkat = $this->input->post('id_tingkat');

			$condition 		= [];
			$condition[] 	= ['id_tingkat', $id_tingkat, 'where'];
			$response 		= $this->M_admin->get_master_spec('m_tingkat_tbl', 'id_tingkat, tingkat', $condition)->row_array();
           
        }

        echo json_encode($response);
    }

    


}