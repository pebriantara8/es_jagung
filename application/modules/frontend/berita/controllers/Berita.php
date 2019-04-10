<?php
defined('BASEPATH') OR exit('No direct script access allowed'); require 'application/modules/frontend/grab_frontend/controllers/Grab_frontend.php';

class Berita extends Grab_frontend {

	public function __construct()
	{
		parent::__construct();
		// if (!$this->session->userdata('success_check_ip') OR !$this->session->userdata('user_logged')) {
		// 	redirect('auth');
		// }
		// $this->user_info = $this->My_model_main->karyawan_row($this->session->userdata('device_id2'));
		$this->load->model('berita_model');
		$this->date_today = date("Y-m-d H:i:s");
		$this->load->library('urlcrypt');
		$this->modul ="berita";
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

        $offset = 0;
        if (!empty($_GET['per_page'])) {
            $pageNo = $_GET['per_page'];
            $offset = ($pageNo - 1) * $config["per_page"];
        }

        $object = array(
            'limit' => $config['per_page'],
            'offset' => $offset,
            'keyword' => $this->input->get('search'),
            'category' => $this->input->get('category'),
            'status_post' => 0,
        );

        $config['total_rows'] = $this->berita_model->hitung($object);
        $data['no_urut'] = $offset+1;
        $this->pagination->initialize($config);

        $data['total_rows'] = $this->berita_model->hitung($object);
        $data['list_posts'] = $this->berita_model->getData($object);
        // debug($data['list_posts']);
        $data['recent_post'] = $this->db->get('posts', 5)->result_array();

        $data['content'] = "index";
		$this->view($data,false);
	}

	function read($id=null)
	{
		// $id = explode('-', $title);
		// $id = end($id);
        // $id = decrypt_url($id);
        $data['recent_post'] = $this->db->get('posts', 5)->result_array();
		$this->db->where('id_post', $id);
		$q = $this->db->get('posts')->row_array();
		$data['data_post'] = $this->main_model->get_post($id);
		$data['content'] = "index_single_post";
		$this->view($data,false);
	}
}

/* End of file Home.php */
/* Location: ./application/modules/frontend/home/controllers/Home.php */