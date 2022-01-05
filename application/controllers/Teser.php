<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Teser extends CI_Controller {	
    
    
    function encryptPass(){
        echo $this->encrypt->encode('123456');
    }

    function cekSession(){
        var_dump($this->session->userdata('id_user'));
    }

    function direct(){
        $id_user  = $this->session->userdata('id_user');
        // var_dump($id_user);
        // die();
        redirect('http://localhost/portofolio/user/login/'.$id_user);
        
    }

     //$d['ta']        = $this->M_core->getListSelectDefNol('m_ta_tbl', 'aktif', 1, 'id_ta', 'teks_ta', '-- Pilih Tahun Ajaran --');
        // $d['gelombang'] = $this->M_core->getListSelectDefNol('m_gelombang_tbl', 'aktif', 1, 'id_gelombang', 'gelombang', '-- Pilih Gelombang --');
        // $d['gelombang'] = $this->M_core->getListSelectDefNol('m_gelombang_tbl', 'aktif', 1, 'id_gelombang', 'gelombang', '-- Pilih Gelombang --');
        // $d['jenjang']   = $this->M_core->getListSelectDefNol('m_jenjang_tbl', 'aktif', 1, 'id_jenjang', 'jenjang', '-- Pilih Jenjang --');
        // $d['jurusan']   = $this->M_core->getListSelectDefNol('m_jurusan_tbl', 'aktif', 1, 'id_jurusan', 'jurusan', '-- Pilih Jurusan --');
        // $d['tingkat']   = $this->M_core->getListSelectDefNol('m_tingkat_tbl', 'aktif', 1, 'id_tingkat', 'tingkat', '-- Pilih tingkat --');
        // $d['kelas']     = $this->M_core->getListSelectDefNol('m_kelas', 'aktif', 1, 'id_kelas', 'nm_kelas', '-- Pilih Kelas --');

    
        function sendEmail(){
            $config['protocol'] = 'smtp';
            $config['smtp_host'] = 'ssl://smtp.googlemail.com';
            // $config['smtp_port'] = 465;
            $config['smtp_port'] = 465;
            $config['smtp_user'] = 'ghozi.alwan@gmail.com';
            
            $config['newline'] = "\r\n"; 
            $config['smtp_pass'] = 'Shaafir14';
            
            $this->load->library('email', $config);
            
            $this->email->from('ghozi.alwan@gmail.com', 'ghozi');
            $this->email->to('ghozi.alwan@gmail.com');
            $this->email->subject('coba');
            $this->email->message('OKE');
            // $this->email->send(); 
    
            if ($this->email->send()) {
                echo 'Email Successfully Send !';
            } else {
                // echo $this->email->print_debugger();
                echo 'Error';
            }
        }

    function checkFolder(){
        $directory = FCPATH.'berkas\foto_guru';
        echo $directory;
        var_dump(is_dir($directory));
        if(is_dir($directory)){
            echo 'ini folder'.'<br>';
        }else{
            echo 'bukan folder'.'<br>';
        }
        $path = '/berkas/foto_guru';
        $file_lokasi 		= base_url().substr($path, 1);
        echo $file_lokasi;
    }


    function returnPathToDirectory(){
       $path =  str_replace("/","\\","/berkas/foto_guru");
       echo $path;
       echo '<br>';
        $directory = ltrim($path, '\\');
        echo $directory;
    }

    function nis(){
        $condition  =   [];
        $condition[] = ['aktif', 1, 'where'];
        $data       = $this->M_admin->get_master_spec('m_formula_nis', '*', $condition)->row_array();

        for($i=1;$i<=10;$i++){
            echo str_replace('#',$i,$data['formula_nis']).'<br>';
        }
    }

    function generateNis(){
        $condition      =   [];
        $condition[]    = ['aktif', 1, 'where'];
        $dataSiswa      = $this->M_admin->get_master_spec('m_siswa_tbl', 'id_siswa', $condition)->result_array();
        
        $condition      =   [];
        $condition[]    =   ['aktif', 1, 'where'];
        $dataformula    =   $this->M_admin->get_master_spec('m_formula_nis', '*', $condition)->row_array();

        $no  = 1;
        $data = [];
        foreach($dataSiswa as $ds){
            $data = ['nis' => str_replace('#',$no,$dataformula['formula_nis'])];
            $condition 		= [];
			$condition[0] 	= 'id_siswa';
			$condition[1] 	= $ds['id_siswa'];
            $condition[2] 	= 'where';
            $this->M_admin->update_data('m_siswa_tbl', $condition, $data);
            $no++;
        }

        echo 'OKE';
    }

    function generateKelas(){
        $condition      =   [];
        $condition[]    = ['aktif', 1, 'where'];
        $condition[]    = ['id_ta', 1, 'where'];
        $condition[]    = ['id_jenjang', 4, 'where'];
        $dataSiswa      = $this->M_admin->get_master_spec('m_siswa_tbl', 'id_siswa, id_jenjang, id_jurusan, id_ta', $condition)->result_array();
        // var_dump($dataSiswa);
        // die();
        $res    =   [];
        foreach($dataSiswa as $ds){
            $d  =   [];
            $d['id_siswa']       =   $ds['id_siswa'];
            $d['tingkat']        =   1;
            $d['urutan_kelas']   =   1;
            $d['kd_siswa_kelas'] =   'KS001';
            $d['id_jenjang']     =   $ds['id_jenjang'];
            $d['id_jurusan']     =   $ds['id_jurusan'];
            $d['id_ta']          =   $ds['id_ta'];
            $res[]  =   $d;
        }

        $insert = $this->M_admin->insert_data_batch('t_siswa_kelas_tbl', $res) ;
        var_dump($res);
        die();
        

    }

    function listTable(){
        $tables = $this->db->list_tables();
        foreach($tables as $table){
            echo $table.'<br>';
        }
    }

    function listFunction(){
        $classMethods = get_class_methods(new Teser());
        var_dump($classMethods);
        die();
        foreach($classMethods as $cM){
            echo $cM.'<br>';
        }
    }

    function removeNum(){
        $testString = "KS0001";
        var_dump(intval(ltrim(preg_replace("/[^0-9,.]/", "", $testString), '0')));
    }

    function dateTest(){
        date_default_timezone_set('Asia/Jakarta');
        $date = date('Y-m-d h:i:s');
        echo $date;
    }

    function testArr(){
        $arr    =   [];
        $arr    =   [1,2];
        var_dump($arr);
        die();
    }            

    function cobaLooping(){
        $genMaxKode = 'KS0001';

        for($i=1;$i<=10;$i++){
           echo $genMaxKode++;
        }
    }

}