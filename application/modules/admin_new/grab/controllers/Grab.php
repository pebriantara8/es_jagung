<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Grab extends CI_Controller {

	public $data;
	public $rules;

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		// if (empty($this->session->userdata('admin_login'))) {
		// 	redirect('admin_new');
		// }
		date_default_timezone_set ("Asia/Jakarta");
		$this->data_user_admin = $this->wd_db->get_data_row('users',array('id_user' => $this->session->userdata('id_user_admin'),));
		$this->modul = $this->uri->segment(2);
	}

	public function view($data = NULL,$tipe=true)
	{
		$this->data['title_small'] = $tipe ? 'Form' : 'List';
		$this->data['page_title'] = isset($this->data['page_title']) ? $this->data['page_title'] : 'Admin';
		// $data['list_user'] = $this->data_user_aktif;
		$this->load->view('grab/index', $data);
	}

	public function report_template($data = NULL)
	{
		$this->load->view('grab/v_report', $data);
	}

	public function upload_single($error_link)
	{
		// debug($this->input->post());
		$id = $this->input->post('id');
		$img_lama = $this->input->post('img_lama');

		// cek user tidak merubah img saat edit data
		if ($id) {
			if ($_FILES['file']['name'][0] == '') {
				return $img_lama;
			}
		}

		$files = $_FILES;
		$cpt = count($_FILES['file']['name']);
		for ($i=0; $i < $cpt; $i++) {
	        $_FILES['file']['name']= $files['file']['name'][$i];
	        $_FILES['file']['type']= $files['file']['type'][$i];
	        $_FILES['file']['tmp_name']= $files['file']['tmp_name'][$i];
	        $_FILES['file']['error']= $files['file']['error'][$i];
	        $_FILES['file']['size']= $files['file']['size'][$i];

	        $config['upload_path']          = './'.$this->folder_file;
	        $config['allowed_types']        = $this->file_allowed_types;
    		// $config['max_size']             = 35;
	        $this->upload->initialize($config);
	        if ( ! $this->upload->do_upload('file')){
		        $file_data = $this->upload->data();
	        	// echo $this->upload->display_errors();
        		// @unlink('./'.$this->folder_file.'/'.$file_data['file_name']);
        		// @unlink('./'.$this->folder_thumb_file.'/thumb_'.$file_data['file_name']);
				$this->session->set_flashdata('alert_warning', $_FILES['file']['name'].' '.$this->upload->display_errors());
				redirect($error_link);
	        }else{
				// resize
		        $file_data = $this->upload->data();
				$config['image_library'] = 'gd2';
				$config['source_image'] = './'.$this->folder_file.'/'.$file_data['file_name'];
				$config['new_image'] = './'.$this->folder_thumb_file.'/thumb_'.$file_data['file_name'];
				$config['create_thumb'] = FALSE;
				$config['maintain_ratio'] = TRUE;
				$config['width']         = $this->resize_width;
				$config['height']       = $this->resize_height;

				$this->load->library('image_lib', $config);

				$this->image_lib->resize();
				$this->image_lib->initialize($config);

				if ( ! $this->image_lib->resize()){
					// echo $this->image_lib->display_errors();
	        		@unlink('./'.$this->folder_file.'/'.$file_data['file_name']);
	        		@unlink('./'.$this->folder_thumb_file.'/thumb_'.$file_data['file_name']);
					$this->session->set_flashdata('alert_warning', $_FILES['file']['name'].' '.$this->image_lib->display_errors());
					redirect($error_link);
				}else{
					if ($id) {
		        		@unlink('./'.$this->folder_file.'/'.$img_lama);
		        		@unlink('./'.$this->folder_thumb_file.'/thumb_'.$img_lama);
					}
					return $file_data['file_name'];
				}
	        }
		}
	}

	function create_thumb($nama_img,$path,$new_path,$heigt_img,$width_img,$crop=false)
	{
		// initial
        // $nama_img = 'lunamaya.jpg';
        // $path = './public/orangtua_bukti_bayar/';
        // $new_path = './public/orangtua_bukti_bayar/thumb/';
        // $heigt_img = '200';
        // $width_img = '400';
        // $crop = true;

        // rezize gambar
        $size = getimagesize($path.$nama_img);
        $width_af = ($size[0]*$heigt_img)/$size[1];
        $yg_kurang = $width_af < $width_img ? 'width' : 'height';

        $config['image_library'] = 'gd2';
        $config['source_image'] = $path.$nama_img;
        $config['new_image'] = $new_path.'crop_'.$nama_img;
        $config['create_thumb'] = FALSE;
        $config['maintain_ratio'] = TRUE;
        $config['width']         = $width_img;
        $config['height']       = $heigt_img;
        if($crop==true){
            $config['master_dim'] = $yg_kurang;
        }
        $this->load->library('image_lib', $config);

        $this->image_lib->initialize($config);
        $this->image_lib->resize();


        if($crop==true){
            // crop image
            $this->image_lib->clear();
            $config_crop['image_library'] = 'gd2';
            $config_crop['source_image'] = $config['new_image'];
            $config_crop['maintain_ratio'] = FALSE;
            $size = getimagesize($config['new_image']);
            if ($yg_kurang == 'width') {
                $config_crop['height']  = $heigt_img;
                $config_crop['y_axis'] = ($size[1]-$heigt_img)/2;
            }else{
                $config_crop['width']  = $width_img;
                $config_crop['x_axis'] = ($size[0]-$width_img)/2;
            }
            $this->image_lib->initialize($config_crop);
            $this->image_lib->crop();
        }
        return($nama_img);
	}

	public function create_activity($id_user,$ket)
	{
		$ob = array(
			'id_user' => $id_user,
			'keterangan' => $ket,
		);
		$qi = $this->db->insert('aktivitas', $ob);
		if ($qi) {
			return "ok";
		}else{
			return "error";
		}
	}

}

/* End of file Grab.php */
/* Location: ./application/modules/backend/grab/controllers/Grab.php */