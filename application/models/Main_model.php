<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main_model extends CI_Model {
	
	function __construct(){
		parent::__construct();
		// $this->load->database();
	}
	
	public function get_content_setting($name='')
	{
		$this->db->where('name', $name);
		$q = $this->db->get('others')->row_array();
		return $q['content'];
	}

	public function get_file_setting($name='')
	{
		$this->db->where('name', $name);
		$q = $this->db->get('others')->row_array();
		return $q['file'];
	}

	public function get_post($id=null,$limit=null)
	{
		$this->db->join('users u', 'u.id_user = posts.user_id', 'left');
		$this->db->select('u.name ,posts.id_post, posts.title, posts.content, posts.image, posts.date, posts.views');
		$this->db->order_by('date', 'desc');
		if ($id==null) {
			if ($limit) {
				$q=$this->db->get('posts',$limit)->result_array();
			}else{
				$q=$this->db->get('posts')->result_array();
			}
		}else{
			$this->db->where('id_post', $id);
			$q=$this->db->get('posts')->row_array();
		}
		return $q;
	}

	public function get_post_popular()
	{
		$this->db->order_by('views', 'desc');
		$q=$this->db->get('posts',4)->result_array();
		return $q;
	}

	public function get_pelayanan($id=null,$limit=null)
	{
		$this->db->order_by('id_pelayanan', 'desc');
		if($id) {
			$this->db->where('id_pelayanan', $id);
			$q=$this->db->get('pelayanan')->row_array();
			foreach ($q as $key => $value) {
				$this->db->join('users u', 'u.id_user = posts.user_id', 'left');
				$this->db->where('u.pelayanan_id', $value['id_pelayanan']);
				$q2=$this->db->get('posts')->result_array();
				$q['total_post'] = count($q2);
			}
		}else{
			if($limit) $this->db->limit($limit);
			$q=$this->db->get('pelayanan')->result_array();
			foreach ($q as $key => $value) {
				$this->db->join('users u', 'u.id_user = posts.user_id', 'left');
				$this->db->where('u.pelayanan_id', $value['id_pelayanan']);
				$q2=$this->db->get('posts')->result_array();
				$q[$key]['total_post'] = count($q2);
			}
		}
		return $q;
	}

	function upload_file_single($set=array())
	{
		$response = array();
        // $set = array(
        //     'is_update' => TRUE,
        //     'input_file_name' => 'file',
        //     'allowed_types' => 'gif|jpg|png',
        //     'old_file' => 'file',
        //     'path' => './public/post_file/',
        //     'new_path' => './public/post_file/thumb/',
        //     'encrypt_name' = TRUE,

        //     'create_thumb' => TRUE,
        //     'height' => '200',
        //     'width' => '400',
        //     'crop' => TRUE,
        // );
        $config['upload_path'] = $set['path'];
        $config['allowed_types'] = $set['allowed_types'];
        $config['remove_spaces'] = TRUE;
        $config['max_width'] = '*';
        $config['max_height'] = '*';
        $config['encrypt_name'] = $set['encrypt_name'];
        $this->upload->initialize($config);

        $up = $this->upload->do_upload($set['input_file_name']);
        if ($up) {
            $old_file = $set['old_file'];
            @unlink($set['path'].$old_file);
            @unlink($set['new_path'].'thumb_'.$old_file);
            $response['filename'] = $this->upload->data()['file_name'];
            $response['success'] = TRUE;
            $response['error'] = FALSE;

	        if($set['create_thumb']==TRUE){
	        	$this->create_thumb(
	        		$response['filename'],
	        		$set['path'],
	        		$set['new_path'],
	        		$set['height'],
	        		$set['width'],
	        		$set['crop']
	        	);
	        }
        }else{
            if ($set['is_update']==TRUE) {
                $old_file = $set['old_file'];
                $response['filename'] = $old_file;
                // jika file input tidak kosong
                if ($_FILES[$set['input_file_name']]['name'] != '') {
                	$response['error'] = $this->upload->display_errors();
                }else{
                	$response['error'] = false;
                }
            }else{
                $response['filename'] = FALSE;
                $this->session->set_flashdata('alert_info', 'Gagal upload file!'.$this->upload->display_errors());
                $response['error'] = $this->upload->display_errors();
            }
        }
        return $response;
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
        $config['new_image'] = $new_path.'thumb_'.$nama_img;
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

	public function set_response_web($data='',$message='',$success=true,$code=200,$redirect=null)
	{
		$res['data'] = $data;
		$res['success'] = $success;
		$res['message'] = $message;
		$res['code'] = $code;
		$res['redirect'] = $redirect;

		echo json_encode($res);
		exit;
		// return $res;
	}
	
	public function getPostHome($id=null)
	{
		$this->db->select('
			p.id_post, p.image, p.title, p.date, p.content,
		');
		$this->db->join('users u', 'u.id_user = p.user_id', 'left');
		$this->db->order_by('p.date', 'desc');
		$q=$this->db->get('posts p',3)->result_array();
		foreach ($q as $key => $value) {
			// $content2 = preg_match($regex, $text, $matches);
			// $q[$key]['content2'] = 
		}
		return $q;
	}
}

/* End of file My_model.php */
/* Location: .//mnt/70bda58b-6fd9-d101-20a1-a58b6fd9d101/public_html/dengerin/api/api/models/My_model.php */