
<?php
defined('BASEPATH') OR exit('No direct script access allowed'); require 'application/modules/frontend/grab_frontend/controllers/Grab_frontend.php';

class Warta extends Grab_frontend {

	public function __construct()
	{
		parent::__construct();
		// if (!$this->session->userdata('success_check_ip') OR !$this->session->userdata('user_logged')) {
		// 	redirect('auth');
		// }
		// $this->user_info = $this->My_model_main->karyawan_row($this->session->userdata('device_id2'));
		$this->load->model('warta_model');
		$this->date_today = date("Y-m-d H:i:s");
		$this->modul = 'warta';
	}

	public function index()
	{
		// $data['list_posts'] = $this->main_model->get_post();
        // $data['content'] = "index";

        // debug($data);
		// $this->view($data,false);
        $this->load->library('pagination');
        $params['v'] = 'search';

        if ($this->input->get('search') == true) {
            $params['search'] = $this->input->get('search');
        }
        if ($this->input->get('category') == true) {
            $params['category'] = $this->input->get('category');
        }
        if ($this->input->get('per_page') == true) {
            $params['per_page'] = $this->input->get('per_page');
        }

        $queryString =  http_build_query($params);
        $hpp = explode('&per_page', $queryString);

        $config['base_url'] = base_url().$this->modul.'?'.$hpp[0];
        $config['per_page'] = 10;
        $config['uri_segment'] = 3;
        $config['use_page_numbers'] = TRUE;
        $config['page_query_string'] = TRUE;
        $config['first_link'] = 'First';        
        $config['last_link'] = 'Last';        
        $config['first_tag_open'] = '<li class="page-item">';        
        $config['first_tag_close'] = '</li>';        
        $config['prev_link'] = '<';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '<i class="fa fa-angle-right"></i>';
        $config['next_tag_open'] = '<li class="page-item">'; 
        $config['next_tag_close'] = '<li>';        
        $config['last_tag_open'] = '<li class="page-item">';        
        $config['last_tag_close'] = '</li>';        
        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="javascript:void()">';        
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li class="page-item">';        
        $config['num_tag_close'] = '</li>';
        $config['attributes'] = array('class' => 'page-link');

		
		if(isset($params['per_page'])){$page=$params['per_page'];} else{ $page=1;}
		$where = '';
		$like = '';
		$order = ['a.date'=>'desc'];
		$limit['offset'] = $config['per_page'];
		$limit['start'] = ($page - 1)*$config['per_page'];
		$data['data_warta'] = $this->warta_model->getWarta($where,$where,$order,$limit);

		$config['total_rows'] = $this->warta_model->getWarta($where,$where,$order,'');
        $data['no_urut'] = $limit['start']+1;
		$this->pagination->initialize($config);

        $data['content'] = "index";
		$this->view($data,false);
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