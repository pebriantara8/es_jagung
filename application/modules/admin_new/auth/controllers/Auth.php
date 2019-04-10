<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('My_model');
	}

	public function index()
	{
		// session_destroy();
		// debug($this->session->userdata());
		if ($this->session->userdata('admin_login')) {
			redirect(base_url().'admin_new/dashboard');
		}
		$this->load->view('index');
	}

	function cs()
	{
		debug($this->session->userdata());
	}

	public function lupa_kata_sandi()
	{
		$this->load->view('lupa_kata_sandi');
	}

	public function login2()
	{
		$res = array('success' => 's', );
		echo json_encode($res);
	}

	public function login()
	{
		$data = array(
			'email' => $this->input->post('email', TRUE),
			'pass' => sha1($this->input->post('password', TRUE)),
			'user_status' => '1',
		);

		$hasil = $this->My_model->cek_user($data);
		if ($hasil->num_rows() == 1) {
			foreach ($hasil->result() as $sess) {
				$sess_data['admin_login'] = 'ok';
				$sess_data['nama'] = $sess->name;
				$sess_data['id_user_admin'] = $sess->id_user;
				$sess_data['akses'] = $sess->akses;
				$sess_data['nama'] = $sess->name;
				// Set session
				$this->session->set_userdata($sess_data);
				// $this->create_activity($sess->id_user,'Login admin presensi');
			}
			$res = array('success'=>true);
		}
		else {
			$this->session->set_flashdata('error_danger', 'Email atau password tidak cocok!');
			$res = array('error' => true);
		}
		echo json_encode($res);
	}

	public function logout()
	{
		session_destroy();
		redirect(backend_url());
	}

	function login_2(){
		if ($this->session->userdata('admin_login')) {
			redirect(base_url().'admin_new/dashboard');
		}
		$this->load->view('index2');
	}

}

/* End of file Auth.php */
/* Location: ./application/modules/backend/auth/controllers/Auth.php */