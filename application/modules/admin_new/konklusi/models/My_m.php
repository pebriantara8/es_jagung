<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class My_m extends CI_Model {

	var $table = 'users';

	function getData($where,$like,$order,$limit=''){
		// debug($where);
		// $this->db->select('a.id_warta,a.title,a.date,a.file,a.image');
		$this->db->from('konklusi a');
		$joins = array(
			// 'users b' => 'b.id_user=a.user_id'
		);
		foreach ($joins as $tble => $val) $this->db->join($tble, $val, 'left');
		if(count($where)) foreach ($where as $key => $value) is_numeric($key) ? $this->db->where($value) : $this->db->where($key, $value);
		if($like){
			$this->db->like('a.nama_konklusi', $like, 'BOTH');
			// $this->db->or_like('a.date', $like, 'BOTH');
		}

		if (is_array($order)) foreach ($order as $key => $value) $this->db->order_by($key, $value);
		else $this->db->order_by('a.created_at', 'desc');

		if($limit && $limit['offset']>0)$this->db->limit($limit['offset'],$limit['start']);
		$e = $this->db->get();
		return (!$limit) ? $e->num_rows() : $e->result_array();
	}

	public function getPremisAll(){
		$pg = $this->db->get('premis_kategori')->result_array();
		foreach ($pg as $key => $value) {
			$this->db->where('premis_kategori_id', $value['id']);
			$this->db->where('deleted_at IS NULL');
			
			$pg[$key]['premis'] = $this->db->get('premis')->result_array();
		}
		return $pg;
	}

}

/* End of file M_posts.php */
/* Location: ./application/modules/admin/posts/models/M_posts.php */