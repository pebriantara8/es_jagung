<?php
defined('BASEPATH') OR exit('No direct script access allowed'); require 'application/modules/frontend/grab_frontend/controllers/Grab_frontend.php';

class Home extends Grab_frontend {

	public function __construct()
	{
		parent::__construct();
		// if (!$this->session->userdata('success_check_ip') OR !$this->session->userdata('user_logged')) {
		// 	redirect('auth');
		// }
		// $this->user_info = $this->My_model_main->karyawan_row($this->session->userdata('device_id2'));
		$this->load->model('home_model');
		$this->date_today = date("Y-m-d H:i:s");
	}

	public function index()
	{
		$data['list_posts'] = $this->home_model->getPost();
		$data['slider_home'] = $this->home_model->get_slider_home();
		$data['gallery'] = $this->home_model->getGallery('','','',['offset'=>'10','start'=>'0']);
		// var_dump($data['list_posts']);
		// debug($data['list_posts']);
        $data['content'] = "index";

        // debug($data);
		// $this->view($data,false);
		
		$this->load->view('index_s');
		
	}

	public function home2()
	{
		$packed = chr(127) . chr(0) . chr(0) . chr(1);
		$expanded = inet_ntop($packed);
		// debug($expanded);

		/* Outputs: 127.0.0.1 */
		echo $expanded;

		$packed = str_repeat(chr(0), 15) . chr(1);
		$expanded = inet_ntop($packed);

		/* Outputs: ::1 */
		echo $expanded;
	}

	public function add_kdans()
	{
		$nama = $this->input->post('nama');
		$no_telepon = $this->input->post('no_telepon');
		$email = $this->input->post('email');
		$kdans = $this->input->post('kdans');

		$object = array(
			'nama' => $nama,
			'no_telepon' => $no_telepon,
			'email' => $email,
			'kdans' => $kdans,
		);
		$q = $this->db->insert('kdans', $object);
		if ($q) {
			$res['success'] = '&#x2714; Berhasil mengirim kritik dan saran';
		}else{
			$res['error'] = 'Error, server gagal mengirim kritik dan saran';
		}

		echo json_encode($res);
	}




}

/* End of file Home.php */
/* Location: ./application/modules/frontend/home/controllers/Home.php */