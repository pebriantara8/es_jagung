<?php
defined('BASEPATH') OR exit('No direct script access allowed'); require 'application/modules/admin/grab/controllers/Grab.php';

class Setting extends Grab {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_setting','m_this');
        $this->data['page_title'] = "Setting";
        $this->tabel = 'others';
        $this->id_name = 'id_other';
		//Do your magic here
        $this->posts = true;
        $this->path = './public/post_file/';
        $this->new_path = './public/post_file/thumb/';
	}

    public function umum()
    {
        $this->data['page_title'] = "Pengaturan Umum";
        $data['content'] = "index_umum";
        $this->view($data);
    }

    public function save_umum()
    {

        // ($name, $content=null, $file_input_name=null, $img_old_name=null)
        $this->m_this->change_by_name_db('judul_utama', $this->input->post('judul_utama'));
        $this->m_this->change_by_name_db('judul_utama_deskripsi', $this->input->post('judul_utama_deskripsi'));
        $this->m_this->change_by_name_db('no_telepon', $this->input->post('no_telepon'));
        $this->m_this->change_by_name_db('email', $this->input->post('email'));
        $this->m_this->change_by_name_db('sekilas_tentang_kami', $this->input->post('sekilas_tentang_kami'));

        $this->m_this->change_by_name_db('gambar_utama_home', null, 'gambar_utama_home', $this->input->post('gambar_utama_home_old'));
        $this->m_this->change_by_name_db('background_kdans', null, 'background_kdans', $this->input->post('background_kdans_old'));

        
        $this->session->set_flashdata('alert_success', 'Berhasil memperbarui pengaturan');
        redirect(backend_url().$this->modul.'/umum');
    }




}

/* End of file Posts.php */
/* Location: ./application/modules/admin/posts/controllers/Posts.php */