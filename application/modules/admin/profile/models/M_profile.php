<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_profile extends CI_Model {

	var $table = 'users';

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
		$this->db->order_by('id_user', 'desc');
		return $this->db->get($this->table, $object['limit'], $object['offset'])->result_array();
	}

	private function pagination_join_trip($object)
	{
		// $this->db->join('users u', 'u.id_user = posts.user_id', 'left');
		// $this->db->join('pelayanan p', 'p.id_pelayanan = u.pelayanan_id', 'left');
	}

	private function pagination_where_trip($object)
	{
		$this->db->where('archive', $object['status_post']);
	}

	private function pagination_like_trip($object)
	{
		$this->db->where("(
			title LIKE '%".$object['keyword']."%'
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

}

/* End of file M_posts.php */
/* Location: ./application/modules/admin/posts/models/M_posts.php */