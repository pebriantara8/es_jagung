<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_frontend extends MX_Controller {
	// protected $data;
	
	function __construct(){
		parent::__construct();
		$this->user = $this->session->userdata('my_id');
		$this->load->module('frontend/template');
		$this->load->model('my_model');

		$this->klas = $this->router->fetch_class();
		$this->fungsi = $this->router->fetch_method();
		
	}

	function malert($alert='',$val='',$redirect=''){
		$data = "<div class='alert alert-$alert'>$val</div>";
		$this->session->set_flashdata('alert', $data);
		if(!$redirect) $redirect = $this->klas;
		redirect($redirect,'refresh');
	}

	function cek_premium($rdrct=''){
		$cek = $this->wd_db->get_row('user',array('id'=>$this->session->userdata('my_id')['id']));
	 	if(!$cek['premium_paket']) redirect($rdrct,'refresh');
	}

	
}
?>