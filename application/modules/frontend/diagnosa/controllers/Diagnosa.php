<?php
defined('BASEPATH') OR exit('No direct script access allowed'); require 'application/modules/frontend/grab_frontend/controllers/Grab_frontend.php';

class Diagnosa extends Grab_frontend {

	public function __construct()
	{
		parent::__construct();
		// if (!$this->session->userdata('success_check_ip') OR !$this->session->userdata('user_logged')) {
		// 	redirect('auth');
		// }
		// $this->user_info = $this->My_model_main->karyawan_row($this->session->userdata('device_id2'));
		// $this->load->model('main_mo');
		$this->load->model('my_m');
		$this->date_today = date("Y-m-d H:i:s");
	}

	public function index()
	{
		$data['content'] = 'index';
		$this->view($data);
		
	}

	public function start($sort=null)
	{
		$premis = $this->my_m->getPremis();
		debug($premis);
	}

	public function next_diagnosa()
	{

		$array = array(
			'key' => 'value' // true or false
		);
		
		$this->session->set_userdata(['d'=>$array]);
		
	}

}

/* End of file Home.php */
/* Location: ./application/modules/frontend/home/controllers/Home.php */