<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_model extends CI_Model {

	public function getPost($id=null)
	{
		$this->db->select('
			p.id_post, p.image, p.title, p.date, p.content, u.name,
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

	function get_slider_home(){
		$this->db->where('archive', '0');
		$this->db->order_by('id_slider_home', 'desc');
		return $this->db->get('slider_home')->result_array();
	}

	function getGallery($where,$like,$order,$limit=''){
		// $this->db->select('a.id,a.judul,a.created_at,a.tipe_broadcast');
		$this->db->from('gallery a');
		$joins = array(
			// 'x b' => 'b.x=a.id'
		);
		foreach ($joins as $tble => $val) $this->db->join($tble, $val, 'left');
		if(count($where)) foreach ($where as $key => $value) is_numeric($key) ? $this->db->where($value) : $this->db->where($key, $value);
		if($like){
			$this->db->like('a.title', $like, 'BOTH');
		}

		if (is_array($order)) foreach ($order as $key => $value) $this->db->order_by($key, $value);
		else $this->db->order_by('id', 'desc');

		$this->db->group_by('a.id');

		if($limit && $limit['offset']>0)$this->db->limit($limit['offset'],$limit['start']);
		$e = $this->db->get();
		return (!$limit) ? $e->num_rows() : $e->result_array();
	}
}

/* End of file My_model.php */
/* Location: ./application/modules/frontend/home/models/My_model.php */