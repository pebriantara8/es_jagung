<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Warta_model extends CI_Model {

	public function getPost($id=null)
	{
		$this->db->join('users u', 'u.id_user = posts.user_id', 'left');
		$this->db->order_by('date', 'desc');
		$q=$this->db->get('warta',4)->result_array();
		return $q;
	}

	function getWarta($where,$like,$order,$limit=''){
		$this->db->select('a.id_warta,a.title,a.date,a.file,a.image');
		$this->db->from('warta a');
		$joins = array(
			'users b' => 'b.id_user=a.user_id'
		);
		foreach ($joins as $tble => $val) $this->db->join($tble, $val, 'left');
		if(count($where)) foreach ($where as $key => $value) is_numeric($key) ? $this->db->where($value) : $this->db->where($key, $value);
		if($like){
			$this->db->like('a.title', $like, 'BOTH');
			// $this->db->or_like('a.date', $like, 'BOTH');
		}

		if (is_array($order)) foreach ($order as $key => $value) $this->db->order_by($key, $value);
		else $this->db->order_by('a.created_at', 'desc');

		$this->db->where('a.archive', '0');

		if($limit && $limit['offset']>0)$this->db->limit($limit['offset'],$limit['start']);
		$e = $this->db->get();
		return (!$limit) ? $e->num_rows() : $e->result_array();
	}
}

/* End of file My_model.php */
/* Location: ./application/modules/frontend/home/models/My_model.php */