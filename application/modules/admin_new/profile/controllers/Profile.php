<?php
defined('BASEPATH') OR exit('No direct script access allowed'); require 'application/modules/admin_new/grab/controllers/Grab.php';

class Profile extends Grab {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_profile');
		$this->data['page_title'] = "Posts";
        $this->tabel = 'users';
        $this->id_name = 'id_user';
		//Do your magic here
        $this->posts = true;
        $this->path = './public/post_file/';
        $this->new_path = './public/post_file/thumb/';
	}

	public function index()
	{
        $this->db->where('id_user', $this->session->userdata('id_user_admin'));
        $data['user'] = $this->db->get('users')->row_array();
        $data['title_page'] = 'Profile';
        
        $data['content'] = "index";
		$this->view($data,false);
	}

    
    public function save()
    {
        $id = $this->session->userdata('id_user_admin');

        if($this->input->post('password')!=''){
                $ob = array(
                    'name' => $this->input->post('name'),
                    'email' => $this->input->post('email'),
                    'description' => $this->input->post('description'),
                    'pass' => sha1($this->input->post('password')),
                );
        }else{
            $ob = array(
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'description' => $this->input->post('description'),
            );
        }
        $this->db->where($this->id_name, $id);
        $qi = $this->db->update($this->tabel, $ob);

        if ($qi) {
            // debug('success');
            $this->session->set_flashdata('alert_success', 'Data berhasil diedit');
            $res['success'] = 'Data berhasil diedit';
            $res['location'] = backend_url().$this->modul;
            redirect(backend_url().$this->modul);
        }else{
            // $this->session->set_flashdata('alert_success', 'Data berhasil ditambahkan');
            // $res['success'] = 'Data berhasil ditambahkan';
            // $res['location'] = backend_url().$this->modul;
        }

        echo json_encode($res);
    }

    function logout(){
        session_destroy();
        redirect('','refresh');
    }

}

/* End of file Posts.php */
/* Location: ./application/modules/admin/posts/controllers/Posts.php */