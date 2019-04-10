<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About_model extends CI_Model {

	public function getPost($id=null)
	{
		$this->db->join('users u', 'u.id_user = posts.user_id', 'left');
		$this->db->order_by('date', 'desc');
		$q=$this->db->get('posts',4)->result_array();
		return $q;
	}
}

/* End of file My_model.php */
/* Location: ./application/modules/frontend/home/models/My_model.php */