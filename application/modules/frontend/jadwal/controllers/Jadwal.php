
<?php
defined('BASEPATH') OR exit('No direct script access allowed'); require 'application/modules/frontend/grab_frontend/controllers/Grab_frontend.php';

class Jadwal extends Grab_frontend {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('my_m');
		$this->date_today = date("Y-m-d H:i:s");
		$this->modul = 'jadwal';
	}

	public function index()
	{
        // $data['content'] = "index";
		// $this->view($data,false);
		redirect('');
	}

	function ibadah(){
		$data['jadwal'] = '';
        $data['content'] = "ibadah";
		$this->view($data,false);
	}

}

/* End of file Home.php */
/* Location: ./application/modules/frontend/home/controllers/Home.php */