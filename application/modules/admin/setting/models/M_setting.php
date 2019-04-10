<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_setting extends CI_Model {

	var $table = 'posts';

	public function hitung($object)
	{
    	$this->pagination_join_trip($object);
    	$this->pagination_where_trip($object);
    	$this->pagination_like_trip($object);
        $query = $this->db->get($this->table);
		return $query->num_rows();
	}

	public function getData($object)
	{		
		$this->pagination_like_trip($object);
		$this->pagination_join_trip($object);
		$this->pagination_where_trip($object);
		$this->db->order_by('id_post', 'desc');
		return $this->db->get($this->table, $object['limit'], $object['offset'])->result_array();
	}

	private function pagination_join_trip($object)
	{
		$this->db->join('users u', 'u.id_user = posts.user_id', 'left');
		$this->db->join('pelayanan p', 'p.id_pelayanan = u.pelayanan_id', 'left');
	}

	private function pagination_where_trip($object)
	{
		$this->db->where('archive', $object['status_post']);
	}

	private function pagination_like_trip($object)
	{
		$this->db->where("(
			title LIKE '%".$object['keyword']."%' AND
			month(date) LIKE '%".$object['month']."%' AND
			year(date) LIKE '%".$object['year']."%'
			)", NULL, FALSE);
			// content LIKE '%".$object['keyword']."%' AND
	}

	public function get_all_year_posts()
	{
		$this->db->select('date');
		$this->db->order_by('date', 'desc');
		$q = $this->db->get('posts')->result_array();
		$gruop_date = array();
		foreach ($q as $key => $value) {
			$date1 = date('Y',strtotime($value['date']));

			$gruop_date = $gruop_date;
			if (in_array($date1, $gruop_date)) {
				# code...
			}else{
				array_push($gruop_date, $date1);
			}
		}
		// debug($gruop_date);
		return $gruop_date;
	}

	function change_by_name_db($name, $content=null, $file_input_name=null, $img_old_name=null)
	{
		if ($file_input_name!=null) {

	        $path = './public/others/';
	        $new_path = './public/others/thumb/';
	        $heigt_img = '200';
	        $width_img = '400';
	        $crop = true;

	        $config['upload_path'] = $path;
	        $config['allowed_types'] = 'gif|jpg|png';
	        $config['remove_spaces'] = TRUE;
	        $config['max_width'] = '102412';
	        $config['max_height'] = '76813123';
	        $config['encrypt_name'] = TRUE;

	        // Alternately you can set preferences by calling the ``initialize()`` method. Useful if you auto-load the class:
	        $this->upload->initialize($config);
	        $up = $this->upload->do_upload($file_input_name);
	        if ($up) {
	            $img_old = $img_old_name;
	            @unlink($path.$img_old);
	            @unlink($new_path.'crop_'.$img_old);
	            $file = $this->upload->data()['file_name'];
	        }else{
	        	// debug($this->upload->display_errors());
	            $img_old = $img_old_name;
	            $file = $img_old;
	        }
		}else{
			$file = null;
		}

		$ob = array(
			'content' => $content,
			'file' => $file,
		);

		// cek ada name ini engga
		$cek_data = $this->wd_db->get_data('others',array('name'=>$name));
		if (!$cek_data) {
			# code...
			$ob = array(
				'name' => $name,
				'content' => $content,
				'file' => $file,
			);
			$q = $this->db->insert('others', $ob);
			return $q;
		}else{
			$this->db->where('name', $name);
			$q = $this->db->update('others', $ob);
			return $q;
		}
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

}

/* End of file M_posts.php */
/* Location: ./application/modules/admin/posts/models/M_posts.php */