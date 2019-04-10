<?php
defined('BASEPATH') OR exit('No direct script access allowed'); require 'application/modules/frontend/grab_frontend/controllers/Grab_frontend.php';

class Auth extends Grab_frontend {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('My_model');
		date_default_timezone_set ( "Asia/Jakarta" );
	}

	function try_href()
	{
		$this->load->view('try_href');
	}

	public function make_sess()
	{
		$dev = $this->input->post('device_id');
		$array = array(
			'device_id2' => $dev
		);		
		$this->session->set_userdata( $array );
		$res['success'] = true;
		if (empty($dev)) {
			$res['success'] = false;
		}
		echo json_encode($res);
	}

	public function sess()
	{
		debug($this->session->userdata());
	}

	public function sessd()
	{
		// $this->session->unset_userdata('device_id2');
		session_destroy();
	}

	public function cek_device_id()
	{
		// cek device id blm dicoba
		$this->load->view('cek_device_id');
	}

	public function getting_device_id()
	{
		if ($this->session->userdata('device_id2')) {

			// kembalikan cek device id di database
			$this->akses();

			// apabila sudah berhasil redirect ke home
			redirect('');
		}
		$this->load->view('cek_resolusi');
	}

	public function index()
	{
		$this->akses();
		// session_destroy();
		// debug($this->session->userdata());

		// cek user blm pernah login/device_id blm tersimpan di database
		if (!$this->session->userdata('success_check_ip') and !$this->session->userdata('user_logged')) {
			$data['content'] = 'home_error';
			$this->view($data,false);
		}else if (!$this->session->userdata('success_check_ip') and $this->session->userdata('user_logged')) {
			$data['content'] = 'home_error';
			$this->view($data,false);
		}else if (!$this->session->userdata('user_logged') and $this->session->userdata('success_check_ip') ) {
			// ke halama login
			$data['content'] = 'index';
			$this->view($data,false);
		}else{
			redirect('home');
		}
	}

	function cek_user()
	{
		// debug($this->session->userdata());
		$data = array(
			'email' => $this->input->post('email', TRUE),
			'password' => md5($this->input->post('password', TRUE)),
		);

		$hasil = $this->My_model->cek_user($data);
		// debug($hasil);
		if (count($hasil) > 0) {
			if ($hasil['status_login'] == 0) {
				# code...
				$ob = array(
					'device_id' => $this->session->userdata('device_id2'),
					'status_login' => '1',
				);
				$this->db->where('id_user', $hasil['id_user']);
				$qu = $this->db->update('user', $ob);
				if ($qu) {
					redirect('');
				}
			}else{
				$this->session->set_flashdata('alert_error', 'User sudah login di device lain');
			}
		}else{
			$this->session->set_flashdata('alert_error', 'Username atau kata sandi tidak cocok');
		}
		redirect('');

	}

	public function reset()
	{
		$data['content'] = 'reset';
		$this->view($data,false);
	}

	public function forgot()
	{
		$this->load->view('lupa_kata_sandi');
	}

	public function error()
	{
		$data['content'] = 'home_error';
		$this->view($data,false);
	}

	public function cek()
	{
		// echo "string";
		$awal  = date_create('2018-02-25 23:00:00');
		$akhir = date_create(); // waktu sekarang
		$diff  = date_diff( $awal, $akhir );

		echo 'Selisih waktu: ';
		echo $diff->y . ' tahun, ';
		echo $diff->m . ' bulan, ';
		echo $diff->d . ' hari, ';
		echo $diff->h . ' jam, ';
		echo $diff->i . ' menit, ';
		echo $diff->s . ' detik, ';
		// Output: Selisih waktu: 28 tahun, 5 bulan, 9 hari, 13 jam, 7 menit, 7 detik

		echo 'Total selisih hari : ' . $diff->days . ', ';
		echo 'Total selisih jam : ' . $diff->days;
		// Output: Total selisih hari: 10398
	}

	public function tes_cron()
	{
		$object = array(
			'id_user' => '999',
			'keterangan' => 'tes cron',
			'tanggal' => date('Y-m-d H:i:s'),
		);
		$this->db->insert('aktivitas', $object);
	}

	function cron_tutup_presensi()
	{
		$q = $this->My_model->tutup_presensi();
	}

}

/* End of file Auth.php */
/* Location: ./application/modules/backend/auth/controllers/Auth.php */