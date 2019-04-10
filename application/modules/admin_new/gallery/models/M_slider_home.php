<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_slider_home extends CI_Model {

	var $table = 'gallery';

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
		$this->db->order_by('id', 'desc');
		return $this->db->get($this->table, $object['limit'], $object['offset'])->result_array();
	}

	private function pagination_join_trip($object)
	{
		// $this->db->join('users u', 'u.id_user = warta.user_id', 'left');
	}

	private function pagination_where_trip($object)
	{
		if(isset($object['where'])){
			if(count($object['where'])) foreach ($object['where'] as $key => $value) is_numeric($key) ? $this->db->where($value) : $this->db->where($key, $value);
		}
	}

	private function pagination_like_trip($object)
	{
		$this->db->where("(
			title LIKE '%".$object['keyword']."%'
			)", NULL, FALSE);
			// month(date) LIKE '%".$object['month']."%' AND
			// year(date) LIKE '%".$object['year']."%'
			// content LIKE '%".$object['keyword']."%' AND
	}

	public function get_all_year_posts()
	{
		$this->db->select('created_at');
		$this->db->order_by('created_at', 'desc');
		$q = $this->db->get('gallery')->result_array();
		$gruop_date = array();
		foreach ($q as $key => $value) {
			$date1 = date('Y',strtotime($value['created_at']));

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