<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berita_model extends CI_Model {

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
		$this->db->select('posts.title, posts.id_post, posts.content, posts.image, u.name, posts.date');
		
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
		if($object['category']){
			$this->db->where('u.pelayanan_id', $object['category']);
		}
	}

	private function pagination_like_trip($object)
	{
		$this->db->where("(
			title LIKE '%".$object['keyword']."%' OR
			content LIKE '%".$object['keyword']."%'
			)", NULL, FALSE);
			// content LIKE '%".$object['keyword']."%' AND
	}

	function getPostRecent(){
		return $this->db->get('posts', 5)->result_array();
	}
}

/* End of file My_model.php */
/* Location: ./application/modules/frontend/home/models/My_model.php */