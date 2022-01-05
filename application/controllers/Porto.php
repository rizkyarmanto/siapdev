<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Porto extends CI_Controller {	
    
    function index(){
        $id_user  = $this->session->userdata('id_user');
        // var_dump($id_user);
        // die();
        redirect('http://localhost/siap/portofolio/user/home/'.$id_user);
    }

}