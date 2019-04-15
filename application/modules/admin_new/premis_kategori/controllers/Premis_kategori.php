<?php
defined('BASEPATH') OR exit('No direct script access allowed'); require 'application/modules/admin_new/grab/controllers/Grab.php';

class Premis_kategori extends Grab {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('my_m');
		$this->data['page_title'] = "Kategori Gejala";
        $this->tabel = 'premis_kategori';
        $this->id_name = 'id';
		//Do your magic here
        $this->posts = true;
        $this->path = './public/user/';
        $this->new_path = './public/user/thumb/';
	}

	public function index()
	{
        $this->load->library('pagination');
        $params['v'] = 'search';

        if ($this->input->get('search') == true) {
            $params['search'] = $this->input->get('search');
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

		if(isset($params['per_page'])){$page=$params['per_page'];} else{ $page=1;}
		$where = ['a.deleted_at IS NULL'];
		$like = '';
		$order = ['a.created_at'=>'desc'];
		$limit['offset'] = $config['per_page'];
		$limit['start'] = ($page - 1)*$config['per_page'];
		$data['list_data'] = $this->my_m->getData($where,$like,$order,$limit);

		$config['total_rows'] = $this->my_m->getData($where,$like,$order,'');
        $data['no_urut'] = $limit['start']+1;
		$this->pagination->initialize($config);

        $data['title_content'] = "Kategori Premis";
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

		if(isset($params['per_page'])){$page=$params['per_page'];} else{ $page=1;}
		$where = ['a.deleted_at IS NOT NULL'];
		$like = '';
		$order = ['a.created_at'=>'desc'];
		$limit['offset'] = $config['per_page'];
		$limit['start'] = ($page - 1)*$config['per_page'];
		$data['list_data'] = $this->my_m->getData($where,$like,$order,$limit);

		$config['total_rows'] = $this->my_m->getData($where,$like,$order,'');
        $data['no_urut'] = $limit['start']+1;
		$this->pagination->initialize($config);

        $data['title_content'] = "Kategori Premis";
        $data['title_content_desc'] = "Arsip";
        $data['select2'] = true;
        $data['jquery_confirm'] = true;
        $data['content'] = "index_archive";
        $this->view($data,false);
    }

	public function form($id=null)
	{
        $dt_post = $this->wd_db->get_data_row($this->tabel,array($this->id_name=>$id));
        if($id){
            $data['list'] = $dt_post;
            $data['is_edit'] = true;
        }
        $data['list_kat_premis'] = $this->wd_db->get_data_row('premis_kategori');
        $data['title_content'] = "Form Gejala";
        $data['select2'] = true;
        $data['jquery_confirm'] = true;
        $data['content'] = "form";
        $this->view($data,false);
	}

    public function save(){

        // $set_img = array(
        //     'is_update' => FALSE,
        //     'input_file_name' => 'file',
        //     'allowed_types' => 'gif|jpg|png',
        //     'old_file' => 'file',
        //     'path' => './public/warta/img/',
        //     'new_path' => './public/warta/img/thumb/',
        //     'encrypt_name' => TRUE,

        //     'create_thumb' => TRUE,
        //     'height' => '303',
        //     'width' => '500',
        //     'crop' => TRUE,
        // );
        // $up_file_img = $this->main_model->upload_file_single($set_img);
        // if($up_file_img['error']!=false){
        //     @unlink($set['path'].$up_file['filename']);
        //     @unlink($set['new_path'].$up_file['filename']);
        //     $this->main_model->set_response_web('',$up_file_img['error'],false);
        // }

        $ob = array(
            'nama_premis_kategori' => $this->input->post('nama_premis'),
            'pertanyaan' => $this->input->post('pertanyaan'),
            'created_at' => date('Y-m-d H:i:s'),
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

        $id = $this->input->post('id');
        $data_lama = $this->wd_db->get_data_row($this->tabel, array($this->id_name=>$id));

        // $set_img = array(
        //     'is_update' => FALSE,
        //     'input_file_name' => 'file',
        //     'allowed_types' => 'gif|jpg|png',
        //     'old_file' => 'file',
        //     'path' => './public/warta/img/',
        //     'new_path' => './public/warta/img/thumb/',
        //     'encrypt_name' => TRUE,

        //     'create_thumb' => TRUE,
        //     'height' => '303',
        //     'width' => '500',
        //     'crop' => TRUE,
        // );
        // $up_file_img = $this->main_model->upload_file_single($set_img);
        // if($up_file_img['error']!=false){
        //     @unlink($set['path'].$up_file['filename']);
        //     @unlink($set['new_path'].$up_file['filename']);
        //     $this->main_model->set_response_web('',$up_file_img['error'],false);
        // }

        $ob = array(
            'nama_premis_kategori' => $this->input->post('nama_premis'),
            'pertanyaan' => $this->input->post('pertanyaan'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        );
        $this->db->where($this->id_name, $id);
        $qi = $this->db->update($this->tabel, $ob);
        if($qi){
            $this->session->set_flashdata('alert_success', 'Berhasil update');
            $this->main_model->set_response_web('','Berhasil update',true);
        }else{
            // @unlink($set['path'].$up_file['filename']);
            // @unlink($set['new_path'].$up_file['filename']);
            // @unlink($set_img['path'].$up_file_img['filename']);
            // @unlink($set_img['new_path'].$up_file_img['filename']);
            $this->main_model->set_response_web('','Terjadi kesalahan saat menyimpan, silahkan hubungi operator',false);
        }
    }

    public function delete($id=null,$go='')
    {
        if(!$id){
            $this->session->set_flashdata('alert_error', 'Error server, hubungi developer');
            redirect(backend_url().$this->modul.'/'.$go);
        }
        $q = $this->main_model->deleteR($this->tabel, 'id_user',$id);
        if ($q) {
            $this->session->set_flashdata('alert_success', 'Data berhasil dihapus');
            redirect(backend_url().$this->modul.'/'.$go);
        }else{
            $this->session->set_flashdata('alert_warning', 'Data gagal dihapus');
            redirect(backend_url().$this->modul.'/'.$go);
        }
    }

    public function restore($id=null,$go='')
    {
        if(!$id){
            $this->session->set_flashdata('alert_error', 'Error server, hubungi developer');
            redirect(backend_url().$this->modul.'/'.$go);
        }
        $q = $q = $this->main_model->restoreR($this->tabel, 'id_user',$id);
        if ($q) {
            $this->session->set_flashdata('alert_success', 'Data berhasil dikembalikan');
            redirect(backend_url().$this->modul.'/'.$go);
        }else{
            $this->session->set_flashdata('alert_warning', 'Data gagal dihapus');
            redirect(backend_url().$this->modul.'/'.$go);
        }
    }

    public function delete_purge($id=null)
    {
        if(!$id){
            $this->session->set_flashdata('alert_error', 'Error server, hubungi developer');
            redirect(backend_url().$this->modul.'/'.$go);
        }
        $q = $this->main_model->purgeDelete($this->tabel, 'id_user',$id);
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