<?php
defined('BASEPATH') OR exit('No direct script access allowed'); require 'application/modules/admin/grab/controllers/Grab.php';

class Warta extends Grab {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_warta','m_this');
		$this->data['page_title'] = "Warta";
        $this->tabel = 'warta';
        $this->id_name = 'id_warta';
		//Do your magic here
        $this->posts = true;
        $this->path = './public/post_file/';
        $this->new_path = './public/post_file/thumb/';
	}

	public function index()
	{
        $this->load->library('pagination');
        $params['v'] = 'search';

        if ($this->input->get('search') == true) {
            $params['search'] = $this->input->get('search');
        }
        if ($this->input->get('year') == true) {
            $params['year'] = $this->input->get('year');
        }
        if ($this->input->get('month') == true) {
            $params['month'] = $this->input->get('month');
        }
        if ($this->input->get('per_page') == true) {
            $params['per_page'] = $this->input->get('per_page');
        }

        $queryString =  http_build_query($params);
        $hpp = explode('&per_page', $queryString);

        $config['base_url'] = backend_url().this_module().'?'.$hpp[0];
        $config['per_page'] = 10;
        $config['uri_segment'] = 3;
        $config['use_page_numbers'] = TRUE;
        $config['page_query_string'] = TRUE;
        $config['first_link'] = 'First';        
        $config['last_link'] = 'Last';        
        $config['first_tag_open'] = '<li class="page-item">';        
        $config['first_tag_close'] = '</li>';        
        $config['prev_link'] = 'Prev';
        $config['prev_tag_open'] = '<li class="page-item">';      
        $config['prev_tag_close'] = '</li>';          
        $config['next_link'] = 'Next';        
        $config['next_tag_open'] = '<li class="page-item">';        
        $config['next_tag_close'] = '</li>';        
        $config['last_tag_open'] = '<li class="page-item">';        
        $config['last_tag_close'] = '</li>';        
        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="javascript:void()">';        
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li class="page-item">';        
        $config['num_tag_close'] = '</li>';

        $offset = 0;
        if (!empty($_GET['per_page'])) {
            $pageNo = $_GET['per_page'];
            $offset = ($pageNo - 1) * $config["per_page"];
        }

        $object = array(
            'limit' => $config['per_page'],
            'offset' => $offset,
            'keyword' => $this->input->get('search'),
            'year' => $this->input->get('year'),
            'month' => $this->input->get('month'),
            'archive' => 0,
        );

        $config['total_rows'] = $this->m_this->hitung($object);
        $data['no_urut'] = $offset+1;
        $this->pagination->initialize($config);

        $data['total_rows'] = $this->m_this->hitung($object);
        $data['list_data'] = $this->m_this->getData($object);
        $data['list_tahun'] = $this->m_this->get_all_year_posts();
        // debug($data['list_tahun']);

        $data['title_content'] = "Warta";
        $data['select2'] = true;
        $data['jquery_confirm'] = true;
        $data['content'] = "index";
        // debug($data);
		$this->view($data,false);
	}

    public function archive()
    {
        $this->load->library('pagination');
        $params['v'] = 'search';

        if ($this->input->get('search') == true) {
            $params['search'] = $this->input->get('search');
        }
        if ($this->input->get('year') == true) {
            $params['year'] = $this->input->get('year');
        }
        if ($this->input->get('month') == true) {
            $params['month'] = $this->input->get('month');
        }
        if ($this->input->get('per_page') == true) {
            $params['per_page'] = $this->input->get('per_page');
        }

        $queryString =  http_build_query($params);
        $hpp = explode('&per_page', $queryString);

        $config['base_url'] = backend_url().this_module().'/archive?'.$hpp[0];
        $config['per_page'] = 10;
        $config['uri_segment'] = 3;
        $config['use_page_numbers'] = TRUE;
        $config['page_query_string'] = TRUE;
        $config['first_link'] = 'First';        
        $config['last_link'] = 'Last';        
        $config['first_tag_open'] = '<li class="page-item">';        
        $config['first_tag_close'] = '</li>';        
        $config['prev_link'] = 'Prev';
        $config['prev_tag_open'] = '<li class="page-item">';      
        $config['prev_tag_close'] = '</li>';          
        $config['next_link'] = 'Next';        
        $config['next_tag_open'] = '<li class="page-item">';        
        $config['next_tag_close'] = '</li>';        
        $config['last_tag_open'] = '<li class="page-item">';        
        $config['last_tag_close'] = '</li>';        
        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="javascript:void()">';        
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li class="page-item">';        
        $config['num_tag_close'] = '</li>';

        $offset = 0;
        if (!empty($_GET['per_page'])) {
            $pageNo = $_GET['per_page'];
            $offset = ($pageNo - 1) * $config["per_page"];
        }

        $object = array(
            'limit' => $config['per_page'],
            'offset' => $offset,
            'keyword' => $this->input->get('search'),
            'year' => $this->input->get('year'),
            'month' => $this->input->get('month'),
            'archive' => 1,
        );

        $config['total_rows'] = $this->m_this->hitung($object);
        $data['no_urut'] = $offset+1;
        $this->pagination->initialize($config);

        $data['total_rows'] = $this->m_this->hitung($object);
        $data['list_data'] = $this->m_this->getData($object);
        $data['list_tahun'] = $this->m_this->get_all_year_posts();
        // debug($data['list_tahun']);

        $data['title_content'] = "Warta";
        $data['title_content_desc'] = "Arsip";
        $data['select2'] = true;
        $data['jquery_confirm'] = true;
        $data['content'] = "index_archive";
        $this->view($data,false);
    }

	public function form($id=null)
	{
        $dt_post = $this->wd_db->get_data_row('warta',array('id_warta'=>$id));
        if($id){
            $data['list'] = $dt_post;
            $data['is_edit'] = true;
        }
        $data['title_content'] = "Form Warta";
        $data['select2'] = true;
        $data['jquery_confirm'] = true;
        $data['content'] = "form";
        $this->view($data,false);
	}

    public function save(){

        $title = $this->input->post('title');
        $title == "" ? $title='(no title)' : $title;

        $set = array(
            'is_update' => FALSE,
            'input_file_name' => 'file_warta',
            'allowed_types' => 'pdf',
            'old_file' => 'file',
            'path' => './public/warta/',
            'new_path' => './public/warta/thumb/',
            'encrypt_name' => TRUE,

            'create_thumb' => FALSE,
            'height' => '500',
            'width' => '303',
            'crop' => FALSE,
        );
        $up_file = $this->main_model->upload_file_single($set);
        if($up_file['error']!=false){
            $this->main_model->set_response_web('',$up_file['error'],false);
        }

        $set_img = array(
            'is_update' => FALSE,
            'input_file_name' => 'file',
            'allowed_types' => 'gif|jpg|png',
            'old_file' => 'file',
            'path' => './public/warta/img/',
            'new_path' => './public/warta/img/thumb/',
            'encrypt_name' => TRUE,

            'create_thumb' => TRUE,
            'height' => '303',
            'width' => '500',
            'crop' => FALSE,
        );
        $up_file_img = $this->main_model->upload_file_single($set_img);
        if($up_file_img['error']!=false){
            @unlink($set['path'].$up_file['filename']);
            @unlink($set['new_path'].$up_file['filename']);
            $this->main_model->set_response_web('',$up_file_img['error'],false);
        }

        $ob = array(
            'title' => $title,
            'date' => date("Y-m-d H:i:s"),
            'file' => $up_file['filename'],
            'image' => $up_file_img['filename'],
            'user_id' => $this->data_user_admin['id_user'],
            // 'archive' => 0, // default
        );
        $qi = $this->db->insert($this->tabel, $ob);
        if($qi){
            $this->session->set_flashdata('alert_success', 'Berhasil menyimpan');
            $this->main_model->set_response_web('','Berhasil menyimpan',true);
        }else{
            @unlink($set['path'].$up_file['filename']);
            @unlink($set['new_path'].$up_file['filename']);
            @unlink($set_img['path'].$up_file_img['filename']);
            @unlink($set_img['new_path'].$up_file_img['filename']);
            $this->main_model->set_response_web('','Terjadi kesalahan saat menyimpan, silahkan hubungi operator',false);
        }
    }

    public function save_edit(){

        $id_warta = $this->input->post('id');
        $data_lama = $this->wd_db->get_data_row('warta', array('id_warta'=>$id_warta));

        $title = $this->input->post('title');
        $title == "" ? $title='(no title)' : $title;

        $set = array(
            'is_update' => TRUE,
            'input_file_name' => 'file_warta',
            'allowed_types' => 'pdf',
            'old_file' => $data_lama['file'],
            'path' => './public/warta/',
            'new_path' => './public/warta/thumb/',
            'encrypt_name' => TRUE,

            'create_thumb' => FALSE,
            'height' => '500',
            'width' => '303',
            'crop' => FALSE,
        );
        $up_file = $this->main_model->upload_file_single($set);
        if($up_file['error']!=false){
            $this->main_model->set_response_web('',$up_file['error'],false);
        }

        $set_img = array(
            'is_update' => TRUE,
            'input_file_name' => 'file',
            'allowed_types' => 'gif|jpg|png',
            'old_file' => $data_lama['image'],
            'path' => './public/warta/img/',
            'new_path' => './public/warta/img/thumb/',
            'encrypt_name' => TRUE,

            'create_thumb' => TRUE,
            'height' => '303',
            'width' => '500',
            'crop' => FALSE,
        );
        $up_file_img = $this->main_model->upload_file_single($set_img);
        if($up_file_img['error']!=false){
            $this->main_model->set_response_web('',$up_file_img['error'],false);
        }

        $ob = array(
            'title' => $title,
            'date' => date("Y-m-d H:i:s"),
            'file' => $up_file['filename'],
            'image' => $up_file_img['filename'],
            'user_id' => $this->data_user_admin['id_user'],
            // 'archive' => 0, // default
        );
        $this->db->where('id_warta', $id_warta);
        $qi = $this->db->update($this->tabel, $ob);
        if($qi){
            $this->session->set_flashdata('alert_success', 'Berhasil menyimpan');
            $this->main_model->set_response_web('','Berhasil menyimpan',true);
        }else{
            @unlink($set['path'].$up_file['filename']);
            @unlink($set['new_path'].$up_file['filename']);
            @unlink($set_img['path'].$up_file_img['filename']);
            @unlink($set_img['new_path'].$up_file_img['filename']);
            $this->main_model->set_response_web('','Terjadi kesalahan saat menyimpan, silahkan hubungi operator',false);
        }
    }

    public function arsip($id=null,$go='')
    {
        if(!$id){
            $this->session->set_flashdata('alert_error', 'Error server, hubungi developer');
            redirect(backend_url().$this->modul.'/'.$go);
        }
        $ob = array('archive' => 1);
        $this->db->where($this->id_name, $id);
        $q = $this->db->update($this->tabel, $ob);
        if ($q) {
            $this->session->set_flashdata('alert_success', 'Data berhasil diarsipkan');
            redirect(backend_url().$this->modul.'/'.$go);
        }else{
            $this->session->set_flashdata('alert_warning', 'Data gagal diarsipkan');
            redirect(backend_url().$this->modul.'/'.$go);
        }
    }

    public function publish($id=null,$go='')
    {
        if(!$id){
            $this->session->set_flashdata('alert_error', 'Error server, hubungi developer');
            redirect(backend_url().$this->modul.'/'.$go);
        }
        $ob = array('archive' => 0);
        $this->db->where($this->id_name, $id);
        $q = $this->db->update($this->tabel, $ob);
        if ($q) {
            $this->session->set_flashdata('alert_success', 'Data berhasil di publish');
            // $res['success'] = 'Data berhasil diedit';
            // $res['location'] = backend_url().$this->modul;
            redirect(backend_url().$this->modul.'/'.$go);
        }else{
            $this->session->set_flashdata('alert_warning', 'Data gagal di publish');
            redirect(backend_url().$this->modul.'/'.$go);
        }
    }

    public function delete_forever($id=null)
    {
        if(!$id){
            $this->session->set_flashdata('alert_error', 'Error server, hubungi developer');
            redirect(backend_url().$this->modul.'/'.$go);
        }
        $ob = array('archive' => 0);
        $this->db->where($this->id_name, $id);
        $q = $this->db->update($this->tabel, $ob);
        if ($del) {
            //delete file gambar utama
            @unlink($this->path.$dt['image']);
            @unlink($this->new_path.$dt['image']);
            $this->session->set_flashdata('alert_success', 'Data berhasil dihapus');
            redirect(backend_url().$this->modul);
        }else{
            $this->session->set_flashdata('alert_warning', 'Data gagal dihapus');
            redirect(backend_url().$this->modul);
        }
    }

}

/* End of file Posts.php */
/* Location: ./application/modules/admin/posts/controllers/Posts.php */