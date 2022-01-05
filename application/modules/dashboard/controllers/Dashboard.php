<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	function __construct() {
        parent::__construct();
        if(empty($this->session->userdata('id_user'))){
			redirect('user','refresh');
		}
	}
	
	function index() {
		$d['title'] = 'Dashboard Aplikasi';
		$d['page'] 	= 'menu';
		$d['title_page'] = 'Dashboard Aplikasi';
		$this->load->view('layout', $d);
	}
	
}
