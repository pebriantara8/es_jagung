<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Grab_frontend extends CI_Controller {

	public $data;
	public $rules;

	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set ( "Asia/Jakarta" );
	}
	
	public function view($data = NULL,$tipe=true)
	{
		$this->load->view('grab_frontend/index', $data);
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

}

/* End of file Grab.php */
/* Location: ./application/modules/backend/grab/controllers/Grab.php */