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
		redirect('diagnosa/start');
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
		redirect('diagnosa/start');
	}

	public function start($sort=null)
	{
		// $dt_d = [];
		// $dt_nd = [];
		$dt_d = $this->session->userdata('d');
		$dt_nd = $this->session->userdata('nd');
		$premis = $this->my_m->getPremis();
		if(count($dt_d)==0) $dt_d=null;
		if(count($dt_nd)==0) $dt_nd=null;
		// debug($dt_nd);
		
		$rule = $this->my_m->getRule($dt_d,$dt_nd);
		// debug($rule);
		if(count($rule)!=0) $kid=$rule[0]['id'];
		else $kid=null;
		$bb['rule'] = $rule;
		
		$premis_fix = $this->my_m->getRuleSelected($kid,$dt_d,$dt_nd);
		// $premis_fix = $this->my_m->getRuleSelected2($rule);
		$bb['premis_fix'] = $premis_fix;
		if(count($premis_fix)!=0) $pf=$premis_fix[0];
		else $pf=null;

		// debug($premis_fix);
		
		
		// alihkan ketika data tidak ditemukan
		if(count($rule)<=0){
			redirect('diagnosa/result');
		}
		// debug($rule);


		if($sort=='1'){
			debug($bb);
		}

		if($pf==null AND count($rule)!=0){
			redirect('diagnosa/result');
		}

		$data['content'] = 'pertanyaan';
		$data['list_premis'] = $pf;
		$this->view($data);
	}

	public function result(){
		// $dt_d = [];
		// $dt_nd = [];
		$dt_d = $this->session->userdata('d');
		$dt_nd = $this->session->userdata('nd');
		$premis = $this->my_m->getPremis();
		if(count($dt_d)==0) $dt_d=null;
		if(count($dt_nd)==0) $dt_nd=null;
		
		$rule = $this->my_m->getRule($dt_d,$dt_nd);
		if(count($rule)<=0){
			array_pop($dt_d);
			$rule = $this->my_m->getRule($dt_d,$dt_nd);
			if(count($rule)<=0){
				$dt_d = $this->session->userdata('d');
				array_pop($dt_nd);
				$rule = $this->my_m->getRule($dt_d,$dt_nd);
			}
		}
		
		// presentase penyakit
		foreach ($rule as $keyr => $valuer) {
			$this->db->where('r.konklusi_id', $valuer['id']);
			$hitungr = $this->db->get('rule r')->result_array();
			$rhrf=[];
			foreach ($hitungr as $khr => $vhr) {
				$rhrf[] = $vhr['id'];
			}
			
			// if(count($dt_d)!=0){
			// 	$rr = $this->my_m->getResultRule($dt_d);
			// 	$rrf=[];
			// 	$sama=0;
			// 	foreach ($rr as $krr => $vrr) {
			// 		if(in_array($vrr['id_premis'],$rhrf)){
			// 			$sama++;
			// 		}
			// 	}
			// 	// debug($rr);
	
			// 	$pro = ($sama/count($hitungr))*100;
			// 	$rule[$keyr]['persentase'] = round($pro, 2);
			// }
		}

		if(!$dt_d){
			$data['content'] = 'result_not_found';
			$this->view($data);
		}else{

			if(count($rule)>0){
	
				$data['gejala'] = $this->my_m->getResultRule($dt_d);
				$data['content'] = 'result';
				$data['list_penyakit'] = $rule;
				$this->view($data);
			}elseif(count($rulefix)<=0){
				$data['content'] = 'result_not_found';
				$this->view($data);
			}else{
				// redirect('diagnosa/start');
			}
		}

	}

	public function result_old()
	{
		$dt_d = $this->session->userdata('d');
		$dt_nd = $this->session->userdata('nd');
		$premis = $this->my_m->getPremis();
		if(count($dt_d)==0) $dt_d=null;
		if(count($dt_nd)==0) $dt_nd=null;
		
		$rule = $this->my_m->getRule($dt_d,$dt_nd);

		// jika data tidak ditemukan, hapus array paling kebalakng dan check lagi
		if(count($rule)<=0){
			array_pop($dt_d);
			$rule = $this->my_m->getRule($dt_d,$dt_nd);
			if(count($rule)<=0){
				$dt_d = $this->session->userdata('d');
				array_pop($dt_nd);
				$rule = $this->my_m->getRule($dt_d,$dt_nd);
			}
		}

		if(count($rule)!=0) $kid=$rule[0]['id'];
		else $kid=null;
		$data['rule'] = $rule;
		
		// jika penyakit masih ketemu
		if($kid!=null){
			$premis_fix = $this->my_m->getRuleSelected($kid,$dt_d,null);
			$data['premis_fix'] = $premis_fix;
			if(count($premis_fix)!=0) $pf=$premis_fix[0];
			else $pf=null;
		}

		// presentase penyakit
		foreach ($rule as $keyr => $valuer) {
			$this->db->where('r.konklusi_id', $valuer['id']);
			$hitungr = $this->db->get('rule r')->result_array();
			$rhrf=[];
			foreach ($hitungr as $khr => $vhr) {
				$rhrf[] = $vhr['id'];
			}

			$rr = $this->my_m->getResultRule($dt_d);
			$rrf=[];
			$sama=0;
			foreach ($rr as $krr => $vrr) {
				if(in_array($vrr['id_premis'],$rhrf)){
					$sama++;
				}
			}
			// debug($rr);

			$pro = ($sama/count($hitungr))*100;
			$rule[$keyr]['persentase'] = round($pro, 2);
		}
		
		// $this->db->affected_rows();
		// $rr2 = $this->db->get('rule r')->result_array();
		// debug($rule);
		$rulefix=[];
		foreach ($rule as $rf => $vrf) {
			if($vrf['persentase']>50){
				$rulefix[] = $vrf;
			}
		}
		
		if(count($rulefix)>0){
			$data['gejala'] = $this->my_m->getResultRule($dt_d);
			$data['content'] = 'result';
			$data['list_penyakit'] = $rule;
			$this->view($data);
		}elseif(count($rulefix)<=0){
			$data['content'] = 'result_not_found';
			$this->view($data);
		}else{
			redirect('diagnosa/start');
		}
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