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

	public function sess()
	{
		debug($this->session->userdata());
	}

	public function sesdes()
	{
		session_destroy();
		// redirect('diagnosa/start');
	}

	public function start($sort=null)
	{
		$d = [];
		$nd = [];
		$dt_n = $this->session->userdata('n');
		$dt_nd = $this->session->userdata('nd');
		$premis = $this->my_m->getPremis();
		$premis_fix = $this->my_m->getPremisKategori($premis[0]['id_pk']);
		$data['content'] = 'pertanyaan';
		$data['list_premis'] = $premis_fix;
		debug($data);
		$this->view($data);
	}

	public function next()
	{

		// $array = array(
		// 	'key' => 'value' // true or false
		// );
		$d = $this->session->userdata('d');
		$nd = $this->session->userdata('nd');
		// $p_id[] = $this->input->post('p_id');
		$choice = $this->input->post('choice');


		$tambah=true;
		foreach ($d as $key => $value) {
			if($value==$this->input->post('p_id')){
				$tambah=false;
			}
		}
		foreach ($nd as $key => $value) {
			if($value==$this->input->post('p_id')){
				$tambah=false;
			}
		}
		if($choice=='1' AND $tambah==true){
			$d[] = $this->input->post('p_id');
		}elseif($choice=='2' AND $tambah==true){
			$nd[] = $this->input->post('p_id');
		}
		$this->session->set_userdata(['d'=>$d,'nd'=>$nd]);

		redirect('diagnosa/start');
	}

}

/* End of file Home.php */
/* Location: ./application/modules/frontend/home/controllers/Home.php */